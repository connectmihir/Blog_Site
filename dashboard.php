<?php 

session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
}
else{
    echo"WElcome user:{$_SESSION['user_name']} and your role is:{$_SESSION['user_role']}";
}



?>