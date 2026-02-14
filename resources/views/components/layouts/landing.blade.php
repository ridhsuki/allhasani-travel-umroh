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
    <script>
        function sendToWhatsapp(event) {
            event.preventDefault();

            const name = document.getElementById('waName').value;
            const email = document.getElementById('waEmail').value;
            const phone = document.getElementById('waPhone').value;
            const packageSelected = document.getElementById('waPackage').value;
            const message = document.getElementById('waMessage').value;

            let adminPhone = "{{ $site_settings->wa_number_indo ?? '-' }}";

            adminPhone = adminPhone.replace(/\D/g, '');

            if (adminPhone.startsWith('0')) {
                adminPhone = '62' + adminPhone.slice(1);
            }

            const companyName = "{{ $site_settings->company_name ?? 'Travel Umroh' }}";

            let finalMsg = `*Assalamualaikum Warahmatullahi Wabarakatuh* %0a%0a`;
            finalMsg += `Yth. Admin *${encodeURIComponent(companyName)}*,%0a`;
            finalMsg += `Perkenalkan, saya ingin berkonsultasi mengenai rencana ibadah Umroh.%0a%0a`;
            finalMsg +=
                ` *Data Diri:*%0a• Nama: ${encodeURIComponent(name)}%0a• Email: ${encodeURIComponent(email)}%0a• No. HP: ${encodeURIComponent(phone)}%0a%0a`;
            finalMsg += ` *Minat Paket:*%0a_${encodeURIComponent(packageSelected)}_%0a%0a`;
            finalMsg += ` *Pesan Tambahan:*%0a"${encodeURIComponent(message)}"%0a%0a`;
            finalMsg += `Mohon informasinya lebih lanjut. Terima kasih.%0a*Jazakumullahu Khairan Katsiran.*`;

            const url = `https://wa.me/${adminPhone}?text=${finalMsg}`;
            window.open(url, '_blank');
        }
    </script>
</body>

</html>
