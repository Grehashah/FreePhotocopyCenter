<?php
include_once("header.php");
?>

<?php


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

$str2="select * from member";
$conn2=mysqli_connect("localhost","root","","freephotocopycenter");
$result2=$conn2->query($str2);

date_default_timezone_set('Asia/Kolkata');
$currentdate=date("Y-m-d");
$currentdate1=strtotime($currentdate);
$y=date("Y",$currentdate1);

while($row2=$result2->fetch_assoc())
{
  $doj=strtotime($row2["DOJ"]);
  $year=date("Y",$doj);
  $month=date("m",$doj);

  if($year==$y && $month==1)
  {  
      $sjan++;
  }
  elseif($year==$y && $month==2)
  {  
      $sfeb++;
  }
  elseif($year==$y && $month==3)
  {  
      $smar++;
  }
  elseif($year==$y && $month==4)
  {  
      $sapr++;
  }
  elseif($year==$y && $month==5)
  {  
      $smay++;
  }
  elseif($year==$y && $month==6)
  {  
      $sjun++;
  }
  elseif($year==$y && $month==7)
  {  
      $sjul++;
  }
  elseif($year==$y && $month==8)
  {  
      $saug++;
  }
  elseif($year==$y && $month==9)
  {  
      $ssep++;
  }
elseif($year==$y && $month==10)
  {  
      $soct++;
  }
elseif($year==$y && $month==11)
  {  
      $snov++;
  }
elseif($year==$y && $month==12)
  {  
      $sdec++;
  }
  $gt=$sjan+$sfeb+$smar+$sapr+$smay+$sjun+$sjul+$saug+$ssep+$soct+$snov+$sdec;
}


// Coding Of Chart-2

$dop="";
$xjan=0;
$xfeb=0;
$xmar=0;
$xapr=0;
$xmay=0;
$xjun=0;
$xjul=0;
$xaug=0;
$xsep=0;
$xoct=0;
$xnov=0;
$xdec=0;
$gt1=0;
$y="";

$str3="select * from xeroxshop";
$conn3=mysqli_connect("localhost","root","","freephotocopycenter");
$result3=$conn3->query($str3);

date_default_timezone_set('Asia/Kolkata');
$currentdate=date("Y-m-d");
$currentdate1=strtotime($currentdate);
$y=date("Y",$currentdate1);

while($row3=$result3->fetch_assoc())
{
  $dojj=strtotime($row3["DOJ"]);
  $year=date("Y",$dojj);
  $month=date("m",$dojj);

  if($year==$y && $month==1)
  {  
      $xjan++;
  }
  elseif($year==$y && $month==2)
  {  
      $xfeb++;
  }
  elseif($year==$y && $month==3)
  {  
      $xmar++;
  }
  elseif($year==$y && $month==4)
  {  
      $xapr++;
  }
  elseif($year==$y && $month==5)
  {  
      $xmay++;
  }
  elseif($year==$y && $month==6)
  {  
      $xjun++;
  }
  elseif($year==$y && $month==7)
  {  
      $xjul++;
  }
  elseif($year==$y && $month==8)
  {  
      $xaug++;
  }
  elseif($year==$y && $month==9)
  {  
      $xsep++;
  }
elseif($year==$y && $month==10)
  {  
      $xoct++;
  }
elseif($year==$y && $month==11)
  {  
      $xnov++;
  }
elseif($year==$y && $month==12)
  {  
      $xdec++;
  }
  $gt1=$xjan+$xfeb+$xmar+$xapr+$xmay+$xjun+$xjul+$xaug+$xsep+$xoct+$xnov+$xdec;
}

?>

   <section class="wrapper site-min-height">
        <form method='post'>
        <div class="row">
        	<br>
        	<div class="col-md-12">
              <font size="5">&nbsp;<i class="fa fa-angle-right"></i> <b>Performance Report of FreePhotocopyCenter</b></font> <hr>
          
           <div class="col-md-10 col-sm-4 mb" style="margin-left: 8.5%;">
                <!-- REVENUE PANEL -->
                <div class="green-panel pn">
                  <div class="green-header">
                    <h5><font size="4">No of Unique Members</font></h5>
                  </div>
                  <div class="chart mt">
                    <div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="5" data-data="[<?php echo $sjan ?>,<?php echo $sfeb ?>,<?php echo $smar ?>,<?php echo $sapr ?>,<?php echo $smay ?>,<?php echo $sjun ?>,<?php echo $sjul ?>,<?php echo $saug ?>,<?php echo $ssep ?>,<?php echo $soct ?>,<?php echo $snov ?>,<?php echo $sdec ?>]"><canvas width="366" height="75" style="display: inline-block; width: 366px; height: 75px; vertical-align: top;"></canvas></div>
                  </div>
                  <p class="mt"><font size="5"><b><?php echo $gt; ?></b></font><br>Total No of Unique Members attached in year <?php echo $y; ?></p>
                </div>
              </div>
    

           <div class="col-md-10 col-sm-4 mb" style="margin-left: 8.5%; margin-top: 2%">
                <!-- REVENUE PANEL -->
                <div class="green-panel pn">
                  <div class="green-header">
                    <h5><font size="4">No of Unique Xeroxshops</font></h5>
                  </div>
                  <div class="chart mt">
                    <div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="5" data-data="[<?php echo $xjan ?>,<?php echo $xfeb ?>,<?php echo $xmar ?>,<?php echo $xapr ?>,<?php echo $xmay ?>,<?php echo $xjun ?>,<?php echo $xjul ?>,<?php echo $xaug ?>,<?php echo $xsep ?>,<?php echo $xoct ?>,<?php echo $xnov ?>,<?php echo $xdec ?>]"><canvas width="366" height="75" style="display: inline-block; width: 366px; height: 75px; vertical-align: top;"></canvas></div>
                  </div>
                  <p class="mt"><font size="5"><b><?php echo $gt1; ?></b></font><br>Total No of Unique Xeroxshops attached in year <?php echo $y; ?></p>
                </div>
              </div>

    </div>
</div>
</form>
  </section>

<?php
include_once("footer.php");
?>