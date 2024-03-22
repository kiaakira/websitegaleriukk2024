// modal function 
function showForm(){
    let form = document.getElementById("form"); 
    form.classList.remove("hidden"); 
    form.classList.add("flex"); 
    setTimeout(() => 
    { 
       form.classList.add("opacity-100"); 
     }, 50);
   } 
   function hideForm(){
    let form = document.getElementById("form"); 
    form.classList.remove("opacity-100"); 
    setTimeout(() => 
    { 
   form.classList.add("hidden"); 
   form.classList.remove("flex"); 
   }, 0);
   }
   
    // modal register 
   function showForm2(){
    let form2 = document.getElementById("form2"); 
    form2.classList.remove("hidden"); 
    form2.classList.add("flex");
    setTimeout(() => 
    { 
    form2.classList.add("opacity-100");
    }, 50);
   } 
   function hideForm2(){ 
       let form2 = document.getElementById("form2"); 
       form2.classList.remove("opacity-100"); setTimeout(() => 
     { 
       form2.classList.add("hidden"); 
       form2.classList.remove("flex");
    }, 0);
   }
   // modal register 
   function showForm3(){
   hideForm();
   showForm2();
   } 
   
   // password
document.addEventListener('DOMContentLoaded', function() {
    const passwordField = document.getElementById('password');
    const toggleButton = document.getElementById('toggleButton');
    const eyeIcon = document.getElementById('eyeIcon');
  
    toggleButton.addEventListener('click', function() {
        if (passwordField.type === "password") {
            passwordField.type = "text";
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        } else {
            passwordField.type = "password";
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        }
    });
  });