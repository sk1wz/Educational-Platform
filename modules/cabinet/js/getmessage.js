let block = document.getElementById("message");
block.style.opacity = 0;
block.style.display = 'none';
let myInput1 = document.querySelector("#myInput1");
let myInput2 = document.querySelector("#myInput2");
let myInput3 = document.querySelector("#myInput3");
let myInput4 = document.querySelector("#myInput4");


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
$('.submit-mail').click(function(e) {
    e.preventDefault();
    let myname = $('input[name="myname"]').val();
    let myemail = $('input[name="myemail"]').val();
    let mysubject = $('input[name="mysubject"]').val();
    let mymessage = $('textarea[name="mymessage"]').val();

    
$.ajax({
     
    url: '../../../php/getmessage.php',
    type: 'GET',
    dataType: 'json',
    data: {
        myname: myname,
        myemail: myemail,
        mysubject: mysubject,
        mymessage: mymessage


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