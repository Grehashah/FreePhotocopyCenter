<?php
include_once("header.php");
?>

<?php
$silverno=0;
$goldno=0;
$diamondno=0;
$noxs=0;
$nomem=0;
$noadv=0;
$dop="";
$sjan=0;
$sfeb=0;
$smar=0;
$sapr=0;
$smay=0;
$sjun=0;
$sjul=0;
$saug=0;
$ssep=0;
$soct=0;
$snov=0;
$sdec=0;
$gt=0;
$y="";
$dos="";
$ssjan=0;
$ssfeb=0;
$ssmar=0;
$ssapr=0;
$ssmay=0;
$ssjun=0;
$ssjul=0;
$ssaug=0;
$sssep=0;
$ssoct=0;
$ssnov=0;
$ssdec=0;
$gtstock=0;
$doa="";
$ijan=0;
$ifeb=0;
$imar=0;
$iapr=0;
$imay=0;
$ijun=0;
$ijul=0;
$iaug=0;
$isep=0;
$ioct=0;
$inov=0;
$idec=0;
$gtincome=0;
$dog="";
$ejan=0;
$efeb=0;
$emar=0;
$eapr=0;
$emay=0;
$ejun=0;
$ejul=0;
$eaug=0;
$esep=0;
$eoct=0;
$enov=0;
$edec=0;
$gtexp=0;
$doo="";
$ojan=0;
$ofeb=0;
$omar=0;
$oapr=0;
$omay=0;
$ojun=0;
$ojul=0;
$oaug=0;
$osep=0;
$ooct=0;
$onov=0;
$odec=0;
$gtotp=0;

date_default_timezone_set('Asia/Kolkata');
$currentdate=date("Y-m-d");
$currentdate1=strtotime($currentdate);
$y=date("Y",$currentdate1);
$m=date("m",$currentdate1);

//Package selection
$str="select * from advertiseradvertise,advertiser where advertiseradvertise.AdvId=advertiser.AdvId and AdtypeId=1"; 
$conn=mysqli_connect("localhost","root","","freephotocopycenter");
$result=$conn->query($str);
while($row=$result->fetch_assoc())
{
  $silverno++;
}

$str="select * from advertiseradvertise,advertiser where advertiseradvertise.AdvId=advertiser.AdvId and AdtypeId=2"; 
$conn=mysqli_connect("localhost","root","","freephotocopycenter");
$result=$conn->query($str);
while($row=$result->fetch_assoc())
{
  $goldno++;
}

$str="select * from advertiseradvertise,advertiser where advertiseradvertise.AdvId=advertiser.AdvId and AdtypeId=3"; 
$conn=mysqli_connect("localhost","root","","freephotocopycenter");
$result=$conn->query($str);
while($row=$result->fetch_assoc())
{
  $diamondno++;
}

//User Count
$str1="select * from xeroxshop";
$conn1=mysqli_connect("localhost","root","","freephotocopycenter");
$result1=$conn1->query($str1);

while($row1=$result1->fetch_assoc())
{
  $noxs++;
}

$str2="select * from advertiser";
$conn2=mysqli_connect("localhost","root","","freephotocopycenter");
$result2=$conn2->query($str2);

while($row2=$result2->fetch_assoc())
{
  $noadv++;
}

$str3="select * from member";
$conn3=mysqli_connect("localhost","root","","freephotocopycenter");
$result3=$conn3->query($str3);

while($row3=$result3->fetch_assoc())
{
  $nomem++;
}

//No. of Copies

$str2="select * from otp";
$conn2=mysqli_connect("localhost","root","","freephotocopycenter");
$result2=$conn2->query($str2);

