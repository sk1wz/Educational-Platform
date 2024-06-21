// Все переменные / all variables

let menu = document.querySelector("#menu-icon");
let navlinks = document.querySelector(".nav-links");

// Функции / functions


// Слушатели // addEventListeners


// Нажатие / onclicks
menu.onclick = () =>{
menu.classList.toggle("ri-close-fill");
navlinks.classList.toggle('open')
}

// Анимации
// Анимации / animations
// navigation
document.addEventListener("DOMContentLoaded", function(){
    let navanim = document.getElementById("nav-animation");
    navanim.classList.add("animation-show2");
    });