<?php

declare(strict_types=1);

require __DIR__.'/_auth.php';
require_admin();

$admin = $_SESSION['basma_admin'];
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>لوحة التحكم | بصمة</title>
    <link rel="icon" href="../brand/basma-logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body class="dash-body">
    <aside class="dash-sidebar">
        <a class="dash-brand" href="dashboard.php">
            <img src="../brand/basma-logo-white.png" alt="بصمة">
        </a>
        <nav class="dash-nav">
            <a class="is-active" href="dashboard.php">نظرة عامة</a>
            <a href="/Psma/" target="_blank">عرض الموقع</a>
        </nav>
        <form method="POST" action="logout.php" class="dash-logout">
            <button type="submit">تسجيل الخروج</button>
        </form>
    </aside>

    <main class="dash-main">
        <header class="dash-top">
            <div>
                <h1>مرحبًا، <?= htmlspecialchars($admin['name'], ENT_QUOTES, 'UTF-8') ?></h1>
                <p>لوحة تحكم بصمة — ملخص سريع لأداء المنصة</p>
            </div>
            <div class="dash-user">@<?= htmlspecialchars($admin['username'], ENT_QUOTES, 'UTF-8') ?></div>
        </header>

        <section class="dash-stats">
            <article class="stat">
                <span>طلبات الاستشارة</span>
                <strong>24</strong>
            </article>
            <article class="stat">
                <span>زيارات اليوم</span>
                <strong>318</strong>
            </article>
            <article class="stat">
                <span>مشاريع نشطة</span>
                <strong>12</strong>
            </article>
            <article class="stat">
                <span>نسبة التحويل</span>
                <strong>4.8%</strong>
            </article>
        </section>

        <section class="dash-panel">
            <h2>آخر النشاط</h2>
            <ul>
                <li>تم استلام طلب استشارة جديد من نموذج الموقع</li>
                <li>تحديث محتوى قسم الخدمات</li>
                <li>تسجيل دخول ناجح للوحة التحكم</li>
            </ul>
        </section>
    </main>
</body>
</html>
