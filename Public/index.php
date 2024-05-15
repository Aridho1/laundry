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
        
        echo "<script>alert(\"CONGRATS!!\nSucces To Add Data.\");</script>";
    } else {
        echo "<script>alert(\"ERROR!!\nUNKOWN ERROR!!!\n\nDuplicate Data.\");</script>";
        
    }
} else $_GET["button-add-pelanggan"] = null;

?>
<!DOCTYPE html>
<html lang="id">
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
  display: flex;
  flex-direction: column;
  gap: 20px;
  padding: 10px 30px;
}

.dashboard .content-type {
  display: flex;
  justify-content: space-evenly;
  padding-bottom: 5px;
  border-bottom: 1px solid black;
}


/*** Dasboard - add ***/
.dasboard .add-costumer {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

.dashboard form {
  width: 60%;
  margin: auto;
}

.dashboard form .button-group {
  display: flex;
  justify-content: end;
  padding: 5px 20px;
}

/*** Dashboard - search ***/
.dashboard .search-costumer {
  background-color: #ddd;
  border-radius: 12px;
  padding: 30px 10px;
  min-height: 100px;
  
  
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  
  
  /*
  display: grid;
  grid-template-rows: minmax(30px, 50px) minmax(350px, auto) auto;
  */
  
  gap: 15px;
  scroll-behavior: smooth;
  position: relative;
}

.dashboard .search-costumer > * {
  display: flex;
  justify-content: center;
  align-items: center;
}

.dashboard .search-costumer .data-table {
  display: block;
  
  margin: 15px auto;
  text-align: center;
}

.dashboard .search-costumer table {
  width: 500px;
}

.dashboard .search-costumer tr {
  min-height: 50px;
}

.dashboard .search-costumer tr th {
  min-width: 100px;
}

.dashboard .search-costumer tr:nth-child(odd) {
  background-color: #ccc;
  padding: 5px 8px;
  border-bottom: 0.7px solid black;
  
}

.dashboard .search-costumer div.no-result {
  position: absolute;
  
  top:0;
  right:0;
  bottom: 0;
  left: 0;
  
  background-color: violet;
  display: none;
}

/* STYLE PAGES */
.dashboard .search-costumer .pages {
  list-style: none;
  
  display: flex;
  justify-content: center;
  gap: 5px;
  
  height: 200px;
  padding: 10px 5px;
}

.dashboard .search-costumer .pages li a {
  text-decoration: none;
  border: 2px solid black;
  border-radius: 20%;
  
  width: 50px;
  height: 50px;
  
  display: flex;
  justify-content: center;
  align-items: center;
  scroll-behavior: smooth;
}

.dashboard .search-costumer .pages li a.first-page,
.dashboard .search-costumer .pages li a.previous-page,
.dashboard .search-costumer .pages li a.next-page,
.dashboard .search-costumer .pages li a.last-page {
  font-size: 0.68em;
}

.dashboard .search-costumer .previous-page {
  margin-right: 30px;
}

.dashboard .search-costumer .next-page {
  margin-left: 30px;
}

.dashboard .search-costumer a.active {
  background-color: #5558ff;
  color: white;
}

.dashboard .search-costumer a.disabled {
  pointer-event: none;
}

.dashboard .search-costumer a.smooth {
  scroll-behavior: smooth;
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
          data = "";
          if (resultType == "contents") resolve(xhr.responseText);
          else resolve(JSON.parse(xhr.responseText));
        } else {
          data = "";
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
      
        page_active = 1;
        setPagination();
        createTable();
      
    }
    
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

main({
  directory: "../App/index.php?",
  url: "url=Pelanggan/liveSearch",
  keyword: "a",
  type: "GET",
  resultType: "json"
})

multipart/form-data

application/json

application/octet-stream

application/x-www-form-urlencoded
*/

let checkbox = document.querySelector(".menu-toggle input[type=checkbox]");
let nav_links = document.querySelector("nav ul");
let nav_toggle = document.querySelector("div.menu-toggle");
nav_toggle.addEventListener("click", function() {
  nav_links.classList.toggle("slide");
});

let main_content = document.querySelector("main .content");

photo_profile_web.setAttribute("href", "Support/Img/logo-02.png");



/*** *** *** Dashboard func *** *** ***/


let goto, max_data, max_button, page_active, first_link_page, first_data_number, page_total;

let data_tabel, data_js;


//func

function setPagination() {
  console.log(data);
  console.log(typeof data);
  
  //binding bug. data int yang dimanipulasi oleh DOM malah berubah menjadi str
  max_data = parseInt(max_data);
  page_active = parseInt(page_active);
  first_link_page = parseInt(first_link_page);
  first_data_number = parseInt(first_data_number);
  page_total = parseInt(page_total);
  
  let executeCreatePagination = true;
  
  //**set Rules --filter beberapa logika.
  //max_data = 5. normalnya, ada 5 button.
  
  //gagalkan ekesuki jika : 
  
  if (page_active < 0 || page_active > page_total) {
    executeCreatePagination = false;
    console.log("reject filter page active");
  
  //jika page_total tidak melebihi max_button
  //tidak ada yang terjadi. (hanya berjalan normal)
  } else if (page_total <= max_button) {
    first_link_page = 1;
  
  //sampai sini, berarti page_total lebih dari max_button.
  //jika page_active nya tidak berada ditengah atau lebih dari itu. (tengah itu 3, karena buttonnya 5)
  //tidak ada yang terjadi. (hanya berjalan normal)
  } else if (page_active <= Math.floor(max_button / 2)) {
    first_link_page = 1;
  
  //sampai sini, berarti page_active nya lebih dari setengah max_button.
  //jika page_activenya belum berada di page hampir terakhir atau terkahir, 
  //maka button page_active harus berada di tengah.
  } else if (page_total - page_active >= Math.floor(max_button / 2)) {
    first_link_page = page_active - Math.floor(max_button / 2);
    
  //sampai sini, berarti page_active nya berada di hampir paling terkahir, atau bahkan terkahir.
  //maka button awal alias first_link_page : 
  } else if (page_total - page_active >= 0) {
    first_link_page = page_total - max_button + 1;
  
  //selain itu, maka, emmmmm buat execute false atau error
  //karena gatau lagi masuk ke kondisi apa.
  } else executeCreatePagination = false; console.log("tanpa filter");
  
  console.log("execute pagination is", executeCreatePagination);
  
  //eksekusi func createPagination jika kondisi terpenuhi
  
  if (executeCreatePagination === true) {
    createPagination();
    
  } else {
    createPagination({page_is_valid: false});
  }
  
}

function createPagination(params = {
  page_is_valid: true,
  primary_button: true,
  primary_button_lvl_2: true
}) {
  
  //inisiasi result
  let result = "";
  
  //ambil elemen dengan class pages
  let pages = document.querySelector(".pages");
  pages.innerHTML = pages.innerHTML;
  page_total = Math.ceil(data.length / max_data);
  
  
  console.log(params.page_is_valid);
  /*
  if (params.page_is_valid === false || data.length === undefined) {
    data_table.style.display = "none";
    document.querySelector("div.no-result").style.display = "flex";
    return false;
  } else {
    data_table.style.display = "block";
    document.querySelector("div.no-result").style.display = "none";
  }
  */
  
  
  // buat button berdasarkan data global.
  
  let end_for = max_button;
  
  //binding, jika page_total < max_button : 
  if (page_total < max_button) end_for = page_total;
  
  //buat button angka
  end_for += first_link_page;
  for (let i = first_link_page; i < end_for; i++) {
    
    result += `<li><a href="#${goto}" class="${checkPageActive(i, ['active disable', 'smooth'])}" data-topage="${i}">${i}</a></li>`;
    
  }
  
  //jika primary_button_lvl_2 adalah true, buat button previous dan next yang membungkus button yang sudah dibuat 
  if (params.primary_button_lvl_2 === true) {
    result = `<li><a href="#${goto}" class="previous-page ${checkPageActive(1, ['disable', 'smooth'])}" data-topage="${page_active-1}">&laquo</a></li>
      ${result}
    <li><a href="#${goto}" class="next-page ${checkPageActive(page_total, ['disable', 'smooth'])}" data-topage="${page_active+1}">&raquo</a></li>`;
  }
  
  //sama.
  if (params.primary_button === true) {
    result = `<li><a href="#${goto}" class="first-page ${checkPageActive(1, ['disable', 'smooth'])}" data-topage="1">&laquo&laquo</a></li>
      ${result}
    <li><a href="#${goto}" class="last-page ${checkPageActive(page_total, ['disable', 'smooth'])}" data-topage="${page_total}">&raquo&raquo</a></li>`;
  }
  
  
  //ubah isi elemen dengan class pages menjadi result
  pages.innerHTML = result;
  
}

function checkPageActive(binding, return_value = [true, false]) {
  /*
  return 
    (binding === page_active)
    ? return_value[0]
    : return_value[1];
  */
  
  if (binding === page_active) {
    return return_value[0];
  
  //
  } else return return_value [1];
}



function createTable(column = ["nama", "no_hp"]) {
  
  let result = "";
  
  first_data_number = (page_active - 1) * max_data;
  
  
  //untuk header / thead
  for (let i = 0; i < column.length; i++) {
    result += `<th>${column[i].toUpperCase()}</th>`;
  }
  
  result = `<tr><th>NO</th>${result}</tr>`;
  
  //binding jika total data tidak sebanyak kelipatan dari max_data
  let end_for = max_data * page_active;
  
  if (data.length < max_data * page_active) end_for = data.length;
  
  //tbody
  for (let i = first_data_number; i < end_for; i++) {
    let row = "";
    
    
    for(let ii = 0; ii < column.length; ii++) {
      row += `<td>${data[i][column[ii]]}</td>`;
      
    }
    
    row = `<tr><td>${i+1}</td>${row}</tr>`;
    result += row;
  }
  console.log(result);
  console.log(data_table);
  data_table.innerHTML = result;
  
}


/*** *** *** End Dashboard func *** *** ***/






document.addEventListener("DOMContentLoaded", function() {
  document.body.addEventListener("click", function(e) {
    
    //event request contents
    if ( e.target.tagName === "A" && e.target.closest("nav") ) {
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
    } //end event request contents
    
    
    //event close nav pada navlinks
    if (e.target === checkbox || e.target === nav_links) {
    } else {
      checkbox.checked = false; 
      nav_links.classList.remove("slide");
    }
    
    
    //** event dashboard
    //switch content type
    if ( e.target.classList.contains("switch-content") ) {
      let switch_content = e.target.innerText.toLowerCase().replace(" ", "-");
      
      document.querySelector(`.dashboard .${switch_content}`).style.display = "flex";
      document.querySelector(`.dashboard .${switch_content}`).classList.add("content-active");
      
      document.querySelector(`.dashboard .${switch_content}`).previousElementSibling.style.display = "none";
      document.querySelector(`.dashboard .${switch_content}`).previousElementSibling.classList.remove("content-active");
      
      document.querySelector(`.dashboard .${switch_content}`).nextElementSibling.style.display = "none";
      document.querySelector(`.dashboard .${switch_content}`).nextElementSibling.classList.remove("content-active");
      
      e.target.parentElement.style.display = "flex";
      
      // event binding content search
      if ( e.target.innerText === "Search Costumer" ) {
        data_table = document.querySelector(".data-table");
        // event dashboard 
        main({
          directory: "../App/index.php?",
          url: "url=Pelanggan/liveSearch",
          keyword: "",
          type: "GET",
          resultType: "json"
        });
        
        if (typeof data === "object") {
          console.log("sangat ok");
          setPagination();
          createTable();
        }
      } // end event binding content search
    } // end event switch content
    
    //event button pagination
    if ( main_content.classList.contains("dashboard") ) {
      console.log(main_content.lastElementChild);
      if (e.target.tagName === "A" && (e.target.classList.contains("disable") || e.target.classList.contains("active"))) {
        e.preventDefault();
      } else if (e.target.tagName === "A" && e.target.classList.contains("smooth")) {
        document.documentElement.style.scrollBehavior = "smooth";
          
        let to_page = e.target.dataset.topage;
        page_active = to_page;
              
        //binding error kondisi.
        //hanya di binding saat request dari button.
        if (page_active == 0) {
          page_active = 1;
        } else if (page_active > page_total) {
          page_active = page_total;
        } else setPagination(); createTable(); 
      } // end else if
    } // end event button pagination
  }); //end event delegation
  
  /*** *** *** Dashboard func *** *** ***/
  
  //**set Configure data
  goto = "content";
  max_data = 2;
  max_button = 5;
  page_active = 1;
  first_link_page = 1;
  first_data_number = 1;
  page_total = Math.ceil(data.length / max_data);
  
  
  
  
}); //end function LoadDOM


</script>
</body>
</html>
