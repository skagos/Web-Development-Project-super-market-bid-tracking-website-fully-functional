<?php

$db = mysqli_connect('localhost', 'root', '', 'projectdatabase');

// Calculate the date one week ago
$date_one_week_ago = date('Y-m-d', strtotime('-1 week'));

// Delete records that are older than one week
$sql = "DELETE FROM offer WHERE offerdate < '$date_one_week_ago'";
if (mysqli_query($db, $sql)) {
} else {
  echo "Σφάλμα διαγραφής αρχείων: " . mysqli_error($db);
}


mysqli_close($db);
