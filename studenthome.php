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
   
    <header class="header">
     
    <a href="">Admin Dashboard</a>
    <div class="logout">
        <a href="login.php" class="btn btn-primary">Logout</a>
    </div>
    </header>
<?php
   include "student_sidebar.php";
   ?>

<div class="in">
    <h1>Sidebar Accordion</h1>
    <p>Sea takimata est ut no magna elitr ipsum amet dolores labore. 
    Voluptua rebum lorem lorem vero sit duo amet est    
    
    Voluptua rebum lorem lorem vero sit duo amet est.</p>

    <input type="text" name="input">
</div>
</body>
</html>