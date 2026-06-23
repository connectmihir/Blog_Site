<?php

use LDAP\Result;

session_start();

include "database.php";

$sql= "select * from post";

$Result= mysqli_query($connection, $sql);

while($row= mysqli_fetch_assoc($Result)){
    echo"{$row['title']}<br>";
    echo"{$row['content']}<br>";
    echo"<img src='Image/{$row['image']}'><br><hr>";

    echo"<a href='updatepost.php?post_id={$row['id']}'>Update the post!!</a> <br>";
    echo"<a href='deletepost.php'>Delete the post!!</a> <br>";
    // echo""<a href="">Delete the post!!</a> <br>

}



?>