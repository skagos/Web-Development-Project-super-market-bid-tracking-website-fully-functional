<?php 
session_start();

if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Άλλαξε Όνομα Χρήστη</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <form action="change-u.php" method="post">
     	<h2>Άλλαξε Όνομα Χρήστη</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

         <?php if (isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>


     	<label>Τρέχον Κωδικός</label>
     	<input type="password" 
     	       name="pass" 
     	       placeholder="Τρέχον Κωδικός">
     	       <br>

     	<label>Νέο Όνομα Χρήστη</label>
     	<input type="name"
     	       name="newu" 
     	       placeholder="Νέο Όνομα Χρήστη">
     	       <br>

     	<label>Επιβεβαίωσε Νέο Όνομα Χρήστη</label>
     	<input  type="name"
     	       name="cnewu" 
     	       placeholder="Επιβεβαίωσε Νέο Όνομα Χρήστη">
     	       <br>

     	<button type="submit">ΑΛΛΑΓΗ</button>
          <a href="home.php" class="ca">Αρχική Σελίδα</a>
     </form>
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?> 