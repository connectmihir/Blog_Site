<?php 
session_start();

include "database.php";

if(!isset($_SESSION['user_role'])){
    echo"Get the fuch off bitch!!! \n  u are not admin!";
    header("Location: login.php");
}

else{

    if($_SESSION['user_role'] == "admin"){
        if(isset($_POST['submit'])){
            $name=$_POST['name'];
            $sql= "INSERT INTO categories(name)  VALUES ('')";
        }
        }

        else{
            
            header("Location: dashboard.php");
        }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form method="POST   ">
    <input type="name" name ="name">
    <input type="submit" name ="submit" value= "Add category">
</form>
    
</body>
</html>