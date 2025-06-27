<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER DASHBOARD | SPACE COMMAND</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap');
        
        body {
            background-color: #0a0a20;
            background-image: 
                radial-gradient(1px 1px at 20px 30px, white, rgba(0,0,0,0)),
                radial-gradient(1px 1px at 40px 70px, white, rgba(0,0,0,0)),
                radial-gradient(1px 1px at 90px 40px, #7f00ff, rgba(0,0,0,0)),
                radial-gradient(1px 1px at 130px 80px, #00f0ff, rgba(0,0,0,0)),
                radial-gradient(1px 1px at 160px 120px, white, rgba(0,0,0,0));
            background-size: 200px 200px;
            font-family: 'Press Start 2P', cursive;
            color: #00f0ff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
            line-height: 1.6;
            overflow: hidden;
            position: relative;
        }
        
        /* Jedi Intro Animation */
        .jedi-intro {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #000;
            z-index: 9999;
            display: flex;
            justify-content: center;
            perspective: 400px;
            animation: introFadeOut 1s ease-out 8s forwards;
        }
        
        .jedi-crawl {
            position: relative;
            top: -100px;
            transform-origin: 50% 100%;
            animation: crawl 60s linear;
            width: 80%;
            text-align: center;
            color: #ffd700;
            font-size: 36px;
            font-weight: bold;
            line-height: 1.5;
        }
        
        @keyframes crawl {
            0% {
                top: 100vh;
                transform: rotateX(20deg) translateZ(0);
            }
            100% { 
                top: -5000px;
                transform: rotateX(25deg) translateZ(-2500px);
            }
        }
        
        @keyframes introFadeOut {
            to {
                opacity: 0;
                visibility: hidden;
            }
        }
        
        /* Jedi Starfighter and Asteroid Animations */
        .jedi-starfighter {
            position: absolute;
            width: 60px;
            height: 30px;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60 30"><polygon points="0,15 20,0 60,15 20,30" fill="%2300ff88" stroke="%2300f0ff" stroke-width="2"/><circle cx="45" cy="15" r="5" fill="%2300f0ff"/></svg>');
            background-size: contain;
            background-repeat: no-repeat;
            filter: drop-shadow(0 0 10px #00ff88);
            animation: flyAcross 20s linear infinite;
            z-index: -1;
        }
        
        .jedi-asteroid {
            position: absolute;
            width: 40px;
            height: 40px;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40"><path d="M20,0 Q30,5 40,20 Q35,30 20,40 Q5,30 0,20 Q5,5 20,0" fill="%237f00ff" stroke="%2300f0ff" stroke-width="1"/></svg>');
            background-size: contain;
            background-repeat: no-repeat;
            filter: drop-shadow(0 0 5px #00f0ff);
            animation: float 15s linear infinite;
            z-index: -1;
        }
        
        @keyframes flyAcross {
            0% {
                transform: translateX(-100px) translateY(100px) rotate(0deg);
            }
            100% {
                transform: translateX(calc(100vw + 100px)) translateY(-100px) rotate(360deg);
            }
        }
        
        @keyframes float {
            0%, 100% {
                transform: translate(0, 0) rotate(0deg);
            }
            25% {
                transform: translate(50px, 30px) rotate(90deg);
            }
            50% {
                transform: translate(100px, 0) rotate(180deg);
            }
            75% {
                transform: translate(50px, -30px) rotate(270deg);
            }
        }
        
        /* Dashboard Container with Jedi Effects */
        .dashboard-container {
            background-color: rgba(10, 10, 40, 0.85);
            border: 4px solid #00ff88;
            box-shadow: 0 0 20px #00ff88, 
                        inset 0 0 10px #00ff88;
            padding: 30px;
            max-width: 600px;
            width: 100%;
            text-align: center;
            position: relative;
            overflow: hidden;
            transform: perspective(500px);
            opacity: 0;
        }
        
        .dashboard-container.visible {
            animation: dashboardAppear 1s ease-out both;
        }
        
        @keyframes dashboardAppear {
            to {
                opacity: 1;
                transform: perspective(500px) translateZ(0);
            }
        }
        
        .dashboard-container::before {
            content: "";
            position: absolute;
            top: -10px;
            left: -10px;
            right: -10px;
            bottom: -10px;
            background: linear-gradient(45deg, #00ff88, #4d00ff, #00f0ff);
            z-index: -1;
            filter: blur(20px);
            opacity: 0.3;
            animation: pulse 8s infinite alternate;
        }
        
        @keyframes pulse {
            0% {
                opacity: 0.3;
            }
            50% {
                opacity: 0.5;
            }
            100% {
                opacity: 0.3;
            }
        }
        
        .avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #00ff88;
            box-shadow: 0 0 15px #00ff88;
            margin-bottom: 25px;
            image-rendering: pixelated;
            transition: all 0.3s;
            animation: avatarGlow 2s infinite alternate;
        }
        
        @keyframes avatarGlow {
            to {
                box-shadow: 0 0 25px #00ff88;
            }
        }
        
        .avatar:hover {
            transform: scale(1.05);
            animation: avatarGlowHover 0.5s infinite alternate;
        }
        
        @keyframes avatarGlowHover {
            to {
                box-shadow: 0 0 35px #00ff88;
            }
        }
        
        .username {
            font-size: 24px;
            margin-bottom: 15px;
            color: #00ff88;
            text-shadow: 0 0 10px #00ff88;
            letter-spacing: 2px;
            animation: textFlicker 3s infinite alternate;
        }
        
        @keyframes textFlicker {
            0%, 19%, 21%, 23%, 25%, 54%, 56%, 100% {
                text-shadow: 0 0 10px #00ff88;
            }
            20%, 24%, 55% {
                text-shadow: 0 0 5px #00ff88, 0 0 15px #00f0ff;
            }
        }
        
        .email {
            font-size: 12px;
            color: #00f0ff;
            text-shadow: 0 0 5px #00f0ff;
            margin-bottom: 30px;
            letter-spacing: 1px;
        }
        
        nav ul {
            list-style-type: none;
            padding: 0;
            margin-bottom: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
        }
        
        nav li {
            margin: 0;
        }
        
        nav a, #logout-form button {
            text-decoration: none;
            color: #00ff88;
            font-size: 12px;
            transition: all 0.3s;
            position: relative;
            padding: 8px 15px;
            background-color: rgba(0, 255, 136, 0.1);
            border: 2px solid #00ff88;
            box-shadow: 0 0 10px #00ff88;
            image-rendering: pixelated;
        }
        
        nav a:hover,
        #logout-form button:hover {
            color: #00f0ff;
            border-color: #00f0ff;
            box-shadow: 0 0 15px #00f0ff;
            text-decoration: none;
            transform: translateY(-3px);
            animation: buttonPulse 0.5s infinite alternate;
        }
        
        @keyframes buttonPulse {
            to {
                box-shadow: 0 0 20px #00f0ff;
            }
        }
        
        nav a:active,
        #logout-form button:active {
            transform: translateY(1px);
        }
        
        #logout-form {
            display: inline;
        }
        
        #logout-form button {
            background-color: rgba(255, 0, 0, 0.2);
            border-color: #ff3860;
            color: #ff3860;
            font-family: 'Press Start 2P', cursive;
            cursor: pointer;
            padding: 8px 20px;
            margin-top: 10px;
        }
        
        #logout-form button:hover {
            background-color: rgba(255, 0, 0, 0.3);
            box-shadow: 0 0 15px #ff3860;
            animation: dangerPulse 0.5s infinite alternate;
        }
        
        @keyframes dangerPulse {
            to {
                box-shadow: 0 0 25px #ff3860;
            }
        }
        
        .pixel-corner {
            position: absolute;
            width: 16px;
            height: 16px;
            background-color: #00ff88;
            box-shadow: 0 0 10px #00ff88;
            image-rendering: pixelated;
            animation: cornerPulse 2s infinite alternate;
        }
        
        @keyframes cornerPulse {
            to {
                box-shadow: 0 0 15px #00ff88;
            }
        }
        
        .top-left {
            top: 0;
            left: 0;
            clip-path: polygon(0 0, 0 100%, 100% 0);
        }
        
        .top-right {
            top: 0;
            right: 0;
            clip-path: polygon(100% 0, 0 0, 100% 100%);
        }
        
        .bottom-left {
            bottom: 0;
            left: 0;
            clip-path: polygon(0 100%, 0 0, 100% 100%);
        }
        
        .bottom-right {
            bottom: 0;
            right: 0;
            clip-path: polygon(100% 100%, 0 100%, 100% 0);
        }
        
        .user-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #00ff88;
            color: #0a0a20;
            padding: 5px 10px;
            font-size: 10px;
            box-shadow: 0 0 10px #00ff88;
            image-rendering: pixelated;
            animation: badgeFloat 3s ease-in-out infinite alternate;
        }
        
        @keyframes badgeFloat {
            to {
                transform: translateY(-5px);
            }
        }
        
        /* Scanning line effect */
        .scan-line {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(to bottom, 
                rgba(0, 240, 255, 0.1), 
                rgba(0, 240, 255, 0.7), 
                rgba(0, 240, 255, 0.1));
            box-shadow: 0 0 10px rgba(0, 240, 255, 0.7);
            animation: scan 4s linear infinite;
            opacity: 0.7;
        }
        
        @keyframes scan {
            0% {
                top: 0;
            }
            100% {
                top: 100%;
            }
        }
        
        /* Jedi Light Effect */
        .jedi-light {
            position: absolute;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><circle cx="50" cy="50" r="40" fill="none" stroke="%2300f0ff" stroke-width="1" opacity="0.1"/></svg>');
            background-size: 200px 200px;
            z-index: -2;
            animation: lightPulse 8s infinite;
            pointer-events: none;
        }
        
        @keyframes lightPulse {
            0%, 100% {
                opacity: 0.1;
            }
            50% {
                opacity: 0.2;
            }
        }
    </style>
