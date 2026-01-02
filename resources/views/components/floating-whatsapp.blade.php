<!-- Transparent Floating WhatsApp Button -->
<div class="floating-whatsapp-transparent">
    <!-- Main Transparent Button -->
    <div class="wa-main-button" id="waMainButton">
        <div class="wa-icon-container">
            <i class="fab fa-whatsapp"></i>
        </div>
        <div class="wa-pulse-ring"></div>
        <div class="wa-pulse-ring-2"></div>
    </div>
    
    <!-- Vertical WhatsApp Buttons -->
    <div class="wa-buttons-container" id="waButtonsContainer">
        @foreach($branches as $index => $branch)
        <div class="wa-branch-item" 
             style="--delay: {{ $index * 0.1 }}s;"
             data-branch="{{ $branch->name }}"
             data-whatsapp="{{ $branch->whatsapp_url }}">
            <div class="wa-branch-button">
                <div class="wa-branch-icon">
                    <i class="fab fa-whatsapp"></i>
                </div>
            </div>
            <div class="wa-branch-info">
                <h6>{{ $branch->name }}</h6>
                <p>{{ $branch->code }} - {{ $branch->address }}</p>
            </div>
        </div>
        @endforeach
        
        <!-- Close Button -->
        <div class="wa-close-button" id="waCloseButton">
            <i class="fas fa-times"></i>
        </div>
    </div>
    
    <!-- Backdrop -->
    <div class="wa-backdrop" id="waBackdrop"></div>
</div>

<style>
/* Transparent Floating WhatsApp Styles - Paling bawah di kiri */
.floating-whatsapp-transparent {
    position: fixed;
    bottom: 25px;
    left: 25px;
    z-index: 9999;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    /* Safe area untuk mobile */
    bottom: max(25px, env(safe-area-inset-bottom, 25px));
    left: max(25px, env(safe-area-inset-left, 25px));
}

/* Memastikan konten tidak tertutup button */
body {
    margin-bottom: 0;
    padding-bottom: 0;
}

@media (max-width: 768px) {
    body {
        margin-bottom: 0;
        padding-bottom: 0;
    }
}

@media (max-width: 480px) {
    body {
        margin-bottom: 0;
        padding-bottom: 0;
    }
}

/* Hide scrollbars */
.floating-whatsapp-transparent * {
    scrollbar-width: none; /* Firefox */
    -ms-overflow-style: none; /* IE and Edge */
}

.floating-whatsapp-transparent *::-webkit-scrollbar {
    display: none; /* Chrome, Safari, Opera */
}

/* Main Transparent Button */
.wa-main-button {
    position: relative;
    width: 70px;
    height: 70px;
    background: rgba(37, 211, 102, 0.15);
    backdrop-filter: blur(20px);
    border: 2px solid rgba(37, 211, 102, 0.3);
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    overflow: hidden;
    z-index: 10;
}

.wa-main-button:hover {
    background: rgba(37, 211, 102, 0.25);
    border-color: rgba(37, 211, 102, 0.5);
    transform: scale(1.1);
    box-shadow: 0 8px 32px rgba(37, 211, 102, 0.3);
}

.wa-icon-container {
    position: relative;
    z-index: 3;
}

.wa-icon-container i {
    font-size: 32px;
    color: #25D366;
    transition: all 0.3s ease;
}

.wa-main-button:hover .wa-icon-container i {
    transform: scale(1.1);
    color: #128C7E;
}

/* Pulse Rings */
.wa-pulse-ring {
    position: absolute;
    top: -10px;
    left: -10px;
    right: -10px;
    bottom: -10px;
    border: 2px solid rgba(37, 211, 102, 0.4);
    border-radius: 50%;
    animation: pulse-ring 2s infinite;
}

.wa-pulse-ring-2 {
    position: absolute;
    top: -20px;
    left: -20px;
    right: -20px;
    bottom: -20px;
    border: 1px solid rgba(37, 211, 102, 0.2);
    border-radius: 50%;
    animation: pulse-ring-2 2s infinite;
}

@keyframes pulse-ring {
    0% {
        transform: scale(0.8);
        opacity: 1;
    }
    100% {
        transform: scale(1.4);
        opacity: 0;
    }
}

@keyframes pulse-ring-2 {
    0% {
        transform: scale(0.6);
        opacity: 0.8;
    }
    100% {
        transform: scale(1.6);
        opacity: 0;
    }
}

/* Buttons Container */
.wa-buttons-container {
    position: absolute;
    bottom: 90px;
    left: 85px;
    opacity: 0;
    visibility: hidden;
    transform: translateX(-20px);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    pointer-events: none;
    overflow: visible;
    padding-right: 10px;
    /* Ukuran mengikuti konten */
    width: auto;
    height: auto;
    max-width: none;
    max-height: none;
}

.wa-buttons-container.show {
    opacity: 1;
    visibility: visible;
    transform: translateX(0);
    pointer-events: auto;
}

