setTimeout(function() {
    const preloader = document.getElementById("preloader");
    preloader.style.transition = 'opacity 1s ease-in-out';
    preloader.style.opacity = '0';
   
   }, 1000);
 
 setTimeout(function deletePreloader(){
     const preloader = document.getElementById("preloader");
     preloader.style.display = 'none';
 },1700);