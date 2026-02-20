document.addEventListener('DOMContentLoaded', function () {

    /* =========================================
       1. SMOOTH SCROLL & URL CLEANER (PRIORITAS UTAMA)
       ========================================= */
    const navMenu = document.getElementById('navMenu');
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');

    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            const targetId = this.getAttribute('href');
            if (targetId === '#') return;

            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                // Hitung offset header (sesuaikan 80 dengan tinggi header Anda)
                const headerOffset = 80;
                const elementPosition = targetElement.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                // Lakukan scroll halus
                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });

                // Tutup mobile menu jika sedang terbuka
                if (navMenu && navMenu.classList.contains('active')) {
                    navMenu.classList.remove('active');
                    if (mobileMenuBtn) {
                        const icon = mobileMenuBtn.querySelector('i');
                        if (icon) {
                            icon.classList.remove('fa-times');
                            icon.classList.add('fa-bars');
                        }
                    }
                }
            }
        });
    });

    /* =========================================
       2. MOBILE MENU TOGGLE
       ========================================= */
    if (mobileMenuBtn && navMenu) {
        mobileMenuBtn.addEventListener('click', () => {
            navMenu.classList.toggle('active');
            const icon = mobileMenuBtn.querySelector('i');
            if (navMenu.classList.contains('active')) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
            } else {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });
    }

    /* =========================================
       3. HEADER SCROLL EFFECT & BACK TO TOP
       ========================================= */
    const header = document.getElementById('header');
    const scrollToTopBtn = document.getElementById('scrollToTop');

    window.addEventListener('scroll', () => {
        // Header Effect
        if (header) {
            if (window.scrollY > 100) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        }

        // Show/hide scroll to top button
        if (scrollToTopBtn) {
            if (window.scrollY > 300) {
                scrollToTopBtn.classList.add('visible');
            } else {
                scrollToTopBtn.classList.remove('visible');
            }
        }
    });

    // Scroll to top action
    if (scrollToTopBtn) {
        scrollToTopBtn.addEventListener('click', (e) => {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    /* =========================================
       4. TESTIMONIAL SLIDER (SAFE MODE)
       ========================================= */
    const testimonialTrack = document.getElementById('testimonialTrack');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');

    // Cek apakah elemen ada sebelum menjalankan logika slider
    if (testimonialTrack && prevBtn && nextBtn) {
        const testimonialSlides = document.querySelectorAll('.testimonial-slide');
        let currentSlide = 0;
        const totalSlides = testimonialSlides.length;

        function updateSlider() {
            testimonialTrack.style.transform = `translateX(-${currentSlide * 100}%)`;
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % totalSlides;
            updateSlider();
        }

        function prevSlide() {
            currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
            updateSlider();
        }

        prevBtn.addEventListener('click', prevSlide);
        nextBtn.addEventListener('click', nextSlide);

        // Auto slide every 5 seconds
        setInterval(nextSlide, 5000);

        // Init
        updateSlider();
    }

    /* =========================================
       5. ANIMATED STATS (SAFE MODE)
       ========================================= */
    const statsSection = document.querySelector('.stats');
    const statNumbers = document.querySelectorAll('.stat-number');

    if (statsSection && statNumbers.length > 0) {
        let animated = false;

        function animateCounter(element) {
            const target = parseInt(element.getAttribute('data-target')) || 0;
            const suffix = element.getAttribute('data-suffix') || ''; // Ambil % atau +

            const duration = 2000;
            const increment = target / (duration / 16);

            let current = 0;
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    element.textContent = target.toLocaleString() + suffix;
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(current).toLocaleString() + suffix;
                }
            }, 16);
        }

        function checkStatsInView() {
            const rect = statsSection.getBoundingClientRect();
            if (rect.top < window.innerHeight - 100 && !animated) {
                statNumbers.forEach(stat => animateCounter(stat));
                animated = true;
            }
        }

        window.addEventListener('scroll', checkStatsInView);
        checkStatsInView();
    }

    /* =========================================
       6. FLOATING ICONS HERO SECTION
       ========================================= */
    const floatingIconsContainer = document.getElementById('floatingIcons');

    if (floatingIconsContainer) {
        const icons = ['fas fa-mosque', 'fas fa-star', 'fas fa-moon', 'fas fa-pray', 'fas fa-hands-praying',
            'fas fa-book-quran', 'fas fa-hands', 'fas fa-heart', 'fas fa-dove', 'fas fa-gem'];

        for (let i = 0; i < 20; i++) {
            const icon = document.createElement('div');
            icon.className = 'floating-icon';
            icon.innerHTML = `<i class="${icons[Math.floor(Math.random() * icons.length)]}"></i>`;

            // Random position
            icon.style.left = `${Math.random() * 100}%`;
            icon.style.top = `${Math.random() * 100}%`;

            // Random animation delay and duration
            const delay = Math.random() * 15;
            const duration = 15 + Math.random() * 10;
            icon.style.animationDelay = `${delay}s`;
            icon.style.animationDuration = `${duration}s`;

            // Random size
            const size = 16 + Math.random() * 20;
            icon.style.fontSize = `${size}px`;

            floatingIconsContainer.appendChild(icon);
        }
    }

    /* =========================================
       7. FEATURE CARD HOVER
       ========================================= */
    document.querySelectorAll('.feature-card').forEach(card => {
        card.addEventListener('mouseenter', () => {
            const icon = card.querySelector('.feature-icon i');
            if (icon) {
                icon.style.animation = 'none';
                setTimeout(() => {
                    icon.style.animation = 'iconFloat 3s ease-in-out infinite';
                }, 3000); // Wait for potential existing transition
            }
        });
    });

    /* =========================================
       8. BUTTON RIPPLE EFFECT
       ========================================= */
    // Add CSS for ripple animation dynamically
    const style = document.createElement('style');
    style.textContent = `
        @keyframes ripple {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }
    `;
    document.head.appendChild(style);

    document.querySelectorAll('.btn').forEach(button => {
        button.addEventListener('click', function (e) {
            const ripple = document.createElement('span');
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;

            ripple.style.cssText = `
                position: absolute;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.6);
                transform: scale(0);
                animation: ripple 0.6s linear;
                width: ${size}px;
                height: ${size}px;
                top: ${y}px;
                left: ${x}px;
                pointer-events: none;
            `;

            this.appendChild(ripple);

            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });

});
