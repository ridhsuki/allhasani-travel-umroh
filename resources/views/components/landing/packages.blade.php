@props(['packages' => []])

<section class="packages" id="packages">
    <div class="container">
        <div class="section-title">
            <h2>Paket Umroh 2024</h2>
            <p>Pilih paket umroh premium yang sesuai dengan kebutuhan spiritual dan anggaran Anda</p>
        </div>

        <div class="packages-grid">
            @foreach ($packages as $package)
                <div class="package-card">
                    @if (isset($package['badge']))
                        <div class="package-badge">{{ $package['badge'] }}</div>
                    @endif
                    <div class="package-header">
                        <h3>{{ $package['name'] }}</h3>
                        <div class="package-price">{{ $package['price'] }}</div>
                        <div class="package-duration">{{ $package['duration'] }}</div>
                    </div>
                    <div class="package-body">
                        <ul class="package-features">
                            @foreach ($package['features'] as $feature)
                                <li><i class="fas fa-check"></i> {{ $feature }}</li>
                            @endforeach
                        </ul>
                        <div class="package-highlight">
                            <p><strong>Bonus Spesial:</strong> {{ $package['bonus'] }}</p>
                        </div>
                        <a href="#contact" class="btn {{ isset($package['is_premium']) ? 'btn-gold' : '' }}"
                            style="width: 100%; text-align: center;">
                            <i
                                class="{{ isset($package['is_premium']) ? 'fas fa-crown' : 'fas fa-shopping-cart' }}"></i>
                            Pesan Sekarang
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
