// Mobile Menu Toggle
const mobileMenuBtn = document.getElementById('mobileMenuBtn');
const navMenu = document.getElementById('navMenu');

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

// Close mobile menu when clicking on a link
document.querySelectorAll('.nav-menu a').forEach(link => {
    link.addEventListener('click', () => {
        navMenu.classList.remove('active');
        const icon = mobileMenuBtn.querySelector('i');
        icon.classList.remove('fa-times');
        icon.classList.add('fa-bars');
    });
});

// Header scroll effect
const header = document.getElementById('header');
window.addEventListener('scroll', () => {
    if (window.scrollY > 100) {
        header.classList.add('scrolled');
    } else {
        header.classList.remove('scrolled');
    }

    // Show/hide scroll to top button
    const scrollToTopBtn = document.getElementById('scrollToTop');
    if (window.scrollY > 300) {
        scrollToTopBtn.classList.add('visible');
    } else {
        scrollToTopBtn.classList.remove('visible');
    }
});

// Scroll to top
document.getElementById('scrollToTop').addEventListener('click', (e) => {
    e.preventDefault();
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});

// Form submission
document.getElementById('contactForm').addEventListener('submit', function (e) {
    e.preventDefault();

    // Show loading animation
    const submitBtn = this.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mengirim...';
    submitBtn.disabled = true;

    // Simulate API call
    setTimeout(() => {
        // Show success message
        submitBtn.innerHTML = '<i class="fas fa-check"></i> Terkirim!';
        submitBtn.style.background = 'linear-gradient(135deg, #10B981, #059669)';

        // Reset form and button
        setTimeout(() => {
            submitBtn.innerHTML = originalText;
            submitBtn.style.background = '';
            submitBtn.disabled = false;
            alert('Terima kasih! Pesan Anda telah berhasil dikirim. Tim kami akan menghubungi Anda dalam waktu 1x24 jam.');
            this.reset();
        }, 2000);
    }, 1500);
});

// Testimonial slider
const testimonialTrack = document.getElementById('testimonialTrack');
const testimonialSlides = document.querySelectorAll('.testimonial-slide');
const prevBtn = document.getElementById('prevBtn');
const nextBtn = document.getElementById('nextBtn');

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

// Animated counter for stats
const statNumbers = document.querySelectorAll('.stat-number');
let animated = false;

function animateCounter(element, target, duration = 2000) {
    let start = 0;
    const increment = target / (duration / 16);
    const timer = setInterval(() => {
        start += increment;
        if (start >= target) {
            element.textContent = target === 98 ? target + '%' : target.toLocaleString();
            clearInterval(timer);
        } else {
            element.textContent = Math.floor(start).toLocaleString();
        }
    }, 16);
}

// Animate stats when in viewport
function checkStatsInView() {
    const statsSection = document.querySelector('.stats');
    const rect = statsSection.getBoundingClientRect();

    if (rect.top < window.innerHeight - 100 && !animated) {
        animateCounter(statNumbers[0], 5000);
        animateCounter(statNumbers[1], 98);
        animateCounter(statNumbers[2], 10);
        animateCounter(statNumbers[3], 200);
        animated = true;
    }
}

window.addEventListener('scroll', checkStatsInView);

// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        const targetId = this.getAttribute('href');
        if (targetId === '#') return;

        const targetElement = document.querySelector(targetId);
        if (targetElement) {
            window.scrollTo({
                top: targetElement.offsetTop - 80,
                behavior: 'smooth'
            });
        }
    });
});

// Create floating icons in hero section
function createFloatingIcons() {
    const floatingIconsContainer = document.getElementById('floatingIcons');
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

// Add hover effects to feature cards
document.querySelectorAll('.feature-card').forEach(card => {
    card.addEventListener('mouseenter', () => {
        const icon = card.querySelector('.feature-icon i');
        icon.style.animation = 'none';
        setTimeout(() => {
            icon.style.animation = 'iconFloat 3s ease-in-out infinite';
        }, 3000);
    });
});

// Add ripple effect to buttons
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
                `;

        this.appendChild(ripple);

        setTimeout(() => {
            ripple.remove();
        }, 600);
    });
});

// Add CSS for ripple animation
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

// Initialize
updateSlider();
checkStatsInView();
createFloatingIcons();
