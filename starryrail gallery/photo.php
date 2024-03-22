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
    
    <div class="container bg-white absolute right-0 top-0 bottom-0 lg:w-[80%] md:w-screen sm:w-full ">
    <?php include "header.php"; ?>
    <div class="text-center top-5">
               <h1 class="font-poppins font-bold text-4xl text-[#FEA1A1]">My Photo</h1>
                 <p class="font-poppins font-semibold text-xl text-black">upload your photo here</p>
    </div>
    <div class="grid lg:grid-cols-4 gap-1 my-6 ml-2 md:grid-cols-3 gap-2 my-6 sm: grid-cols-2 gap-2 my-6">
    <button onclick="showPhoto()" class="font-poppins shadow-2xl rounded-xl font-semibold p-2 px-5 w-full border-2 border-dashed border-[#FEA1A1] bg-white cursor-pointer ">
     <i class="fa-solid fa-cloud-arrow-up text-[#FEA1A1] text-5xl my-5 mx-2 "></i>
     <h1 class="font-poppins font-semibold text-[#FEA1A1] text-xl my-5 mx-3">upload photo</h1>
    </button> 
   

     <?php
            include "koneksi.php";
            $userid=$_SESSION['userid'];
            $sql=mysqli_query($conn,"select * from foto,album where foto.userid='$userid' and foto.albumid=album.albumid");
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
        <h1 class="font-poppins text-[#EA1179] font-bold text-sm mt-5 mx-3 group-hover:text-black"><?=$data['judulfoto']?> by <?=$_SESSION['username']?></h1>
        <p class="font-poppins text-black text-md mb-3 mx-3 overflow-y-auto opacity-0 transition-opacity duration-300 group-hover:opacity-100 whitespace-pre-wrap"><?=$data['tanggalunggah']?> <br><?=$data['namaalbum']?> <br> <?=$data['deskripsifoto']?></p>
        <div class="flex items-center">
       <a href="#" onclick="openEditModal('foto<?=$data['fotoid']?>')" class="font-poppins font-bold text-sm text-[#FB88B4]">Lihat foto</a>
       <a href="hapus_foto.php?fotoid=<?=$data['fotoid']?>">
     <i class="fa-solid fa-trash text-[#EA1179] text-lg mx-4 "></i>
     </a>
     <a href="#" onclick="openEditModal1('editfoto<?=$data['fotoid']?>')" >
     <i class="fa-solid fa-pen text-[#EE4266] text-lg  "></i>
     </a>
     </div>
      </div>
    </div>
    <div id="foto<?=$data['fotoid']?>" class="hidden fixed bg-opacity-50 bg-black z-40 top-0 left-0 w-screen h-screen justify-center items-center transition-opacity duration-500">
        <div class="container mx-auto max-w-4xl flex h-full flex-1 items-center justify-center">
        <div class="container bg-[#FB88B4] px-5 py-3 bg-opacity-80 rounded-xl lg:translate-y-5 lg:w-[90%] h-[90%] lg:flex md:translate-y-5 md:w-fit md:h-fit md:flex sm: flex-none sm: w-fit sm: h-fit lg:mx-auto my-auto md:mx-2 my-4 ">   
      <div class="container lg:max-w-[40%] md:max-w-[75%] max-h-[40%] sm: max-w-[95%] max-h-[40%] lg:my-3 md:my-5 sm: my-4  ">
       <img class="h-fit w-fit object-cover" src="gambar/<?=$data['lokasifile']?>" alt="" />
       </div>
       <div class="fixed -right-3 -top-3 transition-transform duration-500 hover:rotate-90">
        <a href="#" onclick="closeEditModal('foto<?=$data['fotoid']?>')">
     <i class="fa-solid fa-xmark bg-[#FB88B4] px-5 py-3 rounded-full text-[#EE4266] lg:text-4xl md:text-4xl sm: text-5xl "></i>
     </a> 
    </div>
       <div class="flex-none relative my-auto mx-auto">
       <h1 class="font-poppins text-black font-bold mt-5 mx-3 text-center md:text-3xl"><?=$data['judulfoto']?> by <?=$_SESSION['username']?></h1>
        <div class="flex mx-3 justify-center">
        <h1 class="font-poppins font-bold text-[#EA1179] text-2xl">Nama album:</h1> 
       <p class="font-poppins text-black mx-3 whitespace-pre-wrap md:text-2xl"> <?=$data['namaalbum']?></p>
       </div>
       <div class="flex mx-3 justify-center">
       <h1 class="font-poppins font-bold text-[#EA1179] text-2xl">Tanggal:</h1> 
       <p class="font-poppins text-black mx-3 whitespace-pre-wrap md:text-2xl"> <?=$data['tanggalunggah']?></p>
       </div>
       <div class="flex mx-3 justify-center">
        <h1 class="font-poppins font-bold text-[#EA1179] md:text-2xl">Deskripsi:</h1> 
       <p class="font-poppins text-black mx-3 whitespace-pre-wrap md:text-2xl"> <?=$data['deskripsifoto']?></p>
       </div>
       <div class="flex-none text-center lg:my-10 md:my-10 sm: my-5 ">
        <a href="hapus_foto.php?fotoid=<?=$data['fotoid']?>">
     <i class="fa-solid fa-trash text-[#EE4266] text-2xl mr-4 "></i>
     </a>
     <a href="edit_foto.php?fotoid=<?=$data['fotoid']?>">
     <i class="fa-solid fa-pen text-[#EE4266] text-2xl  "></i>
     </a>
    </div>
        </div>
        

    </div>
        </div>
    </div>
    <div id="editfoto<?=$data['fotoid']?>" class="hidden fixed bg-opacity-50 bg-black top-0 left-0 w-screen h-screen justify-center items-center transition-opacity duration-500">
        <div class="container mx-auto max-w-lg flex h-full flex-1 items-center justify-center">
            <div class="rounded-xl bg-[#EA1179] shadow-2xl">
                <a href="#" onclick="closeEditModal1('editfoto<?=$data['fotoid']?>')">
                    <i class="fa-solid fa-xmark text-2xl translate-x-full translate-y-[1rem] text-[#FFDDCC] absolute"></i>
                </a>
                <form action="update_photo.php" method="post" enctype="multipart/form-data" class="px-8">
            <h3 class="text-2xl font-poppins font-bold text-[#FFDDCC] text-center py-2">edit photo</h3>
            <input type="text" name="fotoid" value="<?=$data['fotoid']?>" hidden>
            <div class="relative mt-5">
                <input type="text" name="judulfoto" id="judulfoto" value="<?=$data['judulfoto']?>" class="peer font-poppins font-semibold border-b-2 h-10 w-full text-[#FFDDCC] border-[#FFDDCC] placeholder-transparent bg-[#EA1179] bg-opacity-10 px-1 focus:outline-none" placeholder="judul foto" required>
                <label for="judulfoto" class="text-[#FFDDCC] absolute text-sm font-poppins font-semibold left-0 -top-3.5 transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-[#FFDDCC] peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-[#FFDDCC] peer-focus:text-sm"> Judul Foto </label>
            </div>
            <div class="relative mt-5">
                <input type="text" name="deskripsifoto" id="deskripsifoto" value="<?=$data['deskripsifoto']?>" class=" translate-y-2 peer font-poppins font-semibold border-b-2 h-10 w-full text-[#FFDDCC] border-[#FFDDCC] placeholder-transparent bg-[#EA1179] bg-opacity-10 px-1 focus:outline-none" placeholder="tambah deskripsi" required></input>
                <label for="deskripsifoto" class="text-[#FFDDCC] absolute text-sm font-poppins font-semibold left-0 -top-4 transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-[#FFDDCC] peer-placeholder-shown:top-3 peer-focus:-top-4 peer-focus:text-[#FFDDCC] peer-focus:text-sm"> Deskripsi Foto </label>
            </div>
       <div class="relative mt-5">
         <select name="albumid" class="peer font-poppins font-semibold text-[#EA1179] border-b-2 translate-y-2 h-8 w-full border-[#FFDDCC] placeholder-transparent text-md px-1 transform focus:outline-none bg-[#FEA1A1] border-[#FEA1A1] rounded text-[#EA1179] " required>
         <?php
                        $userid=$_SESSION['userid'];
                        $sql2=mysqli_query($conn,"select * from album where userid='$userid'");
                        while($data2=mysqli_fetch_array($sql2)){
                    ?>
        <option  value="<?=$data2['albumid']?>" <?php if($data2['albumid']==$data['albumid']){echo 'selected';}?>><?=$data2['namaalbum']?></option>
        <?php } ?>
         </select>
        <label for="albumid" class="text-[#FFDDCC] absolute text-md font-poppins font-semibold left-0 -top-4 transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-[#FFDDCC] peer-placeholder-shown:top-3 peer-focus:-top-4 peer-focus:text-[#FFDDCC] peer-focus:text-sm"> Album </label>
      </div>
       <div class="relative mt-7 translate-y-3">
            <input type="file" name="lokasifile" id="lokasifile" onchange="loadFile(event)" class="peer font-poppins font-semibold text-[#FFDDCC] border-b-2 h-10 w-full border-[#FFDDCC] placeholder-transparent px-1 transform focus:outline-none text-md file:bg-[#FEA1A1] file:border-[#FEA1A1] file:rounded file:text-[#EA1179]" required >
            <label for="lokasifile" class="text-[#FFDDCC] absolute text-md font-poppins font-semibold left-0 -top-7 "> Foto </label>
        </div>
            
        <img id="preview_img1" class="w-[50%] h-44 translate-y-5 m-auto object-cover " src="gambar/<?=$data['lokasifile']?>" alt="Current profile photo" />
         <h3 class="text-2xl font-poppins font-bold text-[#FFDDCC] translate-y-3  text-center py-2">photo preview</h3>
            
         <button type="submit" id="edit" value="edit" class="flex justify-center my-5 mx-auto font-poppins shadow-2xl rounded-xl font-bold text-lg text-white pr-4 py-2 bg-[#D63484] cursor-pointer">
                        <i class="fa-solid fa-pencil text-white text-lg py-1 mx-3 "></i> edit</button>
        </form>
            </div>
        </div>
    </div>
    <?php
            }
        ?>
    </div>
   
        
    <div id="photo" class="hidden fixed bg-opacity-50 bg-black top-0 left-0 w-screen h-screen justify-center items-center transition-opacity duration-500">
    <div class="container mx-auto max-w-lg flex h-full flex-1 items-center justify-center">
        <div class="rounded-xl bg-[#EA1179] shadow-2xl">
     <button onclick="hidePhoto()">
            <i class="fa-solid fa-xmark text-2xl translate-x-full text-[#FFDDCC] absolute"></i>
        </button>    
        <form action="tambah_photo.php" method="post" enctype="multipart/form-data" class="px-8">
            <h3 class="text-2xl font-poppins font-bold text-[#FFDDCC] text-center py-2">upload photo</h3>
            <div class="relative mt-5">
                <input type="text" name="judulfoto" id="judulfoto" class="peer font-poppins font-semibold border-b-2 h-10 w-full text-[#FFDDCC] border-[#FFDDCC] placeholder-transparent bg-[#EA1179] bg-opacity-10 px-1 focus:outline-none" placeholder="judul foto" required>
                <label for="judulfoto" class="text-[#FFDDCC] absolute text-sm font-poppins font-semibold left-0 -top-3.5 transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-[#FFDDCC] peer-placeholder-shown:top-2 peer-focus:-top-3.5 peer-focus:text-[#FFDDCC] peer-focus:text-sm"> Judul Foto </label>
            </div>
            <div class="relative mt-5">
                <textarea type="text" name="deskripsifoto" id="deskripsifoto" class=" translate-y-2 peer font-poppins font-semibold border-b-2 h-10 w-full text-[#FFDDCC] border-[#FFDDCC] placeholder-transparent bg-[#EA1179] bg-opacity-10 px-1 focus:outline-none" placeholder="tambah deskripsi" required></textarea>
                <label for="deskripsifoto" class="text-[#FFDDCC] absolute text-sm font-poppins font-semibold left-0 -top-4 transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-[#FFDDCC] peer-placeholder-shown:top-3 peer-focus:-top-4 peer-focus:text-[#FFDDCC] peer-focus:text-sm"> Deskripsi Foto </label>
            </div>
       <div class="relative mt-5">
         <select name="albumid" class="peer font-poppins font-semibold text-[#EA1179] border-b-2 translate-y-2 h-8 w-full border-[#FFDDCC] placeholder-transparent text-md px-1 transform focus:outline-none bg-[#FEA1A1] border-[#FEA1A1] rounded text-[#EA1179] " required>
         <?php
            include "koneksi.php";
            $userid = $_SESSION['userid'];
            $sql = mysqli_query($conn,"SELECT * FROM album WHERE userid='$userid'");
            while($data = mysqli_fetch_array($sql)){
         ?>
        <option value="<?php echo $data['albumid']; ?>"><?php echo $data['namaalbum']; ?></option>
        <?php } ?>
         </select>
        <label for="albumid" class="text-[#FFDDCC] absolute text-md font-poppins font-semibold left-0 -top-4 transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-[#FFDDCC] peer-placeholder-shown:top-3 peer-focus:-top-4 peer-focus:text-[#FFDDCC] peer-focus:text-sm"> Album </label>
      </div>
       <div class="relative mt-7 translate-y-3">
            <input type="file" name="lokasifile" id="lokasifile" onchange="loadFile(event)" class="peer font-poppins font-semibold text-[#FFDDCC] border-b-2 h-10 w-full border-[#FFDDCC] placeholder-transparent px-1 transform focus:outline-none text-md file:bg-[#FEA1A1] file:border-[#FEA1A1] file:rounded file:text-[#EA1179]" required >
            <label for="lokasifile" class="text-[#FFDDCC] absolute text-md font-poppins font-semibold left-0 -top-7 "> Foto </label>
        </div>
            
        <img id="preview_img" class="w-[50%] h-44 translate-y-5 m-auto object-cover " src="./img/images.png" alt="Current profile photo" />
         <h3 class="text-2xl font-poppins font-bold text-[#FFDDCC] translate-y-3  text-center py-2">photo preview</h3>
            
            <button type="submit" id="submit" class=" flex my-7 mx-auto font-poppins shadow-2xl rounded-xl font-bold text-lg text-white pr-4 py-2 bg-[#D63484] cursor-pointer">
            <i class="fa-solid fa-plus text-white text-lg py-2 mx-2 "></i>    
            upload foto</button> 
        </form>
      </div>
    </div>
  </div>
    <script src="./js/photo.js"></script>
    <script>
       var loadFile = function(event) {  
    var input = event.target;
    var file = input.files[0];
    var type = file.type;
    
    var output1 = document.getElementById('preview_img');
    var output2 = document.getElementById('preview_img1');

    output1.src = URL.createObjectURL(event.target.files[0]);
    output2.src = URL.createObjectURL(event.target.files[0]); 

    output1.onload = function() {
        URL.revokeObjectURL(output1.src) 
    }
};
        function openEditModal(modalId) {
    document.getElementById(modalId).classList.remove('hidden');
}

function closeEditModal(modalId) {
    document.getElementById(modalId).classList.add('hidden');
}

function openEditModal1(modalId) {
    document.getElementById(modalId).classList.remove('hidden');
}

function closeEditModal1(modalId) {
    document.getElementById(modalId).classList.add('hidden');
}
    </script>
</body>
</html>