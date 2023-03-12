
<?php 
session_start();

require 'delete.php'; 
require 'db_conn.php';
require_once('tokens.php'); 

 
if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
  
  $user_id=$_SESSION["user_id"];
  $admin=$_SESSION["admin"];
  
  $adminnumber = 5;
  if ($adminnumber <= $admin) {
    
    //echo "<a href='admin_page.php' >Δυνατότητες Admin</a>";
     
           
               
    echo '<button class=bu onclick="markerOn();">Δυνατότητες Admin</button>  ';
  }
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
    

<div style="display:inline-block;">
    <form action="mora_xarths.php" method="GET">
<button class="b1" >Βρεφικά είδη</button></form>
</div>

<div style="display:inline-block;">
<form action="trofima_xarths.php" method="GET">
<button class="b2" role="button"> Τρόφιμα</button></form></div>

<div style="display:inline-block;">
<form action="kathariothta_xarths.php" method="GET">
<button class="b3" > Καθαριότητα</button></form></div>

<div style="display:inline-block;">
<form action="drinks_xarths.php" method="GET">
<button class="b4" >Ποτά - Αναψυκτικά</button></form></div>   

<div style="display:inline-block;">
<form action="personal_care_xarths.php" method="GET">
<button class="b5" >Προσωπική φροντίδα</button></form></div>
 
  <style>


   body {
    padding: 0;
    margin: 0;
    background-color: #99c8d1;
}
html, body, #map {
    height: 90%;
    width: 100vw;
}
h1{
       text-align: center;
       font-family: Georgia, serif;
}
.bu {
  position: relative;
  background-color:white;;
  border: none;
  display: inline-block;
  font-size: 15px;
  color: #000000;
  padding: 8px;
  height:30px;
  width: 150px;
  text-align: center;
  transition-duration: 0.4s;
  text-decoration: none;
  overflow: hidden;
  cursor: pointer;
  border-radius: 25px;
}

.bu:after {
  content: "";
  background: #f1f1f1;
  display: block;
  position: absolute;
  padding-top: 300%;
  padding-left: 350%;
  margin-left: -20px !important;
  margin-top: -120%;
  opacity: 0;
  transition: all 0.8s
}

.bu:active:after {
  padding: 0;
  margin: 0;
  opacity: 1;
  transition: 0s
}

.b1{
 
 appearance: none;
 background-color: #228b22;
 border: 2px solid #1A1A1A;
 border-radius: 11px;
 box-sizing: border-box;
 color: #FED8B1;
 cursor: pointer;
 display: inline-block;
 font-family: Roobert,-apple-system,BlinkMacSystemFont,"Segoe UI",Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
 font-size: 13px;
 font-weight: 600;
 line-height: normal;
 margin: 0;
 min-height: 30px;
 min-width: 0;
 outline: none;
 padding: 2px 5px;
 text-align: center;
 text-decoration: none;
 transition: all 300ms cubic-bezier(.23, 1, 0.32, 1);
 user-select: none;
 -webkit-user-select: none;
 touch-action: manipulation;
 width: 100%;
 will-change: transform;

}
#b88{
 
 appearance: none;
 background-color: #e7e7e7;
 border: 2px solid #1A1A1A;
 border-radius: 11px;
 box-sizing: border-box;
 color: #1A1A1A;
 cursor: pointer;
 display: inline-block;
 font-family: Roobert,-apple-system,BlinkMacSystemFont,"Segoe UI",Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
 font-size: 13px;
 font-weight: 600;
 line-height: normal;
 margin: 0;
 min-height: 30px;
 min-width: 0;
 outline: none;
 padding: 2px 5px;
 text-align: center;
 text-decoration: none;
 transition: all 300ms cubic-bezier(.23, 1, 0.32, 1);
 user-select: none;
 -webkit-user-select: none;
 touch-action: manipulation;
 width: 10%;
 will-change: transform;
 text-align: center;
 position:static;

}
#container{
    text-align: center;
}
.b1:hover{
 color: #ff7f50;
 background-color: #FED8B1;
 box-shadow: rgba(0, 0, 0, 0.25) 0 8px 15px;
 transform: translateY(-2px);
}
 
