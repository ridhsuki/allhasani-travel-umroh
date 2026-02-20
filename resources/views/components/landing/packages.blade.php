@props(['packages'])

<section class="packages" id="packages" style="padding: 100px 0;">
    <div class="container">
        <div class="section-title">
            <h2>Pilihan Paket Umroh</h2>
            <p>Temukan perjalanan ibadah yang dirancang khusus untuk kenyamanan Anda.</p>
        </div>

        <div class="packages-grid">
            @forelse($packages->take(6) as $package)
                <div class="package-card">
                    <div class="package-image">
                        @if ($package->image)
                            <img src="{{ asset('storage/' . $package->image) }}" alt="Paket Umroh {{ $package->name }}"
                                loading="lazy">
                        @else
                            <img src="{{ asset('assets/img/no-image.webp') }}" alt="Default Umroh" loading="lazy">
                        @endif
                    </div>

                    <div class="package-body">
                        <h3>{{ $package->name }}</h3>

                        <p class="package-excerpt">
                            {{ Str::limit(strip_tags($package->description), 100, '...') }}
                        </p>

                        <a href="{{ route('landing.paket.show', $package->slug) }}" class="btn-card-action">
                            Lihat Detail <i class="fas fa-arrow-right" style="font-size: 0.85rem;"></i>
                        </a>
                    </div>
                </div>
            @empty
                <div style="grid-column: 1 / -1; text-align: center; padding: 40px; color: #666;">
                    <p>Mohon maaf, belum ada paket umroh yang tersedia saat ini.</p>
                </div>
            @endforelse
        </div>

        {{-- @if ($packages->count() > 6) --}}
        <div style="text-align: center; margin-top: 50px;">
            <a href="{{ route('landing.paket.index') }}" class="btn btn-lihat-semua">
                Lihat Semua Paket <i class="fas fa-arrow-right"></i>
            </a>
        </div>
        {{-- @endif --}}

    </div>
</section>
