<?php
include_once("header.php");
?>

<?php

$no="";
$id="";
$str="";
$dop="";
$y="";
$gt=0;
$total=0;

date_default_timezone_set('Asia/Kolkata');
$currentdate=date("Y-m-d");
$currentdate1=strtotime($currentdate);
$y=date("Y",$currentdate1);
$m=date("m",$currentdate1);
$m--;

if($m==1)
{
  $m2="Jan";
}
else if($m==2)
{
  $m2="Feb";
}
else if($m==3)
{
  $m2="Mar";
}
else if($m==4)
{
  $m2="Apr";
}
else if($m==5)
{
  $m2="May";
}
else if($m==6)
{
  $m2="Jun";
}
else if($m==7)
{
  $m2="Jul";
}
else if($m==8)
{
  $m2="Aug";
}
else if($m==9)
{
  $m2="Sep";
}
else if($m==10)
{
  $m2="Oct";
}
else if($m==11)
{
  $m2="Nov";
}
else if($m==12)
{
  $m2="Dec";
}

$xid=$_GET['ID'];
$str="select * from xeroxshop where XId='$xid'";
$conn=mysqli_connect("localhost","root","","freephotocopycenter");
$result=$conn->query($str);
$row=$result->fetch_assoc();
$xname=$row["XName"];
$address=$row["Address"];
$uname=$row["XUname"];
$cno=$row["ContactNo"];

$str2="select * from otp where XId='$xid'";
$conn2=mysqli_connect("localhost","root","","freephotocopycenter");
$result2=$conn2->query($str2);

while($row2=$result2->fetch_assoc())
{
  $dop1=$row2["DOP"];
  $dop=strtotime($row2["DOP"]);
  $year=date("Y",$dop);
  $month=date("m",$dop);

  if($year==$y && $month==$m)
  {  
      $gt+=$row2["NOP"];
  }
  $total=$gt;
}

if(isset($_POST["btnmp"]))
{
   echo("<script>location.href='https://paytm.com/'</script>");
}

?>

<section class="wrapper site-min-height"><div class="col-lg-12 mt">
  <form name='frm' method='post'>
          <div class="row content-panel">
            <div class="col-lg-10 col-lg-offset-1">
              <div class="invoice-body">
                <div class="pull-left">
                  <h1><?php echo $uname; ?></h1>
                  <address>
                <strong><?php echo $xname; ?></strong><br>
                <?php echo $address; ?><br>
               
                P : (+91) <?php echo $cno; ?>
                    <br>
                    <br> 
              </address>
                </div>
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width:60px" class="text-center">Sr.no</th>
                      <th class="text-left">Shop Name</th>
                      <th style="width:150px" class="text-right">Total Copies of <?php echo $m2 ?></th>
                      <th style="width:150px" class="text-right">Rate</th>
                      <th style="width:100px" class="text-right">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="text-center">1</td>
                      <td><?php echo $xname; ?></td>
                      <td class="text-right"><?php echo $gt; ?></td>
                      <td class="text-right">x 1</td>
                      <td class="text-right"><?php echo "₹ ".$total; ?></td>
                    </tr>
                    <tr>
                      <td colspan="3" rowspan="4">
                        </td>
                      <td class="text-right no-border">
                        <div class="well well-small green"><strong>Total</strong></div>
                      </td>
                      <td class="text-right"><strong><?php echo "₹ ".$total ?></strong></td>
                    </tr>
                  </tbody>
                </table>
                <br>   <br>
                <div Align='Center'>
                <input class="btn btn-primary btn-lg" type="submit" name="btnmp" value="Make Payment">
              </div>
            </div>
          
           </div>
         </div>
       </form>
     </div>
   </section>

</section>

<?php
include_once("footer.php");
?>