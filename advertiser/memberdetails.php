<?php
include_once("header.php");
?>

<section class="wrapper site-min-height">
 <form name='frm' method='post' action='memexport.php'>
  
  <div class="row mt">
          <div class="col-md-12">
            <div class="content-panel">
              <font size="5">&nbsp;<i class="fa fa-angle-right"></i> <b>Records of Members</b> </font><p class="nav pull-right top-menu"><button class='btn btn-round btn-success' name='btnexport' type='submit'>Export to Excel&nbsp;&nbsp;<img src='img/icons/excel.png' height='25' width='25'></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p><hr><div class="dataTables_paginate paging_bootstrap pagination" style="margin-right: 16%;"><ul><li><a href="memberdetails.php?ChrID=A">A</a></li><li><a href="memberdetails.php?ChrID=B">B</a></li><li><a href="memberdetails.php?ChrID=C">C</a></li><li><a href="memberdetails.php?ChrID=D">D</a></li><li><a href="memberdetails.php?ChrID=E">E</a></li><li><a href="memberdetails.php?ChrID=F">F</a></li><li><a href="memberdetails.php?ChrID=G">G</a></li><li><a href="memberdetails.php?ChrID=H">H</a></li><li><a href="memberdetails.php?ChrID=I">I</a></li><li><a href="memberdetails.php?ChrID=J">J</a></li><li><a href="memberdetails.php?ChrID=K">K</a></li><li><a href="memberdetails.php?ChrID=L">L</a></li><li><a href="memberdetails.php?ChrID=M">M</a></li><li><a href="memberdetails.php?ChrID=N">N</a></li><li><a href="memberdetails.php?ChrID=O">O</a></li><li><a href="memberdetails.php?ChrID=P">P</a></li><li><a href="memberdetails.php?ChrID=Q">Q</a></li><li><a href="memberdetails.php?ChrID=R">R</a></li><li><a href="memberdetails.php?ChrID=S">S</a></li><li><a href="memberdetails.php?ChrID=T">T</a></li><li><a href="memberdetails.php?ChrID=U">U</a></li><li><a href="memberdetails.php?ChrID=V">V</a></li><li><a href="memberdetails.php?ChrID=W">W</a></li><li><a href="memberdetails.php?ChrID=X">X</a></li><li><a href="memberdetails.php?ChrID=Y">Y</a></li><li><a href="memberdetails.php?ChrID=Z">Z</a></li></ul></div>

<?php
$no="";
$id="";
$str="";
if(isset($_GET["ChrID"]))
{
$id=$_GET["ChrID"];
$str="select * from member where MUname like '$id%'";
}
else
{
$str="select * from member";  
}
$conn=mysqli_connect("localhost","root","","freephotocopycenter");
$result=$conn->query($str);
$str1="<table class='table table-striped table-advance table-hover'>";
$str1.="<thead>
            <tr>
                    <th> <font size='3'>Sr. No</font></th>
                    <th> <font size='3'>UserName</font></th>
                    <th> <font size='3'>Gender</font></th>
                    <th> <font size='3'>Date Of Join</font></th>
                    <th> <font size='3'>Contact No</font></th>
                    <th> <font size='3'>Last Seen</font></th>
                    <th> <font size='3'>Action</font></th>
            </tr>
        </thead>";
$no=1;

$cnt=mysqli_num_rows($result);
if($cnt!=0)
{
while($row=$result->fetch_assoc())
{
  $str1.="<tr><td>".$no."</td><td>".$row["MUname"]."</td><td>".$row["Gender"]."</td><td>".$row["DOJ"]."</td><td>".$row["ContactNo"]."</td><td>".$row["Lseen"]."</td><td><a href='memberprofile.php?ID=".$row["MId"]."'class='btn btn-round btn-primary'>View</a></td></tr>";
  $no++;
}
$str1.="</table>";
}
else
{
  $str1="<br><br><br><h2 align='center'>No Record Found</h2>";  
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