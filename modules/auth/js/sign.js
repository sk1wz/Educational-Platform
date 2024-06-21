
    /*
        Авторизация
    */

// $('.btn-submit-login').click(function(e) {
//     e.preventDefault();
//     let username = $('input[name="username"]').val();
//     let password = $('input[name="password"]').val();
//     let inputElementPassword = document.querySelector('input[type="password"]');
    
// $.ajax({
    
//     url: '../../../php/sign-in.php',
//     type: 'POST',
//     dataType: 'json',
//     data: {
//         username: username,
//         password: password
//     },
//     success (data){
//         if(data.status){
//             document.location.href = '/';
//         } else{
//             if(data.type === 1){
//                 data.fields.forEach(function (field){
//                     let inputElement = document.querySelector(`input[name="${field}"]`);
//                     inputElement.focus();
//                 })
//             }
//             $('.msg').removeClass('none').text(data.message); 
//             inputElementPassword.value = '';
//         }
     
     
//     }
// });
// });

$('.btn-submit-login').click(function(e) {
    e.preventDefault();
    let username = $('input[name="username"]').val();
    let password = $('input[name="password"]').val();
    let inputElementPassword = document.querySelector('input[type="password"]');
    
    $.ajax({
        url: '../../../php/sign-in.php',
        type: 'POST',
        dataType: 'json',
        data: {
            username: username,
            password: password
        },
        success: function(data) {
            if(data.status){ 
                document.location.href = '/';
            } else{
                if(data.type === '1'){
                    data.fields.forEach(function (field){
                        let inputElement = document.querySelector(`input[name="${field}"]`);
                        inputElement.focus();
                    });
                }
                $('.msg').removeClass('none').text(data.message); 
                inputElementPassword.value = '';
            }
        }
    });
});

    /*
        Регистрация
    */

$('.btn-submit-register').click(function(e) {
    e.preventDefault();
    let username = $('input[name="username"]').val();
    let email = $('input[name="email"]').val();
    let password = $('input[name="password"]').val();
    let repeatpassword = $('input[name="repeatpassword"]').val();
    let name = $('input[name="name"]').val();
    let surname = $('input[name="surname"]').val();
    
  


    $.ajax({
        url: '../../../php/sign-up.php',
        type: 'POST',
        dataType: 'json',
        data: {
            username: username,
            email: email,
            password: password,
            repeatpassword: repeatpassword,
            name: name,
            surname: surname
        },
        success: function(data){
            if(data.status){
                document.location.href = 'login.php';
            } else{
                 
                $('.msg').removeClass('none').text(data.message); 
              
            }

        }
    });
});

