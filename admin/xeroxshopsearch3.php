<?php
include_once("header.php");
?>

<?php
$area="";
$area=$_POST["txtarea"];
?>

<section class="wrapper site-min-height">
 <form name='frm' method='post' action='xeroxexport.php'>
  
  <div class="row">
          <div class="col-md-12">
            <div class="content-panel">
              <font size="5">&nbsp;<i class="fa fa-angle-right"></i> <b>Records of Xeroxshops</b> </font><p class="nav pull-right top-menu"><button class='btn btn-round btn-success' name='btnexport' type='submit'>Export to Excel&nbsp;&nbsp;<img src='img/icons/excel.png' height='25' width='25'></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p><hr>
            </form>
              <form name="frm1" method="post" align="right">
                <b><input type="text" name="txtarea" value="<?php echo $area; ?>" size="30" placeholder='Enter ShopName'>&nbsp;</b>
                <input class="btn btn-success" type="submit" name="btnsearch" value="Search">&nbsp;&nbsp;
              </form>
              <br>
<?php

$no="";
$id="";
$str="";
if(isset($_POST["btnsearch"]))
{
$id=$_POST["txtarea"];

$str3="select * from area where AreaName='$id'";
$conn3=mysqli_connect("localhost","root","","freephotocopycenter");
$result3=$conn3->query($str3);
$row3=$result3->fetch_assoc();
$aid=$row3["AreaId"];

$str="select * from xeroxshop where AreaId ='$aid'";
}
else
{
$str="select * from xeroxshop"; 
}
$conn=mysqli_connect("localhost","root","","freephotocopycenter");
$result=$conn->query($str);
$str1="<table class='table table-striped table-advance table-hover'>";
$str1.="<thead>
            <tr>
                    <th> <font size='3'>Sr. No</font></th>
                    <th> <font size='3'>ShopName</font></th>
                    <th> <font size='3'>UserName</font></th>
                    <th> <font size='3'>Date Of Join</font></th>
                    <th> <font size='3'>Contact No</font></th>
                    <th> <font size='3'>Last Seen</font></th>
                    <th> <font size='3'>Is Auth</font></th>
                    <th> <font size='3'>Action</font></th>
            </tr>
        </thead>";
$no=1;
$cnt=mysqli_num_rows($result);
if($cnt!=0)
{
while($row=$result->fetch_assoc())
{
  $str1.="<tr><td>".$no."</td><td>".$row["XName"]."</td><td>".$row["XUname"]."</td><td>".$row["DOJ"]."</td><td>".$row["ContactNo"]."</td><td>".$row["Lseen"]."</td><td>".$row["IsAuth"]."</td><td><a href='xeroxshopprofile.php?ID=".$row["XId"]."'class='btn btn-round btn-primary'>View</a></td></tr>";
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
            <!-- /content-panel -->
          </div>
          <!-- /col-md-12 -->
        </div>
</section>


<?php
include_once("footer.php");
?>