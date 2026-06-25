<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$is_logged_in = isset($_SESSION['user_id']);
$user_role = $_SESSION['user_role'] ?? '';
?>

<header class="navbar">

    <a href="index.php" class="logo">
        Blog<span>Space</span>
    </a>

    <nav class="nav-links">

        <a href="index.php">Home</a>

        <a href="postdisplay.php">Blogs</a>

        <?php if ($is_logged_in) { ?>

            <a href="dashboard.php">Dashboard</a>

            <?php if (in_array($user_role, ['author', 'admin'])) { ?>
                <a href="addPost.php">Create Post</a>
            <?php } ?>

            <a class="nav-login logout-link" href="logout.php">
                Logout
            </a>

        <?php } else { ?>

            <a href="login.php">Login</a>

            <a class="nav-login" href="register.php">
                Get Started
            </a>

        <?php } ?>

    </nav>

</header>