/* Branch Items */
.wa-branch-item {
    display: flex;
    align-items: center;
    margin-bottom: 15px;
    opacity: 0;
    animation: branch-item-appear 0.5s ease forwards;
    animation-delay: var(--delay);
    cursor: pointer;
    transition: all 0.3s ease;
    padding: 8px;
    border-radius: 15px;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    /* Ukuran mengikuti konten */
    width: auto;
    min-width: 200px;
    max-width: 300px;
}

.wa-branch-item:hover {
    background: rgba(255, 255, 255, 0.2);
    box-shadow: 0 5px 20px rgba(37, 211, 102, 0.2);
}

/* Branch Button */
.wa-branch-button {
    width: 45px;
    height: 45px;
    background: rgba(37, 211, 102, 0.9);
    backdrop-filter: blur(20px);
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    box-shadow: 0 4px 20px rgba(37, 211, 102, 0.3);
    flex-shrink: 0;
    margin-right: 12px;
}

.wa-branch-item:hover .wa-branch-button {
    background: rgba(37, 211, 102, 1);
    transform: scale(1.1);
    box-shadow: 0 6px 25px rgba(37, 211, 102, 0.5);
}

.wa-branch-icon i {
    font-size: 18px;
    color: white;
    transition: transform 0.3s ease;
}

.wa-branch-item:hover .wa-branch-icon i {
    transform: scale(1.1);
}

/* Branch Info */
.wa-branch-info {
    flex: 1;
    min-width: 0;
}

.wa-branch-info h6 {
    margin: 0 0 4px 0;
    font-size: 13px;
    font-weight: 600;
    color: #333;
    line-height: 1.2;
}

.wa-branch-info p {
    margin: 0;
    font-size: 11px;
    color: #666;
    line-height: 1.3;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

@keyframes branch-item-appear {
    0% {
        opacity: 0;
        transform: translateX(-20px);
    }
    100% {
        opacity: 1;
        transform: translateX(0);
    }
}

/* Close Button */
.wa-close-button {
    position: absolute;
    top: -15px;
    right: -15px;
    width: 35px;
    height: 35px;
    background: rgba(220, 53, 69, 0.9);
    backdrop-filter: blur(20px);
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    opacity: 0;
    animation: branch-item-appear 0.5s ease forwards;
    animation-delay: calc(var(--delay) + 0.2s);
    box-shadow: 0 4px 20px rgba(220, 53, 69, 0.3);
}

.wa-close-button:hover {
    background: rgba(220, 53, 69, 1);
    transform: scale(1.1);
    box-shadow: 0 6px 25px rgba(220, 53, 69, 0.5);
}

.wa-close-button i {
    font-size: 14px;
    color: white;
}

/* Backdrop */
.wa-backdrop {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.1);
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
    z-index: -1;
    backdrop-filter: blur(5px);
}

.wa-backdrop.show {
    opacity: 1;
    visibility: visible;
}

/* Responsive Design */
@media (max-width: 768px) {
    /* Pastikan semua floating buttons sejajar vertikal */
    .floating-whatsapp-transparent,
    .floating-facebook-transparent,
    .floating-instagram-transparent {
        left: max(15px, env(safe-area-inset-left, 15px)) !important;
    }
    
    .floating-whatsapp-transparent {
        bottom: max(20px, env(safe-area-inset-bottom, 20px));
    }
    
    .wa-main-button {
        width: 60px;
        height: 60px;
    }
    
    .wa-icon-container i {
        font-size: 28px;
    }
    
    .wa-buttons-container {
        /* Ukuran mengikuti konten */
    }
    
    .wa-branch-item {
        margin-bottom: 12px;
        padding: 6px;
        min-width: 180px;
        max-width: 250px;
    }
    
    .wa-branch-button {
        width: 40px;
        height: 40px;
        margin-right: 10px;
    }
    
    .wa-branch-icon i {
        font-size: 16px;
    }
    
    .wa-branch-info h6 {
        font-size: 12px;
    }
    
    .wa-branch-info p {
        font-size: 10px;
    }
    
    .wa-close-button {
        width: 30px;
        height: 30px;
        top: -12px;
        right: -12px;
    }
    
    .wa-close-button i {
        font-size: 12px;
    }
}

@media (max-width: 480px) {
    .floating-whatsapp-transparent {
        bottom: max(15px, env(safe-area-inset-bottom, 15px));
        left: max(15px, env(safe-area-inset-left, 15px));
    }
    
    /* Pastikan semua button sejajar vertikal */
    .floating-whatsapp-transparent,
    .floating-facebook-transparent,
    .floating-instagram-transparent {
        left: max(15px, env(safe-area-inset-left, 15px)) !important;
    }
    
    .wa-main-button {
        width: 55px;
        height: 55px;
    }
    
    .wa-icon-container i {
        font-size: 24px;
    }
    
    .wa-buttons-container {
        /* Ukuran mengikuti konten */
    }
    
    .wa-branch-item {
        margin-bottom: 10px;
        padding: 5px;
        min-width: 160px;
        max-width: 220px;
    }
    
    .wa-branch-button {
        width: 35px;
        height: 35px;
        margin-right: 8px;
    }
    
    .wa-branch-icon i {
        font-size: 14px;
    }
    
    .wa-branch-info h6 {
        font-size: 11px;
    }
    
    .wa-branch-info p {
        font-size: 9px;
    }
    
    .wa-close-button {
        width: 28px;
        height: 28px;
        top: -10px;
        right: -10px;
    }
    
    .wa-close-button i {
        font-size: 11px;
    }
}

