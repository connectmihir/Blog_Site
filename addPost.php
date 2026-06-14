<?php

session_start();

include "database.php";

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
}
else{
    if(in_array($_SESSION['user_role'], ['author','admin']) ){

    $sql= "SELECT * FROM categories";
    $result = mysqli_query($connection, $sql);

    if(!$result){
         die("Connection failed: " . $connection->connect_error);
    }

    }

    else{echo"You are not authorized to access this page.";
        header("Location: login.php");
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add_Post</title>
</head>
<body>

<form action="addPost.php" method="post" enctype="multipart/form-data">

<input type="text" name="title">
<textarea name="content" id=""></textarea>
<select name="category" id="category" >
<option value="#">Food</option>

</select>

<input type="file" name="file">


</form>
    
</body>
</html>
