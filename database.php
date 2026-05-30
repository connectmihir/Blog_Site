<?php

use Dom\Sqlite;

$server="localhost";
$user="root";
$password="";
$dbname= "blog_site";

$connection =new mysqli($server,$user, $password, $dbname);

if(!$connection){
    echo"Error!!: {$connection->connect_error}";
}

else{
    echo"Successfully connected to the database!!!!";
}
?>