<?php 
session_start();

if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Άλλαξε Κωδικό</title> 
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <form action="change-p.php" method="post">
     	<h2>Άλλαξε Κωδικό</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

         <?php if (isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>


     	<label>Παλίος Κωδικός</label>
     	<input type="password" 
     	       name="oldp" 
     	       placeholder="Παλίος Κωδικός">
     	       <br>

     	<label>Νέος Κωδικός</label>
     	<input type="password" 
     	       name="newp" 
     	       placeholder="Νέος Κωδικός">
     	       <br>

     	<label>Επιβεβαίωσε Νέο Κωδικό</label>
     	<input type="password" 
     	       name="cnewp" 
     	       placeholder="Επιβεβαίωσε Νέο Κωδικό">
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