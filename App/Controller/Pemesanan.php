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


  public function change_status($id, $change_to = "Selesai") {
    $status = $change_to;
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
  
  
  public function edit_order($id, $tanggal, $nama, $no_hp, $paket, $harga, $berat, $total_harga) {
    
    $query = "UPDATE {$this->table} SET status = :status WHERE id = :id";
    
    $query = "UPDATE {$this->table} SET
               tanggal = :tanggal,
                nama   = :nama,
                no_hp  = :no_hp,
                 paket = :paket, 
                 harga = :harga,
                 berat = :berat,
           total_harga = :total_harga
              WHERE id = :id";
    
    $this->db->query($query);
    
    $this->db->bind('tanggal', $tanggal);
    $this->db->bind('nama', $nama);
    $this->db->bind('no_hp', $no_hp);
    $this->db->bind('paket', $paket);
    $this->db->bind('harga', $harga);
    $this->db->bind('berat', $berat);
    $this->db->bind('total_harga', $total_harga);
    
    $this->db->bind('id', $id); // Gunakan 'id' yang diterima sebagai argumen
    $this->db->execute();
    
    
    if ($this->db->rowCount() > 0) {
      $result = ["status" => true, "result" => "SUCCESS"];
    } else if ($this->db->rowCount() > 0) {
      $result = ["status" => false, "result" => "Failed"];
    }
    echo json_encode($result);
  }
  
  
  
  
  public function delete_order($id) {
    $query = "DELETE FROM {$this->table} WHERE id = :id";
    
    $this->db->query($query);
    $this->db->bind('id', $id);
    $this->db->execute();
    
    if ($this->db->rowCount() > 0) {
      $result = ["status" => true, "result" => "DELETED SUCCESS"];
    } else if ($this->db->rowCount() > 0) {
      $result = ["status" => false, "result" => "Failed"];
    }
    echo json_encode($result);
  }
  
}
