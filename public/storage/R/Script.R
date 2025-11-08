inputData <- Sys.getenv("INPUT_DATA")
parsedInput <- jsonlite::fromJSON(inputData)

grouped_data <- parsedInput$groupedData
regions <- unique(names(grouped_data))
variables <- unique(unlist(lapply(grouped_data, names)))
df <- data.frame(matrix(ncol = length(variables) + 1, nrow = length(regions)))
colnames(df) <- c("Region", variables)

df$Region <- regions
  for (variable in variables) {
    df[, variable] <- sapply(regions, function(region) {
      if (variable %in% names(grouped_data[[region]])) {
        return(grouped_data[[region]][[variable]])
      } else {
        return(NA)
      }
    }
  )
}

independentVariables <- parsedInput$combinedIndependentVariable
dependentVariable <- parsedInput$dependentVariable
shapefile_path <- parsedInput$shapefile_path
#  suppressMessages({
#    suppressWarnings({
output <- capture.output({
  data_shp <- rgdal::readOGR(shapefile_path)
  my_data_merged <- sp::merge(data_shp, df, by.x = "WADMKK", by.y = "Region")
  neighbors_list <- spdep::poly2nb(data_shp, queen = TRUE)
  weights <- spdep::nb2listw(neighbors_list, zero.policy = TRUE)
  library(spdep)
  moransi <- moran.test(my_data_merged[[dependentVariable]], weights, zero.policy = TRUE, length(neighbors_list))

  graph = neighbors_list
  id.singletons = c(1,7,14,15)
  
  G <- spdep::nb2mat(graph, zero.policy = TRUE)
  G[id.singletons,]<-0
  G[,id.singletons]<-0
  g.disc <- INLA::inla.read.graph(G)
  dataset = as.data.frame(my_data_merged)
  dataset$KAB_KOTA = c(1:22)
  
  formula.bym2 <- paste(dependentVariable, "~", independentVariables, "+ f(KAB_KOTA, model = 'bym2',",
      "scale.model = TRUE, adjust.for.con.comp = TRUE, graph = g.disc,",
      "hyper = list(phi = list(prior = 'pc', param = c(0.9, 0.9)),",
      "prec = list(prior = 'pc.prec', param = c(0.04, 0.04), initial = 5)))")
    
    
  formula.bym2 = as.formula(formula.bym2)
  
  result = INLA::inla(formula.bym2, family = "poisson", data = dataset)
  
  library(tmap)
  spatial_data = data_shp
  spatial_data$expected_value = result$summary.fitted.values$mean


  user_id <- parsedInput$user_id
  variable_name <- paste("predict_map", user_id, ".jpg", sep = "_")
  path_to_save <- file.path(getwd(), "storage", "R", variable_name)
  
  tmap_mode("view")
  map = tm_basemap("Stamen.TonerLite") + 
    tm_shape(spatial_data) +
    tm_polygons(style = "quantile", col = "expected_value", alpha = 0.5) +
    tm_text(text = "WADMKK", size = 0.5) +
    tm_legend(outside = TRUE, text.size = 1)

  if (file.exists(path_to_save)) {
    file.remove(path_to_save)
  }

  tmap_save(map, filename = path_to_save)
#  })
#  })
})

modelMean = result$summary.fixed$mean
# modelSd = result$summary.fixed$sd
model1Quant = result$summary.fixed$'0.025quant'
model3Quant = result$summary.fixed$'0.975quant'
predict = result$summary.fitted.values$mean
morans = moransi$p.value

output <- list(
  modelMean = modelMean,
  # modelSd = modelSd,
  model1Quant = model1Quant,
  model3Quant = model3Quant,
  predict = predict,
  morans = morans
)

print(jsonlite::toJSON(output))