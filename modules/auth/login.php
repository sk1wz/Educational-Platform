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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css">
    <link rel="stylesheet" href="css/newlogin.css">
    <link rel="stylesheet" href="../../includes/loader.css">
    <title>Авторизация</title>
</head>
<body>
<div id="preloader" style="opacity: 1;">
    <div class="loader"></div>
    <h1>Загрузка страницы...</h1>
    <p>Security by Sk1wz</p>
</div>
    <div class="new-container">
        <div class="container">
            <div class="logo">
                <a href="../../index.php" class="logo-title"><i class="ri-home-5-line"></i><span>FirstCourses</span></a>
            </div>
            
            <div class="title">Авторизация</div>
            <div class="content">
                <form>
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Логин <i class="ri-user-fill"></i></span>
                            <input type="text" placeholder="Введите логин" id="my-input" required title="Подсказка: Заполните это поле. Поле минимум 4 символа" pattern="[A-Za-z0-9]{4,}" name="username">
                        </div>
                        <div class="input-box">
                            <span class="details">Пароль <i class="ri-lock-line"></i></span>
                            <input type="password" placeholder="Введите пароль" id="my-input" required title="Подсказка: Заполните это поле. Поле минимум 6 символов" pattern="[A-Za-z0-9]{6,}" name="password">
                        </div>
                        <div class="info-user-details">
                            <div class="chekme"><input type="checkbox" name="remember"><span>Запомнить меня</span></div>
                            <a href="#">Забыл пароль?</a>
                        </div>
                        <div class="button">
                            <input type="submit"  name="submit-auth" value="Авторизоваться" class="btn-submit-login">
                        </div>
                        <div class="info-user-details-2">
                            <a href="register.php">Создать аккаунт <i class="ri-arrow-right-line"></i></a>
                        </div>
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