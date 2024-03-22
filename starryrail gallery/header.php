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
    <title>Home</title>
</head>
<body>
        <div class="flex sticky top-0 bg-white z-40">
       <div class="flex items-Start my-3 ml-2 md:my-4">
           <img src="./img/logo.png" alt="" class="ml-3 lg:w-[10%] ml-4 md:w-[8%] sm: w-[15%] my-2 right-0">
           <h1 class="font-alice text-[#FEA1A1] px-3 py-3 lg:text-5xl px-4 py-4 md:text-4xl py-4 sm: text-3xl px-1 py-2">StarryRail</h1>
       </div>
       
       <div class="lg:flex absolute right-24 h-11 my-8 bg-white shadow rounded border-2 border-[#FEA1A1] hover:border-[#D63484] md:flex right-10 h-11 bg-white shadow rounded border-2 border-[#FEA1A1] hover:border-[#D63484] sm: hidden ">
       <i class="fa-solid fa-search text-[#FEA1A1] px-2 py-3 text-xl"></i> 
       <input type="search" placeholder="search..." class="placeholder-[#FEA1A1] py-3 lg:w-64 md:w-56  focus:outline-none">
       <button type="submit" id="submit" class=" font-poppins shadow-2xl rounded-s-md font-semibold text-md text-white px-4 py-2 bg-[#FEA1A1] cursor-pointer">Search</button> 
    </div>
    
           <button id="sidebar-toggle" class="block text-[#FEA1A1] justify-end my-3 lg:hidden">
              <i class="fas fa-bars text-3xl mr-4"></i>
          </button>
        </div>
        <div class="sm:relative flex h-11 my-4 mx-10 bg-white shadow rounded border-2 border-[#FEA1A1] hover:border-[#D63484] lg:hidden md:hidden">
       <i class="fa-solid fa-search text-[#FEA1A1] px-2 py-3 text-xl"></i> 
       <input type="search" placeholder="search..." class="placeholder-[#FEA1A1] py-3 w-56 focus:outline-none">
       <button type="submit" id="submit" class=" font-poppins shadow-2xl rounded-s-md font-semibold text-md text-white px-4 py-2 bg-[#FEA1A1] cursor-pointer">Search</button> 
    </div>

  
    <script src="./js/sidebar.js"></script>
</body>
</html>