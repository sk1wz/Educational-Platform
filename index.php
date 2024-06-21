<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/index-animation.css">
    <title>FirstCourses</title>
</head>
 <!-- Иконки -->
 <!-- https://remixicon.com/ -->
 
<body>
 <!-- навигация navigation -->
 <div id="preloader" style="opacity: 1;">
    <div class="loader"></div>
    <h1>Загрузка страницы...</h1>
    <p>Security by Sk1wz</p>
</div>
<div class="scrolltop"></div>
 <nav id="nav-animation" class="nav-animation">
    <a href="#" class="logo"><i class="ri-home-5-line"></i><span>FirstCourses</span></a>

    <ul class="nav-links">
        <?php if (empty($_COOKIE['user'])): ?>
        <li><a href="#" id="link1" class="activate">Главная</a></li>
        <li><a href="#" id="link2">Наши курсы</a></li>
        <li><a href="#" id="link3">Аналитика</a></lУi>
        <li><a href="#" id="link5">Плюсы</a></li>

        <?php else: ?>
      
        <li><a href="#" id="link1" class="activate">Главная</a></li>
        <li><a href="#" id="link2">Наши курсы</a></li>
        <li><a href="#" id="link3">Аналитика</a></lУiк>
        <li><a href="#" id="link5">Плюсы</a></li>
        <li><a href="php/logout.php" >Выход</a></li>
        <?php endif; ?>
    </ul>
    
    <div class="nav-btn">
    <?php if (empty($_COOKIE['user'])):  ?>
    
        <a href="modules/auth/login.php" class="user"><i class="ri-user-fill"></i>Войти</a>
        <div class="ri-align-justify" id="menu-icon"></div>
       
        <?php else: ?>
        <a href="modules/cabinet/newprofile.php" class="user"><i class="ri-user-fill"></i> <?=$_SESSION['username']?></a>
        <div class="ri-align-justify" id="menu-icon"></div>
        <?php endif; ?>

    </div>
   
</nav>


    <!-- Главный блок main block -->
    <header class="container header-animation" id="header-animation">
        <div class="content">
            <span class="blurr"></span>
            <span class="blur"></span>
            <H1>Добро пожаловать посетитель</H1>
            <p>
                FirstСourses - это компания, специализирующаяся на предоставлении курсов-учебников по программированию. Наша миссия - помочь студентам освоить навыки программирования и стать экспертами в своей области. 
            </p>
            <a href="#" class="btn">Начать</a>
        </div>
        <div class="image">
            <img src="images/pngwing.com.png" alt="">
        </div>
    </header>

     <button class="round-button" id="link4"><i class="ri-arrow-up-line"></i></button> 


