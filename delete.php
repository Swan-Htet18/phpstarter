<?php
    include('db.php');
    $conn=mysqli_connect("localhost","root","","register");

    if(isset($_GET['ha']))
    {
        $id=$_GET['ha'];
        $sql="DELETE FROM  user WHERE id='$id'";
        mysqli_query($conn,$sql);
        header("location:index.php");
    }
?>