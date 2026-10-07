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

    @if (session('success'))
        <div class="dash-alert dash-alert--success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="dash-alert dash-alert--error">{{ $errors->first() }}</div>
    @endif

    <section class="dash-stats">
        <article class="stat">
            <span>الإيرادات الشهرية</span>
            <strong>{{ number_format($stats['monthly_revenue']) }} <small>ر.س</small></strong>
        </article>
        <article class="stat">
            <span>العملاء الحاليون</span>
            <strong>{{ number_format($stats['active_clients']) }}</strong>
        </article>
        <article class="stat">
            <span>طلبات اليوم</span>
            <strong>{{ number_format($stats['leads_today']) }}</strong>
        </article>
        <article class="stat">
            <span>زيارات اليوم</span>
            <strong>{{ number_format($stats['visits_today']) }}</strong>
        </article>
    </section>

    <section class="dash-panel">
        <h2>التفاصيل المالية — الاشتراكات المعتمدة</h2>
        @if ($revenueByPackage->isEmpty())
            <p class="dash-empty">ما فيه إيرادات بعد. تظهر هنا بعد اعتماد طلبات الباقات.</p>
        @else
            <div class="finance-grid">
                <article class="finance-card">
                    <span>إجمالي الإيراد الشهري المتوقع</span>
                    <strong>{{ number_format($stats['monthly_revenue']) }} ر.س</strong>
                </article>
                <article class="finance-card">
                    <span>عدد الاشتراكات النشطة</span>
                    <strong>{{ number_format($stats['active_clients']) }}</strong>
                </article>
            </div>
            <div class="dash-table-wrap">
                <table class="dash-table">
                    <thead>
                        <tr>
                            <th>الباقة</th>
                            <th>عدد العملاء</th>
                            <th>الإيراد الشهري</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($revenueByPackage as $row)
                            <tr>
                                <td>{{ $row->package }}</td>
                                <td>{{ number_format($row->clients_count) }}</td>
                                <td>{{ number_format($row->revenue) }} ر.س</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </section>

    <section class="dash-panel">
        <h2>طلبات الباقات</h2>
        @if ($packageLeads->isEmpty())
            <p class="dash-empty">لا توجد طلبات باقات معلّقة أو مرفوضة حاليًا.</p>
        @else
            <div class="dash-table-wrap">
                <table class="dash-table">
                    <thead>
                        <tr>
                            <th>الاسم</th>
                            <th>الجوال</th>
                            <th>الباقة</th>
                            <th>نوع النشاط</th>
                            <th>الحالة</th>
                            <th>التاريخ</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($packageLeads as $lead)
                            <tr>
                                <td>{{ $lead->name }}</td>
                                <td dir="ltr">{{ $lead->phone }}</td>
                                <td>{{ $lead->interest }}</td>
                                <td>{{ $lead->note ?: '—' }}</td>
                                <td>
                                    @if ($lead->status === 'rejected')
                                        <span class="dash-status dash-status--off" title="{{ $lead->rejection_note }}">مرفوض</span>
                                    @else
                                        <span class="dash-status dash-status--pending">بانتظار</span>
                                    @endif
                                </td>
                                <td>{{ $lead->created_at?->timezone(config('app.timezone'))->format('Y-m-d H:i') }}</td>
                                <td class="dash-menu-cell">
                                    @if ($lead->isPending())
                                        <div class="dash-menu" data-menu>
                                            <button type="button" class="dash-menu__toggle" data-menu-toggle aria-label="إجراءات">⋯</button>
                                            <div class="dash-menu__list" data-menu-list hidden>
                                                <form method="POST" action="{{ route('admin.package-leads.approve', $lead) }}">
                                                    @csrf
                                                    <button type="submit" class="dash-menu__item dash-menu__item--ok">اعتماد</button>
                                                </form>
                                                <button type="button" class="dash-menu__item dash-menu__item--danger" data-reject-open data-reject-action="{{ route('admin.package-leads.reject', $lead) }}" data-reject-name="{{ $lead->name }}">
                                                    رفض
                                                </button>
                                            </div>
                                        </div>
                                    @elseif ($lead->rejection_note)
                                        <span class="dash-note-hint" title="{{ $lead->rejection_note }}">ملاحظة</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        <p class="dash-meta">طلبات الباقات هذا الأسبوع: {{ number_format($stats['package_leads_week']) }}</p>
    </section>

    <section class="dash-panel">
        <h2>العملاء الحاليون</h2>
        @if ($clients->isEmpty())
            <p class="dash-empty">ما فيه عملاء معتمدون بعد.</p>
        @else
            <div class="dash-table-wrap">
                <table class="dash-table">
                    <thead>
                        <tr>
                            <th>الاسم</th>
                            <th>الجوال</th>
                            <th>الباقة</th>
                            <th>نوع النشاط</th>
                            <th>الاشتراك الشهري</th>
                            <th>تاريخ الاعتماد</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $client)
                            <tr>
                                <td>{{ $client->name }}</td>
                                <td dir="ltr">{{ $client->phone }}</td>
                                <td>{{ $client->package }}</td>
                                <td>{{ $client->activity_type ?: '—' }}</td>
                                <td>{{ number_format($client->monthly_amount) }} ر.س</td>
                                <td>{{ $client->started_at?->timezone(config('app.timezone'))->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </section>

    <section class="dash-panel">
        <h2>آخر طلبات الاستشارة</h2>
        @if ($recentLeads->isEmpty())
            <p class="dash-empty">لا توجد طلبات استشارة بعد. ستظهر هنا فور إرسال نموذج التواصل من الموقع.</p>
        @else
            <div class="dash-table-wrap">
                <table class="dash-table">
                    <thead>
                        <tr>
                            <th>الاسم</th>
                            <th>الجوال</th>
                            <th>الاهتمام</th>
                            <th>نبذة</th>
                            <th>التاريخ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recentLeads as $lead)
                            <tr>
                                <td>{{ $lead->name }}</td>
                                <td dir="ltr">{{ $lead->phone }}</td>
                                <td>{{ $interestLabels[$lead->interest] ?? $lead->interest }}</td>
                                <td>{{ $lead->note ?: '—' }}</td>
                                <td>{{ $lead->created_at?->timezone(config('app.timezone'))->format('Y-m-d H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        <p class="dash-meta">طلبات هذا الأسبوع: {{ number_format($stats['leads_week']) }}</p>
    </section>

    <div class="dash-modal" id="reject-modal" data-reject-modal hidden>
        <div class="dash-modal__backdrop" data-reject-close></div>
        <div class="dash-modal__dialog" role="dialog" aria-modal="true" aria-labelledby="reject-title">
            <h3 id="reject-title">رفض طلب الباقة</h3>
            <p class="dash-modal__lead">اكتب سبب الرفض لـ <strong data-reject-label></strong></p>
            <form method="POST" data-reject-form>
                @csrf
                <label>
                    ملاحظة الرفض <span>*</span>
                    <textarea name="rejection_note" rows="4" required minlength="3" maxlength="2000" placeholder="سبب الرفض…"></textarea>
                </label>
                <div class="dash-modal__actions">
                    <button type="button" class="dash-btn dash-btn--ghost" data-reject-close>إلغاء</button>
                    <button type="submit" class="dash-btn dash-btn--danger">تأكيد الرفض</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
<script>
(() => {
  document.querySelectorAll('[data-menu]').forEach((menu) => {
    const toggle = menu.querySelector('[data-menu-toggle]');
    const list = menu.querySelector('[data-menu-list]');
    toggle?.addEventListener('click', (event) => {
      event.stopPropagation();
      const open = !list.hidden;
      document.querySelectorAll('[data-menu-list]').forEach((el) => { el.hidden = true; });
      list.hidden = open;
    });
  });

  document.addEventListener('click', () => {
    document.querySelectorAll('[data-menu-list]').forEach((el) => { el.hidden = true; });
  });

  const modal = document.querySelector('[data-reject-modal]');
  const form = document.querySelector('[data-reject-form]');
  const label = document.querySelector('[data-reject-label]');

  const closeReject = () => {
    if (!modal) return;
    modal.hidden = true;
    form?.reset();
  };

  document.querySelectorAll('[data-reject-open]').forEach((btn) => {
    btn.addEventListener('click', () => {
      if (!modal || !form) return;
      form.action = btn.getAttribute('data-reject-action') || '';
      if (label) label.textContent = btn.getAttribute('data-reject-name') || '';
      modal.hidden = false;
    });
  });

  document.querySelectorAll('[data-reject-close]').forEach((btn) => {
    btn.addEventListener('click', closeReject);
  });
})();
</script>
@endpush
