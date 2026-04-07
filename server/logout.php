<?php
session_start();
unset($_SESSION['auth']);
        echo "<script>
    alert('Вход успешно выполнен!');
    location.href = '../index.php';
    </script>";
?>