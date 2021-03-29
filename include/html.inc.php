<?php 

function messageEdit($name,$message){
return '
<!DOCTYPE html>
<html>
<head>
<style>
body{
background:grey;
}
.wrap{
width:1000px;
margin:auto;
margin-top:100px;
}

.card{
box-shadow:0 4px 8px 0 rgba(0,0,0,0.6);
transition:0.4s;
width:800px;
background:#ffff;
text-align:center;
font-size:16px;
font-family:sans-serif;
float:left;
margin:10px;
}
.card:hover{
box-shadow:0 8px 16px 0 rgba(0,0,0,0.6);
}

.container{
padding:2px 16px;
}
p{
text-align:left;
margin-left:10px;
}

#icons{
	margin-top: 30px;
	margin-right: 10px;
}

p{
	color: green;
	margin-left: 20px;
	margin-right: 50px;
}
hr{
	height: 5px;
	background: purple;
}

</style>
</head>
<body>
<div class="wrap">

  <div class="card">
  	<img src="http://www.essaypro.website/img/cover_banner.jpg" alt="HAPPY EASTER" style="width:100%"/>
  	<p>Dear '.$name.'</p>
    '.$message.'
	<br>
	<p>Kind Regards</p>
	<hr/>
   	<div class="header">
  	<img id="b2bimage" src="http://www.essaypro.website/img/ignite.png" alt="essaypro" width="100px" height="100px" align="left" />	
  	<img id="icons" src="http://www.essaypro.website/img/facebook.png" alt="facebook" width="30px" height="30px" align="right" />	
  	<img id="icons" src="http://www.essaypro.website/img/instagram.jpg" alt="instagram" width="30px" height="30px" align="right" />
  	<img id="icons" src="http://www.essaypro.website/img/twitter.png" alt="twitter"  width="30px" height="30px" align="right" />
  	<img id="icons" src="http://www.essaypro.website/img/linkedin.jpg" alt="linkedin" width="30px" height="30px" align="right" />
  	</div>
</body>
</html>
';
}