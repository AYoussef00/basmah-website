@extends('layouts.admin')

@section('title', 'تعديل شهادة')

@section('content')
    <header class="dash-top">
        <div>
            <h1>تعديل الشهادة</h1>
            <p>{{ $certificate->title }}</p>
        </div>
        <a class="dash-link" href="{{ route('admin.certificates.index') }}">رجوع للقائمة</a>
    </header>

    @if ($errors->any())
        <div class="dash-alert dash-alert--error">{{ $errors->first() }}</div>
    @endif

    <section class="dash-panel">
        <form method="POST" action="{{ route('admin.certificates.update', $certificate) }}" class="settings-form" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="dash-preview">
                <img src="{{ $certificate->imageUrl() }}" alt="{{ $certificate->title }}">
            </div>

            <label>
                اسم الشهادة
                <input type="text" name="title" value="{{ old('title', $certificate->title) }}" required maxlength="160">
            </label>

            <label>
                الجهة المانحة
                <input type="text" name="issuer" value="{{ old('issuer', $certificate->issuer) }}" maxlength="120">
            </label>

            <label>
                رابط التحقق (اختياري)
                <input type="url" name="url" value="{{ old('url', $certificate->url) }}" maxlength="500">
            </label>

            <label>
                استبدال الصورة (اختياري)
                <input type="file" name="image" accept="image/*">
            </label>

            <label>
                ترتيب الظهور
                <input type="number" name="sort_order" value="{{ old('sort_order', $certificate->sort_order) }}" min="0" max="9999">
            </label>

            <label class="settings-check">
                <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $certificate->is_active))>
                إظهار الشهادة في الموقع
            </label>

            <button type="submit" class="auth-btn settings-submit">حفظ التعديلات</button>
        </form>
    </section>
@endsection
