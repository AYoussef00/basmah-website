<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="شركة تسويق الكتروني في السعودية والخليج | أدسيلا">
    <title>شركة تسويق الكتروني في السعودية والخليج | أدسيلا</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/adsela.css') }}">
</head>
<body>
    <header class="site-header">
        <div class="header-inner">
            <a class="logo" href="{{ url('/') }}" aria-label="أدسيلا">
                <img src="{{ asset('adsela/img/logo.webp') }}" alt="Adsela Marketing Solutions">
            </a>
            <button class="menu-btn" type="button" aria-label="القائمة">
                <img src="{{ asset('adsela/img/menu.svg') }}" alt="">
            </button>
        </div>
    </header>

    <div class="side-menu" aria-hidden="true">
        <div class="side-menu-backdrop"></div>
        <div class="side-menu-panel">
            <button class="close" type="button" aria-label="إغلاق">×</button>
            <nav>
                <a href="#top">الرئيسية</a>
                <a href="#about">من نحن</a>
                <a href="#services">خدماتنا</a>
                <a class="sub" href="#services">حلول التجارة الإلكترونية</a>
                <a class="sub" href="#services">تصميم مواقع الكترونية</a>
                <a class="sub" href="#services">إعلانات مدفوعة</a>
                <a class="sub" href="#services">تحسين محركات البحث SEO</a>
                <a class="sub" href="#services">إدارة حسابات التواصل الاجتماعي</a>
                <a href="#work">أعمالنا</a>
                <a href="#blog">المدونة</a>
                <a href="#contact">تواصل معنا</a>
                <a href="#">English</a>
            </nav>
            <div style="margin-top:1.5rem;color:rgba(255,255,255,.7);font-size:.92rem;display:grid;gap:.4rem;">
                <a href="tel:+966581471796">00966581471796</a>
                <a href="mailto:info@adselams.com">info@adselams.com</a>
                <span>الرياض - المملكة العربية السعودية</span>
            </div>
        </div>
    </div>

    <main>
        {{-- Hero with same video --}}
        <section class="hero" id="top">
            <div class="hero-video" aria-hidden="true">
                <video autoplay muted loop playsinline preload="auto">
                    <source src="{{ asset('adsela/video/hero.mp4') }}#t=1" type="video/mp4">
                </video>
            </div>
            <div class="hero-overlay"></div>

            <div class="hero-content">
                <div class="hero-copy">
                    <h1>أدسيلا</h1>
                    <h2>من التواجد إلى السيادة.. شريكك الاستراتيجي لريادة المستقبل الرقمي للمملكة</h2>
                    <p>
                        في بيئة أعمال تتجه بخطى متسارعة نحو تحقيق رؤية السعودية 2030، تُدرك المؤسسات الطموحة أن التسويق يتجاوز مجرد الإعلان، فهو المحرك الأساسي للنمو. نحن لسنا مجرد شركة تسويق، بل نحن مركز عملياتك الرقمية، نُحوّل علامتك التجارية إلى رائدة في قطاعها.
                    </p>
                </div>

                <form class="lead-form" data-demo>
                    <label>انا مهتم بـ</label>
                    <div class="row">
                        <select name="interest" required>
                            <option>حلول التجارة الإلكترونية</option>
                            <option>تصميم موقع إلكتروني</option>
                            <option>الإعلانات المدفوعة</option>
                            <option>تحسين محركات البحث</option>
                            <option>إدارة حسابات التواصل الإجتماعي</option>
                            <option>التسويق عبر المؤثرين</option>
                            <option>تصميم الجرافيك</option>
                            <option>تصميم فيديو موشن جرافيك</option>
                            <option>تصميم تطبيقات الجوال</option>
                        </select>
                        <input type="text" name="name" placeholder="الاسم" required>
                        <input type="tel" name="phone" placeholder="05XXXXXXXX" required>
                        <button class="btn btn-purple btn-block" type="submit">أحصل على جلسة مجانية</button>
                    </div>
                </form>
            </div>

            <div class="hero-floats">
                <a class="wa-btn" href="https://wa.me/966581471796" target="_blank" rel="noopener" aria-label="Whatsapp">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="#fff"><path d="M20.5 3.5A11 11 0 0 0 3.4 17.7L2 22l4.4-1.4A11 11 0 1 0 20.5 3.5zm-8.5 17a9 9 0 0 1-4.6-1.3l-.3-.2-2.7.9.9-2.6-.2-.3A9 9 0 1 1 12 20.5zm5.1-6.7c-.3-.1-1.6-.8-1.9-.9s-.4-.1-.6.2-.7.9-.8 1-.3.2-.6.1a7.4 7.4 0 0 1-2.2-1.4 8.2 8.2 0 0 1-1.5-1.9c-.2-.3 0-.4.1-.6l.4-.5.2-.4c.1-.2 0-.3 0-.5l-.9-2.1c-.2-.6-.5-.5-.6-.5h-.5c-.2 0-.5.1-.7.3s-1 1-1 2.4 1 2.8 1.2 3a10.3 10.3 0 0 0 4 3.1c.6.2 1 .4 1.4.5.6.2 1.1.1 1.5.1.5 0 1.4-.6 1.6-1.1s.2-1 .1-1.1-.3-.2-.6-.3z"/></svg>
                </a>
                <a class="consult-btn" href="#contact">إستشارة مجانية</a>
                <div class="socials">
                    <a href="#" aria-label="Instagram">IG</a>
                    <a href="#" aria-label="Linkedin">in</a>
                    <a href="#" aria-label="Youtube">YT</a>
                    <a href="#" aria-label="X">X</a>
                    <a href="#" aria-label="Facebook">f</a>
                </div>
            </div>
        </section>

        {{-- Google Partner --}}
        <section class="section" id="partners">
            <div class="container grid-2">
                <div>
                    <h2 class="section-title">شراكة مميزة مع جوجل</h2>
                    <p class="section-lead">
                        في عام 2022 حصلت <strong>أفضل شركة تسويق إلكتروني</strong> ادسيلا بالمملكة العربية السعودية على جائزة الشريك المميز لجوجل، وذلك في ظل عدد قليل جدا من شركات التسويق الإلكتروني التى حصلت على الشراكة المميزة من جوجل في السعودية وكافة انحاء العالم.
                    </p>
                    <p class="section-lead" style="margin-top:1rem;">
                        <strong>نحن في أدسيلا نتشرف بهذه الشراكة المميزة ونسعد بتقديم مزايا حصرية لعملائنا.</strong>
                    </p>
                    <h3 style="margin:2rem 0 1rem;font-weight:500;">نفتخر أيضا بشراكاتنا مع</h3>
                    <div class="partner-logos">
                        <img src="{{ asset('adsela/img/tiktok-logo.webp') }}" alt="tiktok">
                        <img src="{{ asset('adsela/img/snapchat-logo.webp') }}" alt="snapchat">
                        <img src="{{ asset('adsela/img/zid-logo.webp') }}" alt="zid">
                        <img src="{{ asset('adsela/img/salla-logo.webp') }}" alt="salla">
                        <img src="{{ asset('adsela/img/partner-111.webp') }}" alt="partner">
                        <img src="{{ asset('adsela/img/partner-112.webp') }}" alt="partner">
                        <img src="{{ asset('adsela/img/partner-113.webp') }}" alt="partner">
                    </div>
                </div>
                <div class="partner-box">
                    <div class="partner-card">
                        <img src="{{ asset('adsela/img/google-partner.webp') }}" alt="google partner">
                        <img src="{{ asset('adsela/img/resha.webp') }}" alt="Adsela" style="max-height:180px;">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="cta-strip">
                    <h2>احصل على جلسة مجانية خاصة بالاستراتيجية لمدة 30 دقيقة مع مسوق رقمي خبير.</h2>
                    <a class="btn btn-purple" href="#contact">أحصل على 30 دقيقة مجانية</a>
                </div>
            </div>
        </section>

        {{-- About --}}
        <section class="section dark" id="about">
            <div class="container grid-2">
                <div>
                    <h3 class="section-title">عن شركة تسويق إلكتروني أدسيلا</h3>
                    <p class="section-lead">
                        حيث ينبض العالم!، اتجه بنشاطك الرقمي نحو القمة مع أفضل شركة تسويق الكتروني في السعودية، “أدسيلا” الشركة الرائدة التي تجاوزت التوقعات ككونها مجرد وكالة دعاية تقليدية إلى مصدرًا للتقدم والتطور في كافة المجالات الرقمية.
                    </p>
                    <p style="margin-top:1.25rem;"><strong>معًا نحلم، نبني، نقود، نحقق</strong></p>
                    <p><strong>معًا نصل للنجاح الذي تستحقه</strong></p>
                    <div class="about-stats">
                        <div class="stat"><strong data-count="500" data-suffix=" +">0 +</strong><span>الحملات المدفوعة</span></div>
                        <div class="stat"><strong data-count="300" data-suffix=" +">0 +</strong><span>المواقع الإلكترونية</span></div>
                        <div class="stat"><strong data-count="10" data-prefix="K " data-suffix=" +">K 0 +</strong><span>تصاميم وفيديوهات</span></div>
                        <div class="stat"><strong data-count="200" data-suffix=" +">0 +</strong><span>شركاء النجاح</span></div>
                    </div>
                </div>
                <div>
                    <img src="{{ asset('adsela/img/about.webp') }}" alt="أدسيلا" style="border-radius:18px;margin-inline:auto;">
                </div>
            </div>
        </section>

        {{-- Services --}}
        <section class="section" id="services">
            <div class="container">
                <h3 class="section-title">الحلول التي نقدمها</h3>
                <p class="section-lead">مع كل عميل لدينا، نُظهر شغفًا عميقًا بالابتكارات الإبداعية في حل مشكلاته والتفكير في تطوير علامته التجارية.</p>
                <div class="services-grid">
                    @php
                        $services = [
                            ['01', 'حلول التجارة الإلكترونية', 'نوفر لك أفضل استراتيجيات وحلول التجارة الإلكترونية مع أفضل شركة تسويق الكتروني في السعودية، حيث نساعدك في "أدسيلا" على إدارة نشاطك التجاري بدقة وتحقيق الأهداف والخطط الموضوعة لضمان زيادة المبيعات واكتساب عملاء جدد لنمو تجارتك.', 'svc1.webp'],
                            ['02', 'تصميم المواقع الإلكترونية', 'نُساعدك عبر خدمة تصميم المواقع الإلكترونية على التوسع في نشاط عملك والعمل على عرض وتوصيل منتجاتك وخدماتك بشكل فريد يعكس هويتك ويساعد العملاء على اكتشاف منتجاتك بالشكل الأمثل.', 'svc2.webp'],
                            ['03', 'إدارة الحملات المدفوعة', 'نُقدم لك في "أدسيلا" أفضل شركة إعلانات في السعودية خطط مدروسة تساعد نشاطك في التوسع والظهور لأكبر عدد ممكن من العملاء المحتملين، تشمل الخدمة إعلانات السوشيال ميديا على كافة المنصات، إعلانات جوجل.', 'svc3.webp'],
                            ['04', 'إدارة السوشيال ميديا', 'نُدير جميع مواقعك من خلال خدمة إدارة مواقع التواصل الاجتماعي وزيادة التفاعل والمتابعين بالشكل الاحترافي، حيث تعتبر أحد أركان نجاح وانتشار العلامة التجارية.', 'svc4.webp'],
                            ['05', 'تحسين محركات البحث', 'نُعيد ترتيب موقعك الإلكتروني ونضمن ظهوره في الصفحات الأولى بمحركات البحث العالمية من خلال خدمة تحسين محركات البحث SEO.', 'svc5.webp'],
                        ];
                    @endphp
                    @foreach ($services as [$num, $title, $desc, $img])
                        <a class="service-card" href="#contact">
                            <img src="{{ asset('adsela/img/'.$img) }}" alt="{{ $title }}">
                            <div class="body">
                                <div class="num">{{ $num }}</div>
                                <h4>{{ $title }}</h4>
                                <p>{{ $desc }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="center mt-2">
                    <a class="btn btn-purple" href="#services">جميع خدماتنا</a>
                </div>
            </div>
        </section>

        {{-- Work --}}
        <section class="section dark" id="work">
            <div class="container">
                <h2 class="section-title">أعمالنا</h2>
                <div class="work-grid">
                    @php
                        $works = [
                            ['work1.webp', 'دخيل العود'],
                            ['work2.webp', 'التكنولوجيا الذهبية'],
                            ['work3.webp', 'حُلَّت'],
                            ['work4.webp', 'Ost – وعد المصادر'],
                            ['work5.webp', 'ستوزا'],
                        ];
                    @endphp
                    @foreach ($works as [$img, $title])
                        <article class="work-card">
                            <img src="{{ asset('adsela/img/'.$img) }}" alt="{{ $title }}" loading="lazy">
                            <div class="cap"><h3>{{ $title }}</h3></div>
                        </article>
                    @endforeach
                </div>
                <div class="center mt-2">
                    <a class="btn btn-purple" href="#work">المزيد من الأعمال</a>
                </div>
            </div>
        </section>

        {{-- Process --}}
        <section class="section" id="process">
            <div class="container">
                <h3 class="section-title">كيف ننجح؟</h3>
                <div class="process-grid">
                    <article class="process-card">
                        <h4>دراسة وتحليل الأعمال</h4>
                        <ul>
                            <li>دراسة الوضع الحالي للعلامة التجارية.</li>
                            <li>دراسة وضع المحتوى والسوشيال ميديا.</li>
                            <li>تحليل الموقع الإلكتروني والربط.</li>
                            <li>تحليل SWOT للوضع الحالي.</li>
                            <li>تحليل المنافسين بالسوق.</li>
                        </ul>
                    </article>
                    <article class="process-card">
                        <h4>بناء استراتيجية تسويقية</h4>
                        <ul>
                            <li>أهدافك محددة قابلة للتحقيق والقياس.</li>
                            <li>استراتيجية عمل بتوقيتات محددة.</li>
                            <li>خطة تسويقية دقيقة واضحة.</li>
                            <li>الحلول للوصول والتفوق على المنافسين.</li>
                            <li>توزيع مناسب للتكلفة على المنصات.</li>
                        </ul>
                    </article>
                    <article class="process-card">
                        <h4>التنفيذ والمراقبة</h4>
                        <ul>
                            <li>توزيع المهام للفرق المختصة.</li>
                            <li>تنفيذ خطة التسويق والإعلانات.</li>
                            <li>مراقبة الحملات المدفوعة ونتائجها.</li>
                            <li>مراقبة وسائل التواصل الإجتماعي.</li>
                            <li>تحسين الحملات الإعلانية.</li>
                        </ul>
                    </article>
                    <article class="process-card">
                        <h4>قياس النتائج</h4>
                        <ul>
                            <li>قياس نتائج الحملات الإعلانية.</li>
                            <li>تقرير مواقع التواصل الإجتماعي.</li>
                            <li>نتائج زيارات الموقع الإلكتروني.</li>
                            <li>قياس النتائج بالخطة التسويقية.</li>
                            <li>الاستفادة من النتائج للحملات المستقبلية.</li>
                        </ul>
                    </article>
                </div>
            </div>
        </section>

        {{-- Ebook / Lead magnet --}}
        <section class="section dark">
            <div class="container">
                <div class="ebook">
                    <div>
                        <h2 class="section-title">ميزانية المليون ريال: دليل "أدسيلا" لفك شفرة العائد العشرة أضعاف (10X ROAS) في السوق السعودي</h2>
                        <p class="section-lead"><strong>السر الذي لا تريدك المنافسة أن تعرفه:</strong></p>
                        <p class="section-lead" style="margin-top:.75rem;">كيف يستخدم قادة السوق السعودي ‘الرادار الذكي’ لصيد العملاء قبل أن يبحثوا عنهم؟ قم بالتحميل وابدأ في توفير الأموال الآن!</p>
                        <p class="section-lead" style="margin-top:.75rem;">انضم إلى نخبة المديرين التنفيذيين الذين توقفوا عن ‘التخمين’ وبدأوا ‘الاستهداف التنبئي’. حمل نسختك الحصرية الآن.</p>
                    </div>
                    <form data-demo>
                        <input type="text" name="name" placeholder="الاسم">
                        <input type="tel" name="phone" placeholder="رقم الجوال">
                        <input type="email" name="email" placeholder="البريد الإلكتروني" required>
                        <button class="btn btn-purple btn-block" type="submit">أحصل علي الكتاب الألكتروني مجانا</button>
                        <p style="margin:0;color:rgba(255,255,255,.55);font-size:.85rem;">انضم إلى أكثر من 500 مدير تسويق وصاحب شركة في السعودية قاموا بتحميل الدليل هذا الشهر</p>
                    </form>
                </div>
            </div>
        </section>

        {{-- Contact CTA --}}
        <section class="section" id="contact">
            <div class="container center">
                <h3 class="section-title">من التواجد إلى السيادة.. شريكك الاستراتيجي لريادة المستقبل الرقمي للمملكة</h3>
                <p class="section-lead" style="margin-inline:auto;">مع أدسيلا، نرسم لك طريق النجاح بخطط مدروسة واستراتيجيات مبتكرة</p>
                <h3 style="margin:2rem 0 1rem;font-weight:500;">تواصل معنا الآن واحصل على استشارة مجانية</h3>
                <a class="btn btn-purple" href="https://wa.me/966581471796" target="_blank" rel="noopener">تواصل معنا</a>
            </div>
        </section>

        {{-- Reviews --}}
        <section class="section dark" id="reviews">
            <div class="container">
                <h2 class="section-title center">أراء العملاء</h2>
                <p class="section-lead center" style="margin-inline:auto;">تعرف على بعض من أراء عملائنا المميزين</p>
                <div class="blog-grid">
                    <article class="blog-card">
                        <div class="meta">Google ★★★★★</div>
                        <h4>Adsela is one of the excellent companies. It is rare to find a company that works with the same professionalism as them.</h4>
                        <p style="color:var(--fg-muted);margin:.75rem 0 0;">Shreen Mohamed</p>
                    </article>
                    <article class="blog-card">
                        <div class="meta">Google ★★★★★</div>
                        <h4>Good work environment 👏🏼</h4>
                        <p style="color:var(--fg-muted);margin:.75rem 0 0;">sara awad</p>
                    </article>
                    <article class="blog-card">
                        <div class="meta">23 Google reviews</div>
                        <h4>Adsela Marketing Solutions</h4>
                        <p style="color:var(--fg-muted);margin:.75rem 0 0;">تقييمات عملاء Google</p>
                    </article>
                </div>
            </div>
        </section>

        {{-- Blog --}}
        <section class="section" id="blog">
            <div class="container">
                <h3 class="section-title">تعلم معنا</h3>
                <div class="blog-grid">
                    <article class="blog-card">
                        <div class="meta">التجارة الالكترونية · 4 أكتوبر، 2026</div>
                        <h4><a href="#">ما مزايا وعيوب التجارة الإلكترونية قبل البدء؟</a></h4>
                    </article>
                    <article class="blog-card">
                        <div class="meta">التسويق الالكتروني · 1 أكتوبر، 2026</div>
                        <h4><a href="#">كيف تبدأ انشاء متجر الكتروني احترافي يحقق المبيعات؟</a></h4>
                    </article>
                    <article class="blog-card">
                        <div class="meta">تصميم تطبيقات · 29 سبتمبر، 2026</div>
                        <h4><a href="#">كيف تختار أفضل شركة برمجة تطبيقات في الرياض؟</a></h4>
                    </article>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container footer-grid">
            <div>
                <img src="{{ asset('adsela/img/logo.webp') }}" alt="Adsela" style="height:48px;width:auto;margin-bottom:1rem;">
                <p style="color:var(--fg-muted);margin:0;max-width:28rem;">
                    عندما يتعلق الأمر بخدمات التسويق الرقمي، بالطبع ستكون “أدسيلا” هي شريكك الأول، حيث نعتبر كل خدمة لدينا هي رحلة تبدأ بفهم احتياجات السوق السعودي وعملائك المستهدفين مرورًا بتطوير علامتك التجارية وصولًا إلى تحقيق أهدافك التسويقية بنجاح.
                </p>
            </div>
            <div>
                <h4>الخدمات</h4>
                <ul>
                    <li><a href="#services">حلول التجارة الإلكترونية</a></li>
                    <li><a href="#services">تصميم المواقع الإلكترونية</a></li>
                    <li><a href="#services">إدارة الحملات المدفوعة</a></li>
                    <li><a href="#services">إدارة السوشيال ميديا</a></li>
                    <li><a href="#services">تحسين محركات البحث</a></li>
                </ul>
            </div>
            <div>
                <h4>روابط تهمك</h4>
                <ul>
                    <li><a href="#about">من نحن</a></li>
                    <li><a href="#blog">المدونة</a></li>
                    <li><a href="#contact">الوظائف</a></li>
                    <li><a href="#contact">الأسئلة الشائعة</a></li>
                    <li><a href="#contact">سياسة الخصوصية</a></li>
                </ul>
            </div>
            <div>
                <h4>تواصل معنا</h4>
                <ul>
                    <li><a href="mailto:info@adsela.com">info@adsela.com</a></li>
                    <li>الرياض - المملكة العربية السعودية</li>
                    <li><a href="tel:+966581471796">966581471796+</a></li>
                </ul>
            </div>
        </div>
        <div class="container footer-copy">
            جميع الحقوق محفوظة © {{ date('Y') }} | Adsela Marketing Solutions
        </div>
    </footer>

    <script src="{{ asset('js/adsela.js') }}" defer></script>
</body>
</html>
