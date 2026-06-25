<?php
session_start();
include "database.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['insert_comment'])) {

    $post_id = $_POST['post_id'];
    $user_name = $_SESSION['user_name'];
    $email = $_SESSION['email'];
    $comment = $_POST['comment'];

    $sql = "INSERT INTO comment (post_id, email, user_name, comment)
            VALUES ('$post_id', '$email', '$user_name', '$comment')";

    $result = mysqli_query($connection, $sql);

    if (!$result) {
        die("Comment insert error: " . $connection->error);
    }

    header("Location: singlepost.php?post_id=$post_id");
    exit();
}
?>