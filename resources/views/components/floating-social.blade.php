<!-- Floating Social Button -->
<div class="floating-social-container">
    <!-- Main Button -->
    <div class="social-main-button" id="socialMainButton">
        <div class="social-icon-container">
            <i class="fas fa-comment-dots"></i>
        </div>
        <div class="social-pulse-ring"></div>
        <div class="social-pulse-ring-2"></div>
    </div>
    
    <!-- Social Menu (FB, IG, WA) -->
    <div class="social-menu-container" id="socialMenuContainer">
        <!-- Facebook -->
        @if($profile ?? false && $profile->social_media && $profile->social_media['facebook'])
        <a href="{{ $profile->social_media['facebook'] }}" target="_blank" class="social-item" style="--delay: 0.1s; --bg-color: #1877F2;">
            <div class="social-item-icon">
                <i class="fab fa-facebook-f"></i>
            </div>
            <span class="social-item-label">Facebook</span>
        </a>
        @endif

        <!-- Instagram -->
        @if($profile ?? false && $profile->social_media && $profile->social_media['instagram'])
        <a href="{{ $profile->social_media['instagram'] }}" target="_blank" class="social-item" style="--delay: 0.2s; --bg-color: #E1306C;">
            <div class="social-item-icon">
                <i class="fab fa-instagram"></i>
            </div>
            <span class="social-item-label">Instagram</span>
        </a>
        @endif

        <!-- WhatsApp (Trigger Branch List) -->
        <div class="social-item" id="waTriggerButton" style="--delay: 0.3s; --bg-color: #25D366;">
            <div class="social-item-icon">
                <i class="fab fa-whatsapp"></i>
            </div>
            <span class="social-item-label">WhatsApp</span>
        </div>
        
        <!-- Close Button -->
        <div class="social-close-button" id="socialCloseButton">
            <i class="fas fa-times"></i>
        </div>
    </div>

    <!-- WhatsApp Branch List (Initially Hidden) -->
    <div class="wa-branches-container" id="waBranchesContainer">
        <div class="wa-header">
            <button class="wa-back-button" id="waBackButton">
                <i class="fas fa-arrow-left"></i>
            </button>
            <span>Pilih Cabang</span>
        </div>

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
    </div>
    
    <!-- Backdrop -->
    <div class="social-backdrop" id="socialBackdrop"></div>
</div>

@push('styles')
@vite('resources/css/components/floating-social.css')
@endpush
@push('scripts')
@vite('resources/js/components/floating-social.js')
@endpush

<style>
/* Container */
.floating-social-container {
    position: fixed;
    bottom: 25px;
    left: 25px;
    z-index: 9999;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    bottom: max(25px, env(safe-area-inset-bottom, 25px));
    left: max(25px, env(safe-area-inset-left, 25px));
}

/* Main Button */
.social-main-button {
    position: relative;
    width: 64px;
    height: 64px;
    background: #0d6efd;
    border: 0;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: transform 0.24s cubic-bezier(0.2, 0.8, 0.2, 1), box-shadow 0.24s ease, background 0.24s ease;
    z-index: 10;
    box-shadow: 0 10px 24px rgba(13, 110, 253, 0.35), 0 2px 6px rgba(13, 110, 253, 0.25);
}

.social-main-button:hover,
.social-main-button.active {
    transform: translateY(-2px) scale(1.06);
    box-shadow: 0 14px 30px rgba(13, 110, 253, 0.45), 0 4px 10px rgba(13, 110, 253, 0.3);
}

.social-icon-container i {
    font-size: 26px;
    color: white;
    transition: transform 0.2s ease;
}

.social-main-button:hover .social-icon-container i,
.social-main-button.active .social-icon-container i {
    transform: scale(1.08);
}

/* Pulse Animation */
.social-pulse-ring, .social-pulse-ring-2 {
    position: absolute;
    top: -5px; left: -5px; right: -5px; bottom: -5px;
    border-radius: 50%;
    border: 2px solid rgba(13, 110, 253, 0.35);
    animation: none;
    display: none;
}
.social-pulse-ring-2 {
    top: -15px; left: -15px; right: -15px; bottom: -15px;
    border: 1px solid rgba(13, 110, 253, 0.22);
    animation: none;
    display: none;
}

@keyframes pulse-ring {
    0% { transform: scale(0.9); opacity: 1; }
    100% { transform: scale(1.3); opacity: 0; }
}
@keyframes pulse-ring-2 {
    0% { transform: scale(0.7); opacity: 0.8; }
    100% { transform: scale(1.5); opacity: 0; }
}

/* Social Menu */
.social-menu-container {
    position: absolute;
    bottom: 86px;
    left: 4px;
    display: flex;
    flex-direction: column;
    gap: 15px;
    opacity: 0;
    visibility: hidden;
    transform: translateY(14px) scale(0.98);
    transition: transform 0.24s cubic-bezier(0.2, 0.8, 0.2, 1), opacity 0.24s ease, visibility 0.24s ease;
    pointer-events: none;
}

.social-menu-container.show {
    opacity: 1;
    visibility: visible;
    transform: translateY(0) scale(1);
    pointer-events: auto;
}

