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
    <title>FirstCourses - Список материалов</title>
    <link rel="stylesheet" href="css/learn.css">
    <link rel="stylesheet" href="css/all-animation.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css">
    <link rel="stylesheet" href="../../../includes/loader.css">
    
</head>
<body>
<div id="preloader" style="opacity: 1;">
    <div class="loader"></div>
    <h1>Загрузка страницы...</h1>
    <p>Security by Sk1wz</p>
</div>
    <nav id="nav-animation" class="nav-animation">
        <a href="../../../index.php" class="logo"><i class="ri-home-5-line"></i><span>FirstCourses</span></a>
    
        <ul class="nav-links">
            <li><a href="newprofile.php"></i>Личный кабинет</a></li>
            <li><a href="#"></i>Cписок курсов</a></li>
            <li><a href="base.php"></i>База знаний</a></li>
            <li><a href="newsettings.php"></i>Настройки</a></li>
            <li><a href="tech-form.php"></i>Связаться с нами</a></li>
            <li><a href="../../php/logout.php"></i>Выход</a></li>
        </ul>
    
        <div class="nav-btn">
            <a href="newprofile.php" class="user"><i class="ri-user-fill"></i><?=$_COOKIE['user']?></a>
            <div class="ri-align-justify" id="menu-icon"></div>
        </div>
    </nav>

    <section class="container">
        <h2 class="sub-curse">Список материалов</h2>
        <p class="sub-curse-info">
           Все материалы, которые вы можете просмотреть.
        </p>
        <!-- Карты курса cards course  -->
        <div class="price price-animation" id="price-animation">

            <?php 
            include('../../php/db_connection.php');
            $result = $link->query('SELECT * FROM courses');
            if ($result->num_rows > 0) {
                // Вывод данных каждой строки
                while($row = $result->fetch_assoc()) {
                    echo '<div class="card">';
                    echo '<div class="content">';
                    echo '<h4>' . $row["title"] . '<i class="ri-с   -box-line"></i></h4>';
                    echo '<h3>' . $row["price"] . '</h3>';
                    echo '<p><span>•</span>' . $row["description1"] . '</p>';
                    echo '<p><span>•</span>' . $row["description2"] . '</p>';
                    echo '<p><span>•</span>' . $row["description3"] . '</p>';
                    echo '<p><span>•</span>' . $row["description4"] . '</p>';
                    echo '</div>';
                    echo '<a href="../courses/course-page.php?course=' .  strtolower($row["title"]) . '" class="btn">Просмотреть</a>';
                    echo '</div>';
                }
            }
            ?>
           
        </div>

    </section>
    
    <section class="container">
            <h2 class="sub-curse">Прочтите, Что Говорят Люди</h2>
            <p class="sub-curse-info">
                Отзывы по пройденым материалам
            </p>
        <div class="price price-animation" id="price-animation">
                <?php 
                include('../../php/db_connection.php');
                $result = $link->query('SELECT * FROM comments');
                if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                ?>
        
           
                <div class="card-comment" style="padding: 15px; background: #333; border-radius: 15px;">
                    <span style="text-align: right; color: rgb(243, 106, 106);">Материал: <?= $row['course'] ?></span><br>
                    <span style="color: rgb(243, 106, 106);">Дата: <?= $row['date'] ?></span><br>
                    <h4 style="color: rgb(243, 106, 106);">Пользователь: <?= $row['name'] ?></h4>
                    <h4 style="color: rgb(243, 106, 106);">Комментарий: <?= $row['comment'] ?></h4>
        
                </div>
           
<?php
        }
    }
?>
        </div>
    </section>
 
 <!-- футер -->
 <footer class="container">
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
        <a href="base.php">База знаний</a>
        <a href="#">Список курсов</a>
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

    <script src="js/learn-animation.js"></script>
    <script src="../../../includes/loader.js"></script>
  
   
    <!-- <script>
    // Получаем текущий URL страницы
    var currentUrl = window.location.href;
    
    // Удаляем расширение файла из URL
    var urlWithoutExtension = currentUrl.replace(/\.[^/.]+$/, "");
    
    // Меняем URL страницы без расширения
    window.history.replaceState({}, document.title, urlWithoutExtension);
    </script>  -->

</html>