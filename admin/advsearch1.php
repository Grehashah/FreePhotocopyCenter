<?php
include_once("header.php");
?>

<?php
$suname="";
$suname=$_POST["txtsuname"];
?>

<section class="wrapper site-min-height">
	<form name='frm' method='post' action='diamondexport.php'>
  
  <div class="row">
          <div class="col-md-12">
            <div class="content-panel">
              <font size="5">&nbsp;<i class="fa fa-angle-right"></i> <b>Records of Advertisers</b> </font><p class="nav pull-right top-menu"><button class='btn btn-round btn-success' name='btnexport' type='submit'>Export to Excel&nbsp;&nbsp;<img src='img/icons/excel.png' height='25' width='25'></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p><hr>
            </form>
              <form name="frm1" method="post" align="right">
                <b><input type="text" name="txtsuname" value="<?php echo $suname; ?>" size="30" placeholder='Enter UserName'>&nbsp;</b>
                <input class="btn btn-success" type="submit" name="btnsearch" value="Search">&nbsp;&nbsp;
              </form>
              <br>
              
<?php
$no="";
$id="";
$str="";
if(isset($_POST["btnsearch"]))
{
$id=$_POST["txtsuname"];
$str="select * from advertiseradvertise,advertiser where advertiseradvertise.AdvId=advertiser.AdvId and AdtypeId=3 and auname like '$id%'"; 
}
else
{
$str="select * from advertiseradvertise,advertiser where advertiseradvertise.AdvId=advertiser.AdvId and AdtypeId=3"; 
}
$conn=mysqli_connect("localhost","root","","freephotocopycenter");
$result=$conn->query($str);
$str1="<table class='table table-striped table-advance table-hover'>";
$str1.="<thead>
            <tr>
                    <th> <font size='3'>Sr. No</font></th>
                    <th> <font size='3'>UserName</font></th>
                    <th> <font size='3'>OfficeName</font></th>
                    <th> <font size='3'>Contact No</font></th>
                    <th> <font size='3'>Date Of start</font></th>
                    <th> <font size='3'>Date Of End</font></th>
                    <th> <font size='3'>Action</font></th>
            </tr>
        </thead>";
$no=1;
$cnt=mysqli_num_rows($result);
if($cnt!=0)
{
while($row=$result->fetch_assoc())
{
  $str1.="<tr><td>".$no."</td><td>".$row["AUname"]."</td><td>".$row["OfficeName"]."</td><td>".$row["ContactNo"]."</td><td>".$row["DOS"]."</td><td>".$row["DOE"]."</td><td><a href='advprofile.php?ID=".$row["AdvId"]."'class='btn btn-round btn-primary'>View</a></td></tr>";
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