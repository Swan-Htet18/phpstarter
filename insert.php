
<?php
    include('db.php');
    $conn=mysqli_connect("localhost","root","","register");
    if(isset($_POST['username']) && isset($_POST['email']))
    {
        $name=$_POST['username'];
        $email=$_POST['email'];
        
        $sql="INSERT INTO user (name,email,created_date,modified_date) 
        VALUES ('$name','$email',now(),now())";
        mysqli_query($conn,$sql);
        header("location:index.php");    
        
    }
?>
