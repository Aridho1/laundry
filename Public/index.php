<?php
if (!session_id()) session_start();
?>

<script>
  let is_login = false;
</script>

<?php

if ( isset($_SESSION["isLogin"]) ) {
  if ( $_SESSION["isLogin"] === true ) {
    echo "<script>is_login = 'isLogin';</script>";
  } 
}

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
  osition: relative;
}

.dashboard .content-type {
  display: flex;
  justify-content: space-evenly;
  padding-bottom: 5px;
  border-bottom: 1px solid black;
}


/*** Dasboard - add ***/
.dasboard .add-costumer,
.dasboard .add-order {
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
.dashboard .search-costumer,
.dashboard .search-order {
  background-color: #ddd;
  border-radius: 12px;
  padding: 30px 10px;
  min-height: 100px;
  
  display: flex;
  flex-direction: column;
  
  /*
  display: grid;
  grid-template-columns: 1fr;
  grid-template-rows: 100px 1fr 80px 80px;
  place-items: end; 
  */
  
  gap: 15px;
  scroll-behavior: smooth;
  position: relative;
}

.dashboard .search-costumer > *,
.dashboard .search-order > * {
  display: flex;
  justify-content: center;
  align-items: center;
}

.dashboard .search-costumer .data-table,
.dashboard .search-order .data-table {
  display: block;
  
  margin: 15px auto;
  text-align: center;
  font-size: 0.8em;
}

.dashboard #table-costumer,
.dashboard #table-order {
  width: 100%;
  margin: auto;
}

.dashboard tr {
  min-height: 50px;
}

.dashboard tr th {
  /*min-width: 80px;*/
  padding: 5px;
}

.dashboard .search-costumer tr:nth-child(odd),
.dashboard .search-order tr:nth-child(odd) {
  background-color: #ccc;
  padding: 5px 8px;
  border-bottom: 0.7px solid black;
  
}

.dashboard div.no-result {
  position: absolute;
  margin: 100px 0 0 0;
  padding: 0 40px;
  /* top:0;
  right:0;
  bottom: 0;
  left: 0; */
  
  display: none;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  font-size: 1.2em;
  row-gap: 20px;
}

/*** Dashboard - add order ***/
.dashboard .add-order .form-no-permission {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  gap: 10px;
  
  text-align: center;
  margin: auto;
}

/*** Dashboard -- search-order search-group ***/
.dashboard .search-order .search-group {
  display: flex;
  justify-content: space-evenly;
  align-items: start;
  flex-wrap: wrap;
  /*background-color: violet;*/
}

.dashboard .search-order .search-group .search-group-order {
  width: 30%;
  /*border: 1px solid black;*/
}

.dashboard .search-order .search-group .search-group-order.enam {
  display: flex;
}

.dashboard .search-order .search-group .search-order-by-date {
  display: none;
  justify-content: space-between;
  margin: 10px 0 0 0;
}

/* STYLE PAGES */
.dashboard .pages {
  list-style: none;
  
  display: flex;
  justify-content: center;
  gap: 5px;
  
  height: 200px;
  padding: 10px 5px;
}

.dashboard .pages li a {
  text-decoration: none;
  border: 2px solid black;
  border-radius: 20%;
  
  width: 30px;
  height: 30px;
  
  display: flex;
  justify-content: center;
  align-items: center;
  scroll-behavior: smooth;
}

.dashboard .pages li a.first-page,
.dashboard .pages li a.previous-page,
.dashboard .pages li a.next-page,
.dashboard .pages li a.last-page {
  font-size: 0.68em;
}

.dashboard .previous-page {
  margin-right: 30px;
}

.dashboard .next-page {
  margin-left: 30px;
}

.dashboard a.active {
  background-color: #5558ff;
  color: white;
}

.dashboard a.disabled {
  pointer-events: none;
}

.dashboard a.smooth {
  scroll-behavior: smooth;
}

/*** Dashboard - change data ***/

.dashboard .change-data {
  position: fixed;
  z-index: 5;
  top: 0;
  left: 0;
  
  
  width: 100vw;
  height: 100vh;
  

  //background-color: #5558ff;
  

  display: flex;
  justify-content: center;
  align-items: center;
  ointer-events: none;
  transition: all 0.5s;
  transform: scale(0);
}

.dashboard .change-data.show {
  transform: scale(1);
}

.dashboard .change-data.slide {
  background-color: var(--nav-bg-color);
  ointer-events: true;
  transform: scale(2);
}

.dashboard .change-data .wrapper {
  max-width: 500px;
  background-color: #ddd;
  border-radius: 8px;
  padding: 20px;
  font-size: 1.2em;
  
  transform: translateY(-500%) scale(0);
  transition: all 1s;
  
  position: relative;
  overflow: hidden;
}

.dashboard .change-data .wrapper.slide {
  transform: translateY(0) scale(0.5);
}

.dashboard .change-data .wrapper .close-change-data {
  width: 20px;
  height: 20px;
  display: flex;
  justify-content: center;
  align-items: cebter;
  color: black;
  background-color: red;
  
  position: absolute;
  top: 0;
  right: 0;
}

.dashboard .change-data .wrapper table {
  display: flex;
  row-gap: 10px;
}

.dashboard .change-data .wrapper tr {
  padding: 10px 5px;
}

.dashboard .change-data .wrapper .button-group {
  display: flex;
  border-radius: 4px;
  color: black;
  justify-content: space-around;
  flex-wrap: wrap;
  margin: 10px 0 0 0;
  row-gap: 10px;
}

.dashboard .change-data .wrapper .button-group button {
  overflow: hidden;
  width: 40%;
  padding: 5px;
  color: #fff;
}

.dashboard .change-data .wrapper .button-group button:first-child {
  background-color: green;
  width: 90%;
}

.dashboard .change-data .wrapper .button-group button:nth-child(2) {
  background-color: blue
}

.dashboard .change-data .wrapper .button-group button:last-child {
  background-color: red;
  
}

#login {
  position: fixed;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  background-color: var(--nav-bg-color);
  
  display: flex;
  justify-content: center;
  align-items: center;
}

#login .wrapper {
  max-width: 500px;
  background-color: #ddd;
  border-radius: 8px;
  padding: 20px;
  font-size: 1.3em;
  
  transform: scale(0);
  transition: all 1s;
}

#login .wrapper.fade {
  transform: scale(1);
}

#login .wrapper .paper {
  display: flex;
  flex-direction: column;
}

#login .wrapper .paper .input-group {
  display: flex;
  margin: auto;
  gap: 20px;
  flex-direction: column;
}

#login .wrapper .title {
  text-align: center;
}

#login .wrapper table tr td {
  margin: 20px 0;
}

#login .wrapper .input-group .button-group {
  display: flex;
  justify-content: center;
}

