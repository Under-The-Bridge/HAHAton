<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="../styles/stylereg.css">
</head>

<body>
    <form action="../server/reg-db.php" method="post">
        <h1>Регистрация</h1>
        <input type="email" placeholder="Напишите свою почту" required name="login">
        <input type="password" placeholder="Напишите свой пароль" required name="password">
        <input type="text" placeholder="Напишите своё ФИО" required name="fio">
        <div class="ssilka">
            <h2>Уже есть аккаунт?</h2>
            <a href="auth.php">Авторизоваться</a>
        </div>
        <button type="submit" name="btnReg">Зарегистрироваться</button>
    </form>
</body>

</html>