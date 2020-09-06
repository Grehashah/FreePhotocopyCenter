<?php
include_once("header.php");
?>


<?php
$button1="";
$button2="";
$status="";
$otpid="";

$otpid = $_SESSION["OtpId"];
$str2="select * from otp where OtpId='$otpid'";
$conn2=mysqli_connect("localhost","root","","freephotocopycenter");
$result2=$conn2->query($str2);
$row2=$result2->fetch_assoc();
$mid=$row2["MId"];
$otpno=$row2["OtpNo"];
$nop=$row2["NOP"];
$xid1=$row2["XId"];

if($row2["DOP"]=="0000-00-00 00:00:00")
{
  $status="Rejected";
}
else
{
  $status="Accepted";
}

if($status=="Accepted")
{
  $button1="disabled";
  $button2="enabled";
}
else
{
  $button1="enabled";
  $button2="disabled";
}

$str3="select * from member where MId='$mid'";
$conn3=mysqli_connect("localhost","root","","freephotocopycenter");
$result3=$conn3->query($str3);
$row3=$result3->fetch_assoc();
$uname=$row3["MUname"];
$pic=$row3["Pic"];

if(isset($_POST["btnaccept"]))
{
        date_default_timezone_set('Asia/Kolkata');
        $currentdate=date("Y-m-d h-i-s");
        $str4="update otp set DOP='$currentdate' where OtpId='$otpid'";
        $conn4=mysqli_connect("localhost","root","","freephotocopycenter");
        $result4=$conn4->query($str4);
        
        $nop1=$nop;
        $xid=$xid1;

        $str5="select * from stock where XId='$xid'";
        $conn5=mysqli_connect("localhost","root","","freephotocopycenter");
        $result5=$conn5->query($str5);

        $stockid="";
        while($row5=$result5->fetch_assoc())
        {
          $aqh=$row5["AQH"];
          $stockid=$row5["StockId"];
        }
        $aqh=$aqh-$nop1;

        $str6="update stock set AQH='$aqh' where StockId='$stockid'";
        $conn6=mysqli_connect("localhost","root","","freephotocopycenter");
        $result6=$conn6->query($str6);

        echo "<script>location.href='otpdetails.php'</script>";
}

if(isset($_POST["btnreject"]))
{
        $currentdate1="0000-00-00 00:00:00";
        $str7="update otp set DOP='$currentdate1' where OtpId='$otpid'";
        $conn7=mysqli_connect("localhost","root","","freephotocopycenter");
        $result7=$conn7->query($str7);
        
        $nop2=$nop;
        $xid2=$xid1;

        $str8="select * from stock where XId='$xid2'";
        $conn8=mysqli_connect("localhost","root","","freephotocopycenter");
        $result8=$conn8->query($str8);

        $stockid1="";
        while($row8=$result8->fetch_assoc())
        {
          $aqh1=$row8["AQH"];
          $stockid1=$row8["StockId"];
        }
        $aqh1=$aqh1+$nop2;

        $str9="update stock set AQH='$aqh1' where StockId='$stockid1'";
        $conn9=mysqli_connect("localhost","root","","freephotocopycenter");
        $result9=$conn9->query($str9);

        echo "<script>location.href='otpdetails.php'</script>";

}


?>

<section class="wrapper site-min-height">
        <!-- page start-->
        <form name="myfrm" method="post">
        <div class="chat-room mt">
          <aside class="mid-side">
            <div class="chat-room-head">
              <h3><?php  echo $uname; ?></h3>
            </div>
            <br>

            <div>
            <img src="img/user-photos/member/<?php echo "$pic"; ?>" class="img-square" width="100" style="margin-left: 2.5%;">
          </div>
          <br>
            <div class="group-rom">
              <div class="first-part odd"><font size='4'><b>Coupon Code : </b></font></div>
              <div class="second-part"><font size='4'><?php  echo $otpno; ?></font></div>
            </div>
            <div class="group-rom">
              <div class="first-part"><font size='4'><b>No of Pages : </b></font></div>
              <div class="second-part"><font size='4'><?php  echo $nop; ?></font></div>
            </div>
            <div class="group-rom">
              <div class="first-part odd"><font size='4'><b>Status : </b></font></div>
              <div class="second-part"><font size='4'><?php  echo $status; ?></font></div>
            </div>
            <div class="group-rom">
              <div class="second-part">
              <input class="btn btn-theme" type="submit" name="btnaccept" value='Accept' <?php echo $button1; ?>>
              <input class="btn btn-danger" type="submit" name="btnreject" value='Reject'<?php echo $button2; ?>>
             </div>
          </div>
          </aside>
        </div>
        <!-- page end-->
        </form>
      </section>  
<?php
include_once("footer.php");
?>