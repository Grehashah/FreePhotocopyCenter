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

date_default_timezone_set('Asia/Kolkata');
$currentdate=date("Y-m-d");
$currentdate1=strtotime($currentdate);
$y=date("Y",$currentdate1);
$m=date("m",$currentdate1);
$m1=date("M",$currentdate1);

$str1="select * from xeroxshop";
$conn1=mysqli_connect("localhost","root","","freephotocopycenter");
$result1=$conn1->query($str1);

while($row1=$result1->fetch_assoc())
{
	$noxs++;
}

$str2="select * from advertiser";
$conn2=mysqli_connect("localhost","root","","freephotocopycenter");
$result2=$conn2->query($str2);

while($row2=$result2->fetch_assoc())
{
	$noadv++;
}

$str3="select * from member";
$conn3=mysqli_connect("localhost","root","","freephotocopycenter");
$result3=$conn3->query($str3);

while($row3=$result3->fetch_assoc())
{
	$nomem++;
}

if(isset($_POST["btnsubmit"]))
{
  echo "<script>location.href='incomedetails.php'</script>";
} 

$str4="select * from paymentincome";
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

$str3="select * from paymentxerox";
$conn3=mysqli_connect("localhost","root","","freephotocopycenter");
$result3=$conn3->query($str3);

while($row3=$result3->fetch_assoc())
{

  $dop2=$row3["DOG"];
  $dop1=strtotime($row3["DOG"]);
  $year1=date("Y",$dop1);
  $month1=date("m",$dop1);

  if($year1==$y && $month1==$m)
  {  
    $total1+=$row3["Amt"];
  }
}

if(isset($_POST["btnsubmitt"]))
{
  echo "<script>location.href='expensedetails.php'</script>";
}

$str1="select * from stock";
$conn1=mysqli_connect("localhost","root","","freephotocopycenter");
$result1=$conn1->query($str1);

while($row1=$result1->fetch_assoc())
{
  $no=$row1["StockId"];
}

$str2="select * from stock where StockId='$no'";
$conn2=mysqli_connect("localhost","root","","freephotocopycenter");
$result2=$conn2->query($str2);
$row2=$result2->fetch_assoc();
$currqty=$row2["CurrQty"];


    $str11="select * from stockorder";
    $conn11=mysqli_connect("localhost","root","","freephotocopycenter");
    $result11=$conn11->query($str11);

    while($row11=$result11->fetch_assoc())
    {
      $doo=$row11["DOOrder"];
      $doo1=strtotime($doo);
      $month1=date("m",$doo1);
      $year1=date("Y",$doo1);

      if($m==$month1 && $y==$year1)
      {
        $num++;
      }
    }
?>

<section class="wrapper site-min-height">
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
                    <h5><font size="4" color="black">Total Quantity</font></h5>
                  </div>
  <img src='img/icons/total.png' height='120' width='120'>
                  <br><br><font size="5" color="black"><b><?php echo $currqty ?></b></font> 
                </div>
            
                <!--  /darkblue panel -->
              </div>
              <!-- /col-md-4 -->
              <div class="col-md-4 col-sm-4 mb">
                <!-- REVENUE PANEL -->
                <div class="white-panel pn">
                  <br>
                  <img src="img/icons/29-128 (1).png" width="120" alt="">
                  <br>
                  <br>
                  <font size='3' color="black"><b>Total expense of <?php echo $m1; ?> : <?php echo $total1; ?></b></font>
                  <br>
                  <br>
                 <input class="btn btn-small btn-theme04" type='submit' name='btnsubmitt' value="FULL REPORT">
                </div>
              </div>
              <!-- /col-md-4 -->
            </div>
            <!-- /row -->
            <div class="row">
              <!-- WEATHER PANEL -->
              <div class="col-md-4 mb">
                <a href="recentorderlist.php">
                <div class="white-panel pn">
                  <br>
                  <h4><b><font size='4.9' color='black'>Xeroxshop's Orders &nbsp;&nbsp;&nbsp;</b></font></h4>
                  
                  <img src="img/icons/shop-65-128.png" width="120" alt="">
                  <br>
                  <br>
                  <h5><font size='3.5' color='black'><b>Total no. of recent orders : <?php echo $num; ?> </b>&nbsp;&nbsp;&nbsp;</font></h5>
                </div>
              </div>
            </a>
              <!-- /col-md-4-->
              <!-- DIRECT MESSAGE PANEL -->
              <a href='deadstock.php'>
                <div class="col-md-4 col-sm-4 mb">
                  <div class="white-panel pn">
                  <div class="white-header">
                    <h5><font size="4" color="black">DeadStock of XeroxShop</font></h5>
                  </div>
                  <br>
  <img src='img/icons/P-1-26-128.png' height='120' width='120'>
                  <br><br><font size="5" color="black"></font> 
                </div>
              </div>
            </a>
              <!-- /col-md-8  -->

                <div class="col-md-4 col-sm-4 mb">
                <div class="white-panel pn">
                  <br>
                  <h4><b><font size='4.9' color='black'>No. of shopkeepers &nbsp;&nbsp;&nbsp;</b></font></h4>
                  
                  <img src="img/icons/Shopkeeper-128.png" width="120" alt="">
                  <br>
                  <br>
                  <h5><font size='3.5' color='black'><b>Total No. of Shopkeepers : <?php echo $noxs; ?>  </b>&nbsp;&nbsp;&nbsp;</font></h5>
                </div>
              </div>
              <!-- /col-md-8  -->
            </div>
            <div class="row">
              <!-- TWITTER PANEL -->
              <div class="col-md-4 mb">
                <div class="white-panel pn">
                  <br>
                  <h4><b><font size='4.9' color='black'>No. of Advertisers  &nbsp;&nbsp;&nbsp;</b></font></h4>
                  
                  <img src="img/icons/56-128.png" width="120" alt="">
                  <br>
                  <br>
                  <h5><font size='3.5' color='black'><b>Total No. of Advertisers : <?php echo $noadv; ?> </b>&nbsp;&nbsp;&nbsp;</font></h5>
                </div>
              </div>
              <!-- /col-md-4 -->
              <div class="col-md-4 mb">
                <!-- WHITE PANEL - TOP USER -->
                <div class="white-panel pn">
                  <div class="white-header">
                    <h5><font size="4" color="black">No. of Members</font></h5>
                  </div>
  <img src='img/icons/005_029_collective_couple_friends_company_man_woman-128.png' height='120' width='120'>
                  <br><br><font size="3.5" color="black"><b>Total No. of Members : <?php echo $nomem; ?></b></font> 
                </div>

              </div>
              <!-- /col-md-4 -->
              <a href="fullreport.php">
              <div class="col-md-4 mb">
                <!-- INSTAGRAM PANEL -->
                <div class="white-panel pn">
                  <br>
                  <b><font size='4.9' color='black'>Full Report &nbsp;</b></font>
                  <br>
                  <br>
                  <br>
                  <img src="img/icons/Cloud_graph_graph_graph_report_online_graph_pie_graph-128.png" width="120" alt="">
                  <br>
                  <br> </div>
              </div>
            </a>
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