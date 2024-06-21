// Анимация 
let block = document.getElementById("message");
block.style.opacity = 0;
block.style.display = 'none';
let myInput1 = document.querySelector("#myInput1");
let myInput2 = document.querySelector("#myInput2");
let myInput3 = document.querySelector("#myInput3");
let myInput4 = document.querySelector("#myInput4");
let myInput5 = document.querySelector("#myInput5");
let myInput6 = document.querySelector("#myInput6");
let myInput7 = document.querySelector("#myInput7");
let myInput8 = document.querySelector("#myInput8");
let myInput9 = document.querySelector("#myInput9");
let myInput10 = document.querySelector("#myInput10");
let myInput11 = document.querySelector("#myInput11");


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

// запрос
$('.btn-submit-change').click(function(e) {
    e.preventDefault();
    let newusername = $('input[name="newusername"]').val();
    let newpassword = $('input[name="newpassword"]').val();
    let repeatpassword = $('input[name="repeatpassword"]').val();
    let newemail = $('input[name="newemail"]').val();
    let newname = $('input[name="newname"]').val();
    let newsurname = $('input[name="newsurname"]').val();
    let newgithub = $('input[name="newgithub"]').val();
    let newfacebook = $('input[name="newfacebook"]').val();
    let newvkontakte = $('input[name="newvkontakte"]').val();
    let newtelegram = $('input[name="newtelegram"]').val();
    let newabout = $('textarea[name="newabout"]').val();

    
$.ajax({
     
    url: '../../../php/change.php',
    type: 'POST',
    dataType: 'json',
    data: {
        newusername: newusername,
        newpassword: newpassword,
        repeatpassword: repeatpassword,
        newemail: newemail,
        newname: newname,
        newsurname: newsurname,
        newgithub: newgithub,
        newfacebook: newfacebook,
        newvkontakte: newvkontakte,
        newtelegram: newtelegram,
        newabout: newabout,


    },
    success(data) {
      if (data.status) {
        block.style.backgroundColor = "green";
        fadeIn(block);
        $('.msg').text(data.message);
        myInput1.value = "";
        myInput2.value = "";
        myInput3.value = "";
        myInput4.value = "";
        myInput5.value = "";
        myInput6.value = "";
        myInput7.value = "";
        myInput8.value = "";
        myInput9.value = "";
        myInput10.value = "";
        myInput11.value = "";

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


