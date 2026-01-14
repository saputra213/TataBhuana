<!-- Transparent Floating Facebook Button -->
<div class="floating-facebook-transparent">
    <!-- Main Transparent Button -->
    <div class="fb-main-button" id="fbMainButton">
        <div class="fb-icon-container">
            <i class="fab fa-facebook-f"></i>
        </div>
        <div class="fb-pulse-ring"></div>
        <div class="fb-pulse-ring-2"></div>
    </div>
    
    <!-- Vertical Facebook Buttons -->
    <div class="fb-buttons-container" id="fbButtonsContainer">
        @if($profile ?? false && $profile->social_media && $profile->social_media['facebook'])
        <div class="fb-social-item" 
             style="--delay: 0.1s;"
             data-facebook="{{ $profile->social_media['facebook'] }}">
            <div class="fb-social-button">
                <div class="fb-social-icon">
                    <i class="fab fa-facebook-f"></i>
                </div>
            </div>
            <div class="fb-social-info">
                <h6>Facebook</h6>
                <p>Ikuti kami di Facebook</p>
            </div>
        </div>
        @endif
        
        <!-- Close Button -->
        <div class="fb-close-button" id="fbCloseButton">
            <i class="fas fa-times"></i>
        </div>
    </div>
    
    <!-- Backdrop -->
    <div class="fb-backdrop" id="fbBackdrop"></div>
</div>

@push('styles')
@vite('resources/css/components/floating-facebook.css')
@endpush
@push('scripts')
@vite('resources/js/components/floating-facebook.js')
@endpush

<style>
/* Transparent Floating Facebook Styles - Di atas WA di kiri */
.floating-facebook-transparent {
    position: fixed;
    bottom: 110px;
    left: 25px;
    z-index: 9997;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    /* Safe area untuk mobile - akan di-override di media query */
    bottom: max(110px, env(safe-area-inset-bottom, 110px));
    left: max(25px, env(safe-area-inset-left, 25px));
}

/* Main Transparent Button */
.fb-main-button {
    position: relative;
    width: 70px;
    height: 70px;
    background: rgba(24, 119, 242, 0.15);
    backdrop-filter: blur(20px);
    border: 2px solid rgba(24, 119, 242, 0.3);
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    overflow: hidden;
    z-index: 10;
}

.fb-main-button:hover {
    background: rgba(24, 119, 242, 0.25);
    border-color: rgba(24, 119, 242, 0.5);
    transform: scale(1.1);
    box-shadow: 0 8px 32px rgba(24, 119, 242, 0.3);
}

.fb-icon-container {
    position: relative;
    z-index: 3;
}

.fb-icon-container i {
    font-size: 32px;
    color: #1877F2;
    transition: all 0.3s ease;
}

.fb-main-button:hover .fb-icon-container i {
    transform: scale(1.1);
    color: #166FE5;
}

/* Pulse Rings */
.fb-pulse-ring {
    position: absolute;
    top: -10px;
    left: -10px;
    right: -10px;
    bottom: -10px;
    border: 2px solid rgba(24, 119, 242, 0.4);
    border-radius: 50%;
    animation: fb-pulse-ring 2s infinite;
}

.fb-pulse-ring-2 {
    position: absolute;
    top: -20px;
    left: -20px;
    right: -20px;
    bottom: -20px;
    border: 1px solid rgba(24, 119, 242, 0.2);
    border-radius: 50%;
    animation: fb-pulse-ring-2 2s infinite;
}

@keyframes fb-pulse-ring {
    0% {
        transform: scale(0.8);
        opacity: 1;
    }
    100% {
        transform: scale(1.4);
        opacity: 0;
    }
}

