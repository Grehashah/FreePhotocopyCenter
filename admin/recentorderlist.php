<?php
include_once("header.php");
?>


<?php
$sname="";
$sname=$_POST["txtsname"];
?>

<section class="wrapper site-min-height">
  <div class="row">
          <div class="col-md-12">
              <div class="content-panel">

              <font size="5">&nbsp;&nbsp;<i class="fa fa-angle-right"></i> <b>Recent Orders List</b></font><hr>
              <form name="frm1" method="post" align="right">
                <b><input type="text" name="txtsname" value="<?php echo $sname; ?>" size="30" placeholder='Enter ShopName'>&nbsp;</b>
                <input class="btn btn-success" type="submit" name="btnsearch" value="Search">&nbsp;&nbsp;
              </form>
              <br>
<?php

date_default_timezone_set('Asia/Kolkata');
$currdate=date("Y-m-d");
$currdate1=strtotime($currdate);
$month=date("m",$currdate1);
$year=date("Y",$currdate1);

$no=1;
$status="";
$id="";
$str1="";
if(isset($_POST["btnsearch"]))
{
$id=$_POST["txtsname"];

$str="select * from xeroxshop where XName like '$id%'";
$conn=mysqli_connect("localhost","root","","freephotocopycenter");
$result=$conn->query($str);
$row=$result->fetch_assoc();
$xid=$row["XId"];

$str1="select * from stockorder where XId='$xid'";
}
else
{
$str1="select * from stockorder";
}
$conn1=mysqli_connect("localhost","root","","freephotocopycenter");
$result1=$conn1->query($str1);
$str1="<table class='table table-striped table-advance table-hover'>";
$str1.="<thead>
            <tr> 
                    <th> <font size='3'>Sr. No</font></th>
                    <th> <font size='3'>Xeroxshop Name</font></th>
                    <th> <font size='3'>Username</font></th>
                    <th> <font size='3'>Date of Request</font></th>
                    <th> <font size='3'>Requested Qty</font></th>
                    <th> <font size='3'>Status</font></th>
                    <th> <font size='3'>Action</font></th>
            </tr>
        </thead>";

$cnt=mysqli_num_rows($result1);
if($cnt!=0)
{
while($row1=$result1->fetch_assoc())
{
  $doo=$row1["DOOrder"];
  $doo1=strtotime($doo);
  $month1=date("m",$doo1);
  $year1=date("Y",$doo1);

$xid=$row1["XId"];
$str="select * from xeroxshop where XId='$xid'";
$conn=mysqli_connect("localhost","root","","freephotocopycenter");
$result=$conn->query($str);
$row=$result->fetch_assoc();
$xname=$row["XName"];
$uname=$row["XUname"];

  if($month==$month1 && $year==$year1)
  {
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

      $str1.="<tr><td>".$no."</td><td>".$xname."</td><td>".$uname."</td><td>".$row1["DOOrder"]."</td><td>".$row1["QtyReq"]."</td><td>".$status."</td><td> 
                      <a href='rodetails.php?SID=".$row1["SOrderId"]."'class='btn btn-round btn-primary'>View</a></tr>";
      $no++;
  }
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