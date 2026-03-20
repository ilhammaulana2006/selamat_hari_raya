// Data hari raya
const holidayData = {
    'nyepi': {
        'icon': 'fas fa-moon',
        'title': 'Hari Raya Nyepi 1948 Saka',
        'color': '#4ECDC4',
        'body': `<p><strong>Hari Raya Nyepi</strong> adalah hari suci terpenting bagi umat Hindu Bali yang jatuh pada tanggal 1 hari baru Saka.</p><br><p><strong>Catur Brata Penyepian:</strong></p><ul><li><i class="fas fa-ban" style="color: #FF6B6B;"></i> <strong>Amati Kerta Parwa</strong> - Menjaga kesucian</li><li><i class="fas fa-eye-slash" style="color: #4ECDC4;"></i> <strong>Amati Geni</strong> - Tidak menyalakan api</li><li><i class="fas fa-volume-mute" style="color: #45B7D1;"></i> <strong>Amati Lelanguan</strong> - Tidak beraktivitas</li><li><i class="fas fa-home" style="color: #96CEB4;"></i> <strong>Amati Ngejot</strong> - Tidak bergaul</li></ul><p>Semoga Nyepi membawa kedamaian dan kesucian bagi kita semua 🙏</p>`
    },
    'idulfitri': {
        'icon': 'fas fa-mosque',
        'title': 'Idul Fitri 1447 H',
        'color': '#FFD700',
        'body': `<p><strong>Idul Fitri</strong> atau <em>Hari Raya Puasa</em> adalah hari kemenangan umat Islam setelah sebulan penuh menjalankan ibadah puasa Ramadhan.</p><br><p><strong>Makna Idul Fitri:</strong></p><ul><li><i class="fas fa-praying-hands" style="color: #FFD700;"></i> Kembali suci seperti bayi yang baru lahir</li><li><i class="fas fa-handshake" style="color: #FFA500;"></i> Saling memaafkan lahir dan batin</li><li><i class="fas fa-users" style="color: #FF6347;"></i> Mempererat tali silaturahmi</li><li><i class="fas fa-gift" style="color: #00CED1;"></i> Berbagi kebahagiaan dan rezeki</li></ul><p><strong>Taqabbalallahu minna wa minkum!</strong> 🎉</p>`
    }
};

// Audio elements
const idulFitriAudio = document.getElementById('idulFitriAudio');
const nyepiAudio = document.getElementById('nyepiAudio');

// Create custom cursor
function createCursor() {
    const cursor = document.createElement('div');
    cursor.className = 'cursor';
    document.body.appendChild(cursor);
    
    const follower = document.createElement('div');
    follower.className = 'cursor follower';
    document.body.appendChild(follower);
    
    return { cursor, follower };
}

// Create floating particles and stars
function createParticles() {
    const particlesContainer = document.getElementById('particles');
    const starsContainer = document.getElementById('stars');
    const types = ['particle', 'particle gold', 'particle moon'];
    
    // Initial particles
    for (let i = 0; i < 80; i++) {
        const particle = document.createElement('div');
        particle.className = types[Math.floor(Math.random() * types.length)];
        particle.style.left = Math.random() * 100 + '%';
        particle.style.width = Math.random() * 8 + 2 + 'px';
        particle.style.height = particle.style.width;
        particle.style.animationDuration = (Math.random() * 8 + 8) + 's';
        particle.style.animationDelay = Math.random() * 5 + 's';
        particlesContainer.appendChild(particle);
    }
    
    // Stars
    for (let i = 0; i < 100; i++) {
        const star = document.createElement('div');
        star.className = 'star';
        star.style.left = Math.random() * 100 + '%';
        star.style.top = Math.random() * 100 + '%';
        star.style.animationDelay = Math.random() * 2 + 's';
        starsContainer.appendChild(star);
    }
}

// Continuous particle generation
function generateParticles() {
    setInterval(() => {
        const particle = document.createElement('div');
        particle.className = 'particle';
        particle.style.left = Math.random() * 100 + '%';
        particle.style.width = Math.random() * 5 + 1 + 'px';
        particle.style.height = particle.style.width;
        particle.style.animationDuration = (Math.random() * 6 + 6) + 's';
        document.getElementById('particles').appendChild(particle);
        
        setTimeout(() => particle.remove(), 12000);
    }, 600);
}

