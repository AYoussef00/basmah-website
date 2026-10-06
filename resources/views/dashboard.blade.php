@extends('layouts.admin')

@section('title', 'لوحة التحكم')

@section('content')
    <header class="dash-top">
        <div>
            <h1>مرحبًا، {{ $user->name }}</h1>
            <p>لوحة تحكم بصمة — أرقام حقيقية من الموقع</p>
        </div>
        <div class="dash-user">{{ '@'.$user->username }}</div>
    </header>

    <section class="dash-stats">
        <article class="stat">
            <span>إجمالي طلبات الاستشارة</span>
            <strong>{{ number_format($stats['leads_total']) }}</strong>
        </article>
        <article class="stat">
            <span>طلبات اليوم</span>
            <strong>{{ number_format($stats['leads_today']) }}</strong>
        </article>
        <article class="stat">
            <span>زيارات اليوم</span>
            <strong>{{ number_format($stats['visits_today']) }}</strong>
        </article>
        <article class="stat">
            <span>نسبة التحويل</span>
            <strong>{{ number_format($stats['conversion_rate'], 1) }}%</strong>
        </article>
    </section>

    <section class="dash-panel">
        <h2>آخر طلبات الاستشارة</h2>
        @if ($recentLeads->isEmpty())
            <p class="dash-empty">لا توجد طلبات بعد. ستظهر هنا فور إرسال نموذج التواصل من الموقع.</p>
        @else
            <div class="dash-table-wrap">
                <table class="dash-table">
                    <thead>
                        <tr>
                            <th>الاسم</th>
                            <th>الجوال</th>
                            <th>الاهتمام</th>
                            <th>التاريخ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recentLeads as $lead)
                            <tr>
                                <td>{{ $lead->name }}</td>
                                <td dir="ltr">{{ $lead->phone }}</td>
                                <td>{{ $interestLabels[$lead->interest] ?? $lead->interest }}</td>
                                <td>{{ $lead->created_at?->timezone(config('app.timezone'))->format('Y-m-d H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        <p class="dash-meta">طلبات هذا الأسبوع: {{ number_format($stats['leads_week']) }}</p>
    </section>
@endsection
