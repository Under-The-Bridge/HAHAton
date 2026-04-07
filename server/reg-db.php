<?php
require "../components/conn.php";

$login = $_POST["email"] ?? false;
$fio = $_POST["fio"] ?? false;
$password = $_POST["password"] ?? false;
$password_user = password_hash($password, PASSWORD_DEFAULT);

$sql_check = mysqli_query($conn, "SELECT * FROM `users` where `username` = $login");
if (mysqli_num_rows($sql_check) > 0) {
    echo "<script>
    alert('Пользователь с данной почтой уже существует!');
    location.href = '../reg.php';
    </script>";
} elseif (trim($login) == "" or trim($password) == "" or trim($fio) == "") {
    echo "<script>
    alert('Не должно быть пустых полей');
    location.href = '../reg.php';
    </script>";
} elseif (trim($password) < 6) {
    echo "<script>
    alert('Пароль должен быть более 6 символов!');
    location.href = '../reg.php';
    </script>";
} else {
    echo "<script>
    alert('Учетная запись создана!');
    location.href = '../auth.php';
    </script>";
}
?>