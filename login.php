<?php 
session_start(); 
$_SESSION["user_id"] = $_GET['user_id'];
$_SESSION["admin"] = $_GET['admin'];

include "db_conn.php";

if (isset($_POST['email']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$email = validate($_POST['email']);
	$pass = validate($_POST['password']);

	if (empty($email)) {
		header("Location: index.php?error=Απαιτείται όνομα χρήστη");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Απαιτείται κωδικός");
	    exit();
	}else{
		// hashing the password
        $pass = md5($pass);

        
		$sql = "SELECT * FROM user WHERE email='$email' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['email'] === $email && $row['password'] === $pass) {
            	//$_SESSION['user_name'] = $row['user_name'];
            	$_SESSION['username'] = $row['username'];
            	$_SESSION['user_id'] = $row['user_id'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['registration_date'] = $row['registration_date'];
				$_SESSION['admin'] = $row['admin'];
				
            	header("Location: home.php");
		        exit();
            }else{
				header("Location: index.php?error=Λάθος όνομα χρήστη ή κωδικός");
		        exit();
			}
		}else{
			header("Location: index.php?error=Λάθος όνομα ή κωδικός");
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}