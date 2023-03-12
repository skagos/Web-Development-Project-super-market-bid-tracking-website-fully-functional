<?php
include_once('homecon.php');
session_start();
$_SESSION["shop_id"] = $_GET["shop_id"];

//$link = "mysql:=127.0.0.1:8011;dbname=projectdatabase", "root", "";

//$user & $password should come from config file
$conn = new PDO("mysql:=127.0.0.1:8011;dbname=projectdatabase", "root", "");

$sql = 'SELECT * FROM shop ';

$rs = $conn->query($sql);
if (!$rs) {
    echo 'An SQL error occured.\n';
    exit;
}

$geojson = array (
	'type'	=> 'FeatureCollection',
	'features'	=> array()
);

while ($row = $rs->fetch(PDO::FETCH_ASSOC)) {
	$properties = $row;
	unset($properties['longitude']);
	unset($properties['latitude']);
	$feature = array(
		'type'	=> 'Feature',
		'geometry' => array(
			'type' => 'Point',
			'coordinates' => array(
					$row['longitude'],
					$row['latitude']
					)
			),
		'properties' => $properties
	);
	array_push($geojson['features'], $feature);
}

header('Content-type: application/json');
echo json_encode($geojson, JSON_PRETTY_PRINT);

//for local json files use code below

$fp = fopen('data.json', 'w');
fwrite($fp,json_encode($geojson));
fclose($fp);

$conn = NULL;

?>