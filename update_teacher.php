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

$id=$_GET['teacher_id'];
$sql="SELECT * FROM teacher WHERE id='$id'";
$result=mysqli_query($data,$sql);
$info=$result->fetch_assoc();

if(isset($_POST['update']))
{
 
    $name=$_POST['name'];
    $description=$_POST['description'];
   

    $file=$_FILES['image']['name'];
    $dst="./image/".$file;
    $dst_db="image/".$file;

    move_uploaded_file($_FILES['image']['tmp_name'],$dst);

if($file){   
$query="UPDATE teacher SET name='$name',description='$description',image='$dst_db'
WHERE id='$id'";
}

else{
    $query="UPDATE teacher SET name='$name',description='$description'
WHERE id='$id'";
}

$result2=mysqli_query($data,$query);

if($result2){
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

               .content{

                background-color: skyblue;
                width: 350px;
                padding-top: 50px;
                padding-bottom: 50px;
               }
    </style>
    <?php
 
  include 'adminhome_sidebar.php';
    ?>
<center>
<div class="in">
   <h1>Update Teacher</h1>

   <div class="content">

   <form action="#" method="POST" enctype="multipart/form-data">

   <div>
    <label for="name">name</label>
    <input type="text" name="name" value="<?php echo " {$info['name']}" ?>" >
   </div>

   <div>
    <label for="name">Description</label>
    <textarea name="description" > <?php echo " {$info['description']}" ?></textarea>
   </div>

   <div>
    <label for="name">Old Image</label>
    <img width="50px" src="<?php echo " {$info['image']}" ?>" alt="">
    
   </div>

   <div>
    <label for="name">New Image</label>
    <input type="file" name="image">
   </div>

   

   <div>
   
    <input class="btn btn-success" type="submit" name="update" value="Update" >
   </div>
   </form>
   </div>
    
</div>
</center>
   
</body>
</html>