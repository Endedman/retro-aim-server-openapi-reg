<?php
require_once 'AdminSession.php';

$session = new AdminSession();
$session->logout();
header('Location: login.html');
exit();
?>
