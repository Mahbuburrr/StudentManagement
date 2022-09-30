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
if(isset($_POST['add_student']))
{

    $username=$_POST['name'];
    $user_email=$_POST['email'];
    $user_phone=$_POST['phone'];
    $user_password=$_POST['password'];
    $usertype="student";

    $check="SELECT * FROM user WHERE username='$username' ";
    $check_user=mysqli_query($data,$check);
    $row_count=mysqli_num_rows($check_user);

if($row_count==1){

    echo  "<script>
    alert('This email alredy exist please try another username')
    </script>";
}
else
{

    $sql="INSERT INTO user(username,email,phone,usertype,password) VALUES
    ('$username','$user_email','$user_phone','$usertype','$user_password') ";
    $result=mysqli_query($data,$sql);

    if($result)
    {
echo "<script>f
alert ('Data Uploaded Successfully')
</script>";
        
    }
    else
    {

        echo "uploaded Failed";
    }
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
   
    <header class="header">
     
    <a href="">Admin Dashboard</a>
    <div class="logout">
        <a href="login.php" class="btn btn-primary">Logout</a>
    </div>
    </header>

    <style>

        label{

            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .form{
            background-color: skyblue;
            width: 300px;
            padding-top: 70px;
            padding-bottom: 70px;
        }
    </style>

    <?php
 
  include 'adminhome_sidebar.php';
    ?>
<center>
<div class="in">
    <h1>Add Student</h1><br><br>

    <form action="#" method="POST" class="form">
        <div class="adm_int">
            <label class="label_text" for="">Name</label>
            <input class="input_deg" type="text" name="name">
        </div>

        <div class="adm_int">
            <label class="label_text" for="">Email</label>
            <input  class="input_deg" type="email" name="email">
        </div>

        <div class="adm_int">
            <label class="label_text" for="">Phone</label>
            <input  class="input_deg" type="int" name="phone">
        </div>

        <div class="adm_int">
            <label class="label_text" for="">password</label>
            <input  class="input_deg" type="text" name="password">
        </div>

       
        <div>
            
            <input class="btn btn-primary" id="submit" type="submit" value="Add Student" name="add_student">
        </div>
    </form>
</div>
</center>
   
</body>
</html>