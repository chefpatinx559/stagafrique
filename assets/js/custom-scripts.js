document.addEventListener('DOMContentLoaded', function() {
    // ── 1. VARIABLES GLOBALES & INITIALISATION ──────────────────────────
    const slides = document.querySelectorAll('.slide');
    const mapElement = document.getElementById('map');
    const form = document.getElementById('multiStepForm');
    const steps = document.querySelectorAll(".form-step");
    const indicators = document.querySelectorAll(".step-indicator");
    const progressLine = document.getElementById("progress-line");
    const nextBtn = document.getElementById("nextBtn");
    const prevBtn = document.getElementById("prevBtn");
    const submitBtn = document.getElementById("submitBtn");
    
    let currentSlide = 0;
    let currentStep = 0;
    let map = null;

    // ── 2. SLIDER HERO ─────────────────────────────────────────────────
    if (slides.length > 0) {
        slides.forEach((s, i) => i === 0 ? s.classList.add('active') : s.classList.remove('active'));
        setInterval(() => {
            slides[currentSlide].classList.remove('active');
            currentSlide = (currentSlide + 1) % slides.length;
            slides[currentSlide].classList.add('active');
        }, 5000);
    }

    // ── 3. CARTE LEAFLET & FILTRAGE ONG ───────────────────────────────
    if (mapElement) {
        map = L.map('map', { scrollWheelZoom: false, zoomControl: false }).setView([7.5399, -5.5470], 7);

        L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png', {
            attribution: '©OpenStreetMap ©CartoDB'
        }).addTo(map);

        const positions = [
            { id: 1, city: "Abidjan",       lat: 5.3600, lng: -4.0083, zone: "abidjan"      },
            { id: 2, city: "Bouaké",        lat: 7.6900, lng: -5.0300, zone: "bouake"       },
            { id: 3, city: "San-Pédro",     lat: 4.7500, lng: -6.6400, zone: "san-pedro"    },
            { id: 4, city: "Yamoussoukro",  lat: 6.8276, lng: -5.1500, zone: "yamoussoukro" },
            { id: 5, city: "Daloa",         lat: 6.8800, lng: -6.4500, zone: "daloa"        },
            { id: 6, city: "Korhogo",       lat: 9.4580, lng: -5.6290, zone: "korhogo"      },
            { id: 7, city: "Man",           lat: 7.4125, lng: -7.5538, zone: "man"          },
            { id: 8, city: "Gagnoa",        lat: 6.1319, lng: -5.9558, zone: "gagnoa"       },
            { id: 9, city: "Abengourou",    lat: 6.7297, lng: -3.4964, zone: "abengourou"   },
            { id: 10, city: "Bondoukou",    lat: 8.0402, lng: -2.8000, zone: "bondoukou"    }
        ];

        function filterONGByZone(zoneName) {
            document.querySelectorAll('.ong-item').forEach(ong => {
                const isVisible = (zoneName === 'all' || !zoneName || ong.getAttribute('data-zone') === zoneName);
                ong.style.display = isVisible ? "flex" : "none";
                ong.style.opacity = isVisible ? "1" : "0";
            });
        }

        filterONGByZone('all');

        positions.forEach(pos => {
            const marker = L.marker([pos.lat, pos.lng]).addTo(map);
            marker.bindPopup(`<b>${pos.city}</b>`);
            marker.on('click', () => {
                map.flyTo([pos.lat, pos.lng], 12, { animate: true, duration: 1.5 });
                filterONGByZone(pos.zone);
                updateActiveCityButton(pos.id);
            });
        });

        function updateActiveCityButton(id) {
            document.querySelectorAll('.city-btn').forEach(b => {
                b.classList.toggle('active', parseInt(b.getAttribute('data-id')) === id);
            });
        }

        document.querySelectorAll('.city-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const cityData = positions.find(p => p.id === parseInt(this.getAttribute('data-id')));
                if (cityData) {
                    map.flyTo([cityData.lat, cityData.lng], 12, { animate: true, duration: 1.5 });
                    filterONGByZone(cityData.zone);
                    updateActiveCityButton(cityData.id);
                }
            });
        });

        const refreshMap = () => { if (map) map.invalidateSize(); };
        setTimeout(refreshMap, 500);
        setTimeout(refreshMap, 1500);
        window.addEventListener('resize', refreshMap);
    }

    // ── 4. FORMULAIRE MULTI-STEP & VALIDATION ─────────────────────────
    if (form && steps.length > 0) {
        function validateStep(stepIndex) {
            let stepValid = true;
            const fields = steps[stepIndex].querySelectorAll('[required]');
            fields.forEach(field => {
                const isInvalid = !field.value.trim() || (field.type === 'email' && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(field.value));
                if (isInvalid) {
                    stepValid = false;
                    field.style.borderColor = "var(--orange)";
                } else {
                    field.style.borderColor = "#dee2e6";
                }
            });
            return stepValid;
        }

        function updateForm() {
            steps.forEach((step, i) => step.style.display = (i === currentStep) ? "block" : "none");
            indicators.forEach((ind, i) => {
                ind.style.background = (i <= currentStep) ? "var(--orange)" : "white";
                ind.style.color = (i <= currentStep) ? "white" : "#333";
                ind.style.border = `2px solid ${i <= currentStep ? 'var(--orange)' : '#eee'}`;
            });
            if(progressLine) progressLine.style.width = (currentStep / (steps.length - 1)) * 100 + "%";
            
            if(prevBtn) prevBtn.style.display = (currentStep === 0) ? "none" : "block";
            if(nextBtn) nextBtn.style.display = (currentStep === steps.length - 1) ? "none" : "block";
            if(submitBtn) submitBtn.style.display = (currentStep === steps.length - 1) ? "block" : "none";
        }

        if(nextBtn) {
            nextBtn.addEventListener("click", (e) => {
                e.preventDefault();
                if (validateStep(currentStep)) {
                    currentStep++;
                    updateForm();
                    window.scrollTo({ top: form.offsetTop - 100, behavior: 'smooth' });
                }
            });
        }

        if(prevBtn) {
            prevBtn.addEventListener("click", () => {
                if (currentStep > 0) {
                    currentStep--;
                    updateForm();
                }
            });
        }

        form.addEventListener('submit', (e) => {
            if (currentStep < steps.length - 1 || !validateStep(currentStep)) {
                e.preventDefault();
            } else {
                alert('Inscription enregistrée !');
            }
        });

        updateForm();
    }

    // ── 5. ANIMATIONS REVEAL (INTERSECTION OBSERVER) ──────────────────
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
            }
        });
    }, { threshold: 0.15 });

    document.querySelectorAll('.reveal, .ong-item, .ong-card, section').forEach((el, index) => {
        if (!el.classList.contains('reveal')) el.classList.add('reveal');
        el.style.transitionDelay = (index % 3 * 0.1) + 's';
        revealObserver.observe(el);
    });

    // ── 6. FAQ & ACCORDION ───────────────────────────────────────────
    document.querySelectorAll('.faq-question').forEach(question => {
        question.addEventListener('click', () => {
            const currentItem = question.parentElement;
            document.querySelectorAll('.faq-item').forEach(item => {
                if (item !== currentItem) {
                    item.classList.remove('open');
                }
            });
            currentItem.classList.toggle('open');
        });
    });

    // ── 7. PHONE CODE AUTO-SET ──────────────────────────────────────
    const natSelect = document.getElementById('natSelect');
    const phoneInput = document.getElementById('phoneInput');
    if (natSelect && phoneInput) {
        natSelect.addEventListener('change', function() {
            const code = this.options[this.selectedIndex].getAttribute('data-code');
            if (code) phoneInput.value = code + " ";
        });
    }
});

// Gestion dropdown mobile
if (window.innerWidth <= 992) {
    document.querySelectorAll('.dropdown-toggle').forEach(toggle => {
        toggle.addEventListener('click', function(e) {
            const dropdown = this.parentElement;
            const wasActive = dropdown.classList.contains('active');
            document.querySelectorAll('.dropdown').forEach(d => d.classList.remove('active'));
            if (!wasActive) {
                dropdown.classList.add('active');
            }
        });
    });
    
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.dropdown')) {
            document.querySelectorAll('.dropdown').forEach(d => d.classList.remove('active'));
        }
    });
}

// Menu hamburger mobile
const menuToggle = document.querySelector('.menu-toggle');
const navLinks = document.querySelector('.nav-links');

if (menuToggle && navLinks) {
    menuToggle.addEventListener('click', () => {
        navLinks.classList.toggle('active');
        const icon = menuToggle.querySelector('i');
        if (icon) {
            icon.classList.toggle('fa-bars');
            icon.classList.toggle('fa-times');
        }
    });

    navLinks.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            navLinks.classList.remove('active');
            const icon = menuToggle.querySelector('i');
            if (icon) {
                icon.classList.add('fa-bars');
                icon.classList.remove('fa-times');
            }
        });
    });
}
