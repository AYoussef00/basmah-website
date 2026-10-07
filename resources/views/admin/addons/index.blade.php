@extends('layouts.admin')

@section('title', 'الخدمات الإضافية')

@section('content')
    <header class="dash-top">
        <div>
            <h1>الخدمات الإضافية</h1>
            <p>خدمات تُدفع مرة واحدة وتُضاف لأي باقة — تظهر في الصفحة الرئيسية</p>
        </div>
        <div class="dash-top__actions">
            <a class="auth-btn" href="{{ route('admin.addons.create') }}">إضافة خدمة</a>
            <div class="dash-user">{{ '@'.auth()->user()->username }}</div>
        </div>
    </header>

    @if (session('success'))
        <div class="dash-alert dash-alert--success">{{ session('success') }}</div>
    @endif

    <section class="dash-panel">
        @if ($addons->isEmpty())
            <p class="dash-empty">لا توجد خدمات بعد. ابدأ بإضافة أول خدمة.</p>
        @else
            <div class="dash-table-wrap">
                <table class="dash-table">
                    <thead>
                        <tr>
                            <th>الترتيب</th>
                            <th>الخدمة</th>
                            <th>الوصف</th>
                            <th>الحالة</th>
                            <th>إجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($addons as $addon)
                            <tr>
                                <td>{{ $addon->sort_order }}</td>
                                <td>{{ $addon->title }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($addon->description, 70) }}</td>
                                <td>
                                    @if ($addon->is_active)
                                        <span class="dash-status dash-status--on">ظاهرة</span>
                                    @else
                                        <span class="dash-status dash-status--off">مخفية</span>
                                    @endif
                                </td>
                                <td class="dash-actions">
                                    <a href="{{ route('admin.addons.edit', $addon) }}">تعديل</a>
                                    <form method="POST" action="{{ route('admin.addons.destroy', $addon) }}" onsubmit="return confirm('هل تريد حذف هذه الخدمة؟');">
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