<!-- Описание к блоку с картами курсов-->
    <section class="container">
        <h2 class="sub-curse">Возможные материалы</h2>
        <p class="sub-curse-info">
           В данном разделе представлены материалы , которые вы можете просмотреть.
        </p>
        <!-- Карты курса cards course  -->
    
        <div class="price price-animation" id="price-animation"> 
            <div class="card">
                <div class="content">
                    <h4>Курс по HTML5 <i class="ri-code-box-line"></i></h4>
                    <h3>Бесплатно</h3>
                    <p>
                        <span>•</span>
                        Базовые знания HTML5
                    </p>
                    <p>
                        <span>•</span>
                    Хорошая документация
                    </p>
                    <p>
                        <span>•</span>
                       Решение задач
                    </p>
                    <p>
                        <span>•</span>
                       Создание разметок различных типов
                    </p>
                
                </div>
                <a href="modules/cabinet/learn.php" class="btn">Подробнее</a>
            </div>
            <div class="card">
                <div class="content">
                    <h4>Курс по CSS3 <i class="ri-code-box-line"></i></h4>
                    <h3>Бесплатно</h3>
                    <p>
                        <span>•</span>
                       Базовые знания CSS3
                    </p>
                    <p>
                        <span>•</span>
                    Хорошая документация
                    </p>
                    <p>
                        <span>•</span>
                       Решение задач
                    </p>
                    <p>
                        <span>•</span>
                      Создание стилей для HTML страниц
                    </p>
                </div>
                <a href="modules/cabinet/learn.php" class="btn">Подробнее</a>
            </div>
            <div class="card">
                <div class="content">
                    <h4>Курс по JavaScript <i class="ri-code-box-line"></i></h4>
                    <h3>Бесплатно</h3>
                    <p>
                        <span>•</span>
                       Базовые знания JavaScript
                    </p>
                    <p>
                        <span>•</span>
                        Хорошая документация
                    </p>
                    <p>
                        <span>•</span>
                       Решение задач
                    </p>
                    <p>
                        <span>•</span>
                       Создание анимаций и многое другое
                    </p>
           
                </div>
                <a href="modules/cabinet/learn.php" class="btn">Подробнее</a>
            </div>
            <span class="blur1"></span>
            <div class="card">
                <div class="content">
                    <h4>Курс по PHP <i class="ri-code-box-line"></i></h4>
                    <h3>Бесплатно</h3>
                    <p>
                        <span>•</span>
                       Базовые знания PHP
                    </p>
                    <p>
                        <span>•</span>
                        Хорошая документация
                    </p>
                    <p>
                        <span>•</span>
                       Решение задач
                    </p>
                    <p>
                        <span>•</span>
                       Создание проекта вместе с БД
                    </p>
           
                </div>
                <a href="modules/cabinet/learn.php" class="btn">Подробнее</a>
            </div>
            <div class="card">
                <div class="content">
                    <h4>Курс по Python <i class="ri-code-box-line"></i></h4>
                    <h3>Бесплатно</h3>
                    <p>
                        <span>•</span>
                       Базовые знания Python
                    </p>
                    <p>
                        <span>•</span>
                        Хорошая документация
                    </p>
                    <p>
                        <span>•</span>
                       Решение задач
                    </p>
                    <p>
                        <span>•</span>
                       Создание первых скриптов
                    </p>
           
                </div>
                <a href="modules/cabinet/learn.php" class="btn">Подробнее</a>
            </div>
            <div class="card">
                <div class="content">
                    <h4>Курс по С++ <i class="ri-code-box-line"></i></h4>
                    <h3>Бесплатно</h3>
                    <p>
                        <span>•</span>
                       Базовые знания С++
                    </p>
                    <p>
                        <span>•</span>
                        Хорошая документация
                    </p>
                    <p>
                        <span>•</span>
                       Решение задач
                    </p>
                    <p>
                        <span>•</span>
                       Создание консольных приложений
                    </p>
           
                </div>
                <a href="modules/cabinet/learn.php" class="btn">Подробнее</a>
            </div>
        </div>

    </section>

    <section class="container">
           
            <h1 class="sub-analitical">Аналитика</h1>
            <p class="sub-analitical-info">
                Блок аналитики сайта предоставляет подробную информацию о посещаемости, поведении пользователей и эффективности нашего веб-сайта.
            </p>

            <div class="card-analitical card-analitical-animation" id="card-analitical-animation">
                <div class="mini-card">
                    <div class="content">
                        <i class="ri-eye-line"></i>

                        <h2>Посетителей</h2>
                      
                        <h3 id="number">1000+</h3> 
                        
                    </div>
                </div>

                <div class="mini-card">
                    <div class="content">
                        
                        <i class="ri-task-fill"></i>

                        <h2>Пройденых курсов</h2>
            
                        <h3 id="number">1000+</h3> 
                
                    </div>
                </div>

                <div class="mini-card">
                    <div class="content">
                       
                        <i class="ri-user-add-fill"></i>

                        <h2>Зарегистрированно</h2>
                       
                        <h3 id="number">1000+<h3> 

                    </div>
                </div>
            </div>
    </section>
    
    <section class="container">
        <h1 class="sub-plus">Наши Преимущества</h1>
        <p class="sub-plus-info">
            Основные наши плюсы компании.
        </p>

        <div class="plus plus-animation" id="plus-animation">
            
            <div class="plus-image">
                 <i class="ri-number-1"></i>
            
            </div>
            
            <div class="plus-content">
                <h1>Качество</h1>
                <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam ea excepturi tenetur aperiam eius voluptate, aliquid quo ut nobis itaque accusamus facere ullam repellat culpa minus ipsum qui incidunt. Inventore.</span>
            </div>

           
            <div class="plus-content">
               <h1>Краткость</h1>
               <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam ea excepturi tenetur aperiam eius voluptate, aliquid quo ut nobis itaque accusamus facere ullam repellat culpa minus ipsum qui incidunt. Inventore.</span>
            </div>

            <div class="plus-image">
                <i class="ri-number-2"></i>
            </div>


            <div class="plus-image">
                <i class="ri-number-3"></i>
           
           </div>
           
           <div class="plus-content">
               <h1>Понятность</h1>
               <span> Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam ea excepturi tenetur aperiam eius voluptate, aliquid quo ut nobis itaque accusamus facere ullam repellat culpa minus ipsum qui incidunt. Inventore.</span>
           </div>
           

        </div>
    </section>
   
 <!-- футер -->
    <footer class="container">
        <span class="blur2"></span>
        <span class="blur2"></span>
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
            <a href="modules/cabinet/base.php">База знаний</a>
            <a href="modules/cabinet/learn.php">Список курсов</a>
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
    <script src="js/index-animation.js"></script>

    <!-- <script>
    // Получаем текущий URL страницы
    var currentUrl = window.location.href;
    
    // Удаляем расширение файла из URL
    var urlWithoutExtension = currentUrl.replace(/\.[^/.]+$/, "");
    
    // Меняем URL страницы без расширения
    window.history.replaceState({}, document.title, urlWithoutExtension);
    </script>  -->

</html>
