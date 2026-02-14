 <header id="header">
     <div class="container header-container">
         <a href="#home" class="logo">
             <div class="logo-icon">
                 @if ($site_settings->logo_path && Storage::disk('public')->exists($site_settings->logo_path))
                     <img src="{{ asset('storage/' . $site_settings->logo_path) }}"
                         alt="Logo {{ $site_settings->company_name }}"
                         style="height: 40px; width: auto; object-fit: contain;">
                 @else
                     <i class="fas fa-kaaba"></i>
                 @endif
             </div>
             <div class="logo-text">{{ $site_settings->company_name }}</div>
         </a>

         <button class="mobile-menu-btn" id="mobileMenuBtn">
             <i class="fas fa-bars"></i>
         </button>

         <ul class="nav-menu" id="navMenu">
             <li><a href="#home">Beranda</a></li>
             <li><a href="#packages">Paket Umroh</a></li>
             <li><a href="#features">Keunggulan</a></li>
             <li><a href="#process">Proses</a></li>
             <li><a href="#testimonials">Testimoni</a></li>
             <li><a href="#contact">Kontak</a></li>
             @auth
                 <li>
                     <a href="{{ route('dashboard') }}">Dashboard</a>
                 </li>
             @endauth
         </ul>
     </div>
 </header>
