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
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/all-animation.css">
    <link rel="stylesheet" href="../../../includes/loader.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
      integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <title>База знаний</title>
</head>
<body>
<div id="preloader" style="opacity: 1;">
        <div class="loader"></div>
        <h1>Загрузка страницы...</h1>
        <p>Security by Sk1wz</p>
    </div>
        <div class="scrolltop"></div>
    
<nav id="nav-animation" class="nav-animation">
    <a href="../../../../index.php" class="logo"><i class="ri-home-5-line"></i><span>FirstCourses</span></a>

     <ul class="nav-links">
        <li><a href="newprofile.php"></i>Личный кабинет</a></li>
        <li><a href="learn.php"></i>Cписок курсов</a></li>
        <li><a href="#"></i>База знаний</a></li>
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

    <h1 class="base-plus">База знаний терминов</h1>
        <p class="base-plus-info">В данном разделе представлены только термины.</p>

        <?php
    include('../../php/db_connection.php');

    // Запрос к базе данных для получения данных из таблицы base
    $sql = "SELECT title, content FROM base";
    $result = mysqli_query($link, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="faq">
            <button class="accordion">
            <?php echo $row['title']; ?>
            
                <i class="fa-solid fa-chevron-down"></i>
            </button>
            <div class="panel">
                <p><?php echo $row['content']; ?></p>
            </div>
        </div>
        <?php
    }
}
?>

</section>


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
        <a href="#">База знаний</a>
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
<script src="../../../includes/loader.js"></script>
<script src="js/base-animation.js"></script>

<script>
      var acc = document.getElementsByClassName("accordion");
      var i;

      for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function () {
          this.classList.toggle("active");
          this.parentElement.classList.toggle("active");

          var pannel = this.nextElementSibling;

          if (pannel.style.display === "block") {
            pannel.style.display = "none";
          } else {
            pannel.style.display = "block";
          }
        });
      }
    </script>
</html>