document.addEventListener('DOMContentLoaded', () => {
  const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
  };
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
        observer.unobserve(entry.target);
      }
    });
  }, observerOptions);
  const elements = document.querySelectorAll(
    '.fade-on-scroll, .fade-on-scroll-2, .fade-on-scroll-3, .fade-on-scroll-4'
  );
  elements.forEach((el) => observer.observe(el));
});
