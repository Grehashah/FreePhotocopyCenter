<?php
include_once("header.php");
?>

<section class="wrapper site-min-height">
  <form name='frm' method='post' action='otpexport.php'>
 
  <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <font size="5">&nbsp;<i class="fa fa-angle-right"></i> <b>List of Coupon already verified</b> </font><p class="nav pull-right top-menu"><button class='btn btn-round btn-success' name='btnexport' type='submit'>Export to Excel&nbsp;&nbsp;<img src='img/icons/excel.png' height='25' width='25'></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p><hr>
<?php


$aid=$_SESSION["XeroxshopId"];
$str="select * from otp where XId ='$aid'";
$conn=mysqli_connect("localhost","root","","freephotocopycenter");
$result=$conn->query($str);
$str1="<table class='table table-striped table-advance table-hover'>";
$str1.="<thead>
            <tr>
                    <th> <font size='3'>Sr. No</font></th>
                    <th> <font size='3'>Coupon Code</font></th>
                    <th> <font size='3'>Member Name</font></th>
                    <th> <font size='3'>Date Of Order</font></th>
                    <th> <font size='3'>Date Of Print</font></th>
                    <th> <font size='3'>No. Of Pages</font></th>
            </tr>
        </thead>";
$no=1;
$cnt=mysqli_num_rows($result);
if($cnt!=0)
{
while($row=$result->fetch_assoc())
{
  $mid=$row["MId"];
$str3="select * from member where MId='$mid'";
$conn3=mysqli_connect("localhost","root","","freephotocopycenter");
$result3=$conn3->query($str3);
$row3=$result3->fetch_assoc();
$uname=$row3["MUname"];

  $str1.="<tr><td>".$no."</td><td>".$row["OtpNo"]."</td><td>".$uname."</td><td>".$row["DOO"]."</td><td>".$row["DOP"]."</td><td>".$row["NOP"]."</td></tr>";
  $no++;
}

$str1.="</table>";
}
else
{
  $str1="<h2 align='center'>No Record Found</h2>";  
}
echo $str1;
?>
      </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
        </div>
      </form>
</section>


<?php
include_once("footer.php");
?>