@php
    $title = 'تطبيق Odoo في السعودية | أنظمة ERP للشركات | بصمة';
    $description = 'تطبيق وتهيئة نظام Odoo للشركات في السعودية: محاسبة، مبيعات، مخزون، موارد بشرية، تصنيع، نقاط بيع، وتجارة إلكترونية. استشارة وتنفيذ احترافي من بصمة.';
    $canonical = url('/odoo');
    $ogImage = asset('brand/basma-logo.png');
@endphp
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $description }}">
    <meta name="keywords" content="تطبيق Odoo السعودية, نظام ERP السعودية, Odoo محاسبة, Odoo مخزون, Odoo موارد بشرية, شريك Odoo, بصمة, أودو للشركات, الفوترة الإلكترونية, أنظمة إدارة الأعمال الرياض">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <link rel="canonical" href="{{ $canonical }}">

    <meta property="og:locale" content="ar_SA">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $title }}">
    <meta property="og:description" content="{{ $description }}">
    <meta property="og:url" content="{{ $canonical }}">
    <meta property="og:site_name" content="بصمة">
    <meta property="og:image" content="{{ $ogImage }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $title }}">
    <meta name="twitter:description" content="{{ $description }}">
    <meta name="twitter:image" content="{{ $ogImage }}">

    <link rel="icon" href="{{ asset('brand/basma-logo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/basma.css') }}?v=odoo5">
    <link rel="stylesheet" href="{{ asset('css/odoo.css') }}?v=odoo5">

    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@graph' => [
                [
                    '@type' => 'WebPage',
                    '@id' => $canonical.'#webpage',
                    'url' => $canonical,
                    'name' => $title,
                    'description' => $description,
                    'inLanguage' => 'ar-SA',
                    'isPartOf' => [
                        '@type' => 'WebSite',
                        'name' => 'بصمة',
                        'url' => url('/'),
                    ],
                ],
                [
                    '@type' => 'Service',
                    'name' => 'تطبيق وتهيئة نظام Odoo للشركات',
                    'serviceType' => 'Odoo ERP Implementation',
                    'provider' => [
                        '@type' => 'Organization',
                        'name' => 'بصمة',
                        'url' => url('/'),
                        'areaServed' => [
                            '@type' => 'Country',
                            'name' => 'Saudi Arabia',
                        ],
                    ],
                    'description' => $description,
                    'areaServed' => 'SA',
                ],
                [
                    '@type' => 'FAQPage',
                    'mainEntity' => collect($faqs)->map(fn ($faq) => [
                        '@type' => 'Question',
                        'name' => $faq['q'],
                        'acceptedAnswer' => [
                            '@type' => 'Answer',
                            'text' => $faq['a'],
                        ],
                    ])->values()->all(),
                ],
                [
                    '@type' => 'BreadcrumbList',
                    'itemListElement' => [
                        [
                            '@type' => 'ListItem',
                            'position' => 1,
                            'name' => 'الرئيسية',
                            'item' => url('/'),
                        ],
                        [
                            '@type' => 'ListItem',
                            'position' => 2,
                            'name' => 'Odoo',
                            'item' => $canonical,
                        ],
                    ],
                ],
            ],
        ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG) !!}
    </script>
