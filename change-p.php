<?php 
session_start();

if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {

    include "db_conn.php";

if (isset($_POST['oldp']) && isset($_POST['newp'])
    && isset($_POST['cnewp'])) {


	$oldp = ($_POST['oldp']);
	$newp = ($_POST['newp']);
	$cnewp = ($_POST['cnewp']);
    
    if(empty($oldp)){
      header("Location: change-password.php?error=Απαιτείται ο τρέχων κωδικός");
	  exit();
    }else if(empty($newp)){
      header("Location: change-password.php?error=Απαιτείται ο παλιός κωδικός");
	  exit();
    }else if($newp !== $cnewp){
      header("Location: change-password.php?error=Δεν ταιριάζουν οι κωδικοί μεταξύ τους");
	  exit();
    }else {
    	// hashing the password
    	$oldp = md5($oldp);
    	$newp = md5($newp);
        $user_id = $_SESSION['user_id'];

        $sql = "SELECT password
                FROM user WHERE 
                user_id='$user_id' AND password='$oldp'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) === 1){
        	
        	$sql_2 = "UPDATE user
        	          SET password='$newp'
        	          WHERE user_id='$user_id'";
        	mysqli_query($conn, $sql_2);
        	header("Location: change-password.php?success=Επιτυχής αλλαγή κωδικού!");
	        exit();

        }else {
        	header("Location: change-password.php?error=Λάθος κωδικός");
	        exit();
        }

    }

    
}else{
	header("Location: change-password.php");
	exit();
}

}else{
     header("Location: index.php");
     exit();
}