<?php


session_start();

include "database.php";

if (isset($_GET['post_id'])) {
    $post_id = $_GET['post_id'];
    } 
    else {
        die("Post ID is missing.");
        }
        
        // step-1 check the user is login or not?
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    
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

               $user_submission = "UPDATE post 
                    SET title = '$title',
                        content = '$description',
                        image = '$image',
                        category_id = '$category_id',
                        author_id = '$user_id'
                    WHERE id = '$post_id'";

                $impl_submission = mysqli_query($connection, $user_submission);

                if ($impl_submission) {
                    echo "Post Updated Successfully";
                }
            }
        }
    } else {
        echo "You are not authorized to access this page.";
        header("Location: login.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add_Post</title>
</head>

<body>

    <form action="updatepost.php?post_id=<?php echo $post_id; ?>" method="post" enctype="multipart/form-data">

        <input type="text" name="title" placeholder="Insert Title"><br><br>
        <textarea name="description" placeholder="Write Description"></textarea><br><br>
        <select name="category" id="category">
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>

                <option value="<?php echo "{$row['name']}"; ?>"><?php echo "{$row['name']}"; ?> </option> <?php } ?>

        </select><br><br>

        <input type="file" name="image">
        <br>
        <br>

        <input type="submit" name="submit" value="Add Post">


    </form>

</body>

</html>

