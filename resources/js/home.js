document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.querySelector('#heroTripleCarousel');
    if (!carousel) return;
    
    // Preload semua gambar (panel kiri/kanan dan center) untuk menghindari delay saat slide
    const preloadImages = carousel.querySelectorAll('.panel-image, .center-main-image');
    preloadImages.forEach(img => {
        if (img && img.src) {
            const imageLoader = new Image();
            imageLoader.src = img.src;
        }
    });
    
    // Fungsi untuk reset dan restart animasi teks & foto
    function resetAnimations(activeItem) {
        if (!activeItem) return;
        
        const title = activeItem.querySelector('.hero-main-title');
        const subtitle = activeItem.querySelector('.hero-subtitle-text');
        const button = activeItem.querySelector('.hero-contact-btn');
        
        // Reset animasi teks
        [title, subtitle, button].forEach(el => {
            if (el) {
                el.style.animation = 'none';
                el.style.opacity = '0';
                void el.offsetWidth; // Trigger reflow
            }
        });
        
        // Restart animasi teks dengan delay bertahap (Staggered Ripple Effect)
        setTimeout(() => {
            if (title) title.style.animation = 'slideInDownFade 0.8s ease-out 0.2s forwards';
            if (subtitle) subtitle.style.animation = 'slideInUpFade 0.8s ease-out 0.4s forwards';
            if (button) button.style.animation = 'scaleInFade 0.6s ease-out 0.6s forwards';
        }, 50);
    }
    
    // Event listener untuk slide mulai bergerak - reset animasi teks
    carousel.addEventListener('slide.bs.carousel', function(event) {
        // Tidak perlu manipulasi transform manual, biarkan CSS handle
    });
    
    // Fungsi untuk update left/right panel images secara dinamis dengan perbaikan
    function updateSidePanels() {
        // Jika tidak ada panel kiri/kanan, tidak perlu melakukan apa-apa
        const hasSidePanels = carousel.querySelector('.slide-panel-left') || carousel.querySelector('.slide-panel-right');
        if (!hasSidePanels) {
            return;
        }

        const allItems = Array.from(carousel.querySelectorAll('.carousel-item'));
        const totalItems = allItems.length;
        
        if (totalItems === 0) return;
        
        allItems.forEach((item, index) => {
            const leftImage = item.querySelector('.slide-panel-left .panel-image');
            const rightImage = item.querySelector('.slide-panel-right .panel-image');
            
            if (!leftImage || !rightImage) {
                console.warn('Left or right image not found for slide', index);
                return;
            }
            
            // Calculate indices dengan circular logic yang lebih robust
            const leftIndex = ((index - 1) + totalItems) % totalItems;
            const rightIndex = (index + 1) % totalItems;
            
            // Get images from corresponding carousel items
            const leftItem = allItems[leftIndex];
            const rightItem = allItems[rightIndex];
            
            // Update left panel image
            if (leftItem) {
                const leftSource = leftItem.querySelector('.center-main-image');
                if (leftSource && leftSource.src) {
                    // Gunakan data attribute sebagai fallback
                    const dataSrc = leftSource.getAttribute('data-src') || leftSource.src;
                    if (leftImage.src !== dataSrc) {
                        leftImage.src = dataSrc;
                        // Force reload jika gambar tidak muncul
                        leftImage.style.opacity = '1';
                        leftImage.style.display = 'block';
                    }
                } else {
                    // Fallback: coba ambil dari img tag langsung di leftItem
                    const fallbackImg = leftItem.querySelector('.center-image-container img');
                    if (fallbackImg && fallbackImg.src) {
                        leftImage.src = fallbackImg.src;
                        leftImage.style.opacity = '1';
                        leftImage.style.display = 'block';
                    }
                }
            }
            
            // Update right panel image
            if (rightItem) {
                const rightSource = rightItem.querySelector('.center-main-image');
                if (rightSource && rightSource.src) {
                    // Gunakan data attribute sebagai fallback
                    const dataSrc = rightSource.getAttribute('data-src') || rightSource.src;
                    if (rightImage.src !== dataSrc) {
                        rightImage.src = dataSrc;
                        // Force reload jika gambar tidak muncul
                        rightImage.style.opacity = '1';
                        rightImage.style.display = 'block';
                    }
                } else {
                    // Fallback: coba ambil dari img tag langsung di rightItem
                    const fallbackImg = rightItem.querySelector('.center-image-container img');
                    if (fallbackImg && fallbackImg.src) {
                        rightImage.src = fallbackImg.src;
                        rightImage.style.opacity = '1';
                        rightImage.style.display = 'block';
                    }
                }
            }
        });
    }
    
    // Event listener untuk slide selesai berganti
    carousel.addEventListener('slid.bs.carousel', function(event) {
        const activeItem = event.relatedTarget || carousel.querySelector('.carousel-item.active');
        
        if (activeItem) {
            const centerImage = activeItem.querySelector('.center-main-image');
            if (centerImage) {
                centerImage.style.animationPlayState = 'running';
            }
        }
        
        resetAnimations(activeItem);
        
        // Update side panels langsung tanpa delay besar
        updateSidePanels();
        
        // Tidak ada manipulasi tambahan untuk menghindari flicker
        
        // Hanya foto yang fade, background tetap visible - jangan set opacity pada carousel-item
        // Background scaffolding pattern harus tetap terlihat
    });
    
    // Update side panels juga saat slide mulai (sebelum transisi selesai) untuk responsif
    carousel.addEventListener('slide.bs.carousel', function(event) {
        // Pre-update langsung tanpa delay untuk immediate feedback
        updateSidePanels();
    });
    
    // Inisialisasi animasi untuk slide pertama dan update side panels
    setTimeout(() => {
        const firstActive = carousel.querySelector('.carousel-item.active');
        if (firstActive) {
            resetAnimations(firstActive);
        }
        // Update side panels setelah semua elemen dimuat
        updateSidePanels();
    }, 100);
    
    // Pause animasi Ken Burns saat hover (optional enhancement)
    carousel.addEventListener('mouseenter', function() {
        const activeImage = carousel.querySelector('.carousel-item.active .center-main-image');
        if (activeImage) {
            activeImage.style.animationPlayState = 'paused';
        }
    });
    
    carousel.addEventListener('mouseleave', function() {
        const activeImage = carousel.querySelector('.carousel-item.active .center-main-image');
        if (activeImage) {
            activeImage.style.animationPlayState = 'running';
        }
    });

    // === SWIPE & DRAG SUPPORT ===
    let touchStartX = 0;
    let touchEndX = 0;
    let isDragging = false;
    let startX = 0;
    let currentX = 0;
    
    // Mouse events for desktop dragging
    carousel.addEventListener('mousedown', e => {
        // Ignore if clicking on buttons or links
        if (e.target.closest('button') || e.target.closest('a')) return;
        
        isDragging = true;
        startX = e.clientX;
        currentX = startX; // Initialize currentX
        carousel.style.cursor = 'grabbing';
        carousel.style.userSelect = 'none';
    });

    carousel.addEventListener('mousemove', e => {
        if (!isDragging) return;
        e.preventDefault();
        currentX = e.clientX;
    });

    carousel.addEventListener('mouseup', e => {
        if (!isDragging) return;
        finishDrag(e.clientX);
    });

    carousel.addEventListener('mouseleave', () => {
        // Only finish drag if we were actually dragging
        if (isDragging) {
            finishDrag(currentX);
        }
    });

    function finishDrag(endX) {
        isDragging = false;
        carousel.style.cursor = 'default';
        carousel.style.userSelect = 'auto';
        
        const diffX = endX - startX;
        handleGesture(diffX);
    }

    // Touch events for mobile (Enhancement to default Bootstrap behavior)
    carousel.addEventListener('touchstart', e => {
        touchStartX = e.changedTouches[0].screenX;
    }, {passive: true});

    carousel.addEventListener('touchend', e => {
        touchEndX = e.changedTouches[0].screenX;
        handleGesture(touchEndX - touchStartX);
    }, {passive: true});

    // Manual Nav Button Handler (Fix for non-responsive buttons)
    const prevBtn = carousel.querySelector('.carousel-control-prev');
    const nextBtn = carousel.querySelector('.carousel-control-next');
    
    if (prevBtn) {
        prevBtn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation(); // Prevent propagation issues
            try {
                const bsCarousel = bootstrap.Carousel.getInstance(carousel) || new bootstrap.Carousel(carousel);
                bsCarousel.prev();
            } catch (err) { console.error('Carousel prev error:', err); }
        });
    }
    
    if (nextBtn) {
        nextBtn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation(); // Prevent propagation issues
            try {
                const bsCarousel = bootstrap.Carousel.getInstance(carousel) || new bootstrap.Carousel(carousel);
                bsCarousel.next();
            } catch (err) { console.error('Carousel next error:', err); }
        });
    }

    function handleGesture(diffX) {
        const threshold = 50; // Minimum distance to trigger slide
        
        if (Math.abs(diffX) > threshold) {
            if (diffX > 0) {
                // Dragged Right -> Prev Slide
                const prevBtn = carousel.querySelector('.carousel-control-prev');
                if (prevBtn) prevBtn.click();
                else {
                    try {
                        const bsCarousel = bootstrap.Carousel.getInstance(carousel);
                        if (bsCarousel) bsCarousel.prev();
                    } catch (e) { console.log('Bootstrap instance not found'); }
                }
            } else {
                // Dragged Left -> Next Slide
                const nextBtn = carousel.querySelector('.carousel-control-next');
                if (nextBtn) nextBtn.click();
                else {
                    try {
                        const bsCarousel = bootstrap.Carousel.getInstance(carousel);
                        if (bsCarousel) bsCarousel.next();
                    } catch (e) { console.log('Bootstrap instance not found'); }
                }
            }
        }
    }
});

