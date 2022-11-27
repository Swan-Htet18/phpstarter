<?php
    include('db.php');
?>
<?php
    $conn=mysqli_connect("localhost","root","","register");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 mt-5 py-4 shadow border">
                <h1 class="text-center mb-3">CRUD with procedure</h1>
                <?php
                    if(isset($_GET['id']))
                    { 
                        $id=$_GET['id'];
                        $sql="SELECT * FROM user WHERE id='$id'";
                        $query=mysqli_query($conn,$sql);
                        $row=mysqli_fetch_assoc($query);         
                        
                ?>
                    <form method="POST" action="update.php">
                        <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                        <input type="text" value="<?php echo $row['name']; ?>" class="form-control my-2" placeholder="Enter Username" name="username">
                        <input type="text" value="<?php echo $row['email'];?>" class="form-control my-2" placeholder="Enter Email" name="email">
                        <button class="btn btn-dark">Update</button>
                    </form>
                    <?php }else{ ?>
                        <form method="POST" action="insert.php">
                            <input type="text" class="form-control my-2" placeholder="Enter Username" name="username">
                            <input type="text" class="form-control my-2" placeholder="Enter Email" name="email">
                            <button class="btn btn-dark">Create</button>
                        </form>
                   <?php } ?>
              
            </div>
        </div>

        <div class="row mt-3">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created_Date</th>
                    <th>Modified_Date</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php
                    $sql = 'SELECT * FROM user';
                    $query=mysqli_query($conn,$sql);
                    while($row=mysqli_fetch_assoc($query))
                    { ?>
                        <tr>
                            <td> <?php echo $row['id'] ?> </td>
                            <td> <?php echo $row['name'] ?> </td>
                            <td> <?php echo $row['email'] ?> </td>
                            <td><?php echo $row['created_date'] ?></td>
                            <td><?php echo $row['modified_date'] ?></td>
                            <td><a href="index.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Edit</a></td>
                            <td><a href="delete.php?ha=<?php echo $row['id']; ?>" class="btn btn-warning">Delete</a></td>
                        </tr>
                    <?php } ?>
                
              
            </table>
        </div>
    </div>
</body>
</html>