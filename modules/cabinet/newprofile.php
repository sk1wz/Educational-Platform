<?php 
session_start();
if (empty($_COOKIE['user'])): 
    header("Location: ../../auth/login.php");
?>
<?php else: ?>
<?php endif; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/newprofile.css">
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
            <li><a href="#"></i>Личный кабинет</a></li>
            <li><a href="learn.php"></i>Cписок курсов</a></li>
            <li><a href="base.php"></i>База знаний</a></li>
            <li><a href="newsettings.php"></i>Настройки</a></li>
            <li><a href="tech-form.php"></i>Связаться с нами</a></li>
            <li><a href="../../php/logout.php"></i>Выход</a></li>
        </ul>
        
        <div class="nav-btn">
            <a href="#" class="user"><i class="ri-user-fill"></i> <?=$_SESSION['username']?></a>
            <div class="ri-align-justify" id="menu-icon"></div>
        </div>
       
    </nav>

    <div class="container">

        <div class="wrapper-profile">

            <span class="blurr"></span>
            <div class="col-1">
                <div class="card-body">
                    <div class="card-body-in">
                        <h4>Личный профиль</h4>
                        <img src="https://klike.net/uploads/posts/2023-01/1674365337_3-31.jpg" alt="" width="150px" style="border-radius: 50%;">
                        <span>Пользователь: <?=$_SESSION['username']?></span>
                        <div class="card-body-social">
                            <a href="https://<?=$_SESSION['github']?>"><i class="ri-github-fill"></i></a>
                            <a href="https://<?=$_SESSION['facebook']?>"><i class="ri-facebook-fill"></i></a>
                            <a href="https://<?=$_SESSION['telegram']?>"><i class="ri-telegram-fill"></i></a>
                            <a href="https://<?=$_SESSION['vkontakte']?>"><i class="ri-messenger-fill"></i></a>
                        </div>
                        
                    </div>
                   
                </div>

                <div class="card-about">
                    <h4>Описание</h4>
                    <p style="text-align: left; padding:10px;"><?=$_SESSION['about']?></p>
                   
                    
                </div>
            </div>

            <div class="col-2">
                <div class="card-info">
                    <h4>Информация</h4>
                    <div class="card-info-in">
                        <div class="card-info-inner">
                            <p><i class="ri-spy-fill"></i> Личный Идентификатор</p>
                            <input type="text" readonly value="<?=$_SESSION['id']?>" name="id">
                            <p><i class="ri-user-fill"></i> Логин пользователя</p>
                            <input type="text" readonly value="<?=$_SESSION['username']?>" name="username">
                            <p><i class="ri-mail-fill"></i> Почта пользователя</p>
                            <input type="text" readonly value="<?=$_SESSION['email']?>" name="email">
                        </div>
                        
                       
                        <div class="card-info-inner">
                            <p><i class="ri-file-user-line"></i> Имя</p>
                            <input type="text" readonly value="<?=$_SESSION['name']?>" name="name">
                            <p><i class="ri-file-user-line"></i> Фамилия</p>
                            <input type="text" readonly value="<?=$_SESSION['surname']?>" name="surname">
                            <p><i class="ri-vip-crown-2-fill"></i> Cтатус пользователя</p>
                            <input type="text" readonly value="Premium" name="surname">
                        </div>
                   

                      
                       
                    </div>
                    <div class="card-info-btn">
                        <a href="newsettings.php">Редактировать</a>
                    </div>
                </div>

                <div class="card-stat">
                   <h4>Статистика</h4>
                   <?php 
                   include('../../php/db_connection.php');
                   $id = $_SESSION['id'];
            
                   $sql = "SELECT COUNT(*) AS total FROM `status` WHERE `user_id` = $id";
                   $result = $link->query($sql);
                   $row = $result->fetch_assoc();
                   $totalRecords = $row['total']; // Получаем общее количество записей

                   $sql2 = "SELECT COUNT(*) AS total FROM `comments` WHERE `user_id` = $id";
                   $result2 = $link->query($sql2);
                   $row2 = $result2->fetch_assoc();
                   $totalRecords2 = $row2['total']; // Получаем общее количество записей
                   ?>
                   <div class="card-stat-in">
                        <div class="card">
                            <span>Просмотрено курсов</span>
                            <p><?= $totalRecords?></p>
                        </div>
                        <div class="card">
                            <span>Оставлено комментариев</span>
                            <p><?= $totalRecords2 ?></p>
                        </div>
                        <div class="card">
                            <span>Cкоро</span>
                            <p>Cкоро</p>
                        </div>
                   </div>
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
<script src="js/profile-animation.js"></script>
<script src="../../../includes/loader.js"></script>
</html>