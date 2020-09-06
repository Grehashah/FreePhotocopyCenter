<?php
include_once("header.php");
?>

<?php

$timerflag=$_SESSION['timerflag'];
$id=0;
$timer1="";
$totalcopies=0;
$no=0;
$no2=0;
date_default_timezone_set('Asia/Kolkata');
$currentdate=date("Y-m-d");
$currentdate1=strtotime($currentdate);
$currentdate2=date("Y-m-d H:i:s");
$currentdate3=strtotime($currentdate2);
$y=date("Y",$currentdate1);


       $str2="select * from otp where MId='$mid'";
       $conn2=mysqli_connect("localhost","root","","freephotocopycenter");
       $result2=$conn2->query($str2);
        while($row2=$result2->fetch_assoc())
        {
            $dop1=$row2["DOP"];
        $dop=strtotime($row2["DOP"]);
        $year=date("Y",$dop);

         $doo1=$row2["DOO"];
        $doo=strtotime($row2["DOO"]);
        $year1=date("Y",$doo);
        if($y==$year1)
        {
          $no2++;
        }
          if($y==$year)
          {
            $totalcopies+=$row2['NOP'];
            $no++;
          }
    }
     
     $str2="select * from member where MId='$mid'";
$conn2=mysqli_connect("localhost","root","","freephotocopycenter");
$result2=$conn2->query($str2);
$row2=$result2->fetch_assoc();
$muname=$row2["MUname"];      


//timer

       $str2="select * from otp where MId='$mid'";
       $conn2=mysqli_connect("localhost","root","","freephotocopycenter");
       $result2=$conn2->query($str2);
        while($row2=$result2->fetch_assoc())
        {
        $doo1=$row2["DOO"];
        $doo1=strtotime($doo1." + 62 minutes");
        $dop1=$row2['DOP'];
      }

      if($timerflag==1)
      {
      if($currentdate3<=$doo1)
      {
        if($dop1=='0000-00-00 00:00:00')
        {                
                $timer1="<div class='col-lg-5 col-md-6 col-sm-6 col-xs-12' style='margin-left: 30%;'>";
                    $timer1.="<div class='wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30'>";
                        $timer1.="<div class='website-traffic-ctn'>";
                            $timer1.="<h2>Your Coupon will be Expired in...</h2><p>(You will not be able to generate any other coupon until your current coupon is expired.)</p><br>";
                            $timer1.="  <div align='center' id='response'>
                                        </div>";
                        $timer1.="</div>";
                   $timer1.="</div>";
                $timer1.="</div><br><br><br><br><br><br><br><br>"; 
      }
      else
      {
        $timer1="<div class='col-lg-4 col-md-6 col-sm-6 col-xs-12' style='margin-left: 34%;'>";
                    $timer1.="<div class='wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30'>";
                        $timer1.="<div class='website-traffic-ctn'>";
                            $timer1.="<h2>You have Successfully got your PhotoCopies!</h2>";
                        $timer1.="</div>";
                   $timer1.="</div>";
                $timer1.="</div><br><br><br><br><br>"; 
      }
     }
      else
      {
        $timer1="";
      }
    }
      else
      {
        $timer1="";
      }
 
if(isset($_POST["btnclick"]))
{
  echo("<script>location.href='selectshop.php'</script>");
}  

?>
<div class="breadcomb-area">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="breadcomb-list">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="breadcomb-wp">
                  <div class="breadcomb-icon">
                    <i class="notika-icon notika-edit"></i>
                  </div>
                  <div class="breadcomb-ctn">
                    
                    <font size="5"><b><?php echo $muname; ?> you are welcome to our site..!</b></font>
                    <p><span class="bread-ntd"></span></p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                <div class="breadcomb-report">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<div class="notika-status-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter"><?php echo $no2 ?></span></h2>
                            <p>Total Coupons Generated In <?php echo $y; ?></p>
                        </div>
                   </div>
                </div> 
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter"><?php echo $no ?></span></h2>
                            <p>Total Coupons Verified In <?php echo $y; ?></p>
                        </div>
                   </div>
                </div>
       
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter"><?php echo $totalcopies ?></span></h2>
                            <p>Total Copies Got In <?php echo $y; ?></p>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>

<br>

<?php
echo $timer1;
?>



        <form name="frm1" method="post">
 
<div class="wizard-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="wizard-wrap-int">
                        <div class="wizard-hd">
                         <h3><i class="fa fa-angle-right"></i> Dashboard</h3>
                            
                            <br>
                            
                            <center><font size="5" color="grey">Dear Customer, You can place your order between 8:00AM to 8:00PM only.</font></center>
                            <br>
                             <br>
                            <center><img src="img/icons/free-photocopy.jpg" style="width:1200px;height:550px;"></center><br><br>

                            <div align='right' style='margin-top: 13px; margin-right: 300px;'>
                <button class="btn nk-light-blue btn-info waves-effect" name='btnclick' type='submit' style='width : 500px; height: 55px;'><font size="5">&nbsp;&nbsp;To Start Click here!&nbsp;&nbsp;</font></button>      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>

<script type="text/javascript">
	setInterval(function()
	{
		var xmlhttp=new XMLHttpRequest();
		xmlhttp.open("GET","response.php",false);
		xmlhttp.send(null);
		document.getElementById("response").innerHTML=xmlhttp.responseText;
	},1000)
</script>

<?php
include_once("footer.php");
?>
