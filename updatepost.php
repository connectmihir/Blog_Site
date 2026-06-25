<?php
session_start();
include "database.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (!in_array($_SESSION['user_role'], ['author', 'admin'])) {
    header("Location: dashboard.php");
    exit();
}

if (!isset($_GET['post_id'])) {
    header("Location: postdisplay.php");
    exit();
}

$post_id = $_GET['post_id'];
$success_message = "";
$error_message = "";

/* Fetch categories */
$category_sql = "SELECT * FROM categories ORDER BY name ASC";
$category_result = mysqli_query($connection, $category_sql);

/* Fetch current post data */
$post_sql = "SELECT * FROM post WHERE id='$post_id'";
$post_result = mysqli_query($connection, $post_sql);

if (mysqli_num_rows($post_result) == 0) {
    header("Location: postdisplay.php");
    exit();
}

$post = mysqli_fetch_assoc($post_result);

/* Update post */
if (isset($_POST['update_post'])) {

    $title = $_POST['title'];
    $content = $_POST['content'];
    $category_id = $_POST['category_id'];

    $image = $post['image'];

    /* If user uploads a new image */
    if (!empty($_FILES['image']['name'])) {

        $image = $_FILES['image']['name'];
        $temp_location = $_FILES['image']['tmp_name'];
        $image_location = "Image/" . $image;

        move_uploaded_file($temp_location, $image_location);
    }

    $update_sql = "UPDATE post 
                   SET title='$title',
                       content='$content',
                       image='$image',
                       category_id='$category_id'
                   WHERE id='$post_id'";

    $update_result = mysqli_query($connection, $update_sql);

    if ($update_result) {
        $_SESSION['success_message'] = "Post updated successfully.";
        header("Location: postdisplay.php");
        exit();
    } else {
        $error_message = "Update failed: " . $connection->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Post | BlogSpace</title>

    <link rel="stylesheet" href="updatepost.css">
    <link rel="stylesheet" href="header.css">
</head>

<body>

<?php include "header.php"; ?>

<main class="update-page">

    <section class="update-container">

        <div class="update-heading">
            <p class="page-tag">CONTENT MANAGEMENT</p>
            <h1>Update Blog Post</h1>
            <p>Edit your post details and publish the latest version.</p>
        </div>

        <?php if ($error_message != "") { ?>
            <div class="error-message">
                <?php echo $error_message; ?>
            </div>
        <?php } ?>

        <form action="" method="POST" enctype="multipart/form-data" class="update-form">

            <div class="form-grid">

                <div class="form-main">

                    <div class="form-group">
                        <label for="title">Post title</label>

                        <input
                            type="text"
                            id="title"
                            name="title"
                            value="<?php echo htmlspecialchars($post['title']); ?>"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="content">Post content</label>

                        <textarea
                            id="content"
                            name="content"
                            rows="12"
                            required
                        ><?php echo htmlspecialchars($post['content']); ?></textarea>
                    </div>

                </div>

                <aside class="form-sidebar">

                    <div class="sidebar-card">

                        <h2>Post settings</h2>

                        <div class="form-group">
                            <label for="category_id">Category</label>

                            <select id="category_id" name="category_id" required>

                                <?php while ($category = mysqli_fetch_assoc($category_result)) { ?>

                                    <option
                                        value="<?php echo $category['id']; ?>"
                                        <?php
                                        if ($category['id'] == $post['category_id']) {
                                            echo "selected";
                                        }
                                        ?>
                                    >
                                        <?php echo htmlspecialchars($category['name']); ?>
                                    </option>

                                <?php } ?>

                            </select>
                        </div>

                    </div>

                    <div class="sidebar-card image-card">

                        <h2>Featured image</h2>

                        <?php if (!empty($post['image'])) { ?>
                            <img
                                class="current-image"
                                src="Image/<?php echo htmlspecialchars($post['image']); ?>"
                                alt="Current post image"
                            >
                        <?php } else { ?>
                            <div class="no-image">
                                No image uploaded
                            </div>
                        <?php } ?>

                        <label class="file-label" for="image">
                            Choose new image
                        </label>

                        <input
                            type="file"
                            id="image"
                            name="image"
                            accept="image/*"
                        >

                        <p class="file-help">
                            Leave this empty if you want to keep the current image.
                        </p>

                    </div>

                    <div class="action-buttons">

                        <button type="submit" name="update_post" class="update-btn">
                            Save Changes
                        </button>

                        <a href="postdisplay.php" class="cancel-btn">
                            Cancel
                        </a>

                    </div>

                </aside>

            </div>

        </form>

    </section>

</main>

</body>
</html>