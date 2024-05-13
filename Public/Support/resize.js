/* Resize body - Check responsive */

//tambahkan transisi pada body
document.body.style.transition = "width 1s ease";



//eksekusi func untuk mengatasi event transisi yang telat
setTimeout(function() {
  setSizeOfBody(document.body.clientWidth, 100);
}, 100);

//func untuk merubah widh dari 'screen | content' atau memberitahu css media query bahwa size berubah.
function setContentSize(size = false, previous = 0, massage = false) {
  this.size = size; this.previous = previous; this.massage = massage;
  setTimeout(function(size = this.size, previous = this.previous, massage = this.massage) {
  //ambil elemen meta yang attribute name nya memiliki value viewport
  let meta = document.querySelector('meta[name="viewport"]');
  
  //jika tidak ditemukan, create elemen meta
  if (meta == null) {
    document.querySelector("head").innerHTML += "<meta id=\"meta-content\" name=\"viewport\" content=\"width=800, initial-scale=0.8\"/>";
    
    meta =   document.querySelector('meta[name=viewport]');
  }
  
  let content = meta.getAttribute('content');
  
  //ambil str yang dibutuhkan (value)
  /*
  let property = content.split(", ");
  let width = property[0];
  let value = width.split("=")[1];
  */
  
  //ubah menjadi chain (rantai)
  let value = content.split(", ")[0].split("=")[1];
  
  if (size === false) size = document.body.clientWidth;
  
  content = content.replace(value, size);
  
  meta.setAttribute('content', content);
  
  
  //kirim log pesan
  if (previous === size) {
    console.log(`Ukuran window saat ini, width = ${size}`);
  } else {
    console.log(massage, previous, "->", size);
  }
  }, 500);
}

document.querySelector("head").innerHTML += "<link rel=\"icon\" href=\"\">";

let photo_profile_web = document.querySelector("head link[rel=icon]");

function setSizeOfBody(width = 980, time = false) {
  if (typeof width !== "number") return "parameter ke-1 harus number";
  if (typeof time !== "number" && typeof time !== "boolean") return "parameter ke-2 harus boolean atau number";

  let width_previous = document.body.clientWidth;
  let width_default = 980;

  if (time === false && width_previous !== width) {
    setTimeout(function() {
      document.body.style.width = width_previous + "px";
      setContentSize(width_previous, width, "Mengembalikan size window, width =");
    }, 10000);
  } else if (typeof time === "number" && width_previous !== width) {
    setTimeout(function() {
      document.body.style.width = width_previous + "px";
      setContentSize(width_previous, width, "Mengembalikan size window, width =");
    }, time);
  }
  
  document.body.style.width = width + "px";
  setContentSize(width, width_previous, "Mengubah size window, width =");
}

function body(p1, p2) {
  setSizeOfBody(p1, p2);
}
