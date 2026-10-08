@extends('layouts.admin')

@section('title', 'الشهادات')

@section('content')
    <header class="dash-top">
        <div>
            <h1>الشهادات</h1>
            <p>شهادات الاعتماد الظاهرة في قسم الشهادات بالصفحة الرئيسية</p>
        </div>
        <div class="dash-top__actions">
            <a class="auth-btn" href="{{ route('admin.certificates.create') }}">إضافة شهادة</a>
            <div class="dash-user">{{ '@'.auth()->user()->username }}</div>
        </div>
    </header>

    @if (session('success'))
        <div class="dash-alert dash-alert--success">{{ session('success') }}</div>
    @endif

    <section class="dash-panel">
        @if ($certificates->isEmpty())
            <p class="dash-empty">لا توجد شهادات بعد. ابدأ بإضافة أول شهادة.</p>
        @else
            <div class="dash-table-wrap">
                <table class="dash-table">
                    <thead>
                        <tr>
                            <th>الصورة</th>
                            <th>الشهادة</th>
                            <th>الجهة</th>
                            <th>الترتيب</th>
                            <th>الحالة</th>
                            <th>إجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($certificates as $certificate)
                            <tr>
                                <td>
                                    <img class="dash-thumb" src="{{ $certificate->imageUrl() }}" alt="{{ $certificate->title }}">
                                </td>
                                <td>{{ $certificate->title }}</td>
                                <td>{{ $certificate->issuer ?: '—' }}</td>
                                <td>{{ $certificate->sort_order }}</td>
                                <td>
                                    @if ($certificate->is_active)
                                        <span class="dash-status dash-status--on">ظاهرة</span>
                                    @else
                                        <span class="dash-status dash-status--off">مخفية</span>
                                    @endif
                                </td>
                                <td class="dash-actions">
                                    <a href="{{ route('admin.certificates.edit', $certificate) }}">تعديل</a>
                                    <form method="POST" action="{{ route('admin.certificates.destroy', $certificate) }}" onsubmit="return confirm('هل تريد حذف هذه الشهادة؟');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">حذف</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </section>
@endsection