.social-item {
    display: flex;
    align-items: center;
    gap: 12px;
    cursor: pointer;
    text-decoration: none;
    opacity: 0;
    transform: translateY(10px) scale(0.94);
    transition: transform 0.24s cubic-bezier(0.2, 0.8, 0.2, 1), opacity 0.24s ease;
}

.social-menu-container.show .social-item {
    animation: popIn 0.28s forwards cubic-bezier(0.2, 0.8, 0.2, 1);
    animation-delay: var(--delay);
}

@keyframes popIn {
    0% { opacity: 0; transform: translateY(10px) scale(0.94); }
    100% { opacity: 1; transform: translateY(0) scale(1); }
}

.social-item-icon {
    width: 52px;
    height: 52px;
    border-radius: 50%;
    background: var(--bg-color);
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 8px 18px rgba(0,0,0,0.18);
    transition: transform 0.18s ease, box-shadow 0.18s ease;
}

.social-item:hover .social-item-icon {
    transform: translateY(-2px) scale(1.06);
    box-shadow: 0 12px 26px rgba(0,0,0,0.22);
}

.social-item-icon i {
    font-size: 24px;
    color: white;
}

.social-item-label {
    background: #ffffff;
    padding: 7px 14px;
    border-radius: 20px;
    font-size: 13px;
    font-weight: 600;
    color: #333;
    box-shadow: 0 4px 12px rgba(0,0,0,0.12);
    opacity: 0;
    transition: opacity 0.2s ease, transform 0.2s ease;
}

.social-item:hover .social-item-label {
    opacity: 1;
    transform: translateY(-2px);
}

/* Close Button */
.social-close-button {
    width: 44px;
    height: 44px;
    background: #dc3545;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    margin-top: 6px;
    box-shadow: 0 10px 24px rgba(220, 53, 69, 0.35);
    align-self: flex-start;
    margin-left: 6px;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.social-close-button i { color: white; }
.social-close-button:hover {
    transform: translateY(-2px) scale(1.06);
    box-shadow: 0 14px 30px rgba(220, 53, 69, 0.45);
}

/* WA Branches List */
.wa-branches-container {
    position: absolute;
    bottom: 86px;
    left: 4px;
    background: #ffffff;
    border-radius: 20px;
    padding: 15px;
    width: 320px;
    box-shadow: 0 16px 40px rgba(0,0,0,0.18);
    opacity: 0;
    visibility: hidden;
    transform: translateY(12px) scale(0.96);
    transition: transform 0.24s cubic-bezier(0.2, 0.8, 0.2, 1), opacity 0.24s ease, visibility 0.24s ease;
    transform-origin: bottom left;
}

.wa-branches-container.show {
    opacity: 1;
    visibility: visible;
    transform: translateY(0) scale(1);
}

.wa-header {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 15px;
    padding-bottom: 10px;
    border-bottom: 1px solid #eee;
}

.wa-back-button {
    background: none;
    border: none;
    color: #666;
    cursor: pointer;
    font-size: 16px;
    padding: 5px;
    transition: transform 0.2s ease;
}
.wa-back-button:hover {
    transform: translateY(-1px);
}

.wa-branch-item {
    display: flex;
    align-items: center;
    padding: 12px;
    border-radius: 12px;
    cursor: pointer;
    transition: transform 0.2s ease, background 0.2s ease, box-shadow 0.2s ease;
    margin-bottom: 10px;
    border: 1px solid #f0f0f0;
    box-shadow: 0 4px 10px rgba(0,0,0,0.06);
}

.wa-branch-item:hover {
    background: #f5f7fb;
    border-color: #e9ecef;
    transform: translateY(-2px);
    box-shadow: 0 8px 18px rgba(0,0,0,0.12);
}

.wa-branch-button {
    width: 42px;
    height: 42px;
    background: #25D366;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 12px;
    flex-shrink: 0;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.wa-branch-button i { color: white; font-size: 18px; }
.wa-branch-item:hover .wa-branch-button { transform: translateY(-1px) scale(1.04); }

.wa-branch-info h6 { margin: 0 0 2px; font-size: 14px; font-weight: 600; }
.wa-branch-info p { margin: 0; font-size: 12px; color: #666; }

/* Backdrop */
.social-backdrop {
    position: fixed;
    top: 0; left: 0; right: 0; bottom: 0;
    background: rgba(0,0,0,0.3);
    backdrop-filter: blur(3px);
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.24s ease, visibility 0.24s ease;
    z-index: -1;
}
.social-backdrop.show { opacity: 1; visibility: visible; }

/* Mobile Responsive */
@media (max-width: 480px) {
    .floating-social-container {
        bottom: 20px; left: 20px;
    }
    .social-main-button { width: 58px; height: 58px; }
    .social-item-label { display: block; opacity: 1; }
    .wa-branches-container { width: 300px; }
}

.social-main-button .ripple {
    position: absolute;
    width: 10px;
    height: 10px;
    background: rgba(255,255,255,0.6);
    border-radius: 50%;
    transform: scale(0);
    animation: ripple 600ms ease-out forwards;
    pointer-events: none;
}
@keyframes ripple {
    to { transform: scale(8); opacity: 0; }
}
</style>
