<?php
session_start();
include "database.php";

$error_message = "";

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user
            WHERE email='$email'
            AND password='$password'";

    $result = mysqli_query($connection, $sql);

    if (!$result) {
        $error_message = "Database error: " . $connection->error;
    } else {

        if (mysqli_num_rows($result) > 0) {

            $row = mysqli_fetch_assoc($result);

            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_role'] = $row['role'];

            header("Location: dashboard.php");
            exit();

        } else {
            $error_message = "Invalid email or password. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>

    <main class="login-page">

        <section class="login-card">

            <div class="login-header">
                <p class="brand-name">BlogSpace</p>
                <h1>Welcome back</h1>
                <p>Log in to manage your posts and comments.</p>
            </div>

            <?php if ($error_message != "") { ?>
                <div class="error-message">
                    <?php echo $error_message; ?>
                </div>
            <?php } ?>

            <form method="POST" class="login-form">

                <div class="form-group">
                    <label for="email">Email address</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="Enter your email"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Enter your password"
                        required
                    >
                </div>

                <button id="login" name="login" type="submit">
                    Login
                </button>

                <p class="register-text">
                    New here?
                    <a href="register.php">Create an account</a>
                </p>

            </form>

        </section>

    </main>

</body>
</html>