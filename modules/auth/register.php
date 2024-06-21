
<?php if (!empty($_COOKIE['user'])): 
header("Location: ../../index.php");
?>
<?php else: ?>
<?php endif; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/newregister.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css">
    <link rel="stylesheet" href="../../includes/loader.css">
    <title>Регистрация</title>
</head>
<body>
<div id="preloader" style="opacity: 1;">
    <div class="loader"></div>
    <h1>Загрузка страницы...</h1>
    <p>Security by Sk1wz</p>
</div>
<div class="tipo-body">
    <div class="container">

        <div class="logo">
            <a href="../../index.php" class="logo-title"><i class="ri-home-5-line"></i><span>FirstCourses</span></a>
        </div>
        
        <div class="title">Регистрация</div>
        <div class="content">
          <form>
            <div class="user-details">
              <div class="input-box">
                <span class="details">Логин <i class="ri-user-fill"></i></span>
                <input type="text" pattern="[A-Za-z0-9]{4,16}" placeholder="Придумайте логин" required title=" Подсказка: Это поле является обязательным. [A-Za-z0-9]{4-12}" name="username">
              </div>
              <div class="input-box">
                <span class="details">Введите своё имя <i class="ri-file-user-line"></i></span>
                <input type="text" pattern="[A-Za-z,А-Яа-я]{2,}" placeholder="Введите ваше имя" required title="Подсказка: Это поле является обязательным. [A-Za-z,А-Яа-я]{>2}" name="name">
              </div>
              <div class="input-box">
                <span class="details">Почта <i class="ri-mail-line"></i></span>
                <input type="email" placeholder="Введите свою почту" required title="Подсказка: Это поле является обязательным. Указывайте действительную почту." name="email">
              </div>
              <div class="input-box">
                <span class="details">Введите фамилию <i class="ri-file-user-line"></i></span>
                <input type="text" pattern="[A-Za-z,А-Яа-я]{2,}"placeholder="Введите фамилию" required title="Подсказка: Это поле является обязательным. [A-Za-z,А-Яа-я]{>2}" name="surname">
              </div>
              <div class="input-box">
                <span class="details">Пароль <i class="ri-lock-line"></i></span>
                <input type="password" pattern="[A-Za-z0-9]{6,20}" placeholder="Придумайте пароль" required title="Подсказка: Это поле является обязательным. [A-Za-z0-9]{6-20}" name="password">
              </div>
               <div class="input-box">
                <span class="details">Повторите пароль <i class="ri-lock-line"></i></span>
                <input type="password" pattern="[A-Za-z0-9]{6,20}" placeholder="Повторите пароль" required title="Подсказка: Это поле является обязательным. [A-Za-z0-9]{6-20}" name="repeatpassword">
              </div> 
            </div>
            <!-- <div class="info-user-details">
              <input type="radio" name="gender" id="dot-1">
              <input type="radio" name="gender" id="dot-2">
              <input type="radio" name="gender" id="dot-3"> 
             
              <span class="info-user-title">Возможно, скоро...</span>
              <div class="category">
                <label for="dot-1">
                <span class="dot one"></span>
                <span class="info-user">Ученик</span>
              </label>
              <label for="dot-2">
                <span class="dot two"></span>
                <span class="info-user">Студент</span>
              </label>
              <label for="dot-3">
                <span class="dot third"></span>
                <span class="info-user">Преподаватель</span>
              </label>
              </div>
            </div> -->
            <div class="button">
              <input type="submit" class="btn-submit-register" name="submit-reg" value="Регистрация">
            </div>
            <div class="go-login">
              <a href="login.php">Уже есть аккаунт?</a>
            </div>
            <p class="msg none"></p>
                        <style>
                           .msg{
                                color: red;
                                font-size:16px;
                                text-align: center;
                                margin-top: 15px;
                            }
                            .none{
                                display: none;
                            }
                        </style>
          </form>
        </div>
      </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/sign.js"></script>
<script src="../../includes/loader.js"></script>
</html>