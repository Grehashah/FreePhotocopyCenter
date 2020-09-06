<?php
include_once("header.php");
?>

<script>

function charactersonly()
{
  if((event.keyCode>=65 && event.keyCode<=90) || (event.keyCode>=97 && event.keyCode<122))
  {
    return true;
  }
  else
  {
    return false;
  }
}

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

<section class="wrapper site-min-height">

<?php

$sname="";
$sid="";
$str="";
$conn="";
$result="";
$str1="";
$conn1="";
$result1="";
$aerr="";
$anameerr="";


  $sid=$_GET["ID"];

  $str1="select StreamName from stream where StreamID='$sid'";
  $conn1=mysqli_connect("localhost","root","","freephotocopycenter");
  $result1=$conn1->query($str1);
 
  $row=$result1->fetch_assoc();
  $sname=$row["StreamName"];


if(isset($_POST["btnsubmit"]))
{
	$sname=$_POST["txtsname"];
    $sid=$_POST["txtsid"];

  if(empty($sid))
  {
    $aerr="Must be filled.";
  }
  else if(empty($sname))
  {
    $anameerr="Must be filled";
  }
  else
  {
	$str="update stream set StreamName='$sname' where StreamId='$sid'";
	$conn=mysqli_connect("localhost","root","","freephotocopycenter");
	$result=$conn->query($str);


echo("<script>location.href='displaystream.php'</script>");
}
}

if(isset($_POST["btncancel"]))
{
echo("<script>location.href='displaystream.php'</script>");
}

?>

<div class="col-lg-12">
            <h4><i class="fa fa-angle-right"></i> <b>Update Stream</b></h4>
            <div class="form-panel">
              <div class="form">
                <form class="cmxform form-horizontal style-form" id="signupForm" name="frm1" method="post" action="">


                 <div class="form-group ">
                    <label for="streamid" class="control-label col-lg-2">Stream Id<font color='red'><sup>*</sup></font> :</label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="streamid" name="txtsid" type="text" value="<?php echo $sid ?>"  onkeypress="return numsonly();">    <font size='2' color="red"><?php echo $aerr; ?></font>
                 
                    </div>
                  </div>

                 <div class="form-group ">
                    <label for="streamname" class="control-label col-lg-2">Stream Name<font color='red'><sup>*</sup></font> :</label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="streamname" name="txtsname" type="text" value="<?php echo $sname ?>"  onkeypress="return charactersonly();">    <font size='2' color="red"><?php echo $anameerr; ?></font>
                 
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                      <input class="btn btn-theme" type="submit" name="btnsubmit" value="Save">
                      <input class="btn btn-theme04" type="submit" name="btncancel" value="Cancel"></div>
                  </div>
                </form>
              </div>
             </div>
         </div>
     </section>

<?php
include_once("footer.php");
?>