<?php
include_once("header.php");
?>

<?php
$dur="";
$path="";
$path1="";
$modal1="";
$modal="";
$flag=0;
$packagename="";
$str="select * from advertiseradvertise where AdvId='$aid'";
$conn=mysqli_connect("localhost","root","","freephotocopycenter");
$result=$conn->query($str);
$cnt=mysqli_num_rows($result);
if($cnt==0)
{
	$flag=1; 
	 $path="package.php#myModall";
     $modal="data-toggle='modal'";    
     $path3="packageselection.php";
     $modal3="";    
     $path1="package.php#myModall";
     $modal1="data-toggle='modal'";    
}
else
{
	$flag=0;

date_default_timezone_set('Asia/Kolkata');
$currentdate=date("Y-m-d");
$currentdate1=strtotime($currentdate);

while($row=$result->fetch_assoc())
{	
$advtypeid=$row["AdtypeId"];
$dos=$row["DOS"];
$doe=$row["DOE"];
}

  $doe1=strtotime($doe);

  if($doe1<$currentdate1)
  {
  	 $path="package.php#myModall";
     $modal="data-toggle='modal'";    
     $path3="packageselection.php";
     $modal3="";
  	 $path1="renewpkg.php";
     $modal1="";
     $packagename="";
     $dur="";
     $price="";
     $dos="";
     $doe="";
  }
  else
  { 
  	$path1="package.php#myModalll";
     $modal1="data-toggle='modal'";   
     $path="existingpkg.php";
     $modal="";   
     $path3="package.php#myModalll";
     $modal3="data-toggle='modal'";
$str1="select * from advertisetype where AdtypeId='$advtypeid'";
$conn1=mysqli_connect("localhost","root","","freephotocopycenter");
$result1=$conn1->query($str1);
$row1=$result1->fetch_assoc();

$packagename=$row1["AdtypeName"];
$price=$row1["Price"];
$dur=$row1["Duration"];
  }
}

?>

<section class="wrapper site-min-height">
  <div class="row mt">
          <div class="col-md-12">
              <font size="5">&nbsp;<i class="fa fa-angle-right"></i> <b>Choose Any One Option</b></font><a <?php echo $modal1; ?> class='btn btn-round btn-primary' style='margin-left: 66%;' href="<?php echo $path1; ?>">Renew Package</a><hr>
              
                  <a <?php echo $modal; ?> href='<?php echo $path; ?>'>
              <div class="col-md-4 col-sm-4 mb">
                <div class="darkblue-panel pn">
                  <div class="darkblue-header">
                    <h5><font size='4'>Details of Existing Package &nbsp;&nbsp;&nbsp;</font></h5>
                  </div>
                  <h1 class="mt"><img src="img/icons/sbn2.png" class="img-square" width="130">
        </h1>
         
                </div>
                <!--  /darkblue panel -->
              </div>
              </a>

    <a <?php echo $modal3; ?> href='<?php echo $path3; ?>'>
                <div class="col-md-4 col-sm-4 mb">
                <div class="darkblue-panel pn">
                  <div class="darkblue-header">
                    <h5><font size='4'>Choose New Package &nbsp;&nbsp;&nbsp;</font></h5>
                  </div>
                  <h1 class="mt"><img src="img/icons/sbn2.png" class="img-square" width="130">
        </h1>
         
                </div>
                <!--  /darkblue panel -->
              </div>
              </a>

    <a href="packagehistory.php">
              <div class="col-md-4 col-sm-4 mb">
                <div class="darkblue-panel pn">
                  <div class="darkblue-header">
                    <h5><font size='4'>Package History &nbsp;&nbsp;&nbsp;</font></h5>
                  </div>
                  <h1 class="mt"><img src="img/icons/sbn2.png" class="img-square" width="130">
        </h1>
         
                </div>
                <!--  /darkblue panel -->
              </div>
              </a>

                      <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModall" class="
        modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"> Notice</h4>
              </div>
              <div class="modal-body">
                <p>You don't have an Existing Package !</p></div>
              <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="submit" name='btnmodalcancel'>OK</button>
              </div>
            </div>
          </div>
        </div>


        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModalll" class="
        modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"> Notice</h4>
              </div>
              <div class="modal-body">
                <p>You Already Have an Existing Package! If you want to select a new package or renew existing package you must have to wait for it's completion.</p></div>
              <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="submit" name='btnmodalcancel'>OK</button>
              </div>
            </div>
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