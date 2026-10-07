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

  const submitLeadForm = async (leadForm, { onSuccess } = {}) => {
    const data = new FormData(leadForm);
    const name = String(data.get('name') || '').trim();
    const phone = String(data.get('phone') || '').trim();
    const interest = String(data.get('interest') || '').trim();
    if (!name || !phone || !interest) return false;

    const submitBtn = leadForm.querySelector('button[type="submit"]');
    if (submitBtn) submitBtn.disabled = true;

    try {
      const token =
        document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') ||
        data.get('_token');
      const response = await fetch(leadForm.action || '/leads', {
        method: 'POST',
        headers: {
          Accept: 'application/json',
          'X-Requested-With': 'XMLHttpRequest',
          'X-CSRF-TOKEN': String(token || ''),
        },
        body: data,
      });

      if (!response.ok) throw new Error('lead-failed');

      if (typeof onSuccess === 'function') {
        onSuccess();
      } else {
        leadForm.classList.add('is-sent');
        leadForm.reset();
      }

      return true;
    } catch (error) {
      alert('تعذر إرسال الطلب الآن. حاول مرة أخرى.');
      return false;
    } finally {
      if (submitBtn) submitBtn.disabled = false;
    }
  };

  form?.addEventListener('submit', async (event) => {
    event.preventDefault();
    await submitLeadForm(form);
  });

  const packageModal = document.querySelector('[data-package-modal]');
  const packageForm = document.querySelector('[data-package-form]');
  const packageInput = document.querySelector('[data-package-input]');
  const packageLabel = document.querySelector('[data-package-label]');
  const packageFormView = document.querySelector('[data-package-form-view]');
  const packageSuccess = document.querySelector('[data-package-success]');
  const packageOpeners = document.querySelectorAll('[data-package-open]');
  const packageClosers = document.querySelectorAll('[data-package-close]');

  const resetPackageModal = () => {
    packageForm?.reset();
    if (packageFormView) packageFormView.hidden = false;
    if (packageSuccess) packageSuccess.hidden = true;
  };

  const openPackageModal = (packageName) => {
    if (!packageModal) return;
    if (packageInput) packageInput.value = packageName;
    if (packageLabel) packageLabel.textContent = packageName;
    resetPackageModal();
    packageModal.classList.add('is-open');
    packageModal.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';
    packageForm?.querySelector('input[name="name"]')?.focus();
  };

  const closePackageModal = () => {
    if (!packageModal) return;
    packageModal.classList.remove('is-open');
    packageModal.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
    resetPackageModal();
  };

  packageOpeners.forEach((btn) => {
    btn.addEventListener('click', () => {
      openPackageModal(btn.getAttribute('data-package') || 'باقة');
    });
  });

  packageClosers.forEach((btn) => {
    btn.addEventListener('click', closePackageModal);
  });

  document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape' && packageModal?.classList.contains('is-open')) {
      closePackageModal();
    }
  });

  packageForm?.addEventListener('submit', async (event) => {
    event.preventDefault();
    const activity = String(new FormData(packageForm).get('note') || '').trim();
    if (!activity) return;

    await submitLeadForm(packageForm, {
      onSuccess: () => {
        if (packageFormView) packageFormView.hidden = true;
        if (packageSuccess) packageSuccess.hidden = false;
      },
    });
  });
})();
