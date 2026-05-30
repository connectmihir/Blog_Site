<?php

if(isset($_POST['Register'])){

//Storing the input from the user
$name= $_POST['name'];
$email= $_POST['email'];
$password= $_POST['password'];
$role= $_POST['role'];

//connecting input to database

    include "database.php";
    session_start();

    //Query variable

    $sql="INSERT INTO user(name,email,password,role	) VALUES('$name','$email','$password','$role')";

    //Applying quesry

    $result= mysqli_query($connection, $sql);

    if(!$result){
        echo"Error in : {$connection->error}";
    }

    else{
        echo"Successfully connected to database ";
    }


}

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="/Blog_Site/registerStyle.css">
</head>

<body>

       <form method="POST">
        <h2>Contact Form</h2>

        <label for="name">Name:</label>
        <input
            type="text"
            id="name"
            name="name"
            required
        >

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

        <label for="role">Role:</label>
        <select id="role" name="role" required>
            <option value="">Select Role</option>
            <option value="subscriber">Subscriber</option>
            <option value="admin">Admin</option>
            <option value="author">Author</option>
        </select>

        <button id="Register" 
        name="Register" type="Register">Register</button>
    </form>


</body>
</html>