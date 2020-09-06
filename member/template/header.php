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

     $mid = $_SESSION["MemberId"];
    $uname = $_SESSION["MemberUname"];

$strr="select * from member where MId='$mid'";
$connn=mysqli_connect("localhost","root","","freephotocopycenter");
$resultt=$connn->query($strr);
$roww=$resultt->fetch_assoc();
$pic=$roww["Pic"];

if(isset($_POST["btnlogout"]))
{ 
date_default_timezone_set('Asia/Kolkata');
$lastseen=date("Y-m-d h-i-s");

$str1="update member set Lseen='$lastseen' where MId='$mid';";
$conn1=mysqli_connect("localhost","root","","freephotocopycenter");
$result1=$conn1->query($str1);

echo"<script>location.href='http://localhost/freephotocopycenter/login.php'</script>";
}
?>
<!doctype html>
<html class="no-js" lang="">

<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Free PhotoCopy Center</title>
    <!-- favicon
        ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
        ============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- owl.carousel CSS
        ============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- meanmenu CSS
        ============================================ -->
    <link rel="stylesheet" href="css/meanmenu/meanmenu.min.css">
    <!-- animate CSS
        ============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
        ============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- mCustomScrollbar CSS
        ============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- jvectormap CSS
        ============================================ -->
    <link rel="stylesheet" href="css/jvectormap/jquery-jvectormap-2.0.3.css">
    <!-- notika icon CSS
        ============================================ -->
    <link rel="stylesheet" href="css/notika-custom-icon.css">
    <!-- wave CSS
        ============================================ -->
    <link rel="stylesheet" href="css/wave/waves.min.css">
    <!-- main CSS
        ============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- style CSS
        ============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
        ============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
        ============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Start Header Top Area -->
    <div class="header-top-area">
        <form name='frm' method='post'>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="logo-area">
                        <a href="index.php"><font size='5' color="white"><b>FREE PHOTOCOPY CENTER</b></font></a></div>
                </div>
                <div align='right' style='margin-right: 15px; margin-top: 13px;'>
                <button class="btn btn-primary notika-btn-success waves-effect" name='btnlogout' type='submit' >&nbsp;&nbsp;Logout&nbsp;&nbsp;</button>
            </div>
        </div>
        </div>
    </div>
</form>
    <!-- End Header Top Area -->
    <!-- Mobile Menu start -->
    <div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul class="mobile-menu-nav">
                                <li><a data-toggle="collapse" data-target="#Charts" href="index.php">Dashboard</a>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demoevent" href="profile.php">My Profile</a>
                                </li>
                                <li><a data-toggle="collapse" data-target="#democrou" href="selectshop.php">Select Shop</a>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demolibra" href="couponhistory.php">Coupon History</a>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demodepart" href="howtouse.php">How To Get Free Photocopies?</a>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demo" href="aboutus.php">About Us</a>
                                </li>
                                <li><a data-toggle="collapse" data-target="#Miscellaneousmob" href="contactus.php">Contact Us</a>
                                </li>
                                <li><a data-toggle="collapse" data-target="#Pagemob" href="feedback.php">Feedback</a>
                                 </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu end -->
    <!-- Main Menu area start-->
    <div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <li><a href="index.php"><i class="notika-icon notika-house"></i> Dashboard</a>
                        </li>
                        <li><a href="profile.php"><i class="notika-icon notika-support"></i> My Profile</a>
                        </li>
                        <li><a href="selectshop.php"><i class="notika-icon notika-edit"></i> Select Shop</a>
                        </li>
                        <li><a href="couponhistory.php"><i class="notika-icon notika-bar-chart"></i> Coupon History</a>
                        </li>
                        <li><a href="howtouse.php"><i class="notika-icon notika-windows"></i> How To Get Free Photocopies?</a>
                        </li>
                        <li><a href="aboutus.php"><i class="notika-icon notika-form"></i> About Us</a>
                        </li>
                        <li><a href="contactus.php"><i class="notika-icon notika-app"></i> Contact Us</a>
                        </li>
                        <li><a href="feedback.php"><i class="notika-icon notika-mail"></i> Feedback</a>
                        </li>
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Menu area End-->
    <div class='inbox-area'>
        <div class='container'>