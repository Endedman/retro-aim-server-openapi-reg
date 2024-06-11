<?php
require_once 'AdminSession.php';
require_once 'UserAPI.php';

$session = new AdminSession();
$session->startSession();

if (!$session->isAuthenticated()) {
    http_response_code(403);
    exit();
}

$data = json_decode(file_get_contents('php://input'), true);
$screen_name = $data['screen_name'];

$userAPI = new UserAPI('http://localhost:8080');
if ($userAPI->deleteUser($screen_name)) {
    http_response_code(204);
} else {
    http_response_code(404);
}
?>
