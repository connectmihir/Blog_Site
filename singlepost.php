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

/* Fetch post with category and author details */
$post_sql = "SELECT post.*, categories.name AS category_name, user.name AS author_name
             FROM post
             LEFT JOIN categories ON post.category_id = categories.id
             LEFT JOIN user ON post.author_id = user.id
             WHERE post.id='$post_id'";

$post_result = mysqli_query($connection, $post_sql);

if (!$post_result || mysqli_num_rows($post_result) == 0) {
    echo "Post not found.";
    exit();
}

$post = mysqli_fetch_assoc($post_result);

/* Only admin or the post author can update/delete */
$can_manage_post =
    $_SESSION['user_role'] === 'admin' ||
    $_SESSION['user_id'] == $post['author_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo htmlspecialchars($post['title']); ?> | BlogSpace</title>

    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="singlepost.css">
</head>

<body>

<?php include "header.php"; ?>

<main class="single-post-page">

    <a class="back-btn" href="postdisplay.php">
        ← Back to Blogs
    </a>

    <article class="single-post-card">

        <?php if (!empty($post['image'])) { ?>

            <img
                class="single-post-image"
                src="Image/<?php echo htmlspecialchars($post['image']); ?>"
                alt="<?php echo htmlspecialchars($post['title']); ?>"
            >

        <?php } ?>

        <div class="single-post-content">

            <div class="post-meta">

                <?php if (!empty($post['category_name'])) { ?>
                    <span class="category-badge">
                        <?php echo htmlspecialchars($post['category_name']); ?>
                    </span>
                <?php } ?>

                <span class="author-name">
                    By <?php echo htmlspecialchars($post['author_name']); ?>
                </span>

            </div>

            <h1>
                <?php echo htmlspecialchars($post['title']); ?>
            </h1>

            <p class="full-post-text">
                <?php echo nl2br(htmlspecialchars($post['content'])); ?>
            </p>

            <?php if ($can_manage_post) { ?>

                <div class="post-actions">

                    <a class="update-btn"
                       href="updatepost.php?post_id=<?php echo $post['id']; ?>">
                        Update Post
                    </a>

                    <a class="delete-btn"
                       href="deletepost.php?post_id=<?php echo $post['id']; ?>"
                       onclick="return confirm('Are you sure you want to delete this post and its comments?');">
                        Delete Post
                    </a>

                </div>

            <?php } ?>

        </div>

    </article>

    <section class="comments-section">

        <div class="comments-heading">
            <h2>Comments</h2>
        </div>

        <form class="comment-form" action="insertcomment.php" method="POST">

            <input
                type="hidden"
                name="post_id"
                value="<?php echo $post['id']; ?>"
            >

            <textarea
                name="comment"
                placeholder="Write your comment here..."
                required
            ></textarea>

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

            if ($comment_result && mysqli_num_rows($comment_result) > 0) {

                while ($comment = mysqli_fetch_assoc($comment_result)) {
            ?>

                <div class="comment-card">

                    <div class="comment-avatar">
                        <?php echo strtoupper(substr($comment['user_name'], 0, 1)); ?>
                    </div>

                    <div class="comment-body">

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