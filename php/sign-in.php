<?php

session_start();
include('db_connection.php');
// Получение из ajax запроса из формы данных
$username = $_POST['username'];
$password = $_POST['password'];

// Проверка валидации на пустые поля и на минимальное кол-во символов
$error_fields = [];

if($username === "" || strlen($password) < 4){
    $error_fields = 'username';
} else 

if($password === "" || strlen($password) < 6){
    $error_fields = 'password';
}

if(!empty($error_fields)){

    $response = [
        'status' => false,
        'message' => 'Проверьте правильность полей',
        'type' => '1',
        'fields' => $error_fields
    ];

    echo json_encode($response);

    die();
}

// Если выше проверки прошли , то пароль кодируется и вызывается функция
$password = md5($password);
checkauth($link,$username,$password);

function checkauth($link,$username,$password){
   
    $result = $link->query("SELECT * FROM `users` WHERE `username` = '$username'");
    $user = $result->fetch_assoc();
    
    // Проверка на пользователя в бд
    if (empty($user)){
    
        $response = [
            "status" => false,
            "message" => 'Такого аккаунта не существует!'
        ];
        echo json_encode($response);
        die();
    } else
    // Проверка данных пользователя в бд
    if($user['username'] != $username || $user['password'] != $password){
    
        $response = [
            "status" => false,
            "message" => 'Неверный логин или пароль!'
        ];
        echo json_encode($response);
        die();
    
    }else{
           // Если все проверки пройдены, то выполняем авторизацию
        setcookie('user', $user['username'], time() + 3600, "/");
        // Получение данных в сессии из БД при помощи массива
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['password'] = $user['password'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['surname'] = $user['surname'];
        $_SESSION['github'] = $user['github'];
        $_SESSION['facebook'] = $user['facebook'];
        $_SESSION['telegram'] = $user['telegram'];
        $_SESSION['vkontakte'] = $user['vkontakte'];
        $_SESSION['about'] = $user['about'];
   
        
        
        $response = [
            "status" => true
        ];
        echo json_encode($response);
    } 
}