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

$sql="SELECT * FROM user WHERE usertype='student'";
$result=mysqli_query($data,$sql);

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
   
    <header class="header">
     
    <a href="">Admin Dashboard</a>
    <div class="logout">
        <a href="login.php" class="btn btn-primary">Logout</a>
    </div>
    </header>

    <style>

        .thead{

            padding: 10px;
            font-size: 15px;
        }
        .tr{
            background-color: skyblue;
            padding-top: 70px;
            padding-bottom: 70px;
        }
        .deg a{
            color: white;
            text-decoration: none;
        }
    </style>

    <?php
 
  include 'adminhome_sidebar.php';
    ?>
    <center>

<div class="in">
    <h1>Student Data</h1><br><br>

    <?php
if($_SESSION['message'])
{

    echo $_SESSION['message'];
}
unset($_SESSION['message']);


?>
    <table border="1px">


    <tr class="" >
        <th class="thead">UserName</th>
        <th class="thead">Email</th>
        <th class="thead">Phone</th>
        <th class="thead">Password</th>
        <th class="thead">Delete</th>
        <th class="thead">Update</th>
    </tr>

    <?php

    while($info=$result->fetch_assoc())
    {

    

    ?>
    <tr class="tr">
        <td class="thead"><?php echo "{$info['username']}";  ?></td>
        <td class="thead"><?php echo "{$info['email']}";  ?></td>
        <td class="thead"><?php echo "{$info['phone']}";  ?></td>
        <td class="thead"><?php echo "{$info['password']}";  ?></td>
        <td class="thead btn btn-danger deg"><?php echo "<a onClick=\"javascript:return confirm('Are you sure to delete this?')\" href='delete.php?student_id=
        {$info['id']}'>Delete</a>";  ?></td>

        <td class="thead btn btn-primary m-3 deg"><?php echo "<a  href='update_student.php?student_id=
        {$info['id']}'>Update</a>";  ?></td>
        
    </tr>
    <?php
   }
    ?>
    </table>
    
</div>
</center>
   
</body>
</html>

