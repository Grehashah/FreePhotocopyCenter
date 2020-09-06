<?php
include_once("header.php");
?>

<section class="wrapper site-min-height">

<?php

$cid="";
$str="";
$conn="";
$result="";

$cid=$_GET["ID"];


if(isset($_POST["btndelete"]))
{


	$str="delete from college where CollegeId='$cid'";
	$conn=mysqli_connect("localhost","root","","freephotocopycenter");
	$result=$conn->query($str);

echo("<script>location.href='displaycollege.php'</script>");
}

if(isset($_POST["btncancel"]))
{
echo("<script>location.href='displaycollege.php'</script>");
}

?>

<div class="col-lg-12">
            <h4><i class="fa fa-angle-right"></i> <b>Delete College</b></h4>
            <div class="form-panel">
              <div class="form">
                <form class="cmxform form-horizontal style-form" id="signupForm" name="frm1" method="post" action="">


                 <div class="form-group ">
                    <label for="collegeid" class="control-label col-lg-2">College Id</label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="collegeid" name="txtcid" type="text" value="<?php echo $cid ?>" disabled>
                    </div>
                  </div>


                  <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                      <input class="btn btn-theme" type="submit" name="btndelete" value="Delete">
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