const link4 = document.getElementById("link4");
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