// Modal functions with audio
function openModal(type) {
    const modal = document.getElementById('holidayModal');
    const data = holidayData[type];
    const card = event.currentTarget;
    
    // Play audio based on holiday type
    if (type === 'idulfitri') {
        idulFitriAudio.currentTime = 0;
        idulFitriAudio.play().catch(e => console.log('Audio play failed:', e));
        // Add special effects for Idul Fitri
        document.body.style.background = 'linear-gradient(135deg, #FFD700 0%, #FFA500 50%, #FF6B6B 100%)';
        createFireworks();
    } else {
        nyepiAudio.currentTime = 0;
        nyepiAudio.play().catch(e => console.log('Audio play failed:', e));
    }
    
    // Update modal content
    document.getElementById('modalIcon').innerHTML = `<i class="${data.icon}"></i>`;
    document.getElementById('modalTitle').textContent = data.title;
    document.getElementById('modalTitle').style.color = data.color;
    document.getElementById('modalBody').innerHTML = data.body;
    
    // Show modal
    modal.classList.add('active');
    document.body.classList.add('modal-open');
    
    // Card click effect
    card.classList.add('clicked');
    setTimeout(() => card.classList.remove('clicked'), 1000);
}

function closeModal() {
    document.getElementById('holidayModal').classList.remove('active');
    document.body.classList.remove('modal-open');
    
    // Stop audio and reset background
    idulFitriAudio.pause();
    nyepiAudio.pause();
    document.body.style.background = '';
}

// Fireworks effect for Idul Fitri
function createFireworks() {
    for (let i = 0; i < 20; i++) {
        setTimeout(() => {
            const firework = document.createElement('div');
            firework.style.cssText = `
                position: fixed;
                left: ${Math.random() * 100}vw;
                top: 100vh;
                width: 6px; height: 6px;
                background: radial-gradient(circle, ${['#FFD700', '#FFA500', '#FF6B6B', '#4ECDC4'][Math.floor(Math.random()*4)]}, transparent);
                border-radius: 50%;
                pointer-events: none;
                z-index: 1000;
                animation: firework 2s ease-out forwards;
            `;
            document.body.appendChild(firework);
            setTimeout(() => firework.remove(), 2000);
        }, i * 100);
    }
}

// Add CSS for fireworks
const style = document.createElement('style');
style.textContent = `
    @keyframes firework {
        0% { transform: translateY(0) scale(0); opacity: 1; }
        100% { transform: translateY(-100vh) scale(1); opacity: 0; }
    }
`;
document.head.appendChild(style);

// Event listeners
document.getElementById('holidayModal').addEventListener('click', e => {
    if (e.target === e.currentTarget) closeModal();
});

document.addEventListener('keydown', e => {
    if (e.key === 'Escape') closeModal();
});

// Custom cursor movement
let cursor, follower;
function initCursor() {
    const elements = createCursor();
    cursor = elements.cursor;
    follower = elements.follower;
    
    document.addEventListener('mousemove', e => {
        cursor.style.left = e.clientX + 'px';
        cursor.style.top = e.clientY + 'px';
        follower.style.left = e.clientX + 'px';
        follower.style.top = e.clientY + 'px';
    });
    
    // Hover effects
    document.querySelectorAll('.holiday-card, .cta-button, .modal-close').forEach(el => {
        el.addEventListener('mouseenter', () => {
            cursor.style.transform = 'scale(2)';
            follower.style.transform = 'scale(1.5)';
        });
        el.addEventListener('mouseleave', () => {
            cursor.style.transform = 'scale(1)';
            follower.style.transform = 'scale(1)';
        });
    });
}

// Enhanced share functions
function shareMainMessage() {
    const message = `🌙 Selamat Hari Idul Fitri 1447 H & Nyepi 1948 Saka! ✨

✨ Taqabbalallahu minna wa minkum ✨
Mohon maaf lahir dan batin 🕌🕉️

Semoga berkah selalu menyertai kita semua! 🎉
#HariRaya #IdulFitri #Nyepi #Lebaran`;
    
    shareContent('Selamat Hari Raya!', message, window.location.href);
    createShareEffect(event.target.closest('.cta-button'));
}

function shareHoliday() {
    const activeModalTitle = document.getElementById('modalTitle').textContent;
    const modalBody = document.getElementById('modalBody').textContent;
    const message = `🌟 ${activeModalTitle} 🌟

${modalBody.substring(0, 200)}...

Selamat Hari Raya! 🙏 #HariRaya #IdulFitri #Nyepi`;
    
    shareContent(activeModalTitle, message, window.location.href);
    closeModal();
}

