<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="robots" content="index, follow, max-image-preview:large">
<meta name="language" content="Indonesian">
<meta name="revisit-after" content="7 days">
<meta name="author" content="{{ $site_settings->company_name ?? 'PT Al Hasani Tour & Travel' }}">
<meta name="theme-color" content="#059669">
<title>{{ $title ?? 'Paket Umrah & Haji Terpercaya' }} |
    {{ $site_settings->company_name ?? 'PT Al Hasani Tour & Travel' }}</title>
<meta name="description"
    content="{{ $description ?? 'Travel Umrah & Haji resmi Kemenag. Menyediakan paket umrah promo, reguler, hingga VIP dengan pelayanan profesional, amanah, dan harga bersaing. Daftar sekarang!' }}">
<meta name="keywords"
    content="{{ $keywords ?? 'travel umrah, paket umrah 2024, paket umrah 2025, biaya umrah, umrah murah, travel haji plus, wisata halal, tour muslim, umrah vip, umrah hemat, biro perjalanan umrah, ' . ($site_settings->city ?? 'Jakarta') }}">
<link rel="canonical" href="{{ url()->current() }}">
<meta property="og:type" content="website">
<meta property="og:locale" content="id_ID">
<meta property="og:site_name" content="{{ $site_settings->company_name ?? 'Travel Umrah Terbaik' }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:title"
    content="{{ $title ?? 'Paket Umrah Hemat & Terpercaya' }} - {{ $site_settings->company_name ?? 'Travel Umrah' }}">
<meta property="og:description"
    content="{{ $description ?? 'Wujudkan impian ke Baitullah bersama kami. Dapatkan fasilitas terbaik, pembimbing berpengalaman, dan harga transparan.' }}">
<meta property="og:image" content="{{ $og_image ?? asset('assets/img/default-logo.png') }}">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:alt" content="Suasana Ibadah Umrah">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $title ?? 'Solusi Ibadah Umrah Nyaman' }}">
<meta name="twitter:description"
    content="{{ $description ?? 'Hubungi kami untuk konsultasi rencana ibadah umrah Anda.' }}">
<meta name="twitter:image" content="{{ asset('assets/img/default-logo.png') }}">
<meta name="geo.placename" content="{{ $site_settings->address_head_office ?? 'Indonesia' }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicon/favicon-16x16.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/favicon/favicon-32x32.png') }}">
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/favicon/apple-touch-icon.png') }}">
<link rel="manifest" href="{{ asset('assets/favicon/site.webmanifest') }}">
