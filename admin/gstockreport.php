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

              <font size="5">&nbsp;<i class="fa fa-angle-right"></i> <b>Stock Report Of <?php echo $sname; ?></b></font><hr>

<?php
$xid1=$_GET["ID"];
$str1="select * from stock where XId='$xid1'";
$conn1=mysqli_connect("localhost","root","","freephotocopycenter");
$result1=$conn1->query($str1);
$str1="<table class='table table-striped table-advance table-hover'>";
$str1.="<thead>
            <tr>
                    <th> <font size='3'>Sr. No</font></th>
                    <th> <font size='3'>Date Of Given</font></th>
                    <th> <font size='3'>Given-Qty</font></th>
                    <th> <font size='3'>Minimum Qty Required</font></th>
                    <th> <font size='3'>Total-Qty</font></th>
                    <th> <font size='3'>Actual Qty On Hand</font></th>
            </tr>
        </thead>";
$no=1;

$cnt=mysqli_num_rows($result1);
if($cnt!=0)
{
while($row1=$result1->fetch_assoc())
{
  $str1.="<tr><td>".$no."</td><td>".$row1["DOS"]."</td><td>".$row1["QtyGiven"]."</td><td>".$row1["QOH"]."</td><td>".$row1["Qty"]."</td><td>".$row1["AQH"]."</td></tr>";
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