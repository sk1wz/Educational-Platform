<?php 
session_start();
 if (empty($_COOKIE['adminuser'])): {
      header("Location: ../../f-apanel.php");   
}
?>
<?php else: ?>
<?php endif;?>

<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.min.css">
    <link rel="stylesheet" href="css/apanel.css">
    <link rel="stylesheet" href="../../../includes/loader.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ-Панель</title>
</head>
<body>
<!-- <div id="preloader" style="opacity: 1;">
    <div class="loader"></div>
    <h1>Загрузка страницы...</h1>
    <p>Security by Sk1wz</p>
</div> -->
<nav id="nav-animation" class="nav-animation">
        <a href="#admin" class="logo"><i class="ri-home-5-line"></i><span>Админ-панель</span></a>
    
        <ul class="nav-links">
            <li><a href="../../index.php"></i>Главная страница</a></li>
            <li><a href="../../php/logout.php"></i>Выход</a></li>
        </ul>
    
        <div class="nav-btn">
        <a href="#" class="user"><i class="ri-user-fill"></i> <?=$_COOKIE['adminuser']?></a>
            <div class="ri-align-justify" id="menu-icon"></div>
        </div>
    </nav>
<?php 
    // Для статистики
    include('../../php/db_connection.php');
    $count_users = "SELECT COUNT(*) AS total_users FROM users";
    $result_count_users = $link->query($count_users);
    if ($result_count_users->num_rows > 0) {
        $row = $result_count_users->fetch_assoc();
        $totalUsers = $row["total_users"];
    } else {
        $totalUsers = 0;
    }
    // Действия в списке пользователей
    if (isset($_POST['delete-user'])) {
        $user_id = $_POST['user_id'];
        $link->query("DELETE FROM `users` WHERE id = $user_id");
        echo '<script>window.location = "success.php";</script>';
    }
    // Действия в списке вопросов
    if (isset($_POST['delete-message'])) {
        $message_id = $_POST['message_id'];
        $link->query("DELETE FROM `messages` WHERE id = $message_id");
        echo '<script>window.location = "success.php";</script>';
    }

    $count_message = "SELECT COUNT(*) AS total_messages FROM messages";
    $result_count_message = $link->query($count_message);
    if ($result_count_users->num_rows > 0) {
        $row = $result_count_message->fetch_assoc();
        $totalMessages = $row["total_messages"];
    } else {
        $totalMessages = 0;
    }
