@extends('layouts.admin')

@section('title', 'إعدادات الموقع')

@section('content')
    <header class="dash-top">
        <div>
            <h1>إعدادات الموقع</h1>
            <p>بيانات التواصل الظاهرة في فوتر الصفحة الرئيسية</p>
        </div>
        <div class="dash-user">{{ '@'.auth()->user()->username }}</div>
    </header>

    @if (session('success'))
        <div class="dash-alert dash-alert--success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="dash-alert dash-alert--error">
            {{ $errors->first() }}
        </div>
    @endif

    <section class="dash-panel">
        <form method="POST" action="{{ route('admin.settings.update') }}" class="settings-form">
            @csrf
            @method('PUT')

            <label>
                رقم الهاتف
                <input type="text" name="phone" value="{{ old('phone', $settings->phone) }}" required>
            </label>

            <label>
                البريد الإلكتروني
                <input type="email" name="email" value="{{ old('email', $settings->email) }}" required>
            </label>

            <label>
                العنوان
                <input type="text" name="address" value="{{ old('address', $settings->address) }}" required>
            </label>

            <button type="submit" class="auth-btn settings-submit">حفظ الإعدادات</button>
        </form>
    </section>
@endsection
