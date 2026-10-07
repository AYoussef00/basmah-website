@extends('layouts.admin')

@section('title', 'تعديل خدمة')

@section('content')
    <header class="dash-top">
        <div>
            <h1>تعديل الخدمة</h1>
            <p>{{ $addon->title }}</p>
        </div>
        <a class="dash-link" href="{{ route('admin.addons.index') }}">رجوع للقائمة</a>
    </header>

    @if ($errors->any())
        <div class="dash-alert dash-alert--error">{{ $errors->first() }}</div>
    @endif

    <section class="dash-panel">
        <form method="POST" action="{{ route('admin.addons.update', $addon) }}" class="settings-form">
            @csrf
            @method('PUT')

            <label>
                اسم الخدمة
                <input type="text" name="title" value="{{ old('title', $addon->title) }}" required maxlength="120">
            </label>

            <label>
                الوصف
                <textarea name="description" rows="4" required maxlength="1000">{{ old('description', $addon->description) }}</textarea>
            </label>

            <label>
                ترتيب الظهور
                <input type="number" name="sort_order" value="{{ old('sort_order', $addon->sort_order) }}" min="0" max="9999">
            </label>

            <label class="settings-check">
                <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $addon->is_active))>
                إظهار الخدمة في الموقع
            </label>

            <button type="submit" class="auth-btn settings-submit">حفظ التعديلات</button>
        </form>
    </section>
@endsection
