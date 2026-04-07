<?php
session_start();
// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "space_timeline";

// Создаем подключение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем подключение
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получаем параметры фильтрации
$search = isset($_GET['search']) ? $_GET['search'] : '';
$country = isset($_GET['country']) ? $_GET['country'] : '';

// Базовый SQL запрос
$sql = "SELECT * FROM events WHERE 1=1";

if (!empty($search)) {
    $search_escaped = $conn->real_escape_string($search);
    $sql .= " AND (title LIKE '%$search_escaped%' OR description LIKE '%$search_escaped%')";
}

if (!empty($country)) {
    $country_escaped = $conn->real_escape_string($country);
    $sql .= " AND country = '$country_escaped'";
}

$sql .= " ORDER BY event_date ASC";
$result = $conn->query($sql);

// Данные по умолчанию, если база пустая
$events = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $events[] = $row;
    }
} else {
    // Дефолтные события
    $events = [
        ['id' => 1, 'title' => 'Запуск первого искусственного спутника Земли', 'description' => 'СССР запускает Спутник-1, открывая космическую эру человечества', 'event_date' => '1957-10-04', 'country' => 'СССР', 'image_url' => 'https://images.unsplash.com/photo-1614728263952-84ea256f9679?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=400'],
        ['id' => 2, 'title' => 'Первый полет человека в космос', 'description' => 'Юрий Гагарин совершает исторический полет на корабле "Восток-1"', 'event_date' => '1961-04-12', 'country' => 'СССР', 'image_url' => 'https://images.unsplash.com/photo-1598431415913-48cc762b469b?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=400'],
        ['id' => 3, 'title' => 'Высадка на Луну', 'description' => 'Нил Армстронг и Базз Олдрин становятся первыми людьми на Луне', 'event_date' => '1969-07-20', 'country' => 'США', 'image_url' => 'https://images.unsplash.com/photo-1614726365930-627c75da663e?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=400']
    ];
}

