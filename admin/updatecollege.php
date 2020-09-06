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

$cname="";
$cid="";
$str="";
$conn="";
$result="";
$str1="";
$conn1="";
$result1="";
$aerr="";
$anameerr="";


  $cid=$_GET["ID"];

  $str1="select CollegeName from College where CollegeID='$cid'";
  $conn1=mysqli_connect("localhost","root","","freephotocopycenter");
  $result1=$conn1->query($str1);
 
  $row=$result1->fetch_assoc();
  $cname=$row["CollegeName"];


if(isset($_POST["btnsubmit"]))
{
	$cname=$_POST["txtcname"];
    $cid=$_POST["txtcid"];

  if(empty($cid))
  {
    $aerr="Must be filled.";
  }
  else if(empty($cname))
  {
    $anameerr="Must be filled";
  }
  else
  {
	$str="update college set CollegeName='$cname' where CollegeId='$cid'";
	$conn=mysqli_connect("localhost","root","","freephotocopycenter");
	$result=$conn->query($str);


echo("<script>location.href='displaycollege.php'</script>");
}
}

if(isset($_POST["btncancel"]))
{
  echo("<script>location.href='displaycollege.php'</script>");

}

?>

<div class="col-lg-12">
            <h4><i class="fa fa-angle-right"></i> <b>Update College</b></h4>
            <div class="form-panel">
              <div class="form">
                <form class="cmxform form-horizontal style-form" id="signupForm" name="frm1" method="post" action="">


                 <div class="form-group ">
                    <label for="collegeid" class="control-label col-lg-2">College Id<font color='red'><sup>*</sup></font> :</label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="collegeid" name="txtcid" type="text" value="<?php echo $cid ?>" onkeypress="return numsonly();">    <font size='2' color="red"><?php echo $aerr; ?></font>
                 
                    </div>
                  </div>

                 <div class="form-group ">
                    <label for="collegename" class="control-label col-lg-2">College Name<font color='red'><sup>*</sup></font> :</label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="collegename" name="txtcname" type="text" value="<?php echo $cname ?>" onkeypress="return charactersonly();">    <font size='2' color="red"><?php echo $anameerr; ?></font>
                 
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
<input class="btn btn-theme" type="submit" name="btnsubmit" value="Save">
                      <input class="btn btn-theme04" type="submit" name="btncancel" value="Cancel">                    </div>
                  </div>
                </form>
              </div>
             </div>
         </div>
     </section>

<?php
include_once("footer.php");
?>