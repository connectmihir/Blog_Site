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
    echo"<a href='deletepost.php?post_id={$row['id']}'>Delete the post!!</a> <br>";
    

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>
</head>
<body>

<form action="postdisplay.php">


<textarea name="comment" placeholder="We love to hear you and learn from you!!">

</textarea>

<button id="login" 
        name="insert_comment" >Insert Comment</button>




</form>
    
</body>
</html>