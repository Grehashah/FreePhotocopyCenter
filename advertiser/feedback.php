<?php
include_once("header.php");
?>

<?php

$messerr="";
$experr="";
$mess="";
$status1="";
$status2="";
$status3="";
$status4="";
$status5="";
$flag=0;
$exp="";


$str="select * from advertiser where AdvId='$aid'";
$conn=mysqli_connect("localhost","root","","freephotocopycenter");
$result=$conn->query($str);
$row=$result->fetch_assoc();


if(isset($_POST["btnsend"]))
{
$email=$row["Email"];
if(!empty($_POST['rdbexp']))
{
$exp=$_POST["rdbexp"];  
}
$mess=$_POST["comment"];

if($exp=="worst")
{
  $status1="checked";
}
else if($exp=="good")
{
  $status2="checked";
}
else if($exp=='poor')
{
  $status3="checked";
}
else if($exp=='better')
{
  $status4="checked";
}
else if($exp=='best')
{
  $status5="checked";
}
 
//validations

  if(!$exp)
  {
    $experr="Any One of them must be choosen.";
    $flag=1;
  }
  else if(empty($mess))
  {
    $messerr="Must be filled.";
    $flag=1;
  }
  else
  {  
    $str1="insert into feedback values ('','$email','$exp','$mess')";
    $conn1=mysqli_connect("localhost","root","","freephotocopycenter");
    $result1=$conn1->query($str1);

echo "<script> alert('Feedback has been Sent!'); </script>";

$mess="";
  }

}

?>


<section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i><b> Feedback Form</b></h3>
        <hr>
        <!-- BASIC FORM ELELEMNTS -->
       <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <div class="form">
                <form class="cmxform form-horizontal style-form" id="commentForm" method="post" action="" style='font-size: 15px;'>
                  
                  <div class="form-group ">
                    <label for="ccomment" class="control-label col-lg-2">Your Experience<font color='red'><sup>*</sup></font> : </label>
                    <div class="col-lg-10">
                    	<input type='radio' name='rdbexp' value='worst' <?php echo $status1 ?>> Worst &nbsp;&nbsp;
                    	<input type='radio' name='rdbexp' value='poor' <?php echo $status3 ?>> Poor &nbsp;&nbsp;
                    	<input type='radio' name='rdbexp' value='good' <?php echo $status2 ?>> Good &nbsp;&nbsp;
                    	<input type='radio' name='rdbexp' value='better' <?php echo $status4 ?>> Better &nbsp;&nbsp;
                    	<input type='radio' name='rdbexp' value='best' <?php echo $status5 ?>> Best &nbsp;&nbsp;
                    </div>
                    <font size='2' color="red"><?php echo $experr; ?></font>
                  </div>
                  <div class="form-group ">
                    <label for="ccomment" class="control-label col-lg-2">Your Comment<font color='red'><sup>*</sup></font> : </label>
                    <div class="col-lg-10">
                      <textarea class="form-control " id="ccomment" name="comment" placeholder="Please Enter Your Comment"><?php echo $mess; ?></textarea>

                    <font size='2' color="red"><?php echo $messerr; ?></font>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                      <button class="btn btn-primary" type="submit" name='btnsend'>Send Message</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->
        </div>
        </div>
        <!-- /row -->
       </section>

<?php
include_once("footer.php");
?>