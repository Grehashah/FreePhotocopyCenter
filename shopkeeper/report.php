<?php
include_once("header.php");
?>

<?php
$total=0;
$no=0;
$pages=0;
$xid=$_SESSION["XeroxshopId"];
$str="select * from xeroxshop where XId='$xid'";
$conn=mysqli_connect("localhost","root","","freephotocopycenter");
$result=$conn->query($str);
$row=$result->fetch_assoc();
$sname=$row["XName"];

$str1="select * from stock where XId='$xid'";
$conn1=mysqli_connect("localhost","root","","freephotocopycenter");
$result1=$conn1->query($str1);
	
while($row2=$result1->fetch_assoc())
{
  $qty=$row2["QtyGiven"];
  $total+=$qty; 
}

$str1="select * from otp where XId='$xid'";
$conn1=mysqli_connect("localhost","root","","freephotocopycenter");
$result1=$conn1->query($str1);

while($row1=$result1->fetch_assoc())
{
 
	if($row1["DOP"]!="0000-00-00 00:00:00")
	{
	$otpno=$row1["OtpNo"];
	  $no++;
	}
  }

$str1="select * from otp where XId='$xid'";
$conn1=mysqli_connect("localhost","root","","freephotocopycenter");
$result1=$conn1->query($str1);

while($row1=$result1->fetch_assoc())
{
	if($row1["DOP"]!="0000-00-00 00:00:00")
	{
		  $nop=$row1["NOP"];
		  $pages+=$nop;
	}
}
?>

<section class="wrapper site-min-height">
  <div class="row mt">
          <div class="col-md-12">
              <font size="5">&nbsp;<i class="fa fa-angle-right"></i> <b>Performance Of <?php echo $sname; ?></b></font><hr>
               
                             <div class="col-md-4 col-sm-4 mb">
                <div class="grey-panel pn donut-chart">
                  <div class="grey-header">
                    <h5><font size="4" color="black">Total No. of Pages Printed</font></h5>
                  </div>
                  <img src='img/icons/pages.png' height='120' width='120'>
                  <br>
                  <br><font size="5" color="black"><b><?php echo $pages; ?></b></font>  
                </div>
                <!-- /grey-panel -->
              </div>
            

                    
                <div class="col-md-4 col-sm-4 mb">
                <div class="grey-panel pn donut-chart">
                  <div class="grey-header">
                    <h5><font size="4" color="black">Total OTPs Varified</font></h5>
                  </div>
                  <img src='img/icons/otp.png' height='120' width='120'>
                  <br>
                  <br><font size="5" color="black"><b><?php echo $no ?></b></font> 
                </div>
                <!-- /grey-panel -->
              </div>


                  <div class="col-md-4 col-sm-4 mb">
                <div class="grey-panel pn donut-chart">
                  <div class="grey-header">
                    <h5><font size="4" color="black">Total Quantity Got</font></h5>
                  </div>
                    <img src='img/icons/total-128.png' height='120' width='120'>
                  <br><br>  
                <font size="5" color="black"><b><?php echo $total; ?></b></font> 
                </div>
                <!-- /grey-panel -->
              </div>

               </div>
          </div>
</section>



<?php
include_once("footer.php");
?>