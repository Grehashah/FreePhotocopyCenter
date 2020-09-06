<?php
include_once("header.php");
?>


<?php
$advtypeid="";
$advtype="";
$advtype1="";
$duration1="";
$duration2="";
$duration3="";
$price1="";
$price2="";
$price3="";
$packagename1="";
$packagename2="";
$packagename3="";
$dos="";
$button1="";
$button2="";
$button3="";

$str="select * from advertiseradvertise where AdvId='$aid'";
$conn=mysqli_connect("localhost","root","","freephotocopycenter");
$result=$conn->query($str);
$cnt=mysqli_num_rows($result);

if($cnt!=0)
{

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
      
    $button1="";
    $button2="";
    $button3="";

    $str11="select * from advertisetype";
    $conn11=mysqli_connect("localhost","root","","freephotocopycenter");
    $result11=$conn11->query($str11);

    while($row11=$result11->fetch_assoc())
    {
      $advtype=$row11["AdtypeName"];

      if($advtype=="Silver")
      {
        $str1="select * from advertisetype where AdtypeName='$advtype'";
        $conn1=mysqli_connect("localhost","root","","freephotocopycenter"); 
        $result1=$conn1->query($str1);

        $row1=$result1->fetch_assoc();
        $duration1=$row1["Duration"];
        $price1=$row1["Price"];
        $packagename1=$advtype;

          if(isset($_POST["btnsilver"]))
          {
            echo("<script>location.href='pkgorder.php?id=$advtype'</script>");
          }
      }

      if($advtype=="Gold")
      {
        $str4="select * from advertisetype where AdtypeName='$advtype'";
        $conn4=mysqli_connect("localhost","root","","freephotocopycenter"); 
        $result4=$conn4->query($str4);

        $row4=$result4->fetch_assoc();
        $duration2=$row4["Duration"];
        $price2=$row4["Price"];
        $packagename2=$advtype;
        
          if(isset($_POST["btngold"]))
          {
            echo("<script>location.href='pkgorder.php?id=$advtype'</script>");             
          }
      }
      if($advtype=="Diamond")
      {
        $str7="select * from advertisetype where AdtypeName='$advtype'";
        $conn7=mysqli_connect("localhost","root","","freephotocopycenter"); 
        $result7=$conn7->query($str7);

        $row7=$result7->fetch_assoc();
        $duration3=$row7["Duration"];
        $price3=$row7["Price"];
        $packagename3=$advtype;
        
          if(isset($_POST["btndiamond"]))
          {
            echo("<script>location.href='pkgorder.php?id=$advtype'</script>");
          }
      }  
    }    
    }
    else
    {
        $str11="select * from advertisetype";
    $conn11=mysqli_connect("localhost","root","","freephotocopycenter");
    $result11=$conn11->query($str11);

    while($row11=$result11->fetch_assoc())
    {
      $advtype=$row11["AdtypeName"];

      if($advtype=="Silver")
      {
        $str1="select * from advertisetype where AdtypeName='$advtype'";
        $conn1=mysqli_connect("localhost","root","","freephotocopycenter"); 
        $result1=$conn1->query($str1);

        $row1=$result1->fetch_assoc();
        $duration1=$row1["Duration"];
        $price1=$row1["Price"];
        $packagename1=$advtype;

          if(isset($_POST["btnsilver"]))
          {
            echo("<script>location.href='pkgorder.php?id=$advtype'</script>");
          }
      }

      if($advtype=="Gold")
      {
        $str4="select * from advertisetype where AdtypeName='$advtype'";
        $conn4=mysqli_connect("localhost","root","","freephotocopycenter"); 
        $result4=$conn4->query($str4);

        $row4=$result4->fetch_assoc();
        $duration2=$row4["Duration"];
        $price2=$row4["Price"];
        $packagename2=$advtype;
        
          if(isset($_POST["btngold"]))
          {
            echo("<script>location.href='pkgorder.php?id=$advtype'</script>");             
          }
      }
      if($advtype=="Diamond")
      {
        $str7="select * from advertisetype where AdtypeName='$advtype'";
        $conn7=mysqli_connect("localhost","root","","freephotocopycenter"); 
        $result7=$conn7->query($str7);

        $row7=$result7->fetch_assoc();
        $duration3=$row7["Duration"];
        $price3=$row7["Price"];
        $packagename3=$advtype;
        
          if(isset($_POST["btndiamond"]))
          {
            echo("<script>location.href='pkgorder.php?id=$advtype'</script>");
          }
      }  
    }    
    $button1="disabled";
    $button2="disabled";
    $button3="disabled";
    }
}
else
{
    $str11="select * from advertisetype";
    $conn11=mysqli_connect("localhost","root","","freephotocopycenter");
    $result11=$conn11->query($str11);

    while($row11=$result11->fetch_assoc())
    {
      $advtype=$row11["AdtypeName"];

      if($advtype=="Silver")
      {
        $str1="select * from advertisetype where AdtypeName='$advtype'";
        $conn1=mysqli_connect("localhost","root","","freephotocopycenter"); 
        $result1=$conn1->query($str1);

        $row1=$result1->fetch_assoc();
        $duration1=$row1["Duration"];
        $price1=$row1["Price"];
        $packagename1=$advtype;

          if(isset($_POST["btnsilver"]))
          {
            echo("<script>location.href='pkgorder.php?id=$advtype'</script>");
          }
      }

      if($advtype=="Gold")
      {
        $str4="select * from advertisetype where AdtypeName='$advtype'";
        $conn4=mysqli_connect("localhost","root","","freephotocopycenter"); 
        $result4=$conn4->query($str4);

        $row4=$result4->fetch_assoc();
        $duration2=$row4["Duration"];
        $price2=$row4["Price"];
        $packagename2=$advtype;
        
          if(isset($_POST["btngold"]))
          {
            echo("<script>location.href='pkgorder.php?id=$advtype'</script>");             
          }
      }
      if($advtype=="Diamond")
      {
        $str7="select * from advertisetype where AdtypeName='$advtype'";
        $conn7=mysqli_connect("localhost","root","","freephotocopycenter"); 
        $result7=$conn7->query($str7);

        $row7=$result7->fetch_assoc();
        $duration3=$row7["Duration"];
        $price3=$row7["Price"];
        $packagename3=$advtype;
        
          if(isset($_POST["btndiamond"]))
          {
            echo("<script>location.href='pkgorder.php?id=$advtype'</script>");
          }
      }  
    }    
}

