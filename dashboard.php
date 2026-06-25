

<!-- // session_start();
// if(!isset($_SESSION['user_id'])){
//     header("Location: login.php");
// }
// else{

// // it just print the data from the server which we stored in the server from the login page.

//     echo"WElcome user:{$_SESSION['user_name']} and your role is:{$_SESSION['user_role']}";


//     echo"<br><a href='postdisplay.php'>View the blog post!!</a>" ;
// } -->




<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_name = $_SESSION['user_name'];
$user_role = $_SESSION['user_role'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
<link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="dashboard.css">
</head>

<body>
    <?php include "header.php"; ?>

    <main class="dashboard-page">

        <section class="dashboard-card">

            <div class="dashboard-header">
                <p class="brand-name">BlogSpace</p>

                <h1>
                    Welcome, <?php echo htmlspecialchars($user_name); ?>
                </h1>

                <p>
                    You are logged in as
                    <span class="role-badge">
                        <?php echo htmlspecialchars($user_role); ?>
                    </span>
                </p>
            </div>

            <div class="dashboard-actions">

                <a class="dashboard-btn primary-btn" href="postdisplay.php">
                    View Blog Posts
                </a>

                <?php if (in_array($user_role, ['author', 'admin'])) { ?>

                    <a class="dashboard-btn secondary-btn" href="addPost.php">
                        Create New Post
                    </a>

                <?php } ?>

                <a class="dashboard-btn logout-btn" href="logout.php">
                    Logout
                </a>

            </div>

        </section>

    </main>

</body>
</html>