<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN DASHBOARD | SPACE COMMAND</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap');
        
        body {
            background-color: #0a0a20;
            background-image: 
                radial-gradient(1px 1px at 20px 30px, #ff3860, rgba(0,0,0,0)),
                radial-gradient(1px 1px at 40px 70px, #ff3860, rgba(0,0,0,0)),
                radial-gradient(1px 1px at 90px 40px, #7f00ff, rgba(0,0,0,0)),
                radial-gradient(1px 1px at 130px 80px, #ff00e1, rgba(0,0,0,0)),
                radial-gradient(1px 1px at 160px 120px, #ff3860, rgba(0,0,0,0));
            background-size: 200px 200px;
            font-family: 'Press Start 2P', cursive;
            color: #ff3860;
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
        
        /* Imperial Crawl Animation */
        .sith-intro {
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
        
        .imperial-crawl {
            position: relative;
            top: -100px;
            transform-origin: 50% 100%;
            animation: crawl 60s linear;
            width: 80%;
            text-align: center;
            color: #ff3860;
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
        
        /* Space Battle Elements */
        .tie-fighter {
            position: absolute;
            width: 60px;
            height: 30px;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 60 30"><circle cx="30" cy="15" r="15" fill="black" stroke="%23ff3860" stroke-width="2"/><rect x="25" y="0" width="10" height="30" fill="black" stroke="%23ff3860" stroke-width="2"/><rect x="0" y="12" width="20" height="6" fill="black" stroke="%23ff3860" stroke-width="2"/><rect x="40" y="12" width="20" height="6" fill="black" stroke="%23ff3860" stroke-width="2"/></svg>');
            background-size: contain;
            background-repeat: no-repeat;
            filter: drop-shadow(0 0 10px #ff3860);
            animation: flyAcross 15s linear infinite;
            z-index: -1;
        }
        
        .dark-asteroid {
            position: absolute;
            width: 40px;
            height: 40px;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40"><path d="M20,0 Q30,5 40,20 Q35,30 20,40 Q5,30 0,20 Q5,5 20,0" fill="%23222" stroke="%23ff3860" stroke-width="1"/></svg>');
            background-size: contain;
            background-repeat: no-repeat;
            filter: drop-shadow(0 0 5px #ff3860);
            animation: float 15s linear infinite;
            z-index: -1;
        }
        
        /* New: Star Destroyer */
        .star-destroyer {
            position: absolute;
            width: 200px;
            height: 80px;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 80"><path d="M10,40 L50,10 L190,10 L180,40 L190,70 L50,70 Z" fill="black" stroke="%23ff3860" stroke-width="1"/><rect x="60" y="20" width="100" height="40" fill="black" stroke="%23ff3860" stroke-width="1"/></svg>');
            background-size: contain;
            background-repeat: no-repeat;
            filter: drop-shadow(0 0 15px #ff3860);
            animation: starDestroyerFly 120s linear infinite;
            z-index: -2;
            opacity: 0.8;
        }
        
        /* New: X-Wing */
        .x-wing {
            position: absolute;
            width: 50px;
            height: 50px;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50"><path d="M25,25 L40,25 L45,20 L40,15 L25,15 L20,10 L15,15 L0,15 L5,20 L0,25 L15,25 L20,30 Z" fill="black" stroke="%237f00ff" stroke-width="1"/><circle cx="25" cy="25" r="5" fill="black" stroke="%237f00ff" stroke-width="1"/></svg>');
            background-size: contain;
            background-repeat: no-repeat;
            filter: drop-shadow(0 0 8px #7f00ff);
            animation: xwingFly 25s linear infinite;
            z-index: -1;
        }
        
        /* New: Death Star */
        .death-star {
            position: absolute;
            width: 150px;
            height: 150px;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 150 150"><circle cx="75" cy="75" r="70" fill="%23222" stroke="%23ff3860" stroke-width="2"/><circle cx="30" cy="50" r="20" fill="%23333" stroke="%23ff3860" stroke-width="1"/><path d="M75,5 A70,70 0 0,1 75,145" fill="none" stroke="%23ff3860" stroke-width="1"/></svg>');
            background-size: contain;
            background-repeat: no-repeat;
            filter: drop-shadow(0 0 20px #ff3860);
            z-index: -3;
            opacity: 0.6;
        }
        
        /* New: Laser Blasts */
        .laser-blast {
            position: absolute;
            width: 10px;
            height: 3px;
            background: linear-gradient(to right, #ff3860, #ff00e1);
            border-radius: 50%;
            filter: blur(1px);
            box-shadow: 0 0 10px #ff3860;
            z-index: -1;
            animation: laserShot 0.5s linear;
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
        
        /* New: Star Destroyer Animation */
        @keyframes starDestroyerFly {
            0% {
                transform: translateX(-250px) translateY(20vh) rotate(5deg);
            }
            100% {
                transform: translateX(calc(100vw + 250px)) translateY(30vh) rotate(5deg);
            }
        }
        
        /* New: X-Wing Animation */
        @keyframes xwingFly {
            0% {
                transform: translateX(100vw) translateY(50vh) rotate(-10deg);
            }
            100% {
                transform: translateX(-100px) translateY(30vh) rotate(-10deg);
            }
        }
        
        /* New: Laser Shot Animation */
        @keyframes laserShot {
            0% {
                transform: translateX(0);
                opacity: 1;
            }
            100% {
                transform: translateX(100px);
                opacity: 0;
            }
        }
        
        /* Dashboard Container with Dark Side Effects */
        .dashboard-container {
            background-color: rgba(10, 10, 40, 0.85);
            border: 4px solid #ff3860;
            box-shadow: 0 0 20px #ff3860, 
                        inset 0 0 10px #ff00e1;
            padding: 30px;
            max-width: 600px;
            width: 100%;
            text-align: center;
            position: relative;
            overflow: hidden;
            transform: perspective(500px);
            opacity: 1;
        }
        
        .dashboard-container.hidden {
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
            background: linear-gradient(45deg, #ff3860, #7f00ff, #ff00e1);
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
            border: 4px solid #ff3860;
            box-shadow: 0 0 15px #ff3860;
            margin-bottom: 25px;
            image-rendering: pixelated;
            transition: all 0.3s;
            animation: avatarGlow 2s infinite alternate;
        }
        
        @keyframes avatarGlow {
            to {
                box-shadow: 0 0 25px #ff3860;
            }
        }
        
        .avatar:hover {
            transform: scale(1.05);
            animation: avatarGlowHover 0.5s infinite alternate;
        }
        
        @keyframes avatarGlowHover {
            to {
                box-shadow: 0 0 35px #ff3860;
            }
        }
        
        .username {
            font-size: 24px;
            margin-bottom: 15px;
            color: #ff00e1;
            text-shadow: 0 0 10px #ff00e1;
            letter-spacing: 2px;
            animation: textFlicker 3s infinite alternate;
        }
        
        @keyframes textFlicker {
            0%, 19%, 21%, 23%, 25%, 54%, 56%, 100% {
                text-shadow: 0 0 10px #ff00e1;
            }
            20%, 24%, 55% {
                text-shadow: 0 0 5px #ff00e1, 0 0 15px #ff3860;
            }
        }
        
        .email {
            font-size: 12px;
            color: #ff3860;
            text-shadow: 0 0 5px #ff3860;
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
            color: #ff3860;
            font-size: 12px;
            transition: all 0.3s;
            position: relative;
            padding: 8px 15px;
            background-color: rgba(255, 56, 96, 0.1);
            border: 2px solid #ff3860;
            box-shadow: 0 0 10px #ff3860;
            image-rendering: pixelated;
        }
        
        nav a:hover,
        #logout-form button:hover {
            color: #ff00e1;
            border-color: #ff00e1;
            box-shadow: 0 0 15px #ff00e1;
            text-decoration: none;
            transform: translateY(-3px);
            animation: buttonPulse 0.5s infinite alternate;
        }
        
        @keyframes buttonPulse {
            to {
                box-shadow: 0 0 20px #ff00e1;
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
            background-color: rgba(255, 0, 0, 0.3);
            border-color: #ff0000;
            color: #ff0000;
            font-family: 'Press Start 2P', cursive;
            cursor: pointer;
            padding: 8px 20px;
            margin-top: 10px;
        }
        
        #logout-form button:hover {
            background-color: rgba(255, 0, 0, 0.4);
            box-shadow: 0 0 15px #ff0000;
            animation: dangerPulse 0.5s infinite alternate;
        }
        
        @keyframes dangerPulse {
            to {
                box-shadow: 0 0 25px #ff0000;
            }
        }
        
        .pixel-corner {
            position: absolute;
            width: 16px;
            height: 16px;
            background-color: #ff3860;
            box-shadow: 0 0 10px #ff3860;
            image-rendering: pixelated;
            animation: cornerPulse 2s infinite alternate;
        }
        
        @keyframes cornerPulse {
            to {
                box-shadow: 0 0 15px #ff3860;
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
        
        .admin-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #ff00e1;
            color: #0a0a20;
            padding: 5px 10px;
            font-size: 10px;
            box-shadow: 0 0 10px #ff00e1;
            image-rendering: pixelated;
            animation: badgeFloat 3s ease-in-out infinite alternate;
        }
        
        @keyframes badgeFloat {
            to {
                transform: translateY(-5px);
            }
        }
        
        /* Dark Side Scanning line effect */
        .scan-line {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(to bottom, 
                rgba(255, 56, 96, 0.1), 
                rgba(255, 56, 96, 0.7), 
                rgba(255, 56, 96, 0.1));
            box-shadow: 0 0 10px rgba(255, 56, 96, 0.7);
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
        
        /* Sith Lightning Effect */
        .sith-lightning {
            position: absolute;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><path d="M10,10 L20,50 L5,60 L40,40 L30,90 L90,10 Z" fill="none" stroke="%23ff3860" stroke-width="1" opacity="0.1"/></svg>');
            background-size: 200px 200px;
            z-index: -2;
            animation: lightningFlash 8s infinite;
            pointer-events: none;
        }
        
        @keyframes lightningFlash {
            0%, 30%, 32%, 34%, 36%, 100% {
                opacity: 0.1;
            }
            31%, 33%, 35% {
                opacity: 0.3;
            }
        }
        
        /* New: Hyperspace Effect */
        .hyperspace-effect {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, 
                rgba(10,10,40,0) 0%, 
                rgba(255,56,96,0.1) 50%, 
                rgba(10,10,40,0) 100%);
            z-index: -2;
            animation: hyperspace 15s linear infinite;
            pointer-events: none;
            opacity: 0;
        }
        
        @keyframes hyperspace {
            0% {
                transform: translateX(-100%);
                opacity: 0;
            }
            10% {
                opacity: 0.8;
            }
            20% {
                opacity: 0;
            }
            100% {
                transform: translateX(100%);
                opacity: 0;
            }
        }
        
        /* New: Explosion Effect */
        .explosion {
            position: absolute;
            width: 100px;
            height: 100px;
            background: radial-gradient(circle, 
                rgba(255,56,96,0.8) 0%, 
                rgba(255,0,225,0.6) 30%, 
                rgba(10,10,40,0) 70%);
            border-radius: 50%;
            transform: scale(0);
            animation: explode 1s ease-out;
            z-index: -1;
            pointer-events: none;
        }
        
        @keyframes explode {
            to {
                transform: scale(1);
                opacity: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Sith Lightning Background -->
    <div class="sith-lightning"></div>
    
    <!-- Hyperspace Effect -->
    <div class="hyperspace-effect"></div>
    
    <!-- Star Wars Space Elements -->
    <div class="tie-fighter" style="top: 20%; left: -100px;"></div>
    <div class="tie-fighter" style="top: 70%; left: -100px; animation-duration: 20s;"></div>
    <div class="dark-asteroid" style="top: 30%; left: 30%;"></div>
    <div class="dark-asteroid" style="top: 60%; left: 60%;"></div>
    <div class="dark-asteroid" style="top: 80%; left: 20%;"></div>
    
    <!-- New: Star Destroyer -->
    <div class="star-destroyer" style="top: 15%;"></div>
    
    <!-- New: X-Wing -->
    <div class="x-wing" style="top: 60%; left: 100vw;"></div>
    
    <!-- New: Death Star -->
    <div class="death-star" style="bottom: -50px; right: -50px;"></div>
    
    <!-- Dashboard Container -->
    <div class="dashboard-container hidden" id="dashboard">
        <div class="scan-line"></div>
        <div class="pixel-corner top-left"></div>
        <div class="pixel-corner top-right"></div>
        <div class="pixel-corner bottom-left"></div>
        <div class="pixel-corner bottom-right"></div>
        
        <div class="admin-badge">DARK ADMIN</div>
        
        @if (session('user')->avatar && file_exists(public_path('storage/' . session('user')->avatar)))
            <img src="{{ asset('storage/' . session('user')->avatar) }}" alt="Avatar" class="avatar">
        @else
            <img src="{{ asset('avatars/default-avatar.jpg') }}" alt="Default Avatar" class="avatar">
        @endif


        <div class="username">{{ strtoupper(session('user')->first_name) }} {{ strtoupper(session('user')->last_name) }}</div>
        <div class="email">{{ session('user')->email }}</div>

        <nav>
            <ul>
                <li><a href="/profile">EDIT PROFILE</a></li>
                <li><a href="/logs">VIEW LOGS</a></li>
                <li><a href="/admin/users">SITH LIST</a></li>
            </ul>
            <form id="logout-form" action="/logout" method="POST">
                @csrf
                <button type="submit">EXECUTE ORDER 66</button>
            </form>
        </nav>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Check if intro has been shown before
            const introShown = localStorage.getItem('sithIntroShown');
            
            if (!introShown) {
                // Show the intro animation
                const intro = document.createElement('div');
                intro.className = 'sith-intro';
                intro.innerHTML = `
                    <div class="imperial-crawl">
                        <p>DARK SPACE COMMAND</p>
                        <p>ADMIN DASHBOARD</p>
                        <p>STARDATE {{ now()->format('Y.m.d') }}</p>
                        <p>WELCOME, DARK LORD ${document.querySelector('.username').textContent}</p>
                        <p>YOUR MISSION: COMMAND THE IMPERIAL FLEET</p>
                        <p>THE DARK SIDE IS STRONG WITH YOU</p>
                    </div>
                `;
                document.body.appendChild(intro);
                
                // Mark intro as shown
                localStorage.setItem('sithIntroShown', 'true');
                
                // Show dashboard after intro completes
                setTimeout(() => {
                    document.getElementById('dashboard').classList.remove('hidden');
                    document.getElementById('dashboard').classList.add('visible');
                }, 9000); // Match this with intro animation duration
            } else {
                // Show dashboard immediately if intro was already shown
                document.getElementById('dashboard').classList.remove('hidden');
            }
            
            // Create more TIE fighters
            for (let i = 0; i < 5; i++) {
                createTieFighter();
            }
            
            // Create more asteroids
            for (let i = 0; i < 8; i++) {
                createDarkAsteroid();
            }
            
            // Create X-Wings
            for (let i = 0; i < 2; i++) {
                createXWing();
            }
            
            // Make stars twinkle red
            makeStarsTwinkle();
            
            // Random lightning flashes
            setInterval(() => {
                if (Math.random() > 0.7) {
                    flashLightning();
                }
            }, 3000);
            
            // Random hyperspace jumps
            setInterval(() => {
                if (Math.random() > 0.8) {
                    triggerHyperspace();
                }
            }, 10000);
            
            // Space battle effects
            setInterval(() => {
                if (Math.random() > 0.85) {
                    simulateSpaceBattle();
                }
            }, 5000);
            
            // Death Star animation
            animateDeathStar();
        });
        
        function createTieFighter() {
            const tie = document.createElement('div');
            tie.className = 'tie-fighter';
            
            // Random position and animation
            const startY = Math.random() * 80 + 10; // 10-90% vertical
            const duration = Math.random() * 15 + 10; // 10-25 seconds
            const delay = Math.random() * 10; // 0-10 second delay
            
            tie.style.top = `${startY}%`;
            tie.style.left = '-100px';
            tie.style.animationDuration = `${duration}s`;
            tie.style.animationDelay = `${delay}s`;
            
            document.body.appendChild(tie);
            
            // Occasionally fire lasers
            if (Math.random() > 0.7) {
                setInterval(() => {
                    fireLaser(tie);
                }, 3000);
            }
        }
        
        function createDarkAsteroid() {
            const asteroid = document.createElement('div');
            asteroid.className = 'dark-asteroid';
            
            // Random position and size
            const size = Math.random() * 30 + 20; // 20-50px
            const startX = Math.random() * 80 + 10; // 10-90% horizontal
            const startY = Math.random() * 80 + 10; // 10-90% vertical
            const duration = Math.random() * 20 + 10; // 10-30 seconds
            const delay = Math.random() * 5; // 0-5 second delay
            
            asteroid.style.width = `${size}px`;
            asteroid.style.height = `${size}px`;
            asteroid.style.top = `${startY}%`;
            asteroid.style.left = `${startX}%`;
            asteroid.style.animationDuration = `${duration}s`;
            asteroid.style.animationDelay = `${delay}s`;
            
            document.body.appendChild(asteroid);
        }
        
        function createXWing() {
            const xwing = document.createElement('div');
            xwing.className = 'x-wing';
            
            // Random position and animation
            const startY = Math.random() * 60 + 20; // 20-80% vertical
            const duration = Math.random() * 20 + 15; // 15-35 seconds
            const delay = Math.random() * 5; // 0-5 second delay
            
            xwing.style.top = `${startY}%`;
            xwing.style.left = '100vw';
            xwing.style.animationDuration = `${duration}s`;
            xwing.style.animationDelay = `${delay}s`;
            
            document.body.appendChild(xwing);
            
            // Occasionally fire lasers
            if (Math.random() > 0.7) {
                setInterval(() => {
                    fireLaser(xwing, true);
                }, 4000);
            }
        }
        
        function fireLaser(sourceElement, isRebel = false) {
            const rect = sourceElement.getBoundingClientRect();
            const x = rect.right;
            const y = rect.top + rect.height / 2;
            
            const laser = document.createElement('div');
            laser.className = 'laser-blast';
            laser.style.left = `${x}px`;
            laser.style.top = `${y}px`;
            
            if (isRebel) {
                laser.style.background = 'linear-gradient(to right, #7f00ff, #00ffff)';
                laser.style.boxShadow = '0 0 10px #7f00ff';
            }
            
            document.body.appendChild(laser);
            
            // Create explosion at random position
            if (Math.random() > 0.7) {
                setTimeout(() => {
                    createExplosion(
                        x + Math.random() * 200,
                        y + Math.random() * 100 - 50
                    );
                }, 500);
            }
            
            setTimeout(() => {
                document.body.removeChild(laser);
            }, 1000);
        }
        
        function createExplosion(x, y) {
            const explosion = document.createElement('div');
            explosion.className = 'explosion';
            explosion.style.left = `${x}px`;
            explosion.style.top = `${y}px`;
            
            document.body.appendChild(explosion);
            
            setTimeout(() => {
                document.body.removeChild(explosion);
            }, 1000);
        }
        
        function makeStarsTwinkle() {
            const stars = document.querySelectorAll('body > *:not(.dashboard-container):not(.sith-intro):not(.tie-fighter):not(.dark-asteroid):not(.x-wing):not(.star-destroyer):not(.death-star)');
            stars.forEach(star => {
                if (star.style.backgroundImage && star.style.backgroundImage.includes('radial-gradient')) {
                    setInterval(() => {
                        const opacity = Math.random() * 0.8 + 0.2;
                        star.style.opacity = opacity;
                    }, Math.random() * 2000 + 1000);
                }
            });
        }
        
        function flashLightning() {
            const lightning = document.createElement('div');
            lightning.className = 'sith-lightning';
            lightning.style.position = 'fixed';
            lightning.style.top = '0';
            lightning.style.left = '0';
            lightning.style.width = '100%';
            lightning.style.height = '100%';
            lightning.style.backgroundImage = 'url("data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'100\' height=\'100\' viewBox=\'0 0 100 100\'><path d=\'M' + 
                Math.floor(Math.random() * 100) + ',' + Math.floor(Math.random() * 100) + 
                ' L' + Math.floor(Math.random() * 100) + ',' + Math.floor(Math.random() * 100) + 
                ' L' + Math.floor(Math.random() * 100) + ',' + Math.floor(Math.random() * 100) + 
                ' L' + Math.floor(Math.random() * 100) + ',' + Math.floor(Math.random() * 100) + 
                ' L' + Math.floor(Math.random() * 100) + ',' + Math.floor(Math.random() * 100) + 
                ' Z\' fill=\'none\' stroke=\'%23ff3860\' stroke-width=\'1\' opacity=\'0.3\'/></svg>")';
            lightning.style.backgroundSize = 'cover';
            lightning.style.zIndex = '-1';
            lightning.style.pointerEvents = 'none';
            lightning.style.animation = 'lightningFlash 0.5s';
            
            document.body.appendChild(lightning);
            
            setTimeout(() => {
                document.body.removeChild(lightning);
            }, 500);
        }
        
        function triggerHyperspace() {
            const hyperspace = document.createElement('div');
            hyperspace.className = 'hyperspace-effect';
            
            // Random direction
            if (Math.random() > 0.5) {
                hyperspace.style.transform = 'rotate(90deg)';
            }
            
            document.body.appendChild(hyperspace);
            
            setTimeout(() => {
                document.body.removeChild(hyperspace);
            }, 1500);
        }
        
        function simulateSpaceBattle() {
            // Create multiple laser blasts
            for (let i = 0; i < Math.floor(Math.random() * 3) + 2; i++) {
                setTimeout(() => {
                    const x = Math.random() * window.innerWidth;
                    const y = Math.random() * window.innerHeight;
                    createExplosion(x, y);
                }, i * 300);
            }
        }
        
        function animateDeathStar() {
            const deathStar = document.querySelector('.death-star');
            let angle = 0;
            
            setInterval(() => {
                angle += 0.2;
                deathStar.style.transform = `rotate(${angle}deg)`;
                
                // Occasionally charge the superlaser
                if (Math.random() > 0.95) {
                    chargeSuperlaser();
                }
            }, 100);
        }
        
        function chargeSuperlaser() {
            const deathStar = document.querySelector('.death-star');
            
            // Create charging effect
            const charge = document.createElement('div');
            charge.style.position = 'absolute';
            charge.style.width = '100%';
            charge.style.height = '100%';
            charge.style.background = 'radial-gradient(circle, rgba(255,56,96,0.8) 0%, rgba(10,10,40,0) 70%)';
            charge.style.borderRadius = '50%';
            charge.style.animation = 'pulse 0.5s infinite alternate';
            deathStar.appendChild(charge);
            
            // Fire after delay
            setTimeout(() => {
                deathStar.removeChild(charge);
                
                // Create explosion effect
                const beam = document.createElement('div');
                beam.style.position = 'fixed';
                beam.style.left = '0';
                beam.style.top = '50%';
                beam.style.width = '100%';
                beam.style.height = '10px';
                beam.style.background = 'linear-gradient(to right, rgba(255,56,96,0), rgba(255,56,96,0.8), rgba(255,56,96,0))';
                beam.style.transform = 'translateY(-5px)';
                beam.style.zIndex = '-1';
                beam.style.animation = 'superlaserBeam 0.5s forwards';
                document.body.appendChild(beam);
                
                // Big explosion at the end
                setTimeout(() => {
                    createExplosion(window.innerWidth - 100, window.innerHeight / 2);
                    document.body.removeChild(beam);
                }, 500);
            }, 2000);
        }
    </script>
</body>
</html>