?>
<section class="container">

    <div class="stat-panel">
        <h1>Внутреняя статистика сайта</h1>
        <div class="stat">
            
                <div class="card-stat card-stat-online">
                    <div class="inner"><i class="ri-user-fill"><span><?php echo $totalUsers*2; ?></span></i></div>
                    <p>Посещаемость сайта</p>
                    <div class="abs-line"></div>
                </div>

                <div class="card-stat card-stat-users">
                    <div class="inner"><i class="ri-user-2-fill"> <span><?php echo $totalUsers; ?></span></i></div>
                    <p>Зарегистрированных пользователей</p>
                    <div class="abs-line"></div>
                </div>
          
                <div class="card-stat card-stat-messages">
                    <div class="inner"  ><i class="ri-user-follow-fill"> <span><?php echo $totalUsers; ?></span></i></div>
                    <p>Подтвержденных пользователей</p>
                    <div class="abs-line"></div>
                </div>

                <div class="card-stat card-stat-messages-close">
                    <div class="inner"><i class="ri-mail-unread-fill"> <span><?php echo $totalMessages; ?></span></i></div>
                    <p>Количество вопросов</p>
                    <div class="abs-line"></div>
                </div>      
        </div>
    </div>

    <div class="all-users">
        <h1>Список всех пользователей</h1>
        <div class="list-users">
        <table>
        <colgroup>
            <col span="1" style="background:#413b4e;"><!-- С помощью этой конструкции задаем цвет фона для первых двух столбцов таблицы-->
        </colgroup>
            <tr><th>ID</th><th>Email</th><th>Username</th><th>Name</th><th>Surname</th><th>Действие</th></tr>
            <tr>
                <?php 
                include('../../php/db_connection.php');
                $all_users = mysqli_query($link, "SELECT * FROM `users`");
                foreach($all_users as $user){ 
                ?>
                <tr>
                    <td><?= $user['id']?></td>
                    <td><?= $user['email']?></td>
                    <td><?= $user['username']?></td>
                    <td><?= $user['name']?></td>
                    <td><?= $user['surname']?></td>
                    <td>
                        <!-- ? ajax -->
                        <form method="POST" action="apanel.php">
                                <input type="hidden" name="user_id" value="<?= $user['id']; ?>">
                                <button type="submit" name="delete-user" style="all: unset; cursor:pointer; padding-left:10px;"><i class="ri-delete-bin-2-fill"></i></button>
                        </form>
                    </td>

                </tr>
                <?php } ?>
        </table>
        </div>
    </div>

    <div class="all-ques">
        <h1>Список вопросов</h1>
        <div class="list-ques">
        <table>
        <colgroup>
            <col span="1" style="background:#413b4e;"><!-- С помощью этой конструкции задаем цвет фона для первых двух столбцов таблицы-->
        </colgroup>
            <tr><th>ID</th><th>Имя</th><th>Почта</th><th>Тема сообщения</th><th>Сообщение</th><th>Действие</th></tr>
            <tr>
                <?php 
                include('../../php/db_connection.php');
                $all_messages = mysqli_query($link, "SELECT * FROM `messages`");
                foreach($all_messages as $message){
                ?>
                <tr>
                    <td><?= $message['id']?></td>
                    <td><?= $message['myname']?></td>
                    <td><?= $message['myemail']?></td>
                    <td><?= $message['mysubject']?></td>
                    <td><?= $message['mymessage']?></td>
                    <td>
                        <form method="POST" action="apanel.php">
                            <input type="hidden" name="message_id" value="<?= $message['id']; ?>">
                            <a href="https://e.mail.ru/compose/"><i class="ri-mail-send-fill"></i></a>
                            <button type="submit" class="delete-message" name="delete-message" style="all: unset; cursor:pointer; padding-left:10px;"><i class="ri-delete-bin-2-fill"></i></button>
                        </form>
                    </td>
                </tr>
                <?php } ?>
        </table>
        </div>
    </div>

    <div class="admin-action">
        <h1>Действия администратора</h1>
        <div class="actions">
        <?php 
        include('../../php/db_connection.php');
        if(isset($_POST['createTermin'])){
        $title = $_POST['title'];
        $content = $_POST['content'];
        if($title !== "" && $content !== ""){
            $link->query("INSERT INTO `base` (`title`,`content`) VALUES ('$title','$content')");
            $link->close();
            echo '<script>window.location = "success.php";</script>';
            exit();
   
            
        }
        } 
        if(isset($_POST['deleteTermin'])){
            $id = $_POST['id'];
            if($id != ''){
                $link->query("DELETE FROM `base` WHERE `id` = '$id'");
                $link->close();
                echo '<script>window.location = "success.php";</script>';
                exit(); 
             
               
            }
        }
    ?>
            <div class="base">
                <h2>База знаний | Редактирование</h2>
                <form action="apanel.php" method="POST">
                    <input type="text" name="title" placeholder="Введите название термина">
                    <textarea type="text" name="content" placeholder="Введите пояснение термина"></textarea>
                    <input type="submit" name="createTermin" value="Создать термин">
                    <h2>Удаление термина</h2>
                    <input type="text" name="id" placeholder="Введите ключ(Айди) термина">
                    <input type="submit" name="deleteTermin" value="Удалить термин">
                </form>
                
                
                
            </div>

            <div class="course" style="margin-bottom: 30px;">
          
            <?php 
        include('../../php/db_connection.php');
        if(isset($_POST['createCourse'])){
        $title = $_POST['title'];
        $price = $_POST['price'];
        $description1 = $_POST['description1'];
        $description2 = $_POST['description2'];
        $description3 = $_POST['description3'];
        $description4 = $_POST['description4'];
        $headerTitle = $_POST['headerTitle'];
        $shortTitle = $_POST['shortTitle'];
        $content = $_POST['content'];
        $image = $_POST['image'];
        $video = $_POST['video'];
        if($title!== "" && $price!== "" && $shortTitle!== "" && $content!== "" && $description1!== "" && $description2!== "" && $description3!== "" && $description4!== "" && $headerTitle!== "" && $image!== "" && $video!== ""){
            $link->query("INSERT INTO `courses` (`title`, `price`, `description1`, `description2`, `description3`, `description4`, `header-title`, `shortTitle`, `content`, `image`, `video`) VALUES ('$title', '$price', '$description1', '$description2', '$description3', '$description4', '$headerTitle', '$shortTitle', '$content', '$image', '$video')");
            $link->close();
             
            echo '<script>window.location = "success.php";</script>';
            exit(); 
        }
        }
        if(isset($_POST['deleteCourse'])){
            $id = $_POST['id'];
            if($id != ''){
                $link->query("DELETE FROM `courses` WHERE `id` = '$id'");
                $link->close();
                echo '<script>window.location = "success.php";</script>';
                exit(); 
             
               
            }
        }
    ?>
                <h2>Курсы | Редактирование</h2>
                <form action="apanel.php" method="POST">
                    <div class="input1">
                        <input type="text" name="title" placeholder="Введите название курса">
                        <input type="text" name="price" placeholder="Введите цену курса">
                        <input type="text" name="description1" placeholder="Введите описание 1">
                        <input type="text" name="description2" placeholder="Введите описание 2">
                        <input type="text" name="description3" placeholder="Введите описание 3">
                        <input type="text" name="description4" placeholder="Введите описание 4">
                        <input type="text" name="headerTitle" placeholder="Введите краткое описание курса">
                        <input type="text" name="shortTitle" placeholder="Введите краткое описание курса">
                        <textarea type="text" name="content" placeholder="Введите контент курса"></textarea>
                        <input type="text" name="image" placeholder="Введите ссылку на картинку">
                        <input type="text" name="video" placeholder="Введите ссылку на видео">
                        <input type="submit" name="createCourse" value="Создать курс">
                    </div>
                   
                    
                    <h2>Удаление курса</h2>
                    <input type="text" name="id" placeholder="Введите ключ(Айди) курса">
                    <input type="submit" name="deleteCourse" value="Удалить курс">
                </form>
            </div>
        </div>
    </div>

</section>



</body>
<script src="../../includes/loader.js"></script>
<script src="js/apanel.js"></script>


</html>