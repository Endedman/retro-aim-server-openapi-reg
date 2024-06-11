<?php
require_once 'UserAPI.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $screen_name = $_POST['screen_name'];
    $password = $_POST['password'];

    $userAPI = new UserAPI('http://localhost:8080');

    if ($userAPI->createUser($screen_name, $password)) {
        echo "Регистрация прошла успешно";
    } else {
        echo "Ошибка регистрации";
    }
}
?>