while($row2=$result2->fetch_assoc())
{

  $dop1=$row2["DOP"];
  $dop=strtotime($row2["DOP"]);
  $year=date("Y",$dop);
  $month=date("m",$dop);

  if($year==$y && $month==1)
  {  
      $sjan+=$row2["NOP"];
  }
  elseif($year==$y && $month==2)
  {  
      $sfeb+=$row2["NOP"];
  }
  elseif($year==$y && $month==3)
  {  
      $smar+=$row2["NOP"];
  }
  elseif($year==$y && $month==4)
  {  
      $sapr+=$row2["NOP"];
  }
  elseif($year==$y && $month==5)
  {  
      $smay+=$row2["NOP"];
  }
  elseif($year==$y && $month==6)
  {  
      $sjun+=$row2["NOP"];
  }
  elseif($year==$y && $month==7)
  {  
      $sjul+=$row2["NOP"];
  }
  elseif($year==$y && $month==8)
  {  
      $saug+=$row2["NOP"];
  }
  elseif($year==$y && $month==9)
  {  
      $ssep+=$row2["NOP"];
  }
elseif($year==$y && $month==10)
  {  
      $soct+=$row2["NOP"];
  }
elseif($year==$y && $month==11)
  {  
      $snov+=$row2["NOP"];
  }
elseif($year==$y && $month==12)
  {  
      $sdec+=$row2["NOP"];
  }
  $gt=$sjan+$sfeb+$smar+$sapr+$smay+$sjun+$sjul+$saug+$ssep+$soct+$snov+$sdec;
}


//Stock Allotment

$str6="select * from stock";
$conn6=mysqli_connect("localhost","root","","freephotocopycenter");
$result6=$conn6->query($str6);
while($row6=$result6->fetch_assoc())
{
  $dos1=$row6["DOS"];
  $dos=strtotime($row6["DOS"]);
  $year2=date("Y",$dos);
  $month2=date("m",$dos);

  if($year2==$y && $month2==1)
  {  
      $ssjan+=$row6["QtyGiven"];
  }
  elseif($year2==$y && $month2==2)
  {  
      $ssfeb+=$row6["QtyGiven"];
  }
  elseif($year2==$y && $month2==3)
  {  
      $ssmar+=$row6["QtyGiven"];
  }
  elseif($year2==$y && $month2==4)
  {  
      $ssapr+=$row6["QtyGiven"];
  }
  elseif($year2==$y && $month2==5)
  {  
      $ssmay+=$row6["QtyGiven"];
  }
  elseif($year2==$y && $month2==6)
  {  
      $ssjun+=$row6["QtyGiven"];
  }
  elseif($year2==$y && $month2==7)
  {  
      $ssjul+=$row6["QtyGiven"];
  }
  elseif($year2==$y && $month2==8)
  {  
      $ssaug+=$row6["QtyGiven"];
  }
  elseif($year2==$y && $month2==9)
  {  
      $sssep+=$row6["QtyGiven"];
  }
elseif($year2==$y && $month2==10)
  {  
      $ssoct+=$row6["QtyGiven"];
  }
elseif($year2==$y && $month2==11)
  {  
      $ssnov+=$row6["QtyGiven"];
  }
elseif($year2==$y && $month2==12)
  {  
      $ssdec+=$row6["QtyGiven"];
  }
  $gtstock=$ssjan+$ssfeb+$ssmar+$ssapr+$ssmay+$ssjun+$ssjul+$ssaug+$sssep+$ssoct+$ssnov+$ssdec;
}

//Coupons

$str4="select * from otp";
$conn4=mysqli_connect("localhost","root","","freephotocopycenter");
$result4=$conn4->query($str4);
while($row4=$result4->fetch_assoc())
{

  $doo1=$row4["DOP"];
  $doo=strtotime($row4["DOP"]);
  $year1=date("Y",$doo);
  $month1=date("m",$doo);

  if($year1==$y && $month1==1)
  {  
      $ojan++;
  }
  elseif($year1==$y && $month1==2)
  {  
      $ofeb++;
  }
  elseif($year1==$y && $month1==3)
  {  
      $omar++;
  }
  elseif($year1==$y && $month1==4)
  {  
      $oapr++;
  }
  elseif($year1==$y && $month1==5)
  {  
      $omay++;
  }
  elseif($year1==$y && $month1==6)
  {  
      $ojun++;
  }
  elseif($year1==$y && $month1==7)
  {  
      $ojul++;
  }
  elseif($year1==$y && $month1==8)
  {  
      $oaug++;
  }
  elseif($year1==$y && $month1==9)
  {  
      $osep++;
  }
elseif($year1==$y && $month1==10)
  {  
      $ooct++;
  }
elseif($year1==$y && $month1==11)
  {  
      $onov++;
  }
elseif($year1==$y && $month1==12)
  {  
      $odec++;
  }
  $gtotp=$ojan+$ofeb+$omar+$oapr+$omay+$ojun+$ojul+$oaug+$osep+$ooct+$onov+$odec;
}

