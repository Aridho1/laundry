<?php
if (!session_id()) session_start();
class Pengguna {
  private $table = "pengguna";
  private $db;
  
  public function __construct() {
    $this->db = new Database;
  }
  
  
  public function liveSearch($keyword = null) {
    if ($keyword == null || $keyword == "") {
      $this->getAllData();
    } else $this->search($keyword);
  }
  
  public function getAllData() {
    $this->db->query("SELECT * FROM {$this->table}");
    $this->db->execute();
    
    $result = $this->db->resultSet();
    
    $result = ["status" => true, "result" => $result];
    
    echo json_encode($result);
  }
  
  public function search($keyword) {
    $query = "SELECT * FROM {$this->table} WHERE username LIKE :search";
    $this->db->query($query);
    $this->db->bind('search', '%' . $keyword . '%');
    $this->db->execute();
    
    $result = $this->db->resultSet();
    
    if (count($result) < 1) {
      $result = ["status" => false, "result" => $result];
    } else $result = ["status" => true, "result" => $result];
    
    echo json_encode($result);
  }
  
  
  
  public function setSessionLogin($getSession) {

    // $_SESSION["isLogin"] = $getSession == false ? false : true;
    echo $getSession;
    if ( $getSession == "true" ) {
      $_SESSION["isLogin"] = true;
      echo "trueeeee";
    } else if ( $getSession == "false" ) {
      $_SESSION["isLogin"] = false;
      echo "falseeeee";

    }
    var_dump($_SESSION["isLogin"]);
    echo "<script>
      window.location.href = '../Public/index.php';
    </script>";
    
    // $result = ["status" => true, "result" => "Success"];
    
    // echo json_encode($result);
    // var_dump($_SESSION["isLogin"]);
  }
}