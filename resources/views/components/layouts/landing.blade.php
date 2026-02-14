<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Rahmah Umroh - Travel Umroh Premium Terpercaya' }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@700;800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">
</head>

<body>
    <x-layouts.header />

    {{ $slot }}

    <x-layouts.footer />

    <a href="#" class="scroll-to-top" id="scrollToTop">
        <i class="fas fa-chevron-up"></i>
    </a>

    <script src="{{ asset('assets/js/landing.js') }}"></script>
</body>

</html>
