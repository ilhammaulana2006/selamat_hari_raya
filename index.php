<?php
session_start();

// Data hari raya
$holidays = [
    'nyepi' => [
        'icon' => 'fas fa-moon',
        'title' => 'Hari Raya Nyepi 1948 Saka',
        'color' => '#4ECDC4',
        'body' => '<p><strong>Hari Raya Nyepi</strong> adalah hari suci terpenting bagi umat Hindu Bali yang jatuh pada tanggal 1 hari baru Saka.</p><br><p><strong>Catur Brata Penyepian:</strong></p><ul style="text-align: left; margin: 20px 0;"><li><i class="fas fa-ban" style="color: #FF6B6B;"></i> <strong>Amati Kerta Parwa</strong> - Menjaga kesucian</li><li><i class="fas fa-eye-slash" style="color: #4ECDC4;"></i> <strong>Amati Geni</strong> - Tidak menyalakan api</li><li><i class="fas fa-volume-mute" style="color: #45B7D1;"></i> <strong>Amati Lelanguan</strong> - Tidak beraktivitas</li><li><i class="fas fa-home" style="color: #96CEB4;"></i> <strong>Amati Ngejot</strong> - Tidak bergaul</li></ul><p>Semoga Nyepi membawa kedamaian dan kesucian bagi kita semua 🙏</p>'
    ],
    'idulfitri' => [
        'icon' => 'fas fa-mosque',
        'title' => 'Idul Fitri 1447 H',
        'color' => '#FFD700',
        'body' => '<p><strong>Idul Fitri</strong> atau <em>Hari Raya Puasa</em> adalah hari kemenangan umat Islam setelah sebulan penuh menjalankan ibadah puasa Ramadhan.</p><br><p><strong>Makna Idul Fitri:</strong></p><ul style="text-align: left; margin: 20px 0;"><li><i class="fas fa-praying-hands" style="color: #FFD700;"></i> Kembali suci seperti bayi yang baru lahir</li><li><i class="fas fa-handshake" style="color: #FFA500;"></i> Saling memaafkan lahir dan batin</li><li><i class="fas fa-users" style="color: #FF6347;"></i> Mempererat tali silaturahmi</li><li><i class="fas fa-gift" style="color: #00CED1;"></i> Berbagi kebahagiaan dan rezeki</li></ul><p><strong>Taqabbalallahu minna wa minkum!</strong> 🎉</p>'
    ]
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🌙 Selamat Hari Idul Fitri & Nyepi 1447 H 🌙</title>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: 'Poppins', sans-serif; 
            overflow-x: hidden; 
            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%); 
            min-height: 100vh; 
            position: relative;
        }
        body.modal-open { overflow: hidden; }
        
        /* Floating Particles */
        .particles { position: fixed; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; z-index: 1; }
        .particle { 
            position: absolute; 
            background: rgba(255,255,255,0.6); 
            border-radius: 50%; 
            animation: float 8s infinite linear; 
        }
        .particle.gold { background: rgba(255,215,0,0.6); }
        .particle.moon { 
            width: 30px; height: 30px; 
            border-radius: 50%; 
            box-shadow: 0 0 20px rgba(255,215,0,0.8);
            clip-path: polygon(20% 0%, 100% 0%, 100% 70%, 60% 70%, 40% 50%, 20% 60%);
        }
        @keyframes float { 
            0%{transform:translateY(100vh) rotate(0deg);opacity:0;} 
            10%{opacity:1;} 
            90%{opacity:1;} 
            100%{transform:translateY(-100px) rotate(360deg);opacity:0;} 
        }
        
        .container { max-width: 1200px; margin: 0 auto; padding: 20px; position: relative; z-index: 10; }
        
        /* Header */
        .header { text-align: center; margin-bottom: 60px; }
        .title { 
            font-family: 'Dancing Script', cursive; 
            font-size: clamp(3.5rem, 10vw, 7rem); 
            font-weight: 700;
            background: linear-gradient(45deg, #FFD700, #FFA500, #FF6B6B, #4ECDC4);
            -webkit-background-clip: text; 
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 20px; 
            text-shadow: 2px 2px 8px rgba(0,0,0,0.3); 
            animation: glow 3s ease-in-out infinite alternate;
            position: relative;
        }
        @keyframes glow { 
            from{filter:drop-shadow(0 0 15px #FFD700);} 
            to{filter:drop-shadow(0 0 30px #FFA500);} 
        }
        .subtitle { 
            font-size: clamp(1.3rem, 4vw, 2rem); 
            color: rgba(255,255,255,0.95); 
            font-weight: 300; 
            margin-bottom: 10px;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
        }
        .date { font-size: 1.1rem; color: #FFD700; font-weight: 500; }
        
        /* Main Greeting Card */
        .greeting-card { 
            background: rgba(255,255,255,0.12); 
            backdrop-filter: blur(25px); 
            border-radius: 40px; 
            padding: 80px 60px;
            text-align: center; 
            box-shadow: 0 35px 70px rgba(0,0,0,0.25); 
            border: 1px solid rgba(255,255,255,0.2);
            position: relative; 
            overflow: hidden;
            animation: slideUp 1.2s ease-out;
            max-width: 800px;
            margin: 0 auto 60px;
        }
        .greeting-card::before {
            content: '';
            position: absolute;
            top: -50%; left: -50%;
            width: 200%; height: 200%;
            background: radial-gradient(circle, rgba(255,215,0,0.1) 0%, transparent 70%);
            animation: rotate 20s linear infinite;
        }
        @keyframes rotate { 0%{transform:rotate(0deg);}100%{transform:rotate(360deg);} }
        @keyframes slideUp { from{opacity:0;transform:translateY(60px);}to{opacity:1;transform:translateY(0);} }
        
        .main-greeting { 
            font-size: clamp(1.8rem, 5vw, 3rem); 
            color: white; 
            margin-bottom: 40px; 
            line-height: 1.4;
            position: relative;
            z-index: 2;
            text-shadow: 2px 2px 6px rgba(0,0,0,0.3);
        }
        .main-greeting strong { 
            background: linear-gradient(45deg, #FFD700, #FFA500); 
            -webkit-background-clip: text; 
            -webkit-text-fill-color: transparent;
            font-weight: 700;
        }
        
        /* Holiday Cards */
        .holiday-section { 
            display: grid; 
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); 
            gap: 35px; 
            margin: 60px 0; 
        }
        
        .holiday-card { 
            background: rgba(255,255,255,0.1); 
            backdrop-filter: blur(20px); 
            border-radius: 25px; 
            padding: 40px 30px;
            border: 1px solid rgba(255,255,255,0.25); 
            transition: all .4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            position: relative; 
            overflow: hidden;
            cursor: pointer;
            text-align: center;
        }
        .holiday-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0;
            right: 0; bottom: 0;
            background: linear-gradient(135deg, transparent 0%, rgba(255,255,255,0.1) 100%);
            opacity: 0;
            transition: opacity .3s ease;
        }
        .holiday-card:hover { 
            transform: translateY(-15px) scale(1.03); 
            box-shadow: 0 30px 60px rgba(0,0,0,0.35); 
            border-color: rgba(255,255,255,0.4);
        }
        .holiday-card:hover::before { opacity: 1; }
        .holiday-card.clicked { animation: pulse 0.8s ease-in-out; }
        @keyframes pulse { 
            0%{transform:scale(1);} 
            50%{transform:scale(1.08);} 
            100%{transform:scale(1);} 
        }
        
        .holiday-icon { 
            font-size: 5rem; 
            margin-bottom: 25px; 
            background: linear-gradient(45deg, #FFD700, #FFA500, #FF6B6B); 
            -webkit-background-clip: text; 
            -webkit-text-fill-color: transparent;
            filter: drop-shadow(0 0 20px rgba(255,215,0,0.5));
        }
        .holiday-title { 
            font-size: 1.8rem; 
            font-weight: 700; 
            color: white; 
            margin-bottom: 20px;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
        }
        .holiday-desc { 
            color: rgba(255,255,255,0.9); 
            line-height: 1.7; 
            font-size: 1.1rem;
        }
        
        /* Modal */
        .modal { 
            display: none; 
            position: fixed; 
            top: 0; left: 0; 
            width: 100%; 
            height: 100%; 
            background: rgba(0,0,0,0.85); 
            backdrop-filter: blur(15px); 
            z-index: 1000; 
            opacity: 0; 
            transition: all .4s ease; 
        }
        .modal.active { display: flex; align-items: center; justify-content: center; opacity: 1; }
        .modal-content { 
            background: rgba(255,255,255,0.98); 
            backdrop-filter: blur(30px); 
            border-radius: 30px; 
            max-width: 95%; 
            max-height: 95%; 
            width: 700px; 
            padding: 50px; 
            position: relative; 
            transform: scale(0.8); 
            transition: all .4s ease; 
            box-shadow: 0 40px 80px rgba(0,0,0,0.5);
        }
        .modal.active .modal-content { transform: scale(1); }
        .modal-header { text-align: center; margin-bottom: 40px; }
        .modal-icon { font-size: 6rem; margin-bottom: 25px; background: linear-gradient(45deg, #FFD700, #FFA500); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .modal-title { font-size: 2.5rem; font-weight: 700; color: #2c3e50; margin-bottom: 15px; }
        .modal-close { 
            position: absolute; top: 25px; right: 30px; 
            font-size: 2.2rem; color: #95a5a6; 
            cursor: pointer; transition: all .3s ease; 
            width: 50px; height: 50px; 
            display: flex; align-items: center; justify-content: center; 
            border-radius: 50%; 
        }
        .modal-close:hover { background: rgba(0,0,0,0.1); color: #2c3e50; transform: rotate(90deg); }
        .modal-body { color: #34495e; line-height: 1.8; font-size: 1.15rem; }
        .modal-footer { text-align: center; margin-top: 40px; padding-top: 30px; border-top: 2px solid #ecf0f1; }
        
        /* CTA Buttons */
        .cta-button { 
            display: inline-block; 
            background: linear-gradient(45deg, #FFD700, #FFA500); 
            color: #2c3e50; 
            padding: 18px 50px; 
            border-radius: 50px; 
            text-decoration: none; 
            font-weight: 700; 
            font-size: 1.2rem; 
            transition: all .3s ease; 
            box-shadow: 0 15px 35px rgba(255,215,0,0.4);
            position: relative;
            overflow: hidden;
        }
        .cta-button:hover { 
            transform: translateY(-5px); 
            box-shadow: 0 25px 50px rgba(255,215,0,0.6); 
            color: #2c3e50;
        }
        .cta-button::before {
            content: '';
            position: absolute;
            top: 0; left: -100%;
            width: 100%; height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
            transition: left .5s;
        }
        .cta-button:hover::before { left: 100%; }
        
        /* Footer */
        .footer { 
            text-align: center; 
            margin-top: 80px; 
            color: rgba(255,255,255,0.85); 
            font-size: 1rem; 
        }
        .footer p { margin-bottom: 10px; }
        .footer small { opacity: 0.7; }
        
        /* Responsive */
        @media (max-width: 768px) { 
            .container { padding: 15px; }
            .greeting-card { padding: 50px 30px; margin-bottom: 40px; }
            .holiday-section { grid-template-columns: 1fr; gap: 25px; }
            .modal-content { width: 95%; padding: 40px 25px; margin: 20px; }
            .modal-title { font-size: 2rem; }
            .holiday-card { padding: 30px 25px; }
        }
    </style>
</head>
<body>
    <!-- Floating Particles -->
    <div class="particles" id="particles"></div>

    <!-- Modal -->
    <div class="modal" id="holidayModal">
        <div class="modal-content">
            <div class="modal-close" onclick="closeModal()">
                <i class="fas fa-times"></i>
            </div>
            <div class="modal-header">
                <div class="modal-icon" id="modalIcon"></div>
                <h2 class="modal-title" id="modalTitle"></h2>
            </div>
            <div class="modal-body" id="modalBody"></div>
            <div class="modal-footer">
                <a href="#" class="cta-button" onclick="shareHoliday()">
                    <i class="fas fa-share-alt"></i> Bagikan Ucapan Ini
                </a>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- Header -->
        <header class="header">
            <h1 class="title">🌙 Selamat Hari Raya 🌙</h1>
            <p class="subtitle">Idul Fitri 1447 H & Nyepi 1948 Saka</p>
            <div class="date">
                <i class="fas fa-calendar-alt"></i> 18-24 maret 2026
            </div>
        </header>

        <!-- Main Greeting Card -->
        <section class="greeting-card">
            <div class="main-greeting">
                <div>✨ Taqabbalallahu minna wa minkum ✨</div>
                <strong>Selamat Hari Idul Fitri</strong><br>
                Mohon Maaf Lahir & Batin 🙏<br>
                <small style="font-size: 1.2rem; opacity: 0.9;">Semoga berkah selalu menyertai kita</small>
            </div>
            
            <div class="holiday-section">
                                <!-- Nyepi Card -->
                <div class="holiday-card" onclick="openModal('nyepi')">
                    <div class="holiday-icon"><i class="fas fa-moon"></i></div>
                    <h3 class="holiday-title">Hari Raya Nyepi</h3>
                    <p class="holiday-desc">Hari suci umat Hindu Bali dengan penuh kesunyian dan refleksi spiritual</p>
                </div>

                <!-- Idul Fitri Card -->
                <div class="holiday-card" onclick="openModal('idulfitri')">
                    <div class="holiday-icon"><i class="fas fa-mosque"></i></div>
                    <h3 class="holiday-title">Idul Fitri 1447 H</h3>
                    <p class="holiday-desc">Hari kemenangan umat Islam setelah sebulan penuh ibadah Ramadhan</p>
                </div>
            </div>

            <!-- Main CTA -->
            <a href="#" class="cta-button" onclick="shareMainMessage()">
                <i class="fas fa-share-alt"></i> Bagikan Ucapan Selamat Hari Raya
            </a>
        </section>

        <!-- Footer -->
        <footer class="footer">
            <p>🌟 <strong>Semoga kebahagiaan, kedamaian, dan berkah selalu menyertai kita semua</strong> 🌟</p>
            <p>🕌 Mohon maaf lahir dan batin 🕉️</p>
            <p><small>Dibuat dengan ❤️ untuk Hari Raya | Powered by Ilham Maulana</small></p>
        </footer>
    </div>

    <script>
        // PHP data ke JS
        const holidayData = <?php echo json_encode($holidays); ?>;

        // Create floating particles
        function createParticles() {
            const particlesContainer = document.getElementById('particles');
            const types = ['particle', 'particle gold', 'particle moon'];
            
            for (let i = 0; i < 60; i++) {
                const particle = document.createElement('div');
                particle.className = types[Math.floor(Math.random() * types.length)];
                particle.style.left = Math.random() * 100 + '%';
                particle.style.width = Math.random() * 6 + 2 + 'px';
                particle.style.height = particle.style.width;
                particle.style.animationDuration = (Math.random() * 6 + 6) + 's';
                particle.style.animationDelay = Math.random() * 3 + 's';
                particlesContainer.appendChild(particle);
            }
        }

        // Modal functions
        function openModal(type) {
            const modal = document.getElementById('holidayModal');
            const data = holidayData[type];
            
            document.getElementById('modalIcon').innerHTML = `<i class="${data.icon}"></i>`;
            document.getElementById('modalTitle').textContent = data.title;
            document.getElementById('modalBody').innerHTML = data.body;
            
            modal.classList.add('active');
            document.body.classList.add('modal-open');
            
            // Add click effect
            event.currentTarget.classList.add('clicked');
            setTimeout(() => event.currentTarget.classList.remove('clicked'), 800);
        }

        function closeModal() {
            document.getElementById('holidayModal').classList.remove('active');
            document.body.classList.remove('modal-open');
        }

        // Event listeners
        document.getElementById('holidayModal').addEventListener('click', e => {
            if (e.target === e.currentTarget) closeModal();
        });

        document.addEventListener('keydown', e => {
            if (e.key === 'Escape') closeModal();
        });

        // Share functions
        function shareMainMessage() {
            const message = `🌙 Selamat Hari Idul Fitri 1446 H & Nyepi 1946 Saka! ✨\n\nTaqabbalallahu minna wa minkum 🙏\nMohon maaf lahir dan batin 🕌🕉️\n\nSemoga berkah selalu menyertai kita semua! 🎉\n\n#HariRaya #IdulFitri #Nyepi #Lebaran`;
            
            shareContent('Selamat Hari Raya!', message, window.location.href);
        }

        function shareHoliday() {
            const activeModalTitle = document.getElementById('modalTitle').textContent;
            const message = `🌟 ${activeModalTitle} 🌟\n\n${document.getElementById('modalBody').textContent}\n\nSelamat Hari Raya! 🙏 #HariRaya`;
            
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
                // Success animation
                const btn = event.target.closest('.cta-button');
                const originalText = btn.innerHTML;
                btn.innerHTML = '<i class="fas fa-check"></i> ✅ Tersalin!';
                btn.style.background = 'linear-gradient(45deg, #4CAF50, #45a049)';
                
                setTimeout(() => {
                    btn.innerHTML = originalText;
                    btn.style.background = '';
                }, 2000);
            }).catch(() => {
                alert('Ucapan disalin ke clipboard! 📋');
            });
        }

        // Mouse parallax effect
        document.addEventListener('mousemove', e => {
            const mouseX = e.clientX / window.innerWidth;
            const mouseY = e.clientY / window.innerHeight;
            
            const cards = document.querySelectorAll('.holiday-card');
            cards.forEach((card, index) => {
                const speed = (index + 1) * 0.02;
                card.style.transform = `translate(${mouseX * speed * 20}px, ${mouseY * speed * 20}px)`;
            });
        });

        // Initialize
        window.addEventListener('load', () => {
            createParticles();
            
            // Continuous particle generation
            setInterval(() => {
                const particle = document.createElement('div');
                particle.className = 'particle';
                particle.style.left = Math.random() * 100 + '%';
                particle.style.width = Math.random() * 4 + 1 + 'px';
                particle.style.height = particle.style.width;
                particle.style.animationDuration = (Math.random() * 5 + 5) + 's';
                document.getElementById('particles').appendChild(particle);
                
                setTimeout(() => particle.remove(), 10000);
            }, 800);
        });

        // PWA-like install prompt (optional)
        let deferredPrompt;
        window.addEventListener('beforeinstallprompt', (e) => {
            deferredPrompt = e;
        });
    </script>
</body>
</html>