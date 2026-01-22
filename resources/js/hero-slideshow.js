document.addEventListener('DOMContentLoaded', function () {
    const slides = document.querySelectorAll('.hero-bg-slide');
    if (!slides || slides.length === 0) return;

    slides.forEach(img => {
        if (img && img.src) {
            const loader = new Image();
            loader.src = img.src;
        }
    });

    let current = 0;
    const intervalMs = 7000;

    function show(index) {
        slides.forEach((img, i) => {
            if (i === index) {
                img.classList.add('active');
            } else {
                img.classList.remove('active');
            }
        });
    }

    show(current);

    if (slides.length > 1) {
        setInterval(() => {
            current = (current + 1) % slides.length;
            show(current);
        }, intervalMs);
    }
});

