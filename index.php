<?php
// require "connect-db.php";

$country = $_GET["county"] ?? false;
$event = $_GET["event"] ?? false;
$persona = $_GET["persona"] ?? false;
$search = $_GET["search"] ?? false;

$sql = "select * from TABLE $country $event $search";

echo $sql;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form>
        <select name="country" id="">
            <option value="СССР">СССР</option>
            <option value="США">США</option>
        </select>
        <select name="event" id="">
            <option value="Запуск">Запуск</option>
            <option value="Полет">Полет</option>
        </select>
        <select name="persona" id="">
            <option value="Гагарин">Гагарин</option>
            <option value="Армстронг">Армстронг</option>
        </select>
        <input type="text" name="search" value="<?=$search?>">
        <button>искать</button>
    </form>
    <script>
        let select = document.querySelectorAll("select");
        select.forEach(element => {
            element.addEventListener("change",()=>{
                element.parentNode.submit();
            })
        });
    </script>
</body>
</html>