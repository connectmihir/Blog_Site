<?php 
session_start();
include "database.php";

if (!isset($_SESSION['user_role'])) { 
    header("Location: login.php");
    exit();
}

if ($_SESSION['user_role'] != "admin") {
    header("Location: dashboard.php");
    exit();
}

$message = "";

if (isset($_POST['submit'])) {

    $name = $_POST['name'];

    $sql = "INSERT INTO categories(name) VALUES ('$name')";
    $result = mysqli_query($connection, $sql);

    if (!$result) {
        $message = "Error: " . $connection->error;
    } else {
        $message = "Category added successfully.";
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
            <p class="page-tag">ADMIN PANEL</p>
            <h1>Manage Categories</h1>
            <p>Add or remove categories for blog posts.</p>
        </div>

        <?php if ($message != "") { ?>
            <p class="message"><?php echo $message; ?></p>
        <?php } ?>

        <form method="POST" class="category-form">

            <input 
                type="text" 
                name="name" 
                placeholder="Enter category name"
                required
            >

            <button type="submit" name="submit">
                Add Category
            </button>

        </form>

        <section class="category-list">

            <h2>All Categories</h2>

            <?php if (mysqli_num_rows($category_result) > 0) { ?>

                <?php while ($category = mysqli_fetch_assoc($category_result)) { ?>

                    <div class="category-item">

                        <span>
                            <?php echo htmlspecialchars($category['name']); ?>
                        </span>

                        <a 
                            class="delete-category-btn"
                            href="deletecategory.php?id=<?php echo $category['id']; ?>"
                            onclick="return confirm('Are you sure you want to delete this category?');"
                        >
                            Delete
                        </a>

                    </div>

                <?php } ?>

            <?php } else { ?>

                <p>No categories found.</p>

            <?php } ?>

        </section>

    </section>

</main>

</body>
</html>