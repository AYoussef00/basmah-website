@extends('layouts.admin')

@section('title', 'إضافة شهادة')

@section('content')
    <header class="dash-top">
        <div>
            <h1>إضافة شهادة</h1>
            <p>ستظهر في قسم الشهادات أسفل نموذج التواصل</p>
        </div>
        <a class="dash-link" href="{{ route('admin.certificates.index') }}">رجوع للقائمة</a>
    </header>

    @if ($errors->any())
        <div class="dash-alert dash-alert--error">{{ $errors->first() }}</div>
    @endif

    <section class="dash-panel">
        <form method="POST" action="{{ route('admin.certificates.store') }}" class="settings-form" enctype="multipart/form-data">
            @csrf

            <label>
                اسم الشهادة
                <input type="text" name="title" value="{{ old('title') }}" required maxlength="160">
            </label>

            <label>
                الجهة المانحة
                <input type="text" name="issuer" value="{{ old('issuer') }}" maxlength="120" placeholder="مثال: Google Skillshop">
            </label>

            <label>
                رابط التحقق (اختياري)
                <input type="url" name="url" value="{{ old('url') }}" maxlength="500" placeholder="https://...">
            </label>

            <label>
                صورة الشارة / الشهادة
                <input type="file" name="image" accept="image/*" required>
            </label>

            <label>
                ترتيب الظهور
                <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" min="0" max="9999">
            </label>

            <label class="settings-check">
                <input type="checkbox" name="is_active" value="1" @checked(old('is_active', true))>
                إظهار الشهادة في الموقع
            </label>

            <button type="submit" class="auth-btn settings-submit">حفظ الشهادة</button>
        </form>
    </section>
@endsection
