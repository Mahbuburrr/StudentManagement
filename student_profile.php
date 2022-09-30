<?php
session_start();
if(!isset($_SESSION['username']))
{

    header("location:login.php");
    
}

elseif ($_SESSION['usertype']=='admin')

{
    header("location:login.php");
 
}

$host="localhost";
$user="root";
$password="";
$db="schoolproject";

$data=mysqli_connect($host,$user,$password,$db);
$username=$_SESSION['username'];
$sql="SELECT * FROM user WHERE username='$username' ";
$result=mysqli_query($data,$sql);
$info=mysqli_fetch_assoc($result);

if(isset($_POST['update_profile']))
{

$email=$_POST['email'];
$phone=$_POST['phone'];
$password=$_POST['password'];

$sql2="UPDATE user SET email='$email',
phone='$phone',password='$password' WHERE username='$username'";

$result2=mysqli_query($data,$sql2);
if($result2)
header('location:student_profile.php');

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <?php include "student_css.php" ?>
</head>
<body>

<style>

        label{

            display: inline-block;
            text-align: right;
            width: 100px;
            padding: 10px;
        }
        .bg{

            background-color: skyblue;
            width: 350px;
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
   include "student_sidebar.php";
   ?>
<center>
<div class="in">
    <h1>Student Profile</h1>
   
    <form action="#" method="POST">
    

        <div>
            <label for="name">email</label>
            <input type="email" name="email" value="<?php echo " {$info['email']}" ?>">
        </div>

        <div>
            <label for="name">phone</label>
            <input type="int" name="phone" value="<?php echo " {$info['phone']}" ?>">
        </div>

        <div>
            <label for="password">password</label>
            <input type="text" name="password" value="<?php echo "{$info['password']}" ?>">
        </div>

        <div>
            
            <input class="btn btn-primary" type="submit" name="update_profile" value="update" >
        </div>
    </form>

    </div>

    
</div>
</center> 
</body>
</html>