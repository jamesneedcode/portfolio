// ── Theme Toggle (Dark / Light) ───────────────────────────────
const THEME_KEY = 'portfolio-theme';
const html = document.documentElement;

function applyTheme(theme) {
    html.setAttribute('data-theme', theme);
    localStorage.setItem(THEME_KEY, theme);
}

const themeToggle = document.getElementById('themeToggle');
if (themeToggle) {
    // Apply persisted/default theme immediately
    applyTheme(localStorage.getItem(THEME_KEY) || 'dark');

    themeToggle.addEventListener('click', () => {
        const current = html.getAttribute('data-theme');
        applyTheme(current === 'dark' ? 'light' : 'dark');
    });
}

// ── Navbar scroll effect ──────────────────────────────────────
const navbar = document.getElementById('navbar');
if (navbar) {
    window.addEventListener('scroll', () => {
        navbar.classList.toggle('scrolled', window.scrollY > 50);
    });
}

// ── Mobile nav toggle ─────────────────────────────────────────
const navToggle = document.getElementById('navToggle');
const navLinks  = document.querySelector('.nav-links');
if (navToggle && navLinks) {
    navToggle.addEventListener('click', () => {
        navLinks.classList.toggle('open');
    });
    document.querySelectorAll('.nav-link').forEach(l => {
        l.addEventListener('click', () => navLinks.classList.remove('open'));
    });
}

// ── Reveal on scroll ──────────────────────────────────────────
const revealObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry, i) => {
        if (entry.isIntersecting) {
            setTimeout(() => entry.target.classList.add('visible'), i * 80);
            revealObserver.unobserve(entry.target);
        }
    });
}, { threshold: 0.12 });

document.querySelectorAll('.reveal').forEach(el => revealObserver.observe(el));

// ── Skill bars ────────────────────────────────────────────────
const skillObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.querySelectorAll('.skill-fill').forEach(fill => {
                fill.style.width = fill.dataset.width + '%';
            });
            skillObserver.unobserve(entry.target);
        }
    });
}, { threshold: 0.2 });

document.querySelectorAll('.skills-panel').forEach(el => skillObserver.observe(el));

// ── Project filter ────────────────────────────────────────────
const filterBtns = document.querySelectorAll('.filter-btn');
const projectCards = document.querySelectorAll('.project-card');

filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
        filterBtns.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');

        const filter = btn.dataset.filter;
        projectCards.forEach(card => {
            const match = filter === 'all' || card.dataset.category === filter;
            card.classList.toggle('hidden', !match);
            if (match) {
                card.style.animation = 'none';
                card.offsetHeight; // reflow
                card.style.animation = 'fadeIn 0.4s ease forwards';
            }
        });
    });
});

// ── Smooth scroll for nav anchors ────────────────────────────
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', e => {
        const id = anchor.getAttribute('href');
        const el = document.querySelector(id);
        if (el) {
            e.preventDefault();
            el.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    });
});

// ── Contact form (demo) ───────────────────────────────────────
const contactForm = document.getElementById('contactForm');
const submitBtn   = document.getElementById('submitContactBtn');
if (contactForm) {
    contactForm.addEventListener('submit', e => {
        e.preventDefault();
        submitBtn.textContent = 'Sending…';
        submitBtn.disabled = true;
        setTimeout(() => {
            submitBtn.textContent = '✅ Message Sent!';
            contactForm.reset();
            setTimeout(() => {
                submitBtn.textContent = 'Send Message 🚀';
                submitBtn.disabled = false;
            }, 3000);
        }, 1200);
    });
}
