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
 
   <link rel="stylesheet" href="css/all-animation.css">
   <link rel="stylesheet" href="css/tech-form.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css">
   <link rel="stylesheet" href="../../../includes/loader.css">
   <title>FirstCourses - связаться с нами</title>

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
            <li><a href="#"></i>Связаться с нами</a></li>
            <li><a href="../../php/logout.php"></i>Выход</a></li>
        </ul>
        
        <div class="nav-btn">
            <a href="newprofile.php" class="user"><i class="ri-user-fill"></i> <?=$_SESSION['username']?></a>
            <div class="ri-align-justify" id="menu-icon"></div>
        </div>
       
    </nav>
    <div id="message"><p class="msg"></p></div>
<section class="container">
    <h1>Контактная форма</h1>
<form>      
  <input name="myname" type="text" class="feedback-input" id="myInput1" placeholder="Ваше имя" />   
  <input name="myemail" type="email" class="feedback-input" id="myInput2" placeholder="Ваша почта" />
  <input name="mysubject" type="text" class="feedback-input" id="myInput3" placeholder="Тема сообщения" />
  <textarea name="mymessage" class="feedback-input" id="myInput4" placeholder="Сообщение"></textarea>
  <input type="submit" name="submit-mail" class="submit-mail" value="Отправить"/>
</form>
</section>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/getmessage.js"></script>
<script src="../../../includes/loader.js"></script>
<script src="js/tech-form-animation.js"></script>
</html> 