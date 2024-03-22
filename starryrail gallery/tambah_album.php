<?php
include "koneksi.php";
session_start();

$namaalbum=$_POST['namaalbum'];
$deskripsi=$_POST['deskripsi'];
$tanggalbuat=date("y-m-d");
$userid=$_SESSION['userid'];

$query=mysqli_query($conn, "INSERT INTO album VALUES('','$namaalbum','$deskripsi','$tanggalbuat','$userid')");

header("location:album.php");
?>