function shareContent(title, text, url) {
    if (navigator.share) {
        navigator.share({ 
            title: title, 
            text: text, 
            url: url 
        }).catch(err => {
            fallbackCopy(text);
        });
    } else {
        fallbackCopy(text);
    }
}

function fallbackCopy(text) {
    navigator.clipboard.writeText(text).then(() => {
        createCopyEffect(event.target.closest('.cta-button'));
    }).catch(() => {
        alert('Ucapan disalin ke clipboard! 📋');
    });
}

// Visual effects
function createShareEffect(button) {
    const originalText = button.innerHTML;
    button.innerHTML = '<i class="fas fa-check-circle"></i> ✅ Tersalin & Dibagikan!';
    button.style.background = 'linear-gradient(45deg, #4CAF50, #45a049)';
    button.style.transform = 'scale(1.1)';
    
    setTimeout(() => {
        button.innerHTML = originalText;
        button.style.background = '';
        button.style.transform = '';
    }, 2500);
}

function createCopyEffect(button) {
    const originalText = button.innerHTML;
    button.innerHTML = '<i class="fas fa-check"></i> ✅ Tersalin!';
    button.style.background = 'linear-gradient(45deg, #4CAF50, #45a049)';
    
    setTimeout(() => {
        button.innerHTML = originalText;
        button.style.background = '';
    }, 2000);
}

// Mouse parallax and tilt effect
function initParallax() {
    document.addEventListener('mousemove', e => {
        const mouseX = (e.clientX / window.innerWidth) * 2 - 1;
        const mouseY = (e.clientY / window.innerHeight) * 2 - 1;
        
        const cards = document.querySelectorAll('.holiday-card');
        cards.forEach((card, index) => {
            const speed = (index + 1) * 0.03;
            card.style.transform = `
                translate(${mouseX * 30}px, ${mouseY * 30}px)
                rotateY(${mouseX * 10}deg)
                rotateX(${mouseY * -10}deg)
            `;
        });
        
        // Title parallax
        const title = document.querySelector('.title');
        title.style.transform = `translate(${mouseX * 10}px, ${mouseY * 10}px)`;
    });
}

// Intersection Observer for animations
function initScrollAnimations() {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1 });
    
    document.querySelectorAll('.holiday-card').forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(50px)';
        observer.observe(card);
    });
}

// PWA install prompt
let deferredPrompt;
window.addEventListener('beforeinstallprompt', (e) => {
    e.preventDefault();
    deferredPrompt = e;
});

// Confetti effect on load
function createConfetti() {
    for (let i = 0; i < 50; i++) {
        setTimeout(() => {
            const confetti = document.createElement('div');
            confetti.style.cssText = `
                position: fixed;
                left: ${Math.random() * 100}vw;
                top: -10px;
                width: 10px; height: 10px;
                background: ${['#FFD700', '#FFA500', '#FF6B6B', '#4ECDC4', '#667eea'][Math.floor(Math.random()*5)]};
                border-radius: 50%;
                pointer-events: none;
                z-index: 100;
                animation: confettiFall 3s linear forwards;
            `;
            document.body.appendChild(confetti);
            setTimeout(() => confetti.remove(), 3000);
        }, i * 50);
    }
}

// Add confetti CSS
const confettiStyle = document.createElement('style');
confettiStyle.textContent = `
    @keyframes confettiFall {
        0% { 
            transform: translateY(-100vh) rotate(0deg); 
            opacity: 1; 
        }
        100% { 
            transform: translateY(100vh) rotate(720deg); 
            opacity: 0; 
        }
    }
`;
document.head.appendChild(confettiStyle);

// Initialize everything
window.addEventListener('load', () => {
    createParticles();
    generateParticles();
    initCursor();
    initParallax();
    initScrollAnimations();
    createConfetti();
    
    // Preload audio
    idulFitriAudio.load();
    nyepiAudio.load();
    
    // Page transition
    document.body.style.opacity = '0';
    document.body.style.transition = 'opacity 1s ease';
    setTimeout(() => {
        document.body.style.opacity = '1';
    }, 100);
});

// Service Worker registration for PWA
if ('serviceWorker' in navigator) {
    window.addEventListener('load', () => {
        navigator.serviceWorker.register('/sw.js')
            .then(reg => console.log('SW registered'))
            .catch(err => console.log('SW registration failed'));
    });
}

// Prevent context menu on long press
document.addEventListener('contextmenu', e => e.preventDefault());
