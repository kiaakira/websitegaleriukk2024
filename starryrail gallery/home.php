<?php
include "koneksi.php";

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
    <title>Starryrail</title>
</head>
<body>
    <div class="flex">
    <div id="bg" class="bg-black w-full h-screen"></div>
  <nav class="bg-[#FBA1B7] absolute bg-opacity-70 flex justify-between fixed top-0 right-0 left-0 z-40">
        <img src="./img/logo.png" alt="" class="ml-3 lg:w-[7%] ml-4 md:w-[13%] sm: w-[15%] my-2">
       <h1 class="font-alice text-white px-3 py-3 z-40 lg:text-6xl px-3 py-4 md:text-6xl px-3 py-4 sm: text-4xl px-1 py-2">StarryRail</h1>
      <button onclick="showForm()" class="z-40 items-end font-poppins shadow-2xl rounded-xl font-bold p-2 px-5 w-36 bg-[#D63484] cursor-pointer lg:text-2xl my-5 mx-3 sm:text-lg my-5 mx-3 sm: my-3 mr-2">Log-in</button> 
  </nav>
  <button onclick="showForm2()" class="absolute font-poppins shadow-2xl rounded-xl font-bold bg-[#D63484] cursor-pointer lg:text-3xl p-5 px-5 w-64 lg:mx-[42%] lg:my-[35%] md:text-3xl p-5 px-5 w-64 md:mx-[34%] md:my-[67%] sm: mx-[21%] my-[99%] sm: text-2xl p-5 px-5 w-28 ">get started</button>
