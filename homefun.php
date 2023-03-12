<?php
 
 require_once 'homecon.php';

class Map{
  private $latitude;
  private $longitude;
  private $name;

      

      public function showLocationList(){
        $stmt = (new Connection)->connect()->prepare("SELECT * FROM shop");
        $stmt -> execute();
        return $stmt -> fetchAll();
       // $stmt -> close();
       // $stmt = null;


      }
     public function showOfferList(){
      $stmt = (new Connection)->connect()->prepare("SELECT offer.shop_id, shop.name,shop.longitude,shop.latitude
                                                    FROM offer
                                                    INNER JOIN shop ON offer.shop_id=shop.shop_id");
      $stmt -> execute();
      return $stmt -> fetchAll();

     }

     public function showMora(){
      $stmt = (new Connection)->connect()->prepare("SELECT shop.name,shop.longitude,shop.latitude FROM product 

      INNER JOIN offer 
      ON product.product_id = offer.product_id
      INNER JOIN shop
      ON offer.shop_id = shop.shop_id
      WHERE category_id = '8016e637b54241f8ad242ed1699bf2da' ");
      $stmt -> execute();
      return $stmt -> fetchAll();
     }
     
     public function showTrofima(){
      $stmt = (new Connection)->connect()->prepare("SELECT shop.name,shop.longitude,shop.latitude FROM product 

      INNER JOIN offer 
      ON product.product_id = offer.product_id
      INNER JOIN shop
      ON offer.shop_id = shop.shop_id
      WHERE category_id = 'ee0022e7b1b34eb2b834ea334cda52e7' ");
      $stmt -> execute();
      return $stmt -> fetchAll();
     }

     public function showKathariothta(){
      $stmt = (new Connection)->connect()->prepare("SELECT shop.name,shop.longitude,shop.latitude FROM product 

      INNER JOIN offer 
      ON product.product_id = offer.product_id
      INNER JOIN shop
      ON offer.shop_id = shop.shop_id
      WHERE category_id = 'd41744460283406a86f8e4bd5010a66d' ");
      $stmt -> execute();
      return $stmt -> fetchAll();
     }

     public function showDrinks(){
      $stmt = (new Connection)->connect()->prepare("SELECT shop.name,shop.longitude,shop.latitude FROM product 

      INNER JOIN offer 
      ON product.product_id = offer.product_id
      INNER JOIN shop
      ON offer.shop_id = shop.shop_id
      WHERE category_id = 'a8ac6be68b53443bbd93b229e2f9cd34' ");
      $stmt -> execute();
      return $stmt -> fetchAll();
     }

     public function showPersonalCare(){
      $stmt = (new Connection)->connect()->prepare("SELECT shop.name,shop.longitude,shop.latitude FROM product 

      INNER JOIN offer 
      ON product.product_id = offer.product_id
      INNER JOIN shop
      ON offer.shop_id = shop.shop_id
      WHERE category_id = '8e8117f7d9d64cf1a931a351eb15bd69' ");
      $stmt -> execute();
      return $stmt -> fetchAll();
     }

}


?>
