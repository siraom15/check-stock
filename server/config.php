<?php 
    $conn = new mysqli('localhost', 'root', 'root', 'shop');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
    $conn->set_charset("utf8mb4");
    date_default_timezone_set("Asia/Bangkok");
?>