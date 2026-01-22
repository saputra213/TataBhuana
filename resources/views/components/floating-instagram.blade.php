<!-- Transparent Floating Instagram Button -->
<div class="floating-instagram-transparent">
    <!-- Main Transparent Button -->
    <div class="ig-main-button" id="igMainButton">
        <div class="ig-icon-container">
            <i class="fab fa-instagram"></i>
        </div>
        <div class="ig-pulse-ring"></div>
        <div class="ig-pulse-ring-2"></div>
    </div>
    
    <!-- Vertical Instagram Buttons -->
    <div class="ig-buttons-container" id="igButtonsContainer">
        @if($profile ?? false && $profile->social_media && $profile->social_media['instagram'])
        <div class="ig-social-item" 
             style="--delay: 0.1s;"
             data-instagram="{{ $profile->social_media['instagram'] }}">
            <div class="ig-social-button">
                <div class="ig-social-icon">
                    <i class="fab fa-instagram"></i>
                </div>
            </div>
            <div class="ig-social-info">
                <h6>Instagram</h6>
                <p>Ikuti kami di Instagram</p>
            </div>
        </div>
        @endif
        
        <!-- Close Button -->
        <div class="ig-close-button" id="igCloseButton">
            <i class="fas fa-times"></i>
        </div>
    </div>
    
    <!-- Backdrop -->
    <div class="ig-backdrop" id="igBackdrop"></div>
</div>

@push('styles')
@vite('resources/css/components/floating-instagram.css')
@endpush
@push('scripts')
@vite('resources/js/components/floating-instagram.js')
@endpush

<style>
/* Transparent Floating Instagram Styles - Di atas FB di kiri */
.floating-instagram-transparent {
    position: fixed;
    bottom: 195px;
    left: 25px;
    z-index: 9998;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    /* Safe area untuk mobile - akan di-override di media query */
    bottom: max(195px, env(safe-area-inset-bottom, 195px));
    left: max(25px, env(safe-area-inset-left, 25px));
}

/* Main Transparent Button */
.ig-main-button {
    position: relative;
    width: 70px;
    height: 70px;
    background: rgba(225, 48, 108, 0.15);
    backdrop-filter: blur(20px);
    border: 2px solid rgba(225, 48, 108, 0.3);
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    overflow: hidden;
    z-index: 10;
}

.ig-main-button:hover {
    background: rgba(225, 48, 108, 0.25);
    border-color: rgba(225, 48, 108, 0.5);
    transform: scale(1.1);
    box-shadow: 0 8px 32px rgba(225, 48, 108, 0.3);
}

.ig-icon-container {
    position: relative;
    z-index: 3;
}

.ig-icon-container i {
    font-size: 32px;
    color: #E1306C;
    transition: all 0.3s ease;
}

.ig-main-button:hover .ig-icon-container i {
    transform: scale(1.1);
    color: #C13584;
}

/* Pulse Rings */
.ig-pulse-ring {
    position: absolute;
    top: -10px;
    left: -10px;
    right: -10px;
    bottom: -10px;
    border: 2px solid rgba(225, 48, 108, 0.4);
    border-radius: 50%;
    animation: ig-pulse-ring 2s infinite;
}

.ig-pulse-ring-2 {
    position: absolute;
    top: -20px;
    left: -20px;
    right: -20px;
    bottom: -20px;
    border: 1px solid rgba(225, 48, 108, 0.2);
    border-radius: 50%;
    animation: ig-pulse-ring-2 2s infinite;
}

@keyframes ig-pulse-ring {
    0% {
        transform: scale(0.8);
        opacity: 1;
    }
    100% {
        transform: scale(1.4);
        opacity: 0;
    }
}

