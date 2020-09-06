<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Dashio - Bootstrap Admin Template</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  
  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->

</head>

<?php

$c="";
$str="";
$result="";
$conn="";
$row="";
$email="";
$pwd="";
$conpwd="";
 
 $email=$_GET["emailaddress"];

if(isset($_POST["btnsubmit"]))
{
 $pwd=$_POST["txtpwd"];
 $conpwd=$_POST["txtconpwd"];

        $stradmin="select * from admin where Email='$email'";
        $strmember="select * from member where Email='$email'";
        $strxeroxshop="select * from xeroxshop where Email='$email'";
        $stradvertiser="select * from advertiser where Email='$email'";
        
        $conn1=mysqli_connect("localhost","root","","freephotocopycenter");
        $adminresult1=$conn1->query($stradmin);
        $admincnt1=mysqli_num_rows($adminresult1);
       
        $xeroxshopresult1=$conn1->query($strxeroxshop);
        $xeroxshopcnt1=mysqli_num_rows($xeroxshopresult1);
       
        $advresult1=$conn1->query($stradvertiser);
        $advcnt1=mysqli_num_rows($advresult1);
       
        $memberresult1=$conn1->query($strmember);
        $membercnt1=mysqli_num_rows($memberresult1);

        if($admincnt1==1)
        {
                  if($pwd==$conpwd)
                   {
                   $str2="update admin set AdminPwd='$pwd' where Email='$email'";
                   $conn2=mysqli_connect("localhost","root","","freephotocopycenter");
                   $result2=$conn2->query($str2);

                   header("location:login.php");
                   }
                   else
                   {
                    echo "<script> alert('Password Mismatch'); </script>";
                   }
        }        
        elseif($membercnt1==1)
        {
               if($pwd==$conpwd)
               {
               $str3="update member set MPwd='$pwd' where Email='$email'";
               $conn3=mysqli_connect("localhost","root","","freephotocopycenter");
               $result3=$conn3->query($str3);
               
               header("location:login.php");
               }
               else
               {
                echo "<script> alert('Password Mismatch'); </script>";
               }
        }
        elseif($advcnt1==1)
        {
                if($pwd==$conpwd)
                 {
                 $str4="update advertiser set APwd='$pwd' where Email='$email'";
                 $conn4=mysqli_connect("localhost","root","","freephotocopycenter");
                 $result4=$conn4->query($str4);
         
                 header("location:login.php");
                 }
                 else
                 {
                  echo "<script> alert('Password Mismatch'); </script>";
                 }
        }
        elseif($xeroxshopcnt1==1)
        {
                  if($pwd==$conpwd)
                   {
                   $str5="update xeroxshop set XPwd='$pwd' where Email='$email'";
                   $conn5=mysqli_connect("localhost","root","","freephotocopycenter");
                   $result5=$conn5->query($str5);

                   header("location:login.php");
                   }
                   else
                   {
                    echo "<script> alert('Password Mismatch'); </script>";
                   }
        }
}

?>

<body>
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
  <div id="login-page">
    <div class="container">
      <form class="form-login" method="post" name='frm1'>
        <h2 class="form-login-heading">Change Password</h2>
        <div class="login-wrap">
          <input type="password" class="form-control" name="txtpwd" placeholder="Enter New Password" value="<?php echo $pwd; ?>"autofocus>
          <br>
          <input type="password" class="form-control" name="txtconpwd" placeholder="Retype Password" value="<?php echo $conpwd; ?>">
          <br>
          <button class="btn btn-theme btn-block" type="submit" name="btnsubmit"> Click here </button>
        </div>
      </form>
    </div>
  </div>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("img/login-bg.jpg", {
      speed: 500
    });
  </script>
</body>
</html>