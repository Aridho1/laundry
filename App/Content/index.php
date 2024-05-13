<?php

function redirect_($url) {
  header("location: ?url=" . $url);
}

if ( isset($_GET['url']) ) {
  $folderName = $_GET['url'];
  $directory = $folderName . "/index.html";
  if ( file_exists($directory) ) {
    $contents = file_get_contents($directory);
    echo $contents;
  
  // 
  } else echo "Directory '". $directory ."' not found!";
} else redirect_("Dashboard");
