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

$email="";
$sid=$_GET["SID"];
$str="select * from stockorder where SOrderId='$sid'";
$conn=mysqli_connect("localhost","root","","freephotocopycenter");
$result=$conn->query($str);
$row=$result->fetch_assoc();
$xid=$row["XId"];

$str1="select * from xeroxshop where XId='$xid'";
$conn1=mysqli_connect("localhost","root","","freephotocopycenter");
$result1=$conn1->query($str1);
$row1=$result1->fetch_assoc();
$xname=$row1["XName"];
$email=$row1['Email'];

$status="";
$status1="";
$status21="";
$status22="";
$status23="";
$status=$row["Status"];
$qtyreq=$row["QtyReq"];
      
      if($status=="accepted")
      {
      $status1="Order Accepted";
      $status21="disabled";
      $status22="enabled";
      $status23="enabled";
      }
      if($status=="rejected")
      {
      $status1="Order Rejected";
      $status21="enabled";
      $status22="disabled";
      $status23="disabled";
      }
      if($status=="provided")
      {
      $status1="Order Provided";
      $status21="disabled";
      $status22="disabled";
      $status23="disabled";  
      }



if(isset($_POST["btnaccept"]))
{
$str21="update stockorder set Status='accepted' where SOrderId='$sid'";
$conn21=mysqli_connect("localhost","root","","freephotocopycenter");
$result21=$conn21->query($str21);

echo "<script>location.href='recentorders.php?ID=$xid'</script>";

}

if(isset($_POST["btnreject"]))
{
$str21="update stockorder set Status='rejected' where SOrderId='$sid'";
$conn21=mysqli_connect("localhost","root","","freephotocopycenter");
$result21=$conn21->query($str21);

echo "<script>location.href='recentorders.php?ID=$xid'</script>";

}

if(isset($_POST["btnprovide"]))
{

date_default_timezone_set('Asia/Kolkata');
$currentdate=date("Y-m-d h-i-s");
$qoh="";

$str23="update stockorder set Status='provided',DOPro='$currentdate' where SOrderId='$sid'";
$conn23=mysqli_connect("localhost","root","","freephotocopycenter");
$result23=$conn23->query($str23);

$str2="select * from stock where XId='$xid'";
$conn2=mysqli_connect("localhost","root","","freephotocopycenter");
$result2=$conn2->query($str2);


$str02="select * from stock";
$conn02=mysqli_connect("localhost","root","","freephotocopycenter");
$result02=$conn02->query($str02);
while($row02=$result02->fetch_assoc())
{
  $cqty=$row02["CurrQty"];
}

while($row2=$result2->fetch_assoc())
{
  $qoh=$row2["QOH"];
  $aqh=$row2["AQH"];
}
$qty=$aqh+$qtyreq;
$aqh=$qty;
$cqty=$cqty-$qtyreq;

date_default_timezone_set('Asia/Kolkata');
$currentdate1=date("Y-m-d");

$str01="insert into stock values('','$currentdate1','$xid','$qty','$qoh','$aqh','$qtyreq','$cqty')";
$conn01=mysqli_connect("localhost","root","","freephotocopycenter");
$result01=$conn01->query($str01);


//mail sent to xeroxshop


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
            $mail->Subject = 'Stock Allotment';
            $mail->Body    = "<p>The stock of $qgiven pages provided to you.</p>";

            $mail->send();
           
            echo "<script> alert('Email has been sent to $xname about stock Allotment.'); </script>";
         } catch (Exception $e) { 
         }

echo "<script>location.href='recentorders.php?ID=$xid'</script>";

}
?>

<section class="wrapper site-min-height">
<form name="frm" method="post"> 
  <div class="row mt">
          <div class="col-md-12">
              <font size="5">&nbsp;<i class="fa fa-angle-right"></i> <b>Order Details Of <?php echo $xname; ?></b></font><hr>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" style='margin-top: -30px;'>
              <div class="custom-box">
                <div class="servicetitle">
                  <h4><?php echo $status1; ?></h4>
                  <hr>
                </div>
                <div class="icn-main-container">
                  <ul class="pricing">
                    <li>Quantity Requested</li>
                  <li><span class="icn-container"><?php echo $qtyreq; ?></span></li>
                </ul>
                </div>
                <p>Actions</p>                
                      <input class="btn btn-theme" type="submit" name="btnaccept" value="Accept" <?php echo $status21; ?>>
                      <input class="btn btn-danger" type="submit" name="btnreject" value="Reject" <?php echo $status22; ?>>
                      <input class="btn btn-theme" type="submit" name="btnprovide" value="Provide" <?php echo $status23; ?>></div>
              </div>
              <!-- end custombox -->
            </div>
          </div>
        </div>

        
</form>
</section>



<?php
include_once("footer.php");
?>