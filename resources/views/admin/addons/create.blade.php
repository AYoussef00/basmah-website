@extends('layouts.admin')

@section('title', 'إضافة خدمة')

@section('content')
    <header class="dash-top">
        <div>
            <h1>إضافة خدمة إضافية</h1>
            <p>ستظهر الخدمة في قسم «خدمات تُدفع مرة واحدة» على الصفحة الرئيسية</p>
        </div>
        <a class="dash-link" href="{{ route('admin.addons.index') }}">رجوع للقائمة</a>
    </header>

    @if ($errors->any())
        <div class="dash-alert dash-alert--error">{{ $errors->first() }}</div>
    @endif

    <section class="dash-panel">
        <form method="POST" action="{{ route('admin.addons.store') }}" class="settings-form">
            @csrf

            <label>
                اسم الخدمة
                <input type="text" name="title" value="{{ old('title') }}" required maxlength="120">
            </label>

            <label>
                الوصف
                <textarea name="description" rows="4" required maxlength="1000">{{ old('description') }}</textarea>
            </label>

            <label>
                ترتيب الظهور
                <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" min="0" max="9999">
            </label>

            <label class="settings-check">
                <input type="checkbox" name="is_active" value="1" @checked(old('is_active', true))>
                إظهار الخدمة في الموقع
            </label>

            <button type="submit" class="auth-btn settings-submit">حفظ الخدمة</button>
        </form>
    </section>
@endsection
