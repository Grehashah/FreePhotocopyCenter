<?php
include_once("header.php");
?>


<?php
        
$message="";
$email="";
$subject="";
$currqty1=0;
$total=0;
$total1=0;
$noadv=0;
$noxs=0;
$nomem=0;
$num=0;


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
     $packagename="";
     $dur="";
     $price="";
     $dos="";
     $doe="";
  }
  else
  {    
     $path="existingpkg.php";
     $modal="";   
$str1="select * from advertisetype where AdtypeId='$advtypeid'";
$conn1=mysqli_connect("localhost","root","","freephotocopycenter");
$result1=$conn1->query($str1);
$row1=$result1->fetch_assoc();

$packagename=$row1["AdtypeName"];
$price=$row1["Price"];
$dur=$row1["Duration"];
  }
}

date_default_timezone_set('Asia/Kolkata');
$currentdate=date("Y-m-d");
$currentdate1=strtotime($currentdate);
$y=date("Y",$currentdate1);
$m=date("m",$currentdate1);
$m1=date("M",$currentdate1);


if(isset($_POST["btnsubmit"]))
{
  echo "<script>location.href='expensedetails.php'</script>";
} 

$str4="select * from paymentincome where AdvId='$aid'";
$conn4=mysqli_connect("localhost","root","","freephotocopycenter");
$result4=$conn4->query($str4);

while($row4=$result4->fetch_assoc())
{

  $dop1=$row4["DOA"];
  $dop=strtotime($row4["DOA"]);
  $year=date("Y",$dop);
  $month=date("m",$dop);

  if($year==$y && $month==$m)
  {  
    $total+=$row4["Amt"];
  }
}

?>

<section class="wrapper">
	<form name='frm' method="post">
    <br>
              <font size="5">&nbsp;<i class="fa fa-angle-right"></i> <b>Dashboard</b></font><hr>

          <div class="col-lg-9 col-md-4 col-sm-4 mb" style='margin-top: -25px;'>
            <!--CUSTOM CHART START -->
            <div class="row mt">
              <!-- SERVER STATUS PANELS -->
                <div class="col-md-4 col-sm-4 mb">
                <div class="white-panel pn">
                  <br>
                  <img src="img/icons/29-128 (1).png" width="120" alt="">
                  <br>
                  <br>
                  <font size='3' color="black"><b>Total Expense of <?php echo $m1; ?> : <?php echo $total; ?></b></font>
                  <br>
                  <br>
                  <input class="btn btn-small btn-theme04" type='submit' name='btnsubmit' value="FULL REPORT">
                </div>
              

                </div>
              <!-- /col-md-4-->
              <a href="packagehistory.php">
                <div class="col-md-4 col-sm-4 mb">
                <div class="white-panel pn">
                  <div class="white-header">
                    <h5><font size="4" color="black">Package History</font></h5>
                  </div>
                  <br>
  <img src='img/icons/029-128.png' height='120' width='120'>
                  <br><br><font size="5" color="black"><b></b></font> 
                </div>

            
                <!--  /darkblue panel -->
              </div>
          </a>
              <!-- /col-md-4 -->
            <div class="row">
              <!-- WEATHER PANEL -->
              <div class="col-md-4 mb">
                <a <?php echo $modal; ?> href='<?php echo $path; ?>'>
                <div class="white-panel pn">
                  <br>
                  <b><font size='4.9' color='black'>Details Of Existing Package</b></font>
                  <br>
                  <br>
                  
                  <br>
                  <img src="img/icons/package_protection-128.png" width="120" alt="">
                  <br>
                  <br></div>
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

              <!-- /col-md-4 -->
            </div>
            <!-- /row -->
              <!-- /col-md-4-->
              <!-- DIRECT MESSAGE PANEL -->
               
              <!-- /col-md-4 -->
            </div>
            <!-- /row -->
              <!-- /col-md-4 -->
            </div>
            <!-- /row -->
          <!-- /col-lg-9 END SECTION MIDDLE -->
          <!-- **********************************************************************************************************************************************************
              RIGHT SIDEBAR CONTENT
              *********************************************************************************************************************************************************** -->
          <div class="col-lg-3">
            <!--COMPLETED ACTIONS DONUTS CHART-->
            <!-- CALENDAR-->
                       <div id="calendar" class="mb">
              <div class="panel green-panel no-margin">
                <div class="panel-body">
                  <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                    <div class="arrow"></div>
                    <h3 class="popover-title" style="disadding: none;"></h3>
                    <div id="date-popover-content" class="popover-content"></div>
                  </div>
                  <div id="my-calendar"></div>
                </div>
              </div>
            </div>
            <!-- / calendar -->
          </div>
          <!-- /col-lg-3 -->
        </div>
        <!-- /row -->
      </section>
    </section>

              <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
       
    </form>
</section>


    </section>
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer" style='margin-top: 203px;'>
         <div class="text-center">
    <p>Copyright © 2019. All rights reserved.</p>
                  <a href="index.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
 
    </footer>
    <!--footer end-->
  </section>

  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>

  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="lib/sparkline-chart.js"></script>
  <script src="lib/zabuto_calendar.js"></script>
  <!--<script type="text/javascript">
    $(document).ready(function() {
      var unique_id = $.gritter.add({
        // (string | mandatory) the heading of the notification
        title: 'Welcome to Dashio!',
        // (string | mandatory) the text inside the notification
        text: 'Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo.',
        // (string | optional) the image to display on the left
        image: 'img/ui-sam.jpg',
        // (bool | optional) if you want it to fade out on its own or just sit there
        sticky: false,
        // (int | optional) the time you want it to be alive for before fading out
        time: 8000,
        // (string | optional) the class name you want to apply to that specific message
        class_name: 'my-sticky-class'
      });

      return false;
    });-->
  </script>
  <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>
</body>

</html>
