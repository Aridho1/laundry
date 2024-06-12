<p>
<?php
if (!session_id()) session_start();
// var_dump($_SESSION);
// $_SESSION=[];
?>
<script>
  const user__ = {
    // is_login: false,
    // level: 0
  };
</script>

<?php

if ( isset($_SESSION["laundry-rido"]["is-login"]) && isset($_SESSION["laundry-rido"]["user-level"]) ) {
  if ( $_SESSION["laundry-rido"]["is-login"] == true ) {
    
    $is_login = $_SESSION["laundry-rido"]["is-login"];
    $user_level = $_SESSION["laundry-rido"]["user-level"];
    
    echo "<script>
    user__.is_login = Boolean('$is_login');
    user__.level = parseInt('$user_level');
    </script>";
  } 
}
//$_SESSION["is-login"] = true;
//unset($_SESSION["is-login"]);
?>

<script>
  user__.is_login = !user__.is_login ? false : user__.is_login;
  user__.level = user__.level || false;

  //** Binding empty | undefined variable

  // deklar var undefined
  let is_login, user_level, username, password;

  // opt 1    if else statement
  if ( !is_login ) {
    is_login = true;
  } else {
    is_login = is_login;
  }

// opt 2    too
if ( !user_level ) user_level = 1;
else user_level = user_level;

// opt 3    ternary operator
username = !user_level ? "Dodi" : user_level;

// opt 4    or operator
password = password || "rahasia";

[ is_login, user_level, username, password ] = [ undefined, undefined, undefined, undefined ];

</script>

<?php  ?>
</p>
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

.dashboard .content-type h4 {
  
    transition: all 0.3s;
}

.dashboard .content-type h4:hover {
  opacity: 0.7;
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
  width: 100%;
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

.td-change-data-by-id,
.td-status {
  cursor: pointer;
  user-select: none;
  box-sizing: border-box;
  transition: all 0.3s;
}

.td-change-data-by-id:hover,
.td-status:hover {
  opacity: 0.6;
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
  

  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  transition: all 0.5s;
  transform: scale(0);
}

.dashboard .change-data.show {
  transform: scale(1);
}

.dashboard .change-data.slide {
  background-color: var(--nav-bg-color);
  pointer-events: true;
  transform: scale(2);
}

.dashboard .change-data .wrapper {
  max-width: 500px;
  background-color: #ddd;
  border-radius: 8px;
  padding: 30px 25px 35px;
  font-size: 1.2em;
  
  transform: translateY(-500%) scale(0);
  transition: all 1s;
  
  position: relative;
  /* overflow-y: hidden; */
  order: 2;
}

.dashboard .change-data .wrapper.slide {
  transform: translateY(0) scale(0.6);
  z-index: 10;
}

.dashboard .change-data .wrapper.no-transtion {
  transition: all 0s;
}
.dashboard .change-data .wrapper.go {
  transform: translateY(-200%) scale(0.6);
}

.dashboard .change-data .wrapper.down {
  transform: translateY(+200%) scale(0.6);
}

.dashboard .change-data .wrapper.come {
  transform: translateY(0) scale(0.6);
}

.dashboard .change-data .wrapper.transtion-wrapper-1 {
  transition: all 0.6s cubic-bezier(0.8, -0.4, 0.3, 1.33);
}


/* .dashboard .change-data .wrapper .close-change-data,
.dashboard .change-data .wrapper .print-change-data,
.dashboard .change-data .wrapper .advance-change-data {
  width: 25px;
  height: 25px;
  display: flex;
  justify-content: center;
  align-items: center;
  transition: all 0.3s;
  
  position: absolute;
  top: 0;
  border-radius: 2px;
  cursor: pointer;
}

.dashboard .change-data .wrapper .close-change-data:hover,
.dashboard .change-data .wrapper .print-change-data:hover,
.dashboard .change-data .wrapper .advance-change-data:hover {
  color: #fff;
}

.dashboard .change-data .wrapper .advance-change-data {
  color: #000;
  background-color: #0EE337;
  left: 0;
}

.dashboard .change-data .wrapper .print-change-data {
  color: #000;
  background-color: #E3E20E;
  left: 25px;
}

.dashboard .change-data .wrapper .close-change-data {
  color: #000;
  background-color: transparent;
  right: 0;
} */

.dashboard .change-data .wrapper .title {
  text-align: center;
  margin-bottom: 15px;
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
  border-radius: 4px;
  cursor: pointer;
}

.dashboard .change-data .wrapper .button-group button:first-child {
  background-color: green;
  width: 90%;
}

.dashboard .change-data .wrapper .button-group button:nth-child(2) {
  background-color: blue
}

.dashboard .change-data .wrapper .button-group button:last-child {
  background-color: #ddd;
  color: red;
  border: none;
  
}

.action-button-group {
  /* background-color:red; */
  position: absolute;
  top: 0;
  left: 0;
  transform: translateY(-100%);
  width: 100%;
  height: 50px;
  z-index: 101;
}

.action-button-group ul {
  display: flex;
  list-style: none;
  justify-content: space-between;
}

.action-button-group ul li {
  width: 30%;
  height: var(--action-button-icon-size);
  /* background-color: #fff; */
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  overflow: hidden;
  border-radius: 10px;
  
  box-sizing: border-box;
}

.action-button-group ul li .logo-action {
  position: absolute;
  top: 0;
  left: 0;
  width: var(--action-button-icon-size);
  height: var(--action-button-icon-size);
  line-height: var(--action-button-icon-size);
  text-align: center;
  
  background-color: #ccc;
  z-index: 110;
  border-radius: 10px;
  font-size: 0.85em;
}

.action-button-group ul li button {
  border: none;
  width: calc(100% - var(--action-button-icon-size) + 15px);
  height: 100%;
  transform: translateX(-110%);
  position: absolute;
  top: 0;
  left: 0;
  display: block;
  align-self: end;
  margin-left: calc(var(--action-button-icon-size) - 15px);
  padding-left: 8px;
  background-color: #fff;
  text-align: center;
  font-size: 0.6em;
  transition: all 0.5s;
}

.action-button-group ul li .logo-action:hover ~ button,
.action-button-group ul li button:hover {
transform: translateX(0);
}

/*** Login ***/

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
  transition: all 0.7s;
  z-index: -2;
  opacity: 0;
}

