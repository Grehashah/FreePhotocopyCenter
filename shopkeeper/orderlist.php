<?php
include_once("header.php");
?>


<section class="wrapper site-min-height">
  <div class="row mt">
          <div class="col-md-12">
              <div class="content-panel">
              <font size="5">&nbsp;&nbsp;<i class="fa fa-angle-right"></i> <b>List of Orders</b></font><hr>
            
<?php

$no=1;
$status="";
$id="";
$str1="";

$str1="select * from stockorder where XId='$aid'";
$conn1=mysqli_connect("localhost","root","","freephotocopycenter");
$result1=$conn1->query($str1);
$str1="<table class='table table-striped table-advance table-hover'>";
$str1.="<thead>
            <tr> 
                    <th> <font size='3'>Sr. No</font></th>
                    <th> <font size='3'>Xeroxshop Name</font></th>
                    <th> <font size='3'>Username</font></th>
                    <th> <font size='3'>Date of Request</font></th>
                    <th> <font size='3'>Date of Provided</font></th>
                    <th> <font size='3'>Requested Qty</font></th>
                    <th> <font size='3'>Status</font></th>
            </tr>
        </thead>";

$cnt=mysqli_num_rows($result1);
if($cnt!=0)
{
while($row1=$result1->fetch_assoc())
{
  $doo=$row1["DOOrder"];
   $dop=$row1["DOPro"];

$str="select * from xeroxshop where XId='$aid'";
$conn=mysqli_connect("localhost","root","","freephotocopycenter");
$result=$conn->query($str);
$row=$result->fetch_assoc();
$xname=$row["XName"];
$uname=$row["XUname"];

      if($row1["Status"]=="accepted")
      {
      $status="<span class='label label-info label-mini'>&nbsp;Accepted&nbsp;</span>";
      }
      if($row1["Status"]=="rejected")
      {
      $status="<span class='label label-danger label-mini'>&nbsp;Rejected&nbsp;</span>";
      }
      if($row1["Status"]=="provided")
      {
      $status="<span class='label label-success label-mini'>&nbsp;Provided&nbsp;</span>";  
      }

      $str1.="<tr><td>".$no."</td><td>".$xname."</td><td>".$uname."</td><td>".$row1["DOOrder"]."</td><td>".$dop."</td><td>".$row1["QtyReq"]."</td><td>".$status."</td></tr>";
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
          </div>
</section>


<?php
include_once("footer.php");
?>