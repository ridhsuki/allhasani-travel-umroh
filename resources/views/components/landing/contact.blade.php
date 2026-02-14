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
                <form id="contactForm">
                    <div class="form-group">
                        <i class="fas fa-user form-icon"></i>
                        <input type="text" placeholder="Nama Lengkap" required>
                    </div>
                    <div class="form-group">
                        <i class="fas fa-envelope form-icon"></i>
                        <input type="email" placeholder="Alamat Email" required>
                    </div>
                    <div class="form-group">
                        <i class="fas fa-phone form-icon"></i>
                        <input type="tel" placeholder="Nomor Telepon/WhatsApp" required>
                    </div>
                    <div class="form-group">
                        <i class="fas fa-box form-icon"></i>
                        <select required>
                            <option value="" disabled selected>Pilih Paket yang Diminati</option>
                            <option value="ekonomis">Paket Ekonomis (Rp 29.500.000)</option>
                            <option value="reguler">Paket Reguler (Rp 39.500.000)</option>
                            <option value="premium">Paket Premium (Rp 59.500.000)</option>
                            <option value="konsultasi">Konsultasi Gratis</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <i class="fas fa-comment form-icon"></i>
                        <textarea rows="5" placeholder="Pertanyaan atau Pesan Anda" required></textarea>
                    </div>
                    <button type="submit" class="btn" style="width: 100%;"><i class="fas fa-paper-plane"></i> Kirim
                        Pesan Sekarang</button>
                </form>
            </div>
        </div>
    </div>
</section>
