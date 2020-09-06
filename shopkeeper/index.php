<?php
include_once("header.php");
?>

<?php
$cnt=0;
$tags="";
$aqh=0;
$total=0;
date_default_timezone_set('Asia/Kolkata');
$currentdate=date("Y-m-d");
$currentdate1=strtotime($currentdate);
$y=date("Y",$currentdate1);
$m=date("m",$currentdate1);
$m1=date("M",$currentdate1);

$str1="select * from paymentxerox where XId='$aid'";
$conn1=mysqli_connect("localhost","root","","freephotocopycenter");
$result1=$conn1->query($str1);

while($row1=$result1->fetch_assoc())
{

  $dog1=$row1["DOG"];
  $dog=strtotime($row1["DOG"]);
  $year=date("Y",$dog);
  $month=date("m",$dog);

  if($year==$y && $month==$m)
  {  
    $total+=$row1["Amt"];
  }
}

if(isset($_POST["btnsubmit"]))
{
  echo "<script>location.href='incomedetails.php'</script>";
}

$str3="select * from stock where XId='$aid'";
$conn3=mysqli_connect("localhost","root","","freephotocopycenter");
$result3=$conn3->query($str3);

while($row3=$result3->fetch_assoc())
{

  $aqh=$row3["AQH"];
}


$str4="select * from stockorder where XId='$aid'";
$conn4=mysqli_connect("localhost","root","","freephotocopycenter");
$result4=$conn4->query($str4);

while($row4=$result4->fetch_assoc())
{
  $cnt++;
}

//lowstock

     $s="select * from stock where XId='$aid'";
    $c=mysqli_connect("localhost","root","","freephotocopycenter");
    $r=$c->query($s);
    while($ro=$r->fetch_assoc())
    {
      $qoh=$ro["QOH"];
      $aqh=$ro["AQH"];
    }

if($qoh>=$aqh)
{
  $tags="
  <marquee ><font size='4' color='red'>You are running on low stock , please place an order or contact to system admin as fast as possible.</font></marquee>
  <br> 
  <br>  ";

}
else
{
  $tags="";
}


?>

<section class="wrapper site-min-height" style='margin-top: 50px;'>
  <br>
	<form name='frm' method="post">
              <font size="5">&nbsp;<i class="fa fa-angle-right"></i> <b>Dashboard</b></font><hr>
      
      <?php echo $tags; ?>

          <div class="col-lg-9 col-md-4 col-sm-4 mb" style='margin-top: -25px;'>
            <!--CUSTOM CHART START -->
            <div class="row mt">
              <!-- SERVER STATUS PANELS -->
                <div class="col-lg-4 col-md-4 col-sm-4 mb">
                <div class="white-panel pn">
                  <br>
                  <img src="img/icons/53-128.png" width="120" alt="">
                  <br>
                  <br>
                  <font size='3' color="black"><b>Total Income of <?php echo $m1; ?> : <?php echo $total; ?></b></font>
                  <br>
                  <br>
                  <input class="btn btn-small btn-theme04" type='submit' name='btnsubmit' value="FULL REPORT">
                </div>
              

                </div>
              <!-- /col-md-4-->
                <div class="col-md-4 col-sm-4 mb">
                <div class="white-panel pn">
                  <div class="white-header">
                    <h5><font size="4" color="black">Actual Qty On Hand</font></h5>
                  </div>
  <img src='img/icons/Box-Hand-128.png' height='120' width='120'>
                  <br><br><font size="5" color="black"><b><?php echo $aqh; ?></b></font> 
                </div>
            
                <!--  /darkblue panel -->
              </div>
              <!-- /col-md-4 -->
              <a href='futurepayment.php'>
              <div class="col-md-4 col-sm-4 mb">
                <!-- REVENUE PANEL -->
                <div class="white-panel pn">
                  <br>
                  <b><font size='4.9' color='black'>Future Payment</b></font>
                  <br>
                  <br>
                  <br>
                  <img src="img/icons/29-128 (1).png" width="120" alt="">
                  <br>
                  <br>
                </div>
              </div>
              </a>
              <!-- /col-md-4 -->
            </div>

            <!-- /row -->
            <a>
            <div class="row">
              <!-- WEATHER PANEL -->
              <div class="col-md-4 mb">
                <a href="orderlist.php">
                <div class="white-panel pn">
                  <br>
                  <b><font size='4.9' color='black'>Total No. of Orders Placed</b></font>
                  <br>
                  <br>
                  <img src="img/icons/shop-65-128.png" width="120" alt="">
                  <br>
                  <br>
                  <h5><font size='5' color='black'><b><?php echo $cnt; ?></b>&nbsp;</font></h5>
                </div>
              </div>
            </a>
           
              <a href='fullreport.php'> 
                <div class="col-md-4 col-sm-4 mb">
                <div class="white-panel pn">
                  <br>
                  <b><font size='4.9' color='black'>Full Report&nbsp;</b></font>
                  <br>
                  <br>
                  <br>
                  <img src="img/icons/Cloud_graph_graph_graph_report_online_graph_pie_graph-128.png" width="120" alt="">
                  <br>
                  <br>
                </div>
              </div>
          </a>
              <!-- /col-md-8  -->
            
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


<?php
include_once("footer.php");
?>