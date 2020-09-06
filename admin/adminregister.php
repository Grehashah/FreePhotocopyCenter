<!DOCTYPE html>
<html lang="en">

<script>

function charactersonly()
{
  if((event.keyCode>=65 && event.keyCode<=90) || (event.keyCode>=97 && event.keyCode<122))
  {
    return true;
  }
  else
  {
    return false;
  }
}
function numsonly()
{
  if((event.keyCode>=48 && event.keyCode<=59))
  {
    return true;
  }
  else
  {
    return false;
  }
}

</script>



<?php

$aaaid="";
$admincnt1=0;
$xeroxshopcnt1=0;
$advcnt1=0;
$membercnt1=0;
if(isset($_POST["btnlogout"]))
{

session_start();

$aaaid=$_SESSION["AdminId"];

date_default_timezone_set('Asia/Kolkata');
$lastseen=date("Y-m-d h-i-s");

$str7="update admin set Lseen='$lastseen' where AdminId='$aaaid'";
$conn7=mysqli_connect("localhost","root","","freephotocopycenter");
$result7=$conn7->query($str7);

echo"<script>location.href='http://localhost/freephotocopycenter/login.php'</script>";
}

$no=0;
$picerr="";
$picerr1="";
$picerr2="";
$picerr3="";
$unameerr="";
$fnameerr="";
$lnameerr="";
$addresserr="";
$onameerr="";
$areaerr="";
$gendererr="";
$pwderr="";
$cpwderr="";
$emailerr="";
$cnoerr="";
$cnoerr1="";


$adminuname="";
$adminfname="";
$adminlname="";
$adminpwd="";
$gender="";
$dob="";
$address="";
$contactno="";
$email="";
$dob="";
$doj="";
$pic="";
$lastseen="";
$isauth="";
$officename="";
$address="";
$areaid="";
$areaname="";
$str="";
$result="";
$conn="";
$pwderr1="";
$confirmpwd="";
$s1="";
$s2="";
$s3="";
$s4="";
$s5="";
$s6="";
$s7="";
$s8="";
$s9="";
$s10="";
$s11="";
$r1="";
$r2="";
$flag=0;
$cpwderr1="";

