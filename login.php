<?php
require_once 'AdminSession.php';

$session = new AdminSession();
$session->startSession();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($session->login($username, $password)) {
        header('Location: admin.php');
        exit();
    } else {
        echo 'Неверные имя пользователя или пароль';
    }
}
?>
