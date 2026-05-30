<!-- Steps to integrate database:
1. Create neccessary varibles to store information about database.

2. create another variable which stores database connection


3. Use if and else condition to check connection. -->









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