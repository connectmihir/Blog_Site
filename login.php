<?php
//connecting input to database

    include "database.php";
    session_start();
    if(isset($_POST['login'])){

    $email= $_POST['email'];
    $password= $_POST['password'];
    

    $sql= "SELECT * FROM user WHERE email='$email'";

    $result= mysqli_query($connection, $sql);

    if(!$result){
        echo" Error!! :{$connection->error}";

    }

    else{
        if($result->num_rows>0){
            $row =mysqli_fetch_assoc($result);

        $_SESSION['user_id']= $row['id'];
        $_SESSION['user_name']= $row['name'];
        $_SESSION['user_role']= $row['role'];

            echo"Successfully fetch the connection <a href='/PHP_PROJECT\Blog_Site\dashboard.php'> Click to visit your dashboard.</a>";
        }
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


<form method="POST">
        <h2>Contact Form</h2>

        <label for="email">Email:</label>
        <input
            type="email"
            id="email"
            name="email"
            required
        >

        <label for="password">password:</label>
        <input
            type="password"
            id="password"
            name="password"
            required
        >


        <button id="login" 
        name="login" type="login">Login</button>
    </form>
    
</body>
</html>
