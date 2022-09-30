<?php
session_start();
error_reporting(0); 
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
$sql="SELECT * FROM teacher";
$result=mysqli_query($data,$sql);

if($_GET['teacher_id'])
{

    $user_id=$_GET['teacher_id'];
    $sql="DELETE FROM teacher WHERE id='$user_id'";

    $result=mysqli_query($data,$sql);

    if($result)
    { 
        $_SESSION['message']='delete student is successful';

        header("location:view_teacher.php");
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

<style>

    .th{
        padding: 20px;
    }
    .deg{

        background-color: skyblue;
    }
    .color a{
        color: white;
        text-decoration: none;
    }
</style>
<body>
   
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
    <h1>Teachers Data</h1>

    <div>

    <table border="1px">

    <tr>

    <th class="th">Name</th>
    <th class="th">Description</th>
    <th class="th">Image</th>
    <th class="th">Delete</th>
    <th class="th">Update</th>
    </tr>
     <?php 
     
     while($info=$result->fetch_assoc())
     {
     ?>
    <tr class="deg">
        <td class="th"><?php echo "{$info['name']}" ?></td>
        <td class="th"><?php echo "{$info['description']}" ?></td>
        <td class="th"><img src="<?php echo "{$info['image']}" ?>" alt=""></td>
        <td class="th color">

        <td class="thead  deg"><?php echo "<a class='btn btn-danger' onClick=\"javascript:return confirm('Are you sure to delete this?')\" href='view_teacher.php?teacher_id=
        {$info['id']}'>Delete</a>";  ?></td>

<td class="thead   deg"><?php echo "<a class='btn btn-primary' onClick=\"javascript:return confirm('Are you sure to delete this?')\" href='update_teacher.php?teacher_id=
        {$info['id']}'>Update</a>";  ?></td>

    </tr>

    <?php 
     
      }
     ?>
    </table>
    </div>
    
</div>
</center>
   
</body>
</html>