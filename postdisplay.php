<?php
session_start();
include "database.php";

if (!isset($_SESSION['user_name'])) {
    header("location: dashboard.php");
    exit();
}

$sql = "SELECT * FROM post";
$result = mysqli_query($connection, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>

    <!-- External CSS file -->
    <link rel="stylesheet" href="postdisplay.css">
    <link rel="stylesheet" href="header.css">
</head>

<body>
    <?php include "header.php"; ?>

    <section class="blog-section">

        <div class="blog-heading">
            <h1>Explore Our Latest Blogs</h1>
            <p>Insights and Strategies for Digital Success</p>
        </div>

        <div class="blog-grid">

            <?php while ($row = mysqli_fetch_assoc($result)) { ?>

                <article class="blog-card">

                    <img class="blog-image"
                         src="Image/<?php echo htmlspecialchars($row['image']); ?>"
                         alt="<?php echo htmlspecialchars($row['title']); ?>">

                    <div class="blog-content">

                        <h2 class="blog-title">
                            <?php echo htmlspecialchars($row['title']); ?>
                        </h2>

                        <p class="blog-description">
                            <?php
                            $content = htmlspecialchars($row['content']);

                            if (strlen($content) > 130) {
                                echo substr($content, 0, 130) . "...";
                            } else {
                                echo $content;
                            }
                            ?>
                        </p>

                        <a class="learn-btn"
                           href="singlepost.php?post_id=<?php echo $row['id']; ?>">
                            Learn more
                        </a>

                    </div>

                </article>

            <?php } ?>

        </div>

    </section>

</body>
</html>