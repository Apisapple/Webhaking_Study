<?php
//   if(!isset($_GET['url'])){
//     header('Location: /?url=https://google.com');
//   }
  $url = $_GET['url'];
  $blacklist = array('@', '#', '\n', '\r', '%0a', '%0d', '%00','file://', 'glob://', 'dict://', 'gopher://', 'imap://', 'ldap://', 'pop3://', 'smb://', 'smbs://', 'smtp://', 'smtps://', 'telnet://', 'tftp://', 'rtmp://', 'rtsp://', 'scp://', 'sftp://', 'ftp://', 'pop3://');
  foreach($blacklist as $black){
    if(stripos($url, $black)){
      die("Filtered XD");
    }
  }

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  $output = curl_exec($ch);
  echo $output;
  curl_close($ch);
?>


<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Input Live Style Changer</title>  
      <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <body>
 <div id="namer">
  <div id="namer-input">
   <input type="text" name="url" placeholder="Input your URL">
  </div>
  <div class="namer-controls">
   <div><span>serious</span></div>
   <div><span>modern</span></div>
   <div><span>cheeky</span></div>
  </div>
 </div>

	
<a id="hastylink" target="_blank" href="https://www.wp-hasty.com/">Are you a WordPress developer?<br>Then click to check out my latest project Hasty!</a>
</body>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>
