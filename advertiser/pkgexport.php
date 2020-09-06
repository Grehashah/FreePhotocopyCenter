
<?php

session_start();

 $aid=$_SESSION["AdvId"];
 
$no="";
$str="select * from advertiseradvertise where AdvId='$aid'";
$conn=mysqli_connect("localhost","root","","freephotocopycenter");
$result=$conn->query($str);
$str1="<table class='table table-striped table-advance table-hover' border='1'>";
$str1.="<thead>
            <tr>
                        <th> <font size='3'>Sr. No</font></th>
                        <th> <font size='3'>Package Name</font></th>
                        <th> <font size='3'>Price</font></th>
                        <th> <font size='3'>Duration</font></th>
                        <th> <font size='3'>Date of Start</font></th>
                        <th> <font size='3'>Date of End</font></th>
            </tr>
        </thead>";
$no=1;
while($row=$result->fetch_assoc())
{
$advtypeid=$row["AdtypeId"];
$dos=$row["DOS"];
$doe=$row["DOE"];

$str2="select * from advertisetype where AdtypeId='$advtypeid'";
$conn2=mysqli_connect("localhost","root","","freephotocopycenter");
$result2=$conn2->query($str2);

$row2=$result2->fetch_assoc();
$price=$row2["Price"];
$dur=$row2["Duration"];
$name=$row2["AdtypeName"];

  $str1.="<tr><td>".$no."</td><td>".$name."</td><td>"."₹ ".$price."</td><td>".$dur." days"."</td><td>".$row["DOS"]."</td><td>".$row["DOE"]."</td></tr>";
  $no++;
}

$str1.="</table>";

header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=PkgHistory.xls");
echo $str1;

?>