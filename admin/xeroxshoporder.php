<?php
include_once("header.php");
?>

<?php
$xid=$_GET["ID"];
$str="select * from xeroxshop where XId='$xid'";
$conn=mysqli_connect("localhost","root","","freephotocopycenter");
$result=$conn->query($str);
$row=$result->fetch_assoc();
$xname=$row["XName"];

date_default_timezone_set('Asia/Kolkata');
$currdate=date("Y-m-d");
$currdate1=strtotime($currdate);
$month=date("m",$currdate1);

$str1="select * from stockorder where XId='$xid'";
$conn1=mysqli_connect("localhost","root","","freephotocopycenter");
$result1=$conn1->query($str1);
$cnt=mysqli_num_rows($result1);

$flag="";
if($cnt!=0)
{
while($row1=$result1->fetch_assoc())
{
  $doo=$row1["DOOrder"];
  $doo1=strtotime($doo);
  $month1=date("m",$doo1);

  if($month==$month1)
  {
    $flag="recentorders.php?ID=$xid";
  }
  else
  {
    $flag="recentorders.php#myModal";
  }
}
}
else
{
  $flag="recentorders.php#myModal"; 
}
?>

<section class="wrapper site-min-height">
	<form method="post">
  <div class="row mt">
          <div class="col-md-12">
              <font size="5">&nbsp;<i class="fa fa-angle-right"></i> <b>Manage Orders of <?php echo $xname; ?></b></font><hr>
                    
            <a data-toggle="modal" href='<?php echo $flag; ?>'>	
              <div class="col-md-4 col-sm-4 mb">
                <div class="darkblue-panel pn">
                  <div class="darkblue-header">
					<h5><font size='4'>Recent Orders </font></h5>   
                  </div>
                  <h1 class="mt"><img src="img/icons/recent.png" class="img-square" width="130">
        </h1>
              </div>
                <!--  /darkblue panel -->
              </div>
          </a>

             <a href="xorderdetails.php?ID=<?php echo $xid; ?>">
              <div class="col-md-4 col-sm-4 mb">
                <div class="darkblue-panel pn">
                  <div class="darkblue-header">
                   <h5><font size='4'>Orders Details </font></h5>
                  </div>  
                        <h1 class="mt"><img src="img/icons/od.png" class="img-square" width="130">
        </h1>
	              </div>
                <!--  /darkblue panel -->
              </div>
          </a>
        </div>
          <!-- /col-md-12 -->
        </div>


        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"> Notice </h4>
              </div>
              <div class="modal-body">
              		<p><?php echo $xname;?> haven't placed any order yet!</p>
              </div>
              <div class="modal-footer">
                <input data-dismiss="modal" class="btn btn-default" type="submit" name='btncancel' value='OK'> 
              </div>
            </div>
          </div>
        </div>
     </form>
</section>


<?php
include_once("footer.php");
?>