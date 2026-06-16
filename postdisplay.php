<?php

use LDAP\Result;

session_start();

include "database.php";

$sql= "select * from posts";

$Result= mysqli_query($connection, $sql);

while($row= mysqli_fetch_assoc($Result)){
    echo"{$row['Titile']}<br>";
    echo"{$row['content']}<br>";
    echo"<img src="/Blog_Site/Image/{$row['image']}" alt=""><br><hr>";
}



?>