<?php

session_start();

include "database.php";

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
}
else{
    if(in_array($_SESSION['user_role'], ['author','admin']) ){
$user_id=$_SESSION['user_id'];
    $sql= "SELECT * FROM categories";
    $result = mysqli_query($connection, $sql);

    if(!$result){
         die("Connection failed: " . $connection->connect_error);
    }
    else{
        if(isset($_POST['submit'])){
            $title= $_POST['title'];
            $description= $_POST['description'];
            $category= $_POST['category'];
            $image= $_FILES['image']['name'];

            $temp_location= $_FILES['image']['tmp_name'];

            $our_location= "Image/";

            if(!empty($image)){
                move_uploaded_file($temp_location, $our_location.$image);
            }

            $fetchCategory="SELECT * FROM categories WHERE NAME='$category'";

            $impl_fetch= mysqli_query($connection,$fetchCategory);

            if($impl_fetch->num_rows>0){
                $row= mysqli_fetch_assoc($impl_fetch);
                $category_id= $row['id'];
            }


            $user_submission= "INSERT INTO post(title, content, image,  category_id,author_id) VALUES('$title','$description','$image','$category_id', '$user_id')";

            $impl_submission= mysqli_query($connection, $user_submission);

            if($impl_submission){
                echo"Post Uploaded SuccessFully";
            }
        }
    }

    }

    else{echo"You are not authorized to access this page.";
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

<form action="addPost.php" method="post" enctype="multipart/form-data">

<input type="text" name="title" placeholder="Insert Title"><br><br>
<textarea name="description" placeholder="Write Description"></textarea><br><br>
<select name="category" id="category" >
<?php while($row= mysqli_fetch_assoc($result)){ ?>

    <option value="<?php echo"{$row['name']}"; ?>"><?php echo"{$row['name']}";?> </option> <?php } ?>

</select><br><br>

<input type="file" name="image">
<br>
<br>

<input type="submit" name= "submit" value="Add Post">


</form>
    
</body>
</html>
