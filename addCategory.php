<?php 
session_start();

include "database.php";

if(!isset($_SESSION['user_role'])){ 
    header("Location: login.php");
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
    <title>Document</title>
</head>
<body>

<form method="POST   ">
    <input type="name" name ="name">
    <input type="submit" name ="submit" value= "Add category">
</form>
    
</body>
</html>