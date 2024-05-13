<?php
if (!session_id()) session_start();


if (!isset($_SESSION["rand-str"]) || $_SESSION["rand-str"] === []) header("location: ../");

$base_url = $_SESSION["base-url"];
$rand_str = $_SESSION["rand-str"];

$_SESSION["rand-str"] = [];
$_SESSION["rand-str-absolute"] = $rand_str;


echo "<script>
  let base_url = '$base_url';
  let rand_str = '$rand_str';
  console.log(rand_str);
</script>";

?>
<!DOCTYPE html>
<html lang="in">
<head>
  <meta charset="UTF-8">
  <title>Laundry.Moboid</title>
  
  <link rel="stylesheet" href="Support/style.css">
  <style>

  </style>
</head>
<body>
  
<nav>
  <div class="logo">
    <h4>Laundry.Moboid</h4>
  </div>
  
  <ul>
    <li><a href="">Home</a></li>
    <li><a href="">Dashboard</a></li>
    <li><a href="">Laporan</a></li>
    <li><a href="">Login</a></li>
    <li><a href="">Logout</a></li>
  </ul>
  
  <div class="menu-toggle">
    <input type="checkbox">
    <span></span>
    <span></span>
    <span></span>
  </div>
</nav>


<main>
  <header>
    <h2>Home</h2>
  </header>
  <div class="content home">
    <p>Halo Admin!. Selamat Datang</p>
  </div>
  <footer>Copyright 2024</footer>
</main>
  
<script src="//cdn.jsdelivr.net/npm/eruda"></script>
<script>eruda.init();</script>
<script src="Support/resize.js"></script>
<script src="Support/jQuery-3.7.0.js"></script>

<script>

let data = {};

async function fetchData(  url, type, resultType  ) {
  return new Promise((resolve, reject) => {
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4) {
        if (xhr.status == 200) {
          if (resultType == "contents") resolve(xhr.responseText);
          else resolve(JSON.parse(xhr.responseText));
        } else {
          reject("Failed to fetch data: " + xhr.status);
        }
      }
    };
    xhr.open(type, url, true);
    xhr.send();
  });
}

async function main(params = {
  directory: "../App/index.php?",
  url: "url=Pelanggan/liveSearch",
  keyword: "",
  type: "GET",
  resultType: "json"
}) {
  try {
    params.url = params.directory + params.url;
    if ( params.keyword !== "" && params.keyword !== undefined ) params.url += "/"+ params.keyword;
    
    data = await fetchData(params.url, params.type, params.resultType);
    
    if (data.status === true) {
      data = data.result;
    }
    console.log(data);
    
  } catch (error) {
    console.error(error);
  }
}

main({
  directory: "Content/Dashboard/index.html",
  url: "",
  type: "GET",
  resultType: "contents"
});

/*

multipart/form-data

application/json

application/octet-stream

application/x-www-form-urlencoded

main({
  directory: "Content/Dashboard/index.php",
  url: "",
  type: "POST"
})

*/



function call(url = "Content/Dashboard/index.php", type = "POST") {
  $.ajax({
    url: url,
    method: type,
    dataType: "json",
    success: function(result) {
      data = result;
      console.log(data);
    }
  });
}


let nav_links = document.querySelector("nav ul");
let nav_toggle = document.querySelector("div.menu-toggle");
nav_toggle.addEventListener("click", function() {
  nav_links.classList.toggle("slide");
});

photo_profile_web.setAttribute("href", "Support/Img/logo-02.png");

document.addEventListener("DOMContentLoaded", function() {
  document.body.addEventListener("click", function(e) {
    
    
    if (e.target.tagName === "A" && e.target.closest("nav")) {
      e.preventDefault();
      document.querySelector("main header h2").innerText = e.target.innerText;
      nav_links.classList.remove("slide");
    }
    
    
  });
  
  
});

</script>
</body>
</html>
