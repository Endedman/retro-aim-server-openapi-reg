<?php
require_once 'AdminSession.php';
require_once 'UserAPI.php';

$session = new AdminSession();
$session->startSession();

if (!$session->isAuthenticated()) {
    header('Location: login.html');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $screen_name = $_POST['screen_name'];
    $password = $_POST['password'];

    $userAPI = new UserAPI('http://localhost:8080');
    if ($userAPI->createUser($screen_name, $password)) {
        header('Location: admin.php');
        exit();
    } else {
        echo 'Ошибка при создании пользователя';
    }
}
?>
