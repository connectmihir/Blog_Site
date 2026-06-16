<?php

use LDAP\Result;

session_start();

include "database.php";

$sql= "select * from posts";

$Result= mysqli_query($connection, $sql);

while($row= mysqli_fetch_assoc($Result)){
    echo"{$row['Titile']}<br>";
    echo"{$row['description']}<br>";
    echo"{$row['image']}<br>";
}



?>