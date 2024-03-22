<?php
include "koneksi.php";

session_start();
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
    <?php include "sidebar.php"; ?>
    
    <div class="container bg-white overflow-hidden right-0 top-0 bottom-0 lg:w-[80%] lg:absolute  md:w-screen sm: w-screen h-screen ">
    <?php include "header.php"; ?>
    <div class="text-center top-5">
               <h1 class="font-poppins font-bold text-4xl text-[#FEA1A1]">My album</h1>
                 <p class="font-poppins font-semibold text-xl text-black">album for your photo</p>
    </div>
    <div class="grid lg:grid-cols-4 gap-2 my-6 ml-2 md:grid-cols-3 mx-1 gap-2 my-6 sm: grid-cols-2 gap-2 my-6">
    <button onclick="showAlbum()" class="font-poppins shadow-2xl rounded-xl font-semibold p-2 px-5 w-full border-2 border-dashed border-[#FEA1A1] bg-white cursor-pointer ">
     <i class="fa-solid fa-plus text-[#FEA1A1] text-5xl my-5 mx-2 "></i>
     <h1 class="font-poppins font-semibold text-[#FEA1A1] text-xl my-5 mx-3">add album</h1>
    </button> 
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
    <div id="album<?=$data['albumid']?>" class="hidden fixed bg-opacity-50 bg-black top-0 left-0 w-screen h-screen justify-center items-center transition-opacity duration-500">
        <div class="container mx-auto max-w-lg flex h-full flex-1 items-center justify-center">
            <div class="rounded-xl bg-[#EA1179] shadow-2xl">
                <a href="#" onclick="closeEditModal('album<?=$data['albumid']?>')">
                    <i class="fa-solid fa-xmark text-2xl translate-x-full translate-y-[1rem] text-[#FFDDCC] absolute"></i>
                </a>
                <form action="edit_album.php" method="post" class="p-8">
                    <h3 class="text-2xl font-poppins font-bold text-[#FFDDCC] text-center py-2">edit album</h3>
                    <input type="text" name="albumid" value="<?=$data['albumid']?>" hidden>
                    <div class="relative mt-5">
                        <input type="text" name="namaalbum" id="namaalbum" value="<?=$data['namaalbum']?>" class="peer font-poppins font-semibold border-b-2 h-10 w-full text-[#FFDDCC] border-[#FFDDCC] placeholder-transparent bg-[#EA1179] bg-opacity-10 px-1 focus:outline-none" placeholder="masukkan username">
                        <label for="namaalbum" class="text-[#FFDDCC] absolute text-sm font-poppins font-semibold left-0 -top-3.5 transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-[#FFDDCC] peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-[#FFDDCC] peer-focus:text-sm"> Nama album </label>
                    </div>
                    <div class="relative mt-5">
                        <input type="text" name="deskripsi" id="deskripsi" value="<?=$data['deskripsi']?>" class="peer font-poppins font-semibold border-b-2 h-10 w-full text-[#FFDDCC] border-[#FFDDCC] placeholder-transparent bg-[#EA1179] bg-opacity-10 px-1 focus:outline-none" placeholder="masukkan username">
                        <label for="deskripsi" class="text-[#FFDDCC] absolute text-sm font-poppins font-semibold left-0 -top-3.5 transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-[#FFDDCC] peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-[#FFDDCC] peer-focus:text-sm"> Nama album </label>
                    </div>
                    <button type="submit" id="edit" value="edit" class="flex my-5 mx-16 font-poppins shadow-2xl rounded-xl font-bold text-lg text-white pr-4 py-2 bg-[#D63484] cursor-pointer">
                        <i class="fa-solid fa-pencil text-white text-lg py-1 mx-3 "></i> edit</button>
                </form>
            </div>
        </div>
    </div>
<?php
}
?>


    </div>
   
        
    <div id="album" class="hidden fixed z-50 bg-opacity-50 bg-black top-0 left-0 w-screen h-screen justify-center items-center transition-opacity duration-500">
    <div class="container mx-auto max-w-lg flex h-full flex-1 items-center justify-center">
        <div class="rounded-xl bg-[#EA1179] shadow-2xl">
     <button onclick="hideAlbum()">
            <i class="fa-solid fa-xmark text-2xl translate-x-full text-[#FFDDCC] absolute"></i>
        </button>    
        <form action="tambah_album.php" method="post" class="p-8">
            <h3 class="text-2xl font-poppins font-bold text-[#FFDDCC] text-center py-2">Add album</h3>
            <div class="relative mt-5">
                <input type="text" name="namaalbum" id="namaalbum" class="peer font-poppins font-semibold border-b-2 h-10 w-full text-[#FFDDCC] border-[#FFDDCC] placeholder-transparent bg-[#EA1179] bg-opacity-10 px-1 focus:outline-none" placeholder="masukkan username">
                <label for="namaalbum" class="text-[#FFDDCC] absolute text-sm font-poppins font-semibold left-0 -top-3.5 transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-[#FFDDCC] peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-[#FFDDCC] peer-focus:text-sm"> Nama album </label>
            </div>
            <div class="relative mt-5">
                <textarea type="text" name="deskripsi" id="deskripsi" class="peer font-poppins font-semibold border-b-2 h-10 w-full text-[#FFDDCC] border-[#FFDDCC] placeholder-transparent bg-[#EA1179] bg-opacity-10 px-1 focus:outline-none" placeholder="masukkan username"></textarea>
                <label for="deskripsi" class="text-[#FFDDCC] absolute text-sm font-poppins font-semibold left-0 -top-4 transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-[#FFDDCC] peer-placeholder-shown:top-3 peer-focus:-top-4 peer-focus:text-[#FFDDCC] peer-focus:text-sm"> Deskripsi album </label>
            </div>
            
            
            <button type="submit" id="submit" class=" flex my-5 mx-16 font-poppins shadow-2xl rounded-xl font-bold text-lg text-white pr-4 py-2 bg-[#D63484] cursor-pointer">
            <i class="fa-solid fa-plus text-white text-lg py-2 mx-2 "></i>    
            add album</button> 
        </form>
      </div>
    </div>
  </div>

    <script src="./js/album.js"></script>
</body>
</html>