<?php
include_once("header.php");
?>

<section class="wrapper site-min-height">
 <form name='frm' method='post'>
  <div class="row mt">
   
          <div class="col-md-12">
            <div class="content-panel">
              <font size="5">&nbsp;&nbsp;<i class="fa fa-angle-right"></i> <b>List of XeroxShops</b> </font><a class='btn btn-round btn-primary' style='margin-left: 66%;' data-toggle='modal' href="#myModal">Generate Total Amount</a><hr>
              
<?php

$final=0;
$no="";
$id="";
$str="";
$dop="";
$y="";
$gt=0;
$status=0;
$mon="";

date_default_timezone_set('Asia/Kolkata');
$currentdate=date("Y-m-d");
$currentdate1=strtotime($currentdate);
$y=date("Y",$currentdate1);
$m=date("m",$currentdate1);
$mo=date("m",$currentdate1);

if($m==1)
{
  $y--;
  $m=12;  
  if($m==1)
{
  $mon="Jan";
}
else if($m==2)
{
  $mon="Feb";
}
else if($m==3)
{
  $mon="Mar";
}
else if($m==4)
{
  $mon="Apr";
}
else if($m==5)
{
  $mon="May";
}
else if($m==6)
{
  $mon="Jun";
}
else if($m==7)
{
  $mon="Jul";
}
else if($m==8)
{
  $mon="Aug";
}
else if($m==9)
{
  $mon="Sep";
}
else if($m==10)
{
  $mon="Oct";
}
else if($m==11)
{
  $mon="Nov";
}
else if($m==12)
{
  $mon="Dec";
}

}
else
{
  $m--;
 if($m==1)
{
  $mon="Jan";
}
else if($m==2)
{
  $mon="Feb";
}
else if($m==3)
{
  $mon="Mar";
}
else if($m==4)
{
  $mon="Apr";
}
else if($m==5)
{
  $mon="May";
}
else if($m==6)
{
  $mon="Jun";
}
else if($m==7)
{
  $mon="Jul";
}
else if($m==8)
{
  $mon="Aug";
}
else if($m==9)
{
  $mon="Sep";
}
else if($m==10)
{
  $mon="Oct";
}
else if($m==11)
{
  $mon="Nov";
}
else if($m==12)
{
  $mon="Dec";
}
}

$str="select * from xeroxshop"; 
$conn=mysqli_connect("localhost","root","","freephotocopycenter");
$result=$conn->query($str);
$str11="<table class='table table-striped table-advance table-hover'>";
$str11.="<thead>
            <tr>
                    <th> <font size='3'>Sr. No</font></th>
                    <th> <font size='3'>ShopName</font></th>
                    <th> <font size='3'>UserName</font></th>
                    <th> <font size='3'>Contact No</font></th>
                     <th> <font size='3'>Total Copies of $mon</font></th>
                     <th> <font size='3'>Action</font></th>
            </tr>
        </thead>";
$no=1;
while($row=$result->fetch_assoc())
{
$xid=$row["XId"];


$str3="select * from paymentxerox where XId='$xid'";
$conn3=mysqli_connect("localhost","root","","freephotocopycenter");
$result3=$conn3->query($str3);
$cnt=mysqli_num_rows($result3);
if($cnt!=0)
{
  while($row3=$result3->fetch_assoc())
  {
  $dog1=$row3["DOG"];
  $dog=strtotime($row3["DOG"]);
  $year1=date("Y",$dog);
  $month1=date("m",$dog);
       if($year1==$y && $month1==$mo)
       { 
        $status=1;
       }
       else
       {
        $status=0;
       }
  }
}
else
{
  $status=0;
}

if($status==0)
{

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
    }
      $str11.="<tr><td>".$no."</td><td>".$row["XName"]."</td><td>".$row["XUname"]."</td><td>".$row["ContactNo"]."</td><td>".$gt."</td><td><a href='xeroxpaymentbill.php?ID=".$row["XId"]."'class='btn btn-round btn-warning'>Make Payment</a>&nbsp;&nbsp;&nbsp;<a href='paymentdone.php?id=".$row["XId"].'&aid='.$aid.'&amt='.$gt."'class='btn btn-round btn-success'>Payment Done</a></td></tr>";
      $no++;
      $final=$final+$gt;
      $gt=0;
}
else
{
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
    }
      $str11.="<tr><td>".$no."</td><td>".$row["XName"]."</td><td>".$row["XUname"]."</td><td>".$row["ContactNo"]."</td><td>".$gt."</td><td><button class='btn btn-round btn-warning' name='btnsubmit' disabled>Make Payment</button>&nbsp;&nbsp;&nbsp;<button class='btn btn-round btn-success' name='btnsubmit' disabled>Payment Done</button></td></tr>";
      $no++;
      $final=$final+$gt;
      $gt=0;
    }
}

    $str11.="</table>";
    echo $str11;
?>
      </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
        </div>
</form>
</section>

  
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="
        modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Total Amount</h4>
              </div>
              <div class="modal-body">
                <p>Total Amount to be paid of month <?php echo $mon ?> is <?php echo "₹ ".$final ?></p>
              </div>
              <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="submit" name='btncancel'>OK</button>
              </div>
            </div>
          </div>
        </div>



<?php
include_once("footer.php");
?>