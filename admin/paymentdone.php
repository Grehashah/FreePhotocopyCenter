<?php
$id="";



date_default_timezone_set('Asia/Kolkata');
$currentdate=date("Y-m-d");
$id=$_GET['id'];
$aid=$_GET['aid'];
$amt=$_GET['amt'];

   $str2="insert into paymentxerox values('','$id','$aid','$currentdate','$amt')";
    $conn2=mysqli_connect("localhost","root","","freephotocopycenter");
    $result2=$conn2->query($str2);

    header("location:xeroxpayment.php");

?>