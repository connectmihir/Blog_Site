<?php
session_start();
include "database.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['post_id'])) {
    header("Location: postdisplay.php");
    exit();
}

$post_id = $_GET['post_id'];

$post_sql = "SELECT * FROM post WHERE id='$post_id'";
$post_result = mysqli_query($connection, $post_sql);

if (!$post_result || mysqli_num_rows($post_result) == 0) {
    echo "Post not found.";
    exit();
}

$post = mysqli_fetch_assoc($post_result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($post['title']); ?></title>

    <link rel="stylesheet" href="singlepost.css">
    <link rel="stylesheet" href="header.css">
</head>

<body>
    <?php include "header.php"; ?>

    <main class="single-post-page">

        <a class="back-btn" href="postdisplay.php">
            ← Back to Blogs
        </a>

        <article class="single-post-card">

            <img class="single-post-image"
                 src="Image/<?php echo htmlspecialchars($post['image']); ?>"
                 alt="<?php echo htmlspecialchars($post['title']); ?>">

            <div class="single-post-content">

                <h1>
                    <?php echo htmlspecialchars($post['title']); ?>
                </h1>

                <p class="full-post-text">
                    <?php echo nl2br(htmlspecialchars($post['content'])); ?>
                </p>

                <?php if (in_array($_SESSION['user_role'], ['author', 'admin'])) { ?>

                    <div class="post-actions">

                        <a class="update-btn"
                           href="updatepost.php?post_id=<?php echo $post['id']; ?>">
                            Update Post
                        </a>

                        <a class="delete-btn"
                           href="deletepost.php?post_id=<?php echo $post['id']; ?>"
                           onclick="return confirm('Are you sure you want to delete this post?');">
                            Delete Post
                        </a>

                    </div>

                <?php } ?>

            </div>

        </article>

        <section class="comments-section">

            <h2>Comments</h2>

            <form class="comment-form" action="insertcomment.php" method="POST">

                <input type="hidden"
                       name="post_id"
                       value="<?php echo $post['id']; ?>">

                <textarea name="comment"
                          placeholder="Write your comment here..."
                          required></textarea>

                <button type="submit" name="insert_comment">
                    Post Comment
                </button>

            </form>

            <div class="comments-list">

                <?php
                $comment_sql = "SELECT * FROM comment
                                WHERE post_id='$post_id'
                                ORDER BY id DESC";

                $comment_result = mysqli_query($connection, $comment_sql);

                if (mysqli_num_rows($comment_result) > 0) {

                    while ($comment = mysqli_fetch_assoc($comment_result)) {
                ?>

                        <div class="comment-card">

                            <div class="comment-user">
                                <?php echo htmlspecialchars($comment['user_name']); ?>
                            </div>

                            <div class="comment-email">
                                <?php echo htmlspecialchars($comment['email']); ?>
                            </div>

                            <p>
                                <?php echo nl2br(htmlspecialchars($comment['comment'])); ?>
                            </p>

                        </div>

                <?php
                    }

                } else {
                ?>

                    <p class="no-comments">
                        No comments yet. Be the first person to comment.
                    </p>

                <?php } ?>

            </div>

        </section>

    </main>

</body>
</html>