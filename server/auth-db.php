<?php
session_start();
require "../components/conn.php";

$login = $_POST["email"];
$password = $_POST["password"];

$sql_check_user = mysqli_query($conn, "SELECT * FROM `users` WHERE `username` = $login");

if (mysqli_num_rows($sql_check_user) > 0) {
    $user = mysqli_fetch_assoc($sql_check_user);
    if (password_verify($password, $user['password'])) {
        $_SESSION['auth'] = $user['username'];
        echo "<script>
    alert('Вход успешно выполнен!');
    location.href = '../index.php';
    </script>";
    } else {
        echo "<script>
    alert('Логин или пароль неверный!');
    location.href = '../auth.php';
    </script>";
    }
} else {
    echo "<script>
    alert('Пользователь не найден!');
    location.href = '../auth.php';
    </script>";
}

?>