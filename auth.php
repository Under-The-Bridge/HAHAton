<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel="stylesheet" href="../styles/styleauth.css">
</head>

<body>
    <form action="../server/auth-db.php" method="post">
        <h1>Авторизация</h1>
        <input type="text" placeholder="Напишите свой логин" required name="login">
        <input type="password" placeholder="Напишите свой пароль" required name="password">
        <div class="ssilka">
            <h2>Ещё нет аккаунта?</h2>
            <a href="reg.php">Зарегистрироваться</a>
        </div>
        <button type="submit" name="btnReg">Авторизоваться</button>
    </form>
</body>

</html>