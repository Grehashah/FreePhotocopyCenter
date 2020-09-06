<?php
include_once("header.php");
?>

<section class="wrapper site-min-height">
	<div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <font size="5">&nbsp;<i class="fa fa-angle-right"></i> <b>Packages of Advertiser</b> </font><hr>

<?php
$str="select * from advertisetype";
$conn=mysqli_connect("localhost","root","","freephotocopycenter");
$result=$conn->query($str);
$str1="<table class='table table-striped table-advance table-hover'>";
$str1.="<thead>
            <tr>
                    <th> <font size='3'>Sr. No</font></th>
            	 	    <th> <font size='3'>Package Name</font></th>
                   	<th> <font size='3'>Price</font></th>
                    <th> <font size='3'>Duration</font></th>
                     <th> <font size='3'>Action</font></th>
            </tr>
        </thead>";
$no=1;
$cnt=mysqli_num_rows($result);
if($cnt!=0)
{
while($row=$result->fetch_assoc())
{
  $str1.="<tr><td>".$no."</td><td>".$row["AdtypeName"]."</td><td>"."₹ ".$row["Price"]."</td><td>".$row["Duration"]."days"."<td><a href='updateadvtype.php?ID=".$row["AdtypeId"]."'class='btn btn-round btn-primary'>Update</a></td></tr>";
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
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
        </div>
</section>


<?php
include_once("footer.php");
?>