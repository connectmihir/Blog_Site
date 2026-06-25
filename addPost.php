<?php

session_start();

include "database.php";

// step-1 check the user is login or not?

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();

} else { 

// step-2 Check the User access privilage

//Only for Admin and Author
    if (in_array($_SESSION['user_role'], ['author', 'admin'])) {
        $user_id = $_SESSION['user_id'];//it will help u to identity in databse which user add the post from the user id.

        //Now below SQL command u do to fetch the category from the user

        $sql = "SELECT * FROM categories";
        $result = mysqli_query($connection, $sql);

        //To check the connection status that successfully fetch the category from the database

        if (!$result) {
            die("Connection failed: " . $connection->connect_error);
        } else {

        //store the user input of add post section 

            if (isset($_POST['submit'])) {
                $title = $_POST['title'];
                $description = $_POST['description'];
                $category = $_POST['category'];
                //name variable will store the name of the image
                $image = $_FILES['image']['name'];
                //temp_location variable will store the address of the image
                $temp_location = $_FILES['image']['tmp_name'];
                $our_location = "Image/";
 
                //then i move the temp_location to our desire loacation with name.

                if (!empty($image)) {
                    move_uploaded_file($temp_location, $our_location . $image);
                }

                //before We just store the category name from the  user. Now we need to identitfy the category id

                $fetchCategory = "SELECT * FROM categories WHERE NAME='$category'";

                //implement the above sql query

                $impl_fetch = mysqli_query($connection, $fetchCategory);


                //*****************CRITICAL PART**************************

               // mysqli_fetch_assoc() converts the row into an associative array
               //This accesses the id key from the associative array. 
               //It converts only one row at a time from the query result into an associative array.

                if ($impl_fetch->num_rows > 0) {
                    $row = mysqli_fetch_assoc($impl_fetch);
                    $category_id = $row['id'];
                }

                else {
                        die("Category not found");
                    }

//Get all the data and store into the database

                $user_submission = "INSERT INTO post(title, content, image,  category_id,    author_id) VALUES('$title','$description','$image','$category_id', '$user_id')";

                $impl_submission = mysqli_query($connection, $user_submission);

                if ($impl_submission) {
                    echo "Post Uploaded SuccessFully";
                }
            }
        }
    } else {
        echo "You are not authorized to access this page.";
        header("Location: login.php");
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add_Post</title>
    <link href="addpost.css" rel="stylesheet">
</head>

<body>

    <main class="add-post-page">

        <section class="add-post-card">

            <div class="form-header">
                <p class="brand-name">BlogSpace</p>
                <h1>Create a new post</h1>
                <p>Share an idea, update, or story with your readers.</p>
            </div>

            <?php if (isset($impl_submission) && $impl_submission) { ?>
                <div class="success-message">
                    Post uploaded successfully.
                </div>
            <?php } ?>

            <form class="add-post-form"
                  action="addPost.php"
                  method="post"
                  enctype="multipart/form-data">

                <div class="form-group">
                    <label for="title">Post title</label>
                    <input
                        type="text"
                        id="title"
                        name="title"
                        placeholder="Enter a clear post title"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="description">Post description</label>
                    <textarea
                        id="description"
                        name="description"
                        placeholder="Write your post content here..."
                        required
                    ></textarea>
                </div>

                <div class="form-group">
                    <label for="category">Category</label>

                    <select name="category" id="category" required>
                        <option value="">Select a category</option>

                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                            <option value="<?php echo htmlspecialchars($row['name']); ?>">
                                <?php echo htmlspecialchars($row['name']); ?>
                            </option>
                        <?php } ?>

                    </select>
                </div>

                <div class="form-group">
                    <label for="image">Featured image</label>

                    <input
                        type="file"
                        id="image"
                        name="image"
                        accept="image/*"
                    >

                    <small class="file-help">
                        Upload a JPG, PNG, or WEBP image.
                    </small>
                </div>

                <button type="submit" name="submit" class="submit-btn">
                    Publish Post
                </button>

            </form>

        </section>

    </main>

</body>
</html>