<?php
  require_once 'homefun.php';
?>

<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device=width, initial=scale=1.0">
  

    <title>ΚΑΛΩΣΗΡΘΕΣ ΣΤΟΝ ΧΑΡΤΗ!
      
    </title>
    
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@v0.74.0/dist/L.Control.Locate.min.css" />

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet-search@3.0.2/dist/leaflet-search.min.css" />
<link rel="stylesheet" href="css/popupMod.css">
 
  <style>
   body {
    padding: 0;
    margin: 0;
}
html, body, #map {
    height: 100%;
    width: 100vw;
}

   </style>

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  </head>

  <body>
    <div id="map"></div>
  
  </body>

  </html>
  <script src="js/popupMod.js" type="text/javascript"></script>
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

<script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.74.0/dist/L.Control.Locate.min.js" charset="utf-8"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-search/3.0.2/leaflet-search.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="ajax-script.js"></script>
<script src="htdocs/webmap101/leaflet.ajax.min.js" type="text/javascript" ></script>
<script src="js/jquery.js"></script>
<script> 
let mymap = L.map("map", {
  zoom: 11,
  center: L.latLng([38.246242, 21.7350847])
}); //set center

let osmUrl = "https://tile.openstreetmap.org/{z}/{x}/{y}.png";
let osmAttrib =
  'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors';
let osm = new L.TileLayer(osmUrl, { attribution: osmAttrib });
mymap.addLayer(osm);

L.control.locate().addTo(mymap);

let markersLayer = L.layerGroup(); //layer contain searched elements

mymap.addLayer(markersLayer);

 //var marker = L.marker([38.246242, 21.7350847]).addTo(mymap);
 var greenIcon = new L.Icon({
        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
});
</script>





<?php

$location = (new Map) ->showMora();
foreach($location as $key => $value){
  $name = $value["name"];
  $longitude= $value["longitude"];
  $latitude = $value["latitude"];
  echo "<script> var marker = L.marker([$latitude ,$longitude],{icon: greenIcon}).addTo(mymap).bindPopup('$name' )</script>";
 
  
}

?>