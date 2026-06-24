<?php

use LDAP\Result;

session_start();

include "database.php";

if(isset($_SESSION['user_name'])){
    $user_name=$_SESSION['user_name'];
}

else{
    header("location: dashboard.php");
    exit();
}

$sql= "select * from post";

$Result= mysqli_query($connection, $sql);

while($row= mysqli_fetch_assoc($Result)){
    echo"{$row['title']}<br>";
    echo"{$row['content']}<br>";
    echo"<img src='Image/{$row['image']}'><br><hr>";
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

<form action="postdisplay.php?user_name=$user_name">

<input type="hidden" name="post_id" value="<?php echo $row['id']; ?>">
    <?php if (in_array($_SESSION['user_role'], ['author', 'admin'])) { ?>

        <a href="updatepost.php?post_id=<?php echo $row['id']; ?>">
            Update the post
        </a>

        <br>

        <a href="deletepost.php?post_id=<?php echo $row['id']; ?>">
            Delete the post
        </a>

        <br><br>

    <?php } ?>


<textarea name="comment" placeholder="We love to hear you and learn from you!!">

</textarea>

<button id="login" 
        name="insert_comment" >Insert Comment</button>

    </form>
    
</body>
</html>