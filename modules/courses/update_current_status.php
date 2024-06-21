<?php
include('../../php/db_connection.php');

    $personId = $_POST['personId'];
    $courseName = $_POST['courseName'];
    $current = 'true';

    // Проверка наличия записи в базе данных
    $checkQuery = $link->query("SELECT * FROM `status` WHERE user_id = '$personId' AND course = '$courseName'");
    $checkResult = $checkQuery->fetch_assoc();

    if($checkResult > 1){
        $response = [
            'status' => false,
            'message' => "Вы уже просмотрели данный материал!"
        ];
        echo json_encode($response);
        die();
    }

    if ($checkResult == "") {
        // Если запись уже существует, обновляем значение current на true
        $link->query("INSERT INTO `status` (`user_id`, `course`, `current`) VALUES ('$personId', '$courseName', '$current')");
        $link->close();
        $response = [
            'status' => true,
            'message' => "Вы успешно просмотрели курс! Оставьте отзыв!"
        ];
        echo json_encode($response);
        die();
      
    } 


?>