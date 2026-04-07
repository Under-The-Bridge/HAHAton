<?php
require "components/conn.php";

$country = $_GET["country"] ?? false;
$event = $_GET["event"] ?? false;
$persona = $_GET["persona"] ?? false;
$search = $_GET["search"] ?? false;

$sql = "select * from TABLE $country $event $persona $search";

echo $sql;

$filter_country = mysqli_fetch_all(mysqli_query($conn, "select * from countries"));
$filter_event = mysqli_fetch_all(mysqli_query($conn, "select * from events"));
$filter_persona = mysqli_fetch_all(mysqli_query($conn, "select * from persons"));

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
            <?foreach($filter_country as $elem) :?>
                <option value="<?= $elem[0]?>" <?=($country == $elem[0]) ? "selected" : "" ?>><?= $elem[1]?></option>
            <?php endforeach;?>
        </select>
        <select name="event" id="">
            <?foreach($filter_event as $elem) :?>
                <option value="<?= $elem[0]?>" <?=($event == $elem[0]) ? "selected" : "" ?>><?= $elem[1]?></option>
            <?php endforeach;?>
        </select>
        <select name="persona" id="">
            <?foreach($filter_persona as $elem) :?>
                <option value="<?= $elem[0]?>" <?=($persona == $elem[0]) ? "selected" : "" ?>><?= $elem[1]?></option>
            <?php endforeach;?>
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