<?php
// Внешние старты и подключения
session_start();
include('db_connection.php');

//Получение данных из формы.
$username = $_POST['username'];
$password = $_POST['password'];
$repeatpassword = $_POST['repeatpassword'];
$email = $_POST['email'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$github = "";
$telegram = "";
$vkontakte = "";
$facebook = "";
$about = "";
$change_key = "";



// Вызов функции
checkregister($link,$username,$password,$repeatpassword,$email,$name,$surname,$github,$telegram,$facebook,$vkontakte,$about,$change_key);

function checkregister($link,$username,$password,$repeatpassword,$email,$name,$surname,$github,$telegram,$facebook,$vkontakte,$about,$change_key){
    $result = $link->query("SELECT * FROM `users` WHERE `username` = '$username'");
    $result2 = $link->query("SELECT * FROM `users` WHERE `email` = '$email'");
    $user = $result->fetch_assoc();
    $user2 = $result2->fetch_assoc();

    // Обработчик полей ввода.
    $russianSymbols = [
        'А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я',
        'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я'
    ];

    $digitSymbols = [
        '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'
    ];

    $allSymbols = [
        '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '_', '+', '-', '=', '[', ']', '{', '}', '|', ';', ':', ',', '.', '<', '>', '?'
    ];

    $emailSymbols = [
        '!', '#', '$', '%', '^', '&', '*', '(', ')', '+', '-', '=', '[', ']', '{', '}', '|', ';', ':', ',', '<', '>', '?'
    ];

    // Проверка по массивам.
    $containsRussianUsername = false;
    $containsRussianPassword = false;
    $containsRussianEmail = false;

    $containsDigitName = false;
    $containsDigitSurname = false;

    $containsSymbolUsername = false;
    $containsSymbolPassword = false;
    $containsSymbolName = false;
    $containsSymbolSurname = false;

    $containsEmailSymbol = false;

    foreach ($russianSymbols as $symbol) {
        if (strpos($username, $symbol) !== false) {
            $containsRussianUsername = true;
        }
    }

    foreach ($russianSymbols as $symbol) {
        if (strpos($password, $symbol) !== false) {
            $containsRussianPassword = true;
        }
    }

    foreach ($russianSymbols as $symbol) {
        if (strpos($email, $symbol) !== false) {
            $containsRussianEmail = true;
        }   
    }

    // Проверка по массиву на цифры для имени и фамилии



    foreach ($digitSymbols as $symbol) {
        if (strpos($name, $symbol) !== false) {
            $containsDigitName = true;
        }   
    }
    
    foreach ($digitSymbols as $symbol) {
        if (strpos($surname, $symbol) !== false) {
            $containsDigitSurname = true;
        }   
    }  

      // Проверка по массиву на символы для логина , почты , 


    foreach ($allSymbols as $symbol) {
        if (strpos($username, $symbol) !== false) {
            $containsSymbolUsername = true;
        }   
    }

    foreach ($allSymbols as $symbol) {
        if (strpos($password, $symbol) !== false) {
            $containsSymbolPassword = true;
        }   
    }

    foreach ($allSymbols as $symbol) {
        if (strpos($password, $symbol) !== false) {
            $containsSymbolPassword = true;
        }   
    }


    foreach ($allSymbols as $symbol) {
        if (strpos($name, $symbol) !== false) {
            $containsSymbolName = true;
        }   
    }

    foreach ($allSymbols as $symbol) {
        if (strpos($surname, $symbol) !== false) {
            $containsSymbolSurname = true;
        }   
    }

    foreach ($emailSymbols as $symbol) {
        if (strpos($email, $symbol) !== false) {
            $containsEmailSymbol = true;
        }   
    }
     // Проверки для Логина

    if($username === ""){
        $response = [
            'status' => false,
            'message' => "Проверьте правильность поля логин."
        ];
        echo json_encode($response);
        die();
    }

    if($containsRussianUsername == true || $containsSymbolUsername == true){
        $response = [
            'status' => false,
            'message' => "Логин содержит запрещённые символы."
        ];
        echo json_encode($response);
        die();
    }

    if(mb_strlen($username) < 4 || mb_strlen($username) > 16){

        $response = [
            'status' => false,
            'message' => "Длина логина от 4 до 16 символов."
        ];
        echo json_encode($response);
        die();
    }


    // Проверки для пароля
    if($password === ""){
        $response = [
            'status' => false,
            'message' => "Проверьте правильность поля пароль."
        ];
        echo json_encode($response);
        die();
    }

    if($containsRussianPassword == true || $containsSymbolPassword == true){
        $response = [
            'status' => false,
            'message' => "Пароль содержит запрещённые символы."
        ];
        echo json_encode($response);
        die();
    }


    if(mb_strlen($password) < 6 || mb_strlen($password) > 20){

        $response = [
            'status' => false,
            'message' => "Длина пароля от 6 до 20 символов."
        ];
        echo json_encode($response);
        die();
    }

    // Проверка почты

    if($email == ""){
        $response = [
            'status' => false,
            'message' => "Проверьте правильность поля email."
        ];
        echo json_encode($response);
        die();
    }

    if($containsRussianEmail == true || $containsEmailSymbol == true){
        $response = [
            'status' => false,
            'message' => "Почта содержит запрещённые символы."
        ];
        echo json_encode($response);
        die();
    }

    // Проверка имени и фамилии

    if($name === "" || strlen($name) < 2){
        $response = [
            'status' => false,
            'message' => "Проверьте правильность поля имя. Проверьте допустимое количество символов."
        ];
        echo json_encode($response);
        die();
    }

    if($containsDigitName == true || $containsSymbolName == true){
        $response = [
            'status' => false,
            'message' => "Имя содержит запрещённые символы."
        ];
        echo json_encode($response);
        die();
    }

    if($surname === "" || strlen($surname) < 2){
        $response = [
            'status' => false,
            'message' => "Проверьте правильность поля фамилия. Проверьте допустимое количество символов."
        ];
        echo json_encode($response);
        die();
    }

    if($containsDigitSurname == true || $containsSymbolSurname == true){
        $response = [
            'status' => false,
            'message' => "Фамилия содержит запрещённые символы."
        ];
        echo json_encode($response);
        die();
    }

      // Проверка подтверждения пароля

    if($repeatpassword != $password){
        $response = [
            'status' => false,
            'message' => "Пароли не совпадают."
          
        ];
        echo json_encode($response);
        die();
    } 

    // Проверка пользователя в бд
    
    if (!empty($user['username']) == $username) {
     
        $response = [
            'status' => false,
            'message' => "Пользователь с таким именем уже зарегистрирован."
        
        ];
        echo json_encode($response);
        die();
    } 


    if (!empty($user2['email']) == $email) {
     
        $response = [
            'status' => false,
            'message' => "Пользователь с такой почтой уже зарегистрирован."
        ];
        echo json_encode($response);
        die();
     
    } else{

        //Регистрация -> шифрование пароля -> запись в бд данных.
        $password = md5($password);
        $link->query("INSERT INTO `users` (`username`, `password`, `email`, `name`, `surname`,`github`, `telegram`, `facebook`, `vkontakte`, `about`,`change_key`) VALUES ('$username', '$password', '$email', '$name', '$surname', '$github', '$telegram', '$facebook','$vkontakte','$about','$change_key')");
        $link->close();

        $response = [
            'status' => true
        ];
        echo json_encode($response);
    }
}