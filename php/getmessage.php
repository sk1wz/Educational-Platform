<?php
include('db_connection.php');
// Содержимое письма
$myname = $_GET['myname'];
$mysubject = $_GET['mysubject'];
$mymessage = $_GET['mymessage'];
$myemail = $_GET['myemail'];

getmessage($link,$myname,$myemail,$mysubject,$mymessage);

function getmessage($link,$myname,$myemail,$mysubject,$mymessage){

    
    if($myname == ""){
        $response = [
            'status' => false,
            'message' => "Проверьте правильность поля имя."
        ];
        echo json_encode($response);
        die();
    }

    if($mysubject == ""){
        $response = [
            'status' => false,
            'message' => "Проверьте правильность поля тема."
        ];
        echo json_encode($response);
        die();
    }

    if($mymessage == ""){
        $response = [
            'status' => false,
            'message' => "Проверьте правильность поля сообщение."
        ];
        echo json_encode($response);
        die();
    }

    if($myemail == ""){
        $response = [
            'status' => false,
            'message' => "Проверьте правильность поля почты."
        ];
        echo json_encode($response);
        die();
    }

  if($response =['status' != false]){
        $link->query("INSERT INTO `messages` (`myname`, `myemail`, `mysubject`, `mymessage`) VALUES ('$myname', '$myemail', '$mysubject', '$mymessage')");
        $link->close();
        $response = [
            'status' => true,
            'message' => "Cообщение успешно отправлено!"
        ];
        echo json_encode($response);
        die();
  }

    

}






