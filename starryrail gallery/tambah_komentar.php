<?php
session_start();
include 'koneksi.php';

$fotoid             = $_POST['fotoid'];
$userid             = $_SESSION['userid'];
$isikomentar        = $_POST['isikomentar'];
$tanggalkomentar    = date('Y-m-d');

$query  = mysqli_query($conn, "INSERT INTO komentarfoto VALUES('','$fotoid','$userid','$isikomentar','$tanggalkomentar')");

echo "<script>
location.href='index.php';
</script>";

?>