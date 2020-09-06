<?php

$str="select * from advertiseradvertise,advertiser where advertiseradvertise.AdvId=advertiser.AdvId and AdtypeId=3"; 
$conn=mysqli_connect("localhost","root","","freephotocopycenter");
$result=$conn->query($str);
$str1="<table class='table table-striped table-advance table-hover' border='1'>";
$str1.="<thead>
            <tr>
                    <th> <font size='3'>Sr. No</font></th>
                    <th> <font size='3'>UserName</font></th>
                    <th> <font size='3'>OfficeName</font></th>
                    <th> <font size='3'>Contact No</font></th>
                    <th> <font size='3'>Date Of start</font></th>
                    <th> <font size='3'>Date Of End</font></th>
            </tr>
        </thead>";
$no=1;
while($row=$result->fetch_assoc())
{
  $str1.="<tr><td>".$no."</td><td>".$row["AUname"]."</td><td>".$row["OfficeName"]."</td><td>".$row["ContactNo"]."</td><td>".$row["DOS"]."</td><td>".$row["DOE"]."</td></tr>";
  $no++;
}

$str1.="</table>";

header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=diamondpkglist.xls");
echo $str1;

?>