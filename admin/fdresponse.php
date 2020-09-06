<?php
include_once("header.php");
?>


<?php
        // Import PHPMailer classes into the global namespace
        // These must be at the top of your script, not inside a function
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

        //Load Composer's autoloader
        require 'vendor/autoload.php';

$email=$_GET['ID'];
$uname="";
$message="";
$subject="";
$msgerr="";
$suberr="";
$flag=0;

$str2="select * from xeroxshop where Email='$email'";
$conn2=mysqli_connect("localhost","root","","freephotocopycenter");
$result2=$conn2->query($str2);
$row2=$result2->fetch_assoc();
$cnt2=mysqli_num_rows($result2);

$str3="select * from advertiser where Email='$email'";
$conn3=mysqli_connect("localhost","root","","freephotocopycenter");
$result3=$conn3->query($str3);
$row3=$result3->fetch_assoc();
$cnt3=mysqli_num_rows($result3);

$str4="select * from member where Email='$email'";
$conn4=mysqli_connect("localhost","root","","freephotocopycenter");
$result4=$conn4->query($str4);
$row4=$result4->fetch_assoc();
$cnt4=mysqli_num_rows($result4);

if($cnt2!=0)
{
  $uname=$row2["XUname"];  
}
else if($cnt3!=0)
{
  $uname=$row3["AUname"];
}
else if($cnt4!=0)
{
  $uname=$row4["MUname"];
}

if(isset($_POST['btnsend']))
{
      $message=$_POST['txtmsg'];
      $subject=$_POST['txtsubject'];
  

     
      if(empty($_POST["txtsubject"]))
      {
        $suberr="Must be filled";
      } 
      else if(empty($_POST["txtmsg"]))
      {
        $msgerr="Must be filled";
      }
      else
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
            $mail->Subject = $subject;
            $mail->Body    = $message;

            $mail->send();
            echo "<script> alert('Message has been sent.'); </script>";
            $message="";
            $subject="";
         } 
         catch (Exception $e) 
          {        
            echo "<script> alert('Something Went Wrong !'); </script>";
          }
}
}
?>


<section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i><b> Give Response to <?php echo $uname; ?></b></h3>
        <hr>
        <!-- BASIC FORM ELELEMNTS -->
       <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <div class="form">
                <form class="cmxform form-horizontal style-form" id="commentForm" method="post" action="" style='font-size: 15px;'><br>
                  
                  <div class="form-group ">
                    <div class="col-lg-5" style='margin-left: 30%;'>
                                       <input type="text" name='txtemail' class="form-control" value='<?php echo $email; ?>' disabled>
                      </div>
                  </div>
                  <div class="form-group ">
                    <div class="col-lg-5" style='margin-left: 30%;'>
                                      <input type="text" class="form-control" placeholder="Enter Subject" name='txtsubject' value='<?php echo $subject; ?>'>
                                      <font size='2' color="red"><?php echo $suberr; ?></font>
                   </div>
                  </div>
                  <div class="form-group ">
                    <div class="col-lg-5" style='margin-left: 30%;'>
                      <textarea class="form-control" name="txtmsg" placeholder="Enter Message" rows="5"><?php echo $message; ?></textarea>

                     <font size='2' color="red"><?php echo $msgerr; ?></font>
                     </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                     <button type="submit" class="btn btn-primary btn-lg" name='btnsend' style='margin-left: 34%;'>Send Message</button>
                  </div>
                  </div>
                </form>
              </div>
            </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->
        </div>
        </div>
        <!-- /row -->
       </section>

<?php
include_once("footer.php");
?>