document.addEventListener('DOMContentLoaded', () => {
  const mainButton = document.getElementById('waMainButton');
  const buttonsContainer = document.getElementById('waButtonsContainer');
  const backdrop = document.getElementById('waBackdrop');
  const closeButton = document.getElementById('waCloseButton');
  function toggleButtons() {
    const isOpen = buttonsContainer.classList.contains('show');
    if (isOpen) {
      closeButtons();
    } else {
      openButtons();
    }
  }
  function openButtons() {
    buttonsContainer.classList.add('show');
    backdrop.classList.add('show');
    if (navigator.vibrate) {
      navigator.vibrate(50);
    }
    mainButton.style.transform = 'scale(0.95)';
    setTimeout(() => {
      mainButton.style.transform = 'scale(1)';
    }, 150);
  }
  function closeButtons() {
    buttonsContainer.classList.remove('show');
    backdrop.classList.remove('show');
    const branchItems = document.querySelectorAll('.wa-branch-item');
    branchItems.forEach((item, index) => {
      item.style.animationDelay = `${index * 0.1}s`;
    });
  }
  if (mainButton) {
    mainButton.addEventListener('click', (e) => {
      e.preventDefault();
      e.stopPropagation();
      toggleButtons();
    });
  }
  if (closeButton) {
    closeButton.addEventListener('click', (e) => {
      e.preventDefault();
      e.stopPropagation();
      closeButtons();
    });
  }
  if (backdrop) {
    backdrop.addEventListener('click', (e) => {
      e.preventDefault();
      e.stopPropagation();
      closeButtons();
    });
  }
  const branchItems = document.querySelectorAll('.wa-branch-item');
  branchItems.forEach((item) => {
    item.addEventListener('click', function (e) {
      e.preventDefault();
      e.stopPropagation();
      const whatsappUrl = this.getAttribute('data-whatsapp');
      if (whatsappUrl) {
        const icon = this.querySelector('.wa-branch-icon i');
        const originalClass = icon.className;
        icon.className = 'fas fa-spinner fa-spin';
        window.open(whatsappUrl, '_blank');
        setTimeout(() => {
          icon.className = originalClass;
        }, 2000);
        setTimeout(() => {
          closeButtons();
        }, 500);
        if (navigator.vibrate) {
          navigator.vibrate([50, 100, 50]);
        }
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
  const style = document.createElement('style');
  style.textContent = `
    .wa-branch-button { transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275); }
    .wa-main-button { transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); }
    .wa-buttons-container { transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); }
  `;
  document.head.appendChild(style);
  let touchStartY = 0;
  let touchEndY = 0;
  mainButton?.addEventListener('touchstart', (e) => {
    touchStartY = e.changedTouches[0].screenY;
  });
  mainButton?.addEventListener('touchend', (e) => {
    touchEndY = e.changedTouches[0].screenY;
    const swipeThreshold = 50;
    const diff = touchStartY - touchEndY;
    if (Math.abs(diff) > swipeThreshold) {
      if (diff > 0) {
        openButtons();
      } else {
        closeButtons();
      }
    }
  });
}); 
