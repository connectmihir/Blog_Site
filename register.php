<?php
$message = "";

if (isset($_POST['Register'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    include "database.php";

    $sql = "INSERT INTO user(name, email, password, role)
            VALUES('$name', '$email', '$password', '$role')";

    $result = mysqli_query($connection, $sql);

    if (!$result) {
        $message = "Error: " . $connection->error;
    } else {
        $message = "Registration successful. You can now log in.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
<link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="register.css">
</head>

<body>
    <?php include "header.php"; ?>

    <main class="register-page">

        <section class="register-card">

            <div class="register-header">
                <p class="brand-name">BlogSpace</p>
                <h1>Create your account</h1>
                <p>Join the community and start sharing your ideas.</p>
            </div>

            <?php if ($message != "") { ?>

                <div class="message">
                    <?php echo $message; ?>

                    <?php if ($result) { ?>
                        <br>
                        <a href="login.php">Go to Login</a>
                    <?php } ?>
                </div>

            <?php } ?>

            <form method="POST" class="register-form">

                <div class="form-group">
                    <label for="name">Full name</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        placeholder="Enter your full name"
                        required
                    >
                </div>

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
                        placeholder="Create a password"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="role">Role</label>

                    <select id="role" name="role" required>
                        <option value="">Select your role</option>
                        <option value="subscriber">Subscriber</option>
                        <option value="author">Author</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>

                <button id="Register" name="Register" type="submit">
                    Create Account
                </button>

                <p class="login-text">
                    Already have an account?
                    <a href="login.php">Log in</a>
                </p>

            </form>

        </section>

    </main>

</body>
</html>