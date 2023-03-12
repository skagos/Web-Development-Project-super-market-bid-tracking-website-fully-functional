<?php

class Connection{
    public function connect(){
     $link = new PDO("mysql:=127.0.0.1:8011;dbname=projectdatabase", "root", "");
     $link -> exec("set names utf8");
     return $link;
    }

}

?>
