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

$no=1;
$status="";
$id="";
$str1="";
$qoh=0;
$aqh=0;

if(isset($_POST["btnsearch"]))
{
$id=$_POST["txtsname"];
$str1="select * from xeroxshop where XName like '$id%'";
}
else
{
$str1="select * from xeroxshop";
}
$conn1=mysqli_connect("localhost","root","","freephotocopycenter");
$result1=$conn1->query($str1);
$str1="<table class='table table-striped table-advance table-hover'>";
$str1.="<thead>
            <tr> 
                    <th> <font size='3'>Sr. No</font></th>
                    <th> <font size='3'>Xeroxshop Name</font></th>
                    <th> <font size='3'>Username</font></th>
                    <th> <font size='3'>Contact No</font></th>
                    <th> <font size='3'>Min-Qty Required</font></th>
                    <th> <font size='3'>Actual Qty on Hand</font></th>
                    <th> <font size='3'>Action</font></th>
            </tr>
        </thead>";

while($row1=$result1->fetch_assoc())
{
$xid=$row1["XId"];
$xname=$row1["XName"];
$uname=$row1["XUname"];
$cno=$row1["ContactNo"];

    $s="select * from stock where XId='$xid'";
    $c=mysqli_connect("localhost","root","","freephotocopycenter");
    $r=$c->query($s);
    $cnt=mysqli_num_rows($r);
    if($cnt==0)
    {
      $aqh=0;
      $qoh=0;
    }
    else
    {
    while($ro=$r->fetch_assoc())
    {
      $qoh=$ro["QOH"];
      $aqh=$ro["AQH"];
    }
    }

if($qoh!=0 && $aqh!=0)
{
if($qoh>=$aqh)
{
  $status="btn btn-round btn-danger";
}
else
{
 $status="btn btn-round btn-success";
}
}
else
{
  $status="btn btn-round btn-success";
}

      $str1.="<tr><td>".$no."</td><td>".$xname."</td><td>".$uname."</td><td>".$cno."</td><td>".$qoh."</td><td>".$aqh."</td><td><a href='xeroxshopstock.php?ID=".$row1["XId"]."'class='$status'>Provide Stock</a></tr>";
      $no++;
      $status='';
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