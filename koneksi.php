<?php
$koneksi = new mysqli(
	"localhost",
	"root",
	"",
	"siakadk13baru");

if ($koneksi->connect_errno) {
    echo "Failed to connect to MySQL: " . $koneksi->connect_error;
    exit();
  }
  
?>