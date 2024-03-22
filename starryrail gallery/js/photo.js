 //photo modal
 function showPhoto(){
    let photo = document.getElementById("photo"); 
    photo.classList.remove("hidden"); 
    photo.classList.add("flex");
    setTimeout(() => { 
    album.classList.add("opacity-100");
    }, 50);
   } 
   function hidePhoto(){ 
       let photo = document.getElementById("photo"); 
       photo.classList.remove("opacity-100"); setTimeout(() => 
       { 
       photo.classList.add("hidden"); 
       photo.classList.remove("flex");
    }, 0);
   }


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