//Income

$str="select * from paymentincome";
$conn=mysqli_connect("localhost","root","","freephotocopycenter");
$result=$conn->query($str);
while($row=$result->fetch_assoc())
{
  $doa1=$row["DOA"];
  $doa=strtotime($row["DOA"]);
  $year3=date("Y",$doa);
  $month3=date("m",$doa);

  if($year3==$y && $month3==1)
  {  
      $ijan+=$row["Amt"];
  }
  elseif($year3==$y && $month3==2)
  {  
      $ifeb+=$row["Amt"];
  }
  elseif($year3==$y && $month3==3)
  {  
      $imar+=$row["Amt"];
  }
  elseif($year3==$y && $month3==4)
  {  
      $iapr+=$row["Amt"];
  }
  elseif($year3==$y && $month3==5)
  {  
      $imay+=$row["Amt"];
  }
  elseif($year3==$y && $month3==6)
  {  
      $ijun+=$row["Amt"];
  }
  elseif($year3==$y && $month3==7)
  {  
      $ijul+=$row["Amt"];
  }
  elseif($year3==$y && $month3==8)
  {  
      $iaug+=$row["Amt"];
  }
  elseif($year3==$y && $month3==9)
  {  
      $isep+=$row["Amt"];
  }
  elseif($year3==$y && $month3==10)
  {  
      $ioct+=$row["Amt"];
  }
  elseif($year3==$y && $month3==11)
  {  
      $inov+=$row["Amt"];
  }
  elseif($year3==$y && $month3==12)
  {  
      $idec+=$row["Amt"];
  }
  $gtincome=$ijan+$ifeb+$imar+$iapr+$imay+$ijun+$ijul+$iaug+$isep+$ioct+$inov+$idec;
}

//Expense

$str="select * from paymentxerox";
$conn=mysqli_connect("localhost","root","","freephotocopycenter");
$result=$conn->query($str);
while($row=$result->fetch_assoc())
{
  $dog1=$row["DOG"];
  $dog=strtotime($row["DOG"]);
  $year4=date("Y",$dog);
  $month4=date("m",$dog);

  if($year4==$y && $month4==1)
  { 
      $ejan+=$row["Amt"];
  }
  elseif($year4==$y && $month4==2)
  {  
      $efeb+=$row["Amt"];
  }
  elseif($year4==$y && $month4==3)
  {  
      $emar+=$row["Amt"];
  }
  elseif($year4==$y && $month4==4)
  {  
      $eapr+=$row["Amt"];
  }
  elseif($year4==$y && $month4==5)
  {  
      $emay+=$row["Amt"];
  }
  elseif($year4==$y && $month4==6)
  {  
      $ejun+=$row["Amt"];
  }
  elseif($year4==$y && $month4==7)
  {  
      $ejul+=$row["Amt"];
  }
  elseif($year4==$y && $month4==8)
  {  
      $eaug+=$row["Amt"];
  }
  elseif($year4==$y && $month4==9)
  {  
      $esep+=$row["Amt"];
  }
  elseif($year4==$y && $month4==10)
  {  
      $eoct+=$row["Amt"];
  }
  elseif($year4==$y && $month4==11)
  {  
      $enov+=$row["Amt"];
  }
  elseif($year4==$y && $month4==12)
  {  
      $edec+=$row["Amt"];
  }
  $gtexp=$ejan+$efeb+$emar+$eapr+$emay+$ejun+$ejul+$eaug+$esep+$eoct+$enov+$edec;
}


?>

