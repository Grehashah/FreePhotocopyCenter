<?php
include_once("header.php");
?>

<?php
$dur="";
$packagename="";
$str="select * from advertiseradvertise where AdvId='$aid'";
$conn=mysqli_connect("localhost","root","","freephotocopycenter");
$result=$conn->query($str);

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
     $packagename="";
     $dur="";
     $price="";
     $dos="";
     $doe="";
  }
  else
  {
    $str1="select * from advertisetype where AdtypeId='$advtypeid'";
    $conn1=mysqli_connect("localhost","root","","freephotocopycenter");
    $result1=$conn1->query($str1);
    $row1=$result1->fetch_assoc();

    $packagename=$row1["AdtypeName"];
    $price=$row1["Price"];
    $dur=$row1["Duration"];
    $dr=date_diff($doe1,$currentdate1);
    $dr=$dr+1;
  }

?>


<section class="wrapper site-min-height">
  <div class="row">
          <div class="col-md-12">
              <font size="5">&nbsp;<i class="fa fa-angle-right"></i> <b>Details of Existing Package</b></font><hr>
              
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
              <div class="custom-box">
                <div class="servicetitle">
                  <h4><?php echo $packagename; ?> Package</h4>
                  <hr>
                </div>
                <div class="icn-main-container">
                  <span class="icn-container"><font size='5'><?php echo "₹ ".$price; ?></font></span>
                </div>
                <ul class="pricing">
                  <li>Time Period : <?php echo $dur; ?></li>
                  <li>Date Of Start : <?php echo $dos; ?></li>
                  <li>Date Of End : <?php echo $doe; ?></li>
                  <li>Days Remaining : <?php echo $dr; ?></li>
                </ul>
               </div>
              <!-- end custombox -->
            </div>

  
</section>

<?php
include_once("footer.php");
?>