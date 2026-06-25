<?php 
session_start();

include "database.php";

//this is used for collecting info of user; if it does not get any user_role, because only admin can add and delete categgory.

if(!isset($_SESSION['user_role'])){ 
    header("Location: login.php");
    exit();
}

else{

    if($_SESSION['user_role'] == "admin"){
        if(isset($_POST['submit'])){

         //name variable will store the value of user 
            $name=$_POST['name'];

            //sql variable will store the sql query to insert into the table of categories.

            $sql= "INSERT INTO categories(name)  VALUES ('$name')";

            //Result will execute the query.

            $result= mysqli_query($connection, $sql);
            
            //For checking the connections
            if(!$result){
                echo"ERROR!: {$connection->error}";
                 }

            else{
                    echo"category added successfully";
                }

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
    <title>Add category</title>
    <link rel="stylesheet" href="header.css">
</head>
<body>
    <?php include "header.php"; ?>

<form method="POST">
    <input type="text" name ="name">
    <input type="submit" name ="submit" value= "Add category">
</form>
    
</body>
</html>