(function () {
  // habilita transições (remove .no-js do body)
  document.documentElement.classList.remove('no-js');
  document.body.classList.remove('no-js');

  const sidebar = document.getElementById('sidebar');
  const toggleBtn = document.getElementById('sidebarToggle');
  const backdrop = document.getElementById('backdrop');

  function openSidebar() {
    sidebar.classList.add('open');
    backdrop.hidden = false;
    toggleBtn.setAttribute('aria-expanded', 'true');
  }
  function closeSidebar() {
    sidebar.classList.remove('open');
    backdrop.hidden = true;
    toggleBtn.setAttribute('aria-expanded', 'false');
  }
  function toggleSidebar() {
    const isOpen = sidebar.classList.contains('open');
    isOpen ? closeSidebar() : openSidebar();
  }

  if (toggleBtn) toggleBtn.addEventListener('click', toggleSidebar);
  if (backdrop) backdrop.addEventListener('click', closeSidebar);
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') closeSidebar();
  });

  // User dropdown
  const userBtn = document.getElementById('userMenuBtn');
  const userMenu = document.getElementById('userMenu');

  if (userBtn && userMenu) {
    function toggleUserMenu() {
      const expanded = userBtn.getAttribute('aria-expanded') === 'true';
      userBtn.setAttribute('aria-expanded', String(!expanded));
      userMenu.hidden = expanded;
    }
    userBtn.addEventListener('click', toggleUserMenu);
    document.addEventListener('click', (e) => {
      if (!userMenu.hidden && !userMenu.contains(e.target) && !userBtn.contains(e.target)) {
        userBtn.setAttribute('aria-expanded', 'false');
        userMenu.hidden = true;
      }
    });
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && !userMenu.hidden) {
        userBtn.setAttribute('aria-expanded', 'false');
        userMenu.hidden = true;
      }
    });
  }

  // Close alerts
  document.addEventListener('click', (e) => {
    const btn = e.target.closest('[data-close]');
    if (btn) {
      const alert = btn.closest('.alert');
      if (alert) alert.remove();
    }
  });

  // Mantém estado do sidebar (opcional)
  // const SIDEBAR_STATE = 'epi.sidebar.open';
  // if (window.matchMedia('(min-width: 1024px)').matches === false) {
  //   const saved = localStorage.getItem(SIDEBAR_STATE);
  //   if (saved === '1') openSidebar();
  // }
  // new MutationObserver(() => {
  //   const isOpen = sidebar.classList.contains('open');
  //   localStorage.setItem(SIDEBAR_STATE, isOpen ? '1' : '0');
  // }).observe(sidebar, { attributes: true, attributeFilter: ['class'] });
})();
