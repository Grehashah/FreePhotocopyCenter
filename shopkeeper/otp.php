
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

$doo="";
$currentdate="";
$currentdate1="";
$doo1="";
$doo3="";
$otpid="";
$flag=0;
$aid=$_SESSION["XeroxshopId"];



date_default_timezone_set('Asia/Kolkata');
$currentdate=date("Y-m-d H:i:s");
$currentdate1=strtotime($currentdate);

if(isset($_POST["btnsubmit"]))
{
    $otpno1=$_POST["txtotpno"];

   if(empty($otpno1))
  {
    echo "<script>alert('Field Must be filled!');</script>";
  }
  else
  {
	$str1="select * from otp where XId='$aid'";
	$conn1=mysqli_connect("localhost","root","","freephotocopycenter");
	$result1=$conn1->query($str1);

	while($row1=$result1->fetch_assoc())
	{
		$otpid=$row1["OtpId"];
		$otpno=$row1["OtpNo"];
	
		if($otpno1==$otpno)
		{	
			//60 min
			
			$doo=$row1['DOO'];
			$doo1=strtotime($doo." + 60 minutes");
			//$doo3=date("Y-m-d h:i:s",$doo1);
			
			if($currentdate1<=$doo1)
			{
			$_SESSION["OtpId"] = $otpid;
      		$flag=1;
			echo "<script>location.href='otpdetails.php'</script>";
			}
			else
			{
				$flag=2;
			}
		}

	}	
	if($flag==2)
	{
	 echo "<script> alert('Entered Coupon code is Expired.'); </script>";	
	}
  if($flag==0)
  {
     echo "<script> alert('Entered Coupon code did not match'); </script>";
  }
}
}
?>

<section class="wrapper site-min-height">
  	<form method="post">
    <div class="row mt">
            <div class="col-md-12">
                  <font size="5">&nbsp;<i class="fa fa-angle-right"></i> <b>Choose Any One Option For Searching</b></font><hr>
                      
                      <a data-toggle="modal" href="xeroxshopstock.php#myModal">	
                <div class="col-md-4 col-sm-4 mb">
                  <div class="darkblue-panel pn">
                    <div class="darkblue-header">
  					<h5><font size='4'>Coupon Verification</font></h5>   
                    </div>
                    <h1 class="mt"><img src="img/icons/otp.png" class="img-square" width="130">
          </h1>
                </div>
                  <!--  /darkblue panel -->
                </div>
            </a>

               <a href="otplist.php">
                <div class="col-md-4 col-sm-4 mb">
                  <div class="darkblue-panel pn">
                    <div class="darkblue-header">
                     <h5><font size='4'>List of Coupon already Verified</font></h5>
                    </div>  
                          <h1 class="mt"><img src="img/icons/017-128.png" class="img-square" width="130">
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
                  <h4 class="modal-title">Type Coupon Code for Verification</h4>
                </div>
                <div class="modal-body">
                  <input type="text" value="" name="txtotpno" placeholder="Enter OTP " autocomplete="off" class="form-control placeholder-no-fix" onkeypress="return numsonly();">
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