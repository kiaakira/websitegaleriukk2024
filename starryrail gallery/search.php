<?php
include "koneksi.php";

session_start();

// Proses pencarian
if (isset($_GET['search'])) {
    $keyword = $_GET['search'];
    $sql = "SELECT * FROM foto 
            JOIN user ON foto.userid = user.userid 
            JOIN album ON foto.albumid = album.albumid 
            WHERE judulfoto LIKE '%$keyword%' OR namaalbum LIKE '%$keyword%'";
} else {
    $sql = "SELECT * FROM foto 
            JOIN user ON foto.userid = user.userid 
            JOIN album ON foto.albumid = album.albumid";
}
?>