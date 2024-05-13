<?php

$base_uri = "http://localhost:8080/Acoding/WebLeague/Project/Laundry/";

/*
window.location.href = "http://localhost:8080/Acoding/WebLeague/Project/Laundry/App/index.php?url=Pelanggan/liveSearch


window.location.href = "http://localhost:8080/Acoding/WebLeague/Project/Laundry/App/index.php?url=LoadContent/contentName/
*/


define('BASEURL', $base_uri .'App/');
define('LOCAL', BASEURL .'index.php?url=');

define('DB_HOST', '0.0.0.0:3306');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'laundri_db');

require_once 'Controller/Database.php';


function getUrl() {
  $url = "";
  if (isset($_GET['url'])) {
    $url = rtrim($_GET['url'], '/');
    $url = filter_var($url, FILTER_SANITIZE_URL);
    $url = explode('/', $url);
  } 
  
  return $url;
}

function executeController() {
  $controller = "Home";
  $method = "index";
  $params = [];
  
  $url = getUrl();
  if (
    file_exists('Controller/'. $url[0] .'.php')
  ) {
    $controller = $url[0];
    unset($url[0]);
  }
  
  require_once 'Controller/'. $controller .'.php';
  $controller = new $controller;
  
  if (isset($url[1])) {
    if (method_exists($controller, $url[1])) {
      $method = $url[1];
      unset($url[1]);
    }
  }
  
  
  if (!empty($url)) {
    $params = array_values($url);
  }
  
  // jalankan controller, method, dan params jika ada
  call_user_func_array([$controller, $method], $params);
}

executeController();






echo "<script src=\"//cdn.jsdelivr.net/npm/eruda\"></script>
<script>eruda.init();</script>";