#login.to-login {
  opacity: 1;
  z-index: 999;
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

/* Aside */
aside {
  position: fixed;
  z-index: -2;
  top: 0;
  left: 0;
  width: 0vw;
  height: 0vh;
  background-color: #eee;
  transform: scale(0);
  transition: all 0.6s;
}

aside.aside.show {
  z-index: 100;
  transform: scale(1) rotate(360deg);
  width: 100vw;
  height: 100vh;
}


/* FOR ALL || TEMPLATE */
.display-none {
  display: none;
}

.transition-1 {
  transition: all 1s;
}

.cursor-pointer {
  cursor: pointer;
}

label {
  transition: all 0.3s;
}

label:hover {
  opacity: 0.7;
}

.line-through {
  text-decoration: line-through;
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
    <h2>NO CONTENT</h2>
  </header>
  <div class="content">
    <p>HELLO WORLD!</p>
  </div>
  <footer>Copyright 2024</footer>
  <input type="number" id="set-size-body" min="0"><button onclick="setSizeOfBody(parseInt(document.querySelector('#set-size-body').value));">Aply</button>
</main>

<aside class="aside report"></aside>
  
<script src="//cdn.jsdelivr.net/npm/eruda"></script>
<script>eruda.init();</script>
<script src="Support/resize.js"></script>

<script>

const log = (...any) => console.log(any.join(' '));  


let data__ = {};
data__ = {
  costumer: {
    all: {}, search: {
      keyword: "",
      result: {}
    }, 
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

let data = {};

const fetchData = async (  url, type  ) => {
  return new Promise((resolve, reject) => {
    const xhr = new XMLHttpRequest();
    
    xhr.onreadystatechange = () => {
    
      if (xhr.readyState==4) {
        if (xhr.status==200) {
          resolve(xhr.responseText);
        } else reject("Failed to fetch data: " + xhr.status)
      }
    };
    
    xhr.open(type, url, true);
    xhr.send();
  });
};

const main = async (params = {
  url: "../App/index.php?url=Pelanggan/liveSearch",
  type: "GET"
}, callback = null) => {
  try {
    let result = await fetchData(params.url, params.type || "GET");

    
    if (callback && typeof callback==="function") callback(result);
    
  } catch (error) { 
    console.error(error); 
  }
};


const fillData = async (  
  type, 
  keywords = [null, null], 
  add_param = null 
) => {

  let [column, keyword] = keywords;
  
  if (type == "costumer_all" || type == "order_all") {
    
    let data__type = type.split("_")[0];
    
    await main({
      url: `../App/index.php?url=${
          (data__type == "costumer") ? "Pelanggan" : "Pemesanan" 
        }/liveSearch`
    }, resultStr => {
      
      const result = JSON.parse(resultStr);
      
      if (typeof result.status === "boolean") {
        data__[data__type].all = result.result;
        data__[data__type].search.result = result.result;
        data__[data__type].search.keyword = "__all__";
        data__.pages[data__type].active = 1;
      } else console.error(resultStr);
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
      
      if ( result.length < 1 ) console.error(`Tidak ada '${keyword}' dalam kolom '${column}' pada object '${data__type}'`);
      
      data__[data__type].search.keyword = keyword;
      data__[data__type].search.result= result;
      data__.pages[data__type].active = 1;
      
    // jika bukan array
    } else console.error(`data__ -> ${data__type} -> all bukan sebuah array`);
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
      await main({
        url: `Content/${m}/index.html`,
        type: "GET"
      }, result => {
        data__["contents"][m.toLowerCase()] = result;
      });
    }
  }
  
  
  
  if (type == "all") {
    console.log("Loading...");
    await fillData(  "contents"  );
    await fillData(  "costumer_all"  );
    await fillData(  "order_all"  );
    
    console.log("Selesai");
  }
};

// Event fill var data

const l = (...any) => log(any.join(' '));

const sleep = ms => {
  return new Promise(resolve => setTimeout(resolve, ms)) ;
};

let checkbox = document.querySelector(".menu-toggle input[type=checkbox]");
let nav_links = document.querySelector("nav ul");
let nav_toggle = document.querySelector("div.menu-toggle");

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

function create_table_and_pagination(
  type,
  data = null,
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
    data = data__.costumer.search.result;
    pages = document
      .querySelector(".pages-search-costumer");
    data_table = document
      .querySelector("#table-costumer");
    column = ["nama", "no_hp", "action"];
    div_no_result = document
      .querySelector(".costumer-no-result");
    page_active = data__.pages.costumer.active;
  } else if (type === 2) {
    setSearch("order");
    data = data__.order.search.result;
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

  // Jumlah total halaman
  page_total = Math.ceil(data.length / max_data);

  let executeCreatePagination = true;

  // event handle error || set rules
  if (page_active < 0 || page_active > page_total) {
    executeCreatePagination = false;
  
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
  } else executeCreatePagination = false;

  // Membuat pagination
  if (is_create_pagination) {
    // Penanganan kkesalahan

    let result = "";
    let end_for = Math.min(max_button + first_link_page, page_total + 1);
    
    for (let i = first_link_page; i < end_for; i++) {
      result += `<li><a href="#${goto}" class="${ 
        (i == page_active) ? "active disable" : "smooth" 
        }" data-topage="${i}">${i}</a></li>`;
    }
    
    if (primary_button_lvl_2) {
      result = `<li><a href="#${
          goto
        }" class="previous-page ${
          (1 == page_active) ? "disable" : "smooth"
        }" data-topage="${page_active - 1}">&laquo</a></li>` +
          result
        + `<li><a href="#${
          goto
        }" class="next-page ${
          (page_total == page_active) ? "disable" : "smooth"
        }" data-topage="${
          page_active + 1
        }">&raquo</a></li>`;
    }

    if (primary_button) {
      result = `<li><a href="#${goto}" class="first-page ${
          page_active == 1 ? "disable" : "smooth"
        }" data-topage="1">&laquo&laquo</a></li>` +
        result +
        `<li><a href="#${goto}" class="last-page ${
          page_active == page_total ? "disable" : "smooth"
        }" data-topage="${page_total}">&raquo&raquo</a></li>`;
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
          
        
        //event column status
        } else if (column[ii] == "status") {
          row += `<td data-change_status_by_id="${
            data[i]["id"]
          }" class="td-status cursor-pointer">${
            data[i][column[ii]]
          }</td>`;
        
        //event kode pemesanan
        } else if (column[ii] == "kode_pemesanan" ) {
          row += `<td data-change_data_by_id="${
            data[i]["id"]
          }" class="td-change-data-by-id cursor-pointer" >${
            data[i][column[ii]]
          }</td>`;

        //selain itu
        } else row += `<td>${data[i][column[ii]]}</td>`;
        
      }
      
      row = `<tr ${
        // event last data
        (i == data.length - 1) 
        ? "data-isLastData='true'"
        : ""
      }><td>${i + 1}</td>${row}</tr>`;
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
};

let btn_login = "";
let input_login_username = "";
let input_login_password = "";

let id;

const createPriceOfPackage = (
  package = input.order.package,
  params = [
    ["Biasa", 3000],
    ["Cepat", 5000],
    ["Kilat", 7000]
]) =>
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
};

const createStatusOfOrder = (
  package = input.order.status,
  list_status = ["Progress", "Selesai", "DiAmbil"]) =>
{
    let code = ``;
    for (let i = 0; i < list_status.length; i++) {
        code += `<option class="comboB${
          i
        }" data-harga="${
          list_status[i]
        }" value="${
          list_status[i]
        }">${
          list_status[i]
        }</option>`;
    }
    package.innerHTML = code;
};

function calcTotal( type = "order" ) {
  input[type].total.value = input[type].price.value * input[type].weight.value;
}

let button_search_order_by_date = [
  null
];

let search_group_order = [];






document.addEventListener("DOMContentLoaded", async (el) => {
  console.log("end dom");
  
  // fill fata and wait
  await fillData("all");

  // set default menu
  const default_menu = "homE" . toLowerCase();

  document.querySelector(".content")
    .previousElementSibling.firstElementChild.innerHTML = 
      default_menu.split("")
        .map((letter, i) =>  i == 0 ? letter.toUpperCase() : letter.toLowerCase())
          .join("");

  document.querySelector(".content")
    .innerHTML = data__.contents[default_menu];

  document.querySelector(".content")
    .classList.add(default_menu);
  
  // exec handle request
  __handleRequest__[default_menu.split("")
        .map((letter, i) =>  i == 0 ? letter.toUpperCase() : letter.toLowerCase())
          .join("")]();



    // event handle nav for mobile
    // checkbox = document.querySelector(".menu-toggle input[type=checkbox]");
    // nav_links = document.querySelector("nav ul");
    // nav_toggle = document.querySelector("div.menu-toggle");
    // nav_toggle.addEventListener("click", () => {
    //   nav_links.classList.toggle("slide");
    // });





  // event big delegation for tempplating engine, pagination, search, and CRUD
  document.body.addEventListener("click", async (e) => {

    const main_content = document.querySelector(
      "main .content"
    );


    // handle nav mobile
    if ( e.target.closest("div.menu-toggle") ) {
      document.querySelector("nav ul").classList.toggle("slide");
    }
    
    //event close nav pada navlinks
    if (
      e.target !== document.querySelector(".menu-toggle input[type=checkbox]") && 
      e.target !== document.querySelector("nav ul") 
    ) {
      document.querySelector(".menu-toggle input[type=checkbox]").checked = false; 
      document.querySelector("nav ul").classList.remove("slide");
    }

    //event request contents
    if ( 
      e.target.tagName === "A" && 
      e.target.closest("nav") 
    ) {

      e.preventDefault();
      
      checkbox.checked = false;
      document.querySelector("nav ul").classList.remove("slide");
      
      
      if ( e.target.innerText == "Logout") {
        
        const sure = confirm("Are You Sure To Logout?");
        if ( sure ) window.location.href = "../App/index.php?url=Pengguna/setSessionLogin/false"
        else return false;
        //end event logout
      }
      
      main_content.classList.remove("home");
      main_content.classList.remove("dashboard");
      main_content.classList.remove("laporan");
      
      document.querySelector("main header h2")
        .innerText = e.target.innerText;
      
      //event replace content
      main_content.classList
        .add(e.target.innerText.toLowerCase());
      main_content.innerHTML = 
        data__["contents"][e
          .target.innerText.toLowerCase()];
      
      //event home
      if ( e.target.innerText === "Home" ) __handleRequest__.Home();
      
      //event dashboard
      else if ( e.target.innerText === "Dashboard" ) {
        
        loadConfigForDashboardMenu();
        
      // end event dashboard
      } 
      
    //end event request contents
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
    
    //event saat main content adalah dashboard
    if ( 
      document.querySelector("main .content").classList
      .contains("dashboard") 
    ) {
      
      //**event button pagination
      //event pagination disable or active
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
        
        //binding error kondisi.
        //hanya di cek saat request dari button.
        if (page_active == 0) {
          page_active = 1;
          console.error("filter page 0");
        } else if (page_active > page_total) {
          page_active = page_total;
          console.error("filter page total");
        
        //event pembuatan tabel berdasarkan topage
        } else if ( 
          // e.target.parentElement
          //   .parentElement.classList
          //   .contains("pages-search-costumer") 
          e.target.closest(".pages-search-costumer") 
        ) {
          data__.pages.costumer.active = to_page;
          create_table_and_pagination(
            1, 
            data__.costumer.all,
            page_active
          );
        } else if ( 
          // e.target.parentElement
          //   .parentElement.classList
          //   .contains("pages-search-order") 
          e.target.closest(".pages-search-order") 
          ) {
          data__.pages.order.active = to_page;
          create_table_and_pagination(
            2,
            data__.order.all,
            page_active
          );
        //end pembuatan tabel berdasarkan topage
        } else console.error("unfilter topage");
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
        create_table_and_pagination( 1 );
    
      //end event search costumer
      } 
      
      //event add costumer
      if ( e.target == document.querySelector("#input-add-costumer-submit") ) {
        const data = [
          input.costumer.name.value,
          input.costumer.phone_num.value
        ];
        
        const duplicate = data__.costumer.all
          .filter(cstmr => cstmr.nama.toLowerCase() == input.costumer.name.value.toLowerCase())
          .filter(cstmr => cstmr.no_hp.toLowerCase() == input.costumer.phone_num.value.toLowerCase());
        
        input.costumer.name.value = "";
        input.costumer.phone_num.value = "";

        if (duplicate.length > 0) {
          console.error("Nama Dan No HP Sudah Terdaftar!");
          return false;
        }

        // send to db
        await main({
          url: `../App/index.php?url=Pelanggan/addCostumer/${
              data.join("/")
            }`
        }, resultStr => {

          const result = JSON.parse(resultStr);

          if ( typeof result.status == "boolean" ) {
            window.location.href = "";
          } else console.error(resultStr); 

        });
      // end event add costumer
      }


      //event add order
      if ( e.target == document.querySelector("#input-add-order-submit") ) {
        
        // event check waight
        if ( parseInt(input.order.weight.value) < 1 ) {
          console.error("Weight Is Invalid!");
          return false;
        }
        const data = [
          input.order.date.value,
          input.order.name.value,
          input.order.phone_num.value,
          input.order.package.value,
          input.order.price.value,
          input.order.weight.value,
          input.order.total.value,
        ];
        
        let rand_str = getRandStr(6);
        let countOfOrder = 0;
        await main({
          url: "../App/index.php?url=Pemesanan/getCountOrder/js"
        }, (resultStr) => {
          
          const result = JSON.parse(resultStr);

          if ( result.id ) {
            countOfOrder = result.angka; 
          } else {
              console.error(resultStr);
              return false;
          }

        });

        const code 
          = input.order.date.value
            .substr(0, 7) 
          + "-" 
          + getRandStr(6)
          + "-"
          + countOfOrder ;

        // send to db
        await main({
          url: `../App/index.php?url=Pemesanan/addOrder/${
              code
            }/${
              data.join("/")
            }/Progress`
        }, resultStr => {

          const result = JSON.parse(resultStr);

          if ( typeof result.status == "boolean" ) {
            window.location.href = "";
          } else console.error(resultStr); 

        });
      // end event add order
      }

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
      
      else if ( e.target === search_group_order[6] ) {
        data__.pages.order.active = 1;
        page_active = 1;
        setSearch("order");
        create_table_and_pagination( 2 );
      }
      //end event search order

      // event disable button edit-order
      if ( user__.level < 2 ) {
        document.querySelector(".dashboard .change-data .button-group")
          .classList.add("line-through");
      }

      
      //event btn cancel edit order
      if ( e.target == document.querySelector("#input-change-order-button-group button:nth-child(1)") ){
        fillInputChangeData(id);
      }
      
      //event btn advance edit order
      if ( e.target.closest(".advance-change-data") ) {

        // alert("advance");
        // fix hell function
        // animate

        const wrapper = document.querySelector(".dashboard .change-data .wrapper");

        wrapper.classList.add("no-transtion");
        wrapper.classList.toggle("transtion-wrapper-1");
        wrapper.classList.toggle("go");
        
        await sleep(400);
        
        // ambil type berdasarkan title
        
        
        wrapper.classList.toggle("transtion-wrapper-1");

        const el = document.querySelector(".advance-change-data");
        toggleAdvanceEditData(el, wrapper);
        await sleep(100);
        
        wrapper.classList.toggle("go");
        wrapper.classList.toggle("down");
        await sleep(100);
        
        wrapper.classList.toggle("transtion-wrapper-1");
        wrapper.classList.toggle("come");
        await sleep(600);
        
        wrapper.classList.toggle("transtion-wrapper-1");
        // await sleep(100);
        
        wrapper.classList.remove("come");
        wrapper.classList.remove("down");
        wrapper.classList.remove("no-transtion");

      // end event advance edit
      } 

      
      //event btn print edit order
      else if ( e.target.closest(".print-change-data") ) {

        stylePrint ( true );
        
        await window.print();
        
        stylePrint ( false );

      // end event print edit order
      }
      
      //event btn close edit order
      else if ( 
        e.target.closest(".close-change-data") //|| 
        // e.target === document
        // .querySelector("#input-change-order-button-group button:nth-child(2)") ||
        // e.target === document
        // .querySelector("#input-change-order-button-group button:nth-child(3)")
      ) closeEditOrder(e); //end event close edit order
      
      //event submit edit / delete order
      if ( 
        e.target === document.querySelector("#input-change-order-button-group button:nth-child(2)") ||
        e.target === document.querySelector("#input-change-order-button-group button:nth-child(3)")
      ) {

        //event cek user level
        if ( user__.level < 2 ) {
          console.error("User Level Kamu Tidak Mencukupi");
          return false;
        }

        if ( 
          id == data__.order.all[data__.order.all.length - 1].id && 
          e.target === document.querySelector("#input-change-order-button-group button:nth-child(3)") 
        ) page_active -= 1;

        setDataOrder( e.target === document.querySelector("#input-change-order-button-group button:nth-child(2)") ? "edit_order" : "delete_order", id, e );
        
      } //end event submit edit / delete order
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
  document.body.addEventListener("input", (e) => {
    
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
    else if ( e.target === document.querySelector("#input-add-order-weight") ) {
      calcTotal();
    //end change berat
    }

    //change berat for change data
    else if ( e.target === document.querySelector("#input-change-order-weight") ) {
      calcTotal("edit_order");
    //end change berat
    }

  }); //end legetaion input body
  

  //event delegation lv 2 => main => dbclick
  
  document.body.addEventListener("dblclick", (e) => {
    
    //evenet pada class status progress
    if ( 
      e.target.classList
        .contains("td-status") && 
      (
        e.target.innerText === "Progress" ||
        e.target.innerText === "Selesai"
      )
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
          url: `../App/index.php?url=Pemesanan/change_status/${
              e.target.dataset.change_status_by_id
            }/${change_to}`,
          type: "GET",
          }, async (resultStr) => {
            
            const result = JSON.parse(resultStr);
            
            if ( result.status == true ) {
              
              await fillData(  "order_all"  );
              await fillData( "order_status" );
              data__.pages.order.active = page_active;
              create_table_and_pagination(
                2,
                data__.order.all
              );
              
            } else console.error(resultStr);
        }); // end fetch main
      //end event confirm
      } else return false;
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
    
  }); //end delegation lv 2 dbclick

  
  document.body.addEventListener("submit", (e) => {
    e.preventDefault();
  }); // event delegation submit

  
  
  //configure menu login
  document.body.innerHTML += `<div id="login">${data__.contents.login}</div>`;

  btn_login = document.querySelector(
    "#input-submit-login"
  );
  input_login_username = document.querySelector(
    "#input-login-username"
  );
  input_login_password = document.querySelector(
    "#input-login-password"
  );

  document.querySelector("#login").addEventListener('click', e => {
    if ( e.target === btn_login ) {
      main({
        url: `../App/index.php?url=Pengguna/liveSearch`,
        type: "GET",
      }, resultStr => {
        
        const result = JSON.parse(resultStr);
        
        if (typeof result.status==="boolean") {
          const user = result.result.filter(user => user.username == input_login_username.value).filter(user => user.password == input_login_password.value);
          if (user.length > 0) {
            
            contentToLogin(false);

            setTimeout(() => {
              window.location.href = `../App/index.php?url=Pengguna/setSessionLogin/true/${user[0].user_level}`;
            }, 500);
            
          } else console.error("User Tidak Ditemukan");
        } else console.error(resultStr);

        input_login_username.value = "";
        input_login_password.value = "";
      });
    }
    
  });

  //event check login
  setTimeout(() => {
    if (!user__.is_login) contentToLogin();
  }, 100);
  
}); //end function LoadDOM







const getListDate = (date_first, date_last, char_split = "/", result_split = "/") => {
  
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
  
  //**set rules --date_last must be a next day
  // if ( year.first <= year.last ) {
  //   if ( month.first <= month.last || year.first < year.last ) {
  //     if ( day.first <= day.last || month.first < month.last || year.first < year.last ) {

      if ( 
        year.first < year.last || 
        (month.first < month.last && year.first <= year.last) || 
        (day.first <= day.last && month.first <= month.last && year.first <= year.last) 
      ) {

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
            }
          }
        }
      }
  //     }
  //   }
  // }

  if ( result.length === 0 ) console.error("Reject By Filter Next Day.");
  return result;
};

