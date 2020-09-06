<?php

$output="";
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

if(isset($_POST['btnexport']))
{

$str="select * from paymentxerox";
$conn=mysqli_connect("localhost","root","","freephotocopycenter");
$result=$conn->query($str);
$output="<table class='table table-striped table-advance table-hover' border='1'>";
$output.="<thead>
            <tr>
                   <th><font size='3'>Sr. No</font></th>
                   <th><font size='3'>Month</font></th>
                   <th><font size='3'>Total Amount</font></th>                 
            </tr>
        </thead>";

date_default_timezone_set('Asia/Kolkata');
$currentdate=date("Y-m-d");
$currentdate1=strtotime($currentdate);
$y=date("Y",$currentdate1);
$m=date("m",$currentdate1);

while($row=$result->fetch_assoc())
{
  $dog=$row["DOG"];
  $dog1=strtotime($row["DOG"]);
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

$output.="<tr><td>". 1 . "</td><td>". 'January' ."</td><td>". $amt1 ."</td></tr>";
$output.="<tr><td>". 2 . "</td><td>". 'February' ."</td><td>". $amt2 ."</td></tr>";
$output.="<tr><td>". 3 . "</td><td>". 'March' ."</td><td>". $amt3 ."</td></tr>";
$output.="<tr><td>". 4 . "</td><td>". 'April' ."</td><td>". $amt4 ."</td></tr>";
$output.="<tr><td>". 5 . "</td><td>". 'May' ."</td><td>". $amt5 ."</td></tr>";
$output.="<tr><td>". 6 . "</td><td>". 'June' ."</td><td>". $amt6 ."</td></tr>";
$output.="<tr><td>". 7 . "</td><td>". 'July' ."</td><td>". $amt7 ."</td></tr>";
$output.="<tr><td>". 8 . "</td><td>". 'August' ."</td><td>". $amt8 ."</td></tr>";
$output.="<tr><td>". 9 . "</td><td>". 'September' ."</td><td>". $amt9 ."</td></tr>";
$output.="<tr><td>". 10 . "</td><td>". 'Octaber' ."</td><td>". $amt10 ."</td></tr>";
$output.="<tr><td>". 11 . "</td><td>". 'November' ."</td><td>". $amt11 ."</td></tr>";
$output.="<tr><td>". 12 . "</td><td>". 'December' ."</td><td>". $amt12 ."</td></tr>";

$output.="</table>";
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=Expenses.xls");
echo $output;
}

?>