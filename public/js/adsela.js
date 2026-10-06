(() => {
    const menu = document.querySelector('.side-menu');
    const openBtn = document.querySelector('.menu-btn');
    const closeBtn = document.querySelector('.side-menu .close');
    const backdrop = document.querySelector('.side-menu-backdrop');

    const open = () => menu?.classList.add('open');
    const close = () => menu?.classList.remove('open');

    openBtn?.addEventListener('click', open);
    closeBtn?.addEventListener('click', close);
    backdrop?.addEventListener('click', close);

    document.querySelectorAll('.side-menu a').forEach((a) => a.addEventListener('click', close));

    // Ensure hero video plays
    document.querySelectorAll('.hero-video video').forEach((video) => {
        video.muted = true;
        video.playsInline = true;
        const play = () => video.play().catch(() => {});
        play();
        document.addEventListener('click', play, { once: true });
    });

    // Animate counters
    const counters = document.querySelectorAll('[data-count]');
    const animate = (el) => {
        const target = Number(el.getAttribute('data-count') || 0);
        const suffix = el.getAttribute('data-suffix') || '';
        const prefix = el.getAttribute('data-prefix') || '';
        const duration = 1400;
        const start = performance.now();
        const tick = (now) => {
            const p = Math.min(1, (now - start) / duration);
            const val = Math.floor(target * (0.2 + 0.8 * p));
            el.textContent = `${prefix}${val}${suffix}`;
            if (p < 1) requestAnimationFrame(tick);
            else el.textContent = `${prefix}${target}${suffix}`;
        };
        requestAnimationFrame(tick);
    };

    if (counters.length && 'IntersectionObserver' in window) {
        const io = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        animate(entry.target);
                        io.unobserve(entry.target);
                    }
                });
            },
            { threshold: 0.4 }
        );
        counters.forEach((el) => io.observe(el));
    }

    // Lead forms demo submit
    document.querySelectorAll('form[data-demo]').forEach((form) => {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            const btn = form.querySelector('button[type="submit"]');
            const original = btn?.textContent;
            if (btn) {
                btn.textContent = 'تم الإرسال ✓';
                btn.disabled = true;
            }
            setTimeout(() => {
                form.reset();
                if (btn) {
                    btn.textContent = original;
                    btn.disabled = false;
                }
            }, 1800);
        });
    });
})();
