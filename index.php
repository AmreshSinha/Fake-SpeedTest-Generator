<!DOCTYPE html>
<html>
<head><title>Fake SpeedTest Gen-Amresh</title>

<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<!-- <link rel="stylesheet" href="./assets/css/style.css"> -->
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<style>
  
  #menu-toggle:checked + #menu {
        display: block;
      }

</style>
</head>
<body class="antialiased bg-gray-700">

<header class="lg:px-16 px-6 bg-white flex flex-wrap items-center lg:py-0 py-2 bg-gray-900">
    <div class="flex-1 flex justify-between items-center">
      <a href="" class="text-yellow-300 font-bold"><i class="fas fa-bolt"></i> Fake Speedtest Generator</a>
  </div>

   <label for="menu-toggle" class="pointer-cursor lg:hidden block"><svg class="fill-current text-gray-100" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><title>menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path></svg></label>
  <input class="hidden" type="checkbox" id="menu-toggle" />

  <div class="hidden lg:flex lg:items-center lg:w-auto w-full" id="menu">
    <nav>
      <ul class="lg:flex items-center justify-between text-base text-yellow-300 pt-4 lg:pt-0">
        <li><a class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-yellow-500" href="#" onClick="window.location.reload();">Home</a></li>
        <li><a class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-yellow-500" href="https://github.com/AmreshSinha/Fake-SpeedTest-Generator" target="_blank">Github</a></li>
        <li><a class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-yellow-500 lg:mb-0 mb-2" href="https://github.com/AmreshSinha" target="_blank">About</a></li>
      </ul>
    </nav>
    <a href="#" class="lg:ml-4 flex items-center justify-start lg:mb-0 mb-4 pointer-cursor">
      
    </a>

  </div>

  </header>



<?php
if(!isset($_POST['sub'])){
  echo '
  <div class="max-w-3xl bg-gray-900 rounded-lg mx-auto my-16 p-16">
    <h1 class="text-3xl font-medium text-yellow-500 mb-5">Generate real Ookla Speedtest results.</h1>
    <div class="grid grid-cols-2 gap-4 md:grid-flow-col">
      <div>
        <form action="" method="POST">
        <input type="number" placeholder="Download speed in mbps" name="down" step="0.01" style="width: 225px;" class="text-sm text-gray-base w-full 
        mr-3 py-5 px-4 h-2 border 
        border-gray-200 rounded mb-2"></input> <span class="text-yellow-500">mbps</span><br>
        <input type="number" placeholder="Upload speed in mbps" name="up" step="0.01" style="width: 225px;" class="text-sm text-gray-base w-full mr-3 
        py-5 px-4 h-2 border border-gray-200 
        rounded mb-2"></input> <span class="text-yellow-500">mbps</span><br>
        <input type="number" placeholder="Ping in ms" name="ping" style="width: 225px;" class="text-sm text-gray-base w-full mr-3 
        py-5 px-4 h-2 border border-gray-200 
        rounded mb-2"></input> <span class="text-yellow-500">ms</span><br>
        <button type="submit" value="Submit" name="sub" style="width: 225px;" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
        </form>
      </div>
      <div>
        <img src="http://speedtest.net/my-result/12039063870.png" alt="Image" />
      </div>
    </div>
  </div>


  <footer class="bg-white bg-gray-900 fixed inset-x-0 bottom-0">
    <div class="flex justify-center">
    <p class="p-4 text-yellow-300">Maintained with ❤️ by <a href="https://github.com/AmreshSinha" class="hover:underline" target="_blank">Amresh</a></p>
    </div>
  </footer>
  ';
  die();
}
$down = $_POST['down'] * 1000;  
$up = $_POST['up'] * 1000; 
$ping = $_POST['ping'];
$server = '15028';// Change Server code according to your location from here https://c.speedtest.net/speedtest-servers-static.php
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
      print '

      <div class="max-w-3xl bg-gray-900 rounded-lg mx-auto my-16 p-16">
        <h1 class="text-3xl font-medium text-yellow-500 mb-5">Here You Go!</h1>
        <div class="grid grid-rows-2">
          <div class="grid grid-cols-2 gap-4">
            <div class="text-yellow-500 flex flex-col gap-y-4">
              <div>
                <h3>DOWN: ' . $_POST['down'] . ' MbPS, UP: ' . $_POST['up'] . ' MbPS, PING: ' . $ping . ' ms</h3>
              </div>
              <div>
                <a href="http://speedtest.net/my-result/'.urldecode($param[1]) . '" target="_BLANK" class="hover:underline">' . 'http://speedtest.net/my-result/'.urldecode($param[1]) . '</a><br>
              </div>
              <div>
                <a href="http://speedtest.net/my-result/'.urldecode($param[1]) . '.png" target="_BLANK" class="hover:underline">' . 'http://speedtest.net/my-result/'.urldecode($param[1]) . '.png</a><br>
              </div>
            </div>
            <div>
              <img src="http://speedtest.net/my-result/'.urldecode($param[1]) . '.png">
            </div>
          </div>
          <div class="flex justify-center">
            <script type="text/javascript" src="//rf.revolvermaps.com/0/0/1.js?i=5bn2va120zp&amp;m=7&amp;s=320&amp;c=e63100" async="async"></script>
          </div>
        </div>
      </div>
      ';
      }
    }
?>
	
	
	
<br><br>
<!-- <script type="text/javascript" src="//rf.revolvermaps.com/0/0/1.js?i=5bn2va120zp&amp;m=7&amp;s=320&amp;c=e63100" async="async"></script> -->

<footer class="bg-white bg-gray-900 fixed inset-x-0 bottom-0">
    <div class="flex justify-center">
    <p class="p-4 text-yellow-300">Maintained with ❤️ by <a href="https://github.com/AmreshSinha" class="hover:underline" target="_blank">Amresh</a></p>
    </div>
</footer>
</body>




</HTML>
