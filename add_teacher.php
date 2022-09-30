<?php
session_start();
if(!isset($_SESSION['username']))
{

    header("location:login.php");
    
}
elseif ($_SESSION['usertype']=='student')

{
    header("location:login.php");
  
}

$host="localhost";
$user="root";
$password="";
$db="schoolproject";

$data=mysqli_connect($host,$user,$password,$db);
if(isset($_POST['addteacher']))
{

    $name=$_POST['name'];
    $description=$_POST['description'];


    $file=$_FILES['image']['name'];
    $dst="./image/".$file;
    $dst_db="image/".$file;

    move_uploaded_file($_FILES['image']['tmp_name'],$dst);
    $sql="INSERT INTO teacher (name,description,image)
    VALUES ('$name','$description','$dst_db')";
    $result=mysqli_query($data,$sql);

    if($result)
{
   
    header('location:add_teacher.php');
}

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>

<style>

    label{
        display: inline-block;
        width: 150px;
        text-align: right;
        padding-top: 10px;
        padding-bottom: 10px;


    }
    .content{

        background-color: skyblue;
        width: 500px;
        padding-top: 10px;
        padding-bottom: 10px;
    }
</style>
   
    <header class="header">
     
    <a href="">Admin Dashboard</a>
    <div class="logout">
        <a href="login.php" class="btn btn-primary">Logout</a>
    </div>
    </header>

    <?php
 
  include 'adminhome_sidebar.php';
    ?>
<center>
<div class="in">
    <h1>Add Teacher</h1>
    <div class="content">
        <form action="#" method="POST" enctype="multipart/form-data">

        <div>
            <label for="Teacher Name:">Teacher Name:</label>
            <input type="text" name="name">
        </div>

        <div>
            <label for="Teacher Description:">Teacher Description:</label>
            <textarea name="description" id="" cols="30" rows="5"></textarea>
        </div>

        <div>
            <label for="Image:">Image:</label>
            <input type="file" name="image">
        </div>

        <div>
            
            <input type="submit" name="addteacher" value="Add-Teacher" class="btn btn-primary">
        </div>
 

        </form>
    </div>
    
</div>
</center>
   
</body>
</html>