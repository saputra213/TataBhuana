document.addEventListener('DOMContentLoaded', () => {
  const mainButton = document.getElementById('fbMainButton');
  const buttonsContainer = document.getElementById('fbButtonsContainer');
  const backdrop = document.getElementById('fbBackdrop');
  const closeButton = document.getElementById('fbCloseButton');
  function toggleButtons() {
    const isOpen = buttonsContainer.classList.contains('show');
    if (isOpen) closeButtons();
    else openButtons();
  }
  function openButtons() {
    buttonsContainer.classList.add('show');
    backdrop.classList.add('show');
    if (navigator.vibrate) navigator.vibrate(50);
    mainButton.style.transform = 'scale(0.95)';
    setTimeout(() => {
      mainButton.style.transform = 'scale(1)';
    }, 150);
  }
  function closeButtons() {
    buttonsContainer.classList.remove('show');
    backdrop.classList.remove('show');
    const items = document.querySelectorAll('.fb-social-item');
    items.forEach((item, index) => {
      item.style.animationDelay = `${index * 0.1}s`;
    });
  }
  mainButton?.addEventListener('click', (e) => {
    e.preventDefault();
    e.stopPropagation();
    toggleButtons();
  });
  closeButton?.addEventListener('click', (e) => {
    e.preventDefault();
    e.stopPropagation();
    closeButtons();
  });
  backdrop?.addEventListener('click', (e) => {
    e.preventDefault();
    e.stopPropagation();
    closeButtons();
  });
  document.querySelectorAll('.fb-social-item').forEach((item) => {
    item.addEventListener('click', function (e) {
      e.preventDefault();
      e.stopPropagation();
      const facebookUrl = this.getAttribute('data-facebook');
      if (facebookUrl) {
        const icon = this.querySelector('.fb-social-icon i');
        const originalClass = icon.className;
        icon.className = 'fas fa-spinner fa-spin';
        window.open(facebookUrl, '_blank');
        setTimeout(() => {
          icon.className = originalClass;
        }, 2000);
        setTimeout(() => closeButtons(), 500);
        if (navigator.vibrate) navigator.vibrate([50, 100, 50]);
      }
    });
  });
  document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape' && buttonsContainer.classList.contains('show')) {
      closeButtons();
    }
  });
  buttonsContainer?.addEventListener('click', (event) => {
    event.stopPropagation();
  });
  console.log('Transparent Facebook buttons initialized successfully');
});
