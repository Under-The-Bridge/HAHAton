<?php
require "components/conn.php";

$sql = "select * from cards join countries on cards.country_id = countries.id join events on events.id = cards.event_id join persons on persons.id = cards.persona_id where 1 = 1";
$country = "";
$event = "";
$persona = "";
$search = "";
if(isset($_GET["country"])){
    if($_GET["country"] != -1){
        $country = $_GET["country"] ?? false;
        $sql .= " and countries.id = $country";
    }
}
if(isset($_GET["event"])){
    if($_GET["event"] != -1){
        $event = $_GET["event"] ?? false;
        $sql .= " and events.id = $event";
    }
}
if(isset($_GET["persona"])){
    if($_GET["persona"] != -1){
        $persona = $_GET["persona"] ?? false;
        $sql .= " and persons.id = $persona";
    }
}
if(isset($_GET["persona"])){
    $search = $_GET["search"] ?? false;
    $sql .= " and title like '%$search%'";
}


$filter_country = mysqli_fetch_all(mysqli_query($conn, "select * from countries"));
$filter_event = mysqli_fetch_all(mysqli_query($conn, "select * from events"));
$filter_persona = mysqli_fetch_all(mysqli_query($conn, "select * from persons"));

$cards = mysqli_fetch_all(mysqli_query($conn, $sql), MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<header class="site-header">
  <div class="container">
    <a class="brand" href="/">
      Космостарс
    </a>

    <button class="nav-toggle" aria-expanded="false" aria-controls="main-nav">
      <span class="hamburger"></span>
    </button>

    <nav id="main-nav" class="main-nav" aria-label="Главное меню">
      <ul class="nav-list">
        <li><a href="/">Главная</a></li>
        <li><a href="/about">О нас</a></li>
        <li><a href="/articles">Статьи</a></li>
        <li><a href="/contacts">Контакты</a></li>
      </ul>
    </nav>

    <div class="auth-actions">
      <?php if (!empty($user) && !empty($user['name'])): ?>
        <a href="/profile" class="btn btn-ghost"><?= $user['name'] ?></a>
        <a href="/logout" class="btn btn-secondary">Выйти</a>
      <?php else: ?>
        <a href="/reg.php" class="btn btn-outline">Регистрация</a>
        <a href="/auth.php" class="btn btn-primary">Вход</a>
      <?php endif; ?>
    </div>
  </div>
</header>
<div class="site-header">
  <div class="container">
    <form class="filter-form" method="get" action="">
      <label>
        <span class="visually-hidden">Страна</span>
        <select name="country">
          <option value="-1">Не выбрано</option>
          <?php foreach($filter_country as $elem): ?>
            <option value="<?= $elem[0]?>" <?= ($country == $elem[0]) ? 'selected' : '' ?>>
              <?=$elem[1]?>
            </option>
          <?php endforeach; ?>
        </select>
      </label>

      <label>
        <span class="visually-hidden">Событие</span>
        <select name="event">
          <option value="-1">Не выбрано</option>
          <?php foreach($filter_event as $elem): ?>
            <option value="<?= $elem[0]?>" <?= ($event == $elem[0]) ? 'selected' : '' ?>>
              <?= $elem[1]?>
            </option>
          <?php endforeach; ?>
        </select>
      </label>

      <label>
        <span class="visually-hidden">Персона</span>
        <select name="persona">
          <option value="-1">Не выбрано</option>
          <?php foreach($filter_persona as $elem): ?>
            <option value="<?=$elem[0]?>" <?= ($persona == $elem[0]) ? 'selected' : '' ?>>
              <?= $elem[1]?>
            </option>
          <?php endforeach; ?>
        </select>
      </label>

      <label class="search-wrap">
        <span class="visually-hidden">Поиск</span>
        <input type="text" name="search" value="<?=$search?>" placeholder="Поиск...">
      </label>

      <button type="submit" class="btn-search">искать</button>
    </form>
  </div>
          </div>
<main class="content">
  <div class="cards-grid">
    <?php foreach($cards as $card): ?>
      <article class="card">
        <div class="card-media">
          <img
            src="<?=$card['image'] ?? 'images/gagarin.jpg'?>"
            alt="<?=$card['title']?>"
            loading="lazy"
            onerror="this.onerror=null;this.src='images/gagarin.jpg';"
          >
        </div>

        <div class="card-body">
          <h3 class="card-title"><?=$card['title']?></h3>
          <p class="card-text"><?=$card['description']?></p>

          <div class="card-meta">
            <span class="chip"><?=$card['country_name']?></span>
            <span class="chip"><?=$card['event_name']?></span>
            <span class="chip"><?=$card['persona_name']?></span>
          </div>

          <div class="card-actions">
            <a href="<?=$card['url'] ?? '#' ?>" class="btn btn-primary">Открыть</a>
          </div>
        </div>
      </article>
    <?php endforeach; ?>
  </div>
</main>
    <script>
        let select = document.querySelectorAll("select");
        select.forEach(element => {
            element.addEventListener("change",()=>{
                element.parentNode.parentNode.submit();
            })
        });
    </script>
</body>
</html>