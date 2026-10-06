(() => {
    const header = document.querySelector('.site-header');
    const menuToggle = document.querySelector('.menu-toggle');
    const mobileNav = document.querySelector('.mobile-nav');

    const onScroll = () => {
        if (!header) return;
        header.classList.toggle('is-scrolled', window.scrollY > 12);
    };
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });

    menuToggle?.addEventListener('click', () => {
        const open = mobileNav?.classList.toggle('open');
        menuToggle.setAttribute('aria-expanded', open ? 'true' : 'false');
    });

    document.querySelectorAll('.mobile-nav a').forEach((link) => {
        link.addEventListener('click', () => {
            mobileNav?.classList.remove('open');
            menuToggle?.setAttribute('aria-expanded', 'false');
        });
    });

    // Audience tabs
    const tabBtns = [...document.querySelectorAll('[data-tab]')];
    const panels = [...document.querySelectorAll('[data-panel]')];
    tabBtns.forEach((btn) => {
        btn.addEventListener('click', () => {
            const id = btn.getAttribute('data-tab');
            tabBtns.forEach((b) => b.classList.toggle('active', b === btn));
            panels.forEach((p) => p.classList.toggle('active', p.getAttribute('data-panel') === id));
        });
    });

    // FAQ
    document.querySelectorAll('.faq-item button').forEach((btn) => {
        btn.addEventListener('click', () => {
            const item = btn.closest('.faq-item');
            const open = item.classList.contains('open');
            document.querySelectorAll('.faq-item.open').forEach((el) => el.classList.remove('open'));
            if (!open) item.classList.add('open');
        });
    });

    // Simple calendar (Oct 2026 style matching reference)
    const grid = document.querySelector('[data-calendar-grid]');
    const label = document.querySelector('[data-calendar-label]');
    const prevBtn = document.querySelector('[data-cal-prev]');
    const nextBtn = document.querySelector('[data-cal-next]');

    if (grid && label) {
        let view = new Date(2026, 9, 1); // Oct 2026
        let selected = new Date(2026, 9, 6);

        const weekStartSunday = true; // site shows Sun..Sat in RTL visual order

        const monthName = (d) =>
            d.toLocaleDateString('ar-SA', { month: 'long', year: 'numeric' });

        const render = () => {
            label.textContent = monthName(view);
            grid.innerHTML = '';

            const year = view.getFullYear();
            const month = view.getMonth();
            const firstDay = new Date(year, month, 1);
            const startOffset = weekStartSunday ? firstDay.getDay() : (firstDay.getDay() + 6) % 7;
            const daysInMonth = new Date(year, month + 1, 0).getDate();
            const prevDays = new Date(year, month, 0).getDate();

            for (let i = 0; i < 42; i++) {
                const btn = document.createElement('button');
                btn.type = 'button';
                let dayNum;
                let dateObj;

                if (i < startOffset) {
                    dayNum = prevDays - startOffset + i + 1;
                    dateObj = new Date(year, month - 1, dayNum);
                    btn.classList.add('muted');
                } else if (i >= startOffset + daysInMonth) {
                    dayNum = i - (startOffset + daysInMonth) + 1;
                    dateObj = new Date(year, month + 1, dayNum);
                    btn.classList.add('muted');
                } else {
                    dayNum = i - startOffset + 1;
                    dateObj = new Date(year, month, dayNum);
                }

                btn.textContent = String(dayNum);

                if (
                    dateObj.getFullYear() === selected.getFullYear() &&
                    dateObj.getMonth() === selected.getMonth() &&
                    dateObj.getDate() === selected.getDate()
                ) {
                    btn.classList.add('selected');
                }

                if (!btn.classList.contains('muted')) {
                    btn.addEventListener('click', () => {
                        selected = dateObj;
                        render();
                    });
                }

                grid.appendChild(btn);
            }

            if (prevBtn) prevBtn.disabled = year === 2026 && month <= 9;
        };

        prevBtn?.addEventListener('click', () => {
            view = new Date(view.getFullYear(), view.getMonth() - 1, 1);
            render();
        });
        nextBtn?.addEventListener('click', () => {
            view = new Date(view.getFullYear(), view.getMonth() + 1, 1);
            render();
        });

        render();
    }

    // Contact form demo
    const form = document.querySelector('#contact-form');
    form?.addEventListener('submit', (e) => {
        e.preventDefault();
        const hp = form.querySelector('.hp');
        if (hp && hp.value) return;
        const btn = form.querySelector('button[type="submit"]');
        const original = btn.textContent;
        btn.textContent = 'تم إرسال طلبك ✓';
        btn.disabled = true;
        setTimeout(() => {
            form.reset();
            btn.textContent = original;
            btn.disabled = false;
        }, 2200);
    });
})();
