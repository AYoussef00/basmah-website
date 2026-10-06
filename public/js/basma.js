(() => {
  const header = document.querySelector('[data-header]');
  const toggle = document.querySelector('[data-menu-toggle]');
  const mobileNav = document.querySelector('[data-mobile-nav]');
  const closeButtons = document.querySelectorAll('[data-menu-close]');
  const form = document.querySelector('[data-lead-form]');

  const onScroll = () => {
    if (!header) return;
    header.classList.toggle('is-scrolled', window.scrollY > 20);
  };

  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();

  const openMenu = () => {
    if (!mobileNav) return;
    mobileNav.classList.add('is-open');
    mobileNav.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';
  };

  const closeMenu = () => {
    if (!mobileNav) return;
    mobileNav.classList.remove('is-open');
    mobileNav.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
  };

  toggle?.addEventListener('click', openMenu);
  closeButtons.forEach((btn) => btn.addEventListener('click', closeMenu));

  mobileNav?.querySelectorAll('a').forEach((link) => {
    link.addEventListener('click', closeMenu);
  });

  const reveals = document.querySelectorAll('.reveal');
  if ('IntersectionObserver' in window) {
    const io = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add('is-in');
            io.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.16, rootMargin: '0px 0px -40px 0px' }
    );
    reveals.forEach((el) => io.observe(el));
  } else {
    reveals.forEach((el) => el.classList.add('is-in'));
  }

  form?.addEventListener('submit', async (event) => {
    event.preventDefault();
    const data = new FormData(form);
    const name = String(data.get('name') || '').trim();
    const phone = String(data.get('phone') || '').trim();
    const interest = String(data.get('interest') || '').trim();
    if (!name || !phone || !interest) return;

    const submitBtn = form.querySelector('button[type="submit"]');
    if (submitBtn) submitBtn.disabled = true;

    try {
      const token =
        document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') ||
        data.get('_token');
      const response = await fetch(form.action || '/leads', {
        method: 'POST',
        headers: {
          Accept: 'application/json',
          'X-Requested-With': 'XMLHttpRequest',
          'X-CSRF-TOKEN': String(token || ''),
        },
        body: data,
      });

      if (!response.ok) throw new Error('lead-failed');

      form.classList.add('is-sent');
      form.reset();
    } catch (error) {
      alert('تعذر إرسال الطلب الآن. حاول مرة أخرى.');
    } finally {
      if (submitBtn) submitBtn.disabled = false;
    }
  });
})();