document.addEventListener('DOMContentLoaded', function() {
    const scrollToTopBtn = document.getElementById('scrollToTopBtn');
    
    if (!scrollToTopBtn) {
        console.warn('Scroll to Top button not found');
        return;
    }
    
    function toggleScrollButton() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0;
        
        if (scrollTop > 100) {
            scrollToTopBtn.classList.add('show');
        } else {
            scrollToTopBtn.classList.remove('show');
        }
    }
    
    window.addEventListener('scroll', toggleScrollButton, { passive: true });
    
    scrollToTopBtn.addEventListener('click', function(e) {
        e.preventDefault();
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
    
    scrollToTopBtn.addEventListener('touchstart', function(e) {
        e.stopPropagation();
    }, { passive: true });
    
    scrollToTopBtn.addEventListener('touchend', function(e) {
        e.preventDefault();
        e.stopPropagation();
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }, { passive: false });
    
    setTimeout(toggleScrollButton, 100);
});

document.addEventListener('DOMContentLoaded', function() {
    const strip = document.querySelector('#featuredProjectsStrip .strip-container');
    const prevBtn = document.getElementById('fpPrev');
    const nextBtn = document.getElementById('fpNext');
    
    if (!strip || !prevBtn || !nextBtn) {
        return;
    }
    
    const items = strip.querySelectorAll('.strip-item');
    if (!items.length) {
        return;
    }
    
    function getStep() {
        const firstItem = items[0];
        const rect = firstItem.getBoundingClientRect();
        const style = window.getComputedStyle(strip);
        const gapValue = style.columnGap || style.gap || '0';
        const gap = parseFloat(gapValue) || 0;
        return rect.width + gap;
    }
    
    function scrollByStep(direction) {
        const step = getStep();
        const offset = direction === 'next' ? step : -step;
        strip.scrollBy({
            left: offset,
            behavior: 'smooth'
        });
    }
    
    prevBtn.addEventListener('click', function(e) {
        e.preventDefault();
        scrollByStep('prev');
    });
    
    nextBtn.addEventListener('click', function(e) {
        e.preventDefault();
        scrollByStep('next');
    });
});
