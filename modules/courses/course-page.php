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
    <link rel="stylesheet" href="course-page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css">
    <link rel="stylesheet" href="../cabinet/css/all-animation.css">
    <link rel="stylesheet" href="../../../../includes/loader.css">
    <title>Курс HTML</title>
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
        <li><a href="../cabinet/newprofile.php"></i>Личный кабинет</a></li>
        <li><a href="../cabinet/learn.php"></i>Cписок курсов</a></li>
        <li><a href="../cabinet/tech-form.php"></i>Задать вопрос</a></li>
        <li><a href="../cabinet/newsettings.php"></i>Настройки</a></li>
        <li><a href="../../../../../php/logout.php"></i>Выход</a></li>
               
        
     </ul>
        
     <div class="nav-btn">
        <a href="../cabinet/newprofile.php" class="user"><i class="ri-user-fill"></i><?=$_COOKIE['user']?></a>
        <div class="ri-align-justify" id="menu-icon"></div>
    </div>
</nav>
<?php 
        include('../../php/db_connection.php');
       
        $result = $link->query("SELECT * FROM courses");
        $selected_course = isset($_GET['course']) ? $_GET['course'] : null;
        $course = [];
     
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { 
                $course[strtolower($row['title'])] = [
                    'title' => $row['title'],
                    'header-title' => $row['header-title'],
                    'shortTitle' => $row['shortTitle'],
                    'content' => $row['content'],
                    'image' => $row['image'],
                    'video' => $row['video']
                ];
            }
        } 
        
        $link->close();
      
       
        ?>
<section class="container">
    <div class="html-sub">
    <?php
      if (isset($course[$selected_course])) {
        echo '<h1>' . $course[$selected_course]['header-title'] . '</h1>';
        echo '<p>' . $course[$selected_course]['shortTitle'] . '</p>';
        echo '<img src="'.  $course[$selected_course]['image'] . '" alt="">';
    ?>
    </div>

    <div class="html-sub-info">
    <h2>C чем познакомимся?</h2>
    <div class="line"></div>
    <?php 
        echo '<p>' . $course[$selected_course]['content'] . '</p>';
    ?>
   <div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden;">
    <iframe src="<?= $course[$selected_course]['video'] ?>" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;" frameborder="0" allowfullscreen></iframe>
    </div>
    <h2>Конец материала</h2>
    <div class="line"></div>
    <p><i class="ri-arrow-right-s-fill"></i>Конец материала.</p>
    </div>
    <?php }?>
    <div id="message"><p class="msg"></p></div>
        <form>

     
            <div style="max-width: 600px; margin: 0 auto; padding: 20px; background-color: #333; border-radius: 10px;">
                <h1 style="text-align: center; color: rgb(243, 106, 106);">Оставьте свой отзыв</h1>
                <h3 style="color: rgb(243, 106, 106);">Название материала</h3>
                <input type="text" name="personId" placeholder="<?= $_SESSION['id']; ?>" style="display: none; width: 100%; padding: 10px; margin-bottom: 10px;" value="<?= $_SESSION['id']; ?> " readonly>
                <input type="text" name="courseName" placeholder="<?= $course[$selected_course]['header-title'] ?>" style="width: 100%; padding: 10px; margin-bottom: 10px;" value="<?= $course[$selected_course]['header-title'] ?> " readonly>
                <h3 style="color: rgb(243, 106, 106);">Ваше имя</h3>
                <input name="name" type="text" placeholder="<?= $_SESSION['name']; ?>" style="width: 100%; padding: 10px; margin-bottom: 10px;" value="<?= $_SESSION['name']; ?>" readonly>
                <h3 style="color: rgb(243, 106, 106);">Оставьте отзыв</h3>
                <textarea  id="comment" name="comment" placeholder="Сообщение" style="padding: 10px; resize: none; font-size: 16px; width: 100%; min-height: 160px; max-height: 160px; margin-bottom: 10px;"></textarea>
                <button class="submit-comment" style="background-color: rgb(243, 106, 106); color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; display: block; margin: 0 auto;">Оставить отзыв</button>
            </div>

           
            <div class="html-sub-btn" style="margin-bottom: 50px;">
                <a class='submit-check' style="cursor: pointer;">Я посмотрел!</a>
            </div>
        </form>
     
</section>

<style>
    iframe{
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0 auto;
    }
    
#message{
  align-items: center;
  background-color: green;
  color: #fff;
  width: 500px;
  height: 100px;
  border-radius: 10px;
  transition: all .5s;
  position: fixed;
  top: 18%;
  left: 50%;
  z-index: 10;
  text-align: center;
  transform: translate(-50%, -50%);

}
.msg{
  padding-top: 40px;
}
</style>
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
        <h4>Партнеры</h4>
        <a href="#">-</a>
        <a href="#">-</a>
        <a href="#">-</a>
    </div>
    <div class="column">
        <h4>Подробнее о нас</h4>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../../../../includes/loader.js"></script>
<script src="course-page.js"></script>

</html>