<?php
include('db.php');
$conn=mysqli_connect("localhost","root","","register");
if(isset($_POST['id']) && isset($_POST['username']) && isset($_POST['email']))
{
    $id=$_POST['id'];
    $name=$_POST['username'];
    $email=$_POST['email'];
    $sql="UPDATE user SET name='$name' , email='$email' ,modified_date=now()
            WHERE id='$id'";
            mysqli_query($conn,$sql);
            header("location:index.php");
} 
?>