.b1:active {
  box-shadow: none;
  transform: translateY(0);
}
.b2{
 
 appearance: none;
 background-color: #FF0000;
 border: 2px solid #1A1A1A;
 border-radius: 11px;
 box-sizing: border-box;
 color: #FED8B1;
 cursor: pointer;
 display: inline-block;
 font-family: Roobert,-apple-system,BlinkMacSystemFont,"Segoe UI",Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
 font-size: 13px;
 font-weight: 600;
 line-height: normal;
 margin: 0;
 min-height: 30px;
 min-width: 0;
 outline: none;
 padding: 4px 8px;
 text-align: center;
 text-decoration: none;
 transition: all 300ms cubic-bezier(.23, 1, 0.32, 1);
 user-select: none;
 -webkit-user-select: none;
 touch-action: manipulation;
 width: 100%;
 will-change: transform;

}
.b2:hover{
 color: #ff7f50;
 background-color: #FED8B1;
 box-shadow: rgba(0, 0, 0, 0.25) 0 8px 15px;
 transform: translateY(-2px);
}
.b2:active {
  box-shadow: none;
  transform: translateY(0);
}
 .b3{
 
 appearance: none;
 background-color: #ff7f50;
 border: 2px solid #1A1A1A;
 border-radius: 11px;
 box-sizing: border-box;
 color: #FED8B1;
 cursor: pointer;
 display: inline-block;
 font-family: Roobert,-apple-system,BlinkMacSystemFont,"Segoe UI",Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
 font-size: 13px;
 font-weight: 600;
 line-height: normal;
 margin: 0;
 min-height: 30px;
 min-width: 0;
 outline: none;
 padding: 4px 8px;
 text-align: center;
 text-decoration: none;
 transition: all 300ms cubic-bezier(.23, 1, 0.32, 1);
 user-select: none;
 -webkit-user-select: none;
 touch-action: manipulation;
 width: 100%;
 will-change: transform;

}
.b3:hover{
 color: #ff7f50;
 background-color: #FED8B1;
 box-shadow: rgba(0, 0, 0, 0.25) 0 8px 15px;
 transform: translateY(-2px);
}
.b3:active {
  box-shadow: none;
  transform: translateY(0);
}
 .b4{
 
  appearance: none;
  background-color: #008CBA;
  border: 2px solid #1A1A1A;
  border-radius: 11px;
  box-sizing: border-box;
  color: #FED8B1;
  cursor: pointer;
  display: inline-block;
  font-family: Roobert,-apple-system,BlinkMacSystemFont,"Segoe UI",Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
  font-size: 13px;
  font-weight: 600;
  line-height: normal;
  margin: 0;
  min-height: 30px;
  min-width: 0;
  outline: none;
  padding: 4px 8px;
  text-align: center;
  text-decoration: none;
  transition: all 300ms cubic-bezier(.23, 1, 0.32, 1);
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  width: 100%;
  will-change: transform;
 
 }
 .b4:hover{
  color: #800080;
  background-color: #FED8B1;
  box-shadow: rgba(0, 0, 0, 0.25) 0 8px 15px;
  transform: translateY(-2px);
 }
 .b4:active {
  box-shadow: none;
  transform: translateY(0);
}

 .b5{
  appearance: none;
  background-color: #ffb6c1;
  border: 2px solid #1A1A1A;
  border-radius: 11px;
  box-sizing: border-box;
  color: #3B3B3B;
  cursor: pointer;
  display: inline-block;
  font-family: Roobert,-apple-system,BlinkMacSystemFont,"Segoe UI",Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
  font-size: 13px;
  font-weight: 600;
  line-height: normal;
  margin: 0;
  min-height: 30px;
  min-width: 0;
  outline: none;
  padding: 4px 8px;
  text-align: center;
  text-decoration: none;
  transition: all 300ms cubic-bezier(.23, 1, 0.32, 1);
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  width: 100%;
  will-change: transform;
 }
 .b5:hover{
  color: #800080;
  background-color: #FED8B1;
  box-shadow: rgba(0, 0, 0, 0.25) 0 8px 15px;
  transform: translateY(-2px);
 }

 .b5:active {
  box-shadow: none;
  transform: translateY(0);
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

var greenIcon = new L.Icon({
  iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
  shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
  iconSize: [25, 41],
  iconAnchor: [12, 41],
  popupAnchor: [1, -34],
  shadowSize: [41, 41]
});
//Xreiazontai gia to search button kai etsi ta shops
let data = {
  
  "type": "FeatureCollection",
  "generator": "overpass-ide",
  "copyright": "The data included in this document is from www.openstreetmap.org. The data is made available under ODbL.",
  "timestamp": "2022-12-06T20:39:21Z",
  "features": [
    {
      "type": "Feature",
      "properties": {
        "id": "354449389",       
        "name": "Lidl",
        "shop": "supermarket"
      },
      "geometry": {
        "type": "Point",
        "coordinates": [
          21.712654,
          38.2080319
        ]
      },
      "id": "354449389"
    },
    {
      "type": "Feature",
      "properties": {
        "id": "360217468",
        "name": "The Mart",        
        "shop": "supermarket"
      },
      "geometry": {
        "type": "Point",
        "coordinates": [
          21.7806567,
          38.28931
        ]
      },
      "id": "360217468"
    },
    {
      "type": "Feature",
      "properties": {
        "id": "360226900",
        "name": "Lidl",
        "shop": "supermarket",
      },
      "geometry": {
        "type": "Point",
        "coordinates": [
          21.7434265,
          38.2633511
        ]
      },
      "id": "360226900"
    },
    {
      "type": "Feature",
      "properties": {
        "id": "364381224",
        "name": "Σουπερμάρκετ Ανδρικόπουλος",       
        "shop": "supermarket"
      },
      "geometry": {
        "type": "Point",
        "coordinates": [
          21.7908028,
          38.2952086
        ]
      }
    },
    {
      "type": "Feature",
      "properties": {
        "id": "8806495733",
        "name": "3Α ΑΡΑΠΗΣ",
        "shop": "supermarket"
      },
      "geometry": {
        "type": "Point",
        "coordinates": [
          21.7455558,
          38.2398789
        ]
      },
      "id": "8806495733"
    },
    {
      "type": "Feature",
      "properties": {
        "id": "9651304117",
        "name": "Περίπτερο",
        "shop": "convenience"
      },
      "geometry": {
        "type": "Point",
        "coordinates": [
          21.7408745,
          38.2554443
        ]
      },
      "id": "9651304117"
    },
    {
      "type": "Feature",
      "properties": {
        "id": "9785182275",
        "name": "Mini-market",
        "shop": "convenience"
      },
      "geometry": {
        "type": "Point",
        "coordinates": [
          21.6232207,
          38.1494223
        ]
      },
      "id": "9785182275"
    },
    {
      "type": "Feature",
      "properties": {
        "id": "8805335004",        
        "name": "Μασούτης",
        "shop": "supermarket"
      },
      "geometry": {
        "type": "Point",
        "coordinates": [
          21.7355058,
          38.2454669
        ]
      },
      "id": "8805335004"
    },
    {
      "type": "Feature",
      "properties": {
        "id": "8805467220",
        "name": "ΑΒ Shop & Go",
        "shop": "supermarket"
      },
      "geometry": {
        "type": "Point",
        "coordinates": [
          21.7380288,
          38.24957
        ]
      },
      "id": "node/8805467220"
    },
    {
      "type": "Feature",
      "properties": {
        "id": "8214887306",
        "name": "3Α Αράπης",
        "shop": "supermarket"
      },
      "geometry": {
        "type": "Point",
        "coordinates": [
          21.7328984,
          38.2375068
        ]
      },
      "id": "8214887306"
    },
    {
      "type": "Feature",
      "properties": {
        "id": "8214910532",         
        "name": "Γαλαξίας",
        "shop": "supermarket"
      },
      "geometry": {
        "type": "Point",
        "coordinates": [
          21.733787,
          38.2361127
        ]
      },
      "id": "8214910532"
    },
    {
      "type": "Feature",
      "properties": {
        "id": "8215010716",
        "name": "Super Market Θεοδωρόπουλος",
        "shop": "supermarket"
      },
      "geometry": {
        "type": "Point",
        "coordinates": [
          21.7283123,
          38.2360129
        ]
      },
      "id": "8215010716"
    },
    {
      "type": "Feature",
      "properties": {
        "id": "8215157448",
        "name": "Super Market ΚΡΟΝΟΣ",
        "shop": "supermarket"
      },
      "geometry": {
        "type": "Point",
        "coordinates": [
          21.7340723,
          38.2390442
        ]
      },
      "id": "8215157448"
    },
    {
      "type": "Feature",
      "properties": {
        "id": "8214753473",
        "name": "Ena Cash And Carry",
        "shop": "supermarket"
      },
      "geometry": {
        "type": "Point",
        "coordinates": [
          21.7253472,
          38.2346622
        ]
      },
      "id": "8214753473"
    }
  ]
};
 

var featuresLayer = new L.GeoJSON(data, {
 
 onEachFeature: function (feature, marker,) {
   marker.bindPopup("<h4>" + feature.properties.name + "</h4>" + "<h4>" + feature.properties.id + "</h4>" + "<a href='http://www.google.com'>Visit Google</a>");
   
 } 
});
featuresLayer.addTo(mymap); 

 
//Search button
let controlSearch = new L.Control.Search({
  position: "topleft",
  layer: featuresLayer,
  propertyName: "name",
  initial: false,
  zoom: 17,
  marker: false
});

mymap.addControl(controlSearch); 


// Load the GeoJSON data
$.getJSON('http://localhost:8011/docss/data.json', function(data) {
  // Add the GeoJSON layer to the map
  L.geoJSON(data, {
    
   onEachFeature: function (feature, marker, ) {
   marker.bindPopup("<h4>" + feature.properties.name + "</h4>" + "<h4>" + feature.properties.shop_id + "</h4>" +'<button onclick="markerOnClickkk();">Προσθήκη Προσφοράς</button>' ).on('click', markerOnClick);

 } 
  }).addTo(mymap);
});
 $.getJSON('http://localhost:8011/docss/datarrr.json', function(data) {
  // Add the GeoJSON layer to the map
  L.geoJSON(data, {
   onEachFeature: function (feature, marker,) {
   marker.bindPopup("<h4>" + feature.properties.name + "</h4>" + "<h4>" + feature.properties.shop_id + "</h4>" +'<button onclick="markerOnClickkk();">Προσθήκη Προσφοράς</button>' + '<button onclick="markerOnClickk();"> Αξιολόγηση</button>').setIcon(greenIcon).on('click', markerOnClick);

 } 
  }).addTo(mymap);
});  


function markerOnClickk(){
  window.open("like.php");
}
function markerOn(){
  window.open("admin_page.php");
}
function markerOnClick(e)
{
  //var r = e.latlng.lat;
  alert("Αντέγραψε το id του καταστήματος από το pop-up! " );
   
}
function markerOnClickkk(){
  
  window.open('prosfora1.php')

}
mymap.locate({setView: true, maxZoom: 15});

function onLocationFound(e) {
    var radius = e.accuracy;

    L.marker(e.latlng).addTo(mymap)
        .bindPopup("Τρέχουσα τοπεθεσία").openPopup();

    L.circle(e.latlng, radius).addTo(mymap);
}

mymap.on('locationfound', onLocationFound);
/*
markersLayer$.getJSON('http://localhost:8011/docss/data.json', function(data) {
  // Add the GeoJSON layer to the map
  L.geoJSON(data, {
   onEachFeature: function (feature, marker,) {
   marker.bindPopup("<h4>" + feature.properties.name + "</h4>" + "<h4>" + feature.properties.shop_id + "</h4>" +'<button onclick="markerOnClickkk();">Προσθήκη Προσφοράς</button>' + '<button onclick="markerOnClickk();"> Αξιολόγηση</button>').setIcon(greenIcon).on('click', markerOnClick);

 } 
  }).addTo(mymap); token
});
*/
</script>

     <h1>Γειά σου, <?php echo $_SESSION['username']; ?> !</h1>
     <div id="container">
    <form action="profile.php" method="GET">
<button id="b88" >Προφίλ</button></form>
</div>
<div id="container">
    <form action="logout.php" method="GET">
<button id="b88" >Αποσύνδεση</button></form>
</div>
        
</body>
</html>

<?php 
}
else{
     header("Location: index.php");
     exit();
}



 ?> 
 