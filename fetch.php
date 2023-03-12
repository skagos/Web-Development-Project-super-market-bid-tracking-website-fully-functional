<?php

//fetch.php;

$connect = new PDO("mysql:host=localhost; dbname=projectdatabase", "root", "");

if(isset($_POST['queryu']))
{
 $queryu = "
 SELECT DISTINCT product_name,product_id FROM product
 WHERE product_name LIKE '%".trim($_POST["queryu"])."%'
 ";

 $statement = $connect->prepare($queryu);

 $statement->execute();

 $result = $statement->fetchAll();

 $output = '';
    $f = "||";
 foreach($result as $row)
 {
  $output .= '
  <li class="list-group-item contsearch">
   <a href="javascript:void(0)" class="gsearch" style="color:#333;text-decoration:none;">'.$row["product_name"].$f.$row["product_id"].'</a>
  </li>
  ';
 }

 echo $output;
}

