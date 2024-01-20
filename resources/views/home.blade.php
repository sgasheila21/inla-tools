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