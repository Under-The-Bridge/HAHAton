<?php
require "components/conn.php";

$country = $_GET["country"] ?? false;
$event = $_GET["event"] ?? false;
$persona = $_GET["persona"] ?? false;
$search = $_GET["search"] ?? false;

$filter_country = mysqli_fetch_all(mysqli_query($conn, "select * from countries"));
$filter_event = mysqli_fetch_all(mysqli_query($conn, "select * from events"));
$filter_persona = mysqli_fetch_all(mysqli_query($conn, "select * from persons"));

$sql = "select * from cards join countries on cards.country_id = countries.id join events on events.id = cards.event_id join persons on persons.id = cards.persona_id";

$cards = mysqli_fetch_all(mysqli_query($conn, $sql), MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
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
    <main>
        <?php foreach($cards as $card):?>
        <div class="card" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?= $card[1]?></h5>
                <p class="card-text"><?= $card[2]?></p>
                <a href="#" class="btn btn-primary">Открыть</a>
                <p class="brn btn-secondary"><?= print_r($card)?></p>
                <p class="brn btn-secondary"></p>
                <p class="brn btn-secondary"></p>
            </div>
        </div>
        <?php endforeach;?>
    </main>
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