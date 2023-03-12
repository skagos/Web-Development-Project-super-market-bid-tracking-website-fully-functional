<html>
<head>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>
  <div id="chart_div"></div>
</body>
</html>
<?php

 
include "db_conn.php";

// Check the connection
if (!$conn) {
    die('Αποτυχία σύνδεσης: ' . mysqli_connect_error());
}

// Select the number of registrations for each date
$sql = "SELECT offerdate, COUNT(*) FROM offer GROUP BY offerdate";
$result = mysqli_query($conn, $sql);

// Create a data table in JavaScript
echo '<script type="text/javascript">';
echo 'google.charts.load(\'current\', {\'packages\':[\'corechart\']});';
echo 'google.charts.setOnLoadCallback(drawChart);';
echo 'function drawChart() {';
echo 'var data = google.visualization.arrayToDataTable([';
echo "['ΗΜΕΡΟΜΗΝΙΑ', 'ΠΡΟΣΦΟΡΕΣ'],";

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "['" . $row['offerdate'] . "', " . $row['COUNT(*)'] . "],";
    }
}

echo ']);';

// Set chart options
echo 'var options = {';
echo "title: 'Number of offers',";
echo "legend: { position: 'none' },";
echo "hAxis: { title: 'ΗΜΕΡΟΜΗΝΙΑ' },";
echo "vAxis: { title: 'ΠΡΟΣΦΟΡΕΣ' }";
echo '};';

// Create the chart
echo 'var chart = new google.visualization.ColumnChart(document.getElementById(\'chart_div\'));';
echo 'chart.draw(data, options);';
echo '}';
echo '</script>';

// Close the connection
mysqli_close($conn);


?>
