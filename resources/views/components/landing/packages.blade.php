@props(['packages'])

<section class="packages" id="packages">
    <div class="container">
        <div class="section-title">
            <h2>Pilihan Paket Umroh</h2>
            <p>Pilih paket ibadah yang sesuai dengan kebutuhan dan budget Anda.</p>
        </div>

        <div class="packages-grid">
            @forelse($packages as $package)
                <div class="package-card">

                    @if ($package->badge)
                        <div class="package-badge {{ $package->badge }}">
                            {{ ucfirst($package->badge) }}
                        </div>
                    @endif

                    <div class="package-header">
                        <h3>{{ $package->name }}</h3>
                        <div class="package-price">{{ $package->formatted_price }}</div>
                        <div class="package-duration">
                            {{ $package->duration_days }} Hari | Max. {{ $package->max_pax }} Jamaah
                        </div>
                    </div>

                    <div class="package-body">
                        <ul class="package-features">
                            @foreach ($package->features as $feature)
                                <li>
                                    <i class="fas fa-check"></i> {{ $feature }}
                                </li>
                            @endforeach
                        </ul>

                        @if ($package->bonus)
                            <div class="package-highlight">
                                <p><strong>Bonus Spesial:</strong> {{ $package->bonus }}</p>
                            </div>
                        @endif

                        @php
                            $isExclusive = $package->badge === 'eksklusif';
                            $btnClass = $isExclusive ? 'btn-gold' : '';
                            $iconClass = $isExclusive ? 'fas fa-crown' : 'fas fa-shopping-cart';
                        @endphp

                        <a href="#contact" class="btn {{ $btnClass }}" style="width: 100%; text-align: center; margin-top: 12px;">
                            <i class="{{ $iconClass }}"></i> Pesan Sekarang
                        </a>
                    </div>
                </div>
            @empty
                <div style="grid-column: 1 / -1; text-align: center; padding: 40px; color: #666;">
                    <p>Mohon maaf, belum ada paket umroh yang tersedia saat ini.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
