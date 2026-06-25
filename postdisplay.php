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

    <?php
    $comment_sql = "SELECT * FROM comment 
                    WHERE post_id = '{$row['id']}' 
                    ORDER BY id DESC";

    $comment_result = mysqli_query($connection, $comment_sql);

    while ($comment_row = mysqli_fetch_assoc($comment_result)) {
    ?>

        <div style="border: 1px solid black; padding: 10px; margin-top: 10px;">

            <strong>
                <?php echo $comment_row['user_name']; ?>
            </strong>

            <br>

            <small>
                <?php echo $comment_row['email']; ?>
            </small>

            <p>
                <?php echo $comment_row['comment']; ?>
            </p>

        </div>

    <?php } ?>

    <hr>

<?php } ?>

</body>
</html>