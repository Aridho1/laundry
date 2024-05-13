<?php

if (!session_id()) session_start();

function generatRandomStr($length) {
  $char = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
  $char_length = strlen($char);
  $hash = "";
  
  for ($i = 0; $i < $length; $i++) {
    $rand = $char[rand(0, $char_length - 1)];
    
    $hash .= $rand;
  }
  
  return $hash;
}

$randStr = generatRandomStr(26);

$_SESSION["rand-str"] = $randStr;
$_SESSION["base-url"] = "http://localhost:8080/Acoding/WebLeague/Project/Laundry/";

header("location: ". $_SESSION["base-url"] ."Public/index.php");