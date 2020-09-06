<?php
include_once("header.php");
?>

<?php 
$total=0;
$total1=0;
date_default_timezone_set('Asia/Kolkata');
$currentdate=date("Y-m-d");
$currentdate1=strtotime($currentdate);
$y=date("Y",$currentdate1);
$m=date("m",$currentdate1);
$m1=date("M",$currentdate1);

if(isset($_POST["btnsubmit"]))
{
  echo "<script>location.href='incomedetails.php'</script>";
}

$str2="select * from paymentxerox";
$conn2=mysqli_connect("localhost","root","","freephotocopycenter");
$result2=$conn2->query($str2);

while($row2=$result2->fetch_assoc())
{

  $dog1=$row2["DOG"];
  $dog=strtotime($row2["DOG"]);
  $year=date("Y",$dog);
  $month=date("m",$dog);

  if($year==$y && $month==$m)
  {  
    $total+=$row2["Amt"];
  }
}
?>

<section class="wrapper site-min-height">
<form name='frm' method='post'>
  <div class="row mt">
          <div class="col-md-12">
              <font size="5">&nbsp;<i class="fa fa-angle-right"></i> <b>Details of Payments</b> </font><hr>
              
                    <div class="col-lg-4 col-md-4 col-sm-4 mb">
                <div class="product-panel-2 pn">
                  <br>
                  <img src="img/product.jpg" width="200" alt="">
                  <br>
                  <br>
                  <font size='3' color="black"><b>Total Income of <?php echo $m1; ?> : <?php echo $total; ?></b></font>
                  <br>
                  <br>
                  <input class="btn btn-small btn-theme04" type='submit' name='btnsubmit' value="FULL REPORT">
                </div>
              </div>
          </div>
          <!-- /col-md-12 -->
        </div>
</form>
</section>

<?php
include_once("footer.php");
?>