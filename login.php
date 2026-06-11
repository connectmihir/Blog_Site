<?php
//connecting input to database

//A session lets you store data on the server and access it across multiple pages for the same user.

//This must usually be called before any HTML output is sent to the browser.
// Without sessions, PHP treats each page request independently. Sessions allow you to remember information such as:

// 1. Logged-in user details
// 2. Shopping cart contents
// 3. User preferences
// 4. Temporary messages

// How it works
// 1. session_start() creates or resumes a session.
// 2. PHP generates or reads a session ID.
// 3. The session ID is stored in a cookie (usually PHPSESSID).
// 4. Session data is stored on the server and accessed through $_SESSION.


// isset() is a PHP function that checks whether a variable exists and is not NULL.

    include "database.php";
    session_start();
    if(isset($_POST['login'])){

    $email= $_POST['email'];
    $password= $_POST['password'];
    
//$sql is the string variable which store query as a string

    $sql= "SELECT * FROM user WHERE email='$email'";

    $result= mysqli_query($connection, $sql);

    if(!$result){
        echo" Error!! :{$connection->error}";

    }

    else{

    //Fetched data is stored in the server.
    // to share the information to other page
        if($result->num_rows>0){
            $row =mysqli_fetch_assoc($result);

        $_SESSION['user_id']= $row['id'];
        $_SESSION['user_name']= $row['name'];
        $_SESSION['user_role']= $row['role'];

            echo"Successfully fetch the connection <a href='/PHP_PROJECT\Blog_Site\dashboard.php'> Click to visit your dashboard.</a>";
        }

        else{
            
        echo"<a href='/Blog_Site/register.php'> Please register yourself</a>";
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
