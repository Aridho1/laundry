<?php

if (!session_id()) session_start();

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
  min-width: 80px;
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
    home: "", dashboard: "", laporan: "", login: ""
  }
};

let data = {};
let data__costumer = {};
let data__order = {};
let data__contents = "";
let contents = "";

let data_table = "";

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
}, callback = null) {
  try {
    params.url = params.directory + params.url;
    if (params.keyword !== "" && params.keyword !== undefined) params.url += "/" + params.keyword;
    
    let result = await fetchData(params.url, params.type, params.resultType);
    /*
    if (typeof result === "string") {
      contents = result;
      main_content.innerHTML = contents;
    } else if (result.status === true) {
      data = result.result;
      page_active = 1;
      setPagination();
      createTable();
    }
    */

    // Check if a callback is provided and call it
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

function setPagination(data = data__costumer, pages = document.querySelector(".pages-search-costumer")) {
  
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
  //eksekusi func createPagination jika kondisi terpenuhi
  
  if (executeCreatePagination === true) {
    createPagination(data, {page_is_valid: true, primary_button: true, primary_button_lvl_2: true}, pages);
  } else {
    createPagination(data, {page_is_valid: false, primary_button: false, primary_button_lvl_2: false}, pages);
  }
  
}

function createPagination(data, params = {
  page_is_valid: true,
  primary_button: true,
  primary_button_lvl_2: true
}, pages = document.querySelector(".pages-search-costumer") ) {
  
  //inisiasi result
  let result = "";
  
  //timpa elemen dengan class pages
  pages.innerHTML = pages.innerHTML;
  page_total = Math.ceil(data.length / max_data);
  
  
  
  
  if (params.page_is_valid === false || data.length === undefined) {
    data_table.style.display = "none";
    return false;
  } else {
    data_table.style.display = "block";
  }
  
  
  
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



function createTable(  data, column = ["nama", "no_hp", "action"], data_table = document.querySelector("#table-costumer"), result__no_result = document.querySelector(".costumer-no-result")  ) {
  let result = "";
  
  if ( data.length == undefined || data.length < 1 || typeof data !== "object" || typeof data == "string") {
    result__no_result.previousElementSibling.style.display = "none";
    result__no_result.style.display = "flex";
    result__no_result.nextElementSibling.style.display = "none";
  } else {
    result__no_result.previousElementSibling.style.display = "flex";
    result__no_result.style.display = "none";
    result__no_result.nextElementSibling.style.display = "flex";
  }

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
      if ( column[ii] == "action" ) row += `<td><button data-cotumer_id="${data[i]['id']}" data-data_loop="${i}" class="to-order">Order</button></td>`;
      else row += `<td>${data[i][column[ii]]}</td>`;
    }

    row = row.replace("<td>Progress", `<td class="td-status-progress" data-change_status_by_id="${data[i]['id']}">Progress`);
    
    row = `<tr><td>${i+1}</td>${row}</tr>`;
    result += row;
    
  }
  data_table.innerHTML = result;
  
}







let select_paket = document.getElementById("list-paket");
let option_paket = "";
let inputBerat = document.querySelector("#berat");
let berat = 0;
let inputHarga = document.querySelector("#harga");
let harga = 3000;
function createHarga(params = [
    ["Biasa", 3000],
    ["Cepat", 5000],
    ["Kilat", 7000]
]) 
{
    let code = ``;
    for (let i = 0; i < params.length; i++) {
        code += `<option class="comboB${i}" data-harga="${params[i][1]}" value="${params[i][0]}">${params[i][0]}</option>`;
    }
    select_paket.innerHTML = code;
}




function calcTotal() {
    //$("#total-harga").val(harga * berat);
    document.querySelector("#harga_total").value = harga * berat;
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
      }, function(result) {
        if ( typeof result === "string" ) {
          
          data__contents = result;
          main_content.innerHTML = data__contents;
          
          //event dashboard
          if (e.target.innerText === "Dashboard") {
            document.querySelector("#date").value = today;
            select_paket = document.getElementById("list-paket");
            option_paket = "";
            inputBerat = document.querySelector("#berat");
            berat = 0;
            inputHarga = document.querySelector("#harga");
            harga = 3000;
  
            createHarga();
          //end event dashboard
          }
        //jika result bukan string : 
        } else console.error(result);
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

    for (let i = 0; i < listContent.length; i++) {
        let switch_content = listContent[i];
        switch_class[i] = switch_content.toLowerCase().replace(/ /g, "-"); // Mengganti semua spasi dengan tanda strip
        
        
        if (e.target.innerText === listContent[i]) {
            document.querySelector('.dashboard .' + switch_class[i])
                .style.display = "flex";
            document.querySelector('.dashboard .' + switch_class[i])
                .classList.add("content-active");
        } else {
            document.querySelector('.dashboard .' + switch_class[i])
                .style.display = "none";
            document.querySelector('.dashboard .' + switch_class[i])
                .classList.remove("content-active");
        }
      }

      
      // event binding content search
      if ( e.target.innerText === listContent[1] ) {
        data_table = document.querySelector("#table-costumer");
        // event dashboard 
        main({
          directory: "../App/index.php?",
          url: "url=Pelanggan/liveSearch",
          keyword: "",
          type: "GET",
          resultType: "json"
        }, function(result) {
          if ( typeof result.status === "boolean" ) {
            page_active = 1;
            data__costumer = result.result;
            setPagination(data__costumer);
            createTable(data__costumer);
          } else console.error(result);
        });
      // end event binding content search
      } //event add order
      else if (e.target.innerText === listContent[2]) {
          //hilangkan form. karena harus di akses dengan button order pada search costumer
          document.querySelector(`.dashboard .${switch_class[2]} form`).style.display = 'none';
          document.querySelector(`.dashboard .${switch_class[2]} .form-no-permission`).style.display = 'flex';
          
      //end event add order
      } //event search order
      else if ( e.target.innerText === listContent[3] ) {
        data_table = document.querySelector("#table-order");
        main({
          directory: "../App/index.php?",
          url: "url=Pemesanan/liveSearch",
          keyword: e.target.previousElementSibling.value,
          type: "GET",
          resultType: "json"
        }, function(result) {
          if ( typeof result.status === "boolean" ) {
            data__order = result.result;
            page_active = 1;
            setPagination(data__order, document.querySelector(".pages-search-order"));
            createTable(data__order, ["tanggal", "kode_pemesanan", "status"], document.querySelector("#table-order"), document.querySelector(".order-no-result"));
          } else console.error(result);
        });
      }
    } // end event switch content
    
    //event button pagination
    if ( main_content.classList.contains("dashboard") ) {
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
        } else if ( e.target.parentElement.parentElement.parentElement.classList.contains("search-costumer") ) {
          setPagination(data__costumer); 
          createTable(data__costumer);
        } else if ( e.target.parentElement.parentElement.parentElement.classList.contains("search-order") ) {
          setPagination(data__order, document.querySelector(".pages-search-order"));
          createTable(data__order, ["tanggal", "kode_pemesanan", "status"], document.querySelector("#table-order"), document.querySelector(".order-no-result"));
        }
      } // end else if
      // event search pelanggan
      else if ( e.target === document.querySelector( ".search-costumer .search-group button" ) ) {
    
        main({
          directory: "../App/index.php?",
          url: "url=Pelanggan/liveSearch",
          keyword: e.target.previousElementSibling.value,
          type: "GET",
          resultType: "json"
        }, function(result) {
          if ( typeof result.status === "boolean" ) {
            data__costumer = result.result;
            page_active = 1;
            setPagination(data__costumer);
            createTable(data__costumer);
          } else console.error(result);
        });
      //end event search costumer
      } else if ( e.target === document.querySelector(".search-order .search-group button") ) {
        main({
          directory: "../App/index.php?",
          url: "url=Pemesanan/liveSearch",
          keyword: e.target.previousElementSibling.value,
          type: "GET",
          resultType: "json"
        }, function(result) {
          if ( typeof result.status === "boolean" ) {
            data__order = result.result;
            page_active = 1;
            setPagination(data__order, document.querySelector(".pages-search-order"));
            createTable(data__order, ["tanggal", "kode_pemesanan", "status"], document.querySelector("#table-order"), document.querySelector(".order-no-result"));
          } else console.error(result);
        });
      //end event search order
      }
    } // end event button pagination
  }); //end event delegation
  
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
  document.querySelector("main").addEventListener("input", function(e) {
    
    //change harga
    if ( e.target.tagName == "SELECT" && e.target.closest(".add-order") ) {
      harga = select_paket.options[select_paket.selectedIndex].dataset.harga;
      inputHarga.value = harga;
      option_paket = select_paket.value;
      
      calcTotal();
      
    //end change harga
    //change berat
    } else if ( e.target === document.querySelector("#berat") ) {
      berat = inputBerat.value;
      if (berat == "" || berat <= 0) berat = 0;
      calcTotal();
    //end change berat
    }
  }); 
  
  // delegation lv 2 => main => click
  document.querySelector("main").addEventListener("click", function(e) {
    //event to-order
    if ( e.target.classList.contains("to-order") ) {
      document.querySelector('.dashboard .add-order')
        .style.display = "flex";
      document.querySelector('.dashboard .add-order')
        .classList.add("content-active");
          
      document.querySelector('.dashboard .search-costumer')
        .style.display = "none";
      document.querySelector('.dashboard .search-costumer')
        .classList.remove("content-active");

      //change display
      document.querySelector(`.dashboard .${switch_class[2]} form`).style.display = "block";
      document.querySelector(`.dashboard .${switch_class[2]} .form-no-permission`).style.display = "none";
      
      
      //isi input berdasarkan baris table pasa button yang di klik
      document.querySelector(".dashboard .add-order .nama").value = data__costumer[e.target.dataset.data_loop]["nama"];
      document.querySelector(".dashboard .add-order .no_hp").value = data__costumer[e.target.dataset.data_loop]["no_hp"];
      
      
    } //end event button to-order
  }); 
  
  document.querySelector("main").addEventListener("dblclick", function (e) {
    if ( e.target.classList.contains("td-status-progress") ) {
      
      let confirm_event = confirm("R U SURE TO CHANGE STATUS BY ID : " + e.target.dataset.change_status_by_id);
      if (confirm_event) {
        main({
          directory: "../App/index.php?",
          url: "url=Pemesanan/change_status",
          keyword: e.target.dataset.change_status_by_id,
          type: "GET",
          resultType: "json"
        }, function(result) {
            if ( result.status == true ) {
              alert("SUCCESS TO CHANGE STATUS")
            } else console.log(result);
        });
      }
    }
  });
  //end delegation lv 2
  
  
  // Event fill var data
  fillData("all");
  
}); //end function LoadDOM

