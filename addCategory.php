<?php
session_start();
include "database.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SESSION['user_role'] !== "admin") {
    header("Location: dashboard.php");
    exit();
}

$success_message = "";
$error_message = "";

/* Add category */
if (isset($_POST['submit'])) {

    $name = trim($_POST['name']);

    if (empty($name)) {
        $error_message = "Please enter a category name.";
    } else {

        /* Check whether category already exists */
        $check_sql = "SELECT * FROM categories WHERE name='$name'";
        $check_result = mysqli_query($connection, $check_sql);

        if (mysqli_num_rows($check_result) > 0) {
            $error_message = "This category already exists.";
        } else {

            $sql = "INSERT INTO categories(name) VALUES ('$name')";
            $result = mysqli_query($connection, $sql);

            if (!$result) {
                $error_message = "Error: " . $connection->error;
            } else {
                $success_message = "Category added successfully.";
            }
        }
    }
}

/* Delete category */
if (isset($_GET['delete_id'])) {

    $delete_id = $_GET['delete_id'];

    $delete_sql = "DELETE FROM categories WHERE id='$delete_id'";
    $delete_result = mysqli_query($connection, $delete_sql);

    if ($delete_result) {
        header("Location: category.php");
        exit();
    } else {
        $error_message = "Category cannot be deleted because it may be connected to a post.";
    }
}

/* Fetch all categories */
$category_sql = "SELECT * FROM categories ORDER BY id DESC";
$category_result = mysqli_query($connection, $category_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Categories | BlogSpace</title>

    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="category.css">
</head>

<body>

<?php include "header.php"; ?>

<main class="category-page">

    <section class="category-container">

        <div class="category-heading">
            <p class="page-tag">BLOG MANAGEMENT</p>
            <h1>Manage Categories</h1>
            <p>Add categories to organise your blog posts properly.</p>
        </div>

        <?php if ($success_message != "") { ?>
            <div class="success-message">
                <?php echo $success_message; ?>
            </div>
        <?php } ?>

        <?php if ($error_message != "") { ?>
            <div class="error-message">
                <?php echo $error_message; ?>
            </div>
        <?php } ?>

        <div class="category-grid">

            <section class="add-category-card">

                <h2>Add New Category</h2>

                <form method="POST" class="category-form">

                    <label for="name">Category name</label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        placeholder="Example: Technology"
                        required
                    >

                    <button type="submit" name="submit">
                        Add Category
                    </button>

                </form>

            </section>

            <section class="category-list-card">

                <div class="list-heading">
                    <h2>Existing Categories</h2>
                    <span>
                        <?php echo mysqli_num_rows($category_result); ?> Categories
                    </span>
                </div>

                <?php if (mysqli_num_rows($category_result) > 0) { ?>

                    <div class="category-list">

                        <?php while ($row = mysqli_fetch_assoc($category_result)) { ?>

                            <div class="category-item">

                                <div class="category-name">
                                    <span class="category-icon">#</span>
                                    <?php echo htmlspecialchars($row['name']); ?>
                                </div>

                                <a
                                    class="delete-category"
                                    href="category.php?delete_id=<?php echo $row['id']; ?>"
                                    onclick="return confirm('Are you sure you want to delete this category?');"
                                >
                                    Delete
                                </a>

                            </div>

                        <?php } ?>

                    </div>

                <?php } else { ?>

                    <p class="empty-category">
                        No categories found. Add your first category.
                    </p>

                <?php } ?>

            </section>

        </div>

    </section>

</main>

</body>
</html>