<section class="wrapper site-min-height">
  <div class='row mt'>
          <div class="col-md-12">
            <div class="content-panel">
	<form name='frm' method="post">
   <br>
              <font size="5">&nbsp;&nbsp;<i class="fa fa-angle-right"></i> <b> Full Report of Free PhotoCopy Center</b></font><hr>

       <div class="row mt">
      <div class='col-lg-6'>

              <font size="4">&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-right"></i> <b> Package Selection</b></font>
       
      <div id="package" style="height: 250px;"></div>
      </div>

      <div class='col-lg-6'>
        <font size="4">&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-right"></i> <b> Users Count</b></font>
       
      <div id="usercount" style="height: 250px;"></div>
      </div>
    </div>
              <br><br><br>
              <font size="4">&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-right"></i> <b> No. of Copies</b></font><br>
       
      <div id="noofcopies" style="height: 250px;"></div><br>
 <h4 align='center'> Total No. of Photocopies made in year <?php echo $y ." : ". $gt; ?></h4><br><br>
       
               
              <font size="4">&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-right"></i> <b> Stock Allotment</b></font><br>
       
      <div id="stock" style="height: 250px;"></div>
      <br>
      <h4 align='center'> Total Stock Alloted in year <?php echo $y ." : ". $gtstock; ?></h4><br><br>

        <font size="4">&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-right"></i> <b> No. of Coupons</b></font><br>
      
      <div id="coupons" style="height: 250px;"></div>
      <br>
      <h4 align='center'> Total No. of Coupons Varify in year <?php echo $y ." : ". $gtotp; ?></h4><br><br>


          <div class="row mt">
      <div class='col-lg-6'>

              <font size="4">&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-right"></i> <b> Income</b></font><br>
       
      <div id="income" style="height: 250px;"></div><br><h4 align='center'> Total Income in year <?php echo $y ." : ". '₹ '.$gtincome; ?></h4><br>
      </div>


      <div class='col-lg-6'>
        <font size="4">&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-right"></i> <b> Expense</b></font>
       <br>

      <div id="expense" style="height: 250px;"></div><br><h4 align='center'> Total Expense in year <?php echo $y ." : ". '₹ '.$gtexp; ?></h4><br>
      </div>
    </div>

</div>
    </form>
  </div>
</div>
</div>
</section>

 <script>
 Morris.Donut({
  element: 'package',
  data: [
    {value: <?php echo $silverno ?>, label: 'Silver'},
    {value: <?php echo $goldno ?>, label: 'Gold'},
    {value: <?php echo $diamondno ?>, label: 'Diamond'},
   ],
  formatter: function (x) { return x}
}).on('click', function(i, row){
  console.log(i, row);
});


Morris.Donut({
  element: 'usercount',
  data: [
    {value: <?php echo $nomem ?>, label: 'Members'},
    {value: <?php echo $noadv ?>, label: 'Advertisers'},
    {value: <?php echo $noxs ?>, label: 'Xeroxshops'},
   ],
  formatter: function (x) { return x}
}).on('click', function(i, row){
  console.log(i, row);
});


Morris.Bar({
  element: 'noofcopies',
  data: [
    {x: 'Jan', y: <?php echo $sjan ?>},
    {x: 'Feb', y: <?php echo $sfeb ?>},
    {x: 'Mar', y: <?php echo $smar ?>},
    {x: 'Apr', y: <?php echo $sapr ?>},
    {x: 'May', y: <?php echo $smay ?>},
    {x: 'Jun', y: <?php echo $sjun ?>},
    {x: 'Jul', y: <?php echo $sjul ?>},
    {x: 'Aug', y: <?php echo $saug ?>},
    {x: 'Sep', y: <?php echo $ssep ?>},
    {x: 'Oct', y: <?php echo $soct ?>},
    {x: 'Nov', y: <?php echo $snov ?>},
    {x: 'Dec', y: <?php echo $sdec ?>}
  ],
  xkey: 'x',
  ykeys: ['y'],
  labels: ['Y']
}).on('click', function(i, row){
  console.log(i, row);
});

