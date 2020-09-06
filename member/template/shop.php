<?php
include_once("header.php");
?>
<script>

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
        // Import PHPMailer classes into the global namespace
        // These must be at the top of your script, not inside a function
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

        //Load Composer's autoloader
        require 'vendor/autoload.php';
        require('textlocal.class.php');
?>

<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login Register | Notika - Notika Admin Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
        ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
        ============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
        ============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- font awesome CSS
        ============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- owl.carousel CSS
        ============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- animate CSS
        ============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
        ============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- mCustomScrollbar CSS
        ============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- wave CSS
        ============================================ -->
    <link rel="stylesheet" href="css/wave/waves.min.css">
    <!-- Notika icon CSS
        ============================================ -->
    <link rel="stylesheet" href="css/notika-custom-icon.css">
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

    <?php
    $acopies=0;
    $usercopies="";
    $status="";
    $email="";
    $coupon="";
    $mname="";
    $cno=0;
    $flag=0;
    $nop=0;
    $flagg=0;
    $doo="";
    $dop="";
	$doo1="";

                                $xid=$_GET['ID'];
                                $str="select * from xeroxshop where XId='$xid'";
                                $conn1=mysqli_connect("localhost","root","","freephotocopycenter");
                                $result1=$conn1->query($str);
                                

                                $row1=$result1->fetch_assoc();
                                  $xname=$row1["XName"];
                                    $xuname=$row1["XUname"];
                                      $cno=$row1["ContactNo"];
                                          $xaddress=$row1["Address"];
                         
                                    $areaid=$row1["AreaId"];

                                $str="select * from area where AreaId='$areaid'";
                                $conn=mysqli_connect("localhost","root","","freephotocopycenter");
                                $result=$conn->query($str);
                                $row=$result->fetch_assoc();
                                $aname=$row["AreaName"];

                                //

                                /*date_default_timezone_set('Asia/Kolkata');
                                $currentdate=date("Y-m-d h:i:sa");
                                $curr=date('Y-m-d');
                                $c=strtotime($curr);
                                $currentdate1=strtotime($currentdate);
                                $currentdate2=date("Y-m-d h-i-s");
                                $currentdate3=strtotime($currentdate2);
                                $t1=strtotime($currentdate3."08:00:00");
                                $t2=strtotime($currentdate3."20:00:00");*/



								date_default_timezone_set('Asia/Kolkata');
								$currentdate=date("Y-m-d H:i:s");
                                $curr=date('Y-m-d');
                                $c=strtotime($curr);
						        $currentdate2=date("H:i:s");
                                $currentdate1=strtotime($currentdate2);
                                $t1=strtotime("08:00:00");
                                $t2=strtotime("23:00:00");
                                $currentdate3=date("Y-m-d H:i:s");
                                $currentdate4=strtotime($currentdate3);

                                if(!empty($_POST["txtcopies"]))
                                {
                                    $usercopies=$_POST["txtcopies"];    
                                }


                                $str2="select * from otp where MId='$mid'";
                                $conn2=mysqli_connect("localhost","root","","freephotocopycenter");
                                $result2=$conn2->query($str2);
                                while($row2=$result2->fetch_assoc())
                                {
                                	$doo=$row2["DOO"];
                                	$doo1=strtotime($doo);
                                    $doo11=date("Y-m-d",$doo1);
                                    $do=strtotime($doo11);

                                    if($do==$c)
                                    {
                                        $nop+=$row2['NOP'];
                                        $flag=1;
                                    }
                                }

                                if($flag==1)
                                {
                                    $acopies=20;
                                    $acopies=$acopies-$nop;
                                    if($acopies<=0)
                                    {
                                        $acopies=0;
                                    } 
                                }
                                else
                                {
                                    $acopies=20;
                                }


                                   $str2="select * from otp where MId='$mid'";
                                       $conn2=mysqli_connect("localhost","root","","freephotocopycenter");
                                       $result2=$conn2->query($str2);
                                        while($row2=$result2->fetch_assoc())
                                        {
                                        $doo1=$row2["DOO"];
                                        $doo1=strtotime($doo1." + 60 minutes");
                                      }
                                    
                                if($currentdate4>$doo1 && $currentdate1>=$t1 && $currentdate1<=$t2 && $acopies!=0)
                                {
                                    $status='';
                                }
                                else
                                {
                                    $status='disabled';
                                }


                                if(isset($_POST['btnemail']))
                                {
                                    if(empty($usercopies))
                                    {
                                           echo "<script>alert('Please enter your required Copies.')</script>";
                          
                                    }
                                    else
                                    {
                                    if($usercopies<=$acopies)
                                    {

                                    
                                    $coupon=mt_rand(1000,9999);
                                
                            
                                $str="select * from member where MId='$mid'";
                                $conn1=mysqli_connect("localhost","root","","freephotocopycenter");
                                $result1=$conn1->query($str);
                                $row1=$result1->fetch_assoc();
                                $email1=$row1["Email"];
                                $mname=$row1['MUname'];

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
                                $mail->addAddress($email1);     // Add a recipient
                                
                                //Attachments
                                //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                                //Content
                                $mail->isHTML(true);                                  // Set email format to HTML
                                $mail->Subject = 'Coupon Code';
                                $mail->Body    = "<h2>Your Coupon Code is : $coupon</h2>";

                                $mail->send();
                             
                                $flagg=1;  
                              } catch (Exception $e) {
                                $flagg=0;
                                }         

                         
                                if($flagg==1)
                                {

                                  $doo=$currentdate;
                                  $dop="0000-00-00 00:00:00";

                                $str="insert into otp values('','$coupon','$mid','$xid','$doo','$dop','$usercopies')";
                                $conn1=mysqli_connect("localhost","root","","freephotocopycenter");
                                $result1=$conn1->query($str);

                                      
                                       // timer

                                        $_SESSION['timerflag']=1;
                                       $_SESSION['duration']=60;
                                       $_SESSION['starttime']=date("Y-m-d H:i:s");
                                       $_SESSION['endtime']=date("Y-m-d H:i:s",strtotime('+'.$_SESSION['duration'].'minutes',strtotime($_SESSION['starttime'])));

                                           echo "<script> alert('Email has been sent. Kindly check your MailBox.'); </script>";
                                    
                                        echo "<script>location.href='index.php'</script>";
                                }
                                else
                                {
                                     echo "<script> alert('Something Went Wrong !'); </script>";
                                }
                            }
                                else
                                {
                                    echo "<script>alert('Your Required Copies must be less than your total Available copies.')</script>";


                                }
                            }
                              
                            }
                              
                                if(isset($_POST['btnmsg']))
                                {
                                    //Email
                                      if(empty($usercopies))
                                    {
                                           echo "<script>alert('Please enter your required copies.')</script>";
                          
                                    }
                                    else
                                    {
                                 
                                    if($usercopies<=$acopies)
                                    {

                                $str="select * from member where MId='$mid'";
                                $conn1=mysqli_connect("localhost","root","","freephotocopycenter");
                                $result1=$conn1->query($str);
                                $row1=$result1->fetch_assoc();
                                $cno=$row1["ContactNo"];
                                $mname=$row1['MUname'];

                 

                                //Message 

                                    $coupon=mt_rand(1000,9999);

                                    $textlocal = new Textlocal('grehashah56@gmail.com', 'Greha@123');

                                    $numbers = array($cno);

                                    $sender = 'TXTLCL';
                                    $message = 'Your Coupon Code is : '.$coupon;

                                    try {
                                        $result = $textlocal->sendSms($numbers, $message, $sender);
                                        //print_r($result);
                                        if($result==true)
                                        {
                                        
                                            $flagg=1;
                                        }

                                    } 
                                        catch (Exception $e) 
                                        {
                                            $flagg=0;
                                        }
                                    
                                if($flagg==1)
                                {

                                  $doo=$currentdate;
                                  $dop="0000-00-00 00:00:00";

                                $str="insert into otp values('','$coupon','$mid','$xid','$doo','$dop','$usercopies')";
                                $conn1=mysqli_connect("localhost","root","","freephotocopycenter");
                                $result1=$conn1->query($str);

                                     // timer
                                       
                                        $_SESSION['timerflag']=1;
                                       $_SESSION['duration']=60;
                                       $_SESSION['starttime']=date("Y-m-d H:i:s");
                                       $_SESSION['endtime']=date("Y-m-d H:i:s",strtotime('+'.$_SESSION['duration'].'minutes',strtotime($_SESSION['starttime'])));

                                         echo "<script> alert('Message has been sent. Kindly check your MailBox.'); </script>";
                          
                                        echo "<script>location.href='index.php'</script>";    }
                                else
                                {
                                     echo "<script> alert('Something Went Wrong !'); </script>";
                                }

                            }
                                    else
                                    {
                                        echo "<script>alert('Your Required Copies must be less than your total Available copies.')</script>";       
                                    }
                                }

                                }  

                                ?>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Login Register area Start-->
    <div class="login-content">
        <!-- Login -->
        <div class="nk-block toggled" id="l-login">

            <div class="nk-form">
                <div class="input-group">
                    <span class="input-group-addon nk-ic-st-pro"></span>
                    <b><center><h3><u>Information About Shop</u></h3></center></b><br><br>
                    
                        <font align="left"><b><h4>Shopname :</h4></b></font><font size='4'><input type="text" class="form-control" placeholder="Username" value="<?php echo $xname; ?>" disabled></font> 
                    
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon nk-ic-st-pro"></span>
                   
                        <font align="left"><b><h4>Username :</h4></b></font>
                        <font size='4'><input type="text" class="form-control" placeholder="Username" value="<?php echo $xuname; ?>" disabled></font> 
                    
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon nk-ic-st-pro"></span>

                        <font align="left"><b><h4>Contact No. :</h4></b></font>
                        <font size='4'><input type="text" class="form-control" placeholder="Username" value="<?php echo $cno; ?>" disabled></font> 
                    
                </div>
                <br>

                <div class="input-group">
                    <span class="input-group-addon nk-ic-st-pro"></span>
                    
                        <font align="left"><b><h4>Address :</h4></b></font>
                        <font size='4'><input type="text" class="form-control" placeholder="Username" value="<?php echo $xaddress; ?>" disabled></font> 
                    
                </div>
                <br>

                <div class="input-group">
                    <span class="input-group-addon nk-ic-st-pro"></span>
                    
                        <font align="left"><b><h4>Areaname :</h4></b></font>
                        <font size='4'><input type="text" class="form-control" placeholder="Username" value="<?php echo $aname; ?>" disabled></font> 
                    
                </div>
                
                <a href="#l-register" data-ma-action="nk-login-switch" data-ma-block="#l-register" class="btn btn-login btn-success btn-float"><i class="notika-icon notika-right-arrow right-arrow-ant"></i></a>

            
            </div>

                            <div class="alert alert-success" role="alert" align='center' >
                              <font size='3' >   To generate Coupon code click on the arrow. </font>
              </div> 
        </div>

        <!-- Register -->
        <div class="nk-block" id="l-register">
            <form method='post'>
            <div class="nk-form"> 
                <div class="input-group">   
                    <span class="input-group-addon nk-ic-st-pro"></span>
                  
                    <font size='5'><center><b>Get Your Coupon</b></center></font>
                   
                </div>
                 <div class="input-group">   
                    <span class="input-group-addon nk-ic-st-pro"></span>
                  
                    <font size='3'><center>Coupon code will be expire after 60Min.</center></font>
                   
                </div>
                <br>
                <div class="input-group">   
                    <span class="input-group-addon nk-ic-st-pro"></span>
                  
                    <font size='3'><center>Prints Available for Today : <?php echo $acopies; ?></center></font>
                    <br>
                     <input type="text" name='txtcopies' value='<?php echo $usercopies; ?>' class="form-control" placeholder="Enter No. of Copies" onkeypress="return numsonly();">
                  
                   
                </div>
                <br>
                      <div class="input-group">   
                    <span class="input-group-addon nk-ic-st-pro"></span>
                  

                      <button class="btn btn-danger notika-btn-danger waves-effect" name='btnemail' type='submit' <?php echo $status; ?>>&nbsp;&nbsp;Generate Coupon via Email&nbsp;&nbsp;</button>  
                    <br>
                   <br>
                   <button class="btn btn-warning notika-btn-warning waves-effect" name='btnmsg' type='submit' <?php echo $status; ?>>&nbsp;&nbsp;Generate Coupon via Text-Message&nbsp;&nbsp;</button>
                  
                </div>
               
            </div>
                </form>
         
        </div>
    </div>
        <!-- Forgot Password -->
    </div>
    <!-- Login Register area End-->
    <!-- jquery
        ============================================ -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
        ============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
        ============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
        ============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- owl.carousel JS
        ============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- scrollUp JS
        ============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- meanmenu JS
        ============================================ -->
    <script src="js/meanmenu/jquery.meanmenu.js"></script>
    <!-- counterup JS
        ============================================ -->
    <script src="js/counterup/jquery.counterup.min.js"></script>
    <script src="js/counterup/waypoints.min.js"></script>
    <script src="js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
        ============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- sparkline JS
        ============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/sparkline-active.js"></script>
    <!-- flot JS
        ============================================ -->
    <script src="js/flot/jquery.flot.js"></script>
    <script src="js/flot/jquery.flot.resize.js"></script>
    <script src="js/flot/flot-active.js"></script>
    <!-- knob JS
        ============================================ -->
    <script src="js/knob/jquery.knob.js"></script>
    <script src="js/knob/jquery.appear.js"></script>
    <script src="js/knob/knob-active.js"></script>
    <!--  Chat JS
        ============================================ -->
    <script src="js/chat/jquery.chat.js"></script>
    <!--  wave JS
        ============================================ -->
    <script src="js/wave/waves.min.js"></script>
    <script src="js/wave/wave-active.js"></script>
    <!-- icheck JS
        ============================================ -->
    <script src="js/icheck/icheck.min.js"></script>
    <script src="js/icheck/icheck-active.js"></script>
    <!--  todo JS
        ============================================ -->
    <script src="js/todo/jquery.todo.js"></script>
    <!-- Login JS
        ============================================ -->
    <script src="js/login/login-action.js"></script>
    <!-- plugins JS
        ============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
        ============================================ -->
    <script src="js/main.js"></script>
</body>

</html>
<?php
include_once("footer.php");
?>