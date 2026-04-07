<?php
require "../components/conn.php";

$login = mysqli_real_escape_string($conn, $_POST["email"] ?? '');
$fio = mysqli_real_escape_string($conn, $_POST["fio"] ?? '');
$password = $_POST["password"] ?? '';
$password_user = password_hash($password, PASSWORD_DEFAULT);

$sql_check = mysqli_query($conn, "SELECT * FROM `users` where `username` = '$login'");
if (mysqli_num_rows($sql_check) > 0) {
    echo "<script>
    alert('Пользователь с данной почтой уже существует!');
    location.href = '../reg.php';
    </script>";
    exit;
} elseif (empty($login) or empty($password) or empty($fio)) {
    echo "<script>
    alert('Не должно быть пустых полей');
    location.href = '../reg.php';
    </script>";
    exit;
} elseif (strlen(trim($password)) < 6) {
    echo "<script>
    alert('Пароль должен быть более 6 символов!');
    location.href = '../reg.php';
    </script>";
    exit;
} else {
    $sql_add_user = mysqli_query($conn, "INSERT INTO users(`username`, `password`, `fio`) values('$login','$password_user','$fio')");
    if ($sql_add_user) {
        echo "<script>
    alert('Учетная запись создана!');
    location.href = '../auth.php';
    </script>";
    } else {
        echo "<script>
    alert('Ошибка при создании учетной записи!');
    location.href = '../auth.php';
    </script>";
        exit;
    }

}
?>