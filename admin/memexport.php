<?php
$str="select * from member";	
$conn=mysqli_connect("localhost","root","","freephotocopycenter");
$result=$conn->query($str);
$str1="<table class='table table-striped table-advance table-hover' border='1'>";
$str1.="<thead>
            <tr>
                    <th> <font size='3'>Sr. No</font></th>
            	 	    <th> <font size='3'>UserName</font></th>
                   	<th> <font size='3'>Gender</font></th>
                    <th> <font size='3'>Date Of Join</font></th>
                    <th> <font size='3'>Contact No</font></th>
                    <th> <font size='3'>Last Seen</font></th>
                    <th> <font size='3'>Is Auth</font></th>
            </tr>
        </thead>";
$no=1;
while($row=$result->fetch_assoc())
{
  $str1.="<tr><td>".$no."</td><td>".$row["MUname"]."</td><td>".$row["Gender"]."</td><td>".$row["DOJ"]."</td><td>".$row["ContactNo"]."</td><td>".$row["Lseen"]."</td><td>".$row["IsAuth"]."</td></tr>";
  $no++;
}

$str1.="</table>";

header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=Memberlist.xls");
echo $str1;
?>