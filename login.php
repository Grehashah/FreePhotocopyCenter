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
        // Import PHPMailer classes into the global namespace
        // These must be at the top of your script, not inside a function
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

        //Load Composer's autoloader
        require 'vendor/autoload.php';

$uname="";
$upwd="";
$isauth="";
$aid="";
$advid="";
$mid="";
$xsid="";
$pic="";
$unameerr="";
$upwderr="";
$qty=0;
$aqh=0;
$currqty=0;
$cnttt=0;
$qtygiven=0;


if(isset($_POST["btnconfirm"]))
{
  header("location:register.php");
}


if(isset($_POST["btnsignin"]))
{
 $uname=$_POST["txtuname"];
 $upwd=$_POST["txtupwd"];

 if(empty($uname))
 {
  $unameerr="Must be Filled.";
 }
 else if(empty($upwd))
 {
  $upwderr="Must be Filled.";
 }
 else
 {
 $admin="select * from admin where BINARY AdminUname='$uname' and BINARY AdminPwd='$upwd'";
 $member="select * from member where BINARY MUname='$uname' and BINARY MPwd='$upwd'";
 $xeroxshop="select * from xeroxshop where BINARY XUname='$uname' and BINARY XPwd='$upwd'";
 $advertiser="select * from advertiser where BINARY AUname='$uname' and BINARY APwd='$upwd'";
 
 $conn=mysqli_connect("localhost","root","","freephotocopycenter");
 
 $memberresult=$conn->query($member);
 $membercnt=mysqli_num_rows($memberresult);

 $adminresult=$conn->query($admin);
 $admincnt=mysqli_num_rows($adminresult);
 
 $advresult=$conn->query($advertiser);
 $advcnt=mysqli_num_rows($advresult);
 
 $xeroxshopresult=$conn->query($xeroxshop);
 $xeroxshopcnt=mysqli_num_rows($xeroxshopresult);

 if($admincnt==1)
 {
    $row=$adminresult->fetch_assoc();
    $isauth=$row["IsAuth"];
 
    if($isauth=="yes" || $isauth=="YES")
    {

	//cookie
    	if(!empty($_POST['chkremeber']))
    	{
    		setcookie("member_name",$_POST["txtuname"],time()+(10 * 365 * 24 * 60 *60));
    		setcookie("member_password",$_POST["txtupwd"],time()+(10 * 365 * 24 * 60 *60));
    	}
    	else
    	{
    		if(isset($_COOKIE['member_name']))
    		{
    			setcookie("member_name","");
    		}
    		if(isset($_COOKIE['member_password']))
    		{
    			setcookie("member_password","");
    		}
    	}


    $aid=$row["AdminId"];
    
    session_start();
  
    $_SESSION["AdminId"] = $aid;
    $_SESSION["AdminUname"]=$uname;
    
     header("location:admin\index.php");
     
    }
    else
    {
      $uname="";
      $upwd="";
     echo "<script> alert('Sorry Your Session Is Blocked'); </script>";
    }
  }
  elseif($membercnt==1)
  {

    $row=$memberresult->fetch_assoc();
    $isauth=$row["IsAuth"];
 
    if($isauth=="yes")
    {//cookie
    	if(!empty($_POST['chkremeber']))
    	{
    		setcookie("member_name",$_POST["txtuname"],time()+(10 * 365 * 24 * 60 *60));
    		setcookie("member_password",$_POST["txtupwd"],time()+(10 * 365 * 24 * 60 *60));
    	}
    	else
    	{
    		if(isset($_COOKIE['member_name']))
    		{
    			setcookie("member_name","");
    		}
    		if(isset($_COOKIE['member_password']))
    		{
    			setcookie("member_password","");
    		}
    	}
    $mid=$row["MId"];

    session_start();
  
    $_SESSION['timerflag']=0;
    $_SESSION["MemberId"] = $mid;
    $_SESSION["MemberUname"]=$uname;
  
     header("location:member/template/index.php");
     
    }
    else
    {
      $uname="";
      $upwd="";
     echo "<script> alert('Sorry Your Session Is Blocked by Admin'); </script>";
    } 
  }
  elseif($advcnt==1)
  {

    $row=$advresult->fetch_assoc();
    $isauth=$row["IsAuth"];
 
    if($isauth=="yes")
    {//cookie
    	if(!empty($_POST['chkremeber']))
    	{
    		setcookie("member_name",$_POST["txtuname"],time()+(10 * 365 * 24 * 60 *60));
    		setcookie("member_password",$_POST["txtupwd"],time()+(10 * 365 * 24 * 60 *60));
    	}
    	else
    	{
    		if(isset($_COOKIE['member_name']))
    		{
    			setcookie("member_name","");
    		}
    		if(isset($_COOKIE['member_password']))
    		{
    			setcookie("member_password","");
    		}
    	}
    $advid=$row["AdvId"];

    session_start();
  
    $_SESSION["AdvId"] = $advid;
    $_SESSION["AdvUname"]=$uname;


  
     header("location:advertiser\index.php");

     
    }
    else
    {
      $uname="";
      $upwd="";
     echo "<script> alert('Sorry Your Session Is Blocked by Admin'); </script>";
    } 
  }
  elseif($xeroxshopcnt==1)
  {

    $row=$xeroxshopresult->fetch_assoc();
    $isauth=$row["IsAuth"];
 
    if($isauth=="yes")
    {//cookie
    	if(!empty($_POST['chkremeber']))
    	{
    		setcookie("member_name",$_POST["txtuname"],time()+(10 * 365 * 24 * 60 *60));
    		setcookie("member_password",$_POST["txtupwd"],time()+(10 * 365 * 24 * 60 *60));
    	}
    	else
    	{
    		if(isset($_COOKIE['member_name']))
    		{
    			setcookie("member_name","");
    		}
    		if(isset($_COOKIE['member_password']))
    		{
    			setcookie("member_password","");
    		}
    	}
    $xsid=$row["XId"];

    session_start();
  
    $_SESSION["XeroxshopId"] = $xsid;
    $_SESSION["XeroxshopUname"]=$uname;
  

     $str1="select * from stock where XId='$xsid'";
     $conn1=mysqli_connect("localhost","root","","freephotocopycenter");
     $result1=$conn1->query($str1);
     $cnttt=mysqli_num_rows($result1);

     if($cnttt!=0)
     {   
       while($row1=$result1->fetch_assoc())
       {
          $qoh=$row1["QOH"];
          $aqh=$row1["AQH"];
       }
      }
     else
     {
      $qty=1000;
$aqh=1000;
$qoh=100;
$qtygiven=1000;

 //INITIAL STOCK ALLOTMENT

    $strr="select * from stock";
    $connn=mysqli_connect("localhost","root","","freephotocopycenter");
    $resultt=$connn->query($strr);
    while($roww=$resultt->fetch_assoc())
    {
      $currqty=$roww["CurrQty"];  
    }
    
   $currqty=$currqty-$qtygiven;
   date_default_timezone_set('Asia/Kolkata');
   $dos=date("Y-m-d");

    $str9="insert into stock values('','$dos','$xsid','$qty','$qoh','$aqh','$qtygiven','$currqty')";
    $conn9=mysqli_connect("localhost","root","","freephotocopycenter");
    $result9=$conn9->query($str9);

     }


    if($aqh<$qoh)
    {
      echo "<script>alert('You are running on low stock , Please place order ASAP !')</script>";
      echo "<script>location.href='shopkeeper/index.php'</script>";
    }  
    else
    {
         header("location:shopkeeper\index.php");
    }
     
    }
    else
    {
      $uname="";
      $upwd="";
     echo "<script> alert('Sorry Your Session Is Blocked by Admin'); </script>";
    } 
  }
 else
 {
      $uname="";
      $upwd="";
    
    echo "<script> alert('Invalid Username or password.'); </script>";
    }
}
}

