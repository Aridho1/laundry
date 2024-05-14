<?php

if (!session_id()) session_start();

/*
if (isset($_POST)) var_dump($_POST); 
else echo "Post is undefined";
if (!session_id()) session_start();
if (isset($_GET)) var_dump($_GET); 
else echo "Get is undefined";
*/

require "Support/function.php";

if (isset($_GET["button-add-pelanggan"])) {
    $result = addData($_GET, "pelanggan");
    $_GET["button-add-pelanggan"] = null;
    $_GET = [];
    var_dump($result);

    if ($result["affected"] > 0) {
        print_r($result["last-data"]);

        // script("alert(\"CONGRATS!!\nSucces To Add Data.\");");
        echo "<script>alert(\"CONGRATS!!\nSucces To Add Data.\");</script>";
    } else {
        // script("alert(\"ERROR!!\nUNKOWN ERROR!!!\n\nDuplicate Data.\");");
        echo "<script>alert(\"ERROR!!\nUNKOWN ERROR!!!\n\nDuplicate Data.\");</script>";
        
    }
} else $_GET["button-add-pelanggan"] = null;

?>
<!DOCTYPE html>
<html lang="in">
<head>
  <meta charset="UTF-8">
  <title>Laundry.Moboid</title>
  
  <link rel="stylesheet" href="Support/style.css">
  <style>

/*** Home ***/
.home {
  text-align: center;
}

/*** Dashboard ***/
.dashboard {
  
}

.dashboard form table {
  
}

.dashboard form .button-group {
  
  display: flex;
  justify-content: space-between;
  padding: 5px 10px;
}

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
    <h2>Dashboard</h2>
  </header>
  <div class="content">
    <p>HELLO WORLR!</p>
  </div>
  <footer>Copyright 2024</footer>
</main>
  
<script src="//cdn.jsdelivr.net/npm/eruda"></script>
<script>eruda.init();</script>
<script src="Support/resize.js"></script>

<script>

let data = {};
let contents = "";

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
    
    let result = await fetchData(params.url, params.type, params.resultType);
    
    if (typeof result === "string") {
      contents = result;
      
      main_content.innerHTML = contents;
    } else if (result.status === true) {
      data = result.result;
    }
    console.log(result);
    
  } catch (error) {
    console.error(error);
  }
}

/*
main({
  directory: "Content/Dashboard/index.html",
  url: "",
  type: "GET",
  resultType: "contents"
});
*/
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



let checkbox = document.querySelector(".menu-toggle input[type=checkbox]");
let nav_links = document.querySelector("nav ul");
let nav_toggle = document.querySelector("div.menu-toggle");
nav_toggle.addEventListener("click", function() {
  nav_links.classList.toggle("slide");
});

let main_content = document.querySelector("main .content");

photo_profile_web.setAttribute("href", "Support/Img/logo-02.png");

document.addEventListener("DOMContentLoaded", function() {
  document.body.addEventListener("click", function(e) {
    
    
    if (e.target.tagName === "A" && e.target.closest("nav")) {
      e.preventDefault();
      document.querySelector("main header h2").innerText = e.target.innerText;
      
      
      checkbox.checked = false;
      nav_links.classList.remove("slide");
      
      main_content.classList.remove("home");
      main_content.classList.remove("dashboard");
      main_content.classList.remove("laporan");
      main_content.classList.remove("login");
      main_content.classList.remove("logout");
      
      main_content.classList.add(e.target.innerText.toLowerCase());
      
      
      main({
        directory: `Content/${e.target.innerText}/index.html`,
        url: "",
        keyword: "",
        type: "GET",
        resultType: "contents"
      });
    }
    
    if (e.target === checkbox || e.target === nav_links) {
      console.log("is");
    } else {
      checkbox.checked = false; 
      nav_links.classList.remove("slide");
      console.log("not");
    }
    
  });
  
  
  
});

</script>
</body>
</html>
