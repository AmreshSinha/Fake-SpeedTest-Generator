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
      A script by <a href="https://amresh.ml">Amresh</a><br>
      <a href="" onclick="window.location.reload()">Click here to try another one!</a>
      ';
      }
    }
?>

<br><br>
<script type="text/javascript" src="//rf.revolvermaps.com/0/0/1.js?i=5bn2va120zp&amp;m=7&amp;s=320&amp;c=e63100" async="async"></script>

</body>
<!-- This Script is from amresh.ml, Coded by: Amresh-->

<body>
<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
var no = 50;
var speed = 1;
var ns4up = (document.layers) ? 1 : 0;
var ie4up = (document.all) ? 1 : 0;
var s, x, y, sn, cs;
var a, r, cx, cy;
var i, doc_width = 800, doc_height = 600;
if (ns4up) {
doc_width = self.innerWidth;
doc_height = self.innerHeight;
}
else
if (ie4up) {
doc_width = document.body.clientWidth;
doc_height = document.body.clientHeight;
}
x = new Array();
y = new Array();
r = new Array();
cx = new Array();
cy = new Array();
s = 8;
for (i = 0; i < no; ++ i) {
initRain();
if (ns4up) {
if (i == 0) {
document.write("<layer name=\"dot"+ i +"\" left=\"1\" ");
document.write("top=\"1\" visibility=\"show\"><font color=\"blue\">");
document.write(",</font></layer>");
}
else {
document.write("<layer name=\"dot"+ i +"\" left=\"1\" ");
document.write("top=\"1\" visibility=\"show\"><font color=\"blue\">");
document.write(",</font></layer>");
   }
}
else
if (ie4up) {
if (i == 0) {
document.write("<div id=\"dot"+ i +"\" style=\"POSITION: ");
document.write("absolute; Z-INDEX: "+ i +"; VISIBILITY: ");
document.write("visible; TOP: 15px; LEFT: 15px;\"><font color=\"blue\">");
document.write(",</font></div>");
}
else {
document.write("<div id=\"dot"+ i +"\" style=\"POSITION: ");
document.write("absolute; Z-INDEX: "+ i +"; VISIBILITY: ");
document.write("visible; TOP: 15px; LEFT: 15px;\"><font color=\"blue\">");
document.write(",</font></div>");
      }
   }
}
function initRain() {
a = 6;
r[i] = 1;
sn = Math.sin(a);
cs = Math.cos(a);
cx[i] = Math.random() * doc_width + 1;
cy[i] = Math.random() * doc_height + 1;
x[i] = r[i] * sn + cx[i];
y[i] = cy[i];
}
function makeRain() {
r[i] = 1;
cx[i] = Math.random() * doc_width + 1;
cy[i] = 1;
x[i] = r[i] * sn + cx[i];
y[i] = r[i] * cs + cy[i];
}
function updateRain() {
r[i] += s;
x[i] = r[i] * sn + cx[i];
y[i] = r[i] * cs + cy[i];
}
function raindropNS() {
for (i = 0; i < no; ++ i) {
updateRain();
if ((x[i] <= 1) || (x[i] >= (doc_width - 20)) || (y[i] >= (doc_height - 20))) {
makeRain();
doc_width = self.innerWidth;
doc_height = self.innerHeight;
}
document.layers["dot"+i].top = y[i];
document.layers["dot"+i].left = x[i];
}
setTimeout("raindropNS()", speed);
}
function raindropIE() {
for (i = 0; i < no; ++ i) {
updateRain();
if ((x[i] <= 1) || (x[i] >= (doc_width - 20)) || (y[i] >= (doc_height - 20))) {
makeRain();
doc_width = document.body.clientWidth;
doc_height = document.body.clientHeight;
}
document.all["dot"+i].style.pixelTop = y[i];
document.all["dot"+i].style.pixelLeft = x[i];
}
setTimeout("raindropIE()", speed);
}
if (ns4up) {
raindropNS();
}
else
if (ie4up) {
raindropIE();
}
//  End -->
</script>



</HTML>