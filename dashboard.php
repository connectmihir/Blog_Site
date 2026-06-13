<?php 

session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
}
else{

// it just print the data from the server which we stored in the server from the login page.

    echo"WElcome user:{$_SESSION['user_name']} and your role is:{$_SESSION['user_role']}";
}



?>