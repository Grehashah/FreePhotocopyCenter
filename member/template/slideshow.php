<div class="main">
<div class="c1" style=" 
  width:870px;
  height:500px;
  margin-top:150px;
  float:left;">
  <img src="img\portfolio\port01.jpg" class="myslides"
    style="width:950px; height:400px; margin-left:400px"/>
  <img src="img\portfolio\port02.jpg" class="myslides"
    style="width:950px; height:400px; margin-left:400px"/>
  <img src="img\portfolio\port03.jpg" class="myslides"
    style="width:950px; height:400px; margin-left:400px"/>
  <img src="img\portfolio\port04.jpg" class="myslides"
    style="width:950px; height:400px; margin-left:400px"/>
  <img src="img\portfolio\port05.jpg" class="myslides"
    style="width:950px; height:400px; margin-left:400px"/>
  </div>
  
  <script>
  var myindex=0;
  carousel();
  
  function carousel()
  {
    var i;
    var x=document.getElementsByClassName("myslides");
    for(i=0;i<x.length;i++)
    {
      x[i].style.display="none";
    }
    myindex++;
    if(myindex > x.length)
    {
      myindex=1;
    }
    x[myindex-1].style.display="block";
    setTimeout(carousel,3000);
  }
  </script>
</div>