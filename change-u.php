<?php 
session_start();

if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {

    include "db_conn.php";

if (isset($_POST['pass']) && isset($_POST['newu'])
    && isset($_POST['cnewu'])) {


	$pass = ($_POST['pass']);
	$newu = ($_POST['newu']);
	$cnewu = ($_POST['cnewu']);
    
    if(empty($pass)){
      header("Location: change-username.php?error=Απαιτείται ο τρέχων κωδικός");
	  exit();
    }else if(empty($newu)){
      header("Location: change-username.php?error=Απαιτείται καινούργιο όνομα χρήστη");
	  exit();
    }else if($newu !== $cnewu){
      header("Location: change-username.php?error=Δεν ταιριάζουν τα ονόματα χρηστών");
	  exit();
    }else {
    	// hashing the password
    	$pass = md5($pass);
    	$newu;
        $user_id = $_SESSION['user_id'];

        $sql = "SELECT username
                FROM user WHERE 
                user_id='$user_id' AND password='$pass'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) === 1){
        	
        	$sql_2 = "UPDATE user
        	          SET username='$newu'
        	          WHERE user_id='$user_id'";
        	mysqli_query($conn, $sql_2);
        	header("Location: change-username.php?success=Το όνομα χρήστη άλλαξε με επιτυχία");
	        exit();

        }else {
        	header("Location: change-username.php?error=Λάθος κωδικός");
	        exit();
        }

    }

    
}else{
	header("Location: change-username.php");
	exit();
}

}else{
     header("Location: index.php");
     exit();
}