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

</script>

<section class="wrapper site-min-height">

<?php

$aname="";
$aid="";
$flag="";
$str="";
$conn="";
$result="";
$str1="";
$conn1="";
$result1="";
$anameerr="";

if(isset($_POST["btnsubmit"]))
{
  $aname=$_POST["txtaname"];
  if(empty($aname))
  {
    $anameerr="Must be filled";
  }
  else
  {
    $str="insert into area values('','$aname')";
    $conn=mysqli_connect("localhost","root","","freephotocopycenter");
    $result=$conn->query($str);

    echo("<script>location.href='displayarea.php'</script>");
  }
}

if(isset($_POST["btncancel"]))
{
echo("<script>location.href='displayarea.php'</script>");
}

?>

<div class="col-lg-12">
            <h4><i class="fa fa-angle-right"></i> <b>Insert Area</b></h4>
            <div class="form-panel">
              <div class="form">
                <form class="cmxform form-horizontal style-form" id="signupForm" name="frm1" method="post" action="">

                 <div class="form-group ">
                    <label for="areaname" class="control-label col-lg-2">Area Name<font color='red'><sup>*</sup></font> :</label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="areaname" onkeypress="return charactersonly();" name="txtaname" type="text" value="<?php echo $aname ?>" placeholder="Enter Area Name">
                      
                    <font size='2' color="red"><?php echo $anameerr; ?></font>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
<input class="btn btn-theme" type="submit" name="btnsubmit" value="Save">
                      <input class="btn btn-theme04" type="submit" name="btncancel" value="Cancel">                   </div>
                  </div>
                </form>
              </div>
             </div>
         </div>
     </section>

<?php
include_once("footer.php");
?>