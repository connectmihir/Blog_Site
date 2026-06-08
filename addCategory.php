<?php 
session_start();

include "database.php";

if(!isset($_SESSION['user_role'])){
    echo"Get the fuch off bitch!!! \n  u are not admin!";
    header("Location: login.php");
}









?>