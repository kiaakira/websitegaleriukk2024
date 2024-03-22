<?php
include "koneksi.php";

$username=$_POST['username'];
$password=$_POST['password'];
$email=$_POST['email'];
$namalengkap=$_POST['namalengkap'];
$alamat=$_POST['alamat'];
$duplicate= mysqli_query($conn,"SELECT * FROM user WHERE username = '$username' OR email='$email'");

if (mysqli_num_rows($duplicate)>0){
echo "<script> alert('username atau email sudah di gunakan'); </script>";
}
else{
    if($password==$password){
        $query="INSERT INTO user VALUES('','$username','$password','$email','$namalengkap','$alamat')";
        mysqli_query($conn,$query);
        echo "<script> alert('berhasil registrasi'); </script>";  
    }
}

header("location:home.php");
?>