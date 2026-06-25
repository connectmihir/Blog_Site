<?php

session_start();

include "database.php";

if(!isset($SESSION['user_id'])){
    header("location: login.php");
    exit();
}

else{

if(isset($_POST['insert_comment'])){

     $id= $_SESSION['id'];
     $post_id= $_SESSION['post_id'];
     $email= $_SESSION['email'];
     $user_name= $_SESSION['user_name'];
     $comment= $_POST['comment'];
   

 $sql= "INSERT INTO comment (id ,post_id,email,user_name,comment) VALUES ('$id','$post_id','$email','$user_name','$comment' )";
 $resultcomm= mysqli_query($connection, $sql);

  

 if($resultcomm){
        echo"Error in : {$connection->error}";
 }





}

}

?>