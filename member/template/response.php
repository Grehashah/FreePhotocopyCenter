<?php 
session_start();
	date_default_timezone_set('Asia/Kolkata');
														
$from_time1=date("Y-m-d H:i:s");
$to_time1=$_SESSION['endtime'];


$timefirst=strtotime($from_time1);
$timesecond=strtotime($to_time1);

$diffrenceinseconds=$timesecond-$timefirst;

if($diffrenceinseconds>=0)
{
echo "<h3>".gmdate("H:i:s",$diffrenceinseconds)."</h3>";
}
else
{
	echo "<h2>Your Coupon is Expired.</h2>";
}
?>