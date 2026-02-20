<footer>
    <div class="container">
        <div class="footer-content">
            <div class="footer-about">
                <div class="footer-logo">{{ $site_settings->company_name }}</div>
                <p>Travel umroh terpercaya yang berkomitmen memberikan pelayanan terbaik untuk pengalaman ibadah
                    yang bermakna. Dengan izin resmi dari Kementerian Agama dan pengalaman lebih dari
                    {{ $site_settings->stats['experience'] ?? 0 }} tahun.</p>
                <div class="social-icons">
                    @if ($site_settings->wa_number_indo)
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $site_settings->wa_number_indo) }}"
                            target="_blank" style="--i: 0">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    @endif
                    @if ($site_settings->social_media)
                        @foreach ($site_settings->social_media as $platform => $url)
                            @if ($url)
                                <a href="{{ $url }}" target="_blank" style="--i: {{ $loop->index }}">
                                    <i class="fab fa-{{ strtolower($platform) }}"></i>
                                </a>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="footer-links">
                <h4>Link Cepat</h4>
                <ul>
                    <li><a href="#home">Beranda</a></li>
                    <li><a href="#packages">Paket Umroh</a></li>
                    <li><a href="#features">Keunggulan</a></li>
                    <li><a href="#process">Proses Pendaftaran</a></li>
                    <li><a href="#testimonials">Testimoni</a></li>
                    <li><a href="#contact">Kontak Kami</a></li>
                </ul>
            </div>

            <div class="footer-contact">
                <h4>Kantor Cabang</h4>
                <ul>
                    @if ($site_settings->branches)
                        @foreach ($site_settings->branches as $branch)
                            <li>
                                <i class="fas fa-map-marker-alt"></i>
                                <strong>{{ $branch['name'] }}:</strong> {{ $branch['address'] }}
                            </li>
                        @endforeach
                    @else
                        <li>Belum ada kantor cabang.</li>
                    @endif
                </ul>
            </div>
        </div>

        <div class="copyright">
            &copy; {{ date('Y') }} {{ $site_settings->company_name }} - Travel Umroh Terpercaya. All Rights
            Reserved. | Design dengan ❤️ untuk
            pengalaman spiritual terbaik @guest
                | <a href="{{ route('login') }}" style="text-decoration: none; font-weight: 900; color:#fff">
                    Login
                </a>
            @endguest
        </div>
    </div>
</footer>
