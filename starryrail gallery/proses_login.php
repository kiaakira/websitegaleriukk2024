<?php
include "koneksi.php";

session_start();

$username=$_POST['username'];
$password=$_POST['password'];
$email=$_POST['email'];
$result = mysqli_query($conn,"SELECT * FROM user WHERE username = '$username' AND email = '$email' ");
$row = mysqli_fetch_assoc($result);
if(mysqli_num_rows($result)>0){
    if($password==$row["password"]){
        $_SESSION["login"]=true;
        $_SESSION["userid"]= $row["userid"];
        $_SESSION["username"]= $row["username"];
        header("location:index.php");
    }else{
        echo "<script> alert('Password salah'); </script>";  
    }
}else{
    echo "<script> alert('anda belum registrasi'); </script>"; 
}
?>