<?php
include_once("header.php");
?>

<?php
$xid=$_GET["ID"];
$str="select * from xeroxshop where XId='$xid'";
$conn=mysqli_connect("localhost","root","","freephotocopycenter");
$result=$conn->query($str);
$row=$result->fetch_assoc();
$sname=$row["XName"];
?>

<section class="wrapper site-min-height">
  <div class="row mt">
          <div class="col-md-12">
              <div class="content-panel">

              <font size="5">&nbsp;<i class="fa fa-angle-right"></i> <b>Orders Details Of <?php echo $sname; ?></b></font><hr>

<?php
$str1="select * from stockorder where XId='$xid'";
$conn1=mysqli_connect("localhost","root","","freephotocopycenter");
$result1=$conn1->query($str1);
$str1="<table class='table table-striped table-advance table-hover'>";
$str1.="<thead>
            <tr>
                    <th> <font size='3'>Sr. No</font></th>
                    <th> <font size='3'>Shop Name</font></th>
                    <th> <font size='3'>Requested Qty</font></th>
                    <th> <font size='3'>Date of Request</font></th>
                    <th> <font size='3'>Date of stock-Provided</font></th>
                    <th> <font size='3'>Status</font></th>
            </tr>
        </thead>";
$no=1;
$color="";
while($row1=$result1->fetch_assoc())
{
  if($row1["Status"]=="rejected")
  {
    $color="red";
    $status="<span class='label label-danger label-mini'>&nbsp;Rejected&nbsp;</span>";
  }
    if($row1["Status"]=="accepted")
      {
      $status="<span class='label label-info label-mini'>&nbsp;Accepted&nbsp;</span>";
      }
      if($row1["Status"]=="provided")
      {
      $status="<span class='label label-success label-mini'>&nbsp;Provided&nbsp;</span>";  
      }
  
  $str1.="<tr bgcolor='$color'><td>".$no."</td><td>".$sname."</td><td>".$row1["QtyReq"]."</td><td>".$row1["DOOrder"]."</td><td>".$row1["DOPro"]."</td><td>".$status."</td></tr>";
  $no++;
}

$str1.="</table>";
echo $str1;

?>
            </div>
          </div>
</section>

<?php
include_once("footer.php");
?>