const fillInputChangeData = (id, type = "edit_order") => {

  let data = data__[type.split("_")[1]].all.filter(d => d.id == id)[0];
  
  input[type].order_code.value = data.kode_pemesanan;
  input[type].date.value = data.tanggal.split("/").reverse().join("-");
  input[type].name.value = data.nama;
  input[type].phone_num.value = data.no_hp;
  input[type].package.value = data.paket;
  input[type].price.value = data.harga;
  input[type].weight.value = data.berat;
  input[type].total.value = data.total_harga;
  input[type].status.value = data.status;
  
};


// methode toggle show/hide content login
const contentToLogin = (show = true) => {

  if ( show === true ) {

    document.querySelector("#login")
      .classList.add("to-login");

    document.querySelector("#login")
      .firstElementChild.classList.add("fade");
      
    } else if ( show === false ) {
      
      document.querySelector("#login")
      .firstElementChild.classList.remove("fade");

      setTimeout(() => {
        document.querySelector("#login")
          .classList.remove("to-login");
      }, 200)

  }

};


const setDataOrder = ( type, id, e ) => {
  type = type.toLowerCase();

  if ( type == "edit_order" || type == "delete_order" ) {

    // event check waight
    if ( parseInt(input.edit_order.weight.value) < 1 ) {
      console.error("Weight Is Invalid!");
      return false;
    }

    let data = [
      input.edit_order.order_code.value,
      input.edit_order.date.value,
      input.edit_order.name.value,
      input.edit_order.phone_num.value,
      input.edit_order.package.value,
      input.edit_order.price.value,
      input.edit_order.weight.value,
      input.edit_order.total.value,
      input.edit_order.status.value
    ];
    main({
      url: `../App/index.php?url=Pemesanan/${type}/${id}/${type == "edit_order" ? data.join("/") : ""}`,
      type: "GET"
    }, async (resultStr) => {

      result = JSON.parse(resultStr);
      if ( typeof result.status === "boolean" ) {
        await fillData (  "order_all"  );
        await fillData( "order_status" );
        data__.pages.order.active = page_active;
        create_table_and_pagination(
          2,
          data__.order.all,
          page_active
        );
        
      } else console.error(resultStr);

    });

    // hanlde --close wrapper change data
    closeEditOrder(e);

  } // end edit || delete order

};