// Функция для форматирования даты
function formatDate($date) {
    $timestamp = strtotime($date);
    return date('j', $timestamp) . ' ' . 
           mb_convert_case(date('F', $timestamp), MB_CASE_TITLE, 'UTF-8') . ' ' . 
           date('Y', $timestamp);
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Космический Таймлайн</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="space-timeline">
        <header class="header">
            <div class="container">
                <div class="header-content">
                    <div class="logo">
                        <img src="icon.png" alt="" class="logo-icon">
                        <div class="logo-text">
                            <h1>Космический Таймлайн</h1>
                            <p>Путешествие сквозь историю космонавтики</p>
                        </div>
                    </div>
                    <nav class="nav">
                        <a href="#timeline" class="nav-link"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg><span>Временная шкала</span></a>
                        <a href="#education" class="nav-link"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
                                <polygon
                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                </polygon>
                            </svg><span>Образование</span></a>
                        <a href="#gagarin" class="nav-link"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-rocket w-4 h-4">
                                <path
                                    d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z">
                                </path>
                                <path
                                    d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z">
                                </path>
                                <path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"></path>
                                <path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"></path>
                            </svg><span>День космонавтики</span></a>
                        <?php if(isset($_SESSION['user_id'])): ?>
                            <a href="profile.php" class="nav-link"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg><span>Профиль</span></a>
                            <a href="logout.php" class="nav-link"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg><span>Выйти</span></a>
                        <?php else: ?>
                            <a href="reg.php" class="nav-link"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg><span>Регистрация</span></a>
                            <a href="auth.php" class="nav-link"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path><polyline points="10 17 15 12 10 7"></polyline><line x1="15" y1="12" x2="3" y2="12"></line></svg><span>Войти</span></a>
                        <?php endif; ?>
                    </nav>
                    <button class="mobile-menu"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2">
                            <line x1="3" y1="12" x2="21" y2="12"></line>
                            <line x1="3" y1="6" x2="21" y2="6"></line>
                            <line x1="3" y1="18" x2="21" y2="18"></line>
                        </svg></button>
                </div>
            </div>
        </header>

        <section class="hero">
            <div class="hero-bg"><img src="https://images.unsplash.com/photo-1627947224567-4b17c3137ad4?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=1920" alt="Космос" />
                <div class="hero-overlay"></div>
            </div>
            <div class="hero-content">
                <div class="hero-badge"><span>🚀 К Дню космонавтики • 12 апреля 2026</span></div>
                <h1 class="hero-title">Космический <span class="gradient-text">Таймлайн</span></h1>
                <p class="hero-subtitle">Откройте для себя захватывающую историю освоения космоса — от первых теорий до современных достижений</p>
                <div class="hero-stats">
                    <div class="stat-card"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                        <div>
                            <div class="stat-value">65+</div>
                            <div class="stat-label">Лет в космосе</div>
                        </div>
                    </div>
                    <div class="stat-card"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        <div>
                            <div class="stat-value">600+</div>
                            <div class="stat-label">Космонавтов</div>
                        </div>
                    </div>
                    <div class="stat-card"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="2" y1="12" x2="22" y2="12"></line>
                            <path
                                d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                            </path>
                        </svg>
                        <div>
                            <div class="stat-value">40+</div>
                            <div class="stat-label">Стран</div>
                        </div>
                    </div>
                </div>
                <button class="hero-btn" onclick="document.getElementById('timeline').scrollIntoView({behavior: 'smooth'})">Начать путешествие</button>
            </div>
        </section>

        <div class="main-container">
            <div class="container">
                <div class="content-grid">
                    <aside class="filter-panel">
                        <div class="filter-header"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                            </svg>
                            <h3>Фильтры</h3>
                        </div>
                        <form method="GET" action="" id="filterForm">
                            <div class="filter-section"><label class="filter-label">Поиск событий</label>
                                <div class="search-input"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <path d="m21 21-4.35-4.35"></path>
                                    </svg><input type="text" name="search" placeholder="Поиск..." value="<?php echo htmlspecialchars($search); ?>" onchange="this.form.submit()" /></div>
                            </div>
                            <div class="filter-section">
                                <div class="filter-title"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="2" y1="12" x2="22" y2="12"></line>
                                        <path
                                            d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                                        </path>
                                    </svg><label>Страны</label></div>
                                <div class="checkbox-group">
                                    <label class="checkbox-label"><input type="checkbox" name="country" value="СССР" <?php echo $country == 'СССР' ? 'checked' : ''; ?> onchange="this.form.submit()" /><span>СССР/Россия</span></label>
                                    <label class="checkbox-label"><input type="checkbox" name="country" value="США" <?php echo $country == 'США' ? 'checked' : ''; ?> onchange="this.form.submit()" /><span>США</span></label>
                                </div>
                            </div>
                            <button type="button" class="reset-btn" onclick="window.location.href='index.php'">Сбросить фильтры</button>
                        </form>
                    </aside>

                    <main class="timeline-main" id="timeline">
                        <div class="section-header">
                            <h2>Временная шкала космонавтики</h2>
                            <p>От первых теорий до современных достижений</p>
                        </div>
                        <div class="epochs">
                            <div class="epoch-card epoch-purple">
                                <div class="epoch-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg></div>
                                <h3>Ранние теории</h3>
                                <p>1903-1956</p>
                            </div>
                            <div class="epoch-card epoch-blue">
                                <div class="epoch-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-satellite w-6 h-6 text-white">
                                        <path d="M13 7 9 3 5 7l4 4"></path>
                                        <path d="m17 11 4 4-4 4-4-4"></path>
                                        <path d="m8 12 4 4 6-6-4-4Z"></path>
                                        <path d="m16 8 3-3"></path>
                                        <path d="M9 21a6 6 0 0 0-6-6"></path>
                                    </svg></div>
                                <h3>Начало космической эры</h3>
                                <p>1957-1961</p>
                            </div>
                            <div class="epoch-card epoch-orange">
                                <div class="epoch-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path>
                                        <line x1="4" y1="22" x2="4" y2="15"></line>
                                    </svg></div>
                                <h3>Лунная гонка</h3>
                                <p>1961-1972</p>
                            </div>
                            <div class="epoch-card epoch-green">
                                <div class="epoch-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-rocket w-4 h-4">
                                        <path
                                            d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z">
                                        </path>
                                        <path
                                            d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z">
                                        </path>
                                        <path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"></path>
                                        <path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"></path>
                                    </svg></div>
                                <h3>Эпоха шаттлов</h3>
                                <p>1981-2011</p>
                            </div>
                            <div class="epoch-card epoch-indigo">
                                <div class="epoch-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect>
                                        <rect x="9" y="9" width="6" height="6"></rect>
                                        <line x1="9" y1="1" x2="9" y2="4"></line>
                                        <line x1="15" y1="1" x2="15" y2="4"></line>
                                        <line x1="9" y1="20" x2="9" y2="23"></line>
                                        <line x1="15" y1="20" x2="15" y2="23"></line>
                                        <line x1="20" y1="9" x2="23" y2="9"></line>
                                        <line x1="20" y1="14" x2="23" y2="14"></line>
                                        <line x1="1" y1="9" x2="4" y2="9"></line>
                                        <line x1="1" y1="14" x2="4" y2="14"></line>
                                    </svg></div>
                                <h3>Современная космонавтика</h3>
                                <p>2011-настоящее время</p>
                            </div>
                        </div>

                        <div class="timeline">
                            <div class="timeline-line"></div>
                            <?php $counter = 0; foreach($events as $event): ?>
                            <div class="timeline-event <?php echo $counter % 2 == 0 ? 'event-left' : 'event-right'; ?>">
                                <div class="timeline-point"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <path d="M22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"></path>
                                    </svg></div>
                                <div class="event-card">
                                    <div class="event-image"><img src="<?php echo htmlspecialchars($event['image_url']); ?>" alt="<?php echo htmlspecialchars($event['title']); ?>" />
                                        <div class="event-badge"><?php echo htmlspecialchars($event['country']); ?></div>
                                    </div>
                                    <div class="event-content">
                                        <div class="event-date"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                                <line x1="3" y1="10" x2="21" y2="10"></line>
                                            </svg><span><?php echo formatDate($event['event_date']); ?></span></div>
                                        <h3><?php echo htmlspecialchars($event['title']); ?></h3>
                                        <p><?php echo htmlspecialchars($event['description']); ?></p>
                                        <div class="event-footer"><span>Подробнее</span><a href="#" class="read-more"><span>Читать далее</span><svg viewBox="0 0 24 24"
                                                    fill="none" stroke="currentColor" stroke-width="2">
                                                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6">
                                                    </path>
                                                    <polyline points="15 3 21 3 21 9"></polyline>
                                                    <line x1="10" y1="14" x2="21" y2="3"></line>
                                                </svg></a></div>
                                    </div>
                                </div>
                            </div>
                            <?php $counter++; endforeach; ?>
                            <?php if(empty($events)): ?>
                            <div class="text-center py-5" style="color: #9ca3af;">Событий не найдено. Попробуйте изменить параметры поиска.</div>
                            <?php endif; ?>
                        </div>
                        <div class="load-more"><button class="load-more-btn" onclick="alert('Все события загружены')">Показать больше событий</button></div>
                    </main>
                </div>
            </div>
        </div>

        <section class="education-section" id="education">
            <div class="container">
                <div class="section-header">
                    <div class="section-badge"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-book-open w-4 h-4 text-green-400"><path d="M12 7v14"></path><path d="M3 18a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h5a4 4 0 0 1 4 4 4 4 0 0 1 4-4h5a1 1 0 0 1 1 1v13a1 1 0 0 1-1 1h-6a3 3 0 0 0-3 3 3 3 0 0 0-3-3z"></path></svg><span>Образовательный раздел</span></div>
                    <h2>Изучите космонавтику</h2>
                    <p>Интерактивные материалы и викторины для углубленного понимания космических технологий</p>
                </div>
                <div class="education-grid">
                    <div class="education-card card-blue">
                        <div class="education-bg"></div>
                        <div class="education-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-atom w-8 h-8 text-white"><circle cx="12" cy="12" r="1"></circle><path d="M20.2 20.2c2.04-2.03.02-7.36-4.5-11.9-4.54-4.52-9.87-6.54-11.9-4.5-2.04 2.03-.02 7.36 4.5 11.9 4.54 4.52 9.87 6.54 11.9 4.5Z"></path><path d="M15.7 15.7c4.52-4.54 6.54-9.87 4.5-11.9-2.03-2.04-7.36-.02-11.9 4.5-4.52 4.54-6.54 9.87-4.5 11.9 2.03 2.04 7.36.02 11.9-4.5Z"></path></svg></div>
                        <h3>Принципы работы ракет</h3>
                        <p>Узнайте, как работают ракетные двигатели и законы реактивного движения</p>
                        <div class="education-footer">
                            <div class="education-info"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path
                                        d="M9.5 2A2.5 2.5 0 0 1 12 4.5v15a2.5 2.5 0 0 1-4.96.44 2.5 2.5 0 0 1-2.96-3.08 3 3 0 0 1-.34-5.58 2.5 2.5 0 0 1 1.32-4.24 2.5 2.5 0 0 1 1.98-3A2.5 2.5 0 0 1 9.5 2Z">
                                    </path>
                                    <path
                                        d="M14.5 2A2.5 2.5 0 0 0 12 4.5v15a2.5 2.5 0 0 0 4.96.44 2.5 2.5 0 0 0 2.96-3.08 3 3 0 0 0 .34-5.58 2.5 2.5 0 0 0-1.32-4.24 2.5 2.5 0 0 0-1.98-3A2.5 2.5 0 0 0 14.5 2Z">
                                    </path>
                                </svg><span>5 вопросов</span></div><button class="education-start">Начать →</button>
                        </div>
                    </div>
                    <div class="education-card card-purple">
                        <div class="education-bg"></div>
                        <div class="education-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-orbit w-8 h-8 text-white"><circle cx="12" cy="12" r="3"></circle><circle cx="19" cy="5" r="2"></circle><circle cx="5" cy="19" r="2"></circle><path d="M10.4 21.9a10 10 0 0 0 9.941-15.416"></path><path d="M13.5 2.1a10 10 0 0 0-9.841 15.416"></path></svg></div>
                        <h3>Орбитальная механика</h3>
                        <p>Разберитесь в законах движения космических аппаратов на орбите</p>
                        <div class="education-footer">
                            <div class="education-info"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path
                                        d="M9.5 2A2.5 2.5 0 0 1 12 4.5v15a2.5 2.5 0 0 1-4.96.44 2.5 2.5 0 0 1-2.96-3.08 3 3 0 0 1-.34-5.58 2.5 2.5 0 0 1 1.32-4.24 2.5 2.5 0 0 1 1.98-3A2.5 2.5 0 0 1 9.5 2Z">
                                    </path>
                                    <path
                                        d="M14.5 2A2.5 2.5 0 0 0 12 4.5v15a2.5 2.5 0 0 0 4.96.44 2.5 2.5 0 0 0 2.96-3.08 3 3 0 0 0 .34-5.58 2.5 2.5 0 0 0-1.32-4.24 2.5 2.5 0 0 0-1.98-3A2.5 2.5 0 0 0 14.5 2Z">
                                    </path>
                                </svg><span>7 вопросов</span></div><button class="education-start">Начать →</button>
                        </div>
                    </div>
                    <div class="education-card card-green">
                        <div class="education-bg"></div>
                        <div class="education-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-building2 lucide-building-2 w-8 h-8 text-white"><path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"></path><path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2"></path><path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2"></path><path d="M10 6h4"></path><path d="M10 10h4"></path><path d="M10 14h4"></path><path d="M10 18h4"></path></svg></div>
                        <h3>Жизнь на МКС</h3>
                        <p>Погрузитесь в быт космонавтов на международной космической станции</p>
                        <div class="education-footer">
                            <div class="education-info"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path
                                        d="M9.5 2A2.5 2.5 0 0 1 12 4.5v15a2.5 2.5 0 0 1-4.96.44 2.5 2.5 0 0 1-2.96-3.08 3 3 0 0 1-.34-5.58 2.5 2.5 0 0 1 1.32-4.24 2.5 2.5 0 0 1 1.98-3A2.5 2.5 0 0 1 9.5 2Z">
                                    </path>
                                    <path
                                        d="M14.5 2A2.5 2.5 0 0 0 12 4.5v15a2.5 2.5 0 0 0 4.96.44 2.5 2.5 0 0 0 2.96-3.08 3 3 0 0 0 .34-5.58 2.5 2.5 0 0 0-1.32-4.24 2.5 2.5 0 0 0-1.98-3A2.5 2.5 0 0 0 14.5 2Z">
                                    </path>
                                </svg><span>6 вопросов</span></div><button class="education-start">Начать →</button>
                        </div>
                    </div>
                </div>
                <div class="quiz-section">
                    <div class="quiz-content">
                        <div class="quiz-header"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                            </svg>
                            <h3>Проверь себя</h3>
                        </div>
                        <p>Пройдите быструю викторину и проверьте свои знания о космонавтике</p>
                        <div class="quiz-questions">
                            <div class="quiz-question">
                                <div class="question-number">1</div>
                                <p>Кто был первым человеком в космосе?</p>
                            </div>
                            <div class="quiz-question">
                                <div class="question-number">2</div>
                                <p>В каком году состоялась первая высадка на Луну?</p>
                            </div>
                        </div><button class="quiz-btn">Начать викторину</button>
                    </div>
                    <div class="quiz-stats">
                        <div class="quiz-stat">
                            <div class="stat-value-large">12+</div>
                            <div class="stat-label-small">Викторин</div>
                        </div>
                        <div class="quiz-stat">
                            <div class="stat-value-large">50+</div>
                            <div class="stat-label-small">Вопросов</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="gagarin-section" id="gagarin">
            <div class="gagarin-bg"></div>
            <div class="container">
                <div class="section-header">
                    <div class="section-badge badge-red"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-rocket w-4 h-4 text-red-400"><path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"></path><path d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"></path><path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"></path><path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"></path></svg><span>12 апреля 1961 года</span></div>
                    <h2>Полёт Юрия Гагарина</h2>
                    <p>108 минут, которые изменили историю человечества</p>
                </div>
                <div class="gagarin-grid">
                    <div class="gagarin-timeline">
                        <div class="gagarin-timeline-header"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock w-6 h-6 text-blue-400"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                            <h3>Хроника полёта</h3>
                        </div>
                        <div class="timeline-steps">
                            <div class="timeline-line-vertical"></div>
                            <div class="timeline-step">
                                <div class="step-point"></div>
                                <div class="step-content">
                                    <div class="step-time">09:07</div>
                                    <div class="step-event">Запуск ракеты-носителя с космодрома Байконур</div>
                                </div>
                            </div>
                            <div class="timeline-step">
                                <div class="step-point"></div>
                                <div class="step-content">
                                    <div class="step-time">09:18</div>
                                    <div class="step-event">Выход на орбиту Земли</div>
                                </div>
                            </div>
                            <div class="timeline-step">
                                <div class="step-point"></div>
                                <div class="step-content">
                                    <div class="step-time">10:55</div>
                                    <div class="step-event">Приземление в Саратовской области</div>
                                </div>
                            </div>
                        </div>
                        <div class="gagarin-quote">
                            <p class="quote-text">"Поехали!"</p>
                            <p class="quote-author">Легендарные слова Юрия Гагарина перед стартом</p>
                        </div>
                    </div>
                    <div class="gagarin-content">
                        <div class="gagarin-image"><img src="https://images.unsplash.com/photo-1598431415913-48cc762b469b?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=800" alt="Юрий Гагарин" />
                            <div class="gagarin-image-text">
                                <h4>Юрий Алексеевич Гагарин</h4>
                                <p>Первый космонавт планеты Земля</p>
                            </div>
                        </div>
                        <div class="bg-gray-900/60 backdrop-blur-md border border-gray-800 rounded-2xl p-6">
                            <h4 class="text-white text-lg font-bold mb-4">Архивные материалы</h4>
                            <div class="grid grid-cols-3 gap-4"><button class="p-4 bg-gray-800/50 hover:bg-gray-800 rounded-xl transition-colors group"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-image w-8 h-8 text-blue-400 mx-auto mb-2 group-hover:scale-110 transition-transform"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"></rect><circle cx="9" cy="9" r="2"></circle><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"></path></svg><div class="text-white text-sm font-semibold mb-1">120</div><div class="text-gray-400 text-xs">Редкие фотографии</div></button>
                                <button
                                    class="p-4 bg-gray-800/50 hover:bg-gray-800 rounded-xl transition-colors group"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-video w-8 h-8 text-blue-400 mx-auto mb-2 group-hover:scale-110 transition-transform"><path d="m16 13 5.223 3.482a.5.5 0 0 0 .777-.416V7.87a.5.5 0 0 0-.752-.432L16 10.5"></path><rect x="2" y="6" width="14" height="12" rx="2"></rect></svg>
                                    <div
                                        class="text-white text-sm font-semibold mb-1">15</div>
                            <div class="text-gray-400 text-xs">Видеозаписи</div>
                            </button><button class="p-4 bg-gray-800/50 hover:bg-gray-800 rounded-xl transition-colors group"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-8 h-8 text-blue-400 mx-auto mb-2 group-hover:scale-110 transition-transform"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path><path d="M14 2v4a2 2 0 0 0 2 2h4"></path><path d="M10 9H8"></path><path d="M16 13H8"></path><path d="M16 17H8"></path></svg><div class="text-white text-sm font-semibold mb-1">45</div><div class="text-gray-400 text-xs">Документы</div></button></div>
                    </div>
                </div>
            </div>
            <div class="bg-gradient-to-br from-purple-900/30 to-blue-900/30 backdrop-blur-md border border-purple-500/30 rounded-2xl p-8">
                <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin w-6 h-6 text-purple-400"><path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path><circle cx="12" cy="10" r="3"></circle></svg>
                            <h3
                                class="text-2xl font-bold text-white">Мероприятия ко Дню космонавтики</h3>
                        </div>
                        <p class="text-gray-300 mb-4">Открытые лекции, выставки и кинопоказы в вашем городе</p>
                        <div class="flex flex-wrap gap-2"><span class="px-3 py-1 bg-purple-500/20 border border-purple-500/30 rounded-full text-purple-300 text-sm">Москва - 15 событий</span><span class="px-3 py-1 bg-blue-500/20 border border-blue-500/30 rounded-full text-blue-300 text-sm">Санкт-Петербург - 12 событий</span>
                            <span
                                class="px-3 py-1 bg-green-500/20 border border-green-500/30 rounded-full text-green-300 text-sm">Казань - 8 событий</span>
                        </div>
                    </div><button class="px-6 py-3 bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-white rounded-full transition-all transform hover:scale-105">Посмотреть карту</button></div>
            </div>
    </div>
    </section>

    <section class="favorites-section">
        <div class="container">
            <div class="favorites-grid">
                <div class="favorites-card card-pink">
                    <div class="favorites-header">
                        <div class="favorites-icon icon-pink"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-heart w-6 h-6 text-white"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"></path></svg></div>
                        <h3>Избранное</h3>
                    </div>
                    <p>Сохраняйте важные события и создавайте свой личный маршрут по истории космонавтики</p>
                    <div class="favorites-list">
                        <div class="favorite-item">
                            <div class="favorite-dot"></div><span>Первый полёт Гагарина</span>
                        </div>
                        <div class="favorite-item">
                            <div class="favorite-dot"></div><span>Высадка на Луну</span>
                        </div>
                    </div><button class="favorites-btn btn-pink">Управлять избранным</button>
                </div>
                <div class="favorites-column">
                    <div class="favorites-card card-blue-alt">
                        <div class="favorites-header">
                            <div class="favorites-icon icon-blue"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bell w-6 h-6 text-white"><path d="M10.268 21a2 2 0 0 0 3.464 0"></path><path d="M3.262 15.326A1 1 0 0 0 4 17h16a1 1 0 0 0 .74-1.673C19.41 13.956 18 12.499 18 8A6 6 0 0 0 6 8c0 4.499-1.411 5.956-2.738 7.326"></path></svg></div>
                            <h3>Напоминания</h3>
                        </div>
                        <p>Получайте уведомления о годовщинах значимых космических событий</p>
                        <div class="reminder-item"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar w-5 h-5 text-blue-400"><path d="M8 2v4"></path><path d="M16 2v4"></path><rect width="18" height="18" x="3" y="4" rx="2"></rect><path d="M3 10h18"></path></svg>
                            <div>
                                <div class="reminder-date">12 апреля</div>
                                <div class="reminder-text">День космонавтики</div>
                            </div>
                        </div><button class="favorites-btn btn-blue">Настроить напоминания</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-about">
                    <div class="footer-logo"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path
                                    d="M4.5 16.5c-1.5 1.25-2 5-2 5s3.75-.5 5-2c.625-.625 1-1.5 1-2.5v-1l4-4 4 4v1c0 1 .375 1.875 1 2.5 1.25 1.5 5 2 5 2s-.5-3.75-2-5c-.625-.625-1.5-1-2.5-1h-1l-4-4-4 4h-1c-1 0-1.875.375-2.5 1z" />
                            </svg>
                        <h3>Космический Таймлайн</h3>
                    </div>
                    <p>Интерактивное путешествие сквозь историю освоения космоса</p>
                    <div class="footer-social"><a href="#" class="social-link"><svg viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2">
                                    <path
                                        d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                                    </path>
                                </svg></a></div>
                </div>
                <div class="footer-links">
                    <h4>Навигация</h4>
                    <ul>
                        <li><a href="#timeline">Временная шкала</a></li>
                        <li><a href="#education">Образование</a></li>
                        <li><a href="#gagarin">День космонавтики</a></li>
                    </ul>
                </div>
                <div class="footer-contact">
                    <h4>Контакты</h4><a href="mailto:info@space-timeline.ru" class="footer-email"><svg
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                </path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg><span>info@space-timeline.ru</span></a>
                </div>
            </div>
            <div class="footer-bottom">
                <p>© 2026 Космический Таймлайн. Все права защищены.</p>
                <div class="footer-legal"><a href="#">Политика конфиденциальности</a><a href="#">Условия
                            использования</a></div>
            </div>
        </div>
    </footer>
    </div>
    <script>
        // Мобильное меню
        document.querySelector('.mobile-menu')?.addEventListener('click', function() {
            const nav = document.querySelector('.nav');
            if (nav) {
                nav.style.display = nav.style.display === 'flex' ? 'none' : 'flex';
                nav.style.flexDirection = 'column';
                nav.style.position = 'absolute';
                nav.style.top = '70px';
                nav.style.left = '0';
                nav.style.right = '0';
                nav.style.backgroundColor = '#030712';
                nav.style.padding = '1rem';
                nav.style.gap = '1rem';
                nav.style.borderBottom = '1px solid #1f2937';
            }
        });

        // Адаптация при изменении размера окна
        window.addEventListener('resize', function() {
            const nav = document.querySelector('.nav');
            if (window.innerWidth >= 768) {
                if (nav) {
                    nav.style.display = 'flex';
                    nav.style.flexDirection = 'row';
                    nav.style.position = 'static';
                    nav.style.backgroundColor = 'transparent';
                    nav.style.padding = '0';
                    nav.style.borderBottom = 'none';
                }
            } else {
                const mobileMenu = document.querySelector('.mobile-menu');
                if (mobileMenu && nav && window.getComputedStyle(nav).display === 'flex') {
                    // Оставляем как есть
                } else if (nav) {
                    nav.style.display = 'none';
                }
            }
        });
    </script>
</body>

</html>