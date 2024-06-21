// Все переменные / all variables
// variables 

const link1 = document.getElementById("link1");
const link2 = document.getElementById("link2");
const link3 = document.getElementById("link3");
const link4 = document.getElementById("link4");
const link5 = document.getElementById("link5");
let menu = document.querySelector("#menu-icon");
let navlinks = document.querySelector(".nav-links");

// Функции / functions
function scrollToElement(elementSelector, instance = 0) {
 
    const elements = document.querySelectorAll(elementSelector);

    if (elements.length > instance) {
       
        elements[instance].scrollIntoView({ behavior: 'smooth' });
    }
}
function scrollToClass(className) {
  const elements = document.getElementsByClassName(className);
  if (elements.length > 0) {
    const element = elements[0];
    element.scrollIntoView({ behavior: 'smooth' });
  }
}

// Слушатели // addEventListeners
link1.addEventListener('click', () => {
    scrollToElement('nav');
});

link2.addEventListener('click', () => {
    scrollToElement('.sub-curse');
});

link3.addEventListener('click', () => {
    scrollToElement('.sub-analitical');
});

link4.addEventListener('click', () => {
  scrollToClass('scrolltop');
 });
link5.addEventListener('click', () => {
  scrollToElement('.sub-plus');
});

// Нажатие / onclicks
menu.onclick = () =>{
menu.classList.toggle("ri-close-fill");
navlinks.classList.toggle('open')
}

// Анимации / animations
// navigation
document.addEventListener("DOMContentLoaded", function(){
let navanim = document.getElementById("nav-animation");
navanim.classList.add("animation-show2");
});

// header
document.addEventListener("DOMContentLoaded", function(){
let headeranim = document.getElementById("header-animation");
headeranim.classList.add("animation-show");
});

// price
window.addEventListener("scroll", function() {

  let priceanim = document.getElementById("price-animation");
  let rect = priceanim.getBoundingClientRect();
  let windowHeight = window.innerHeight;

  if (rect.top < windowHeight) {
   
    priceanim.classList.add("animation-show");
  }
});

// mini-card-analitical
window.addEventListener("scroll", function() {
  let analiticalanim = document.getElementById("card-analitical-animation");
  let rect = analiticalanim.getBoundingClientRect();
  let windowHeight = window.innerHeight;

  if (rect.top < windowHeight) {
   
    analiticalanim.classList.add("animation-show");
    
  }
});

// plus
window.addEventListener("scroll", function() {
  let plusanim = document.getElementById("plus-animation");
  let rect = plusanim.getBoundingClientRect();
  let windowHeight = window.innerHeight;

  if (rect.top < windowHeight) {
   
    plusanim.classList.add("animation-show");
    
  }
});







