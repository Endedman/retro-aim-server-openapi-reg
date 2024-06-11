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

        .registration-window {
            width: 400px;
        }

        .title-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .window-body {
            padding: 20px;
        }

        .field-row {
            margin-bottom: 10px;
        }

        .field-row label {
            display: inline-block;
            width: 120px;
        }

        .field-row input {
            width: calc(100% - 130px);
        }

        .actions {
            display: flex;
            justify-content: flex-end;
        }
    </style>
    <title>Регистрация</title>
</head>
<body>
    <div class="window registration-window">
        <div class="title-bar">
            <div class="title-bar-text">Регистрация</div>
        </div>
        <div class="window-body">
            <form action="register.php" method="POST">
                <div class="field-row">
                    <label for="screen_name">Имя пользователя:</label>
                    <input id="screen_name" name="screen_name" type="text" required>
                </div>
                <div class="field-row">
                    <label for="password">Пароль:</label>
                    <input id="password" name="password" type="password" required>
                </div>
                <div class="actions">
                    <button type="submit" class="button">Зарегистрироваться</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
