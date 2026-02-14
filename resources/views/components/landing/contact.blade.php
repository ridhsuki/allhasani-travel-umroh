<section id="contact">
    <div class="container">
        <div class="section-title">
            <h2>Hubungi Kami</h2>
            <p>Konsultasikan kebutuhan umroh Anda dengan tim kami yang siap membantu 24/7</p>
        </div>

        <div class="contact-container">
            <div class="contact-info">
                <h3>{{ $site_settings->company_name }}</h3>
                <p>Travel umroh terpercaya dengan komitmen memberikan pelayanan terbaik untuk pengalaman ibadah yang
                    bermakna dan tak terlupakan.</p>

                <ul class="contact-details">
                    <li>
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <strong>Alamat Kantor Pusat</strong><br>
                            {{ $site_settings->address_head_office ?? '-' }}
                        </div>
                    </li>
                    <li>
                        <i class="fas fa-phone"></i>
                        <div>
                            <strong>Hotline & WhatsApp</strong><br>
                            {{ $site_settings->wa_number_indo }}
                            @if ($site_settings->wa_number_saudi)
                                | {{ $site_settings->wa_number_saudi }}
                            @endif
                        </div>
                    </li>
                    <li>
                        <i class="fas fa-envelope"></i>
                        <div>
                            <strong>Email Resmi</strong><br>
                            <span>
                                {{ $site_settings->email_primary }}
                            </span>
                            @if ($site_settings->email_secondary)
                                <br>
                                <span>
                                    {{ $site_settings->email_secondary }}
                                </span>
                            @endif
                        </div>
                    </li>
                    <li>
                        <i class="fas fa-clock"></i>
                        <div>
                            <strong>Jam Operasional</strong><br>
                            {!! nl2br(e($site_settings->operational_hours)) !!}
                        </div>
                    </li>
                </ul>
            </div>

            <div class="contact-form">
                <form id="waContactForm" onsubmit="sendToWhatsapp(event)">

                    <div class="form-group">
                        <i class="fas fa-user form-icon"></i>
                        <input type="text" id="waName" placeholder="Nama Lengkap" class="form-input" required>
                    </div>

                    <div class="form-group">
                        <i class="fas fa-envelope form-icon"></i>
                        <input type="email" id="waEmail" placeholder="Alamat Email" class="form-input" required>
                    </div>

                    <div class="form-group">
                        <i class="fas fa-phone form-icon"></i>
                        <input type="tel" id="waPhone" placeholder="Nomor Telepon/WhatsApp" class="form-input"
                            required>
                    </div>

                    <div class="form-group">
                        <i class="fas fa-box form-icon"></i>
                        <select id="waPackage" class="form-input" required>
                            <option value="" disabled selected>Pilih Paket yang Diminati</option>

                            <option value="Konsultasi Umum">Konsultasi Gratis / Tanya Jawab</option>

                            @if (isset($packages))
                                @foreach ($packages as $pkg)
                                    <option value="{{ $pkg->name }} ({{ $pkg->formatted_price }})">
                                        {{ $pkg->name }} - {{ $pkg->formatted_price }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="form-group">
                        <i class="fas fa-comment form-icon"></i>
                        <textarea id="waMessage" rows="5" placeholder="Pertanyaan atau pesan spesifik Anda..." class="form-input"
                            required></textarea>
                    </div>

                    <button type="submit" id="btnSubmit" class="btn" style="width: 100%;">
                        <i class="fas fa-paper-plane"></i> Kirim Pesan Sekarang
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
