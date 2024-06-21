<?php
if(isset($_COOKIE['user']) || isset($_COOKIE['adminuser'])) {
    setcookie('user', '', time() - 3600, "/");
    setcookie('adminuser', '', time() - 3600, "/");
}
header('Location: ../index.php');
?>