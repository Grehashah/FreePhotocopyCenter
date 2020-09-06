<?php
include_once("header.php");
?>

<section class="wrapper site-min-height">
	<div class="row mt">
          <div class="col-md-12">
              <div class="content-panel">

              <font size="5">&nbsp;<i class="fa fa-angle-right"></i> <b>Records of Stream</b> </font><p class="nav pull-right top-menu"><a class='btn btn-round btn-success' href="insertstream.php">Add Stream</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p><hr>       
<?php
$no="";
$str="select * from Stream";
$conn=mysqli_connect("localhost","root","","freephotocopycenter");
$result=$conn->query($str);
$str1="<table class='table table-striped table-advance table-hover'>";
$str1.="<thead>
            <tr>
                        <th> <font size='3'>Sr. No</font></th>
                   <th><font size='3'><i class= 'fa fa-edit'></i> Stream Name</font></th>
                   <th><font size='3'><i class='fa fa-question-circle'></i> Action List</font></th>
            </tr>
        </thead>";
$no=1;

while($row=$result->fetch_assoc())
{
  $str1.="<tr><td>".$no."</td><td>".$row["StreamName"]."</td><td> 
                      <a href='updatestream.php?ID=".$row["StreamId"]."'class='btn btn-primary'><i class='fa fa-pencil'></i></a>
                      <a href='deletestream.php?ID=".$row["StreamId"]."'class='btn btn-danger'><i class='fa fa-trash-o'></i></a>
                    </td></tr>";
                    $no++;
}

$str1.="</table>";
echo $str1;

?>
			         </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
        </div>
</section>

<?php
include_once("footer.php");
?>