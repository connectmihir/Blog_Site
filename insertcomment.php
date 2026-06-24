<?php

session_start();

include "database.php";

if(!isset($SESSION['user_id'])){
    header("location: login.php");
}



?>