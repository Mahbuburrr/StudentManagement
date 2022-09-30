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

$sql="SELECT * From admission";

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

    <?php

include('admin_sidebar.php');
    ?>

<div class="in">
    <h1>Applied for Admission Admission</h1>
    <table border="1px">

    <tr>

    <th style="padding: 20px; font-size:15px">name</th>
    <th style="padding: 20px; font-size:15px"> email</th>
    <th style="padding: 20px; font-size:15px">phone</th>
    <th style="padding: 20px; font-size:15px">message</th>
    </tr>
   <?php 
    while($info=$result->fetch_assoc())
    {

        ?>
   

    <tr>
        <td style="padding: 20px; font-size:15px"><?php
        
        echo "{$info['name']}";
        ?></td>
        <td style="padding: 20px; font-size:15px"><?php
        
        echo "{$info['email']}";
        ?></td>
        <td style="padding: 20px; font-size:15px"><?php
        
        echo "{$info['phone']}";
        ?></td>
        <td style="padding: 20px; font-size:15px"><?php
        
        echo "{$info['message']}";
        ?></td>
    </tr>
<?php
    }

    ?>
    </table>
    
</div>
   
</body>
</html>