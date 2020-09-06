<?php
include_once("header.php");
?>

<section class="wrapper site-min-height">
<form name='frm' method='post' action='pkgexport.php'>
  
	<div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <font size="5">&nbsp;<i class="fa fa-angle-right"></i> <b>Package History</b> </font><p class="nav pull-right top-menu"><button class='btn btn-round btn-success' name='btnexport' type='submit'>Export to Excel&nbsp;&nbsp;<img src='img/icons/excel.png' height='25' width='25'></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p><hr>


<?php
$no="";
$str="select * from advertiseradvertise where AdvId='$aid'";
$conn=mysqli_connect("localhost","root","","freephotocopycenter");
$result=$conn->query($str);
$str1="<table class='table table-striped table-advance table-hover'>";
$str1.="<thead>
            <tr>
                        <th> <font size='3'>Sr. No</font></th>
                        <th> <font size='3'>Package Name</font></th>
                        <th> <font size='3'>Price</font></th>
                        <th> <font size='3'>Duration</font></th>
                        <th> <font size='3'>Date of Start</font></th>
                        <th> <font size='3'>Date of End</font></th>
            </tr>
        </thead>";
$no=1;
$cnt=mysqli_num_rows($result);
if($cnt!=0)
{
while($row=$result->fetch_assoc())
{
$advtypeid=$row["AdtypeId"];
$dos=$row["DOS"];
$doe=$row["DOE"];

$str2="select * from advertisetype where AdtypeId='$advtypeid'";
$conn2=mysqli_connect("localhost","root","","freephotocopycenter");
$result2=$conn2->query($str2);

$row2=$result2->fetch_assoc();
$price=$row2["Price"];
$dur=$row2["Duration"];
$name=$row2["AdtypeName"];

  $str1.="<tr><td>".$no."</td><td>".$name."</td><td>"."₹ ".$price."</td><td>".$dur." days"."</td><td>".$row["DOS"]."</td><td>".$row["DOE"]."</td></tr>";
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