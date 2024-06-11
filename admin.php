<?php
require_once 'AdminSession.php';
require_once 'UserAPI.php';

$session = new AdminSession();
$session->startSession();

if (!$session->isAuthenticated()) {
    header('Location: login.html');
    exit();
}

$userAPI = new UserAPI('http://localhost:8080');
$users = $userAPI->listUsers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/98.css">
    <style>
        body {
            background-color: #008080;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .admin-window {
            width: 800px;
        }

        .title-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .title-bar-controls button {
            cursor: pointer;
        }

        .window-body {
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #c0c0c0;
        }

        .actions {
            text-align: center;
        }

        .actions button {
            cursor: pointer;
            padding: 5px 10px;
        }

        .logout-button {
            margin-left: 20px;
        }
    </style>
    <title>Админка</title>
</head>
<body>
    <div class="window admin-window">
        <div class="title-bar">
            <div class="title-bar-text">Админка</div>
            <div class="title-bar-controls">
                <button aria-label="Close" onclick="window.location.href='logout.php'"></button>
            </div>
        </div>
        <div class="window-body">
            <table>
                <thead>
                    <tr>
                        <th>Имя пользователя</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody id="user-list">
                    <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($user['screen_name']); ?></td>
                        <td class="actions">
                            <button onclick="deleteUser('<?php echo htmlspecialchars($user['screen_name']); ?>')">Удалить</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <button onclick="window.location.href='create_user.html'" class="button">Создать пользователя</button>
            <button onclick="window.location.href='logout.php'" class="button logout-button">Выйти</button>
        </div>
    </div>
    <script>
        function deleteUser(screenName) {
            fetch('delete_user.php', {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ screen_name: screenName })
            })
            .then(response => {
                if (response.ok) {
                    location.reload();
                } else {
                    alert('Ошибка при удалении пользователя');
                }
            });
        }
    </script>
</body>
</html>