@keyframes fb-pulse-ring-2 {
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
.fb-buttons-container {
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

.fb-buttons-container.show {
    opacity: 1;
    visibility: visible;
    transform: translateX(0);
    pointer-events: auto;
}

/* Social Items */
.fb-social-item {
    display: flex;
    align-items: center;
    margin-bottom: 15px;
    opacity: 0;
    animation: fb-social-item-appear 0.5s ease forwards;
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

.fb-social-item:hover {
    background: rgba(255, 255, 255, 0.2);
    box-shadow: 0 5px 20px rgba(24, 119, 242, 0.2);
    transform: none;
}

/* Social Button */
.fb-social-button {
    width: 45px;
    height: 45px;
    background: #1877F2;
    backdrop-filter: blur(20px);
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    box-shadow: 0 4px 20px rgba(24, 119, 242, 0.3);
    flex-shrink: 0;
    margin-right: 12px;
}

.fb-social-item:hover .fb-social-button {
    background: #166FE5;
    transform: scale(1.1);
    box-shadow: 0 6px 25px rgba(24, 119, 242, 0.5);
}

.fb-social-icon i {
    font-size: 18px;
    color: white;
    transition: transform 0.3s ease;
}

.fb-social-item:hover .fb-social-icon i {
    transform: scale(1.1);
}

/* Social Info */
.fb-social-info {
    flex: 1;
    min-width: 0;
}

.fb-social-info h6 {
    margin: 0 0 4px 0;
    font-size: 13px;
    font-weight: 600;
    color: #333;
    line-height: 1.2;
}

.fb-social-info p {
    margin: 0;
    font-size: 11px;
    color: #666;
    line-height: 1.3;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

@keyframes fb-social-item-appear {
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
.fb-close-button {
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
    animation: fb-social-item-appear 0.5s ease forwards;
    animation-delay: calc(var(--delay) + 0.2s);
    box-shadow: 0 4px 20px rgba(220, 53, 69, 0.3);
}

.fb-close-button:hover {
    background: rgba(220, 53, 69, 1);
    transform: scale(1.1);
    box-shadow: 0 6px 25px rgba(220, 53, 69, 0.5);
}

.fb-close-button i {
    font-size: 14px;
    color: white;
}

/* Backdrop */
.fb-backdrop {
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

.fb-backdrop.show {
    opacity: 1;
    visibility: visible;
}

/* Responsive Design */
@media (max-width: 768px) {
    .floating-facebook-transparent {
        /* Button height 60px + gap 15px = 75px dari WhatsApp */
        bottom: max(95px, env(safe-area-inset-bottom, 95px));
        left: max(15px, env(safe-area-inset-left, 15px));
    }
}

/* Extra small screens - stack buttons vertically */
@media (max-width: 600px) {
    .floating-facebook-transparent {
        /* Button height 60px + gap 15px = 75px dari WhatsApp */
        bottom: max(95px, env(safe-area-inset-bottom, 95px));
        left: max(15px, env(safe-area-inset-left, 15px));
    }
    
    .floating-instagram-transparent {
        /* Button height 60px + gap 15px = 75px dari Facebook, total 170px dari bottom */
        bottom: max(170px, env(safe-area-inset-bottom, 170px));
        left: max(15px, env(safe-area-inset-left, 15px));
    }
}

@media (max-width: 768px) {
    .fb-main-button {
        width: 60px;
        height: 60px;
    }
    
    .fb-icon-container i {
        font-size: 28px;
    }
    
    .fb-social-item {
        margin-bottom: 12px;
        padding: 6px;
        min-width: 180px;
        max-width: 250px;
    }
    
    .fb-social-button {
        width: 40px;
        height: 40px;
        margin-right: 10px;
    }
    
    .fb-social-icon i {
        font-size: 16px;
    }
    
    .fb-social-info h6 {
        font-size: 12px;
    }
    
    .fb-social-info p {
        font-size: 10px;
    }
    
    .fb-close-button {
        width: 30px;
        height: 30px;
        top: -12px;
        left: -12px;
    }
    
    .fb-close-button i {
        font-size: 12px;
    }
}

@media (max-width: 480px) {
    .floating-facebook-transparent {
        /* Button height 55px + gap 15px = 70px dari WhatsApp */
        bottom: max(85px, env(safe-area-inset-bottom, 85px));
        left: max(15px, env(safe-area-inset-left, 15px));
    }
    
    .fb-main-button {
        width: 55px;
        height: 55px;
    }
    
    .fb-icon-container i {
        font-size: 24px;
    }
    
    .fb-social-item {
        margin-bottom: 10px;
        padding: 5px;
        min-width: 160px;
        max-width: 220px;
    }
    
    .fb-social-button {
        width: 35px;
        height: 35px;
        margin-right: 8px;
    }
    
    .fb-social-icon i {
        font-size: 14px;
    }
    
    .fb-social-info h6 {
        font-size: 11px;
    }
    
    .fb-social-info p {
        font-size: 9px;
    }
    
    .fb-close-button {
        width: 28px;
        height: 28px;
        top: -10px;
        left: -10px;
    }
    
    .fb-close-button i {
        font-size: 11px;
    }
}

/* Dark mode support */
@media (prefers-color-scheme: dark) {
    .fb-main-button {
        background: rgba(24, 119, 242, 0.2);
        border-color: rgba(24, 119, 242, 0.4);
    }
    
    .fb-main-button:hover {
        background: rgba(24, 119, 242, 0.3);
        border-color: rgba(24, 119, 242, 0.6);
    }
    
    .fb-social-button {
        background: #1877F2;
        border-color: rgba(255, 255, 255, 0.2);
    }
    
    .fb-social-button:hover {
        background: #166FE5;
    }
}
</style>
