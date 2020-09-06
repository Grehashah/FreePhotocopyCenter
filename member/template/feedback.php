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
  
  if($flag==0)
  {  
    $str1="insert into feedback values ('','$email','$exp','$mess')";
    $conn1=mysqli_connect("localhost","root","","freephotocopycenter");
    $result1=$conn1->query($str1);

echo "<script> alert('Feedback has been Sent!'); </script>";

$mess="";
  }

}

?>

<div class="breadcomb-area">

      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="breadcomb-list">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="breadcomb-wp">
                  <div class="breadcomb-icon">
                    <i class="notika-icon notika-edit"></i>
                  </div>
                  <div class="breadcomb-ctn">
                    
                    <h1>Feedback Form</h1>
                    <p><span class="bread-ntd"></span></p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                <div class="breadcomb-report">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
   
  </div>


<div class="row">
  <form name="frm1" method="POST">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-example-wrap mg-t-29" style='font-size: 15px;'>
                        <div class="cmp-tb-hd cmp-int-hd">
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm"><b><font size='3'>Your Experience<font color='red'><sup>*</sup></font> :</b></font></label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
  <input type='radio' name='rdbexp' value='worst' <?php echo $status1 ?>> Worst &nbsp;&nbsp;
                      <input type='radio' name='rdbexp' value='poor' <?php echo $status3 ?>> Poor &nbsp;&nbsp;
                      <input type='radio' name='rdbexp' value='good' <?php echo $status2 ?>> Good &nbsp;&nbsp;
                      <input type='radio' name='rdbexp' value='better' <?php echo $status4 ?>> Better &nbsp;&nbsp;
                      <input type='radio' name='rdbexp' value='best' <?php echo $status5 ?>> Best &nbsp;&nbsp;                  </div>
                             <font size='2' color="red"><?php echo $experr; ?></font>
             
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-example-int form-horizental mg-t-15" style='font-size: 15px;'>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm"><b><font size='3'>Your Comment<font color='red'><sup>*</sup></font> :</b></font></label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            
                      <textarea class="form-control " id="ccomment" name="comment" placeholder="Please Enter Your Comment"><?php echo $mess; ?></textarea>

                                     </div>
                                      <font size='2' color="red"><?php echo $messerr; ?></font>
                  
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-example-int mg-t-15">
                            <div class="row">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                </div>
                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                    <button class="btn btn-primary notika-btn-success waves-effect" name="btnsend">Send Message</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      </div>
    </div>
  </div>
</form>
</div>

      
<br>
<br>
<br>
<br>
<br>
<br>

<?php
include_once("footer.php");
?>