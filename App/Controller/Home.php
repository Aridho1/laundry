<?php

class Home {
  public function getUser() {
    $user =  "Ayla";
    return $user;
  }
  
  public function index() {
    $data["user"] = $this->getUser();
    var_dump( $data["user"] );
  }
}
