// modal album 
function showAlbum(){
    let album = document.getElementById("album"); 
    album.classList.remove("hidden"); 
    album.classList.add("flex");
    setTimeout(() => { 
    album.classList.add("opacity-100");
    }, 50);
   } 
   function hideAlbum(){ 
       let album = document.getElementById("album"); 
       album.classList.remove("opacity-100"); setTimeout(() => 
       { 
       album.classList.add("hidden"); 
       album.classList.remove("flex");
    }, 0);
   }

   function openEditModal(modalId) {
    document.getElementById(modalId).classList.remove('hidden');
}

function closeEditModal(modalId) {
    document.getElementById(modalId).classList.add('hidden');
}
  


 