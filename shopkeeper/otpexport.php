<?php

session_start();
$aid=$_SESSION["XeroxshopId"];
$str="select * from otp where XId ='$aid'";
$conn=mysqli_connect("localhost","root","","freephotocopycenter");
$result=$conn->query($str);
$str1="<table class='table table-striped table-advance table-hover' border='1'>";
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
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=OtpVerified.xls");
echo $str1;

?>