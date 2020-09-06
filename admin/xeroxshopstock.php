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
$xid=$_GET["ID"];
$str="select * from xeroxshop where XId='$xid'";
$conn=mysqli_connect("localhost","root","","freephotocopycenter");
$result=$conn->query($str);
$row=$result->fetch_assoc();
$xname=$row["XName"];
$email=$row['Email'];
$qgiven="";
$currqty="";

if(isset($_POST["btnsubmit"]))
{
date_default_timezone_set('Asia/Kolkata');
$dos=date("Y-m-d");
$qgiven=$_POST["txtqgiven"];
$qoh="";

$str2="select * from stock where XId='$xid'";
$conn2=mysqli_connect("localhost","root","","freephotocopycenter");
$result2=$conn2->query($str2);


    $strr="select * from stock";
    $connn=mysqli_connect("localhost","root","","freephotocopycenter");
    $resultt=$connn->query($strr);
    $roww=$resultt->fetch_assoc();
    $currqty=$roww["CurrQty"];

while($row2=$result2->fetch_assoc())
{
  $qoh=$row2["QOH"];
  $aqh=$row2["AQH"];
}
$qty=$aqh+$qgiven;
$currqty=$currqty-$qgiven;
$aqh=$qty;


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



$str1="insert into stock values('','$dos','$xid','$qty','$qoh','$aqh','$qgiven','$currqty')";
$conn1=mysqli_connect("localhost","root","","freephotocopycenter");
$result1=$conn1->query($str1);

echo "<script>location.href='gstockreport.php?ID=$xid'</script>";
}

?>

<section class="wrapper site-min-height">
	<form method="post">
  <div class="row mt">
          <div class="col-md-12">
              <font size="5">&nbsp;<i class="fa fa-angle-right"></i> <b>Manage Stock of <?php echo $xname; ?></b></font><hr>
                    
                    <a data-toggle="modal" href="xeroxshopstock.php#myModal">	
              <div class="col-md-4 col-sm-4 mb">
                <div class="darkblue-panel pn">
                  <div class="darkblue-header">
					<h5><font size='4'>Assign Stock </font></h5>   
                  </div>
                  <h1 class="mt"><img src="img/icons/s4.png" class="img-square" width="130">
        </h1>
              </div>
                <!--  /darkblue panel -->
              </div>
          </a>

             <a href="viewstock.php?ID=<?php echo $xid ?>">
              <div class="col-md-4 col-sm-4 mb">
                <div class="darkblue-panel pn">
                  <div class="darkblue-header">
                   <h5><font size='4'>View Stock </font></h5>
                  </div>  
                        <h1 class="mt"><img src="img/icons/s3.png" class="img-square" width="120">
        </h1>
	              </div>
                <!--  /darkblue panel -->
              </div>
          </a>
        </div>
          <!-- /col-md-12 -->
        </div>


        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Assign Stock To <?php echo $xname; ?></h4>
              </div>
              <div class="modal-body">
                <input type="text" value="<?php echo $qgiven; ?>" name="txtqgiven" placeholder="Enter Quantity" autocomplete="off" class="form-control placeholder-no-fix">
              </div>
              <div class="modal-footer">
                <input data-dismiss="modal" class="btn btn-default" type="submit" name='btncancel' value='Cancel'>
                <input class="btn btn-theme" type="submit" name='btnsubmit' value='Submit'>              
              </div>
            </div>
          </div>
        </div>
     </form>
</section>


<?php
include_once("footer.php");
?>