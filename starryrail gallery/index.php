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
    <title>Document</title>
</head>
<body>
    <?php include "sidebar.php"; ?>
    
    <div class="container bg-white absolute h-screen overflow-x-hidden overflow-y-auto right-0 top-0 bottom-0 lg:w-[80%] md:w-screen sm:w-full ">
    <?php include "header.php"; ?>
    <div class="text-center top-5">
               <h1 class="font-poppins font-bold text-4xl text-[#FEA1A1]">Welcome <?php echo $_SESSION['username'] ?></h1>
                 <p class="font-poppins font-semibold text-xl text-black">find interesting photo for you today</p>
    </div>
    <h1 class="font-poppins font-bold text-2xl m-5 text-[#FEA1A1]">See Album</h1>
    <div class="w-full overflow-x-auto overflow-y-hidden h-fit p-3 my-2 bg-[#EA1179] flex flex-row">
    <?php
            include "koneksi.php";
            $sql3 = mysqli_query($conn, "SELECT * FROM album
            JOIN user ON album.userid = user.userid");    
            while($data=mysqli_fetch_array($sql3)){
        ?> 
        <div class="font-poppins mx-4 shadow-2xl mb-2 rounded-xl font-semibold border border-[#FEA1A1] bg-white cursor-pointer lg:w-60 md:w-60 sm: w-full">
        <i class="fa-regular fa-images text-[#FEA1A1] text-7xl translate-y-8 lg:mx-[5.5rem] sm: mx-16"></i>
        <div class="w-full relative h-fit bg-black right-0 left-0 translate-y-3 rounded-b-xl">
            <h1 class="font-poppins text-[#FEA1A1] text-sm mt-5 mx-3"><?= $data['namaalbum'] ?> by <?= $data['username'] ?></h1>
            <p class="font-poppins text-[#FEA1A1] text-xs mt-1 mx-3"><?= $data['deskripsi'] ?></p>
            <div class="flex">
                <p class="font-poppins text-[#FEA1A1] text-md mb-3 mx-3"><?= $data['tanggalbuat'] ?></p>
                <a href="#" onclick="openEditModal('album<?=$data['albumid']?>')">
                        <p class="text-white text-xs mx-2 font-poppins">Lihat album</p>
                    </a>
            </div>
        </div>
    </div>
    <div id="album<?=$data['albumid']?>" class="hidden fixed z-50 bg-opacity-50 bg-black top-0 left-0 w-screen h-screen justify-center items-center transition-opacity duration-500">
        <div class="container mx-auto max-w-lg flex h-full flex-1 items-center justify-center">
            <div class="rounded-xl bg-white shadow-2xl">
                <a href="#" onclick="closeEditModal('album<?=$data['albumid']?>')">
                    <i class="fa-solid fa-xmark text-2xl translate-x-full translate-y-[1rem] text-[#FFDDCC] absolute"></i>
                </a>
                <div class="grid lg:grid-cols-4 gap-1 my-6 ml-2 md:grid-cols-3 gap-2 my-6 sm: grid-cols-2 gap-2 my-6">
                    
            </div>
            </div>
        </div>
    </div>
        <?php } ?>
    </div>
     
    <h1 class="font-poppins font-bold text-2xl m-5 text-[#FEA1A1]">See Photo</h1>
    <div class="grid lg:grid-cols-4 gap-1 my-6 ml-2 md:grid-cols-3 gap-2 my-6 sm: grid-cols-2 gap-2 my-6">
    <?php
            include "koneksi.php";
            $sql = mysqli_query($conn, "SELECT * FROM foto 
            JOIN user ON foto.userid = user.userid 
            JOIN album ON foto.albumid = album.albumid");
            while($data=mysqli_fetch_array($sql)){
        ?>  
    <div class="group relative cursor-pointer items-center justify-center overflow-hidden ">
      <div class="h-64 w-fit">
        <img class="h-64 w-64 object-cover transition-transform duration-500 group-hover:rotate-3 group-hover:scale-125" src="gambar/<?=$data['lokasifile']?>" alt="" />
      </div>
      <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent  group-hover:blur-lg">
    <div class="absolute inset-0 bg-slate-300 blur-lg opacity-0 group-hover:blur-lg  group-hover:opacity-30"></div>
</div>
  <div class="absolute inset-0 flex translate-y-[60%] flex-col items-center justify-center px-9 text-center transition-all duration-500 group-hover:translate-y-0">
        <h1 class="font-poppins text-[#EA1179] font-bold text-sm mt-5 mx-3 group-hover:text-black"><?=$data['judulfoto']?> by <?=$data['username']?></h1>
        <p class="font-poppins text-black text-md mb-3 mx-3 overflow-y-auto opacity-0 transition-opacity duration-300 group-hover:opacity-100 whitespace-pre-wrap"><?=$data['tanggalunggah']?> <br><?=$data['namaalbum']?> <br> <?=$data['deskripsifoto']?></p>
        <div class="flex items-center">
       <a href="#" onclick="openEditModal('foto<?=$data['fotoid']?>')" class="font-poppins font-bold text-sm text-[#FB88B4]">Lihat foto</a>
     </div>
     <div class="flex items-center">
    <div class="">
        <?php
        $fotoid = $data['fotoid'];
        $userid = $_SESSION['userid'];
        $ceksuka = mysqli_query($conn, "SELECT * FROM likefoto WHERE fotoid='$fotoid' AND userid='$userid'");
        $likeCount = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM likefoto WHERE fotoid='$fotoid'"));
        ?>
        <a href="like.php?fotoid=<?php echo $data['fotoid'] ?>" class="text-md <?php echo (mysqli_num_rows($ceksuka) == 1) ? 'text-[#EE4266]' : 'text-[#FBA1B7]'; ?> focus:outline-none">
            <i class="fa-solid fa-heart"></i>
        </a>
        <span class="mr-2 font-poppins font-bold text-md"><?php echo $likeCount ?></span>
    </div>
    <div class="">
        <?php
        $fotoid = $data['fotoid'];
        $userid = $_SESSION['userid'];
        $cekdislike = mysqli_query($conn, "SELECT * FROM dislikefoto WHERE fotoid='$fotoid' AND userid='$userid'");
        $dislikeCount = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM dislikefoto WHERE fotoid='$fotoid'"));
        ?>
        <a href="dislike.php?fotoid=<?php echo $data['fotoid'] ?>" class="text-md <?php echo (mysqli_num_rows($cekdislike) == 1) ? 'text-[#EE4266]' : 'text-[#FBA1B7]'; ?> focus:outline-none">
            <i class="fa-solid fa-heart-crack"></i>
        </a>
        <span class="mr-2 font-poppins font-bold text-md"><?php echo $dislikeCount ?></span>
    </div>
    <a href="" class="flex mx-2">
        <i class="fa-solid fa-comments text-[#EE4266] text-2xl mx-2 "></i>
        <?php
        $fotoid = $data['fotoid'];
        $sql2 = mysqli_query($conn, "SELECT * FROM komentarfoto WHERE fotoid='$fotoid'");
        ?>
<h1 class="font-poppins text-black font-bold"><?php echo mysqli_num_rows($sql2); ?></h1>
     </a>
     </div>
      </div>
    </div>
    <div id="foto<?=$data['fotoid']?>" class="hidden fixed bg-opacity-50 bg-black py-auto z-50 top-0 left-0 w-screen h-screen flex justify-center items-center transition-opacity duration-500">
    <div class="container mx-auto max-w-3xl max-h-sm items-center justify-center md:flex-none sm:flex-none">
        <div class="container bg-[#FB88B4] max-w-4xl max-h-sm px-5 bg-opacity-80 rounded-xl flex relative sm:flex-none">
            <div class="absolute -right-3 -top-3 z-40 transition-transform duration-500 hover:rotate-90">
                <a href="#" onclick="closeEditModal('foto<?=$data['fotoid']?>')">
                    <i class="fa-solid fa-xmark bg-[#FB88B4] px-5 py-3 rounded-full text-[#EE4266] lg:text-4xl md:text-4xl sm:text-5xl"></i>
                </a>
            </div>
            <div class=" my-5 px-2 lg:flex flex-1 max-w-3xl max-h-sm md:flex sm:flex-none sm:max-h-lg ">
            <div class="flex-none my-auto">
                <img class="h-96 w-96 object-cover" src="gambar/<?=$data['lokasifile']?>" alt="" />
                <div class="relative bottom-0 left-0 flex items-center justify-between">
                <div>
                    <h1 class="font-poppins text-black font-bold md:text-3xl"><?=$data['judulfoto']?> by <?=$data['username']?></h1>
                    <p class="font-poppins text-black whitespace-pre-wrap md:text-xl">Album: <?=$data['namaalbum']?></p>
                    <p class="font-poppins text-black whitespace-pre-wrap md:text-xl">Tanggal: <?=$data['tanggalunggah']?></p>
                </div>
                <div class="flex items-center space-x-4">
                    <?php
                    $fotoid = $data['fotoid'];
                    $userid = $_SESSION['userid'];
                    $ceksuka = mysqli_query($conn, "SELECT * FROM likefoto WHERE fotoid='$fotoid' AND userid='$userid'");
                    $likeCount = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM likefoto WHERE fotoid='$fotoid'"));
                    ?>
                    <a href="like.php?fotoid=<?php echo $data['fotoid'] ?>" class="text-md <?php echo (mysqli_num_rows($ceksuka) == 1) ? 'text-[#EE4266]' : 'text-[#FBA1B7]'; ?> focus:outline-none">
                        <i class="fa-solid fa-heart"></i>
                    </a>
                    <span class="font-poppins font-bold text-md"><?php echo $likeCount ?></span>
                    <?php
                    $fotoid = $data['fotoid'];
                    $userid = $_SESSION['userid'];
                    $cekdislike = mysqli_query($conn, "SELECT * FROM dislikefoto WHERE fotoid='$fotoid' AND userid='$userid'");
                    $dislikeCount = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM dislikefoto WHERE fotoid='$fotoid'"));
                    ?>
                    <a href="dislike.php?fotoid=<?php echo $data['fotoid'] ?>" class="text-md <?php echo (mysqli_num_rows($cekdislike) == 1) ? 'text-[#EE4266]' : 'text-[#FBA1B7]'; ?> focus:outline-none">
                        <i class="fa-solid fa-heart-crack"></i>
                    </a>
                    <span class="font-poppins font-bold text-md"><?php echo $dislikeCount ?></span>
                </div>
            </div>
            </div>
            <div class="flex-none">
    <div class="mx-3 overflow-y-auto relative lg:h-96 md:h-96 sm:h-72">
    <?php
                                        $fotoid = $data['fotoid'];
                                        $komentar = mysqli_query($conn, "SELECT * FROM komentarfoto INNER JOIN user ON komentarfoto.userid=user.userid WHERE komentarfoto.fotoid='$fotoid'");
                                        while ($row = mysqli_fetch_array($komentar)) {
                                            ?>

            <div class="bg-[#FFD9E2] border-b-2 border-r-2 my-3 border-gray-200 sm:px-4 sm:py-4 md:px-4 sm:rounded-lg sm:shadow-sm">
                <div class="flex flex-row">
                    <div class="flex-col mt-1">
                        <div class="flex items-center flex-1 px-4 font-bold leading-tight"><?php echo $row['namalengkap'] ?></div>
                        <div class="flex-1 px-2 ml-2 text-sm font-medium leading-loose text-gray-600"><?php echo $row['isikomentar'] ?></div>
                        <button class="inline-flex items-center px-1 ml-3 flex-column">
                            <a href="hapuskomen.php?komentarid=<?php echo $row['komentarid']; ?>" class="font-poppins text-sm text-[#FA3968]">Delete</a>
                        </button>
                        <button class="inline-flex items-center px-3 -ml-1 text-lg text-white flex-column">
                            <i class="fa-solid fa-heart"></i>
                        </button>
                    </div>
                </div>
            </div>
            <?php } ?>
    </div>
    <form action="tambah_komentar.php" method="post" class="mt-4 mx-4">
    <input type="hidden" name="fotoid" value="<?php echo $data['fotoid']; ?>">
            <div class="flex items-center bg-[#FFD9E2] border border-gray-200 rounded-lg">
                <input type="text" name="isikomentar" placeholder="Tambahkan komentar" class="flex-1 px-3 py-2 focus:outline-none rounded-l-lg">
                <button type="submit" value="tambah" class="bg-[#EE4266] text-white px-4 py-2 rounded-r-lg focus:outline-none hover:bg-[#FA3968]">
                    <i class="fa-solid fa-paper-plane"></i>
                </button>
            </div>
    </form>
</div>


        </div>

        </div>
    </div>
</div>
<?php  }?>
    </div>
    </div>
        
    <script>
      function openEditModal(modalId) {
    document.getElementById(modalId).classList.remove('hidden');
}

function closeEditModal(modalId) {
    document.getElementById(modalId).classList.add('hidden');
} 
    </script>
</body>
</html>