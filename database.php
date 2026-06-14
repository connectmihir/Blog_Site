<!-- This used to create the database connections -->


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


// mysqli is a class which i created an object and stored in connection variable

$connection =new mysqli($server,$user, $password, $dbname);

//Now we check that did we created the object successfully.

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

?>