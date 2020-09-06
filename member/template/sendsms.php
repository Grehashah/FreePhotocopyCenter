<?php

	if(isset($_POST["btnsubmit"]))
	{	// Account details
	require('textlocal.class.php');

$textlocal = new Textlocal('grehashah56@gmail.com', 'Greha@123');

$numbers = array(918401529943);
$numbers1 = array(919426085182);

$sender = 'TXTLCL';
$otp=mt_rand(1000,9999);
$message = 'Your OTP = '.$otp;

try {
    $result = $textlocal->sendSms($numbers, $message, $sender);
    $result1 = $textlocal->sendSms($numbers1, $message, $sender);
    //print_r($result);
    if($result1==true && $result==true)
    {
    echo "message Sent";
	}

} 
	catch (Exception $e) 
	{
    die('Error: ' . $e->getMessage());
	}
}
?>


<html>
<head>
	<title></title>
</head>
<body>
	<form name="frm" method="post">
	<input type='submit' name='btnsubmit' value="Click here">
</form>
</body>
</html>