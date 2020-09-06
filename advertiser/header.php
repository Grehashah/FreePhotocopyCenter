<?php

$aid="";
$uname="";
$pic="";
$str="";
$result="";
$conn="";
$row="";
$str1="";
$result1="";
$conn1="";
$lastseen="";

session_start();

 $aid=$_SESSION["AdvId"];
 $uname=$_SESSION["AdvUname"];

$str="select Pic from advertiser where AdvId='$aid'";
$conn=mysqli_connect("localhost","root","","freephotocopycenter");
$result=$conn->query($str);
$row=$result->fetch_assoc();
$pic=$row["Pic"];

if(isset($_POST["btnlogout"]))
{ 
date_default_timezone_set('Asia/Kolkata');
$lastseen=date("Y-m-d h-i-s");

$str1="update admin set Lseen='$lastseen' where AdminId='$aid';";
$conn1=mysqli_connect("localhost","root","","freephotocopycenter");
$result1=$conn1->query($str1);

echo"<script>location.href='http://localhost/freephotocopycenter/login.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Free PhotoCopy Center</title>

  <!-- Favicons -->
 <link href="img/favicon.ico" rel="icon">
   <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  <script src="lib/chart-master/Chart.js"></script>

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="index.php" class="logo"><b>FREE<span> PHOTOCOPY </span>CENTER</b></a>
      <!--<img src='img/logo.jpg' class="img-circle" width="50">-->
     <!--logo end-->
   
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <form name="frm1" method="post">
            <br>
          <li><input class="logout" type="submit" name="btnlogout" value="Logout" style=" color: #f2f2f2;
  font-size: 15px;
  border-radius: 4px;
  -webkit-border-radius: 4px;
  border: 1px solid #64c3c2 !important;
  padding: 5px 15px;
  margin-right: 5px;
  background: #4ECDC4;
  margin-top: -5px;"></li>
        </form>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profile.php"><img src="img/user-photos/advertiser/<?php echo "$pic"; ?>" class="img-circle" width="70"></a></p>
          <h5 class="centered"><?php echo $uname; ?></h5>
          <li class="mt">
            <a href="index.php">
              <i class="fa fa-home"></i>
              <span>Dashboard</span>
              </a>
              <a href="profile.php">
              <i class="fa fa-user"></i>
              <span>My Profile</span>
              </a>
              <a href="payments.php">
              <i class="fa fa-money"></i>
              <span>Payments</span>
              </a>
              <a href="package.php">
              <i class="fa fa-briefcase"></i>
              <span>Package</span>
              </a>
              <a href="performancereport.php">
              <i class="fa fa-dashboard"></i>
              <span>Performance Report</span>
              </a>
              <a href="memberdetails.php">
              <i class="fa fa-users"></i>
              <span>Member Details</span>
              </a>
              <a href="feedback.php">
              <i class="fa fa-square"></i>
              <span>Feedback</span>
              </a>
          </li>
           <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">