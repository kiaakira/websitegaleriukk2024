<?php
include "koneksi.php";

session_start();
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
    <title>User Profile</title>
</head>
<body>
    <?php include "sidebar.php"; ?>
    
    <div class="container bg-white absolute right-0 top-0 bottom-0 lg:w-[80%] lg:bg-opacity-90 md:w-screen sm:w-full ">
    <div class="flex justify-center my-3 ml-2 md:my-4">
           <img src="./img/logo.png" alt="" class="ml-3 lg:w-[10%] ml-4 md:w-[8%] sm: w-[15%] my-2 right-0">
           <h1 class="font-alice text-[#FEA1A1] px-3 py-3 lg:text-5xl px-4 py-4 md:text-4xl py-4 sm: text-3xl px-1 py-2">StarryRail</h1>
       </div>
    <body class="bg-gray-100">
    <div class="transition-all" id="main">
        <div class="p-4">
            <div class="flex items-center gap-4 mt-4">
                <div>
                    <h2 class="text-2xl font-Poppins text-[#EA1179] font-semibold mb-2">kiraaa</h2>
                    <div class="flex items-center gap-10 mt-4">
                    <span class="text-lg font-poppins">Kai</span>
                    <span class="text-lg font-poppins">jl.pesantren no.17</span>
                    </div>
                </div>
                <a href="#" class="py-2 px-4 rounded bg-[#EA1179] sm:flex items-center gap-2 text-white hover:bg-blue-700 ml-auto">
                    <i class='bx bx-edit-alt'></i>
                    Edit Profile
                </a>
            </div>
        </div>
    </div>
    <h1 class="font-poppins font-bold text-2xl m-5 text-[#FEA1A1]">My Album</h1>
    <div class="grid lg:grid-cols-4 gap-2 my-6 ml-2 md:grid-cols-3 mx-1 gap-2 my-6 sm: grid-cols-2 gap-2 my-6">
    <?php
$userid = $_SESSION['userid'];
$query = mysqli_query($conn, "SELECT * FROM album WHERE userid='$userid'");
while ($data = mysqli_fetch_array($query)) {
?>
    <div class="font-poppins shadow-2xl rounded-xl font-semibold w-full border border-[#FEA1A1] bg-white cursor-pointer">
        <i class="fa-regular fa-images text-[#FEA1A1] text-7xl translate-y-8 lg:mx-[5.5rem] sm:mx-[4rem]   "></i>
        <div class="w-full relative h-fit bg-black right-0 left-0 translate-y-3 rounded-b-xl">
            <h1 class="font-poppins text-[#FEA1A1] text-sm mt-5 mx-3"><?= $data['namaalbum'] ?> by <?= $_SESSION['username'] ?></h1>
            <p class="font-poppins text-[#FEA1A1] text-xs mt-1 mx-3"><?= $data['deskripsi'] ?></p>
            <div class="flex">
                <p class="font-poppins text-[#FEA1A1] text-md mb-3 mx-3"><?= $data['tanggalbuat'] ?></p>
                <div class="flex ml-7">
                    <a href="hapus_album.php?albumid=<?= $data['albumid'] ?>">
                        <i class="fa-solid fa-trash text-[#FEA1A1] text-md translate-y-1 lg:mx-4 sm:mx-2"></i>
                    </a>
                    <a href="#" onclick="openEditModal('album<?=$data['albumid']?>')">
                        <i class="fa-solid fa-pen text-[#FEA1A1] text-md  translate-y-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php }?>
</div>
</body>
</html>