#login .wrapper .input-group .button-group button{
  flex: 1;
  padding : 4px;
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
    <!-- <li><a href="">Laporan</a></li> -->
    <!-- <li><a href="">Login</a></li> -->
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

let data__ = {};
data__ = {
  costumer: {
    all: {}, search: {
      keyword: "",
      result: {}
    }
  },
  order: {
    all: {}, search: {
      keyword: "",
      result: {}
    }, 
    status: {
      progress: {},
      complete: {},
      takeout: {}
    }
  },
  contents: {
    home: "", dashboard: "", login: "",
    a: {
      log: {
        previous: ""
      }
    }
  },
  pages: {
    costumer: {
      active: 1
    }, 
    order: {
      active: 1
    }
  }
};

/*
let goto, max_data, max_button, page_active, first_link_page, first_data_number, page_total;
*/

let data = {};
let data__costumer = {};
let data__order = {};
let data__contents = "";
let contents = "";

let data_table = "";

async function fetchData(  url, type, resultType, data = null  ) {
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
    
    if (type == "POST") {
      xhr.setRequestHeader("Content-Type", "application/json");
    }
    
    xhr.send((type == "POST") ? JSON.stringify(data) : null);
  });
}

async function main(params = {
  directory: "../App/index.php?",
  url: "url=Pelanggan/liveSearch",
  keyword: "",
  type: "GET",
  resultType: "json",
  data: null
}, callback = null) {
  try {
    params.data = (params.data == undefined) ? null : params.data;
    params.url = params.directory + params.url;
    
    if (params.keyword !== "" && params.keyword !== undefined) params.url += "/" + params.keyword;
    console.error(params.url);
    let result = await fetchData(params.url, params.type, params.resultType, params.data);

    
    if (callback && typeof callback === "function") {
      callback(result);
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

let listContent = [
  "Add Costumer",
  "Search Costumer",
  "Add Order",
  "Search Order"
];
let switch_class = [];

const today = new Date().toISOString().split('T')[0];
let day = new Date();



//func

function setPagination(  data, pages, set_page = {}  ) {
  
  //binding bug. data int yang dimanipulasi oleh DOM malah berubah menjadi str
  set_page.page_active = parseInt(set_page.page_active);
  
  let page_is_valid = true;
  
  //**set Rules --filter beberapa logika.
  //max_data = 5. normalnya, ada 5 button.
  
  //gagalkan ekesuki jika : 
  
  if (set_page.page_active < 0 || set_page.page_active > set_page.page_total) {
    page_is_valid = false;
  
  //jika page_total tidak melebihi max_button
  //tidak ada yang terjadi. (hanya berjalan normal)
  } else if (set_page.page_total <= set_page.max_button) {
    set_page.first_link_page = 1;
  
  //sampai sini, berarti page_total lebih dari max_button.
  //jika page_active nya tidak berada ditengah atau lebih dari itu. (tengah itu 3, karena buttonnya 5)
  //tidak ada yang terjadi. (hanya berjalan normal)
  } else if (set_page.page_active <= Math.floor(set_page.max_button / 2)) {
    set_page.first_link_page = 1;
  
  //sampai sini, berarti page_active nya lebih dari setengah max_button.
  //jika page_activenya belum berada di page hampir terakhir atau terkahir, 
  //maka button page_active harus berada di tengah.
  } else if (set_page.page_total - set_page.page_active >= Math.floor(set_page.max_button / 2)) {
    set_page.first_link_page = set_page.page_active - Math.floor(set_page.max_button / 2);
    
  //sampai sini, berarti page_active nya berada di hampir paling terkahir, atau bahkan terkahir.
  //maka button awal alias first_link_page : 
  } else if (set_page.page_total - set_page.page_active >= 0) {
    set_page.first_link_page = set_page.page_total - set_page.max_button + 1;
  
  //selain itu, maka, emmmmm buat execute false atau error
  //karena gatau lagi masuk ke kondisi apa.
  } else page_is_valid = false; 
  //eksekusi func createPagination jika kondisi terpenuhi
  
  if (page_is_valid === true) {
    createPagination(data, {page_is_valid: true, primary_button: true, primary_button_lvl_2: true}, pages, set_page);
  } else {
    createPagination(data, {page_is_valid: false}, pages, set_page);
  }
  
}

function createPagination(  data, params = {
  page_is_valid: true,
  primary_button: true,
  primary_button_lvl_2: true
}, pages, set_page  ) {
  
  /* Configure */
  let goto = set___undefined(set_page.goto, document.querySelector(".content"));
    
  let max_data = set___undefined(set_page.max_data, 10);
  
  let max_button = set___undefined(set_page.max_button, 5);
  
  let page_active = set___undefined(set_page.page_active, 1);
  
  let first_link_page = set___undefined(set_page.first_link_page, 1);
  
  let first_data_number = set___undefined(set_page.first_data_number, 1);
  
  let page_total = set___undefined(set_page.page_total, Math.ceil(data.length / max_data));

  //inisiasi result
  let result = "";
  
  
  
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
    
    result += `<li><a href="#${goto}" class="${checkPageActive([i, page_active], ['active disable', 'smooth'])}" data-topage="${i}">${i}</a></li>`;
    
  }
  
  //jika primary_button_lvl_2 adalah true, buat button previous dan next yang membungkus button yang sudah dibuat 
  if (params.primary_button_lvl_2 === true) {
    result = `<li><a href="#${goto}" class="previous-page ${checkPageActive([1, page_active], ['disable', 'smooth'])}" data-topage="${page_active-1}">&laquo</a></li>
      ${result}
    <li><a href="#${goto}" class="next-page ${checkPageActive([page_total, page_active], ['disable', 'smooth'])}" data-topage="${page_active+1}">&raquo</a></li>`;
  }
  
  //sama.
  if (params.primary_button === true) {
    result = `<li><a href="#${goto}" class="first-page ${checkPageActive([1, page_active], ['disable', 'smooth'])}" data-topage="1">&laquo&laquo</a></li>
      ${result}
    <li><a href="#${goto}" class="last-page ${checkPageActive([page_total, page_active], ['disable', 'smooth'])}" data-topage="${page_total}">&raquo&raquo</a></li>`;
  }
  //ubah isi elemen dengan class pages menjadi result
  pages.innerHTML = result;
  
}

function checkPageActive([binding1, binding2], return_value = [true, false]) {
  /*
  return 
    (binding === page_active)
    ? return_value[0]
    : return_value[1];
  */
  
  if (binding1 === binding2) {
    return return_value[0];
  
  //
  } else {
      return return_value [1];
  }
}



function createTable(  data, data_table, set_page, column  ) {
  
  /* Configure */
  let goto = set___undefined(set_page.goto, document.querySelector(".content"));
    
  let max_data = set___undefined(set_page.max_data, 10);
  
  let max_button = set___undefined(set_page.max_button, 5);
  
  let page_active = set___undefined(set_page.page_active, 1);
  
  let first_link_page = set___undefined(set_page.first_link_page, 1);
  
  let first_data_number = set___undefined(set_page.first_data_number, 1);
  
  let page_total = set___undefined(set_page.page_total, Math.ceil(data.length / max_data));
  
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
    
    
    for(let ii = 0; ii < column.length - 1; ii++) {
      
      row += `<td>${data[i][column[ii]]}</td>`;
    }
    
    row = `<tr><td>${i+1}</td>${row}<td><button data-cotumer_id="${data[i]['id']}" data-data_loop="${i}" class="to-order">Order</button></td></tr>`;
    result += row;
  }
  data_table.innerHTML = result;
  
}

/*
let goto, max_data, max_button, page_active, first_link_page, first_data_number, page_total;*/
// params = {
//   page_is_valid: true,
//   primary_button: true,
  // primary_button_lvl_2: true
/*
function create_table_and_pagination(  
  type,
  data,
  a__page_active = null,
  set_page = {
    goto, 
    max_data, 
    max_button, 
    page_active, 
    first_link_page, 
    first_data_number,
    page_total,

    page_is_valid,
    primary_button,
    primary_button_lvl_2,
  },
  is_ = [is_create_table = true, is_create_pagination = true ]
) {
  
  // Configure
  let data;
  let pages;
  let data_table;
  let column;
  let div_no_result;
  if (type === 1) { 
    data = data__costumer;
    pages = document.querySelector(".pages-search-costumer");
    data_table = document.querySelector("#table-costumer");
    column = ["nama", "no_hp", "action"];
    div_no_result = document.querySelector(".costumer-no-result");
    
  } else if (type === 2) {
    data = data__order;
    pages = document.querySelector(".pages-search-order");
    data_table = document.querySelector("#table-order");
    column = ["tanggal", "kode_pemesanan", "status", "action"];
    div_no_result = document.querySelector(".order-no-result");
  }
  
  //config set rule of pagination
  let goto = set___undefined(set_page.goto, document.querySelector(".content"));
  let max_data = set___undefined(set_page.max_data, 10);
  
  let max_button = set___undefined(set_page.max_button, 5);

  let page_active = set___undefined(set_page.page_active, 1);
  
  let first_link_page = set___undefined(set_page.first_link_page, 1);
  
  let first_data_number = set___undefined(set_page.first_data_number, 1);
  
  let total_page = Math.ceil(data.length / set_page.max_data);
  let page_total = total_page;
  
  // setPagination(data, pages, set_page);
  // createTable(data, data_table, set_page, column);


  //config create pagination
  let page_is_valid = set___undefined(set_page.page_is_valid, true);
  let primary_button = set___undefined(set_page.primary_button, true);
  let primary_button_lvl_2 = set___undefined(set_page.primary_button_lvl_2, true);
  let result = "";

  

  // create pagination 
  if ( is_create_pagination === true ) {
    //set config
    page_active = parseInt(page_active);
    
    //**set Rules --filter beberapa logika.
    //max_data = 5. normalnya, ada 5 button.
    
    //gagalkan ekesuki jika : 
    
    if (page_active < 0 || page_active > page_total) {
      page_is_valid = false;
    
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
    } else page_is_valid = false; 


    // create pagination
    //inisiasi result
    result = "";
    
    if (page_is_valid === false || data.length === undefined || data.length == 0) {
      data_table.style.display = "none";
      div_no_result.style.display = "flex";
      return false;
    } else {
      data_table.style.display = "block";
      div_no_result.display = "none";
    }
    
    
    // buat button berdasarkan data global.
    
    let end_for = max_button;
    
    //binding, jika page_total < max_button : 
    if (page_total < max_button) end_for = page_total;
    
    //buat button angka
    end_for += first_link_page;
    for (let i = first_link_page; i < end_for; i++) {
      
      result += `<li><a href="#${goto}" class="${checkPageActive([i, page_active], ['active disable', 'smooth'])}" data-topage="${i}">${i}</a></li>`;
      
    }
    
    //jika primary_button_lvl_2 adalah true, buat button previous dan next yang membungkus button yang sudah dibuat 
    if (primary_button_lvl_2 === true) {
      result = `<li><a href="#${goto}" class="previous-page ${checkPageActive([1, page_active], ['disable', 'smooth'])}" data-topage="${page_active-1}">&laquo</a></li>
        ${result}
      <li><a href="#${goto}" class="next-page ${checkPageActive([page_total, page_active], ['disable', 'smooth'])}" data-topage="${page_active+1}">&raquo</a></li>`;
    }
    
    //sama.
    if (primary_button === true) {
      result = `<li><a href="#${goto}" class="first-page ${checkPageActive([1, page_active], ['disable', 'smooth'])}" data-topage="1">&laquo&laquo</a></li>
        ${result}
      <li><a href="#${goto}" class="last-page ${checkPageActive([page_total, page_active], ['disable', 'smooth'])}" data-topage="${page_total}">&raquo&raquo</a></li>`;
    }
    //ubah isi elemen dengan class pages menjadi result
    pages.innerHTML = result;

  } // end create pagination
  if ( is_create_table === true ) {
    result = "";
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
      
      
      for(let ii = 0; ii < column.length - 1; ii++) {
        
        row += `<td>${data[i][column[ii]]}</td>`;
      }
      
      row = `<tr><td>${i+1}</td>${row}<td><button data-cotumer_id="${data[i]['id']}" data-data_loop="${i}" class="to-order">Order</button></td></tr>`;
      result += row;
    }
    data_table.innerHTML = result;
  } // end create table

}
*/
function create_table_and_pagination(
  type,
  data,
  a__page_active = null,
  set_page = {
    goto: "",
    max_data: 10,
    max_button: 5,
    //page_active: 1,
    first_link_page: 1,
    first_data_number: 0,
    page_total: 0,
    page_is_valid: true,
    primary_button: true,
    primary_button_lvl_2: true,
  },
  is_create_table = true,
  is_create_pagination = true
) {

  // Konfigurasi
  let pages, data_table, column, div_no_result, page_active;
  
  

  if (type === 1) {
    //data = data__costumer;
    pages = document
      .querySelector(".pages-search-costumer");
    data_table = document
      .querySelector("#table-costumer");
    column = ["nama", "no_hp", "action"];
    div_no_result = document
      .querySelector(".costumer-no-result");
    page_active = data__.pages.costumer.active;
  } else if (type === 2) {
    //data = data__order;
    pages = document
      .querySelector(".pages-search-order");
    data_table = document
      .querySelector("#table-order");
    column = ["tanggal", "kode_pemesanan", "status"];
    div_no_result = document
      .querySelector(".order-no-result");
    page_active = data__.pages.order.active;
    
  }
  page_active = parseInt(page_active);
  

  // Konfigurasi pagination
  let {
    goto,
    max_data,
    max_button,
    //page_active,
    first_link_page,
    first_data_number,
    page_total,
    page_is_valid,
    primary_button,
    primary_button_lvl_2,
  } = set_page;
  
  //if (a__page_active !== null) page_active = a__page_active;
  

  // Jumlah total halaman
  page_total = Math.ceil(data.length / max_data);

  // Membuat pagination
  if (is_create_pagination) {
    // Penanganan kesalahan

    // if (page_active < 1 || page_active > page_total || data.length === 0) {
    //   data_table.style.display = "none";
    //   div_no_result.style.display = "flex";
    //   return false;
    // } else {
    //   data_table.style.display = "block";
    //   div_no_result.display = "none";
    // }

    let result = "";
    let end_for = Math.min(max_button + first_link_page, page_total + 1);
    
    for (let i = first_link_page; i < end_for; i++) {
      result += `<li><a href="#${goto}" class="${ (i == page_active) ? "active disable" : "smooth" }" data-topage="${i}">${i}</a></li>`;
    }

    if (primary_button_lvl_2) {
      result =
        `<li><a href="#${goto}" class="previous-page ${checkPageActive(
          [1, page_active],
          ["disable", "smooth"]
        )}" data-topage="${page_active - 1}">&laquo</a></li>` +
        result +
        `<li><a href="#${goto}" class="next-page ${checkPageActive(
          [page_total, page_active],
          ["disable", "smooth"]
        )}" data-topage="${page_active + 1}">&raquo</a></li>`;
    }

    if (primary_button) {
      result =
        `<li><a href="#${goto}" class="first-page ${checkPageActive(
          [1, page_active],
          ["disable", "smooth"]
        )}" data-topage="1">&laquo&laquo</a></li>` +
        result +
        `<li><a href="#${goto}" class="last-page ${checkPageActive(
          [page_total, page_active],
          ["disable", "smooth"]
        )}" data-topage="${page_total}">&raquo&raquo</a></li>`;
    }

    if (page_active < 1 || page_active > page_total || data.length === 0) {
      pages.innerHTML = "";
    } else pages.innerHTML = result;
  }

  // Membuat tabel
  if (is_create_table) {
    let result = "";
    first_data_number = (page_active - 1) * max_data;
    

    for (let i = 0; i < column.length; i++) {
      result += `<th>${column[i].toUpperCase()}</th>`;
    }
    result = `<tr><th>NO</th>${result}</tr>`;

    let end_for = Math.min(max_data * page_active, data.length);

    for (let i = first_data_number; i < end_for; i++) {
      let row = "";
      for (let ii = 0; ii < column.length; ii++) {
        //event for column action
        if (column[ii] == "action") {
          row += `<td><button data-costumer_id="${
            data[i]["id"]
          }" class="to-order">Order</button></td>`;
          console.log(data[i]);
          console.log(row);
        
        //event column status
        } else if (column[ii] == "status") {
          row += `<td data-change_status_by_id="${
            data[i]["id"]
          }" class="td-status">${
            data[i][column[ii]]
          }</td>`;
        
        //event kode pemesanan
        } else if (column[ii] == "kode_pemesanan" ) {
          row += `<td data-change_data_by_id="${
            data[i]["id"]
          }" class="td-change-data-by-id" >${
            data[i][column[ii]]
          }</td>`;

        //selain itu
        } else row += `<td>${data[i][column[ii]]}</td>`;
        
      }
      
      
      row = `<tr><td>${i + 1}</td>${row}</tr>`;
      result += row;
    }
    if (page_active < 1 || page_active > page_total || data.length === 0) {
      data_table.innerHTML = `<tr><th style="font-size: 2.2em;">NO RESULT! PLEASE RETRY SEARCH FOR ANOTHER KEYWORD.<th></tr>`;
    } else data_table.innerHTML = result;
  }
}



function set___undefined(param, default_value) {
  if (param === undefined) {
    return default_value;
  } else return param;
}





let input = {
  /*
  costumer: {},
  order: {},
  edit_order: {},
  login: {}
  */
}; /* {
  /*
  costumer: {
    name: document.querySelector("#input-add-costumer-name"),
    phone_num:  document.querySelector("#input-add-costumer-phone-num"),
    btn_cancel: document.querySelector("#input-add-costumer-button-group").firstElementChild,
    btn: document.querySelector("#input-add-costumer-button-group").firstElementChild.nextElementSibling
  },
  order: {
    date: document.querySelector("#input-add-order-date"),
    name: document.querySelector("#input-add-order-name"),
    phone_num:  document.querySelector("#input-add-order-phone-num"),
    package:  document.querySelector("#input-add-order-package"),
    price:  document.querySelector("#input-add-order-price"),
    weight:  document.querySelector("#input-add-order-weight"),
    total:  document.querySelector("#input-add-order-total"),
    btn_cancel: document.querySelector("#input-add-order-button-group").firstElementChild,
    btn: document.querySelector("#input-add-order-button-group").firstElementChild.nextElementSibling
  },
  edit_order: {
    date: document.querySelector("#input-change-order-date"),
    name: document.querySelector("#input-change-order-name"),
    phone_num:  document.querySelector("#input-change-order-phone-num"),
    package:  document.querySelector("#input-change-order-package"),
    price:  document.querySelector("#input-change-order-price"),
    weight:  document.querySelector("#input-change-order-weight"),
    total:  document.querySelector("#input-change-order-total"),
    btn_cancel: document.querySelector("#input-change-order-button-group").firstElementChild,
    btn: document.querySelector("#input-change-order-button-group").firstElementChild.nextElementSibling
  }
  
};
*/

let btn_login = "";
let input_login_username = "";
let input_login_password = "";

let id;

// let select_paket = document.getElementById("list-paket");
// let option_paket = "";
// let inputBerat = document.querySelector("#berat");
// let berat = 0;
// let inputHarga = document.querySelector("#harga");
// let harga = 3000;
function createHargaPackage(
  package = input.order.package,
  params = [
    ["Biasa", 3000],
    ["Cepat", 5000],
    ["Kilat", 7000]
]) 
{
    let code = ``;
    for (let i = 0; i < params.length; i++) {
        code += `<option class="comboB${
          i
        }" data-harga="${
          params[i][1]
        }" value="${
          params[i][0]
        }">${
          params[i][0]
        }</option>`;
    }
    package.innerHTML = code;
    console.log(package);
}

function calcTotal( type = "order" ) {
  input[type].total.value = input[type].price.value * input[type].weight.value;
}

let button_search_order_by_date = [
  null
];

let search_group_order = [];

let load = {
  data: {
    home: false,
    dashboard: false,
    login: false,
    logout: false
  },
  refresh: function(property_name) {
    for (const p in this[property_name]) {
      this[property_name][p] = true;
    }
    console.log(this);
  }
};

load.refresh("data");



/*** *** *** End Dashboard func *** *** ***/






document.addEventListener("DOMContentLoaded", function() {
  document.body.addEventListener("click", function(e) {
    
    //event request contents
    if ( 
      e.target.tagName === "A" && 
      e.target.closest("nav") 
    ) {
      e.preventDefault();
      document.querySelector("main header h2")
        .innerText = e.target.innerText;
      
      checkbox.checked = false;
      nav_links.classList.remove("slide");
      
      main_content.classList.remove("home");
      main_content.classList.remove("dashboard");
      main_content.classList.remove("laporan");
      main_content.classList.remove("login");
      
      //event backup content
      if ( data__.contents.previous != "" ) {
        data__.contents[data__.contents.a.log.previous] = main_content.innerHTML;
      }
      
      
      //event replace content
      main_content.classList
        .add(e.target.innerText.toLowerCase());
      main_content.innerHTML = 
        data__["contents"][e
          .target.innerText.toLowerCase()];
      
      //event mark replace content
      data__.contents.a.log.previous = 
        e.target.innerText.toLowerCase();
      
      
      //event dashboard
      if (
        e.target.innerText === "Dashboard"
      ) {
        
        //clear load dashboard
        load.data.dashboard = false;

        // event deklarasi var input
        input.costumer = {
          name: document.querySelector(
            "#input-add-costumer-name"
          ),
          phone_num:  document.querySelector(
            "#input-add-costumer-phone-num"
          ),
          btn_cancel: document.querySelector(
            "#input-add-costumer-button-group"
          ).firstElementChild,
          btn: document.querySelector(
            "#input-add-costumer-button-group"
          ).firstElementChild.nextElementSibling
        };
        
        input.order = {
          date: document.querySelector(
            "#input-add-order-date"
          ),
          name: document.querySelector(
            "#input-add-order-name"
          ),
          phone_num:  document.querySelector(
            "#input-add-order-phone-num"
          ),
          package:  document.querySelector(
            "#input-add-order-package"
          ),
          price:  document.querySelector(
            "#input-add-order-price"
          ),
          weight:  document.querySelector(
            "#input-add-order-weight"
          ),
          total:  document.querySelector(
            "#input-add-order-total"
          ),
          btn_cancel: document.querySelector(
            "#input-add-order-button-group"
          ).firstElementChild,
          btn: document.querySelector(
            "#input-add-order-button-group"
          ).firstElementChild.nextElementSibling
        };
        
        input.edit_order = {
          date: document.querySelector(
            "#input-change-order-date"
          ),
          name: document.querySelector(
            "#input-change-order-name"
          ),
          phone_num:  document.querySelector(
            "#input-change-order-phone-num"
          ),
          package:  document.querySelector(
            "#input-change-order-package"
          ),
          price:  document.querySelector(
            "#input-change-order-price"
          ),
          weight:  document.querySelector(
            "#input-change-order-weight"
          ),
          total:  document.querySelector(
            "#input-change-order-total"
          ),
          btn_cancel: document.querySelector(
            "#input-change-order-button-group"
          ).firstElementChild,
          btn: document.querySelector(
            "#input-change-order-button-group"
          ).firstElementChild.nextElementSibling,
          btn_delete: document.querySelector(
            "#input-change-order-button-group"
          ).lastElementChild
        };
        
        
        
        createHargaPackage(input.order.package);
        createHargaPackage(input.edit_order.package);
        
        input.order.date.value = today;

        

        search_group_order.push(
          document.querySelector(
            ".search-order .search-group"
          )
        );
        
        document.querySelectorAll(
          ".search-order .search-group .search-group-order"
        ).forEach((s) => {
          search_group_order
            .push(s.firstElementChild);
        });
        
        
        button_search_order_by_date[1] = 
          document.querySelector(
            "#search-order-by-date-1"
          );
        button_search_order_by_date[2] = 
          document.querySelector(
            "#search-order-by-date-2"
          );
        
        button_search_order_by_date[1].value = today;
        button_search_order_by_date[2].value = today;

        button_search_order_by_date[1].parentElement.display = "none";

        
        //data_table = document.querySelector("#table-costumer");
        //setPagination(data__.costumer.all);
        //createTable(data__.costumer.all);
        
        //setPagination(data__.order.all, document.querySelector(".pages-search-order"));
        //createTable(data__.order.all, ["tanggal", "kode_pemesanan", "status"], document.querySelector("#table-order"), document.querySelector(".order-no-result"));
        
        create_table_and_pagination(1, data__.costumer.all);
        create_table_and_pagination(2, data__.order.all);
        
      //end event dashboard
      }
      //event login
      if ( e.target.innerText === "Login" ) {
        /*
        btn_login = document.querySelector("#input-submit-login ");
        input_login_username = document.querySelector("#input-login-username");
        input_login_password = document.querySelector("#input-login-password");
        */
       
      }
      
    //end event request contents
    }
    
    //event close nav pada navlinks
    if (
      e.target !== checkbox && 
      e.target !== nav_links 
    ) {
      checkbox.checked = false; 
      nav_links.classList.remove("slide");
    }
    
    //** event dashboard
    //switch content type
    if ( 
      e.target.classList
        .contains("switch-content") 
    ) {
    
      for (let i = 0; i < listContent.length; i++) {
        let switch_content = listContent[i];
        switch_class[i] = switch_content
          .toLowerCase().replace(/ /g, "-"); 
          // Mengganti semua spasi dengan tanda strip
        
        
        if (e.target.innerText === listContent[i]) {
          document.querySelector(
            '.dashboard .' + switch_class[i] 
          ).classList.add("content-active");
        } else {
          document.querySelector(
            '.dashboard .' + switch_class[i] 
          ).classList.remove("content-active");
        }
        
        document.querySelector(
          `.dashboard .${switch_class[i]}`
        ).style.display = 
          (e.target.innerText === listContent[i]) 
          ? "flex"
          : "none";
      } //end for
      
      //event add order
      if (e.target.innerText === listContent[2]) {
        //hilangkan form. karena harus di akses dengan button order pada search costumer
        document.querySelector(
          `.dashboard .${switch_class[2]} form`
        ).style.display = 'none';
        document.querySelector(
          `.dashboard .${switch_class[2]} .form-no-permission`
        ).style.display = 'flex';
      //end event add order
      }
    // end event switch content
    }
    
    //event button pagination
    if ( 
      main_content.classList
        .contains("dashboard") 
    ) {
      
      //event saat main content adalah dashboard
      if ( 
        e.target.tagName === "A" && 
        (e.target.classList.contains("disable") || 
          e.target.classList.contains("active")) 
      ) {
        e.preventDefault();
      
      //event pagination smooth
      } else if ( 
        e.target.tagName === "A" && 
        e.target.classList.contains("smooth") 
      ) {
      
        document.documentElement.style
          .scrollBehavior = "smooth";
        
        let to_page = e.target.dataset.topage;
        
        page_active = to_page;
        
        console.log(" active ::", page_active);
        //binding error kondisi.
        //hanya di binding saat request dari button.
        if (page_active == 0) {
          page_active = 1;
          console.error("filter page 0");
        } else if (page_active > page_total) {
          page_active = page_total;
          console.error("filter page total");
        
        //event pembuatan tabel berdasarkan topage
        } else if ( 
          e.target.parentElement
            .parentElement.classList
            .contains("pages-search-costumer") 
        ) {
          /*
          setPagination(data__.costumer.all); 
          createTable(data__.costumer.all);
          */
          data__.pages.costumer.active = to_page;
          create_table_and_pagination(
            1, 
            data__.costumer.all,
            page_active
          );
        } else if ( 
          e.target.parentElement
            .parentElement.classList
            .contains("pages-search-order") 
        ) {
          
          /*
          setPagination(
            data__order.all, 
            document.querySelector(
              ".pages-search-order"
            )
          );
          
          createTable(
            data__.order.all, 
            ["tanggal", "kode_pemesanan", "status"], 
            document.querySelector("#table-order"), 
            document.querySelector(".order-no-result")
          );
          */
          data__.pages.order.active = to_page;
          create_table_and_pagination(
            2,
            data__.order.all,
            page_active
          );
        //end pembuatan tabel berdasarkan topage
        } else console.error("no filter topage");
      // end event paginagion smooth
      }
      
      // event search costumer
      else if ( 
        e.target === document.querySelector( 
          ".search-costumer .search-group button" 
        ) 
      ) {
      
        fillData( 
          "costumer_search", 
          ["nama", e.target.previousElementSibling.value] 
        );
        page_active = 1;
        /*
        setPagination(
          data__.costumer.search.result
        );
        createTable(
          data__.costumer.search.result
        );
        */
        create_table_and_pagination(
          1,
          data__.costumer.search.result
        );
    
      //end event search costumer
      } 
      
      //event search order
      else if ( 
        e.target === document.querySelector(
          ".searchorder .search-group button"
        ) 
      ) {
      
        fillData(  
          "order_search", 
          ["nama", e.target.previousElementSibling.value]  
        );
        page_active = 1;
        /*
        setPagination(
          data__order, 
          document.querySelector(".pages-search-order")
        );
        createTable(
          data__order, 
          ["tanggal", "kode_pemesanan", "status"], 
          document.querySelector("#table-order"), 
          document.querySelector(".order-no-result")
        );
        */
        create_table_and_pagination(
          2,
          data__.order.search.result
        );
      
      //end event search order
      }
    // end event main content adalah dashboard
    }
    
  //end event delegation body
  });
  
  /*** *** *** Dashboard func *** *** ***/
  
  //**set Configure data
  goto = "content";
  max_data = 10;
  max_button = 5;
  page_active = 1;
  first_link_page = 1;
  first_data_number = 1;
  page_total = Math.ceil(data.length / max_data);
  
  
  //delegation lv 2 => main => input
  document.querySelector("main")
    .addEventListener("input", 
  function(e) {
    
    //change harga
    if ( e.target.tagName == "SELECT" ) {
      let type;

      if ( e.target.closest(".add-order") ) type = "order";
      else if ( e.target.closest(".change-data") ) type = "edit_order";

      input[type].price.value = input[type].package.options[input[type].package.selectedIndex].dataset.harga;
      calcTotal(type);
      
    //end change harga
    }
    //change berat for add order
    else if ( 
      e.target === input.order.weight 
    ) {
      console.log(input.order.weight);
      // if (weight.value == "" || weight.value <= 0) weight.value = 0;
      calcTotal();
    //end change berat
    }

    //change berat for change data
    else if ( 
      e.target === input.edit_order.weight 
    ) {
      console.log(input.edit_order.weight);
      // if (weight.value == "" || weight.value <= 0) weight.value = 0;
      calcTotal("edit_order");
    //end change berat
    }
  }); 
  
  // delegation lv 2 => main => click
  document.querySelector("main")
    .addEventListener("click", 
  function(e) {
    
    
    //event to-order
    if ( 
      e.target.classList.contains("to-order") 
    ) {
    
      let data = data__.costumer.all.filter(d => d.id == e.target.dataset.costumer_id)[0];
      document.querySelector('.dashboard .add-order')
        .style.display = "flex";
      document.querySelector('.dashboard .add-order')
        .classList.add("content-active");
          
      document.querySelector('.dashboard .search-costumer')
        .style.display = "none";
      document.querySelector('.dashboard .search-costumer')
        .classList.remove("content-active");
      
      //change display
      document.querySelector(
        `.dashboard .${switch_class[2]} form`
      ).style.display = "block";
      document.querySelector(
        `.dashboard .${switch_class[2]} ` + 
        `.form-no-permission`
      ).style.display = "none";
      
      
      
      
      
      //isi input berdasarkan baris table pada button yang di klik
      document.querySelector(
        ".dashboard .add-order .nama"
      ).value = data.nama;
      document.querySelector(
        ".dashboard .add-order .no_hp"
      ).value = data.no_hp;
    //end event button to-order
    }
    
    
    //event search-order 

    if ( e.target === search_group_order[1] ) {
      if ( !search_group_order[1].checked ) {
        button_search_order_by_date[1].parentElement.style.display = "none";
      } else {
        button_search_order_by_date[1].parentElement.style.display = "flex";
      }
    }
    
    else if ( 
      e.target === search_group_order[6]
    ) {
      
      let dummy = "";
      let keyword = [];
      let result = [];
      let date_list = [];
      let key = "__Search:Status[";
      
      if ( 
        !search_group_order[2].checked &&
        !search_group_order[3].checked &&
        !search_group_order[4].checked
      ) {
        search_group_order[2].checked = true;
        search_group_order[3].checked = true;
        search_group_order[4].checked = true;
      }
      
      if ( search_group_order[2].checked ) {
        keyword.push("Progress");
        key += "Progress_";
      }
      
      if ( search_group_order[3].checked ) {
        keyword.push("Selesai");
        key += "Selesai_";
      }
      
      if ( search_group_order[4].checked ) {
        keyword.push("DiAmbil");
        key += "DiAmbil";
      }
      
      key += "]";
      
      result = data__.order.all.filter(
        r => keyword.includes(r.status)
      );
      
      if ( search_group_order[1].checked ) {
        
        
        
        date_list = getListDate(
          button_search_order_by_date[1].value,
          button_search_order_by_date[2].value,
          "-",
          "-"
        );
        
        console.log(date_list);
        console.log(Array.isArray(date_list));
        
        
        key += "_Date[" + button_search_order_by_date [1] + "_" + button_search_order_by_date [2] + "]";
        
        
        result = result.filter(
          r => { 
            date_list.includes(r.tanggal);
            
            if (
              date_list.includes(r.tanggal)
            ) {
              console.log(date_list, "==", r.tanggal);
              return r;
            } else console.error(date_list, "!=", r.tanggal);
            
          }
        );
      }
      
      
      if ( search_group_order[5].checked ) {
        result = result.reverse();
        key += "_reverse";
      }
      
      key += "__";
      
      console.log(result);
      
      data__.order.search.keyword = key;
      data__.order.search.result = result;
      
      data__.pages.order.active = 1;
      
      create_table_and_pagination(
        2,
        data__.order.search.result
      );
      
      
    } //end event search order
    
    //event btn cancel edit order
    if ( e.target == input.edit_order.btn_cancel ){
      console.error("id::" + id);
      fillInputChangeData(id);
    }
    
    //event btn close edit order
    if ( 
      e.target.classList
        .contains("close-change-data") || 
      e.target === input.edit_order.btn ||
      e.target === input.edit_order.btn_delete
    ) {
     setTimeout(() => {
     document.querySelector(".dashboard .change-data").classList.remove("slide");
      document.querySelector(".dashboard .change-data").firstElementChild.classList.remove("slide");
      setTimeout(() => {
        
        
        document.querySelector(".dashboard .change-data").classList.remove("show");
        
      }, 800);
      }, (e.target === input.edit_order.btn || e.target === input.edit_order.btn_delete) ? 1000 : 0 );
    } //end event close edit order
    
    //event submit edit order
    if ( e.target === input.edit_order.btn ) {
      
      let data = [
        input.edit_order.date.value,
        input.edit_order.name.value,
        input.edit_order.phone_num.value,
        input.edit_order.package.value,
        input.edit_order.price.value,
        input.edit_order.weight.value,
        input.edit_order.total.value
      ];
      
      main({
        directory: "../App/index.php?",
        url: "url=Pemesanan/change_order",
        keyword: id+"/"+ data.join("/"),
        type: "GET",
        resultType: 'json',
      }, result => {
        if ( typeof result.status === "boolean" ) {
          fillData(  "order_all"  );
          fillData(
            "order_status",
            [null, null],
            "__request_wait__"
          );
          setTimeout(() => {
            create_table_and_pagination(
              2,
              data__.order.all
            );
          }, 6000);
          console.log("success change data");
        } else console.error(result);
      });
      
    } //end event submit edit order
    
    //event delete order
    else if ( e.target === input.edit_order.btn_delete ) {
      main({
        directory: "../App/index.php?",
        url: "url=Pemesanan/delete_order",
        keyword: id,
        type: "GET",
        resultType: "json"
      }, result => {
        if ( typeof result.status === "boolean" ) {
          fillData(  "order_all"  );
          fillData(
            "order_status",
            [null, null],
            "__request_wait__"
          );
          setTimeout(() => {
            create_table_and_pagination(
              2,
              data__.order.all
            );
          }, 6000);
        } else console.error(result);
      });
    } //end event delete order
    
  }); //end delegation click
  
  
  
  //event delegation lv 2 => main => dbclick
  
  document.querySelector("main")
    .addEventListener("dblclick", 
  function (e) {
    
    //evenet pada class status progress
    if ( 
      e.target.classList
        .contains("td-status") && (
      e.target.innerText === "Progress" ||
      e.target.innerText === "Selesai" )
    ) {
      
      let change_to = 
        (e.target.innerText === "Progress") 
        ? "Selesai" 
        : "DiAmbil";
      
      let confirm_event = 
        confirm("R U SURE TO CHANGE STATUS BY ID : " + 
          e.target.dataset.change_status_by_id + ",\nSTATUS = " + e.target.innerText + " -> " + change_to );
      
      //event confirm
      if (confirm_event) {
        main({
          directory: "../App/index.php?",
          url: "url=Pemesanan/change_status",
          keyword: e.target.dataset.change_status_by_id +"/"+ change_to,
          type: "GET",
          resultType: "json"
        }, function(result) {
            if ( result.status == true ) {
              //alert("SUCCESS TO CHANGE STATUS")
              
              fillData(  "order_all"  );
              fillData(
                "order_status",
                [null, null],
                "__request_wait__"
              );
              
              setTimeout(() => {
                create_table_and_pagination(
                  2,
                  data__.order.all
                );
              }, 6000);
              
            } else console.log(result);
        });
      //end event confirm
      }
    //end event class status progress
    }
    
  //event change data by id
  if ( e.target.classList.contains("td-change-data-by-id") ) {
    id = e.target.dataset.change_data_by_id;
    
    //event show change data
    document.querySelector(".dashboard .change-data").classList.add("show");
    
    document.querySelector(".dashboard .change-data").firstElementChild.classList.add("slide");
    
    setTimeout(() => {
      document.querySelector(".dashboard .change-data").classList.add("slide");
    }, 800);
    
    document.body.style.overflow = "hidden";
    
    fillInputChangeData(id);
    
  } //end event change data by id

  });
  //end delegation lv 2
  
  
  // Event fill var data
  fillData("all");
  
  //event check login
  setTimeout(() => {
    
    if (!is_login) {
      
      document.body.innerHTML += `<div id="login">${data__.contents.login}</div>`;
      setTimeout(() => {
        document.querySelector("#login").firstElementChild.classList.add("fade");
      }, 500);
      
      
      btn_login = document.querySelector(
        "#input-submit-login"
      );
      input_login_username = document.querySelector(
        "#input-login-username"
      );
      input_login_password = document
        .querySelector(
          "#input-login-password"
      );
      
      console.log(btn_login);
      console.log(input_login_username);
      console.log(input_login_password);
      
      document.querySelector("#login").addEventListener('click', e => {
        
        if ( e.target === btn_login ) {
          console.log("login button");
          const user = {};
          main({
            directory: "../App/index.php?",
            url: `url=Pengguna/liveSearch`,
            keyword: "",
            type: "GET",
            resultType: "json"
          }, function(result) {
            if (typeof result.status==="boolean") {
              const users = result.result.filter(user => user.username.toLowerCase() == input_login_username.value.toLowerCase()).filter(user => user.password == input_login_password.value.toLowerCase());
              
              if (users.length > 0) {
                
                console.log(users);
                /*
                user.push(users[0]);
                console.log(user);
                */
                /*
                main({
                  directory: "../App/index.php?",
                  url: `url=Pengguna/liveSearch`,
                  keyword: "",
                  type: "GET",
                  resultType: "json"
                });
                */
                
                document.querySelector("#login").firstElementChild.classList.remove("fade");
                
              } else console.error("User Tidak Ditemukan");
              
            } else console.log(result);
          });
        }
        
      });
      
    }
    
  }, 1500);
  
}); //end function LoadDOM


function fillData(  
  type, 
  keywords = [null, null], 
  add_param = null 
) {

  let [column, keyword] = keywords;
  
  if (type == "costumer_all" || type == "order_all") {
    
    let data__type = type.split("_")[0];
    
    main({
      directory: "../App/index.php?",
      url: `url=${
        (data__type == "costumer") ? "Pelanggan" : "Pemesanan" 
      }/liveSearch`,
      keyword: "",
      type: "GET",
      resultType: "json"
    }, function(result) {
      if (typeof result.status === "boolean") {
        data__[data__type]["all"] = result.result;
      } else console.log(result);
    });
  } 
  
  else if (
    (
      type == "costumer_search" || 
      type == "order_search"
    ) && 
    column != null && 
    keyword != null
  ) {
  
    let data__type = type.split("_")[0];
    
    if (data__.order.all.length > 1) {
      /*
      let result = data__[data__type]["all"]
        .filter(arr => arr[column] === keyword);
      */
      
      let result = data__[data__type]["all"]
        .filter(arr => arr[column].toLowerCase()
          .includes(keyword.toLowerCase()));
      
      if (
        typeof result == "object" && 
        result.length > 0
      ) {
      
        data__[data__type]["search"]["keyword"] = keyword;
        data__[data__type]["search"]["result"] = result;
        data__["pages"][data__type]["active"] = 1;
        
        
      } else console.error(`Tidak ada '${keyword}' dalam kolom '${column}' pada object '${data__type}'`);
      
    // jika bukan array
    } else console.error(`data__ -> ${data__type} -> all bukan sebuah array`);
  }
  
  else if (type == "order_status") {
    time = (add_param == "__request_wait__") ? 5000 : 0;
    
    setTimeout(() => {
      if (data__.order.all.length > 1) {
        data__.order.status.progress = data__.order.all
          .filter(arr => arr.status === "Progress");
        data__.order.status.complete = data__.order.all
          .filter(arr => arr.status === "Selesai");
        data__.order.status.takeout = data__.order.all
          .filter(arr => arr.status === "DiAmbil");
      // jika bukan array
      } else console.error(`data__ -> order -> all bukan sebuah array`);
    }, time);
  }
  
  
  
  else if (type == "contents") {
    let list__menu = [
      "Home",
      "Dashboard",
      "Login"
    ];
    
    for ( 
      const [i, m] of list__menu.entries() 
      //entries: memasukan suatu nilai kedalam array 
    ) {
      main({
        directory: `Content/${m}/index.html`,
        url: "",
        keyword: "",
        type: "GET",
        resultType: "contents"
      }, function(result) {
        data__["contents"][m.toLowerCase()] = result;
      });
    }
  }
  
  
  
  if (type == "all") {
    fillData(  "costumer_all"  );
    fillData(  "order_all"  );
    fillData(  
      "order_status", 
      [null, null], 
      "__request_wait__"  
    );
    fillData(  "contents"  );
  }
}

/*
let progress = ["empty"];
let selesai = [];

setTimeout(() => {
  console.log("timeout");
  
  progress = data__["order"]["all"].filter((arr) => arr["status"] === "Progress");
  selesai = data__["order"]["all"].filter((arr) => arr.status === "Selesai");
  
  
  
  
  //[progress, selesai] = data__.order.all.filter(() => );
  
  [progress, selesai] = data__.order.all.filter((arr, arr2) => {
    /*if (arr.status === "Progress") {
      return ["x", arr];
    } else if (arr.status === "Selesai") {
      return [arr, "x"];
    }
  });
  
  
  
}, 3000);
*/


const getListDate = (date_first, date_last, char_split = "/", result_split = "/") => {
  
  console.table(date_first, date_last);
  
  const year = { first: 0, last: 0 },
       month = { first: 0, last: 0 },
         day = { first: 0, last: 0 };
  
  let i = { start: 0, loop: 0, end: 0 },
     ii = { start: 0, loop: 0, end: 0 },
    iii = { start: 0, loop: 0, end: 0 };
  
  
  const date = {
    default: {
      year: {
        first: 2024,
        last: 2024
      },
      month: {
        first: 1,
        last: 12
      },
      day: {
        first: 1,
        last: 31
      }
    }
  };
  
  //**set rules
  
  let result = [];
  
  [year.first, month.first, day.first] 
    = date_first.split(char_split).map(m => parseInt(m));;
  
  [year.last, month.last, day.last] 
    = date_last.split(char_split).map(m => parseInt(m));
  
  if (
    year.first === undefined ||
    year.last === undefined ||
    month.first === undefined ||
    month.last === undefined ||
    day.first === undefined || 
    day.last === undefined
  ) {
    console.error("format parameter harus YYYY/MM/DD");
    return false;
  }
  
  //**set rules --date_2 must be a next day
  if ( year.first <= year.last ) {
    if ( month.first <= month.last || year.first < year.last ) {
      if ( day.first <= day.last || month.first < month.last || year.first < year.last ) {
        
        i.start = year.first;
        i.end = year.last;
        
        for ( i.loop = i.start; i.loop <= i.end; i.loop++ ) {
          
          ii.start = (i.loop === year.first) ? month.first : date.default.month.first;
          ii.end = (i.loop === year.last) ? month.last : date.default.month.last;
          
          for ( ii.loop = ii.start; ii.loop <= ii.end; ii.loop++ ) {
            
            iii.start = ( ii.loop === month.first && i.loop === year.first ) ? day.first : date.default.day.first;
            iii.end = ( ii.loop === month.last && i.loop === year.last ) ? day.last : date.default.day.last;
            
            for ( iii.loop = iii.start; iii.loop <= iii.end; iii.loop++ ) {
              
              result.push(`${i.loop}${
                result_split
              }${
                (ii.loop < 10) 
                  ? "0" + ii.loop 
                  : ii.loop
              }${
                result_split
              }${
                (iii.loop < 10)
                  ? "0" + iii.loop
                  : iii.loop
              }`);
              /*
              console.log(`${i.loop}/${
                (ii.loop < 10) 
                  ? "0" + ii.loop 
                  : ii.loop
              }/${
                (iii.loop < 10)
                  ? "0" + iii.loop
                  : iii.loop
              }`);
              */
            }
          }
        }
      }
    }
  }
  
  
  return result;
};

const fillInputChangeData = (id, type = "edit_order") => {

  let data = data__[type.split("_")[1]].all.filter(d => d.id == id)[0];
  
  console.log(data.tanggal.split("/").reverse().join("-"));
  
  input[type].date.value = data.tanggal.split("/").reverse().join("-");
  input[type].name.value = data.nama;
  input[type].phone_num.value = data.no_hp;
  input[type].package.value = data.paket;
  input[type].price.value = data.harga;
  input[type].weight.value = data.berat;
  input[type].total.value = data.total_harga;
  
};

</script>
</body>
</html>
