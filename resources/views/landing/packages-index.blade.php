<x-layouts.landing title="Semua Paket Umroh - Alhasani Travel">

    <div style="padding-top: 130px; background-color: var(--light-gray); min-height: 100vh;">

        <section class="packages" style="padding-top: 20px;">
            <div class="container">

                <nav aria-label="breadcrumb" style="margin-bottom: 40px; display: flex; justify-content: center;">
                    <ol
                        style="display: flex; list-style: none; padding: 0; gap: 10px; font-weight: 500; font-size: 15px;">
                        <li><a href="{{ url('/') }}"
                                style="color: var(--primary-green); text-decoration: none;">Beranda</a></li>
                        <li style="color: var(--text-gray);">/</li>
                        <li aria-current="page" style="color: var(--text-dark);">Semua Paket</li>
                    </ol>
                </nav>

                <div class="section-title">
                    <h2>Pilihan Paket Umroh</h2>
                    <p>Temukan perjalanan ibadah yang dirancang khusus untuk kenyamanan Anda.</p>
                </div>

                <div class="packages-grid">
                    @forelse($packages as $package)
                        <div class="package-card">
                            <div class="package-image">
                                @if ($package->image)
                                    <img src="{{ asset('storage/' . $package->image) }}" alt="{{ $package->name }}"
                                        loading="lazy">
                                @else
                                    <img src="{{ asset('assets/img/no-image.webp') }}" alt="Default"
                                        loading="lazy">
                                @endif
                            </div>

                            <div class="package-body">
                                <h3>{{ $package->name }}</h3>

                                <p class="package-excerpt">
                                    {{ Str::limit(strip_tags($package->description), 100, '...') }}
                                </p>

                                <a href="{{ route('landing.paket.show', $package->slug) }}" class="btn-card-action">
                                    Lihat Detail <i class="fas fa-arrow-right"
                                        style="margin-left: 5px; font-size: 0.85rem;"></i>
                                </a>
                            </div>
                        </div>
                    @empty
                        <div
                            style="grid-column: 1 / -1; text-align: center; padding: 60px 20px; background: #fff; border-radius: 12px; border: 1px dashed var(--medium-gray);">
                            <p style="color: var(--text-gray); font-size: 1.1rem; margin: 0;">Mohon maaf, belum ada
                                paket umroh yang tersedia saat ini.</p>
                        </div>
                    @endforelse
                </div>

                <div style="margin-top: 50px; display: flex; justify-content: center;">
                    {{ $packages->links('components.landing.custom-pagination') }}
                </div>

            </div>
        </section>

    </div>

</x-layouts.landing>