</head>
<body>
    <!-- Jedi Light Background -->
    <div class="jedi-light"></div>
    
    <!-- Jedi Starfighters and Asteroids -->
    <div class="jedi-starfighter" style="top: 20%; left: -100px;"></div>
    <div class="jedi-starfighter" style="top: 70%; left: -100px; animation-duration: 25s;"></div>
    <div class="jedi-asteroid" style="top: 30%; left: 30%;"></div>
    <div class="jedi-asteroid" style="top: 60%; left: 60%;"></div>
    <div class="jedi-asteroid" style="top: 80%; left: 20%;"></div>
    
    <!-- Dashboard Container -->
    <div class="dashboard-container hidden" id="dashboard">
        <div class="scan-line"></div>
        <div class="pixel-corner top-left"></div>
        <div class="pixel-corner top-right"></div>
        <div class="pixel-corner bottom-left"></div>
        <div class="pixel-corner bottom-right"></div>
        
        <div class="user-badge">JEDI EXPLORER</div>
        
        @if (session('user')->avatar && file_exists(public_path('storage/' . session('user')->avatar)))
            <img src="{{ asset('storage/' . session('user')->avatar) }}" alt="Avatar" class="avatar">
        @else
            <img src="{{ asset('storage/avatars/default-avatar.jpg') }}" alt="Default Avatar" class="avatar">
        @endif


        <div class="username">{{ strtoupper(session('user')->first_name) }} {{ strtoupper(session('user')->last_name) }}</div>
        <div class="email">{{ session('user')->email }}</div>

        <nav>
            <ul>
                <li><a href="/profile">EDIT PROFILE</a></li>
            </ul>
            <form id="logout-form" action="/logout" method="POST">
                @csrf
                <button type="submit">LOG OUT</button>
            </form>
        </nav>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Check if intro has been shown before
            const introShown = localStorage.getItem('jediIntroShown');
            
            if (!introShown) {
                // Show the intro animation
                const intro = document.createElement('div');
                intro.className = 'jedi-intro';
                intro.innerHTML = `
                    <div class="jedi-crawl">
                        <p>JEDI SPACE COMMAND</p>
                        <p>USER DASHBOARD</p>
                        <p>STARDATE ${new Date().toISOString().slice(0, 10).replace(/-/g, '.')}</p>
                        <p>WELCOME, JEDI ${document.querySelector('.username').textContent}</p>
                        <p>YOUR MISSION: EXPLORE THE GALAXY</p>
                        <p>MAY THE FORCE BE WITH YOU</p>
                    </div>
                `;
                document.body.appendChild(intro);
                
                // Mark intro as shown
                localStorage.setItem('jediIntroShown', 'true');
                
                // Show dashboard after intro completes
                setTimeout(() => {
                    document.getElementById('dashboard').classList.remove('hidden');
                    document.getElementById('dashboard').classList.add('visible');
                }, 9000); // Match this with intro animation duration
            } else {
                // Show dashboard immediately if intro was already shown
                document.getElementById('dashboard').classList.remove('hidden');
                document.getElementById('dashboard').classList.add('visible');
            }
            
            // Create more Jedi starfighters
            for (let i = 0; i < 3; i++) {
                createJediStarfighter();
            }
            
            // Create more asteroids
            for (let i = 0; i < 5; i++) {
                createJediAsteroid();
            }
        });
        
        function createJediStarfighter() {
            const ship = document.createElement('div');
            ship.className = 'jedi-starfighter';
            
            // Random position and animation
            const startY = Math.random() * 80 + 10; // 10-90% vertical
            const duration = Math.random() * 15 + 15; // 15-30 seconds
            
            ship.style.top = `${startY}%`;
            ship.style.left = '-100px';
            ship.style.animationDuration = `${duration}s`;
            
            document.body.appendChild(ship);
        }
        
        function createJediAsteroid() {
            const asteroid = document.createElement('div');
            asteroid.className = 'jedi-asteroid';
            
            // Random position and size
            const size = Math.random() * 30 + 20; // 20-50px
            const startX = Math.random() * 80 + 10; // 10-90% horizontal
            const startY = Math.random() * 80 + 10; // 10-90% vertical
            const duration = Math.random() * 20 + 10; // 10-30 seconds
            
            asteroid.style.width = `${size}px`;
            asteroid.style.height = `${size}px`;
            asteroid.style.top = `${startY}%`;
            asteroid.style.left = `${startX}%`;
            asteroid.style.animationDuration = `${duration}s`;
            
            document.body.appendChild(asteroid);
        }
    </script>
</body>
</html>