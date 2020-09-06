<?php
include_once("header.php");
?>


        <div class="breadcomb-area">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="breadcomb-list">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="breadcomb-wp">
                  <div class="breadcomb-icon">
                    <i class="notika-icon notika-edit"></i>
                  </div>
                  <div class="breadcomb-ctn">
                    
                    <h1>Coupon History</h1>
                    <p><span class="bread-ntd"></span></p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                <div class="breadcomb-report">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
                                   
                                   <div class="normal-table-list">
                        <div class="basic-tb-hd">
                            

<?php

$str="select * from otp where MId='$mid'";
$conn1=mysqli_connect("localhost","root","","freephotocopycenter");
$result1=$conn1->query($str);
$str1="<table class='table table-hover'>";
$str1.="<thead>
            <tr> 
                    <th> <font size='3'>Sr. No</font></th>
                    <th> <font size='3'>Coupon Code</font></th>
                    <th> <font size='3'>Xeroxshop</font></th>
                    <th> <font size='3'>Date of Order</font></th>
                    <th> <font size='3'>Date of Print</font></th>
                    <th> <font size='3'>No. of Pages</font></th>
            </tr>
        </thead>";
$no=1;
$cnt=mysqli_num_rows($result1);
if($cnt!=0)
{
while($row1=$result1->fetch_assoc())
{
$xid=$row1["XId"];
$str="select * from xeroxshop where XId='$xid'";
$conn=mysqli_connect("localhost","root","","freephotocopycenter");
$result=$conn->query($str);
$row=$result->fetch_assoc();
$xname=$row["XName"];

      $str1.="<tr><td>".$no."</td><td>".$row1['OtpNo']."</td><td>".$xname."</td><td>".$row1["DOO"]."</td><td>".$row1["DOP"]."</td><td>".$row1["NOP"]."</td></tr>";
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
</div>


<?php
include_once("footer.php");
?>