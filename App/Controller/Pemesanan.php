<?php

class Pemesanan {
  private $table = "pemesanan";
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


  public function change_status($id) {
    $status = "Selesai";
    $query = "UPDATE {$this->table} SET status = :status WHERE id = :id";
    $this->db->query($query);

    $this->db->bind('status', $status);
    $this->db->bind('id', $id);
    $this->db->execute();
    if ($this->db->rowCount() > 0) {
      $result = ["status" => true, "result" => "SUCCESS"];
    } else if ($this->db->rowCount() > 0) {
      $result = ["status" => false, "result" => "Failed"];
    }
    echo json_encode($result);
  }
}