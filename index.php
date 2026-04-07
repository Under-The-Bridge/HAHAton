
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Космический Таймлайн</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Дополнительные стили поверх Tailwind */
        .timeline-line {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            width: 2px;
            height: 100%;
            background: linear-gradient(to bottom, #3b82f6, #a855f7, #ec4899);
            opacity: 0.3;
        }
        @media (max-width: 768px) {
            .timeline-line {
                display: none;
            }
        }
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</head>

<body>
    <div class="space-timeline">
        <!-- Header -->
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

        <!-- Hero -->
        <section class="hero">
            <div class="hero-bg"><img
                    src="https://images.unsplash.com/photo-1627947224567-4b17c3137ad4?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=1920"
                    alt="Космос" />
                <div class="hero-overlay"></div>
            </div>
            <div class="hero-content">
                <div class="hero-badge"><span>🚀 К Дню космонавтики • 12 апреля 2026</span></div>
                <h1 class="hero-title">Космический <span class="gradient-text">Таймлайн</span></h1>
                <p class="hero-subtitle">Откройте для себя захватывающую историю освоения космоса — от первых теорий до
                    современных достижений</p>
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

        <!-- Main + Timeline -->
        <div class="main-container">
            <div class="container">
                <div class="content-grid">
                    <aside class="filter-panel">
                        <div class="bg-gray-900/60 backdrop-blur-md border border-gray-800 rounded-2xl p-6 sticky top-20 space-y-6">
                            <form method="GET" action="" id="filterForm">
                                <div class="flex items-center gap-3 pb-4 border-b border-gray-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-funnel w-5 h-5 text-blue-400"><path d="M10 20a1 1 0 0 0 .553.895l2 1A1 1 0 0 0 14 21v-7a2 2 0 0 1 .517-1.341L21.74 4.67A1 1 0 0 0 21 3H3a1 1 0 0 0-.742 1.67l7.225 7.989A2 2 0 0 1 10 14z"></path></svg>
                                    <h3 class="text-lg font-semibold text-white">Фильтры</h3>
                                </div>
                                <div>
                                    <label class="text-sm text-gray-400 mb-2 block">Поиск событий</label>
                                    <div class="relative">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-500"><circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.3-4.3"></path></svg>
                                        <input type="text" name="search" placeholder="Поиск..." value="<?php echo htmlspecialchars($search); ?>" class="w-full pl-10 pr-4 py-2 bg-gray-800/50 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500" onchange="this.form.submit()">
                                    </div>
                                </div>
                                <div>
                                    <div class="flex items-center gap-2 mb-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-earth w-4 h-4 text-green-400"><path d="M21.54 15H17a2 2 0 0 0-2 2v4.54"></path><path d="M7 3.34V5a3 3 0 0 0 3 3a2 2 0 0 1 2 2c0 1.1.9 2 2 2a2 2 0 0 0 2-2c0-1.1.9-2 2-2h3.17"></path><path d="M11 21.95V18a2 2 0 0 0-2-2a2 2 0 0 1-2-2v-1a2 2 0 0 0-2-2H2.05"></path><circle cx="12" cy="12" r="10"></circle></svg>
                                        <label class="text-sm text-gray-400">Страны</label>
                                    </div>
                                    <div class="space-y-2">
                                        <label class="flex items-center gap-2 cursor-pointer group">
                                            <input type="checkbox" name="country" value="СССР" <?php echo $country == 'СССР' ? 'checked' : ''; ?> onchange="this.form.submit()" class="w-4 h-4 rounded bg-gray-800 border-gray-600 text-blue-500 focus:ring-blue-500">
                                            <span class="text-sm text-gray-300 group-hover:text-white transition-colors">СССР/Россия</span>
                                        </label>
                                        <label class="flex items-center gap-2 cursor-pointer group">
                                            <input type="checkbox" name="country" value="США" <?php echo $country == 'США' ? 'checked' : ''; ?> onchange="this.form.submit()" class="w-4 h-4 rounded bg-gray-800 border-gray-600 text-blue-500 focus:ring-blue-500">
                                            <span class="text-sm text-gray-300 group-hover:text-white transition-colors">США</span>
                                        </label>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex items-center gap-2 mb-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-rocket w-4 h-4 text-blue-400"><path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"></path><path d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"></path><path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"></path><path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"></path></svg>
                                        <label class="text-sm text-gray-400">Тип события</label>
                                    </div>
                                    <div class="space-y-2">
                                        <label class="flex items-center gap-2 cursor-pointer group">
                                            <input type="checkbox" name="event_type" value="Запуски ракет" <?php echo $event_type == 'Запуски ракет' ? 'checked' : ''; ?> onchange="this.form.submit()" class="w-4 h-4 rounded bg-gray-800 border-gray-600 text-blue-500 focus:ring-blue-500">
                                            <span class="text-sm text-gray-300 group-hover:text-white transition-colors">Запуски ракет</span>
                                        </label>
                                        <label class="flex items-center gap-2 cursor-pointer group">
                                            <input type="checkbox" name="event_type" value="Пилотируемые полеты" <?php echo $event_type == 'Пилотируемые полеты' ? 'checked' : ''; ?> onchange="this.form.submit()" class="w-4 h-4 rounded bg-gray-800 border-gray-600 text-blue-500 focus:ring-blue-500">
                                            <span class="text-sm text-gray-300 group-hover:text-white transition-colors">Пилотируемые полеты</span>
                                        </label>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex items-center gap-2 mb-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users-round w-4 h-4 text-purple-400"><path d="M18 21a8 8 0 0 0-16 0"></path><circle cx="10" cy="8" r="5"></circle><path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3"></path></svg>
                                        <label class="text-sm text-gray-400">Ключевые фигуры</label>
                                    </div>
                                    <div class="space-y-2">
                                        <label class="flex items-center gap-2 cursor-pointer group">
                                            <input type="checkbox" name="person" value="Ю. Гагарин" <?php echo $person == 'Ю. Гагарин' ? 'checked' : ''; ?> onchange="this.form.submit()" class="w-4 h-4 rounded bg-gray-800 border-gray-600 text-blue-500 focus:ring-blue-500">
                                            <span class="text-sm text-gray-300 group-hover:text-white transition-colors">Ю. Гагарин</span>
                                        </label>
                                        <label class="flex items-center gap-2 cursor-pointer group">
                                            <input type="checkbox" name="person" value="Н. Армстронг" <?php echo $person == 'Н. Армстронг' ? 'checked' : ''; ?> onchange="this.form.submit()" class="w-4 h-4 rounded bg-gray-800 border-gray-600 text-blue-500 focus:ring-blue-500">
                                            <span class="text-sm text-gray-300 group-hover:text-white transition-colors">Н. Армстронг</span>
                                        </label>
                                    </div>
                                </div>
                                <button type="button" class="w-full py-2 px-4 bg-gray-800 hover:bg-gray-700 text-gray-300 rounded-lg transition-colors text-sm" onclick="window.location.href='index.php'">Сбросить фильтры</button>
                            </form>
                        </div>
                    </aside>

                    <main class="timeline-main" id="timeline">
                        <div class="section-header">
                            <h2>Временная шкала космонавтики</h2>
                            <p>От первых теорий до современных достижений</p>
                        </div>
                        <div class="epochs">
                            <div class="epoch-card epoch-purple">
                                <div class="epoch-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg></div>
                                <h3>Ранние теории</h3>
                                <p>1903-1956</p>
                            </div>
                            <div class="epoch-card epoch-blue">
                                <div class="epoch-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-satellite w-6 h-6 text-white">
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
                                <div class="epoch-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2">
                                        <path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"></path>
                                        <line x1="4" y1="22" x2="4" y2="15"></line>
                                    </svg></div>
                                <h3>Лунная гонка</h3>
                                <p>1961-1972</p>
                            </div>
                            <div class="epoch-card epoch-green">
                                <div class="epoch-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-rocket w-4 h-4">
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
                                <div class="epoch-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2">
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

                        <div class="timeline relative py-8">
                            <div class="timeline-line"></div>
                            <?php $counter = 0; foreach($events as $event): ?>
                            <div class="flex items-center gap-8 mb-12 <?php echo $counter % 2 == 0 ? 'md:flex-row' : 'md:flex-row-reverse'; ?> flex-col">
                                <div class="hidden md:block flex-1"></div>
                                <div class="hidden md:flex flex-shrink-0 w-16 h-16 rounded-full bg-gradient-to-br from-blue-500 to-purple-600 items-center justify-center border-4 border-gray-950 relative z-10 shadow-lg shadow-blue-500/50">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-rocket w-8 h-8 text-white"><path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"></path><path d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"></path><path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"></path><path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"></path></svg>
                                </div>
                                <div class="flex-1 w-full">
                                    <div class="group bg-gray-900/60 backdrop-blur-md border border-gray-800 rounded-2xl overflow-hidden hover:border-blue-500/50 transition-all transform hover:scale-[1.02] hover:shadow-2xl hover:shadow-blue-500/20">
                                        <div class="relative h-48 overflow-hidden">
                                            <img src="<?php echo htmlspecialchars($event['image_url']); ?>" alt="<?php echo htmlspecialchars($event['title']); ?>" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                                            <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/50 to-transparent"></div>
                                            <div class="absolute top-4 left-4 px-3 py-1 bg-gray-950/80 backdrop-blur-sm rounded-full text-xs text-white border border-gray-700"><?php echo htmlspecialchars($event['country']); ?></div>
                                            <div class="absolute top-4 right-4 flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                                <button class="p-2 bg-gray-950/80 backdrop-blur-sm rounded-full hover:bg-blue-600 transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-heart w-4 h-4 text-white"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"></path></svg></button>
                                                <button class="p-2 bg-gray-950/80 backdrop-blur-sm rounded-full hover:bg-blue-600 transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-share2 lucide-share-2 w-4 h-4 text-white"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" x2="15.42" y1="13.51" y2="17.49"></line><line x1="15.41" x2="8.59" y1="6.51" y2="10.49"></line></svg></button>
                                            </div>
                                        </div>
                                        <div class="p-6">
                                            <div class="flex items-center gap-2 text-blue-400 mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar w-4 h-4"><path d="M8 2v4"></path><path d="M16 2v4"></path><rect width="18" height="18" x="3" y="4" rx="2"></rect><path d="M3 10h18"></path></svg>
                                                <span class="text-sm"><?php echo formatDate($event['event_date']); ?></span>
                                            </div>
                                            <h3 class="text-xl font-bold text-white mb-2 group-hover:text-blue-400 transition-colors"><?php echo htmlspecialchars($event['title']); ?></h3>
                                            <p class="text-gray-400 mb-4 line-clamp-2"><?php echo htmlspecialchars($event['description']); ?></p>
                                            <div class="flex items-center justify-between pt-4 border-t border-gray-800">
                                                <div class="flex items-center gap-2 text-gray-500 text-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin w-4 h-4"><path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                                    <span>Подробнее</span>
                                                </div>
                                                <button class="flex items-center gap-2 text-blue-400 hover:text-blue-300 transition-colors text-sm">
                                                    <span>Читать далее</span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-external-link w-4 h-4"><path d="M15 3h6v6"></path><path d="M10 14 21 3"></path><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path></svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $counter++; endforeach; ?>
                            <?php if(empty($events)): ?>
                            <div class="text-center py-12 text-gray-400">Событий не найдено. Попробуйте изменить параметры поиска.</div>
                            <?php endif; ?>
                        </div>
                        <div class="load-more"><button class="load-more-btn" onclick="alert('Все события загружены')">Показать больше событий</button></div>
                    </main>
                </div>
            </div>
        </div>

        <!-- Education Section -->
        <section class="education-section" id="education">
            <div class="container">
                <div class="section-header">
                    <div class="section-badge"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-book-open w-4 h-4 text-green-400">
                            <path d="M12 7v14"></path>
                            <path
                                d="M3 18a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h5a4 4 0 0 1 4 4 4 4 0 0 1 4-4h5a1 1 0 0 1 1 1v13a1 1 0 0 1-1 1h-6a3 3 0 0 0-3 3 3 3 0 0 0-3-3z">
                            </path>
                        </svg><span>Образовательный раздел</span></div>
                    <h2>Изучите космонавтику</h2>
                    <p>Интерактивные материалы и викторины для углубленного понимания космических технологий</p>
                </div>
                <div class="education-grid">
                    <div class="education-card card-blue">
                        <div class="education-bg"></div>
                        <div class="education-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="lucide lucide-atom w-8 h-8 text-white">
                                <circle cx="12" cy="12" r="1"></circle>
                                <path
                                    d="M20.2 20.2c2.04-2.03.02-7.36-4.5-11.9-4.54-4.52-9.87-6.54-11.9-4.5-2.04 2.03-.02 7.36 4.5 11.9 4.54 4.52 9.87 6.54 11.9 4.5Z">
                                </path>
                                <path
                                    d="M15.7 15.7c4.52-4.54 6.54-9.87 4.5-11.9-2.03-2.04-7.36-.02-11.9 4.5-4.52 4.54-6.54 9.87-4.5 11.9 2.03 2.04 7.36.02 11.9-4.5Z">
                                </path>
                            </svg></div>
                        <h3>Принципы работы ракет</h3>
                        <p>Узнайте, как работают ракетные двигатели и законы реактивного движения</p>
                        <div class="education-footer">
                            <div class="education-info"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-brain w-4 h-4"><path d="M12 5a3 3 0 1 0-5.997.125 4 4 0 0 0-2.526 5.77 4 4 0 0 0 .556 6.588A4 4 0 1 0 12 18Z"></path><path d="M12 5a3 3 0 1 1 5.997.125 4 4 0 0 1 2.526 5.77 4 4 0 0 1-.556 6.588A4 4 0 1 1 12 18Z"></path><path d="M15 13a4.5 4.5 0 0 1-3-4 4.5 4.5 0 0 1-3 4"></path><path d="M17.599 6.5a3 3 0 0 0 .399-1.375"></path><path d="M6.003 5.125A3 3 0 0 0 6.401 6.5"></path><path d="M3.477 10.896a4 4 0 0 1 .585-.396"></path><path d="M19.938 10.5a4 4 0 0 1 .585.396"></path><path d="M6 18a4 4 0 0 1-1.967-.516"></path><path d="M19.967 17.484A4 4 0 0 1 18 18"></path></svg><span>5 вопросов</span></div><button class="education-start">Начать →</button>
                        </div>
                    </div>
                    <div class="education-card card-purple">
                        <div class="education-bg"></div>
                        <div class="education-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="lucide lucide-orbit w-8 h-8 text-white">
                                <circle cx="12" cy="12" r="3"></circle>
                                <circle cx="19" cy="5" r="2"></circle>
                                <circle cx="5" cy="19" r="2"></circle>
                                <path d="M10.4 21.9a10 10 0 0 0 9.941-15.416"></path>
                                <path d="M13.5 2.1a10 10 0 0 0-9.841 15.416"></path>
                            </svg></div>
                        <h3>Орбитальная механика</h3>
                        <p>Разберитесь в законах движения космических аппаратов на орбите</p>
                        <div class="education-footer">
                            <div class="education-info"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-brain w-4 h-4"><path d="M12 5a3 3 0 1 0-5.997.125 4 4 0 0 0-2.526 5.77 4 4 0 0 0 .556 6.588A4 4 0 1 0 12 18Z"></path><path d="M12 5a3 3 0 1 1 5.997.125 4 4 0 0 1 2.526 5.77 4 4 0 0 1-.556 6.588A4 4 0 1 1 12 18Z"></path><path d="M15 13a4.5 4.5 0 0 1-3-4 4.5 4.5 0 0 1-3 4"></path><path d="M17.599 6.5a3 3 0 0 0 .399-1.375"></path><path d="M6.003 5.125A3 3 0 0 0 6.401 6.5"></path><path d="M3.477 10.896a4 4 0 0 1 .585-.396"></path><path d="M19.938 10.5a4 4 0 0 1 .585.396"></path><path d="M6 18a4 4 0 0 1-1.967-.516"></path><path d="M19.967 17.484A4 4 0 0 1 18 18"></path></svg><span>7 вопросов</span></div><button class="education-start">Начать →</button>
                        </div>
                    </div>
                    <div class="education-card card-green">
                        <div class="education-bg"></div>
                        <div class="education-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="lucide lucide-building2 lucide-building-2 w-8 h-8 text-white">
                                <path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"></path>
                                <path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2"></path>
                                <path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2"></path>
                                <path d="M10 6h4"></path>
                                <path d="M10 10h4"></path>
                                <path d="M10 14h4"></path>
                                <path d="M10 18h4"></path>
                            </svg></div>
                        <h3>Жизнь на МКС</h3>
                        <p>Погрузитесь в быт космонавтов на международной космической станции</p>
                        <div class="education-footer">
                            <div class="education-info"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-brain w-4 h-4"><path d="M12 5a3 3 0 1 0-5.997.125 4 4 0 0 0-2.526 5.77 4 4 0 0 0 .556 6.588A4 4 0 1 0 12 18Z"></path><path d="M12 5a3 3 0 1 1 5.997.125 4 4 0 0 1 2.526 5.77 4 4 0 0 1-.556 6.588A4 4 0 1 1 12 18Z"></path><path d="M15 13a4.5 4.5 0 0 1-3-4 4.5 4.5 0 0 1-3 4"></path><path d="M17.599 6.5a3 3 0 0 0 .399-1.375"></path><path d="M6.003 5.125A3 3 0 0 0 6.401 6.5"></path><path d="M3.477 10.896a4 4 0 0 1 .585-.396"></path><path d="M19.938 10.5a4 4 0 0 1 .585.396"></path><path d="M6 18a4 4 0 0 1-1.967-.516"></path><path d="M19.967 17.484A4 4 0 0 1 18 18"></path></svg><span>6 вопросов</span></div><button class="education-start">Начать →</button>
                        </div>
                    </div>
                </div>
                <div class="quiz-section">
                    <div class="quiz-content">
                        <div class="quiz-header"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2">
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

        <!-- Gagarin Section -->
        <section class="gagarin-section" id="gagarin">
            <div class="gagarin-bg"></div>
            <div class="container">
                <div class="text-center mb-12">
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-red-500/20 backdrop-blur-sm border border-red-400/30 rounded-full mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-rocket w-4 h-4 text-red-400"><path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"></path><path d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"></path><path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"></path><path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"></path></svg>
                        <span class="text-red-300 text-sm">12 апреля 1961 года</span>
                    </div>
                    <h2 class="text-4xl md:text-5xl font-bold text-white mb-4">Полёт Юрия Гагарина</h2>
                    <p class="text-gray-400 text-lg max-w-2xl mx-auto">108 минут, которые изменили историю человечества</p>
                </div>
                <div class="grid lg:grid-cols-2 gap-8 mb-12">
                    <div class="bg-gray-900/60 backdrop-blur-md border border-gray-800 rounded-2xl p-8">
                        <div class="flex items-center gap-3 mb-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock w-6 h-6 text-blue-400"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                            <h3 class="text-2xl font-bold text-white">Хроника полёта</h3>
                        </div>
                        <div class="relative space-y-6">
                            <div class="absolute left-[19px] top-2 bottom-2 w-0.5 bg-gradient-to-b from-blue-500 to-purple-500"></div>
                            <div class="relative flex gap-4">
                                <div class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-600 border-4 border-gray-900 flex items-center justify-center z-10"><div class="w-2 h-2 bg-white rounded-full"></div></div>
                                <div class="flex-1 pt-1"><div class="text-blue-400 font-semibold mb-1">09:07</div><div class="text-gray-300">Запуск ракеты-носителя с космодрома Байконур</div></div>
                            </div>
                            <div class="relative flex gap-4">
                                <div class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-600 border-4 border-gray-900 flex items-center justify-center z-10"><div class="w-2 h-2 bg-white rounded-full"></div></div>
                                <div class="flex-1 pt-1"><div class="text-blue-400 font-semibold mb-1">09:18</div><div class="text-gray-300">Выход на орбиту Земли</div></div>
                            </div>
                            <div class="relative flex gap-4">
                                <div class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-600 border-4 border-gray-900 flex items-center justify-center z-10"><div class="w-2 h-2 bg-white rounded-full"></div></div>
                                <div class="flex-1 pt-1"><div class="text-blue-400 font-semibold mb-1">10:55</div><div class="text-gray-300">Приземление в Саратовской области</div></div>
                            </div>
                        </div>
                        <div class="mt-8 p-6 bg-gradient-to-br from-blue-900/30 to-purple-900/30 border border-blue-500/30 rounded-xl">
                            <p class="text-xl text-white italic mb-2">"Поехали!"</p>
                            <p class="text-gray-400 text-sm">Легендарные слова Юрия Гагарина перед стартом</p>
                        </div>
                    </div>
                    <div class="space-y-6">
                        <div class="relative rounded-2xl overflow-hidden border border-gray-800">
                            <img src="https://images.unsplash.com/photo-1598431415913-48cc762b469b?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=800" alt="Юрий Гагарин" class="w-full h-[400px] object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-transparent"></div>
                            <div class="absolute bottom-0 left-0 right-0 p-6">
                                <h4 class="text-white text-xl font-bold mb-1">Юрий Алексеевич Гагарин</h4>
                                <p class="text-gray-300 text-sm">Первый космонавт планеты Земля</p>
                            </div>
                        </div>
                        <div class="bg-gray-900/60 backdrop-blur-md border border-gray-800 rounded-2xl p-6">
                            <h4 class="text-white text-lg font-bold mb-4">Архивные материалы</h4>
                            <div class="grid grid-cols-3 gap-4">
                                <button class="p-4 bg-gray-800/50 hover:bg-gray-800 rounded-xl transition-colors group"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-image w-8 h-8 text-blue-400 mx-auto mb-2 group-hover:scale-110 transition-transform"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"></rect><circle cx="9" cy="9" r="2"></circle><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"></path></svg><div class="text-white text-sm font-semibold mb-1">120</div><div class="text-gray-400 text-xs">Редкие фотографии</div></button>
                                <button class="p-4 bg-gray-800/50 hover:bg-gray-800 rounded-xl transition-colors group"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-video w-8 h-8 text-blue-400 mx-auto mb-2 group-hover:scale-110 transition-transform"><path d="m16 13 5.223 3.482a.5.5 0 0 0 .777-.416V7.87a.5.5 0 0 0-.752-.432L16 10.5"></path><rect x="2" y="6" width="14" height="12" rx="2"></rect></svg><div class="text-white text-sm font-semibold mb-1">15</div><div class="text-gray-400 text-xs">Видеозаписи</div></button>
                                <button class="p-4 bg-gray-800/50 hover:bg-gray-800 rounded-xl transition-colors group"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-8 h-8 text-blue-400 mx-auto mb-2 group-hover:scale-110 transition-transform"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path><path d="M14 2v4a2 2 0 0 0 2 2h4"></path><path d="M10 9H8"></path><path d="M16 13H8"></path><path d="M16 17H8"></path></svg><div class="text-white text-sm font-semibold mb-1">45</div><div class="text-gray-400 text-xs">Документы</div></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gradient-to-br from-purple-900/30 to-blue-900/30 backdrop-blur-md border border-purple-500/30 rounded-2xl p-8">
                    <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                        <div class="flex-1">
                            <div class="flex items-center gap-3 mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin w-6 h-6 text-purple-400"><path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                <h3 class="text-2xl font-bold text-white">Мероприятия ко Дню космонавтики</h3>
                            </div>
                            <p class="text-gray-300 mb-4">Открытые лекции, выставки и кинопоказы в вашем городе</p>
                            <div class="flex flex-wrap gap-2">
                                <span class="px-3 py-1 bg-purple-500/20 border border-purple-500/30 rounded-full text-purple-300 text-sm">Москва - 15 событий</span>
                                <span class="px-3 py-1 bg-blue-500/20 border border-blue-500/30 rounded-full text-blue-300 text-sm">Санкт-Петербург - 12 событий</span>
                                <span class="px-3 py-1 bg-green-500/20 border border-green-500/30 rounded-full text-green-300 text-sm">Казань - 8 событий</span>
                            </div>
                        </div>
                        <button class="px-6 py-3 bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-white rounded-full transition-all transform hover:scale-105">Посмотреть карту</button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Favorites -->
        <section class="favorites-section">
            <div class="container">
                <div class="grid md:grid-cols-2 gap-8">
                    <div class="bg-gradient-to-br from-pink-900/30 to-purple-900/30 backdrop-blur-md border border-pink-500/30 rounded-2xl p-8">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="p-3 bg-pink-500 rounded-full"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-heart w-6 h-6 text-white">
                                    <path
                                        d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z">
                                    </path>
                                </svg></div>
                            <h3 class="text-2xl font-bold text-white">Избранное</h3>
                        </div>
                        <p class="text-gray-300 mb-6">Сохраняйте важные события и создавайте свой личный маршрут по истории космонавтики</p>
                        <div class="space-y-3">
                            <div class="flex items-center gap-3 p-3 bg-gray-900/50 rounded-lg"><div class="w-2 h-2 bg-pink-500 rounded-full"></div><span class="text-gray-300 text-sm">Первый полёт Гагарина</span></div>
                            <div class="flex items-center gap-3 p-3 bg-gray-900/50 rounded-lg"><div class="w-2 h-2 bg-pink-500 rounded-full"></div><span class="text-gray-300 text-sm">Высадка на Луну</span></div>
                            <div class="flex items-center gap-3 p-3 bg-gray-900/50 rounded-lg"><div class="w-2 h-2 bg-pink-500 rounded-full"></div><span class="text-gray-300 text-sm">Запуск МКС</span></div>
                        </div>
                        <button class="w-full mt-6 py-3 bg-pink-600 hover:bg-pink-700 text-white rounded-full transition-colors">Управлять избранным</button>
                    </div>
                    <div class="space-y-6">
                        <div class="bg-gradient-to-br from-blue-900/30 to-cyan-900/30 backdrop-blur-md border border-blue-500/30 rounded-2xl p-8">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="p-3 bg-blue-500 rounded-full"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-bell w-6 h-6 text-white">
                                        <path d="M10.268 21a2 2 0 0 0 3.464 0"></path>
                                        <path
                                            d="M3.262 15.326A1 1 0 0 0 4 17h16a1 1 0 0 0 .74-1.673C19.41 13.956 18 12.499 18 8A6 6 0 0 0 6 8c0 4.499-1.411 5.956-2.738 7.326">
                                        </path>
                                    </svg></div>
                                <h3 class="text-2xl font-bold text-white">Напоминания</h3>
                            </div>
                            <p class="text-gray-300 mb-6">Получайте уведомления о годовщинах значимых космических событий</p>
                            <div class="flex items-center gap-3 p-4 bg-blue-500/10 border border-blue-500/30 rounded-lg mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar w-5 h-5 text-blue-400"><path d="M8 2v4"></path><path d="M16 2v4"></path><rect width="18" height="18" x="3" y="4" rx="2"></rect><path d="M3 10h18"></path></svg>
                                <div><div class="text-white font-semibold text-sm">12 апреля</div><div class="text-gray-400 text-xs">День космонавтики</div></div>
                            </div>
                            <button class="w-full py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-full transition-colors">Настроить напоминания</button>
                        </div>
                        <div class="bg-gradient-to-br from-green-900/30 to-emerald-900/30 backdrop-blur-md border border-green-500/30 rounded-2xl p-8">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="p-3 bg-green-500 rounded-full"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-share2 lucide-share-2 w-6 h-6 text-white">
                                        <circle cx="18" cy="5" r="3"></circle>
                                        <circle cx="6" cy="12" r="3"></circle>
                                        <circle cx="18" cy="19" r="3"></circle>
                                        <line x1="8.59" x2="15.42" y1="13.51" y2="17.49"></line>
                                        <line x1="15.41" x2="8.59" y1="6.51" y2="10.49"></line>
                                    </svg></div>
                                <h3 class="text-xl font-bold text-white">Поделиться</h3>
                            </div>
                            <p class="text-gray-300 mb-4">Создавайте виртуальные открытки с историческими фактами</p>
                            <button class="w-full py-3 bg-green-600 hover:bg-green-700 text-white rounded-full transition-colors">Создать открытку</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-gray-950 border-t border-gray-800 py-12">
            <div class="container mx-auto px-4">
                <div class="grid md:grid-cols-4 gap-8 mb-8">
                    <div>
                        <div class="flex items-center gap-2 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-rocket w-6 h-6 text-blue-400"><path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"></path><path d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"></path><path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"></path><path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"></path></svg>
                            <h3 class="text-white font-bold">Космический Таймлайн</h3>
                        </div>
                        <p class="text-gray-400 text-sm mb-4">Интерактивное путешествие сквозь историю освоения космоса</p>
                        <div class="flex gap-3">
                            <a href="#" class="p-2 bg-gray-800 hover:bg-blue-600 rounded-full transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-twitter w-4 h-4 text-white"><path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"></path></svg></a>
                            <a href="#" class="p-2 bg-gray-800 hover:bg-blue-600 rounded-full transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-youtube w-4 h-4 text-white"><path d="M2.5 17a24.12 24.12 0 0 1 0-10 2 2 0 0 1 1.4-1.4 49.56 49.56 0 0 1 16.2 0A2 2 0 0 1 21.5 7a24.12 24.12 0 0 1 0 10 2 2 0 0 1-1.4 1.4 49.55 49.55 0 0 1-16.2 0A2 2 0 0 1 2.5 17"></path><path d="m10 15 5-3-5-3z"></path></svg></a>
                            <a href="#" class="p-2 bg-gray-800 hover:bg-blue-600 rounded-full transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-github w-4 h-4 text-white"><path d="M15 22v-4a4.8 4.8 0 0 0-1-3.5c3 0 6-2 6-5.5.08-1.25-.27-2.48-1-3.5.28-1.15.28-2.35 0-3.5 0 0-1 0-3 1.5-2.64-.5-5.36-.5-8 0C6 2 5 2 5 2c-.3 1.15-.3 2.35 0 3.5A5.403 5.403 0 0 0 4 9c0 3.5 3 5.5 6 5.5-.39.49-.68 1.05-.85 1.65-.17.6-.22 1.23-.15 1.85v4"></path><path d="M9 18c-4.51 2-5-2-7-2"></path></svg></a>
                        </div>
                    </div>
                    <div>
                        <h4 class="text-white font-semibold mb-4">Навигация</h4>
                        <ul class="space-y-2">
                            <li><a href="#timeline" class="text-gray-400 hover:text-blue-400 transition-colors text-sm">Временная шкала</a></li>
                            <li><a href="#education" class="text-gray-400 hover:text-blue-400 transition-colors text-sm">Образование</a></li>
                            <li><a href="#gagarin" class="text-gray-400 hover:text-blue-400 transition-colors text-sm">День космонавтики</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-blue-400 transition-colors text-sm">Избранное</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-white font-semibold mb-4">Эпохи</h4>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-400 hover:text-blue-400 transition-colors text-sm">Ранние теории</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-blue-400 transition-colors text-sm">Начало космической эры</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-blue-400 transition-colors text-sm">Лунная гонка</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-blue-400 transition-colors text-sm">Эпоха шаттлов</a></li>
                            <li><a href="#" class="text-gray-400 hover:text-blue-400 transition-colors text-sm">Современная космонавтика</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-white font-semibold mb-4">Контакты</h4>
                        <div class="space-y-3 mb-6">
                            <a href="mailto:info@space-timeline.ru" class="flex items-center gap-2 text-gray-400 hover:text-blue-400 transition-colors text-sm"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail w-4 h-4"><rect width="20" height="16" x="2" y="4" rx="2"></rect><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path></svg><span>info@space-timeline.ru</span></a>
                        </div>
                        <h4 class="text-white font-semibold mb-4">Настройки</h4>
                        <button class="flex items-center gap-2 text-gray-400 hover:text-blue-400 transition-colors text-sm"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-volume2 lucide-volume-2 w-4 h-4"><path d="M11 4.702a.705.705 0 0 0-1.203-.498L6.413 7.587A1.4 1.4 0 0 1 5.416 8H3a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h2.416a1.4 1.4 0 0 1 .997.413l3.383 3.384A.705.705 0 0 0 11 19.298z"></path><path d="M16 9a5 5 0 0 1 0 6"></path><path d="M19.364 18.364a9 9 0 0 0 0-12.728"></path></svg><span>Звуковые эффекты</span></button>
                    </div>
                </div>
                <div class="pt-8 border-t border-gray-800 flex flex-col md:flex-row items-center justify-between gap-4">
                    <p class="text-gray-500 text-sm">© 2026 Космический Таймлайн. Все права защищены.</p>
                    <div class="flex gap-6 text-sm">
                        <a href="#" class="text-gray-500 hover:text-blue-400 transition-colors">Политика конфиденциальности</a>
                        <a href="#" class="text-gray-500 hover:text-blue-400 transition-colors">Условия использования</a>
                    </div>
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