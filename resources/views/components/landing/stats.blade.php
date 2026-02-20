<section class="stats" id="stats">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-number" data-target="{{ $site_settings->stats['jamaah'] ?? 0 }}">
                    0
                </div>
                <div class="stat-label">Jamaah Umroh</div>
            </div>

            <div class="stat-item">
                <div class="stat-icon">
                    <i class="fas fa-star"></i>
                </div>
                <div class="stat-number" data-target="{{ $site_settings->stats['satisfaction'] ?? 0 }}" data-suffix="%">
                    0
                </div>
                <div class="stat-label">Kepuasan Jamaah</div>
            </div>
            <div class="stat-item">
                <div class="stat-icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <div class="stat-number" data-target="{{ $site_settings->stats['experience'] ?? 0 }}" data-suffix="+">
                    0
                </div>
                <div class="stat-label">Tahun Pengalaman</div>
            </div>
            <div class="stat-item">
                <div class="stat-icon">
                    <i class="fas fa-plane-departure"></i>
                </div>
                <div class="stat-number" data-target="{{ $site_settings->stats['departures'] ?? 0 }}">
                    0
                </div>
                <div class="stat-label">Keberangkatan</div>
            </div>
        </div>
    </div>
</section>
