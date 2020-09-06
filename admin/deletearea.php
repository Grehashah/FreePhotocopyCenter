<?php
include_once("header.php");
?>

<section class="wrapper site-min-height">

<?php

$aid="";
$str="";
$conn="";
$result="";

  $aid=$_GET["ID"];

if(isset($_POST["btndelete"]))
{
 

	$str="delete from area where AreaId='$aid'";
	$conn=mysqli_connect("localhost","root","","freephotocopycenter");
	$result=$conn->query($str);


echo("<script>location.href='displayarea.php'</script>");

}

if(isset($_POST["btncancel"]))
{
echo("<script>location.href='displayarea.php'</script>");
}


?>


<div class="col-lg-12">
            <h4><i class="fa fa-angle-right"></i> <b>Delete Area</b></h4>
            <div class="form-panel">
              <div class="form">
                <form class="cmxform form-horizontal style-form" id="signupForm" name="frm1" method="post" action="">


                 <div class="form-group ">
                    <label for="areaid" class="control-label col-lg-2">Area Id</label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="areaid" name="txtaid" type="text" value="<?php echo $aid ?>" disabled>
                    </div>
                  </div>


                  <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
  <input class="btn btn-theme" type="submit" name="btndelete" value="Delete">
                      <input class="btn btn-theme04" type="submit" name="btncancel" value="Cancel">                  </div>
                  </div>
                </form>
              </div>
             </div>
         </div>
     </section>

<?php
include_once("footer.php");
?>