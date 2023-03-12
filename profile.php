<?php 
include "db_conn.php";
session_start();

$user_id=$_SESSION["user_id"];
 
    

    $sql = "SELECT * FROM offer WHERE user_id=$user_id";
    $result = $conn->query($sql);
    foreach ($result as $row) {
      //  echo '<div class="off2">';

        $product_id = $row['product_id'];
    $offer_price = $row['offer_price'];
    $offer_date = $row['offerdate'];
    $shop_id = $row['shop_id'];
    $sql = "SELECT product_name FROM product WHERE product_id=$product_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $product_name = $row['product_name'];
    //echo  "sk $product_name";
    //echo '<form action="" method="post">';
   // echo  "sk $product_name";
    //echo '</form>';

    $sql = "SELECT name FROM shop WHERE shop_id=$shop_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $name = $row['name'];
    /*echo '<form action="" method="post">';
    echo  "sk $product_name";
    echo "$name";
    echo '</form>';*/
    
    echo '<form action="" method="post">';
    echo "Όνομα προιόντος: $product_name ";
    echo "<br \>";
    echo "Κατάστημα: $name"; 
    echo "<br \>";
    echo "Τιμή Προσφοράς:$offer_price";
    echo "<br \>";
    echo "Ημερομηνία προσφοράς: $offer_date";
    echo '</form>';
  //  echo '</div>';
      }

      $sql = "SELECT score,score_history,token,token_history FROM user WHERE user_id=$user_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $score = $row['score'];
    $score_history = $row['score_history'];
    $token = $row['token'];
    $token_history = $row['token_history'];
    

    

    echo '<form action="" method="post">';
    echo "Συνολικό σκορ: $score";
    echo "<br \>";
    echo "Ιστορικό σκορ: $score_history";
    echo "<br \>";
    echo "Συνολικά token: $token";
    echo "<br \>"; 
    echo "Ιστορικό token: $token_history";
    echo "<br \>";
      echo '</form>';
     
/*while ($row = $result->fetch_assoc()) {

    $product_id = $row['product_id'];
    $offer_price = $row['offer_price'];
    echo "$product_id";
}*/

?>
<style>
h3{
	text-align: center;
	color: rgb(6, 0, 0);
    font-size: 30px;

}.off2{
  width: 30%;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
 background-color: #fff;
  display: inline-block; 
  background-repeat: no-repeat;
  background-size: 40px;
  padding: 12px 20px 12px 40px;
  white-space: nowrap;
  
}

</style>

<!DOCTYPE html>
<title>Προφίλ Χρήστη</title>
<link rel="stylesheet" type="text/css" href="style.css">

<Head>
    
    <body>
        
        <div class="container">
        <div class="profile">

        <form>
           <h3>Γειά σου, <?php echo $_SESSION['username']; ?></h3>
          
           <table>
                    <tr>
                        <th>Όνομα Χρήστη:</th>
                        <th><?php echo $_SESSION['username']; ?></th>
                        
                    <tr>
                            
                    <tr>
                        <th>Email:</th>
                        <th><?php echo $_SESSION['email']; ?></th>
                    </tr>
                    
           </table>
            <br />
            <br />

           

            <a href="change-password.php" class="button">Άλλαξε Κωδικό</a>
            <br/>
           <a href="change-username.php" class="button">Άλλαξε Όνομα Χρήστη</a>
           </form>
        </div>
        
    </body>
</Head>

</html>
