<?php
include('db_connection.php');

$personId = $_POST['personId'];
$name = $_POST['name'];
$courseName = $_POST['courseName'];
$comment = $_POST['comment'];
$date = date("Y-m-d H:i:s");

if ($comment == "") {
    $response = [
        'status' => false,
        'message' => 'Поле отзыва не может быть пустым!',
    ];
    echo json_encode($response);
    die();
}

// Проверяем наличие отзыв1а по указанному курсу
$sql_check = "SELECT * FROM comments WHERE user_id = '$personId' AND course = '$courseName'";
$result_check = $link->query($sql_check);

if ($result_check->num_rows > 0) {
    $response = [
        'status' => false,
        'message' => 'Отзыв по данному курсу уже существует',
    ];
    echo json_encode($response);
    die();
} else {
    $link->query("INSERT INTO `comments` (`user_id`, `name`, `course`, `comment`,`date`) VALUES ('$personId', '$name', '$courseName', '$comment', '$date')");
    $link->close();
    $response = [
        'status' => true,
        'message' => "Cообщение успешно отправлено!"
    ];
    echo json_encode($response);
    die();
}
?>