?>

<section class="wrapper site-min-height">
  <form name="frm1" method="post">
         <div class="row">
          <div class="col-lg-12">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
              <div class="custom-box">
                <div class="servicetitle">
                  <h4><?php echo $packagename1; ?> Package</h4>
                  <hr>
                </div>
                <div class="icn-main-container">
                  <span class="icn-container"><font size='5'><?php echo "₹ ".$price1; ?></font></span>
                </div>
                <p></p>
                <ul class="pricing">
                  <li><font size='4'>Duration of Package : <?php echo $duration1; ?></font></li>
                </ul>
              <input class="btn btn-primary" type="submit" name="btnsilver" value='Order Now' <?php echo $button1; ?>>
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
                  <span class="icn-container"><font size='5'><?php echo "₹ ".$price2; ?></font></span>
                </div>
                <p></p>
                <ul class="pricing">
                  <li><font size='4'>Duration of Package : <?php echo $duration2; ?></font></li>
                </ul>
               
              <input class="btn btn-primary" type="submit" name="btngold" value='Order Now' <?php echo $button2; ?>>
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
                  <span class="icn-container"><font size='5'><?php echo "₹ ".$price3; ?></font></span>
                </div>
                <p></p>
                <ul class="pricing">
                  <li><font size='4'>Duration of Package : <?php echo $duration3; ?></font></li>
                </ul>
              <input class="btn btn-primary" type="submit" name="btndiamond" value='Order Now' <?php echo $button3; ?>>
              <!-- end custombox -->
            </div>
          </div>
          <!--  /col-lg-12 -->
        </div>
        <!--  /row -->
      </form>
      </section>


<?php
include_once("footer.php");
?>