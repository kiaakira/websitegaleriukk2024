<?php
include "koneksi.php";
if(!isset($_SESSION['userid'])){
    header("location:home.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Alice&family=Poppins:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <title>Document</title>
</head>
<body>
    <div class="lg:flex w-screen h-screen bg-black md:hidden sm: hidden">
        <!-- big navbar -->
        <div class="block container w-[20%] bg-black left-0 md:block hidden sm:hidden ">
           <div class="flex bg-[#FBA1B7] mt-16 bg-opacity-80 my-3 ml-2 rounded-s-2xl">
           <img src="./img/logo.png" alt="" class="ml-3 lg:w-[19%] ml-4 md:w-[13%] sm: w-[15%] my-2 right-0">
       <h1 class="font-alice text-white px-3 py-3 lg:text-3xl px-3 py-4 md:text-2xl px-3 py-4 sm: text-xl px-1 py-2">StarryRail</h1>
           </div>
           <div class="my-2 mx-4 mt-16 p-2 flex border-b-2 border-[#FEA1A1]">
                <a href="user.php" class="flex transform hover:translate-x-7 duration-500">
                <i class="fa-solid fa-user text-[#FEA1A1] mx-3 text-2xl"></i>
               <h1 class="font-poppins text-2xl text-[#FEA1A1]">Profile</h1>
               </a>
            </div>
            <div class="my-2 mx-4 p-2 flex border-b-2 border-[#FEA1A1]">
            <a href="index.php" class="flex transform hover:translate-x-7 duration-500">
                <i class="fa-solid fa-house-chimney text-[#FEA1A1] mx-3 text-2xl"></i>
               <h1 class="font-poppins text-2xl text-[#FEA1A1] transform">Home</h1>
            </a>
            </div>
            <div class="my-2 mx-4 p-2 flex border-b-2 border-[#FEA1A1]">
            <a href="photo.php" class="flex transform hover:translate-x-7 duration-500">
                <i class="fa-solid fa-image text-[#FEA1A1] mx-3 text-2xl"></i>
               <h1 class="font-poppins text-2xl text-[#FEA1A1]">My photo</h1>
            </a>
            </div>
            <div class="my-2 mx-4 p-2 flex border-b-2 border-[#FEA1A1]">
            <a href="album.php" class="flex transform hover:translate-x-7 duration-500">
                <i class="fa-solid fa-folder-open text-[#FEA1A1] mx-3 text-2xl"></i>
               <h1 class="font-poppins my-1 text-2xl text-[#FEA1A1]">My album</h1>
            </a>
            </div>
            <div class="my-2 mx-4 p-2 flex border-b-2 border-[#FEA1A1]">
                <a href="logout.php" class="flex transform hover:translate-x-7 duration-500">
                <i class="fa-solid fa-right-from-bracket text-[#FEA1A1] mx-3 text-2xl"></i>
               <h1 class="font-poppins text-2xl text-[#FEA1A1]">Log-out</h1>
               </a>
            </div>
        </div>
    </div>
        <!-- little sidebar -->
        <div id="sidebar" class="container fixed z-50 h-screen transform -translate-x-full transition-transform duration-300 ease-in-out bg-black left-0 top-0 b0ttom-0 lg:hidden md:w-[35%] sm: w-[60%] ">
        <button id="closeSidebar" class="absolute top-7 right-2 text-lg text-white">
        <i class="fas fa-times"></i>
      </button>
           <div class="flex bg-[#FBA1B7] bg-opacity-80 my-3 ml-2 rounded-s-2xl">
           <img src="./img/logo.png" alt="" class="ml-3 lg:w-[19%] ml-4 md:w-[13%] sm: w-[15%] my-2 right-0">
       <h1 class="font-alice text-white px-3 py-3 lg:text-3xl px-3 py-4 md:text-2xl px-3 py-4 sm: text-xl px-1 py-2">StarryRail</h1>
           </div>
            <div class="my-5 mx-4">
               <h1 class="font-poppins font-bold text-2xl text-[#FEA1A1]">Welcome <br> akira</h1>
               <p class="font-poppins font-semibold text-sm text-white mr-3">find interesting photo for you today</p>
            </div>
            <div class="my-2 mx-4 mt-10 p-2 flex border-b-2 border-[#FEA1A1]">
            <a href="index.php" class="flex transform hover:translate-x-7 duration-500">
                <i class="fa-solid fa-user text-[#FEA1A1] mx-3 text-2xl"></i>
               <h1 class="font-poppins text-2xl text-[#FEA1A1] transform">profile</h1>
            </a>
            </div>
            <div class="my-2 mx-4 p-2 flex border-b-2 border-[#FEA1A1]">
            <a href="index.php" class="flex transform hover:translate-x-7 duration-500">
                <i class="fa-solid fa-house-chimney text-[#FEA1A1] mx-3 text-2xl"></i>
               <h1 class="font-poppins text-2xl text-[#FEA1A1] transform">Home</h1>
            </a>
            </div>
            <div class="my-2 mx-4 p-2 flex border-b-2 border-[#FEA1A1]">
            <a href="photo.php" class="flex transform hover:translate-x-7 duration-500">
                <i class="fa-solid fa-image text-[#FEA1A1] mx-3 text-2xl"></i>
               <h1 class="font-poppins text-2xl text-[#FEA1A1]">My photo</h1>
            </a>
            </div>
            <div class="my-2 mx-4 p-2 flex border-b-2 border-[#FEA1A1]">
            <a href="album.php" class="flex transform hover:translate-x-7 duration-500">
                <i class="fa-solid fa-folder-open text-[#FEA1A1] mx-3 text-2xl"></i>
               <h1 class="font-poppins my-1 text-2xl text-[#FEA1A1]">My album</h1>
            </a>
            </div>
            <div class="my-2 mx-4 p-2 flex border-b-2 border-[#FEA1A1]">
                <a href="logout.php" class="flex transform hover:translate-x-7 duration-500">
                <i class="fa-solid fa-right-from-bracket text-[#FEA1A1] mx-3 text-2xl"></i>
               <h1 class="font-poppins text-2xl text-[#FEA1A1]">Log-out</h1>
               </a>
            </div>
        </div>
    
    <script src="./js/sidebar.js"></script>
</body>
</html>