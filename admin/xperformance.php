<?php
include_once("header.php");
?>

<?php
$xid=$_GET["ID"];
$str1="select * from xeroxshop where XId='$xid'";
$conn1=mysqli_connect("localhost","root","","freephotocopycenter");
$result1=$conn1->query($str1);
$row1=$result1->fetch_assoc();
$sname=$row1["XName"];
$qoh="";

if(isset($_POST["btnsubmit"]))
{
	$qoh=$_POST["txtqoh"];
	$str="update Stock set QOH='$qoh' where XId='$xid'";
	$conn=mysqli_connect("localhost","root","","freephotocopycenter");
	$result=$conn->query($str);

  echo "<script>alert('Minimum Qty of $sname has been Changed')</script>";  
}

// Coding Of Chart-1

$dop="";
$sjan=0;
$sfeb=0;
$smar=0;
$sapr=0;
$smay=0;
$sjun=0;
$sjul=0;
$saug=0;
$ssep=0;
$soct=0;
$snov=0;
$sdec=0;
$gt=0;
$y="";

$str2="select * from otp where XId='$xid'";
$conn2=mysqli_connect("localhost","root","","freephotocopycenter");
$result2=$conn2->query($str2);

date_default_timezone_set('Asia/Kolkata');
$currentdate=date("Y-m-d");
$currentdate1=strtotime($currentdate);
$y=date("Y",$currentdate1);

while($row2=$result2->fetch_assoc())
{

  $dop1=$row2["DOP"];
  $dop=strtotime($row2["DOP"]);
  $year=date("Y",$dop);
  $month=date("m",$dop);

  if($year==$y && $month==1)
  {  
      $sjan+=$row2["NOP"];
  }
  elseif($year==$y && $month==2)
  {  
      $sfeb+=$row2["NOP"];
  }
  elseif($year==$y && $month==3)
  {  
      $smar+=$row2["NOP"];
  }
  elseif($year==$y && $month==4)
  {  
      $sapr+=$row2["NOP"];
  }
  elseif($year==$y && $month==5)
  {  
      $smay+=$row2["NOP"];
  }
  elseif($year==$y && $month==6)
  {  
      $sjun+=$row2["NOP"];
  }
  elseif($year==$y && $month==7)
  {  
      $sjul+=$row2["NOP"];
  }
  elseif($year==$y && $month==8)
  {  
      $saug+=$row2["NOP"];
  }
  elseif($year==$y && $month==9)
  {  
      $ssep+=$row2["NOP"];
  }
elseif($year==$y && $month==10)
  {  
      $soct+=$row2["NOP"];
  }
elseif($year==$y && $month==11)
  {  
      $snov+=$row2["NOP"];
  }
elseif($year==$y && $month==12)
  {  
      $sdec+=$row2["NOP"];
  }
  $gt=$sjan+$sfeb+$smar+$sapr+$smay+$sjun+$sjul+$saug+$ssep+$soct+$snov+$sdec;
}


// Coding Of Chart-2

$dos="";
$ssjan=0;
$ssfeb=0;
$ssmar=0;
$ssapr=0;
$ssmay=0;
$ssjun=0;
$ssjul=0;
$ssaug=0;
$sssep=0;
$ssoct=0;
$ssnov=0;
$ssdec=0;
$gtstock=0;

$str6="select * from stock where XId='$xid'";
$conn6=mysqli_connect("localhost","root","","freephotocopycenter");
$result6=$conn6->query($str6);
while($row6=$result6->fetch_assoc())
{
  $dos1=$row6["DOS"];
  $dos=strtotime($row6["DOS"]);
  $year2=date("Y",$dos);
  $month2=date("m",$dos);

  if($year2==$y && $month2==1)
  {  
      $ssjan+=$row6["QtyGiven"];
  }
  elseif($year2==$y && $month2==2)
  {  
      $ssfeb+=$row6["QtyGiven"];
  }
  elseif($year2==$y && $month2==3)
  {  
      $ssmar+=$row6["QtyGiven"];
  }
  elseif($year2==$y && $month2==4)
  {  
      $ssapr+=$row6["QtyGiven"];
  }
  elseif($year2==$y && $month2==5)
  {  
      $ssmay+=$row6["QtyGiven"];
  }
  elseif($year2==$y && $month2==6)
  {  
      $ssjun+=$row6["QtyGiven"];
  }
  elseif($year2==$y && $month2==7)
  {  
      $ssjul+=$row6["QtyGiven"];
  }
  elseif($year2==$y && $month2==8)
  {  
      $ssaug+=$row6["QtyGiven"];
  }
  elseif($year2==$y && $month2==9)
  {  
      $sssep+=$row6["QtyGiven"];
  }
elseif($year2==$y && $month2==10)
  {  
      $ssoct+=$row6["QtyGiven"];
  }
elseif($year2==$y && $month2==11)
  {  
      $ssnov+=$row6["QtyGiven"];
  }
elseif($year2==$y && $month2==12)
  {  
      $ssdec+=$row6["QtyGiven"];
  }
  $gtstock=$ssjan+$ssfeb+$ssmar+$ssapr+$ssmay+$ssjun+$ssjul+$ssaug+$sssep+$ssoct+$ssnov+$ssdec;
}

// Coding Of Chart-3

$doo="";
$ojan=0;
$ofeb=0;
$omar=0;
$oapr=0;
$omay=0;
$ojun=0;
$ojul=0;
$oaug=0;
$osep=0;
$ooct=0;
$onov=0;
$odec=0;
$gtotp=0;