</div>
    
 





   <!-- modal login -->
   <div id="form" class=" hidden fixed bg-opacity-50 bg-black top-0 z-40 left-0 w-screen h-screen justify-center items-center transition-opacity duration-500">
    <div class="container mx-auto max-w-lg flex h-full flex-1 items-center justify-center">
        <div class="rounded-xl bg-[#EA1179] bg-opacity-70 shadow-2xl">
     <button onclick="hideForm()">
            <i class="fa-solid fa-xmark text-2xl translate-x-80 text-[#FFDDCC] absolute"></i>
        </button>    
        <form action="proses_login.php" method="post" class="p-8">
            <h3 class="text-2xl font-poppins font-bold text-[#FFDDCC] text-center py-2">Log-in</h3>
            <div class="relative mt-5">
                <input type="text" name="username" id="username" class="peer font-poppins font-semibold border-b-2 h-10 w-full text-[#FFDDCC] border-[#FFDDCC] placeholder-transparent bg-[#EA1179] bg-opacity-10 px-1 focus:outline-none" placeholder="masukkan username">
                <label for="username" class="text-[#FFDDCC] absolute text-sm font-poppins font-semibold left-0 -top-3.5 transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-[#FFDDCC] peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-[#FFDDCC] peer-focus:text-sm"> Username </label>
            </div>
            <div class="relative mt-10">
                <input type="text" name="email" id="email" class="peer font-poppins font-semibold border-b-2 h-10 w-full text-[#FFDDCC] border-[#FFDDCC] placeholder-transparent bg-[#EA1179] bg-opacity-10 px-1 focus:outline-none" placeholder="masukkan Email">
                <label for="email" class="text-[#FFDDCC] absolute text-sm font-poppins font-semibold left-0 -top-3.5 transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-[#FFDDCC] peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-[#FFDDCC] peer-focus:text-sm"> Email </label>
            </div>
            <div class="mt-10 relative">
                <input type="password" name="password" id="password" class="peer font-poppins font-semibold border-b-2 h-10 w-full text-[#FFDDCC] border-[#FFDDCC] placeholder-transparent bg-[#EA1179] bg-opacity-10 px-1 focus:outline-none" placeholder="masukkan password">
                <span id="toggleButton" class="absolute z-40 right-3 top-1/2 -translate-y-1/2">
                    <i id="eyeIcon" class="fas fa-eye text-[#FFDDCC] cursor-pointer"></i>
                </span>
                 <label for="password" class="text-[#FFDDCC] absolute text-sm font-poppins font-semibold left-0 -top-3.5 transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-[#FFDDCC] peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-[#FFDDCC] peer-focus:text-sm"> password </label>
            </div>
            <button type="submit" id="submit" class=" my-5 mx-24 font-poppins shadow-2xl rounded-xl font-bold text-lg px-5 p-1 w-28 bg-[#D63484] cursor-pointer">Login</button> 
        </form>
        <p class="text-sm text-[#FFDDCC] text-center my-5 ">jika belum punya akun silahkan registrasi <button class="text-black cursor-pointer" onclick="showForm3()">disini</button> </p>
      </div>
    </div>
  </div>

  <!-- modal register -->
  <div id="form2" class="hidden fixed bg-opacity-50 z-40 bg-black top-0 left-0 w-screen h-screen justify-center items-center z-40 transition-opacity duration-500">
    <div class="container mx-auto max-w-lg flex h-full flex-1 items-center justify-center sm: w-3/4">
    <div class="rounded-xl bg-[#EA1179] bg-opacity-70 shadow-2xl">
    <button onclick="hideForm2()">
            <i class="fa-solid fa-xmark text-2xl translate-x-full text-[#FFDDCC]"></i>
        </button>
        <form action="proses_register.php" method="post" class="p-8">
            <h3 class="text-2xl font-poppins font-bold text-[#FFDDCC] text-center py-2">register</h3>
           <div class="lg:flex md:flex sm: flex-none"> 
            <div class="relative mt-5 lg:mx-3 md:mx-3">
                <input type="text" name="username" id="username" class="peer font-poppins font-semibold border-b-2 h-10 w-full text-[#FFDDCC] border-[#FFDDCC] placeholder-transparent bg-[#EA1179] bg-opacity-10 px-1 focus:outline-none" placeholder="masukkan username">
                <label for="username" class="text-[#FFDDCC] absolute text-sm font-poppins font-semibold left-0 -top-3.5 transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-[#FFDDCC] peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-[#FFDDCC] peer-focus:text-sm"> Username </label>
            </div>
            <div class="relative mt-5">
                <input type="text" name="namalengkap" id="namalengkap" class="peer font-poppins font-semibold border-b-2 h-10 w-full text-[#FFDDCC] border-[#FFDDCC] placeholder-transparent bg-[#EA1179] bg-opacity-10 px-1 focus:outline-none" placeholder="masukkan nama">
                <label for="namalengkap" class="text-[#FFDDCC] absolute text-sm font-poppins font-semibold left-0 -top-3.5 transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-[#FFDDCC] peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-[#FFDDCC] peer-focus:text-sm"> Nama </label>
            </div>
        </div>
        <div class="lg:flex md:flex sm: flex-none">
        <div class="relative mt-5 lg:mx-3 md:mx-3">
            <input type="email" name="email" id="email" class="peer font-poppins font-semibold border-b-2 h-10 w-full text-[#FFDDCC] border-[#FFDDCC] placeholder-transparent bg-[#EA1179] bg-opacity-10 px-1 focus:outline-none" placeholder="masukkan Email">
            <label for="email" class="text-[#FFDDCC] absolute text-sm font-poppins font-semibold left-0 -top-3.5 transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-[#FFDDCC] peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-[#FFDDCC] peer-focus:text-sm"> Email </label>
        </div>
            <div class="mt-5 relative">
                <input type="password" name="password" id="password" class="peer font-poppins font-semibold border-b-2 h-10 w-full text-[#FFDDCC] border-[#FFDDCC] placeholder-transparent bg-[#EA1179] bg-opacity-10 px-1 focus:outline-none" placeholder="masukkan password">
                <span id="toggleButton" class="absolute z-40 right-3 top-1/2 -translate-y-1/2">
                    <i id="eyeIcon" class="fas fa-eye text-[#FFDDCC] cursor-pointer"></i>
                </span>
                 <label for="password" class="text-[#FFDDCC] absolute text-sm font-poppins font-semibold left-0 -top-3.5 transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-[#FFDDCC] peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-[#FFDDCC] peer-focus:text-sm"> password </label>
            </div>
        </div>
        <div class="relative mt-7 lg:mx-2 md:mx-2">
            <textarea type="text" name="alamat" id="alamat" class="peer font-poppins font-semibold border-b-2 h-10 w-full text-[#FFDDCC] border-[#FFDDCC] placeholder-transparent bg-[#EA1179] bg-opacity-10 px-1 focus:outline-none" placeholder="masukkan alamat"></textarea>
            <label for="alamat" class="text-[#FFDDCC] absolute text-sm font-poppins font-semibold left-0 -top-3.5 transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-[#FFDDCC] peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-[#FFDDCC] peer-focus:text-sm"> alamat </label>
        </div>
        <p class="text-sm text-[#FFDDCC] text-center my-5 "> note: anda bisa langsung login jika sudah registrasi</p>
            <button type="submit" id="submit" value="register" class=" my-5 font-poppins shadow-2xl rounded-xl font-bold text-lg px-5 p-2 w-28 bg-[#D63484] cursor-pointer lg:translate-x-40 md:translate-x-40 sm: translate-x-20">Register</button> 
        </form>
        </div>
    </div>
  </div>
    <!-- javascript -->
    <script src="./js/particles.min.js"></script>
    <script src="./js/star.js"></script>
    <script src="./js/login.js"></script>
   
</body>
</html>