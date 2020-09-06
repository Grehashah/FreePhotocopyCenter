<?php
       // Import PHPMailer classes into the global namespace
        // These must be at the top of your script, not inside a function
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

        //Load Composer's autoloader
        require 'vendor/autoload.php';


header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

session_start();
$amt="";
$aid="";
$adtype="";
$dos="";
$doe="";
$tid="";
$dur1="";

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$adtype=$_SESSION['adtype'];
$aid=$_SESSION['aid'];

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	if ($_POST["STATUS"] == "TXN_SUCCESS")
	 {


        $str2="select * from advertisetype where AdtypeName='$adtype'";
        $conn2=mysqli_connect("localhost","root","","freephotocopycenter");
        $result2=$conn2->query($str2);
        $row2=$result2->fetch_assoc();
        $dur1=$row2["Duration"];
        $tid=$row2["AdtypeId"];
        $amt=$row2['Price'];

        $dos=date("Y-m-d", strtotime('+1 days'));
        $doe = date('Y-m-d', strtotime('+'.$dur1.'days'));

	$str2="insert into advertiseradvertise values('','$tid','$aid','$dos','$doe')";
        $conn2=mysqli_connect("localhost","root","","freephotocopycenter");
        $result2=$conn2->query($str2);
        



date_default_timezone_set('Asia/Kolkata');
$currentdate=date("Y-m-d");
$currentdate1=date("Y-m-d h:i:sa");

	 	   $str2="insert into paymentincome values('','$aid','$currentdate','$amt')";
        $conn2=mysqli_connect("localhost","root","","freephotocopycenter");
        $result2=$conn2->query($str2);
       
        //Email sent to Admin 

        $str3="select * from advertiser where AdvId='$aid'";
        $conn3=mysqli_connect("localhost","root","","freephotocopycenter");
        $result3=$conn3->query($str3);
     	$row3=$result3->fetch_assoc();
     	$name=$row3['AUname'];
     	$email=$row3['Email'];


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
            $mail->addAddress("freephotocopycenter@gmail.com");     // Add a recipient
            
            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Payment Received';
            $mail->Body    = "<p>$name Had selected a new <b>silver</b> Advertising Package on <b>$currentdate1</b> and payment of ₹ <b>$amt</b> has been Received.</p>";

            $mail->send();
           
         } catch (Exception $e) {
           }         

        echo "<script>location.href='http://localhost/freephotocopycenter/advertiser/confirm.php'</script>";

		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
	}
	else {
	
    
        echo "<script>location.href='http://localhost/freephotocopycenter/advertiser/threat.php'</script>";}

}
else {
   
        echo "<script>location.href='http://localhost/freephotocopycenter/advertiser/threat.php'</script>";	}

?>