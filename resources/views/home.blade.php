@extends('layouts.template')
@section('title', 'Home')

@section('content')
<div class="p-4 mb-4">
    <div id="map" class="m-auto" style="height: 450px; width: 80%;"></div>
    <p class="text-center mt-2 m-auto" style="width: 90%;">
    There is a unique geographical condition in the East Nusa Tenggara Province, namely the presence of several geographically disconnected areas.
    This constraint creates challenges in connectivity among the province's regions. Spatial analysis becomes an essential tool that allows
    exploration of the interplay between geographical conditions, regional connectivity, and disease spread. Based on the challenges posed by these
    geographical conditions, this application utilizes the Integrated Nested Laplace Approximations (INLA) method. INLA is an estimation method
    that enables addressing spatial complexity in data analysis. It efficiently handles spatial complexity, provides accurate analysis results, and
    allows to delve deeper into identifying patterns of variable spread that might not be apparent through conventional methods. In terms of
    analysis results, INLA excels in producing accurate parameter estimates. This application is created to assist you in conducting spatial
    analysis in disconnected areas, particularly in the East Nusa Tenggara Province.
    </p>
    <div class="px-5 mt-4">
        <h5>What menus are available in this application?</h5>
        <ul>
            <li>
                Home:<br>
                The home page of the INLA Tools application displays a map of East Nusa Tenggara Province and explanations related to the application.
            </li>
            <li>
                Data:<br>
                A page for managing data for spatial analysis using the BYM2 model with the INLA method. By default, one dataset is provided, namely the data related to malaria cases in 2020.
            </li>
            <li>
                Analysis:<br>
                A page for performing spatial analysis using the BYM2 model with the INLA method on selected data and variables. The analysis results along with explanations of the output will be presented.
            </li>
            <li>
                Variable:<br>
                A page for managing the variables used in the data.
            </li>
        </ul>
        
        <h5>How to analyze the data:</h5>
        <ul>
            <li>
                Input data in the data menu if you don't want to use the default data.
            </li>
            <li>
                Click on the analysis menu.
            </li>
            <li>
                Select the data year period.
            </li>
            <li> 
                Choose the title of the data available for the selected period.
            </li>
            <li>
                Select the dependent variable to be used from the selected data.
            </li>
            <li>
                Select the independent variable to be used from the selected data.
            </li>
            <li>
                Click the submit button.
            </li>
            <li>
                After the process is complete, the analysis results will be displayed, including Moran's I test, spatial modeling, expected values, and the distribution map of the selected dependent variable.
            </li>
        </ul>
    </div>
</div>

<!-- EXTRA CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

<!-- EXTRA SCRIPT -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    var mymap = L.map('map').setView([-8.6574, 121.0794], 7);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(mymap);

    L.marker([-8.6574, 121.0794]).addTo(mymap)
    .bindPopup('East Nusa Tenggara').openPopup();
</script>
@endsection