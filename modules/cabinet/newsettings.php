<?php 
session_start();
if (empty($_COOKIE['user'])): 
    header("Location: ../auth/login.php");
?>
<?php else: ?>
<?php endif; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/newsettings.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css">
    <link rel="stylesheet" href="css/all-animation.css">
    <link rel="stylesheet" href="../../../includes/loader.css">
    <title>Профиль</title>
</head>
<body>

    <div id="preloader" style="opacity: 1;">
        <div class="loader"></div>
        <h1>Загрузка страницы...</h1>
        <p>Security by Sk1wz</p>
    </div>
     <nav id="nav-animation" class="nav-animation">
        <a href="../../../../index.php" class="logo"><i class="ri-home-5-line"></i><span>FirstCourses</span></a>
    
        <ul class="nav-links">
            <li><a href="newprofile.php"></i>Личный кабинет</a></li>
            <li><a href="learn.php"></i>Cписок курсов</a></li>
            <li><a href="base.php"></i>База знаний</a></li>
            <li><a href="#"></i>Настройки</a></li>
            <li><a href="tech-form.php"></i>Связаться с нами</a></li>
            <li><a href="../../php/logout.php"></i>Выход</a></li>
        </ul>
        
        <div class="nav-btn">
            <a href="newprofile.php" class="user"><i class="ri-user-fill"></i> <?=$_SESSION['username']?></a>
            <div class="ri-align-justify" id="menu-icon"></div>
        </div>
       
    </nav>
    <div id="message"><p class="msg"></p></div>
    <div class="container">

        <div class="wrapper-profile">
      
            <span class="blurr"></span>
            <div class="col-1">
        
                <div class="card-body">
                    <div class="card-body-in">
                        <h4>Редактирование профиля</h4>
                        <img src="https://klike.net/uploads/posts/2023-01/1674365337_3-31.jpg" alt="" width="150px" style="border-radius: 50%;">
                        
                        <div class="card-body-settings">
                            <p>Ваше имя пользователя: <?=$_SESSION['username']?></p>
                        </div>
                    </div>
                   
                </div>

                <div class="card-about">
                    <form>
                    <h4>Редактировать описание</h4>
                     
                    <textarea name="newabout" id="myInput11" placeholder="Описание обо мне:" maxlength="100" oninput="updateCounter(this)"></textarea>
                    <div class="card-about-counter">
                    <span id="counter">100</span><span>/100</span>
                   
                    </div>
                </div>
            </div>

            <div class="col-2">
   
                <div class="card-info">
                   
                            <h4>Основная информация</h4>
                       
                            <div class="card-info-in">

                                <div class="card-info-inner">
                                    <p><i class="ri-user-fill"></i> Логин</p>
                                    <input type="text" id="myInput1" placeholder="Пример: test" pattern="[A-Za-z0-9]{4,16}" name="newusername" title="Подсказка: Заполните это поле. [A-Za-z0-9]{4,16}">
                                    <p><i class="ri-mail-fill"></i> Почта</p>
                                    <input type="text" id="myInput2" placeholder="Пример: test@mail.ru" name="newemail" title="Подсказка: Заполните это поле.">
                                    <p><i class="ri-lock-fill"></i> Новый пароль</p>
                                    <input type="password" id="myInput3" placeholder="Введите новый пароль" pattern="[A-Za-z0-9]{6,20}" name="newpassword" title="Подсказка: Заполните это поле. [A-Za-z0-9]{6,20}">
                                </div>
                                
                            
                                <div class="card-info-inner">
                                
                                    <p><i class="ri-file-user-line"></i> Имя</p>
                                    <input type="text" id="myInput4" placeholder="Пример: Василий" pattern="[A-Za-z,А-Яа-я]{2,}" name="newname" title="Подсказка: Заполните это поле. [A-Za-z,А-Яа-я]{>2}">
                                    <p><i class="ri-file-user-line"></i> Фамилия</p>
                                    <input type="text" id="myInput5" placeholder="Пример: Васильев" pattern="[A-Za-z,А-Яа-я]{2,}" name="newsurname" title="Подсказка: Заполните это поле. [A-Za-z,А-Яа-я]{>2}">
                                    <p><i class="ri-lock-fill"></i> Повторите новый пароль</p>
                                    <input type="password" id="myInput6" placeholder="Повторите новый пароль" pattern="[A-Za-z0-9]{6,20}" name="repeatpassword" title="Подсказка: Заполните это поле. [A-Za-z0-9]{6,20}">
                                </div>
                                
                
                            </div>
                            <h4>Дополнительные настройки</h4>
                            <div class="card-info-in">


                                <div class="card-info-inner">
                            
                                    <p><i class="ri-github-fill"></i> GitHub</p>
                                    <input type="text" id="myInput7" placeholder="Пример: github.com/id" name="newgithub">
                                 
                                    <p><i class="ri-facebook-fill"></i> FaceBook</p>
                                    <input type="text" id="myInput8" placeholder="Пример: facebook.com/id" name="newfacebook">
                                </div>


                                <div class="card-info-inner">
                                    <p><i class="ri-vk-fill"></i> Vkontakte</p>
                                    <input type="text" id="myInput9" placeholder="Пример: vk.com/id" name="newvkontakte">
                                 
                                    <p><i class="ri-telegram-fill"></i> Telegram</p>
                                    <input type="text" id="myInput10" placeholder="Пример: t.me/id" name="newtelegram">
                                </div>


                            </div>
                            
                        

                            <div class="card-info-btn">
                                <button type="submit" name="submit" class="btn-submit-change">Сохранить настройки</button>
                            </div>
                       </form>
                </div>
            
            </div>
        </div>

    </div>
    <footer class="container">
        <div class="column">
            <div class="logo">
                <h1>FirstСourses</h1>
            </div> 
            <p>
                <a href="https:/vk.com/sk1wz" style="color: white;"><i class="ri-copyright-line"></i>2023 By sk1wz</a>
            </p>
            <div class="socials">

                <a href="#"><i class="ri-discord-line"></i></a>
                <a href="#"><i class="ri-telegram-line"></i></a>
         
            </div>
        </div>
        <div class="column">
            <h4>Информация</h4>
            <a href="base.php">База знаний</a>
            <a href="learn.php">Список курсов</a>
            <a href="#">-</a>
        </div>
        <div class="column">
            <h4>Документы</h4>
            <a href="#">Пользовательское соглашение</a>
            <a href="#">Политика конфиденциальности</a> 
       
        </div>
        <div class="column">
            <h4>Наши контакты</h4>
            <a href="#">FirstCourses@mail.ru</a>
            <a href="#">FirstCourses@yandex.ru</a>
            <a href="#">FirstCourses@gmail.com</a>
        </div>
    </footer>
    
</body>
<script src="https://code.jquery.com/jquery-latest.min.js"></script>
<script src="js/profile-animation.js"></script>
<script src="../../../includes/loader.js"></script>
<script src="js/change.js"></script>
<script>
    function updateCounter(about) {
  var maxLength = about.getAttribute('maxlength');
  var currentLength = about.value.length;
  var remainingLength = maxLength - currentLength;
  document.getElementById('counter').textContent = remainingLength;
}
</script>
</html>