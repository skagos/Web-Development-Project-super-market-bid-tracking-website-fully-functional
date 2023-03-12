<?php

$host= "localhost";
$user= "root";
$password = "";

$db_name = "projectdatabase";

$conn = mysqli_connect($host, $user, $password, $db_name);

if (!$conn) {
	echo "Αποτυχία σύνδεσης!";
}