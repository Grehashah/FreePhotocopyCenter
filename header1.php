<!doctype html>
<html class="no-js" lang="">
<?php 

if(isset($_POST['btnok']))
{
       echo "<script>location.href='register.php'</script>";
}

?>
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
                                <li><a data-toggle="collapse" data-target="#Charts" href="index.php">Home</a>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demoevent" href="login.php">Login</a>
                                </li>
                                <li><a data-toggle="collapse" data-target="#democrou" href="register.php">Register</a>
                                </li>   
                                <li><a data-toggle="collapse" data-target="#demodepart" href="howtouse.php">How To Get Free Photocopies?</a>
                                </li>
                            
                                <li><a data-toggle="collapse" data-target="#demolibra" href="aboutus.php">About Us</a>
                                </li>
                                <li><a data-toggle="collapse" data-target="#Miscellaneousmob" href="contactus.php">Contact Us</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu end -->

<form name='frm' method="post">
                                <div class="modal animated shake" id="myModalseven" role="dialog" style="display: none;">
                                    <div class="modal-dialog modals-default">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <h2>Notice</h2>
                                               <p>This Registration is only for those who wants to be a member/user of this system but if you are Advertiser or Xeroxshopkeeper who wants to collaborate with this system then you have to contact with System-Admin.<br><br>
                 If you want to jump on Contactform. <a href="contactus.php"> Click Here</a></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-default waves-effect" name='btnok'>&nbsp;OK&nbsp;</button>
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                                            </div>
                                </div>
                              </div>
                            </div>
                        </form>

    <!-- Main Menu area start-->
    <div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <li><a href="index.php"><i class="notika-icon notika-house"></i> Home</a>
                        </li>
                        <li><a href="login.php"><i class="notika-icon notika-support"></i> Login</a>
                        </li>
                        <li><a href="#myModalseven" data-toggle="modal"><i class="notika-icon notika-edit"></i> Register</a>
                        </li>
                          <li><a href="howtouse.php"><i class="notika-icon notika-windows"></i> How To Get Free Photocopies?</a>
                        </li>
                      
                        <li><a href="aboutus.php"><i class="notika-icon notika-form"></i> About Us</a>
                        </li>
                        <li><a href="contactus.php"><i class="notika-icon notika-app"></i> Contact Us</a>
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