<?php
session_start();
include "database.php";

/* Only admin can delete categories */
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] != "admin") {
    header("Location: dashboard.php");
    exit();
}

/* Check category ID */
if (!isset($_GET['id'])) {
    header("Location: addCategory.php");
    exit();
}

$category_id = $_GET['id'];

/* Check whether this category is used in any post */
$check_sql = "SELECT * FROM post WHERE category_id='$category_id'";
$check_result = mysqli_query($connection, $check_sql);

if (mysqli_num_rows($check_result) > 0) {

    echo "
        <script>
            alert('This category cannot be deleted because some posts are using it.');
            window.location.href='addCategory.php';
        </script>
    ";
    exit();
}

/* Delete category */
$delete_sql = "DELETE FROM categories WHERE id='$category_id'";
$delete_result = mysqli_query($connection, $delete_sql);

if ($delete_result) {

    echo "
        <script>
            alert('Category deleted successfully.');
            window.location.href='addCategory.php';
        </script>
    ";

} else {

    echo "
        <script>
            alert('Error deleting category: {$connection->error}');
            window.location.href='category.php';
        </script>
    ";
}
?>