if(isset($_POST["btnsubmit"]))
{
    
  $adminuname=$_POST["txtusername"];
  $adminfname=$_POST["txtfirstname"];
  $adminlname=$_POST["txtlastname"];
  $adminpwd=$_POST["txtpassword"];
  $confirmpwd=$_POST["txtconfirm_password"];
  if(!empty($_POST["rdbgender"]))
  {
  $gender=$_POST["rdbgender"];	
    if($gender=="male")
  {
    $r1="checked";
  }
  if($gender=="female")
  {
    $r2="checked";
  }
  
  }

$dob=$_POST["txtdob"];
  $address=$_POST["txtaddress"];
  $contactno=$_POST["txtcontactno"];
  $email=$_POST["txtemail"];
  $officename=$_POST["txtofficename"];
  $address=$_POST["txtaddress"];
  $areaid=$_POST["cmbarea"];
 

                        //Image Upload 

              $file=$_FILES['image'];
              $fileName=$_FILES['image']['name'];
              $fileTmpName=$_FILES['image']['tmp_name'];
              $fileSize=$_FILES['image']['size'];
              $fileError=$_FILES['image']['error'];
              $fileType=$_FILES['image']['type'];

              $fileExt=explode('.', $fileName);
              $fileActualExt=strtolower(end($fileExt));

              $allowed=array('jpg','jpeg','png');


 //validations

  if(empty($adminfname))
  {
      $fnameerr="Must be filled.";
  }
  else if(empty($adminlname))
  {
      $lnameerr="Must be filled.";
  } 
  else if(empty($adminuname))
  {
      $unameerr="Must be filled.";
  }
   else if(empty($gender))
  {
    $gendererr="Must be Selected.";
  } 
  else if(empty($adminpwd))
  {
      $pwderr="Must be filled.";
  }
  else if(strlen($adminpwd)!=8)
  {
      $pwderr1="Password Must be of 8 Characters.";  
  }
  else if(empty($confirmpwd))
  {
      $cpwderr="Must be filled.";
  }
  else if($confirmpwd!=$adminpwd)
  {
    $cpwderr1="Password did not Match."; 
  }
   else if(empty($contactno))
  {
      $cnoerr="Must be filled.";
  }
  else if(strlen($contactno)!=10)
  { 
      $cnoerr1="Contact No. Must be of 10 Numbers.";
  }
  else if(empty($email))
  {
      $emailerr="Must be filled.";
  }
  else if(!$_POST["cmbarea"])
  {
      $areaerr="Any one of them must be chosen.";
  }
  else if(empty($address))
  {
      $addresserr="Must be filled.";
  }
  else if($fileName=="")
  {
    $picerr="Pic must be uploaded.";
  }
  else if(!in_array($fileActualExt, $allowed))
  { 
   $picerr1="Only jpg , jpeg or png image are allowed.";
  }
  else if($fileError != 0)
  {
    $picerr2="There was an error while uploading your Image.";
  }
  else if($fileSize > 1000000)
  { 
   $picerr3="Your Image size must be within 10MB.";
  }
  else
  {
        //main coding

  $isauth="yes";


  

  
  date_default_timezone_set('Asia/Kolkata');
  $doj=date("Y-m-d h-i-s");

  date_default_timezone_set('Asia/Kolkata');
  $lastseen=date("Y-m-d h-i-s");

//unique id and email required

        $stradmin="select * from admin where AdminUname='$adminuname'";
        $strmember="select * from member where MUname='$adminuname'";
        $strxeroxshop="select * from xeroxshop where XUname='$adminuname'";
        $stradvertiser="select * from advertiser where AUname='$adminuname'";
      
        $conn1=mysqli_connect("localhost","root","","freephotocopycenter");
        $adminresult1=$conn1->query($stradmin);
        $admincnt1=mysqli_num_rows($adminresult1);
       
        $xeroxshopresult1=$conn1->query($strxeroxshop);
        $xeroxshopcnt1=mysqli_num_rows($xeroxshopresult1);
       
        $advresult1=$conn1->query($stradvertiser);
        $advcnt1=mysqli_num_rows($advresult1);
       
        $memberresult1=$conn1->query($strmember);
        $membercnt1=mysqli_num_rows($memberresult1);

 if($admincnt1!=0)
 {
  $flag=1;
	echo "<script> alert('Entered Username is already Registred! Enter Another one.') </script>";
  
 }
 if($xeroxshopcnt1!=0)
 {
  $flag=1;
  echo "<script> alert('Entered Username is already Registred! Enter Another one.') </script>";

 }
 if($advcnt1!=0)
 {
  $flag=1;
  echo "<script> alert('Entered Username is already Registred! Enter Another one.') </script>";

 }
 if($membercnt1!=0)
 {$flag=1;
   echo "<script> alert('Entered Username is already Registred! Enter Another one.') </script>";
 
 }



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

 if($admincnt1!=0)
 {
  $flag=1;
  echo "<script> alert('Entered Email is already Registred! Enter Another one.') </script>";

}
 if($xeroxshopcnt1!=0)
 {$flag=1;
  echo "<script> alert('Entered Email is already Registred! Enter Another one.') </script>";

 }
 if($advcnt1!=0)
 {$flag=1;
  echo "<script> alert('Entered Email is already Registred! Enter Another one.') </script>";
}
 if($membercnt1!=0)
 {$flag=1;  
  echo "<script> alert('Entered Email is already Registred! Enter Another one.') </script>";
 }

      if($flag==0)
      {    
                       //Image Upload 
									$strr="select * from admin";
									$connn=mysqli_connect("localhost","root","","freephotocopycenter");
									$resultt=$connn->query($strr);
									while($roww=$resultt->fetch_assoc())
									{
										$no++;
									}
									$no++;
  									$fileNameNew = "a".mt_rand(100000,999999).".".$fileActualExt;
  									$fileDestination="img/user-photos/admin/".$fileNameNew;
  									move_uploaded_file($fileTmpName, $fileDestination);

                     $str="insert into admin values('','$adminuname','$adminpwd','$adminfname','$adminlname','$gender','$fileNameNew','$doj','$dob','$contactno','$email','$lastseen','$isauth','$officename','$address','$areaid')";

                     $conn=mysqli_connect("localhost","root","","freephotocopycenter");
                     $result=$conn->query($str);

                                   echo("<script>location.href='http://localhost/freephotocopycenter/login.php'</script>");
               
 } 
 }         
}


