<?php

declare(strict_types=1);

require __DIR__.'/_auth.php';

if (admin_logged_in()) {
    header('Location: dashboard.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim((string) ($_POST['username'] ?? ''));
    $password = (string) ($_POST['password'] ?? '');

    if (attempt_login($username, $password)) {
        header('Location: dashboard.php');
        exit;
    }

    $error = 'بيانات الدخول غير صحيحة.';
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>تسجيل الدخول | بصمة</title>
    <link rel="icon" href="../brand/basma-logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body class="auth-body">
    <div class="auth-card">
        <a class="auth-logo" href="/Psma/">
            <img src="../brand/basma-logo-white.png" alt="بصمة">
        </a>
        <h1>دخول لوحة التحكم</h1>
        <p class="auth-lead">أدخل بيانات المدير للمتابعة</p>

        <?php if ($error !== ''): ?>
            <div class="auth-error"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></div>
        <?php endif; ?>

        <form method="POST" class="auth-form">
            <label>
                اسم المستخدم
                <input type="text" name="username" value="<?= htmlspecialchars((string) ($_POST['username'] ?? ''), ENT_QUOTES, 'UTF-8') ?>" required autofocus autocomplete="username">
            </label>
            <label>
                كلمة المرور
                <input type="password" name="password" required autocomplete="current-password">
            </label>
            <button type="submit" class="auth-btn">دخول</button>
        </form>
    </div>
</body>
</html>
