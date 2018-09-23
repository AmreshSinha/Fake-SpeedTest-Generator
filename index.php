<HTML>
<head><title>Fake SpeedTest Gen-Amresh</title>
</head>
<body>
<?php
if(!isset($_POST['sub'])){
  echo '
  <h1>Generate real Ookla Speedtest results.</h1>
  <form action="" method="POST">
  <input type="number" placeholder="Download speed in mbps" name="down" step="0.01" style="width: 175px;"></input> mbps<br>
  <input type="number" placeholder="Upload speed in mbps" name="up" step="0.01" style="width: 175px;"></input> mbps<br>
  <input type="number" placeholder="Ping in ms" name="ping" style="width: 175px;"></input> ms<br>
  <button type="submit" value="Submit" name="sub" style="width: 175px;">Submit</button>
  ';
  die();
}
$down = $_POST['down'] * 1000;  
$up = $_POST['up'] * 1000; 
$ping = $_POST['ping'];
$server = '3729';
$accuracy = 8;
$hash = md5("$ping-$up-$down-297aae72");
$headers = Array(
      'POST /api/api.php HTTP/1.1',
      'Host: www.speedtest.net',
      'User-Agent: DrWhat Speedtest',
      'Content-Type: application/x-www-form-urlencoded',
      'Origin: http://c.speedtest.net',
      'Referer: http://c.speedtest.net/flash/speedtest.swf',
      'Cookie: PLACE YOUR COOKIE HERE',
      'Connection: Close'
    );
    $post = "startmode=recommendedselect&promo=&upload=$up&accuracy=$accuracy&recommendedserverid=$server&serverid=$server&ping=$ping&hash=$hash&download=$down";
    //$post = urlencode($post);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://www.speedtest.net/api/api.php');
    curl_setopt($ch, CURLOPT_ENCODING, "" );
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);
    $data = curl_exec($ch);
    foreach (explode('&', $data) as $chunk) {
      $param = explode("=", $chunk);
      if (urldecode($param[0])== "resultid"){
      print '<h1>Result generated</h1>
      <h3>DOWN: ' . $_POST['down'] . 'mbps, UP: ' . $_POST['up'] . 'mbps, PING: ' . $ping . '</h3>
      <a href="http://beta.speedtest.net/my-result/'.urldecode($param[1]) . '" target="_BLANK">' . 'http://beta.speedtest.net/my-result/'.urldecode($param[1]) . '</a> (Opens in new tab) <br>
      <a href="http://beta.speedtest.net/my-result/'.urldecode($param[1]) . '.png" target="_BLANK">' . 'http://beta.speedtest.net/my-result/'.urldecode($param[1]) . '.png</a> (Image Opens in new tab) <br>
      A script by <a href="https://github.com/jtay" target=_blank>Jaydon Taylor</a> and Modified and Customised by <a href="https://post4vps.com/user-1044.html">Amresh</a><br>
      <a href="" onclick="window.location.reload()">Click here to try another one!</a>
      ';
      }
    }
?>
	
	
	
<br><br>
<script type="text/javascript" src="//rf.revolvermaps.com/0/0/1.js?i=5bn2va120zp&amp;m=7&amp;s=320&amp;c=e63100" async="async"></script>


	



<script>
// Set the number of snowflakes (more than 30 - 40 not recommended)
var snowmax=35

// Set the colors for the snow. Add as many colors as you like
var snowcolor=new Array("#aaaacc","#ddddFF","#ccccDD")

// Set the fonts, that create the snowflakes. Add as many fonts as you like
var snowtype=new Array("Arial Black","Arial Narrow","Times","Comic Sans MS")

// Set the letter that creates your snowflake (recommended:*)
var snowletter="*"

// Set the speed of sinking (recommended values range from 0.3 to 2)
var sinkspeed=0.6

// Set the maximal-size of your snowflaxes
var snowmaxsize=22

// Set the minimal-size of your snowflaxes
var snowminsize=8

// Set the snowing-zone
// Set 1 for all-over-snowing, set 2 for left-side-snowing 
// Set 3 for center-snowing, set 4 for right-side-snowing
var snowingzone=3

///////////////////////////////////////////////////////////////////////////
// CONFIGURATION ENDS HERE
///////////////////////////////////////////////////////////////////////////


// Do not edit below this line
var snow=new Array()
var marginbottom
var marginright
var timer
var i_snow=0
var x_mv=new Array();
var crds=new Array();
var lftrght=new Array();
var browserinfos=navigator.userAgent 
var ie5=document.all&&document.getElementById&&!browserinfos.match(/Opera/)
var ns6=document.getElementById&&!document.all
var opera=browserinfos.match(/Opera/)  
var browserok=ie5||ns6||opera

function randommaker(range) {		
	rand=Math.floor(range*Math.random())
    return rand
}

function initsnow() {
	if (ie5 || opera) {
		marginbottom = document.body.clientHeight
		marginright = document.body.clientWidth
	}
	else if (ns6) {
		marginbottom = window.innerHeight
		marginright = window.innerWidth
	}
	var snowsizerange=snowmaxsize-snowminsize
	for (i=0;i<=snowmax;i++) {
		crds[i] = 0;                      
    	lftrght[i] = Math.random()*15;         
    	x_mv[i] = 0.03 + Math.random()/10;
		snow[i]=document.getElementById("s"+i)
		snow[i].style.fontFamily=snowtype[randommaker(snowtype.length)]
		snow[i].size=randommaker(snowsizerange)+snowminsize
		snow[i].style.fontSize=snow[i].size
		snow[i].style.color=snowcolor[randommaker(snowcolor.length)]
		snow[i].sink=sinkspeed*snow[i].size/5
		if (snowingzone==1) {snow[i].posx=randommaker(marginright-snow[i].size)}
		if (snowingzone==2) {snow[i].posx=randommaker(marginright/2-snow[i].size)}
		if (snowingzone==3) {snow[i].posx=randommaker(marginright/2-snow[i].size)+marginright/4}
		if (snowingzone==4) {snow[i].posx=randommaker(marginright/2-snow[i].size)+marginright/2}
		snow[i].posy=randommaker(2*marginbottom-marginbottom-2*snow[i].size)
		snow[i].style.left=snow[i].posx
		snow[i].style.top=snow[i].posy
	}
	movesnow()
}

function movesnow() {
	for (i=0;i<=snowmax;i++) {
		crds[i] += x_mv[i];
		snow[i].posy+=snow[i].sink
		snow[i].style.left=snow[i].posx+lftrght[i]*Math.sin(crds[i]);
		snow[i].style.top=snow[i].posy
		
		if (snow[i].posy>=marginbottom-2*snow[i].size || parseInt(snow[i].style.left)>(marginright-3*lftrght[i])){
			if (snowingzone==1) {snow[i].posx=randommaker(marginright-snow[i].size)}
			if (snowingzone==2) {snow[i].posx=randommaker(marginright/2-snow[i].size)}
			if (snowingzone==3) {snow[i].posx=randommaker(marginright/2-snow[i].size)+marginright/4}
			if (snowingzone==4) {snow[i].posx=randommaker(marginright/2-snow[i].size)+marginright/2}
			snow[i].posy=0
		}
	}
	var timer=setTimeout("movesnow()",50)
}

for (i=0;i<=snowmax;i++) {
	document.write("<span id='s"+i+"' style='position:absolute;top:-"+snowmaxsize+"'>"+snowletter+"</span>")
}
if (browserok) {
	window.onload=initsnow
}
</script>


</body>




</HTML>