if(isset($_POST["btncancel"]))
{
  echo("<script>location.href='index.php'</script>");
}

?>



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
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-fileupload/bootstrap-fileupload.css" />
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-datepicker/css/datepicker.css" />
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-daterangepicker/daterangepicker.css" />
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-timepicker/compiled/timepicker.css" />
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-datetimepicker/datertimepicker.css" />
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

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
      <header class="header black-bg">
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
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
<section class="wrapper">       
   <div class="col-lg-10">
                   <h3>&nbsp;&nbsp;<i class="fa fa-angle-right"></i> <b>Registration Form For Admin</b></h3>
            <div class="form-panel">
              <div class="form">
                <form class="cmxform form-horizontal style-form" id="signupForm" method="post" action="" enctype="multipart/form-data">
                  
                  <div class="form-group ">
                    <label for="firstname" class="control-label col-lg-2"><font size='3'>Firstname <sup><font color='red'>*</font></sup> :</font></label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="firstname" name="txtfirstname" type="text" value="<?php echo $adminfname; ?>" onkeypress="return charactersonly();">
                       <font color="red"><?php echo $fnameerr; ?></font>
                    
                    </div>
                  </div>
                 <div class="form-group ">
                    <label for="lastname" class="control-label col-lg-2"><font size='3'>Lastname<sup><font color='red'>*</font></sup> :</font></label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="lastname" name="txtlastname" type="text" value="<?php echo $adminlname; ?>" onkeypress="return charactersonly();">
                       <font color="red"><?php echo $lnameerr; ?></font>
                    
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="username" class="control-label col-lg-2"><font size='3'>Username<sup><font color='red'>*</font></sup> :</font></label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="username" name="txtusername" type="text" value="<?php echo $adminuname; ?>" maxlength='20'>
                       <font color="red"><?php echo $unameerr; ?></font>
                    
                    </div>
                  </div>

                  <div class="form-group ">
                    <label for="gender" class="control-label col-lg-2"><font size='3'>Select Gender :</font></label>
                    <div class="col-lg-10">
                    <input type="radio" value="male" name="rdbgender" <?php echo $r1; ?>> Male </input>&nbsp;
                    <input type="radio" value="female" name="rdbgender" <?php echo $r2; ?>> Female </input>   <font color="red"><?php echo $gendererr; ?></font>
                 
                    &nbsp;&nbsp;&nbsp; 
                   
                    </div>
                  </div>                  <div class="form-group ">
                    <label for="password" class="control-label col-lg-2"><font size='3'>Password<sup><font color='red'>*</font></sup> :</font></label>
                    <div class="col-lg-10">
                      <input class="form-control " id="password" name="txtpassword" type="password" value="<?php echo $adminpwd; ?>" maxlength='8'>
                         <font color="red"><?php echo $pwderr; echo $pwderr1; ?></font>
                 
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="confirm_password" class="control-label col-lg-2"><font size='3'>Confirm Password<sup><font color='red'>*</font></sup>:</font></label>
                    <div class="col-lg-10">
                      <input class="form-control " id="confirm_password" name="txtconfirm_password" type="password" value="<?php echo $confirmpwd; ?>" maxlength='8'>
                         <font color="red"><?php echo $cpwderr; echo $cpwderr1; ?></font>
                 
                    </div>
                  </div>

                     <div class="form-group">
                    <label for="confirm_password" class="control-label col-lg-2"><font size='3'>Date of Birth :</font></label>
                    <div class="col-lg-10">
                   
                                          <input data-date-format="yyyy-mm-dd" class="form-control input-sm" id="dob" name="txtdob" type="date" value="<?php echo $dob; ?>">
                    </div>
                  </div>

                  <div class="form-group ">
                    <label for="contactno" class="control-label col-lg-2"><font size='3'>Contact No.<sup><font color='red'>*</font></sup> :</font></label>
                    <div class="col-lg-10">
                      <input class="form-control " id="contactno" name="txtcontactno" type="text" value="<?php echo $contactno; ?>" maxlength='10' onkeypress="return numsonly();">
                         <font color="red"><?php echo $cnoerr; echo $cnoerr1; ?></font>
                 
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="email" class="control-label col-lg-2"><font size='3'>Email<sup><font color='red'>*</font></sup> :</font></label>
                    <div class="col-lg-10">
                      <input class="form-control " id="email" name="txtemail" type="email" value="<?php echo $email; ?>">
                         <font color="red"><?php echo $emailerr; ?></font>
                 
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="officename" class="control-label col-lg-2"><font size='3'>Officename<sup><font color='red'>*</font></sup> :</font></label>
                    <div class="col-lg-10">
                      <input class="form-control " id="officename" name="txtofficename" type="text" value="<?php echo $officename; ?>" maxlentgh='20'>
                         <font color="red"><?php echo $onameerr; ?></font>
                 
                    </div>
                  </div>


                  <div class="form-group ">
                    <label for="officename" class="control-label col-lg-2"><font size='3'>Office Area<sup><font color='red'>*</font></sup>:</font></label>
                      <div class="col-lg-10">
                        
						<select name="cmbarea" style='margin-top: 9px;'>
                    <option value='0'>Select Area</option>
                     
                          <?php
    $str="select * from area";
    $conn=mysqli_connect("localhost","root","","freephotocopycenter");
    $result=$conn->query($str);

                            while($row=$result->fetch_assoc())
                            {
                              echo "<option value=".$row["AreaId"].">".$row["AreaName"]."</option>";
                            } 
                          ?>
                          </select> &nbsp;&nbsp;&nbsp;  <font color="red"><?php echo $areaerr; ?></font>
                 
                                    </div>
                </div>
    
                      <div class="form-group ">
                    <label for="address" class="control-label col-lg-2"><font size='3'>Address<sup><font color='red'>*</font></sup> :</font></label>
                    <div class="col-lg-10">
                      <textarea class="form-control " id="address" name="txtaddress" rows="10" cols="10" maxlength='300'><?php echo $address; ?></textarea>
                      <font color="red"><?php echo $addresserr; ?></font>
                  
                    </div>
                  </div>

                  <div class="form-group">
                  <label class="control-label col-lg-2"><font size='3'>Image Upload<sup><font color='red'>*</font></sup> :</font></label>
                  <div class="col-lg-10">
                    <div class="fileupload fileupload-new" data-provides="fileupload" style='margin-top: 6px;'>
                      <input type="hidden" name="size" value="1000000">
                      <input type="file" name="image" style="font-size: 15px;">  
                     <br>
                      <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 10px;"></div>
                    </div>
                    <font color="red"><?php echo $picerr; echo $picerr1; echo $picerr2; echo $picerr3; ?></font>
                 
                 </div>
                </div>
                    
                  <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                      <input class="btn btn-theme" type="submit" name="btnsubmit" value="Save">
                      <input class="btn btn-theme" type="reset" name="btnreset" value="Reset">
                      <input class="btn btn-danger" type="submit" name="btncancel" value="Cancel"></div>
                  </div>

                </form>
              </div>
            </div>
            <!-- /form-panel -->
          </div>
</section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>Dashio</strong>. All Rights Reserved
        </p>
        <div class="credits">
          <!--
            You are NOT allowed to delete the credit link to TemplateMag with free version.
            You can delete the credit link only if you bought the pro version.
            Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
            Licensing information: https://templatemag.com/license/
          -->
          Created with Dashio template by <a href="https://templatemag.com/">TemplateMag</a>
        </div>
        <a href="advanced_form_components.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <!--script for this page-->
  <script src="lib/jquery-ui-1.9.2.custom.min.js"></script>
  <script type="text/javascript" src="lib/bootstrap-fileupload/bootstrap-fileupload.js"></script>
  <script type="text/javascript" src="lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="lib/bootstrap-daterangepicker/date.js"></script>
  <script type="text/javascript" src="lib/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript" src="lib/bootstrap-daterangepicker/moment.min.js"></script>
  <script type="text/javascript" src="lib/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
  <script src="lib/advanced-form-components.js"></script>

</body>

</html>