<?php

class LoadContent {
  public function contentName($content) {
    $contentPath = "Content/" . $content . "/index.php";
    if (file_exists($contentPath)) {
      require $contentPath;
    } else {
      echo "File not found: " . $contentPath;
    }
  }
}