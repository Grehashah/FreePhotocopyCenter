<?php
include_once("header.php");
?>

<?php
$no=0;
$qty=0;
$aqh=0;
$qoh=0;
$xid=$_SESSION["XeroxshopId"];
$str="select * from xeroxshop where XId='$xid'";
$conn=mysqli_connect("localhost","root","","freephotocopycenter");
$result=$conn->query($str);
$row=$result->fetch_assoc();
$sname=$row["XName"];

$str1="select * from stock where XId='$xid'";
$conn1=mysqli_connect("localhost","root","","freephotocopycenter");
$result1=$conn1->query($str1);

while($row1=$result1->fetch_assoc())
{
  $no=$row1["StockId"];
}

$str2="select * from stock where StockId='$no'";
$conn2=mysqli_connect("localhost","root","","freephotocopycenter");
$result2=$conn2->query($str2);
$row2=$result2->fetch_assoc();

$qty=$row2["Qty"];
$aqh=$row2["AQH"];
$qoh=$row2["QOH"];

if($qty==0)
{
  $qty=0;
}
if($aqh==0)
{
  $aqh=0;
}
if($qoh==0)
{
  $qoh=0;
}


?>

<section class="wrapper site-min-height">
  <div class="row mt">
          <div class="col-md-12">
              <font size="5">&nbsp;<i class="fa fa-angle-right"></i> <b>Stock Details Of <?php echo $sname; ?></b></font><hr>
                    
                <div class="col-md-4 col-sm-4 mb">
                <div class="grey-panel pn donut-chart">
                  <div class="grey-header">
                    <h5><font size="4" color="black">Total Quantity</font></h5>
                  </div>
                  <img src='img/icons/total.png' height='120' width='120'>
                  <br><br><font size="5" color="black"><b><?php echo $qty ?></b></font>  
                  </div>
                <!-- /grey-panel -->
              </div>

               <div class="col-md-4 col-sm-4 mb">
                <div class="grey-panel pn donut-chart">
                  <div class="grey-header">
                    <h5><font size="4" color="black">Actual Quantity On Hand</font></h5>
                  </div>
                  <img src='img/icons/aq.png' height='120' width='120'>
                  <br><br><font size="5" color="black"><b><?php echo $aqh ?></b></font>  
                </div>
                <!-- /grey-panel -->
              </div>

                              <div class="col-md-4 col-sm-4 mb">
                <div class="grey-panel pn donut-chart">
                  <div class="grey-header">
                    <h5><font size="4" color="black">Minimum Quantity Required</font></h5>
                  </div>
                  <img src='img/icons/min.png' height='120' width='120'>
                  <br>                
                  <br><font size="5" color="black"><b><?php echo $qoh ?></b></font>  
                </div>
                <!-- /grey-panel -->
              </div>
            </div>
          </div>
</section>



<?php
include_once("footer.php");
?>