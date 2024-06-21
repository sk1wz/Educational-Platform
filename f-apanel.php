<?php 
$db_host = 'localhost';
$db_name = 'FirstCourses';
$db_user = 'root';
$db_password = '';
$link = mysqli_connect($db_host, $db_user, $db_password, $db_name); // Соединяемся с базой

if(isset($_POST['submit-admin'])){
    $adminname = $_POST['adminname'];
    $adminpassword = $_POST['adminpassword'];

    $result = $link->query("SELECT * FROM `admins` WHERE `adminname` = '$adminname'");
    $user = $result->fetch_assoc();

if($user['adminname'] != $adminname || $user['adminpassword'] != $adminpassword){
    echo("Ошибка");
}else{
       // Если все проверки пройдены, то выполняем авторизацию
    setcookie('adminuser', $user['adminname'], time() + 3600, "/");
    header("Location: ../modules/apanel/apanel.php");
} 
}
if(!empty(($_COOKIE['adminuser']))){
    header("Location: ../modules/apanel/apanel.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход Админ-Панель</title>
</head>
<body>
    <style>
     *{
    padding: 0;
    margin: 0;
    outline: none;
    border: none;
    box-sizing: border-box;
}


::-webkit-scrollbar{
    width: 6px;
}

::-webkit-scrollbar-track {
    background-color: #181818;
}
  
::-webkit-scrollbar-thumb {
    background-color:rgb(243, 106, 106);
}

a{
    text-decoration: none;
}

body{
    font-family: 'Poppins', sans-serif;
    background-color: #18181B;
}

        .container form{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: absolute;
            left: 50%;
            top: 40%;
            transform: translate(-50%, -50%);
        }
        .container form input{
            border-radius: 15px;
            margin-top: 20px;
            width: 300px;
            height: 45px;
            padding: 5px;
            background-color: grey;
            color: white;
        }
        .container form input::placeholder{
            color: white;
        }
        .container form input:focus{
            color: red;
        }

  
    </style>
    
    <section class="container">
        
        <form action="f-apanel.php" method="POST">
            <h1 style="color: red;">Админ-Панель</h1>
        <input type="text" name="adminname" placeholder="Админ-имя">
        <input type="password" name="adminpassword" placeholder="Админ-пароль">
        <input type="submit" value="Войти" name="submit-admin">
        </form>
    </section>
</body>

</html>