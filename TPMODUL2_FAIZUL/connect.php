<?php
// ============1===========
// Definisikan variabel2 yang akan digunakan untuk melakukan koneksi ke database
$host = "localhost";
$username = "root";
$password = "";
$db = "tp_module2";

// ===========2============
// Definisikan $conn untuk melakukan koneksi ke database
$conn = mysqli_connect($host, $username, $password, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