// authorizatiohn
const getRandStr = length => {
  const charset = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
  let result = '';
  for (let i = 0; i < length; i++) {
    const randomIndex = Math.floor(Math.random() * charset.length);
    result += charset[randomIndex];
  }
  return result;
};



// methode to set search order
const setSearch = type => {


  // event type costumer
  if ( type == "costumer" ) {


  // end event type costumer
  }

  // event type order
  else if ( type == "order" ) {

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
      
      key += "_Date[" + button_search_order_by_date[1].value + "_" + button_search_order_by_date[2].value + "]";
      
      
      result = result.filter(r => date_list.includes(r.tanggal));
    }
    
    
    if ( search_group_order[5].checked ) {
      result = result.reverse();
      key += "_reverse";
    }
    
    key += "__";
    
    data__.order.search.keyword = key;
    data__.order.search.result = result;

    return result;
    
    // end event search order
  } 
};



const loadConfigForDashboardMenu = () => {

  data__.pages.order.active = 1;
  data__.pages.costumer.active = 1;
  log("LOAD DASHBOARD CONFIG...");
  
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
    order_code: document.querySelector(
      "#input-change-order-order_code"
    ),
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
    status:  document.querySelector(
      "#input-change-order-status"
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
  
  
  createPriceOfPackage(input.order.package);
  createPriceOfPackage(input.edit_order.package);

  createStatusOfOrder(input.edit_order.status);
  
  input.order.date.value = today;
  search_group_order = [];
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

  create_table_and_pagination(1, data__.costumer.all);
  create_table_and_pagination(2, data__.order.all);
        
};

// func for advance edit data
const toggleAdvanceEditData = (el, wrapper) => {

  const type = `edit_${
      // e.target //advance btn
      //   .nextElementSibling //close
      //   .nextElementSibling //paper
      //   .firstElementChild //title
      wrapper.querySelector(".paper .title")
        .firstElementChild //h3
        .innerText.toLowerCase().includes("order") ? "order" : "costumer"
    }`;

  const manip_attr = el.dataset.toshow == "true" ? "removeAttribute" : "setAttribute";

  // if ( el.dataset.toshow == "true" ) {
  //   input[type].order_code.parentElement.parentElement.removeAttribute("hidden");
  //   input[type].date.parentElement.parentElement.removeAttribute("hidden");
  //   input[type].phone_num.parentElement.parentElement.removeAttribute("hidden");
  //   input[type].status.parentElement.parentElement.removeAttribute("hidden");

  //   wrapper.querySelector("span.is-advance-setting").innerHTML = "Advanced";
  // } else if ( el.dataset.toshow == "false" ) {
  //   input[type].order_code.parentElement.parentElement.setAttribute("hidden", "");
  //   input[type].date.parentElement.parentElement.setAttribute("hidden", "");
  //   input[type].phone_num.parentElement.parentElement.setAttribute("hidden", "");
  //   input[type].status.parentElement.parentElement.setAttribute("hidden", "");

  //   wrapper.querySelector("span.is-advance-setting").innerHTML = "";
  // }
  
    input[type].order_code.parentElement.parentElement[manip_attr]("hidden", "");
    input[type].date.parentElement.parentElement[manip_attr]("hidden", "");
    input[type].phone_num.parentElement.parentElement[manip_attr]("hidden", "");
    input[type].status.parentElement.parentElement[manip_attr]("hidden", "");

    wrapper.querySelector("span.is-advance-setting").innerHTML = manip_attr == "setAttribute" ? "" : "Advenced";

  el.dataset.toshow = el.dataset.toshow == "true" ? "false" : "true";
};

const stylePrint = print => {

  const type = "edit_order";
  
  if ( print === true ) {
    input[type].date.type = "text";
  } else if ( print === false ) {
  input[type].date.type = "date";
  }
};

const closeEditOrder = async (e) => {

  // handle reject close
  if ( !e.target.closest(".close-change-data") && user__.level < 2 ) return false;

  // setTimeout(() => {
  //   document.querySelector(".dashboard .change-data").classList.remove("slide");
  //   document.querySelector(".dashboard .change-data").firstElementChild.classList.remove("slide");
  //   setTimeout(() => {
  //     document.querySelector(".dashboard .change-data").classList.remove("show");
  //   }, 800);
  // }, (e.target === document.querySelector("#input-change-order-button-group:nth-child(2)") || e.target === document.querySelector("#input-change-order-button-group:nth-child(2)")) ? 1000 : 0 );

  const wait = (e.target === document.querySelector(".button-edit") || e.target === document.querySelector(".button-delete")) ? 200 : 0;

  console.error(wait);
  console.error(e.target);
  
  await sleep( wait );

  document.querySelector(".dashboard .change-data").classList.remove("slide");
  document.querySelector(".dashboard .change-data").firstElementChild.classList.remove("slide");

  await sleep(800);

  document.querySelector(".dashboard .change-data").classList.remove("show");

};

const __handleRequestHome__ = async () => {

  if ( user__.level > 1 ) {
    document.querySelector(".home strong").innerHTML = `${
      user__.level === 2 ? "Owner" : "-- UNDEFINED USER --"
    }`;
  }
  
};

const __handleRequest__ = {
  Home: function() {

    // handle greeting
    if ( user__.level > 1 ) {
      document.querySelector(".home strong").innerHTML = `${
        user__.level === 2 ? "Owner" : "-- UNDEFINED USER --"
      }`;
    // end handle greeting`
    }

  },
  Dashboard() {

  },
  Logout: function() {

  }
};

</script>
</body>
</html>
