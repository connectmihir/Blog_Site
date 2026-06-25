<?php
session_start();
include "database.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (!in_array($_SESSION['user_role'], ['author', 'admin'])) {
    echo "You are not authorised to delete posts.";
    exit();
}

if (!isset($_GET['post_id'])) {
    header("Location: postdisplay.php");
    exit();
}

$post_id = $_GET['post_id'];

/* First delete comments related to this post */
$delete_comments = "DELETE FROM comment WHERE post_id='$post_id'";
$result_comments = mysqli_query($connection, $delete_comments);

if (!$result_comments) {
    die("Error deleting comments: " . $connection->error);
}

/* Then delete the post */
$delete_post = "DELETE FROM post WHERE id='$post_id'";
$result_post = mysqli_query($connection, $delete_post);

if (!$result_post) {
    die("Error deleting post: " . $connection->error);
}

header("Location: postdisplay.php");
exit();
?>