Morris.Bar({
  element: 'stock',
  data: [
    {x: 'Jan', y: <?php echo $ssjan ?>},
    {x: 'Feb', y: <?php echo $ssfeb ?>},
    {x: 'Mar', y: <?php echo $ssmar ?>},
    {x: 'Apr', y: <?php echo $ssapr ?>},
    {x: 'May', y: <?php echo $ssmay ?>},
    {x: 'Jun', y: <?php echo $ssjun ?>},
    {x: 'Jul', y: <?php echo $ssjul ?>},
    {x: 'Aug', y: <?php echo $ssaug ?>},
    {x: 'Sep', y: <?php echo $sssep ?>},
    {x: 'Oct', y: <?php echo $ssoct ?>},
    {x: 'Nov', y: <?php echo $ssnov ?>},
    {x: 'Dec', y: <?php echo $ssdec ?>}
  ],
  xkey: 'x',
  ykeys: ['y'],
  labels: ['Y']
}).on('click', function(i, row){
  console.log(i, row);
});

Morris.Bar({
  element: 'coupons',
  data: [
    {x: 'Jan', y: <?php echo $ojan ?>},
    {x: 'Feb', y: <?php echo $ofeb ?>},
    {x: 'Mar', y: <?php echo $omar ?>},
    {x: 'Apr', y: <?php echo $oapr ?>},
    {x: 'May', y: <?php echo $omay ?>},
    {x: 'Jun', y: <?php echo $ojun ?>},
    {x: 'Jul', y: <?php echo $ojul ?>},
    {x: 'Aug', y: <?php echo $oaug ?>},
    {x: 'Sep', y: <?php echo $osep ?>},
    {x: 'Oct', y: <?php echo $ooct ?>},
    {x: 'Nov', y: <?php echo $onov ?>},
    {x: 'Dec', y: <?php echo $odec ?>}
  ],
  xkey: 'x',
  ykeys: ['y'],
  labels: ['Y']
}).on('click', function(i, row){
  console.log(i, row);
});

var income_data = [
  {"elapsed": "Jan", "value": <?php echo $ijan; ?>},
  {"elapsed": "Feb", "value": <?php echo $ifeb; ?>},
  {"elapsed": "Mar", "value": <?php echo $imar; ?>},
  {"elapsed": "Apr", "value": <?php echo $iapr; ?>},
  {"elapsed": "May", "value": <?php echo $imay; ?>},
  {"elapsed": "Jun", "value": <?php echo $ijun; ?>},
  {"elapsed": "Jul", "value": <?php echo $ijul; ?>},
  {"elapsed": "Aug", "value": <?php echo $iaug; ?>},
  {"elapsed": "Sep", "value": <?php echo $isep; ?>},
  {"elapsed": "Oct", "value": <?php echo $ioct; ?>},
  {"elapsed": "Nov", "value": <?php echo $inov; ?>},
  {"elapsed": "Dec", "value": <?php echo $idec; ?>}
];
Morris.Line({
  element: 'income',
  data: income_data,
  xkey: 'elapsed',
  ykeys: ['value'],
  labels: ['value'],
  parseTime: false
});

var expense_data = [
  {"elapsed": "Jan", "value": <?php echo $ejan; ?>},
  {"elapsed": "Feb", "value": <?php echo $efeb; ?>},
  {"elapsed": "Mar", "value": <?php echo $emar; ?>},
  {"elapsed": "Apr", "value": <?php echo $eapr; ?>},
  {"elapsed": "May", "value": <?php echo $emay; ?>},
  {"elapsed": "Jun", "value": <?php echo $ejun; ?>},
  {"elapsed": "Jul", "value": <?php echo $ejul; ?>},
  {"elapsed": "Aug", "value": <?php echo $eaug; ?>},
  {"elapsed": "Sep", "value": <?php echo $esep; ?>},
  {"elapsed": "Oct", "value": <?php echo $eoct; ?>},
  {"elapsed": "Nov", "value": <?php echo $enov; ?>},
  {"elapsed": "Dec", "value": <?php echo $edec; ?>}
];
Morris.Line({
  element: 'expense',
  data: expense_data,
  xkey: 'elapsed',
  ykeys: ['value'],
  labels: ['value'],
  parseTime: false
});
  </script>  


<?php
include_once("footer.php");
?>