//Coding of ForgotPWD

        $str1="";
        $result1="";
        $conn1="";
        $email="";
        $c1="";

        if(isset($_POST["btnsubmit"]))
        {
        
        $email=$_POST["txtemail"];
        if(empty($email))
        {
             echo "<script>alert('Email Address is Required.');</script>";
        }
        else
        {
        $stradmin="select * from admin where BINARY Email='$email'";
        $strmember="select * from member where BINARY Email='$email'";
        $strxeroxshop="select * from xeroxshop where BINARY Email='$email'";
        $stradvertiser="select * from advertiser where BINARY Email='$email'";
        
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
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug = 0;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'freephotocopycenter@gmail.com';                 // SMTP username
            $mail->Password = 'fpc@2019';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('freephotocopycenter@gmail.com', 'freephotocopycenter');
            $mail->addAddress($email);     // Add a recipient
            
            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Forgot Password';
            $mail->Body    = "<p>For Changing your current Password of the freephotocopycenter Site <a href='http://localhost/freephotocopycenter/forgotpwd.php?emailaddress=".$email."'>Click Here</a></p>";

            $mail->send();
           
            echo "<script> alert('Email has been sent. Kindly check your MailBox.'); </script>";
         } catch (Exception $e) {
            echo "<script> alert('Something Went Wrong !'); </script>";
          }         
        }        
        elseif($membercnt1==1)
        {

        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug = 0;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'freephotocopycenter@gmail.com';                 // SMTP username
            $mail->Password = 'fpc@2019';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('freephotocopycenter@gmail.com', 'freephotocopycenter');
            $mail->addAddress($email);     // Add a recipient
            
            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Forgot Password';
            $mail->Body    = "<p>For Changing your current Password of the freephotocopycenter Site <a href='http://localhost/freephotocopycenter/forgotpwd.php?emailaddress=".$email."'>Click Here</a></p>";

            $mail->send();
           
            echo "<script> alert('Email has been sent. Kindly check your MailBox.'); </script>";
         } catch (Exception $e) {
            echo "<script> alert('Something Went Wrong !'); </script>";
          }
        }
        elseif($advcnt1==1)
        {

        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug = 0;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'freephotocopycenter@gmail.com';                 // SMTP username
            $mail->Password = 'fpc@2019';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('freephotocopycenter@gmail.com', 'freephotocopycenter');
            $mail->addAddress($email);     // Add a recipient
            
            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Forgot Password';
            $mail->Body    = "<p>For Changing your current Password of the freephotocopycenter Site <a href='http://localhost/freephotocopycenter/forgotpwd.php?emailaddress=".$email."'>Click Here</a></p>";

            $mail->send();
           
            echo "<script> alert('Email has been sent. Kindly check your MailBox.'); </script>";
         } catch (Exception $e) {
            echo "<script> alert('Something Went Wrong !'); </script>";
          }
        }
        elseif($xeroxshopcnt1==1)
        {
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug = 0;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'freephotocopycenter@gmail.com';                 // SMTP username
            $mail->Password = 'fpc@2019';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('freephotocopycenter@gmail.com', 'freephotocopycenter');
            $mail->addAddress($email);     // Add a recipient
            
            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Forgot Password';
            $mail->Body    = "<p>For Changing your current Password of the freephotocopycenter Site <a href='http://localhost/freephotocopycenter/forgotpwd.php?emailaddress=".$email."'>Click Here</a></p>";

            $mail->send();
           
            echo "<script> alert('Email has been sent. Kindly check your MailBox.'); </script>";
         } catch (Exception $e) {
            echo "<script> alert('Something Went Wrong !'); </script>";
          }
        }
        else
        {
             echo "<script> alert('Inavalid EmailAddress !'); </script>";
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
        <h2 class="form-login-heading">sign in now</h2>
        <div class="login-wrap">
          <input type="text" class="form-control" name="txtuname" placeholder="User Name" value="<?php if(isset($_COOKIE["member_name"])) { echo $_COOKIE["member_name"]; } ?>"autofocus>
            <font size='2' color="red"><?php echo $unameerr; ?></font>
                  
          <br>
          <input type="password" class="form-control" name="txtupwd" placeholder="Password" value="<?php if(isset($_COOKIE["member_password"])) { echo $_COOKIE["member_password"]; } ?>">
            <font size='2' color="red"><?php echo $upwderr; ?></font>
                  
          <label class="checkbox">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" value="remember-me" name='chkremeber' <?php if(isset($_COOKIE["member_name"])){ echo "checked"; } ?>>Remember me
            <span class="pull-right">
            <a data-toggle="modal" href="login.php#myModal"> Forgot Password ?</a>
            </span>
            </label>
          <button class="btn btn-theme btn-block" type="submit" name="btnsignin"><i class="fa fa-lock"></i> SIGN IN</button>
          <hr>
       <div class="registration">
            Don't have an account yet?<br/>
            <a data-toggle="modal" href="login.php#myModall">
              Create an account
            </a>
          </div>
        </div>
        <!-- Modal -->

     
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="
        modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"> Forgot Password ?</h4>
              </div>
              <div class="modal-body">
                <p>Enter your e-mail address below to reset your password.</p>
                <input type="text" value="<?php echo $email; ?>" name="txtemail" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
              </div>
              <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="submit" name='btncancel'>Cancel</button>
                <button class="btn btn-theme" type="submit" name='btnsubmit'>Submit</button>
              </div>
            </div>
          </div>
        </div>


        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModall" class="
        modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"> Notice</h4>
              </div>
              <div class="modal-body">
                <p>This Registration is only for those who wants to be a member/user of this system but if you are Advertiser or Xeroxshopkeeper who wants to collaborate with this system then you have to contact with System-Admin.<br><br>
                 If you want to jump on Contactform. <a href="contactus.php"> Click Here</a></p>
              </div>
              <div class="modal-footer">
                
                <button class="btn btn-theme" type="submit" name='btnconfirm'>&nbsp;OK&nbsp;</button>
                <button data-dismiss="modal" class="btn btn-default" type="submit" name='btnmodalcancel'>Cancel</button>
              </div>
            </div>
          </div>
        </div>


        <!-- modal -->
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
