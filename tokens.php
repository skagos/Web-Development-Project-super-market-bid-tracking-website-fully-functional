<?php
include "db_conn.php";
//$conn = mysqli_connect('localhost', 'root', '', 'projectdatabase');

if (date("d") == "01") {
    $result = mysqli_query($conn, "SELECT COUNT(*) FROM user");
    $num_users = mysqli_fetch_array($result)[0];
    
    // Multiply the number of users by a number
    $tokens_for_every_user = 100;
    $tokenamount = $num_users * $tokens_for_every_user;
    
    // Output the result
    //echo "This months all the token is: " . $tokenamount;
    $tokenamountforshare = $tokenamount * 0.8;
     
}

    //$tokenamountforshare = $tokenamount * 0.8;

if (date("d") == "01") {
    $result = mysqli_query($conn, "SELECT COUNT(*) FROM user");
    $num_users_end = mysqli_fetch_array($result)[0];
    $resultt = mysqli_query($conn, "SELECT SUM(score) FROM user");
    $total_score = mysqli_fetch_array($resultt)[0];
    
    // Multiply the number of users by a number
    //$tokens_for_every_user = $tokenamountforshare / $num_users_end ;
    $tokens_for_every_user = 40;
    //$everyusertokenamount = (100 * $score) / $total_score;
    $sql = "SELECT user_id,score FROM user";
    $result = $conn->query($sql);
    
    while ($row = $result->fetch_assoc()) {
        
        $score = $row['score'];
        $user_id = $row['user_id'];
        //echo "----$score--";
        $pososto = ((100 * $score) / $total_score);
        $posostokalo = $pososto / 100;
        $everyusertokenamount = $tokenamountforshare * $posostokalo;

        //echo "| $pososto |" ;
        $querytoken = " UPDATE user SET token =('".$everyusertokenamount."') WHERE  user_id = $user_id ";
        $run = mysqli_query($conn, $querytoken);
        $querytokenall = " UPDATE user SET token_history = token_history + ('".$everyusertokenamount."') WHERE  user_id = $user_id";
        $run = mysqli_query($conn, $querytokenall);
        $queryscore = " UPDATE user SET score_history = score_history + ('".$score."') WHERE  user_id = $user_id ";
        $run = mysqli_query($conn, $queryscore);
        $queryscore = " UPDATE user SET score = 0 WHERE  user_id = $user_id ";
        $run = mysqli_query($conn, $queryscore);
    }
    //echo "$total_score";
} 


mysqli_close($conn);


