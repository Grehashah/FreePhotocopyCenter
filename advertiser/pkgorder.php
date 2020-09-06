<?php
include_once("header.php");
?>

<?php

$advtype=$_GET['id'];
$dur="";
$packagename=$advtype;

date_default_timezone_set('Asia/Kolkata');
$currentdate=date("Y-m-d");
$currentdate1=strtotime($currentdate);

        $str2="select * from advertisetype where AdtypeName='$advtype'";
        $conn2=mysqli_connect("localhost","root","","freephotocopycenter");
        $result2=$conn2->query($str2);
        $row2=$result2->fetch_assoc();
        $advtypeid=$row2["AdtypeId"];
        $dur1=$row2["Duration"];
        $price=$row2["Price"];

        $dos=date("Y-m-d", strtotime('+1 days'));
        $doe = date('Y-m-d', strtotime('+'.$dur1.'days'));

?>

<section class="wrapper site-min-height"><div class="col-lg-12 mt">
  <form  method="post" enctype="multipart/form-data" action=<?php echo "http://localhost/freephotocopycenter/paytm/PaytmKit/pgRedirect.php?type=$advtype&id=$aid" ?>>
               <div class="row content-panel">
            <div class="col-lg-10 col-lg-offset-1">
              <div class="invoice-body">
                <div class="pull-left">
                  <h1>Free PhotoCopy Center</h1>
                  <address>
                <strong>Aakash Infotech</strong><br>
                795 Platinum Plaza,Memnagar<br>
                Ahemedabad, 380052<br>
                P : (+91) 8401529943
                    <br>
                    <br> 
              </address>
                </div>
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width:60px" class="text-center">Sr.no</th>
                      <th class="text-left">Package Name</th>
                      <th style="width:150px" class="text-right">Date Of Start</th>
                      <th style="width:150px" class="text-right">Date Of End</th>
                      <th style="width:100px" class="text-right">Price</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="text-center">1</td>
                      <td><?php echo $packagename; ?></td>
                      <td class="text-right"><?php echo $dos; ?></td>
                      <td class="text-right"><?php echo $doe; ?></td>
                      <td class="text-right"><?php echo "₹ ".$price; ?></td>
                    </tr>
                    <tr>
                      <td colspan="3" rowspan="4">
                        </td>
                      <td class="text-right no-border">
                        <div class="well well-small green"><strong>Total</strong></div>
                      </td>
                      <td class="text-right"><strong><?php echo "₹ ".$price ?></strong></td>
                    </tr>
                  </tbody>
                </table>
               <br>
                <br>
             

                <div Align='Center'>
                <input class="btn btn-primary btn-lg" type="submit" name="btnmp" value="Make Payment" onclick="">
              </div>
          
           </div>
         </div>
       </form>
     </div>
   </section>

</section>

<?php
include_once("footer.php");
?>