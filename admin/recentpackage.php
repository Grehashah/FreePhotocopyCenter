<?php
include_once("header.php");
date_default_timezone_set('Asia/Kolkata');
$currentdate=date("Y-m-d");
$currentdate1=strtotime($currentdate);
$y=date("Y",$currentdate1);
$m=date("m",$currentdate1);
$mon=date("M",$currentdate1);
?>

<section class="wrapper site-min-height">
	<div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <font size="5">&nbsp;<i class="fa fa-angle-right"></i> <b>Package Selected in <?php echo $mon ?></b> </font><hr>
<?php
$no="";
$str="select * from advertiseradvertise";
$conn=mysqli_connect("localhost","root","","freephotocopycenter");
$result=$conn->query($str);
$str1="<table class='table table-striped table-advance table-hover'>";
$str1.="<thead>
            <tr>
                        <th> <font size='3'>Sr. No</font></th>
                        <th> <font size='3'>Username</font></th>
                        <th> <font size='3'>Office Name</font></th>
                        <th> <font size='3'>Contact No.</font></th>
                        <th> <font size='3'>Package Type</font></th>
                        <th> <font size='3'>Date of Start</font></th>
                        <th> <font size='3'>Date of End</font></th>
            </tr>
        </thead>";
$no=1;
while($row=$result->fetch_assoc())
{

  $dos1=$row["DOS"];
  $dos=strtotime($row["DOS"]);
  $year=date("Y",$dos);
  $month=date("m",$dos);
    $advid=$row['AdvId'];
    $adtypeid=$row['AdtypeId'];
    $doss=$row['DOS'];
    $doe=$row['DOE'];

  if($year==$y && $month==$m)
  {  

  $str6="select * from advertiser where AdvId='$advid'";
  $conn6=mysqli_connect("localhost","root","","freephotocopycenter");
  $result6=$conn6->query($str6);
  $row6=$result6->fetch_assoc();

  $uname=$row6['AUname'];
    $cno=$row6['ContactNo'];
  $oname=$row6['OfficeName'];


  $str7="select * from advertisetype where AdtypeId='$adtypeid'";
  $conn7=mysqli_connect("localhost","root","","freephotocopycenter");
  $result7=$conn7->query($str7);
  $row7=$result7->fetch_assoc();

  $tname=$row7['AdtypeName'];

  $str1.="<tr><td>".$no."</td><td>".$uname."</td><td>".$oname."</td><td>".$cno."</td><td>".$tname."</td><td>".$doss."</td><td>".$doe."</td></tr>";
                    $no++;
   
  }
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