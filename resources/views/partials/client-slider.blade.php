<section class="py-5 overflow-hidden client-section bg-white">
    <div class="container mb-5 text-center">
        <h2 class="fw-bold mb-3 text-dark">Klien Kami</h2>
        <p class="text-muted mx-auto" style="max-width: 700px;">
            Kepuasan klien adalah prioritas utama kami. Kami selalu berkomitmen untuk memberikan layanan terbaik dan pengalaman yang tak terlupakan bagi setiap klien kami.
        </p>
    </div>
    
    <div class="client-slider">
        <div class="client-slide-track">
            <!-- 2 Sets of Logos for seamless loop -->
            @php
                $logos = [
                    ['url' => asset('images/clients/1.webp'), 'name' => 'Client 1'],
                    ['url' => asset('images/clients/2.webp'), 'name' => 'Client 2'],
                    ['url' => asset('images/clients/3.webp'), 'name' => 'Client 3'],
                    ['url' => asset('images/clients/4.webp'), 'name' => 'Client 4'],
                    ['url' => asset('images/clients/5.webp'), 'name' => 'Client 5'],
                    ['url' => asset('images/clients/6.webp'), 'name' => 'Client 6'],
                    ['url' => asset('images/clients/7.webp'), 'name' => 'Client 7'],
                    ['url' => asset('images/clients/8.webp'), 'name' => 'Client 8'],
                ];
            @endphp

            @for($i = 0; $i < 2; $i++)
                @foreach($logos as $logo)
                    <div class="client-slide">
                        <img src="{{ $logo['url'] }}" alt="{{ $logo['name'] }}" title="{{ $logo['name'] }}" loading="lazy">
                    </div>
                @endforeach
            @endfor
        </div>
    </div>
</section>

<style>
.client-slider {
    height: 120px;
    margin: auto;
    overflow: hidden;
    position: relative;
    width: 100%;
}

.client-slider::before,
.client-slider::after {
    background: linear-gradient(to right, #ffffff 0%, rgba(255, 255, 255, 0) 100%);
    content: "";
    height: 120px;
    position: absolute;
    width: 150px;
    z-index: 2;
    pointer-events: none;
}

.client-slider::after {
    right: 0;
    top: 0;
    transform: rotateZ(180deg);
}

.client-slider::before {
    left: 0;
    top: 0;
}

.client-slide-track {
    animation: scroll 30s linear infinite;
    display: flex;
    width: calc(200px * {{ count($logos) * 2 }});
}

.client-slide {
    height: 120px;
    width: 200px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0 30px;
}

.client-slide img {
    max-width: 100%;
    max-height: 80px;
    opacity: 0.8;
    transition: all 0.3s ease;
    object-fit: contain;
    filter: drop-shadow(0 2px 4px rgba(0,0,0,0.5));
}

.client-slide img:hover {
    opacity: 1;
    transform: scale(1.1);
    filter: drop-shadow(0 4px 8px rgba(0,0,0,0.8));
}

@keyframes scroll {
    0% { transform: translateX(0); }
    100% { transform: translateX(calc(-200px * {{ count($logos) }})); }
}

@media (max-width: 768px) {
    .client-slider::before,
    .client-slider::after {
        width: 50px;
    }
    
    .client-slide {
        width: 150px;
        padding: 0 15px;
    }
    
    .client-slide-track {
        width: calc(150px * {{ count($logos) * 2 }});
    }
    
    @keyframes scroll {
        0% { transform: translateX(0); }
        100% { transform: translateX(calc(-150px * {{ count($logos) }})); }
    }
}
</style>
