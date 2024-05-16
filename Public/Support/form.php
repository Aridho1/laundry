<script>

let view_massage = false;

</script>

<?php

// if (isset($_POST)) var_dump($_POST); 
// else echo "Post is undefined";
// if (!session_id()) session_start();
// if (isset($_GET)) var_dump($_GET); 
// else echo "Get is undefined";

require "function.php";

if (isset($_GET["button-add-pelanggan"])) {
    $result = addData($_GET, "pelanggan");
    $_GET["button-add-pelanggan"] = null;
    $_GET = [];

    if ($result["affected"] > 0) {
        // print_r($result["last-data"]);
        echo "<script>
          view_massage = [true, '\"CONGRATS!!\nSucces To Add Data.\"'];
        </script>";
    } else {
        echo "<script>
          view_massage = [true, '\"ERROR!!\nUNKOWN ERROR!!!\n\nDuplicate Data.\"'];
        </script>";
    }
  
}

if (isset($_GET["button-add-order"])) {
    $result = addData($_GET, "pemesanan");
    $_GET["button-add-order"] = null;
    $_GET = [];

    if ($result["affected"] > 0) {
        // print_r($result["last-data"]);
        echo "<script>
          view_massage = [true, '\"CONGRATS!!\nSucces To Add Data.\"'];
        </script>";
    } else {
        echo "<script>
          view_massage = [true, '\"ERROR!!\nUNKOWN ERROR!!!\"'];
        </script>";
    }
    
}

header("location: ..");

?>

<script>
  if (view_massage !== undefined && typeof view_massage === "object") {
    alert(view_massage[1]);
    setTimeout(() => {
      window.location.href = "..";
    }, 3000);
  }
</script>