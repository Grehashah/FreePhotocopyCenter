
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

$currentdate="";
$aid=$_SESSION["XeroxshopId"];

if(isset($_POST["btnsubmit"]))
{
  $qtyreq=$_POST["txtqty"];

  if(empty($qtyreq))
  {
    echo "<script>alert('Field Must be filled!');</script>";
  }
  else
  {
  $status="rejected";
  date_default_timezone_set('Asia/Kolkata');
  $currentdate=date("Y-m-d h-i-s");
  $dopro="0000-00-00 00:00:00";
	$str1="insert into stockorder values('','$aid','$currentdate','$dopro','$qtyreq','$status')";
	$conn1=mysqli_connect("localhost","root","","freephotocopycenter");
	$result1=$conn1->query($str1);

  echo "<script>location.href='confirm.php'</script>";
}
}
?>

<section class="wrapper site-min-height">
  	<form method="post">
    <div class="row mt">
            <div class="col-md-12">
                  <font size="5">&nbsp;<i class="fa fa-angle-right"></i> <b>Place Your Order</b></font><hr>
                      
                      <a data-toggle="modal" href="xeroxshopstock.php#myModal">	
                <div class="col-md-4 col-sm-4 mb">
                  <div class="darkblue-panel pn">
                    <div class="darkblue-header">
  					<h5><font size='4'>Click Here To Place Your Order</font></h5>   
                    </div>
                    <h1 class="mt"><img src="img/icons/images.png" class="img-square" width="130">
          </h1>
                </div>
                  <!--  /darkblue panel -->
                </div>
            </a>


          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Type your order</h4>
                </div>
                <div class="modal-body">
                  <input type="text" value="" name="txtqty" placeholder="Enter Quantity you want " autocomplete="off" class="form-control placeholder-no-fix" onkeypress="return numsonly();">
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