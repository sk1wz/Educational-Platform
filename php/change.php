<?php
session_start();
include('db_connection.php');

$newusername = $_POST['newusername'];
$newpassword = $_POST['newpassword'];
$repeatpassword = $_POST['repeatpassword'];
$newemail = $_POST['newemail'];
$newname = $_POST['newname'];
$newsurname = $_POST['newsurname'];
$newgithub = $_POST['newgithub'];
$newfacebook = $_POST['newfacebook'];
$newvkontakte = $_POST['newvkontakte'];
$newtelegram = $_POST['newtelegram'];
$newabout = $_POST['newabout'];
$user_id = $_SESSION['id'];

change($link,$newusername,$newpassword,$repeatpassword,$newemail,$newname,$newsurname,$newgithub,$newfacebook,$newvkontakte,$newtelegram,$newabout,$user_id);

function change($link,$newusername,$newpassword,$repeatpassword,$newemail,$newname,$newsurname,$newgithub,$newfacebook,$newvkontakte,$newtelegram,$newabout,$user_id){
    $result = $link->query("SELECT * FROM `users`");


    $russianSymbols = [
        'А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я',
        'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я'
    ];

    $digitSymbols = [
        '0', '1', '2', '3', '4', '5', '6', '7', '8', '9',' ',
    ];

    $allSymbols = [
        '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '_', '+', '-', '=', '[', ']', '{', '}', '|', ';', ':', ',', '.', '<', '>', '?',' ',
    ];

    $emailSymbols = [
        '!', '#', '$', '%', '^', '&', '*', '(', ')', '+', '-', '=', '[', ']', '{', '}', '|', ';', ':', ',', '<', '>', '?',' ',
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
        if (strpos($newusername, $symbol) !== false) {
            $containsRussianUsername = true;
        }
    }

    foreach ($russianSymbols as $symbol) {
        if (strpos($newpassword, $symbol) !== false) {
            $containsRussianPassword = true;
        }
    }

    foreach ($russianSymbols as $symbol) {
        if (strpos($newemail, $symbol) !== false) {
            $containsRussianEmail = true;
        }   
    }

    // Проверка по массиву на цифры для имени и фамилии



    foreach ($digitSymbols as $symbol) {
        if (strpos($newname, $symbol) !== false) {
            $containsDigitName = true;
        }   
    }
    
    foreach ($digitSymbols as $symbol) {
        if (strpos($newsurname, $symbol) !== false) {
            $containsDigitSurname = true;
        }   
    }  

      // Проверка по массиву на символы для логина , почты , 


    foreach ($allSymbols as $symbol) {
        if (strpos($newusername, $symbol) !== false) {
            $containsSymbolUsername = true;
        }   
    }

    foreach ($allSymbols as $symbol) {
        if (strpos($newpassword, $symbol) !== false) {
            $containsSymbolPassword = true;
        }   
    }

    foreach ($allSymbols as $symbol) {
        if (strpos($newpassword, $symbol) !== false) {
            $containsSymbolPassword = true;
        }   
    }


    foreach ($allSymbols as $symbol) {
        if (strpos($newname, $symbol) !== false) {
            $containsSymbolName = true;
        }   
    }

    foreach ($allSymbols as $symbol) {
        if (strpos($newsurname, $symbol) !== false) {
            $containsSymbolSurname = true;
        }   
    }

    foreach ($emailSymbols as $symbol) {
        if (strpos($newemail, $symbol) !== false) {
            $containsEmailSymbol = true;
        }   
    }



    // Логин проверка
    $error_fields_username = [];

    if($containsRussianUsername == true || $containsSymbolUsername == true){
        $response = [
            'status' => false,
            'message' => "Логин содержит запрещённые символы.",
            'fields' => $error_fields_username
        ];
        echo json_encode($response);
        die();
    }



    if($newusername != ""){
        if(mb_strlen($newusername) < 4 || mb_strlen($newusername) > 16){

            $response = [
                'status' => false,
                'message' => "Длина логина от 4 до 16 символов.",
                'fields' => $error_fields_username
            ];
            echo json_encode($response);
            die();
            
        }
    }

    
    // !!!!
    $checkUsernameQuery = "SELECT * FROM `users` WHERE username = '$newusername' AND id != $user_id";
    $checkUsernameResult = $link->query($checkUsernameQuery);

    if ($checkUsernameResult->num_rows > 0) {
        $response = [
            'status' => false,
            'message' => "Пользователь с таким логином уже существует.",
            'fields' => $error_fields_username
        ];
        echo json_encode($response);
        die();
    }


    if(empty($error_fields_username) && $newusername !=""){
        $link->query("UPDATE `users` SET username='$newusername' WHERE id = $user_id");
        $response = [
            'status' => true,
            'message' => "Данные успешно изменены!"
        ];
        $_SESSION['username'] = $newusername;
        echo json_encode($response);
       
    }




    // Пароль проверка

    $error_fields_password = [];

    if($containsRussianPassword == true || $containsSymbolPassword == true){
        $response = [
            'status' => false,
            'message' => "Пароль содержит запрещённые символы.",
            'fields' => $error_fields_password
        ];
        echo json_encode($response);
        die();
    }

    if($newpassword != $repeatpassword){ // ?????????????????????????
        $response = [
            'status' => false,
            'message' => "Пароли не совпадают",
            'fields' => $error_fields_password
        ];
        echo json_encode($response);
        die();
    }

    if($newpassword != ""){
         if(mb_strlen($newpassword) < 6 || mb_strlen($newpassword) > 20){

            $response = [
                'status' => false,
                'message' => "Проверьте правильность длины поля пароль.",
                'fields' => $error_fields_password
            ];
            echo json_encode($response);
            die();
            
        }
    }
       
    

    if(empty($error_fields_password) && $newpassword !=""){
        $newpassword = md5($newpassword);
        $link->query("UPDATE `users` SET password='$newpassword' WHERE id = $user_id");
        $response = [
            'status' => true,
            'message' => "Данные успешно изменены!"
        ];
        $_SESSION['password'] = $newpassword;
        echo json_encode($response);
      
    }


    // Почта проверка
    $error_fields_email=[];

    $checkEmailQuery = "SELECT * FROM `users` WHERE email = '$newemail' AND id != $user_id";
    $checkEmailResult = $link->query($checkEmailQuery);

    if ($checkEmailResult->num_rows > 0) {
        $response = [
            'status' => false,
            'message' => "Пользователь с таким логином уже существует.",
            'fields' => $error_fields_email
        ];
        echo json_encode($response);
        die();
    }

    if($containsRussianEmail == true || $containsEmailSymbol == true){
        $response = [
            'status' => false,
            'message' => "Почта содержит запрещённые символы.",
            'fields' => $error_fields_email
        ];
        echo json_encode($response);
        die();
    }

    if($newemail != ""){
         if(strlen($newemail) < 5){
            $response = [
                'status' => false,
                'message' => "Проверьте правильность длины поля почта.",
                'fields' => $error_fields_email
            ];
            echo json_encode($response);
            die();
        }
    }
       
    

    if(empty($error_fields_email) && $newemail !=""){
        $link->query("UPDATE `users` SET email='$newemail' WHERE id = $user_id");
        $response = [
            'status' => true,
            'message' => "Данные успешно изменены!"
        ];
        $_SESSION['email'] = $newemail;
        echo json_encode($response);
     
    }




    // Имя проверка
    $error_fields_name=[];

    if($containsDigitName == true || $containsSymbolName == true){
        $response = [
            'status' => false,
            'message' => "Имя содержит запрещённые символы.",
            'fields' => $error_fields_name
        ];
        echo json_encode($response);
        die();
    }
    if($newname != ""){
         if(strlen($newname) < 2){
            $response = [
                'status' => false,
                'message' => "Проверьте правильность длины поля имя.",
                'fields' => $error_fields_name
            ];
            echo json_encode($response);
            die();
        }
    }
       
    

    if(empty($error_fields_name) && $newname !=""){
        $link->query("UPDATE `users` SET name='$newname' WHERE id = $user_id");
        $response = [
            'status' => true,
            'message' => "Данные успешно изменены!"
        ];
        $_SESSION['name'] = $newname;
     
        echo json_encode($response);
      
    }






    // Фамилия проверка

    $error_fields_surname=[];

    if($containsDigitSurname == true || $containsSymbolSurname == true){
        $response = [
            'status' => false,
            'message' => "Фамилия содержит запрещённые символы."
        ];
        echo json_encode($response);
        die();
    }

    if($newsurname != ""){
        if(strlen($newsurname) < 2){
                    $response = [
                        'status' => false,
                        'message' => "Проверьте правильность длины поля имя.",
                        'fields' => $error_fields_surname
                    ];
                    echo json_encode($response);
                    die();
                }
    }
        
    

    if(empty($error_fields_surname) && $newsurname !=""){
        $link->query("UPDATE `users` SET surname='$newsurname' WHERE id = $user_id");
        $response = [
            'status' => true,
            'message' => "Данные успешно изменены!"
        ];
        $_SESSION['surname'] = $newsurname;
        echo json_encode($response);
     
    }



    if($newgithub != ""){
        $link->query("UPDATE `users` SET github='$newgithub' WHERE id = $user_id");
        $response = [
            'status' => true,
            'message' => "Данные успешно изменены!"
        ];
        $_SESSION['github'] = $newgithub;
        echo json_encode($response);
    }

    if($newfacebook != ""){
        $link->query("UPDATE `users` SET facebook='$newfacebook' WHERE id = $user_id");
        $response = [
            'status' => true,
            'message' => "Данные успешно изменены!"
        ];
        $_SESSION['facebook'] = $newfacebook;
        echo json_encode($response);
    }

    if($newtelegram != ""){
        $link->query("UPDATE `users` SET telegram='$newtelegram' WHERE id = $user_id");
        $response = [
            'status' => true,
            'message' => "Данные успешно изменены!"
        ];
        $_SESSION['telegram'] = $newtelegram;
        echo json_encode($response);
    }
     
    if($newvkontakte != ""){
        $link->query("UPDATE `users` SET vkontakte='$newvkontakte' WHERE id = $user_id");
        $response = [
            'status' => true,
            'message' => "Данные успешно изменены!"
        ];
        $_SESSION['vkontakte'] = $newvkontakte;
        echo json_encode($response);
    }

    if($newabout != ""){
        $link->query("UPDATE `users` SET about='$newabout' WHERE id = $user_id");
        $response = [
            'status' => true,
            'message' => "Данные успешно изменены!"
        ];
        $_SESSION['about'] = $newabout;
        echo json_encode($response);
    }

}