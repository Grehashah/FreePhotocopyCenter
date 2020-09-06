<?php
include_once("header.php");
?>

<section class="wrapper site-min-height">
  <div class="row mt">
          <div class="col-md-12">
              <div class="content-panel">

              <font size="5">&nbsp;&nbsp;<i class="fa fa-angle-right"></i> <b>Feedback List</b></font><hr>
     
<?php

$no=1;
$identity="";
$str1="";

$str1="select * from feedback";
$conn1=mysqli_connect("localhost","root","","freephotocopycenter");
$result1=$conn1->query($str1);
$str1="<table class='table table-striped table-advance table-hover'>";
$str1.="<thead>
            <tr> 
                    <th> <font size='3'>Sr. No</font></th>
                    <th> <font size='3'>Identity</font></th>
                    <th> <font size='3'>Username</font></th>
                    <th> <font size='3'>Experience</font></th>
                    <th> <font size='3'>Comment</font></th>
                    <th> <font size='3'>Action</font></th>
            </tr>
        </thead>";
$cnt=mysqli_num_rows($result1);
if($cnt!=0)
{
while($row1=$result1->fetch_assoc())
{
$email=$row1["Email"];

$str2="select * from xeroxshop where Email='$email'";
$conn2=mysqli_connect("localhost","root","","freephotocopycenter");
$result2=$conn2->query($str2);
$row2=$result2->fetch_assoc();
$cnt2=mysqli_num_rows($result2);

$str3="select * from advertiser where Email='$email'";
$conn3=mysqli_connect("localhost","root","","freephotocopycenter");
$result3=$conn3->query($str3);
$row3=$result3->fetch_assoc();
$cnt3=mysqli_num_rows($result3);

$str4="select * from member where Email='$email'";
$conn4=mysqli_connect("localhost","root","","freephotocopycenter");
$result4=$conn4->query($str4);
$row4=$result4->fetch_assoc();
$cnt4=mysqli_num_rows($result4);

if($cnt2!=0)
{
  $identity="ShopKeeper";
  $uname=$row2["XUname"];  
}
else if($cnt3!=0)
{
  $identity="Advertiser";
  $uname=$row3["AUname"];
}
else if($cnt4!=0)
{
  $identity="Member";
    $uname=$row4["MUname"];
}

      $str1.="<tr><td>".$no."</td><td>".$identity."</td><td>".$uname."</td><td>".$row1['Exp']."</td><td>".$row1["Cmt"]."</td><td><a href='fdresponse.php?ID=".$email."'class='btn btn-round btn-primary'>Response</a></tr>";
      $no++;
}


$str1.="</table>";
}
else
{
  $str1="<h2 align='center'>No Record Found</h2>";  
}
echo $str1;
?>
            </div>
          </div>
</section>

<?php
include_once("footer.php");
?>