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

    <!-- External CSS file -->
    <link rel="stylesheet" href="postdisplay.css">
</head>

<body>

    <div class="blog-container">

        <h1 class="page-title">Latest Blogs</h1>

        <?php while ($row = mysqli_fetch_assoc($result)) { ?>

            <article class="post-card">

                <h2 class="post-title">
                    <?php echo htmlspecialchars($row['title']); ?>
                </h2>

                <p class="post-content">
                    <?php echo htmlspecialchars($row['content']); ?>
                </p>

                <img class="post-image"
                     src="Image/<?php echo htmlspecialchars($row['image']); ?>"
                     alt="<?php echo htmlspecialchars($row['title']); ?>">

                <?php if (in_array($_SESSION['user_role'], ['author', 'admin'])) { ?>

                    <div class="post-actions">

                        <a class="action-btn update-btn"
                           href="updatepost.php?post_id=<?php echo $row['id']; ?>">
                            Update Post
                        </a>

                        <a class="action-btn delete-btn"
                           href="deletepost.php?post_id=<?php echo $row['id']; ?>"
                           onclick="return confirm('Are you sure you want to delete this post?');">
                            Delete Post
                        </a>

                    </div>

                <?php } ?>

                <form class="comment-form" action="insertcomment.php" method="POST">

                    <input type="hidden"
                           name="post_id"
                           value="<?php echo $row['id']; ?>">

                    <textarea name="comment"
                              placeholder="Write your comment here..."
                              required></textarea>

                    <button class="comment-btn"
                            type="submit"
                            name="insert_comment">
                        Post Comment
                    </button>

                </form>

                <h3 class="comments-heading">Comments</h3>

                <?php
                $post_id = $row['id'];

                $comment_sql = "SELECT * FROM comment
                                WHERE post_id = '$post_id'
                                ORDER BY id DESC";

                $comment_result = mysqli_query($connection, $comment_sql);

                if (mysqli_num_rows($comment_result) > 0) {

                    while ($comment_row = mysqli_fetch_assoc($comment_result)) {
                ?>

                        <div class="comment-card">

                            <strong class="comment-user">
                                <?php echo htmlspecialchars($comment_row['user_name']); ?>
                            </strong>

                            <small class="comment-email">
                                <?php echo htmlspecialchars($comment_row['email']); ?>
                            </small>

                            <p class="comment-text">
                                <?php echo htmlspecialchars($comment_row['comment']); ?>
                            </p>

                        </div>

                <?php
                    }

                } else {
                ?>

                    <p class="no-comments">
                        No comments yet. Be the first to comment.
                    </p>

                <?php } ?>

            </article>

        <?php } ?>

    </div>

</body>
</html>