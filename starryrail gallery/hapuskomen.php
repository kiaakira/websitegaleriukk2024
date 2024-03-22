<?php
include 'koneksi.php';

if (isset($_GET['komentarid'])) {
    $komentarid = $_GET['komentarid'];
    $query = "DELETE FROM komentarfoto WHERE komentarid='$komentarid'";
    $result = mysqli_query($conn, $query);
}

// Redirect kembali ke halaman index.php setelah menghapus komentar
echo "<script>location.href='index.php';</script>";
?>
