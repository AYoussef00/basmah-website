<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'لوحة التحكم') | بصمة</title>
    <link rel="icon" href="{{ asset('brand/basma-logo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body class="dash-body">
    <aside class="dash-sidebar">
        <a class="dash-brand" href="{{ route('dashboard') }}">
            <img src="{{ asset('brand/basma-logo-white.png') }}" alt="بصمة">
        </a>
        <nav class="dash-nav">
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'is-active' : '' }}">نظرة عامة</a>
            <a href="{{ route('admin.addons.index') }}" class="{{ request()->routeIs('admin.addons.*') ? 'is-active' : '' }}">الخدمات الإضافية</a>
            <a href="{{ route('admin.certificates.index') }}" class="{{ request()->routeIs('admin.certificates.*') ? 'is-active' : '' }}">الشهادات</a>
            <a href="{{ route('admin.settings.edit') }}" class="{{ request()->routeIs('admin.settings.*') ? 'is-active' : '' }}">إعدادات الموقع</a>
            <a href="{{ route('home') }}" target="_blank">عرض الموقع</a>
        </nav>
        <form method="POST" action="{{ route('logout') }}" class="dash-logout">
            @csrf
            <button type="submit">تسجيل الخروج</button>
        </form>
    </aside>

    <main class="dash-main">
        @yield('content')
    </main>
    @stack('scripts')
</body>
</html>