function fillData(  type, keywords = [null, null], add_param = null ) {
  let [column, keyword] = keywords;
  
  
  if (type == "costumer_all" || type == "order_all") {
    
    let data__type = type.split("_")[0];
    
    main({
      directory: "../App/index.php?",
      url: `url=${(data__type == "costumer") ? "Pelanggan" : "Pemesanan"}/liveSearch`,
      keyword: "",
      type: "GET",
      resultType: "json"
    }, function(result) {
      if (typeof result.status === "boolean") {
        data__[data__type]["all"] = result.result;
      } else console.log(result);
    });
  } 
  
  else if ((type == "costumer_search" || type == "order_search") && column != null && keyword != null) {
    let data__type = type.split("_")[0];
    
    if (data__.order.all.length > 1) {
      let result = data__[data__type]["all"].filter(arr => arr[column] === keyword);
      
      if (typeof result == "object" && result.length > 0) {
        data__[data__type]["search"]["keyword"] = keyword;
        data__[data__type]["search"]["result"] = result;
        console.log(result);
        
      } else console.error(`Tidak ada '${keyword}' dalam kolom '${column}' pada object '${data__type}'`);
      
    // jika bukan array
    } else console.error(`data__ -> ${data__type} -> all bukan sebuah array`);
    
  }
  
  else if (type == "order_status") {
    time = (add_param == "__request_wait__") ? 5000 : 0;
    
    setTimeout(() => {
    
    if (data__.order.all.length > 1) {
      data__.order.status.progress = data__.order.all.filter(arr => arr.status === "Progress");
      data__.order.status.complete = data__.order.all.filter(arr => arr.status === "Selesai");
      data__.order.status.takeout = data__.order.all.filter(arr => arr.status === "Telah Di Ambil");
      
    // jika bukan array
    } else console.error(`data__ -> order -> all bukan sebuah array`);
    }, time);
  }
  
  
  
  else if (type == "contents") {
    let list__menu = [
      "Home",
      "Dashboard"
    ];
    
    for ( 
      const [i, m] of list__menu.entries() //entries: memasukan suatu nilai kedalam array 
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
    fillData(  "order_status", [null, null], "__request_wait__"  );
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
  
  console.log(data__["order"]["all"]);
  
  
  //[progress, selesai] = data__.order.all.filter(() => );
  
  [progress, selesai] = data__.order.all.filter((arr, arr2) => {
    /*if (arr.status === "Progress") {
      return ["x", arr];
    } else if (arr.status === "Selesai") {
      return [arr, "x"];
    }
  });
  
  console.log(progress);
  console.log(selesai);
  
}, 3000);
*/


</script>
</body>
</html>
