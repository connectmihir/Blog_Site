<?php


session_start();

include "database.php";

if (!isset($_SESSION['user_id'])) {
    header("location: login.php");
    exit();
} 

else {

        if (isset($_GET['post_id'])) {
            $post_id = $_GET['post_id'];
        }

        $sql = "delete from post where id='$post_id'";
        $result = mysqli_query($connection, $sql);

        if (!$result) {
            die("Connection failed: " . $connection->connect_error);
        } 
        
        else {
            echo "deleted SuccessFully";
        }
    }

?>