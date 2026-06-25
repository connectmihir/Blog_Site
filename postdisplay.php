<?php
session_start();
include "database.php";

if (!isset($_SESSION['user_name'])) {
    header("location: dashboard.php");
    exit();
}

$sql = "SELECT * FROM post";
$result = mysqli_query($connection, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>
</head>
<body>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>

    <h2><?php echo $row['title']; ?></h2>

    <p><?php echo $row['content']; ?></p>

    <img src="Image/<?php echo $row['image']; ?>" width="300">

    <br><br>

    <?php if (in_array($_SESSION['user_role'], ['author', 'admin'])) { ?>

        <a href="updatepost.php?post_id=<?php echo $row['id']; ?>">
            Update the post
        </a>

        <br>

        <a href="deletepost.php?post_id=<?php echo $row['id']; ?>">
            Delete the post
        </a>

        <br><br>

    <?php } ?>

    <form action="insertcomment.php" method="POST">

        <input type="hidden" name="post_id" value="<?php echo $row['id']; ?>">

        <textarea name="comment"
                  placeholder="We love to hear from you and learn from you!"
                  required></textarea>

        <br>

        <button type="submit" name="insert_comment">
            Insert Comment
        </button>

    </form>

    <hr>

<?php } ?>

</body>
</html>