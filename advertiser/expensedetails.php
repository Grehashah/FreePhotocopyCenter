<?php
include_once("header.php");
?>

<section class="wrapper site-min-height">
    <form name='frm' method='post' action='expexport.php'>
 
  <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <font size="5">&nbsp;<i class="fa fa-angle-right"></i> <b>Details of Expenses</b> </font><p class="nav pull-right top-menu"><button class='btn btn-round btn-success' name='btnexport' type='submit'>Export to Excel&nbsp;&nbsp;<img src='img/icons/excel.png' height='25' width='25'></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p><hr>

<?php
$amt1=0;
$amt2=0;
$amt3=0;
$amt4=0;
$amt5=0;
$amt6=0;
$amt7=0;
$amt8=0;
$amt9=0;
$amt10=0;
$amt11=0;
$amt12=0;
$gt=0;

$str="select * from paymentincome where AdvId='$aid'";
$conn=mysqli_connect("localhost","root","","freephotocopycenter");
$result=$conn->query($str);
$str1="<table class='table table-striped table-advance table-hover'>";
$str1.="<thead>
            <tr>
                   <th><font size='3'>Sr. No</font></th>
                   <th><font size='3'>Month</font></th>
                   <th><font size='3'>Total Amount</font></th>                   
                   <th><font size='3'><i class='fa fa-question-circle'></i>Action</font></th>
            </tr>
        </thead>";

date_default_timezone_set('Asia/Kolkata');
$currentdate=date("Y-m-d");
$currentdate1=strtotime($currentdate);
$y=date("Y",$currentdate1);
$m=date("m",$currentdate1);

$cnt=mysqli_num_rows($result);
if($cnt!=0)
{
while($row=$result->fetch_assoc())
{
  $dog=$row["DOA"];
  $dog1=strtotime($row["DOA"]);
  $year=date("Y",$dog1);
  $month=date("m",$dog1);
  $month1=date("M",$dog1);
 

  if($year==$y && $month==1)
  {  
    $amt1+=$row["Amt"];
  }
  elseif($year==$y && $month==2)
  {  
    $amt2+=$row["Amt"];
  }
  elseif($year==$y && $month==3)
  {  
    $amt3+=$row["Amt"];
  }
  elseif($year==$y && $month==4)
  {  
    $amt4+=$row["Amt"];
  }
  elseif($year==$y && $month==5)
  {  
    $amt5+=$row["Amt"];
  }
  elseif($year==$y && $month==6)
  {  
    $amt6+=$row["Amt"];
  }
  elseif($year==$y && $month==7)
  {  
    $amt7+=$row["Amt"];
  }
  elseif($year==$y && $month==8)
  {  
    $amt8+=$row["Amt"];
  }
  elseif($year==$y && $month==9)
  {  
    $amt9+=$row["Amt"];
  }
elseif($year==$y && $month==10)
  {  
    $amt10+=$row["Amt"];
  }
elseif($year==$y && $month==11)
  {  
    $amt11+=$row["Amt"];
  }
elseif($year==$y && $month==12)
  {  
    $amt12+=$row["Amt"];
  }
  $gt=$amt1+$amt2+$amt3+$amt4+$amt5+$amt6+$amt7+$amt8+$amt9+$amt10+$amt11+$amt12;
  
}


$str1.="<tr><td>". 1 . "</td><td>". 'January' ."</td><td>". $amt1 ."</td><td><a href='monthlyexp.php?ID=1' class='btn btn-round btn-primary'><font size='2'>View Details</font></a></td></tr>";
$str1.="<tr><td>". 2 . "</td><td>". 'February' ."</td><td>". $amt2 ."</td><td><a href='monthlyexp.php?ID=2 'class='btn btn-round btn-primary'><font size='2'>View Details</font></a></td></tr>";
$str1.="<tr><td>". 3 . "</td><td>". 'March' ."</td><td>". $amt3 ."</td><td><a href='monthlyexp.php?ID=3 'class='btn btn-round btn-primary'><font size='2'>View Details</font></a></td></tr>";
$str1.="<tr><td>". 4 . "</td><td>". 'April' ."</td><td>". $amt4 ."</td><td><a href='monthlyexp.php?ID=4 'class='btn btn-round btn-primary'><font size='2'>View Details</font></a></td></tr>";
$str1.="<tr><td>". 5 . "</td><td>". 'May' ."</td><td>". $amt5 ."</td><td><a href='monthlyexp.php?ID=5 'class='btn btn-round btn-primary'><font size='2'>View Details</font></a></td></tr>";
$str1.="<tr><td>". 6 . "</td><td>". 'June' ."</td><td>". $amt6 ."</td><td><a href='monthlyexp.php?ID=6 'class='btn btn-round btn-primary'><font size='2'>View Details</font></a></td></tr>";
$str1.="<tr><td>". 7 . "</td><td>". 'July' ."</td><td>". $amt7 ."</td><td><a href='monthlyexp.php?ID=7 'class='btn btn-round btn-primary'><font size='2'>View Details</font></a></td></tr>";
$str1.="<tr><td>". 8 . "</td><td>". 'August' ."</td><td>". $amt8 ."</td><td><a href='monthlyexp.php?ID=8 'class='btn btn-round btn-primary'><font size='2'>View Details</font></a></td></tr>";
$str1.="<tr><td>". 9 . "</td><td>". 'September' ."</td><td>". $amt9 ."</td><td><a href='monthlyexp.php?ID=9 'class='btn btn-round btn-primary'><font size='2'>View Details</font></a></td></tr>";
$str1.="<tr><td>". 10 . "</td><td>". 'Octaber' ."</td><td>". $amt10 ."</td><td><a href='monthlyexp.php?ID=10 'class='btn btn-round btn-primary'><font size='2'>View Details</font></a></td></tr>";
$str1.="<tr><td>". 11 . "</td><td>". 'November' ."</td><td>". $amt11 ."</td><td><a href='monthlyexp.php?ID=11 'class='btn btn-round btn-primary'><font size='2'>View Details</font></a></td></tr>";
$str1.="<tr><td>". 12 . "</td><td>". 'December' ."</td><td>". $amt12 ."</td><td><a href='monthlyexp.php?ID=12 'class='btn btn-round btn-primary'><font size='2'>View Details</font></a></td></tr>";

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
      </form>
</section>

<?php
include_once("footer.php");
?>