@keyframes ig-pulse-ring-2 {
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
.ig-buttons-container {
    position: absolute;
    bottom: 90px;
    left: 85px;
    opacity: 0;
    visibility: hidden;
    transform: translateX(-20px);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    pointer-events: none;
    overflow: visible;
    padding-left: 10px;
    width: auto;
    height: auto;
    max-width: none;
    max-height: none;
}

.ig-buttons-container.show {
    opacity: 1;
    visibility: visible;
    transform: translateX(0);
    pointer-events: auto;
}

/* Social Items */
.ig-social-item {
    display: flex;
    align-items: center;
    margin-bottom: 15px;
    opacity: 0;
    animation: ig-social-item-appear 0.5s ease forwards;
    animation-delay: var(--delay);
    cursor: pointer;
    transition: all 0.3s ease;
    padding: 8px;
    border-radius: 15px;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    width: auto;
    min-width: 200px;
    max-width: 300px;
}

.ig-social-item:hover {
    background: rgba(255, 255, 255, 0.2);
    box-shadow: 0 5px 20px rgba(225, 48, 108, 0.2);
    transform: none;
}

/* Social Button */
.ig-social-button {
    width: 45px;
    height: 45px;
    background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
    backdrop-filter: blur(20px);
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    box-shadow: 0 4px 20px rgba(225, 48, 108, 0.3);
    flex-shrink: 0;
    margin-right: 12px;
}

.ig-social-item:hover .ig-social-button {
    transform: scale(1.1);
    box-shadow: 0 6px 25px rgba(225, 48, 108, 0.5);
}

.ig-social-icon i {
    font-size: 18px;
    color: white;
    transition: transform 0.3s ease;
}

.ig-social-item:hover .ig-social-icon i {
    transform: scale(1.1);
}

/* Social Info */
.ig-social-info {
    flex: 1;
    min-width: 0;
}

.ig-social-info h6 {
    margin: 0 0 4px 0;
    font-size: 13px;
    font-weight: 600;
    color: #333;
    line-height: 1.2;
}

.ig-social-info p {
    margin: 0;
    font-size: 11px;
    color: #666;
    line-height: 1.3;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

@keyframes ig-social-item-appear {
    0% {
        opacity: 0;
        transform: translateX(20px);
    }
    100% {
        opacity: 1;
        transform: translateX(0);
    }
}

/* Close Button */
.ig-close-button {
    position: absolute;
    top: -15px;
    left: -15px;
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
    animation: ig-social-item-appear 0.5s ease forwards;
    animation-delay: calc(var(--delay) + 0.2s);
    box-shadow: 0 4px 20px rgba(220, 53, 69, 0.3);
}

.ig-close-button:hover {
    background: rgba(220, 53, 69, 1);
    transform: scale(1.1);
    box-shadow: 0 6px 25px rgba(220, 53, 69, 0.5);
}

.ig-close-button i {
    font-size: 14px;
    color: white;
}

/* Backdrop */
.ig-backdrop {
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

.ig-backdrop.show {
    opacity: 1;
    visibility: visible;
}

/* Responsive Design */
@media (max-width: 768px) {
    .floating-instagram-transparent {
        /* Button height 60px + gap 15px = 75px dari Facebook, total 170px dari bottom (95 + 75) */
        bottom: max(170px, env(safe-area-inset-bottom, 170px));
        left: max(15px, env(safe-area-inset-left, 15px));
    }
}

/* Extra small screens - stack buttons vertically */
@media (max-width: 600px) {
    .floating-facebook-transparent {
        bottom: max(20px, env(safe-area-inset-bottom, 20px));
        right: max(20px, env(safe-area-inset-right, 20px));
    }
    
    .floating-instagram-transparent {
        bottom: max(100px, env(safe-area-inset-bottom, 100px));
        right: max(20px, env(safe-area-inset-right, 20px));
    }
}

@media (max-width: 768px) {
    .ig-main-button {
        width: 60px;
        height: 60px;
    }
    
    .ig-icon-container i {
        font-size: 28px;
    }
    
    .ig-social-item {
        margin-bottom: 12px;
        padding: 6px;
        min-width: 180px;
        max-width: 250px;
    }
    
    .ig-social-button {
        width: 40px;
        height: 40px;
        margin-right: 10px;
    }
    
    .ig-social-icon i {
        font-size: 16px;
    }
    
    .ig-social-info h6 {
        font-size: 12px;
    }
    
    .ig-social-info p {
        font-size: 10px;
    }
    
    .ig-close-button {
        width: 30px;
        height: 30px;
        top: -12px;
        left: -12px;
    }
    
    .ig-close-button i {
        font-size: 12px;
    }
}

@media (max-width: 480px) {
    .floating-instagram-transparent {
        /* Button height 55px + gap 15px = 70px dari Facebook, total 155px dari bottom (85 + 70) */
        bottom: max(155px, env(safe-area-inset-bottom, 155px));
        left: max(15px, env(safe-area-inset-left, 15px));
    }
    
    .ig-main-button {
        width: 55px;
        height: 55px;
    }
    
    .ig-icon-container i {
        font-size: 24px;
    }
    
    .ig-social-item {
        margin-bottom: 10px;
        padding: 5px;
        min-width: 160px;
        max-width: 220px;
    }
    
    .ig-social-button {
        width: 35px;
        height: 35px;
        margin-right: 8px;
    }
    
    .ig-social-icon i {
        font-size: 14px;
    }
    
    .ig-social-info h6 {
        font-size: 11px;
    }
    
    .ig-social-info p {
        font-size: 9px;
    }
    
    .ig-close-button {
        width: 28px;
        height: 28px;
        top: -10px;
        left: -10px;
    }
    
    .ig-close-button i {
        font-size: 11px;
    }
}

/* Dark mode support */
@media (prefers-color-scheme: dark) {
    .ig-main-button {
        background: rgba(225, 48, 108, 0.2);
        border-color: rgba(225, 48, 108, 0.4);
    }
    
    .ig-main-button:hover {
        background: rgba(225, 48, 108, 0.3);
        border-color: rgba(225, 48, 108, 0.6);
    }
    
    .ig-social-button {
        background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
        border-color: rgba(255, 255, 255, 0.2);
    }
    
    .ig-social-button:hover {
        background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
    }
}
</style>
