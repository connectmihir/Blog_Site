<?php
session_start();

$is_logged_in = isset($_SESSION['user_id']);
$user_name = $is_logged_in ? $_SESSION['user_name'] : "";
$user_role = $is_logged_in ? $_SESSION['user_role'] : "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlogSpace | Share Ideas That Matter</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>

    <header class="navbar">
        <a href="index.php" class="logo">Blog<span>Space</span></a>

        <nav class="nav-links">
            <a href="index.php">Home</a>
            <a href="postdisplay.php">Blogs</a>

            <?php if ($is_logged_in) { ?>
                <a href="dashboard.php">Dashboard</a>
                <a class="nav-login logout-link" href="logout.php">Logout</a>
            <?php } else { ?>
                <a href="login.php">Login</a>
                <a class="nav-login" href="register.php">Get Started</a>
            <?php } ?>
        </nav>
    </header>

    <main>

        <section class="hero-section">

            <div class="hero-content">
                <p class="hero-tag">WELCOME TO BLOGSPACE</p>

                <h1>
                    Share your ideas.<br>
                    Inspire the world.
                </h1>

                <p class="hero-description">
                    BlogSpace is a simple platform where readers, writers, and creators
                    can discover meaningful stories, publish ideas, and join conversations.
                </p>

                <div class="hero-buttons">

                    <a class="hero-btn primary-hero-btn" href="postdisplay.php">
                        Explore Blogs
                    </a>

                    <?php if (!$is_logged_in) { ?>
                        <a class="hero-btn secondary-hero-btn" href="register.php">
                            Create Account
                        </a>
                    <?php } else { ?>
                        <a class="hero-btn secondary-hero-btn" href="dashboard.php">
                            Go to Dashboard
                        </a>
                    <?php } ?>

                </div>
            </div>

            <div class="hero-visual">
                <div class="hero-card card-one">
                    <span>✍</span>
                    <h3>Write</h3>
                    <p>Publish your thoughts and stories.</p>
                </div>

                <div class="hero-card card-two">
                    <span>📖</span>
                    <h3>Read</h3>
                    <p>Explore ideas from different writers.</p>
                </div>

                <div class="hero-card card-three">
                    <span>💬</span>
                    <h3>Discuss</h3>
                    <p>Join the conversation through comments.</p>
                </div>
            </div>

        </section>

        <section class="features-section">

            <div class="section-heading">
                <p class="section-tag">WHAT YOU CAN DO</p>
                <h2>Everything you need to share your voice</h2>
                <p>
                    BlogSpace makes it easy to write, manage, read, and discuss blog posts.
                </p>
            </div>

            <div class="features-grid">

                <article class="feature-card">
                    <div class="feature-icon">✍</div>
                    <h3>Create posts</h3>
                    <p>
                        Authors and admins can create posts with titles, descriptions,
                        categories, and images.
                    </p>
                </article>

                <article class="feature-card">
                    <div class="feature-icon">📚</div>
                    <h3>Explore blogs</h3>
                    <p>
                        Browse the latest articles and open any post to read the full story.
                    </p>
                </article>

                <article class="feature-card">
                    <div class="feature-icon">💬</div>
                    <h3>Comment and connect</h3>
                    <p>
                        Share your opinion and learn from other readers through comments.
                    </p>
                </article>

                <article class="feature-card">
                    <div class="feature-icon">⚙</div>
                    <h3>Manage content</h3>
                    <p>
                        Authors and admins can update or delete their posts when needed.
                    </p>
                </article>

            </div>

        </section>

        <section class="cta-section">

            <div>
                <p class="section-tag">START TODAY</p>

                <?php if ($is_logged_in) { ?>

                    <h2>Welcome back, <?php echo htmlspecialchars($user_name); ?>.</h2>
                    <p>
                        You are logged in as
                        <strong><?php echo htmlspecialchars($user_role); ?></strong>.
                        Continue exploring the BlogSpace community.
                    </p>

                    <a class="cta-btn" href="dashboard.php">
                        Open Dashboard
                    </a>

                <?php } else { ?>

                    <h2>Ready to share your first idea?</h2>
                    <p>
                        Create your account, explore blogs, and become part of the conversation.
                    </p>

                    <a class="cta-btn" href="register.php">
                        Join BlogSpace
                    </a>

                <?php } ?>

            </div>

        </section>

    </main>

    <footer class="footer">
        <p>© <?php echo date("Y"); ?> BlogSpace. Built for sharing ideas.</p>
    </footer>

</body>
</html>