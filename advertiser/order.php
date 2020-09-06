<?php
include_once("header.php");
?>


<?php
$advtype="";
$duration1="";
$duration2="";
$duration3="";
$price1="";
$price2="";
$price3="";
$packagename1="";
$packagename2="";
$packagename3="";
$str="select * from advertisetype";
$conn=mysqli_connect("localhost","root","","freephotocopycenter");
$result=$conn->query($str);

while($row=$result->fetch_assoc())
{
$advtype=$row["AdtypeName"];

if($advtype=="Silver")
{
  $str1="select * from advertisetype where AdtypeName='$advtype'";
  $conn1=mysqli_connect("localhost","root","","freephotocopycenter"); 
  $result1=$conn1->query($str1);

  $row1=$result1->fetch_assoc();
  $duration1=$row1["Duration"];
  $price1=$row1["Price"];
  $packagename1=$advtype;
}
if($advtype=="Gold")
{
  $str2="select * from advertisetype where AdtypeName='$advtype'";
  $conn2=mysqli_connect("localhost","root","","freephotocopycenter"); 
  $result2=$conn2->query($str2);

  $row2=$result2->fetch_assoc();
  $duration2=$row2["Duration"];
  $price2=$row2["Price"];
  $packagename2=$advtype;
}
if($advtype=="Diamond")
{
  $str3="select * from advertisetype where AdtypeName='$advtype'";
  $conn3=mysqli_connect("localhost","root","","freephotocopycenter"); 
  $result3=$conn3->query($str3);

  $row3=$result3->fetch_assoc();
  $duration3=$row3["Duration"];
  $price3=$row3["Price"];
  $packagename3=$advtype;
}

}

?>

<section class="wrapper site-min-height">
        <div class="row">
          <div class="col-lg-12">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
              <div class="custom-box">
                <div class="servicetitle">
                  <h4><?php echo $packagename1; ?> Package</h4>
                  <hr>
                </div>
                <div class="icn-main-container">
                  <span class="icn-container"><font size='5'><?php echo "$".$price1; ?></font></span>
                </div>
                <p></p>
                <ul class="pricing">
                  <li><font size='4'>Duration of Package : <?php echo $duration1; ?></font></li>
                </ul>
                <a class="btn btn-theme" href="#">Order Now</a>
              </div>
              <!-- end custombox -->
            </div>
            <!-- end col-4 -->
          
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
              <div class="custom-box">
                <div class="servicetitle">
                  <h4><?php echo $packagename2; ?> Package</h4>
                  <hr>
                </div>
                <div class="icn-main-container">
                  <span class="icn-container"><font size='5'><?php echo "$".$price2; ?></font></span>
                </div>
                <p></p>
                <ul class="pricing">
                  <li><font size='4'>Duration of Package : <?php echo $duration2; ?></font></li>
                </ul>
                <a class="btn btn-theme" href="#">Order Now</a>
              </div>
              <!-- end custombox -->
            </div>
          
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
              <div class="custom-box">
                <div class="servicetitle">
                  <h4><?php echo $packagename3; ?> Package</h4>
                  <hr>
                </div>
                <div class="icn-main-container">
                  <span class="icn-container"><font size='5'><?php echo "$".$price3; ?></font></span>
                </div>
                <p></p>
                <ul class="pricing">
                  <li><font size='4'>Duration of Package : <?php echo $duration3; ?></font></li>
                </ul>
                <a class="btn btn-theme" href="#">Order Now</a>
              </div>
              <!-- end custombox -->
            </div>
          </div>
          <!--  /col-lg-12 -->
        </div>
        <!--  /row -->
      </section>


<?php
include_once("footer.php");
?>