/* Dark mode support */
@media (prefers-color-scheme: dark) {
    .wa-main-button {
        background: rgba(37, 211, 102, 0.2);
        border-color: rgba(37, 211, 102, 0.4);
    }
    
    .wa-main-button:hover {
        background: rgba(37, 211, 102, 0.3);
        border-color: rgba(37, 211, 102, 0.6);
    }
    
    .wa-branch-button {
        background: rgba(37, 211, 102, 0.8);
        border-color: rgba(255, 255, 255, 0.2);
    }
    
    .wa-branch-button:hover {
        background: rgba(37, 211, 102, 0.95);
    }
    
    .wa-branch-tooltip {
        background: rgba(0, 0, 0, 0.9);
    }
    
    .wa-branch-tooltip::after {
        border-left-color: rgba(0, 0, 0, 0.9);
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const mainButton = document.getElementById('waMainButton');
    const buttonsContainer = document.getElementById('waButtonsContainer');
    const backdrop = document.getElementById('waBackdrop');
    const closeButton = document.getElementById('waCloseButton');
    
    // Toggle buttons container
    function toggleButtons() {
        const isOpen = buttonsContainer.classList.contains('show');
        
        if (isOpen) {
            closeButtons();
        } else {
            openButtons();
        }
    }
    
    // Open buttons
    function openButtons() {
        buttonsContainer.classList.add('show');
        backdrop.classList.add('show');
        
        // Add haptic feedback for mobile
        if (navigator.vibrate) {
            navigator.vibrate(50);
        }
        
        // Add click animation to main button
        mainButton.style.transform = 'scale(0.95)';
        setTimeout(() => {
            mainButton.style.transform = 'scale(1)';
        }, 150);
    }
    
    // Close buttons
    function closeButtons() {
        buttonsContainer.classList.remove('show');
        backdrop.classList.remove('show');
        
        // Reset branch items animation
        const branchItems = document.querySelectorAll('.wa-branch-item');
        branchItems.forEach((item, index) => {
            item.style.animationDelay = `${index * 0.1}s`;
        });
    }
    
    // Event listeners
    mainButton.addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        toggleButtons();
    });
    
    closeButton.addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        closeButtons();
    });
    
    backdrop.addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        closeButtons();
    });
    
    // Branch item clicks
    const branchItems = document.querySelectorAll('.wa-branch-item');
    branchItems.forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const whatsappUrl = this.getAttribute('data-whatsapp');
            const branchName = this.getAttribute('data-branch');
            
            if (whatsappUrl) {
                // Add loading animation
                const icon = this.querySelector('.wa-branch-icon i');
                const originalClass = icon.className;
                icon.className = 'fas fa-spinner fa-spin';
                
                // Open WhatsApp
                window.open(whatsappUrl, '_blank');
                
                // Reset icon after delay
                setTimeout(() => {
                    icon.className = originalClass;
                }, 2000);
                
                // Close buttons after opening WhatsApp
                setTimeout(() => {
                    closeButtons();
                }, 500);
                
                // Add success feedback
                if (navigator.vibrate) {
                    navigator.vibrate([50, 100, 50]);
                }
            }
        });
    });
    
    // Keyboard support
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape' && buttonsContainer.classList.contains('show')) {
            closeButtons();
        }
    });
    
    // Prevent buttons container from closing when clicking inside
    buttonsContainer.addEventListener('click', function(event) {
        event.stopPropagation();
    });
    
    // Add intersection observer for performance
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    });
    
    if (mainButton) {
        observer.observe(mainButton);
    }
    
    // Add smooth animations
    const style = document.createElement('style');
    style.textContent = `
        .wa-branch-button {
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        
        .wa-main-button {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        
        .wa-buttons-container {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
    `;
    document.head.appendChild(style);
    
    // Add touch support for mobile
    let touchStartY = 0;
    let touchEndY = 0;
    
    mainButton.addEventListener('touchstart', function(e) {
        touchStartY = e.changedTouches[0].screenY;
    });
    
    mainButton.addEventListener('touchend', function(e) {
        touchEndY = e.changedTouches[0].screenY;
        handleSwipe();
    });
    
    function handleSwipe() {
        const swipeThreshold = 50;
        const diff = touchStartY - touchEndY;
        
        if (Math.abs(diff) > swipeThreshold) {
            if (diff > 0) {
                // Swipe up - open buttons
                openButtons();
            } else {
                // Swipe down - close buttons
                closeButtons();
            }
        }
    }
    
    // Add performance optimization
    let ticking = false;
    
    function updateAnimations() {
        if (!ticking) {
            requestAnimationFrame(() => {
                // Update any dynamic animations here
                ticking = false;
            });
            ticking = true;
        }
    }
    
    // Listen for scroll events for performance
    window.addEventListener('scroll', updateAnimations, { passive: true });
    
    console.log('Transparent WhatsApp buttons initialized successfully');
});
</script>
