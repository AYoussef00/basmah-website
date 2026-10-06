<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>تسجيل الدخول | بصمة</title>
    <link rel="icon" href="{{ asset('brand/basma-logo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body class="auth-body">
    <div class="auth-card">
        <a class="auth-logo" href="{{ route('home') }}">
            <img src="{{ asset('brand/basma-logo-white.png') }}" alt="بصمة">
        </a>
        <h1>دخول لوحة التحكم</h1>
        <p class="auth-lead">أدخل بيانات المدير للمتابعة</p>

        @if ($errors->any())
            <div class="auth-error">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('login.store') }}" class="auth-form">
            @csrf
            <label>
                اسم المستخدم
                <input type="text" name="username" value="{{ old('username') }}" required autofocus autocomplete="username">
            </label>
            <label>
                كلمة المرور
                <input type="password" name="password" required autocomplete="current-password">
            </label>
            <label class="auth-remember">
                <input type="checkbox" name="remember">
                تذكرني
            </label>
            <button type="submit" class="auth-btn">دخول</button>
        </form>
    </div>
</body>
</html>