$str4="select * from otp where XId='$xid'";
$conn4=mysqli_connect("localhost","root","","freephotocopycenter");
$result4=$conn4->query($str4);
while($row4=$result4->fetch_assoc())
{

  $doo1=$row4["DOP"];
  $doo=strtotime($row4["DOP"]);
  $year1=date("Y",$doo);
  $month1=date("m",$doo);

  if($year1==$y && $month1==1)
  {  
      $ojan++;
  }
  elseif($year1==$y && $month1==2)
  {  
      $ofeb++;
  }
  elseif($year1==$y && $month1==3)
  {  
      $omar++;
  }
  elseif($year1==$y && $month1==4)
  {  
      $oapr++;
  }
  elseif($year1==$y && $month1==5)
  {  
      $omay++;
  }
  elseif($year1==$y && $month1==6)
  {  
      $ojun++;
  }
  elseif($year1==$y && $month1==7)
  {  
      $ojul++;
  }
  elseif($year1==$y && $month1==8)
  {  
      $oaug++;
  }
  elseif($year1==$y && $month1==9)
  {  
      $osep++;
  }
elseif($year1==$y && $month1==10)
  {  
      $ooct++;
  }
elseif($year1==$y && $month1==11)
  {  
      $onov++;
  }
elseif($year1==$y && $month1==12)
  {  
      $odec++;
  }
  $gtotp=$ojan+$ofeb+$omar+$oapr+$omay+$ojun+$ojul+$oaug+$osep+$ooct+$onov+$odec;
}

?>

   <section class="wrapper site-min-height">
        <form method='post'>
        <div class="row">
        	<br>
        	<div class="col-md-12">
              <font size="5">&nbsp;<i class="fa fa-angle-right"></i> <b>Performance of <?php echo $sname ?></b>
              </font><p class="nav pull-right top-menu"><a data-toggle="modal" href="xeroxshopstock.php#myModal" class="btn btn-round btn-primary">Reset Min-Qty Required</a></p> <hr>
          
           <div class="col-md-10 col-sm-4 mb" style="margin-left: 8.5%;">
                <!-- REVENUE PANEL -->
                <div class="green-panel pn">
                  <div class="green-header">
                    <h5><font size="4">No of Photcopies</font></h5>
                  </div>
                  <div class="chart mt">
                    <div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="5" data-data="[<?php echo $sjan ?>,<?php echo $sfeb ?>,<?php echo $smar ?>,<?php echo $sapr ?>,<?php echo $smay ?>,<?php echo $sjun ?>,<?php echo $sjul ?>,<?php echo $saug ?>,<?php echo $ssep ?>,<?php echo $soct ?>,<?php echo $snov ?>,<?php echo $sdec ?>]"><canvas width="366" height="75" style="display: inline-block; width: 366px; height: 75px; vertical-align: top;"></canvas></div>
                  </div>
                  <p class="mt"><font size="5"><b><?php echo $gt; ?></b></font><br>Total No of Photocopies made in year <?php echo $y; ?></p>
                </div>
              </div>

                <div class="col-md-10 col-sm-4 mb" style="margin-top: 2%; margin-left: 8.5%;">
                <!-- REVENUE PANEL -->
                <div class="green-panel pn">
                  <div class="green-header">
                    <h5><font size="4">Stock Allotment</font></h5>
                  </div>
                  <div class="chart mt">
                    <div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="5" data-data="[<?php echo $ssjan ?>,<?php echo $ssfeb ?>,<?php echo $ssmar ?>,<?php echo $ssapr ?>,<?php echo $ssmay ?>,<?php echo $ssjun ?>,<?php echo $ssjul ?>,<?php echo $ssaug ?>,<?php echo $sssep ?>,<?php echo $ssoct ?>,<?php echo $ssnov ?>,<?php echo $ssdec ?>]"><canvas width="366" height="75" style="display: inline-block; width: 366px; height: 75px; vertical-align: top;"></canvas></div>
                  </div>
                  <p class="mt"><font size="5"><b><?php echo $gtstock; ?></b></font><br>Total Stock Alloted in year <?php echo $y; ?></p>
                </div>
              </div>


                 <div class="col-md-10 col-sm-4 mb" style="margin-top: 2%; margin-left: 8.5%; margin-bottom: 3.5%" >
                <!-- REVENUE PANEL -->
                <div class="green-panel pn">
                  <div class="green-header">
                    <h5><font size="4">No. of Coupons</font></h5>
                  </div>
                  <div class="chart mt">
                    <div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="5" data-data="[<?php echo $ojan ?>,<?php echo $ofeb ?>,<?php echo $omar ?>,<?php echo $oapr ?>,<?php echo $omay ?>,<?php echo $ojun ?>,<?php echo $ojul ?>,<?php echo $oaug ?>,<?php echo $osep ?>,<?php echo $ooct ?>,<?php echo $onov ?>,<?php echo $odec ?>]"><canvas width="366" height="75" style="display: inline-block; width: 366px; height: 75px; vertical-align: top;"></canvas></div>
                  </div>
                  <p class="mt"><font size="5"><b><?php echo $gtotp; ?></b></font><br>Total No of Coupons Varify in year <?php echo $y; ?></p>
                </div>
              </div>
              

    
       <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Reset Minimum-Qty On hand of <?php echo $sname; ?></h4>
              </div>
              <div class="modal-body">
                <input type="text" value="<?php echo $qoh; ?>" name="txtqoh" placeholder="Enter Minimum Qty On Hand" autocomplete="off" class="form-control placeholder-no-fix">
              </div>
              <div class="modal-footer">
                <input data-dismiss="modal" class="btn btn-default" type="submit" name='btncancel' value='Cancel'>
                <input class="btn btn-theme" type="submit" name='btnsubmit' value='Submit'>              
              </div>
            </div>
          </div>
      </div>
    </div>
</div>
</form>
  </section>

<?php
include_once("footer.php");
?>