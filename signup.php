<?php
include "db_conn.php";

?>


<!DOCTYPE html>
<html>
<head>
	<title>Εγγραφή</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     
     <form action="signup-check.php" method="post">
     	<h2>Εγγραφή</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

          <label>Όνομα Χρήστη</label>
          <?php if (isset($_GET['username'])) { ?>
               <input type="text" 
                      name="username" 
                      placeholder="Όνομα Χρήστη"
                      value="<?php echo $_GET['username']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="username" 
                      placeholder="Όνομα Χρήστη"><br>
          <?php }?>

          <label>Email</label>
          <?php if (isset($_GET['email'])) { ?>
               <input type="text" 
                      name="email" 
                      placeholder="Email"
                      value="<?php echo $_GET['email']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="email" 
                      placeholder="Email"><br>
          <?php }?>


     	<label>Κωδικός</label>
     	<input type="password" 
                 name="password" 
                 id="password"
                 placeholder="Κωδικός" onkeyup="return validate()"><br>

          <label>Επαλήθευση Κωδικού</label>
          <input type="password" 
                 name="cpassword" 
                 id="cpassword"
                 placeholder="Επαλήθευση Κωδικού" onkeyup="return confirmm()"><br>

                
                 
                 
                 <ul>
                    <li id="upper">Τουλάχιστον ένα κεφαλαίο</li>
                    <li id="lower">Τουλάχιστον ένα μικρό</li>
                    <li id="special_character">Τουλάχιστον ένα ειδικό σύμβολο</li>
                    <li id="number">Τουλάχιστον έναν αριθμό</li>
                    <li id="length">Τουλάχιστον 8 χαρακτήρες</li>
                </ul>
                
                
     	<button type="submit">Εγγραφή</button>
         
          <a href="index.php" class="ca">Έχεις ήδη λογαριασμό;</a>
     
          </form>
         <script src="passwordvalidate.js"></script>
        
</body>
</html>