</head>
<body class="odoo-page">
<div class="bg-glow" aria-hidden="true"></div>
<div class="site">
    <header class="header" data-header>
        <div class="header__inner">
            <div class="odoo-brand-pair">
                <a class="logo" href="{{ route('home') }}" aria-label="بصمة">
                    <img src="{{ asset('brand/basma-logo-white.png') }}" alt="بصمة — تطبيق Odoo في السعودية">
                </a>
                <span class="odoo-header-mark" title="Odoo">
                    <img src="{{ asset('brand/odoo-logo.png') }}" width="88" height="35" alt="Odoo">
                </span>
            </div>

            <nav class="nav" aria-label="التنقل داخل صفحة Odoo">
                <a href="{{ route('home') }}">الرئيسية</a>
                <a class="is-active" href="#top">Odoo</a>
                <a href="#modules">الموديولات</a>
                <a href="#process">منهجية التنفيذ</a>
                <a href="#faq">الأسئلة</a>
            </nav>

            <div class="header__actions">
                <a class="btn btn--teal btn--nav" href="#contact">اطلب استشارة Odoo</a>
            </div>

            <button class="menu-toggle" type="button" data-menu-toggle aria-label="فتح القائمة">
                <span></span><span></span><span></span>
            </button>
        </div>
    </header>

    <div class="mobile-nav" data-mobile-nav aria-hidden="true">
        <div class="mobile-nav__backdrop" data-menu-close></div>
        <div class="mobile-nav__panel">
            <a class="logo" href="{{ route('home') }}"><img src="{{ asset('brand/basma-logo-white.png') }}" alt="بصمة"></a>
            <a href="{{ route('home') }}" data-menu-close>الرئيسية</a>
            <a href="#top" data-menu-close>Odoo</a>
            <a href="#modules" data-menu-close>الموديولات</a>
            <a href="#process" data-menu-close>منهجية التنفيذ</a>
            <a href="#faq" data-menu-close>الأسئلة</a>
            <a class="btn btn--teal" href="#contact" data-menu-close>اطلب استشارة Odoo</a>
        </div>
    </div>

    <main>
        <section class="hero hero--odoo" id="top">
            <div class="hero__media" aria-hidden="true"></div>
            <div class="hero__grid">
                <div class="odoo-hero">
                    <div class="odoo-hero__copy">
                        <div class="eyebrow">حلول Odoo للشركات في السعودية</div>
                        <h1>
                            طبّق <span>Odoo</span> كمنظومة تشغيل موحّدة…
                            من المحاسبة إلى المبيعات والمخزون
                        </h1>
                        <p class="odoo-hero__lead">
                            نساعد الشركات على تطبيق Odoo بطريقة عملية تناسب السوق السعودي: تهيئة الموديولات، أتمتة العمليات، تدريب الفرق، وإطلاق منظم يرفع الكفاءة ويقلل التشتت بين الأنظمة.
                        </p>
                        <div class="odoo-hero__actions">
                            <a class="btn btn--teal" href="#contact">احجز جلسة تشخيص مجانية</a>
                            <a class="btn btn--ghost" href="#modules">استعرض الموديولات <span class="btn__arrow" aria-hidden="true">↓</span></a>
                        </div>
                        <div class="odoo-hero__proof">
                            <span>واجهة عربية وتشغيل محلي</span>
                            <span>تنفيذ مرحلي بدون تعطيل العمل</span>
                            <span>دعم ما بعد الإطلاق</span>
                        </div>
                    </div>

                    <aside class="odoo-hero__visual" aria-label="واجهة Odoo">
                        <div class="odoo-dash" role="img" aria-label="معاينة لوحة تحكم Odoo">
                            <div class="odoo-dash__chrome">
                                <span class="odoo-dash__dot"></span>
                                <span class="odoo-dash__dot"></span>
                                <span class="odoo-dash__dot"></span>
                                <div class="odoo-dash__url">erp.basma.sa / odoo</div>
                            </div>

                            <div class="odoo-dash__body">
                                <div class="odoo-dash__top">
                                    <img class="odoo-dash__logo" src="{{ asset('brand/odoo-logo.png') }}" width="140" height="56" alt="Odoo">
                                    <div class="odoo-dash__badge">لوحة التحكم</div>
                                </div>

                                <div class="odoo-dash__apps">
                                    <div class="odoo-app" data-tone="purple"><span>المحاسبة</span></div>
                                    <div class="odoo-app" data-tone="teal"><span>المبيعات</span></div>
                                    <div class="odoo-app" data-tone="amber"><span>المخزون</span></div>
                                    <div class="odoo-app" data-tone="blue"><span>الموارد</span></div>
                                    <div class="odoo-app" data-tone="rose"><span>نقاط البيع</span></div>
                                    <div class="odoo-app" data-tone="green"><span>التصنيع</span></div>
                                </div>

                                <div class="odoo-dash__kpis">
                                    <div class="odoo-kpi">
                                        <em>المبيعات</em>
                                        <strong>1.2M</strong>
                                        <div class="odoo-kpi__bar"><i style="--w:78%"></i></div>
                                    </div>
                                    <div class="odoo-kpi">
                                        <em>الطلبات</em>
                                        <strong>248</strong>
                                        <div class="odoo-kpi__bar"><i style="--w:64%"></i></div>
                                    </div>
                                    <div class="odoo-kpi">
                                        <em>المخزون</em>
                                        <strong>94%</strong>
                                        <div class="odoo-kpi__bar"><i style="--w:94%"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="odoo-hero__card">
                            <h2>ماذا تبني مع بصمة؟</h2>
                            <ul>
                                <li>نظام ERP واحد بدل أنظمة متعددة ومتضاربة</li>
                                <li>تقارير إدارية لحظية تساعد على اتخاذ القرار</li>
                                <li>أتمتة المبيعات والمخزون والمشتريات والموارد البشرية</li>
                                <li>خطة إطلاق واضحة بمراحل ومسؤوليات محددة</li>
                                <li>تدريب عملي يضمن تبني الفريق للنظام</li>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </section>

        <section class="section" style="padding-top: 0;">
            <div class="container">
                <div class="odoo-stats">
                    <article class="odoo-stat reveal">
                        <strong>+12</strong>
                        <span>موديول أساسي قابل للتفعيل</span>
                    </article>
                    <article class="odoo-stat reveal">
                        <strong>1</strong>
                        <span>منصة موحّدة لكل الإدارات</span>
                    </article>
                    <article class="odoo-stat reveal">
                        <strong>90</strong>
                        <span>يومًا لخطة إطلاق عملية</span>
                    </article>
                    <article class="odoo-stat reveal">
                        <strong>24/7</strong>
                        <span>رؤية أوضح للأرقام والعمليات</span>
                    </article>
                </div>
            </div>
        </section>

        <section class="section" id="why">
            <div class="container">
                <div class="section__head reveal">
                    <div class="eyebrow">لماذا Odoo؟</div>
                    <h2>لأن نمو شركتك يحتاج نظامًا يجمع التشغيل في مكان واحد</h2>
                    <p>كثير من الشركات في السعودية تدفع تكلفة التشتت: جداول منفصلة، تأخير في التقارير، وأخطاء بين المبيعات والمخزون والمحاسبة. Odoo يوحّد هذه الحلقات.</p>
                </div>

                <div class="odoo-split">
                    <article class="odoo-panel reveal">
                        <h3>مناسب للشركات الطموحة محليًا</h3>
                        <ul>
                            <li>يدعم تعدد الفروع والمستودعات وخطوط العمل</li>
                            <li>يساعد الإدارة على قراءة الأداء المالي والتشغيلي بسرعة</li>
                            <li>يمكّنك من التوسع دون إعادة بناء أنظمتك كل سنة</li>
                            <li>قابل للتخصيص وفق طبيعة نشاطك وسير الموافقات لديك</li>
                        </ul>
                    </article>
                    <article class="odoo-panel reveal">
                        <h3>لماذا تنفّذه مع بصمة؟</h3>
                        <ul>
                            <li>نهج تسويقي وتشغيلي معًا: لا نكتفي بالتركيب التقني</li>
                            <li>تحليل احتياجك قبل اختيار الموديولات والتخصيص</li>
                            <li>إطلاق مرحلي يحمي استمرارية العمل اليومي</li>
                            <li>توثيق، تدريب، ومتابعة بعد الإطلاق لضمان النتائج</li>
                        </ul>
                    </article>
                </div>
            </div>
        </section>

        <section class="section" id="modules">
            <div class="container">
                <div class="section__head reveal">
                    <div class="eyebrow">موديولات Odoo</div>
                    <h2>كل ما تحتاجه لإدارة الشركة… تحت سقف نظام واحد</h2>
                    <p>نفعّل الموديولات التي تصنع فرقًا حقيقيًا في عملك، ونربطها ببعضها حتى تتدفق البيانات من البيع والشراء إلى المخزون والمحاسبة دون إدخال مكرر.</p>
                </div>

                <div class="odoo-modules">
                    @foreach ($modules as $index => $module)
                        <article class="odoo-module reveal">
                            <div class="odoo-module__icon" aria-hidden="true">{{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}</div>
                            <h3>{{ $module['title'] }}</h3>
                            <p>{{ $module['summary'] }}</p>
                            <ul>
                                @foreach ($module['points'] as $point)
                                    <li>{{ $point }}</li>
                                @endforeach
                            </ul>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="section" id="saudi">
            <div class="container">
                <div class="section__head reveal">
                    <div class="eyebrow">للسوق السعودي</div>
                    <h2>تهيئة عملية تراعي واقع الشركات في المملكة</h2>
                    <p>لا ننسخ قالبًا عامًا. نضبط النظام على طريقة عملك، وهيكل فريقك، ومتطلبات التقارير والإدارة اليومية.</p>
                </div>
                <div class="odoo-split">
                    <article class="odoo-panel reveal">
                        <h3>جاهزية تشغيلية</h3>
                        <ul>
                            <li>واجهات عربية وتجربة استخدام مناسبة للفرق المحلية</li>
                            <li>هيكل محاسبي وتقارير إدارية قابلة للقراءة واتخاذ القرار</li>
                            <li>مسارات موافقات واضحة للمشتريات والمبيعات والموارد البشرية</li>
                            <li>خطة انتقال بيانات منظمة من أنظمتك الحالية</li>
                        </ul>
                    </article>
                    <article class="odoo-panel reveal">
                        <h3>قطاعات نخدمها</h3>
                        <div class="odoo-industries" style="margin-top: 0.4rem;">
                            <span>التجارة والتوزيع</span>
                            <span>التجزئة والفروع</span>
                            <span>التصنيع</span>
                            <span>الخدمات المهنية</span>
                            <span>التجارة الإلكترونية</span>
                            <span>الشركات متعددة الأنشطة</span>
                        </div>
                        <p style="margin: 1.1rem 0 0; color: var(--mute); line-height: 1.8;">
                            سواء كنت تبني نظامك لأول مرة أو تنتقل من حلول متفرقة، نصمم لك مسار تطبيق يحافظ على التشغيل ويسرّع الوصول لقيمة النظام.
                        </p>
                    </article>
                </div>
            </div>
        </section>

        <section class="section" id="process">
            <div class="container">
                <div class="section__head reveal">
                    <div class="eyebrow">منهجية التنفيذ</div>
                    <h2>أربع مراحل… من التشخيص إلى التشغيل المستقر</h2>
                    <p>عملية واضحة تقلل المفاجآت، وتربط كل مرحلة بمخرجات قابلة للمراجعة قبل الانتقال للتالية.</p>
                </div>
                <div class="odoo-steps">
                    <article class="odoo-step reveal">
                        <div class="odoo-step__n">المرحلة 01</div>
                        <h3>تشخيص العمليات</h3>
                        <p>نفهم نموذج عملك، نقاط الاختناق، والأنظمة الحالية لتحديد أولويات Odoo.</p>
                    </article>
                    <article class="odoo-step reveal">
                        <div class="odoo-step__n">المرحلة 02</div>
                        <h3>تصميم الحل</h3>
                        <p>نختار الموديولات ونعرّف سير العمل والتقارير والصلاحيات وخطة نقل البيانات.</p>
                    </article>
                    <article class="odoo-step reveal">
                        <div class="odoo-step__n">المرحلة 03</div>
                        <h3>تهيئة وإطلاق</h3>
                        <p>نبني النظام، نختبر السيناريوهات الحقيقية، ثم نطلق على مراحل مدروسة.</p>
                    </article>
                    <article class="odoo-step reveal">
                        <div class="odoo-step__n">المرحلة 04</div>
                        <h3>تدريب وتحسين</h3>
                        <p>ندرب الفرق ونتابع الاستخدام خلال الأسابيع الأولى لتحسين الأداء بسرعة.</p>
                    </article>
                </div>
            </div>
        </section>

        <section class="section" id="faq">
            <div class="container">
                <div class="section__head reveal">
                    <div class="eyebrow">أسئلة شائعة</div>
                    <h2>إجابات واضحة قبل ما تبدأ مشروع Odoo</h2>
                    <p>جمعنا أكثر الأسئلة التي تهم أصحاب الشركات ومديري التشغيل في السعودية.</p>
                </div>
                <div class="odoo-faq">
                    @foreach ($faqs as $faq)
                        <details class="reveal">
                            <summary>{{ $faq['q'] }}</summary>
                            <p>{{ $faq['a'] }}</p>
                        </details>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="section cta odoo-cta" id="contact">
            <div class="container">
                <div class="cta__panel reveal">
                    <div>
                        <div class="eyebrow">ابدأ الآن</div>
                        <h2>احجز جلسة تشخيص Odoo مجانية لمدة 30 دقيقة</h2>
                        <p>نراجع وضع أنظمتك الحالي، ونقترح لك خريطة موديولات وخطة إطلاق أولية تناسب حجم شركتك وأهداف الربع القادم.</p>
                        <ul class="cta__list">
                            <li>تحديد الموديولات الأعلى أثرًا على عملياتك</li>
                            <li>تقدير نطاق التنفيذ والمدة بشكل مبدئي</li>
                            <li>توصيات عملية للانتقال من التشتت إلى نظام موحّد</li>
                        </ul>
                    </div>

                    <form class="form" data-lead-form action="{{ route('leads.store') }}" method="POST">
                        @csrf
                        <label>
                            الاهتمام
                            <select name="interest" required>
                                <option value="" selected disabled>اختر احتياجك من Odoo</option>
                                @foreach ($odooInterests as $interest)
                                    <option value="{{ $interest }}">{{ $interest }}</option>
                                @endforeach
                            </select>
                        </label>
                        <label>
                            الاسم
                            <input type="text" name="name" placeholder="اسمك الكريم" required maxlength="120">
                        </label>
                        <label>
                            الجوال
                            <input type="tel" name="phone" placeholder="05XXXXXXXX" required maxlength="30">
                        </label>
                        <label>
                            نبذة عن شركتك (اختياري)
                            <textarea name="note" rows="3" placeholder="طبيعة النشاط، عدد المستخدمين، والأنظمة الحالية"></textarea>
                        </label>
                        <button class="btn btn--teal" type="submit">أرسل طلب استشارة Odoo</button>
                        <p class="form__success">تم استلام طلبك — بنتواصل معك قريب.</p>
                        <p class="form__note">بإرسال النموذج، توافق على تواصل فريق بصمة معك بخصوص مشروع Odoo. بياناتك محفوظة ولن تُشارك مع أي جهة.</p>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container">
            <div class="footer__grid">
                <div class="footer__brand">
                    <img src="{{ asset('brand/basma-logo-white.png') }}" alt="بصمة">
                    <p>بصمة — شريكك في النمو الرقمي وتطبيق أنظمة Odoo للشركات في السعودية.</p>
                </div>
                <div>
                    <h4>روابط مهمة</h4>
                    <ul>
                        <li><a href="{{ route('home') }}">الموقع الرئيسي</a></li>
                        <li><a href="#modules">موديولات Odoo</a></li>
                        <li><a href="#process">منهجية التنفيذ</a></li>
                        <li><a href="#faq">الأسئلة الشائعة</a></li>
                    </ul>
                </div>
                <div>
                    <h4>خدمات مرتبطة</h4>
                    <ul>
                        <li><a href="{{ route('home') }}#services">التسويق الرقمي</a></li>
                        <li><a href="{{ route('home') }}#packages">باقات المحتوى</a></li>
                        <li><a href="{{ route('home') }}#addons">المواقع والمتاجر</a></li>
                        <li><a href="{{ route('home') }}#certs">شهاداتنا</a></li>
                    </ul>
                </div>
                <div>
                    <h4>تواصل مباشر</h4>
                    <ul>
                        <li><a href="mailto:{{ $siteSettings->email }}" dir="ltr">{{ $siteSettings->email }}</a></li>
                        <li><a href="{{ $siteSettings->phoneHref() }}" dir="ltr">{{ $siteSettings->phone }}</a></li>
                        <li>{{ $siteSettings->address }}</li>
                    </ul>
                </div>
            </div>
            <div class="footer__bottom">
                <span>جميع الحقوق محفوظة © {{ date('Y') }} بصمة</span>
                <span>تطبيق Odoo للشركات في السعودية</span>
            </div>
        </div>
    </footer>
</div>

<a
    class="whatsapp-float"
    href="https://wa.me/966535815072?text={{ urlencode('السلام عليكم، أبغى استشارة عن تطبيق Odoo لشركتي') }}"
    target="_blank"
    rel="noopener noreferrer"
    aria-label="تواصل عبر واتساب بخصوص Odoo"
>
    <svg viewBox="0 0 32 32" aria-hidden="true">
        <path fill="currentColor" d="M16.1 3C9.3 3 3.8 8.4 3.8 15.1c0 2.1.6 4.1 1.6 5.9L3.5 29l8.2-2.1c1.7.9 3.6 1.4 5.5 1.4h0c6.8 0 12.3-5.4 12.3-12.1C29.5 8.4 24 3 16.1 3zm0 22.1h0c-1.7 0-3.4-.5-4.9-1.3l-.4-.2-4.9 1.3 1.3-4.7-.2-.4c-1-1.6-1.5-3.4-1.5-5.2 0-5.5 4.5-10 10.1-10s10.1 4.5 10.1 10-4.5 10.1-10.1 10.1zm5.5-7.5c-.3-.2-1.8-.9-2.1-1s-.5-.2-.7.2-.8 1-1 1.2-.4.2-.7.1c-.3-.2-1.2-.4-2.2-1.4-.8-.7-1.4-1.6-1.5-1.9s0-.5.2-.7c.2-.2.3-.4.5-.6.2-.2.2-.3.3-.5.1-.2 0-.4 0-.6s-.7-1.7-1-2.3c-.2-.6-.5-.5-.7-.5h-.6c-.2 0-.5.1-.8.4s-1 1-1 2.4 1.1 2.8 1.2 3 .2.4.1.6c1.5 2.5 3.6 3.5 4.3 3.8.6.3 1.1.2 1.5.2.5-.1 1.8-.7 2-1.4.2-.7.2-1.3.2-1.4 0-.1-.2-.2-.5-.4z"/>
    </svg>
</a>

<script src="{{ asset('js/basma.js') }}?v=odoo1"></script>
</body>
</html>
