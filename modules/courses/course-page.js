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








let block = document.getElementById("message");
block.style.opacity = 0;
block.style.display = 'none';
let myInput1 = document.querySelector("#comment");



function fadeIn(element) {
  element.style.opacity = 0;
  element.style.display = "block";
  let opacity = 0;
  let timer = setInterval(function() {
    if (opacity >= 1) {
      clearInterval(timer);
    }
    element.style.opacity = opacity;
    opacity += 0.1;
  }, 5);
}

// Функция для плавного исчезновения блока
function fadeOut(element) {
  let opacity = 1;
  let timer = setInterval(function() {
    if (opacity <= 0) {
      clearInterval(timer);
      element.style.display = "none";
    }
    element.style.opacity = opacity;
    opacity -= 0.1;
  }, 100);
}
$('.submit-comment').click(function(e) {
    e.preventDefault();
    let personId = $('input[name="personId"]').val();
    let courseName = $('input[name="courseName"]').val();
    let name = $('input[name="name"]').val();
    let comment = $('textarea[name="comment"]').val();

    
$.ajax({
     
    url: '../../../php/comment.php',
    type: 'POST',
    dataType: 'json',
    data: {
        personId: personId,
        name: name,
        courseName: courseName,
        comment: comment


    },
    success(data) {
        if (data.status) {
            block.style.backgroundColor = "green";
            fadeIn(block);
            $('.msg').text(data.message);
            myInput1.value = "";
    
            setTimeout(function() {
              fadeOut(block);
            }, 2000);
         
    
          } else {
            block.style.backgroundColor = "rgb(243, 106, 106)";
            fadeIn(block);
            $('.msg').text(data.message);
            setTimeout(function() {
              fadeOut(block);
            }, 2000);
          }
        }
      
});
});





$('.submit-check').click(function(e) {
  e.preventDefault();
  let personId = $('input[name="personId"]').val();
  let courseName = $('input[name="courseName"]').val();

  
$.ajax({
   
  url: 'update_current_status.php',
  type: 'POST',
  dataType: 'json',
  data: {
      personId: personId,
      courseName: courseName,


  },
  success(data) {
      if (data.status) {
          block.style.backgroundColor = "green";
          fadeIn(block);
          $('.msg').text(data.message);
  
          setTimeout(function() {
            fadeOut(block);
          }, 2000);
       
  
        } else {
          block.style.backgroundColor = "rgb(243, 106, 106)";
          fadeIn(block);
          $('.msg').text(data.message);
          setTimeout(function() {
            fadeOut(block);
          }, 2000);
        }
      }
    
});
});



