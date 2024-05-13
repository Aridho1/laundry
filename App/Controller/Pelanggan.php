<?php

class Pelanggan {
  private $table = "pelanggan";
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
    $query = "SELECT * FROM {$this->table} WHERE nama LIKE :search";
    $this->db->query($query);
    $this->db->bind('search', '%' . $keyword . '%');
    $this->db->execute();
    
    $result = $this->db->resultSet();
    
    if (count($result) < 1) {
      $result = ["status" => false, "result" => $result];
    } else $result = ["status" => true, "result" => $result];
    
    echo json_encode($result);
  }
}
