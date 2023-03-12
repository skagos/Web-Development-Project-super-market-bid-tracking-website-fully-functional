<?php 
session_start(); 
include "db_conn.php";



if (isset($_POST['email']) && isset($_POST['password'])
    && isset($_POST['username']) && isset($_POST['cpassword'])) {

	

	$email = ($_POST['email']);
	$pass = ($_POST['password']);

	$cpass = ($_POST['cpassword']);
	$username = ($_POST['username']);
	

	$user_data = 'email='. $email. '&username='. $username;


	if (empty($email)) {
		header("Location: signup.php?error=Απαιτείται όνομα χρήστη&$user_data");
	    exit();
	}else if(empty($pass)){
        header("Location: signup.php?error=Απαιτείται κωδικός&$user_data");
	    exit();
	}
	else if(empty($cpass)){
        header("Location: signup.php?error=Απαιτείται επανάληψη κωδικού&$user_data");
	    exit();
	}

	else if(empty($username)){
        header("Location: signup.php?error=Απαιτείται όνομα χρήστη&$user_data");
	    exit();
	}

	else if($pass !== $cpass){
        header("Location: signup.php?error=Δεν ταιριάζουν οι κωδικοί μεταξύ τους&$user_data");
	    exit();
	}

	else{

		// hashing the password
        $pass = md5($pass);

	    $sql = "SELECT * FROM user WHERE email='$email' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: signup.php?error=Το όνομα χρήστη χρησιμοποιείται, διάλεξε ένα άλλο&$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO user(email, password, username) VALUES('$email', '$pass', '$username')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: login.php?success=Επιτυχής δημιουργία χρήστη");
	         exit();
           }else {
	           	header("Location: signup.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	}

	
}else{
	header("Location: signup.php");
	exit();
}
;
?>
