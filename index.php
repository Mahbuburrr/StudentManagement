<?php
error_reporting(0);
session_start();
session_destroy();
 

if($_SESSION['message'])
{
 $message=$_SESSION['message'];
 echo "<script>
 alert('$message');
 </script>";

}


$host="localhost";
$user="root";
$password="";
$db="schoolproject";

$data=mysqli_connect($host,$user,$password,$db);

$sql="SELECT * FROM teacher";

$result=mysqli_query($data,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Studentmanagement</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
   <nav>

   <label for="" class="logo">W3-School</label>
   <ul>
    <li><a href="">Home</a></li>
    <li><a href="">Contact</a></li>
    <li><a href="">Admission</a></li>
    <li><a href="login.php" class="btn btn-success">Login</a></li>


   </ul>
   </nav>

   <div class="section1">
    <label for="" class="img_text">We teach students with care</label>
    <img class="main_img" src="school_management.jpg" alt="">

   </div>

   <div class="container">
    <div class="row">
        <div class="col-md-4">
           <img class="welcome_img" src="school2.jpg" alt="">
        </div>

        <div class="col-md-8">
            <h1>Welcome To W-School</h1>

        <p>Amet aliquyam ipsum elitr sit at amet elitr lorem et diam, dolores ea et et eos amet diam, dolor at et dolores kasd et no et diam, amet dolor sea sed sed sea. Et diam sadipscing at dolor amet ipsum amet duo labore. Ut dolor stet sit eirmod eirmod tempor et nonumy, et dolor stet clita gubergren kasd justo diam duo. Sadipscing et dolor tempor kasd tempor. At kasd clita voluptua gubergren tempor. Sed justo magna duo est aliquyam sit sea sit lorem. Erat dolor sed accusam diam aliquyam sed lorem kasd et. Sadipscing consetetur vero amet consetetur duo kasd erat vero eirmod, est consetetur ut et dolor voluptua et justo sadipscing amet, diam justo consetetur labore ut voluptua sea at sadipscing justo, tempor erat aliquyam voluptua dolor, clita justo stet duo consetetur elitr diam invidunt et, labore lorem accusam no takimata sit no ut. No diam eirmod stet et.</p>
        </div>
    </div>

   </div>

   <center><h1>Our Teachers</h1></center>

   <div class="container">

   <?php while ($info=$result->fetch_assoc())  
   {


   
   
   ?>
   <div class="row">
    <div class="col-md-4">
     <img class="teacher" src="<?php echo "{$info['image']}" ?>" alt="">
     <h3><?php echo "{$info['name']}" ?></h3>
     <h1><?php echo "{$info['description']}" ?></h1>
    </div>

    <?php

   }

   
   ?>
    
   </div>
   </div>

   <center><h1>Our Courses</h1></center>

   <div class="container">

   <div class="row">
    <div class="col-md-4">
     <img class="teacher" src="web.jpg" alt="">
     <h1>Web Design</h1>
    </div>

    <div class="col-md-4">
    <img class="teacher" src="graphic.jpg" alt="">
    <h1>Graphics Design</h1>
        </div>

        <div class="col-md-4">
        <img class="teacher" src="marketing.png" alt="">
        <h1>Marketing</h1>
        </div>
   </div>
   </div>

   <center class="adm"><h1>Admission Form</h1></center>

   <div align="center" class="Admission_form">
    <form action="data_check.php" method="POST" id="admission">
        <div class="adm_int">
            <label class="label_text" for="">Name</label>
            <input class="input_deg" type="text" name="name" required>
        </div>

        <div class="adm_int">
            <label class="label_text" for="">Email</label>
            <input  class="input_deg" type="email" name="email"required>
        </div>

        <div class="adm_int">
            <label class="label_text" for="">Phone</label>
            <input  class="input_deg" type="number" name="phone" required>
        </div>

        <div class="adm_int">
            <label class="label_text" for="">Message</label>
            <textarea class="input_txt" name="message" id="" required ></textarea>
        </div>
        <div>
            
            <input class="btn btn-primary" id="submit" type="submit" value="Apply" name="apply">
        </div>
    </form>
   </div>

   <footer class="footer_txt"><h2>All @copyright reserved by web tech knowledge</h2></footer>
</body>
</html>