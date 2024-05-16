<script>

let view_massage = false;

</script>
<?php
require "function.php";

// if (isset($_POST)) var_dump($_POST); 
// else echo "Post is undefined";
// if (!session_id()) session_start();
// if (isset($_GET)) var_dump($_GET); 
// else echo "Get is undefined";



if (isset($_GET["button-add-pelanggan"])) {
    $result = addData($_GET, "pelanggan");
    $_GET["button-add-pelanggan"] = null;
    $_GET = [];

    if ($result["affected"] > 0) {
        // print_r($result["last-data"]);
        echo "<script>
          view_massage = 'Success add costumer';
        </script>";
        echo "add costumer is success";
    } else {
        echo "<script>
          view_massage = 'Failed add costumer';
        </script>";
        echo "add costumer is false";
    }
  
}

if (isset($_GET["button-add-order"])) {
    $result = addData($_GET, "pemesanan");
    $_GET["button-add-order"] = null;
    $_GET = [];

    if ($result["affected"] > 0) {
        // print_r($result["last-data"]);
        echo "<script>
          view_massage = 'Success add order';
        </script>";
        echo "add order is true";
    } else {
        echo "<script>
          view_massage = 'Failed add costumer';
        </script>";
        echo "add order is false";
    }
    
}

?>

<script>
  
  if (view_massage !== undefined && typeof view_massage === "string") {
    alert(view_massage);
    setTimeout(() => {
      window.location.href = "..";
    }, 3000);
  }
  
document.body.innerHTML = `<p>${typeof view_massage}</p>`;

setTimeout(() => {
  //window.location.href = "..";
}, 3000);

</script>
<!DOCTYPE html>
<html lang="in">
<head>
  <meta charset="UTF-8">
  <title>Judul halaman</title>
</head>
<body>
  <script src="//cdn.jsdelivr.net/npm/eruda"></script>
<script>eruda.init();</script>
</body>
</html>
