<?php
include_once("header.php");
?>


<?php
$mid=$_GET["ID"];
if($mid==1)
{
  $m="January";
}
else if($mid==2)
{
  $m="February";
}
else if($mid==3)
{
  $m="March";
}
else if($mid==4)
{
  $m="April";
}
else if($mid==5)
{
  $m="May";
}
else if($mid==6)
{
  $m="June";
}
else if($mid==7)
{
  $m="July";
}
else if($mid==8)
{
  $m="August";
}
else if($mid==9)
{
  $m="September";
}
else if($mid==10)
{
  $m="October";
}
else if($mid==11)
{
  $m="November";
}
else if($mid==12)
{
  $m="December";
}

?>

<section class="wrapper site-min-height">
  <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <font size="5">&nbsp;<i class="fa fa-angle-right"></i> <b>Details of Incomes in <?php echo $m; ?></b> </font><hr>

<?php
$no=1;
$flag=0;
$str="select * from paymentxerox";
$conn=mysqli_connect("localhost","root","","freephotocopycenter");
$result=$conn->query($str);
$str1="<table class='table table-striped table-advance table-hover'>";
$str1.="<thead>
            <tr>
                   <th><font size='3'>Sr. No</font></th>
                   <th><font size='3'>Shop Name</font></th>
                   <th><font size='3'>UserName</font></th>
                   <th><font size='3'>AdminName</font></th>
                   <th><font size='3'>Date of Given</font></th>
                   <th><font size='3'>Amount</font></th>
            </tr>
        </thead>";

date_default_timezone_set('Asia/Kolkata');
$currentdate=date("Y-m-d");
$currentdate1=strtotime($currentdate);
$y=date("Y",$currentdate1);

$strr="select * from xeroxshop where XId='$aid'";
$connn=mysqli_connect("localhost","root","","freephotocopycenter");
$resultt=$connn->query($strr);
$roww=$resultt->fetch_assoc();
$xuname=$roww['XUname'];
$xname=$roww['XName'];

while($row=$result->fetch_assoc())
{

$aaid=$row["AdminId"];
$strrr="select * from admin where AdminId='$aaid'";
$connnn=mysqli_connect("localhost","root","","freephotocopycenter");
$resulttt=$connn->query($strrr);
$rowww=$resulttt->fetch_assoc();
$aname=$rowww['AdminUname'];

  $dog=$row["DOG"];
  $dog1=strtotime($row["DOG"]);
  $year=date("Y",$dog1);
  $month=date("m",$dog1);
  
  if($year==$y && $month==$mid)
  {  
      $str1.="<tr><td>".$no. "</td><td>".$xname."</td><td>".$xuname."</td><td>".$aname."</td><td>".$row['DOG']."</td><td>".'₹ '.$row['Amt']."</td></tr>";
      $no++;
          $flag=1;
  }
}
if($flag==1)
{

$str1.="</table>";
}
else
{
  $str1="<h2 align='center'>No Record Found</h2>";  

}
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