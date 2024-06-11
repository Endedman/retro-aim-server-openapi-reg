<?php
require_once 'UserAPI.php';
$userAPI = new UserAPI('http://localhost:8080');
$users = $userAPI->listUsers();
echo json_encode($users);
?>