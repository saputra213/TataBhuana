document.addEventListener('DOMContentLoaded', () => {
  const mainBtn = document.getElementById('socialMainButton');
  const menuContainer = document.getElementById('socialMenuContainer');
  const branchesContainer = document.getElementById('waBranchesContainer');
  const waTrigger = document.getElementById('waTriggerButton');
  const closeBtn = document.getElementById('socialCloseButton');
  const backBtn = document.getElementById('waBackButton');
  const backdrop = document.getElementById('socialBackdrop');

  function closeAll() {
    menuContainer.classList.remove('show');
    branchesContainer.classList.remove('show');
    backdrop.classList.remove('show');
    mainBtn.classList.remove('active');
  }

  function addRipple(el) {
    const ripple = document.createElement('span');
    ripple.className = 'ripple';
    ripple.style.left = '50%';
    ripple.style.top = '50%';
    ripple.style.transform = 'translate(-50%, -50%) scale(0)';
    el.appendChild(ripple);
    setTimeout(() => ripple.remove(), 600);
  }

  mainBtn.addEventListener('click', () => {
    if (menuContainer.classList.contains('show') || branchesContainer.classList.contains('show')) {
      closeAll();
    } else {
      menuContainer.classList.add('show');
      backdrop.classList.add('show');
      mainBtn.classList.add('active');
      addRipple(mainBtn);
    }
  });

  if (waTrigger) {
    waTrigger.addEventListener('click', () => {
      menuContainer.classList.remove('show');
      setTimeout(() => {
        branchesContainer.classList.add('show');
      }, 100);
    });
  }

  if (backBtn) {
    backBtn.addEventListener('click', () => {
      branchesContainer.classList.remove('show');
      setTimeout(() => {
        menuContainer.classList.add('show');
      }, 100);
    });
  }

  if (closeBtn) closeBtn.addEventListener('click', closeAll);
  if (backdrop) backdrop.addEventListener('click', closeAll);

  document.querySelectorAll('.wa-branch-item').forEach(item => {
    item.addEventListener('click', function () {
      const url = this.dataset.whatsapp;
      if (url) window.open(url, '_blank');
    });
  });
});
