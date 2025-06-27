<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SITH USER COMMAND | DARK COUNCIL</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Saira+Stencil+One&family=Orbitron:wght@400;700;900&display=swap');
        
        :root {
            --sith-red: #e10b0b;
            --sith-crimson: #8b0000;
            --sith-maroon: #800020;
            --sith-orange: #ff4500;
            --sith-black: #0a0a0a;
            --sith-gray: #222;
            --sith-gold: #d4af37;
            --sith-lightning: #ff5555;
            --holocron-blue: #00a2ff;
        }
        
        body {
            background-color: var(--sith-black);
            color: var(--sith-lightning);
            font-family: 'Orbitron', sans-serif;
            min-height: 100vh;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            position: relative;
            perspective: 1000px;
            text-align: center;
        }
        
        /* Sith Starfield */
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(ellipse at center, rgba(0,0,0,0) 0%, rgba(0,0,0,1) 100%),
                url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="300" height="300" opacity="0.8"><circle cx="%23{Math.random()*300}" cy="%23{Math.random()*300}" r="1.2" fill="%23e10b0b"/><circle cx="%23{Math.random()*300}" cy="%23{Math.random()*300}" r="0.8" fill="%23ff4500"/><circle cx="%23{Math.random()*300}" cy="%23{Math.random()*300}" r="0.5" fill="%23ff5555"/></svg>');
            background-size: 300px 300px;
            z-index: -3;
            animation: starfieldScroll 200s linear infinite;
        }
        
        @keyframes starfieldScroll {
            0% { background-position: 0 0; }
            100% { background-position: 300px 300px; }
        }
        
        /* Sith Lightning Background */
        .sith-lightning {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                linear-gradient(135deg, rgba(225,11,11,0.02) 0%, transparent 50%, rgba(225,11,11,0.02) 100%),
                url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><path d="M10,10 L30,50 L5,70 L60,30 L20,90 L90,10 Z" fill="none" stroke="%23e10b0b" stroke-width="1" opacity="0.05"/></svg>');
            background-size: 200px 200px;
            z-index: -2;
            animation: lightningFlicker 8s infinite;
            pointer-events: none;
        }
        
        @keyframes lightningFlicker {
            0%, 30%, 32%, 34%, 36%, 100% { opacity: 0.05; }
            31%, 33%, 35% { opacity: 0.2; }
        }
        
        /* Sith Holocron Grid */
        .sith-holocron {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                linear-gradient(rgba(225,11,11,0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(225,11,11,0.03) 1px, transparent 1px);
            background-size: 40px 40px;
            z-index: -1;
            pointer-events: none;
        }
        
        /* Mustafar Lava Rivers */
        .mustafar-rivers {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 20%;
            background: 
                linear-gradient(to top, 
                    rgba(139,0,0,0.8) 0%, 
                    rgba(255,69,0,0.6) 20%, 
                    transparent 100%);
            z-index: -1;
            pointer-events: none;
            animation: lavaPulse 15s infinite alternate;
        }
        
        @keyframes lavaPulse {
            0% { opacity: 0.7; height: 20%; }
            100% { opacity: 0.9; height: 25%; }
        }
        
        /* Sith Title */
        .sith-title {
            color: var(--sith-red);
            font-family: 'Saira Stencil One', cursive;
            font-size: 3rem;
            text-shadow: 0 0 15px var(--sith-red);
            margin-bottom: 40px;
            letter-spacing: 3px;
            line-height: 1.3;
            position: relative;
            padding: 0 20px;
        }
        
        .sith-title::after {
            content: "";
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 300px;
            height: 3px;
            background: linear-gradient(to right, transparent, var(--sith-red), transparent);
        }
        
        /* Sith Navigation Links */
        .sith-nav-links {
            display: flex;
            gap: 30px;
            margin-top: 50px;
            flex-wrap: wrap;
            justify-content: center;
        }
        
        .sith-nav-link {
            color: var(--sith-lightning);
            text-decoration: none;
            font-size: 1.2rem;
            padding: 15px 40px;
            border: 2px solid var(--sith-red);
            box-shadow: 0 0 15px var(--sith-red);
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
            text-transform: uppercase;
            letter-spacing: 2px;
            background: rgba(30, 30, 30, 0.7);
        }
        
        .sith-nav-link:hover {
            color: black;
            background: var(--sith-red);
            box-shadow: 0 0 30px var(--sith-red);
            transform: translateY(-5px);
        }
        
        .sith-nav-link::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: all 0.6s;
        }
        
        .sith-nav-link:hover::before {
            left: 100%;
        }
        
        /* Sith Corner Decorations */
        .sith-corner {
            position: fixed;
            width: 50px;
            height: 50px;
            border: 3px solid var(--sith-red);
            z-index: 5;
            opacity: 0.7;
            animation: sithGlow 3s infinite alternate;
        }
        
        .sith-top-left {
            top: 0;
            left: 0;
            border-right: none;
            border-bottom: none;
        }
        
        .sith-top-right {
            top: 0;
            right: 0;
            border-left: none;
            border-bottom: none;
            animation-delay: 1.5s;
        }
        
        .sith-bottom-left {
            bottom: 0;
            left: 0;
            border-right: none;
            border-top: none;
            animation-delay: 1s;
        }
        
        .sith-bottom-right {
            bottom: 0;
            right: 0;
            border-left: none;
            border-top: none;
            animation-delay: 0.5s;
        }
        
        @keyframes sithGlow {
            0% { box-shadow: 0 0 10px var(--sith-red); }
            100% { box-shadow: 0 0 30px var(--sith-red); }
        }
        
        /* Sith Scanlines */
        .sith-scanlines {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(rgba(0,0,0,0.1) 1px, transparent 1px);
            background-size: 100% 3px;
            pointer-events: none;
            z-index: 1000;
            animation: scanlineScroll 80s linear infinite;
            opacity: 0.2;
        }
        
        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .sith-title {
                font-size: 2rem;
            }
            
            .sith-nav-links {
                flex-direction: column;
                gap: 20px;
            }
            
            .sith-nav-link {
                padding: 12px 30px;
                font-size: 1rem;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <!-- Sith Background Elements -->
    <div class="sith-lightning"></div>
    <div class="sith-holocron"></div>
    <div class="mustafar-rivers"></div>
    <div class="sith-scanlines"></div>
    
    <!-- Sith Corner Decorations -->
    <div class="sith-corner sith-top-left"></div>
    <div class="sith-corner sith-top-right"></div>
    <div class="sith-corner sith-bottom-left"></div>
    <div class="sith-corner sith-bottom-right"></div>
    
    <h1 class="sith-title">DARK COUNCIL<br>USER MANAGEMENT</h1>
    
    <div class="sith-nav-links">
        <a href="/login" class="sith-nav-link">
            <i class="fas fa-skull"></i> SITH ACCESS
        </a>
        <a href="/register" class="sith-nav-link">
            <i class="fas fa-user-plus"></i> JOIN THE DARK SIDE
        </a>
    </div>

    <script>
        // Random lightning flashes
        setInterval(() => {
            if (Math.random() > 0.7) {
                flashSithLightning();
            }
        }, 5000);
        
        function flashSithLightning() {
            const lightning = document.createElement('div');
            lightning.style.position = 'fixed';
            lightning.style.top = '0';
            lightning.style.left = '0';
            lightning.style.width = '100%';
            lightning.style.height = '100%';
            lightning.style.background = 
                'linear-gradient(to bottom, transparent 30%, rgba(225,11,11,0.3) 50%, transparent 70%)';
            lightning.style.zIndex = '-1';
            lightning.style.pointerEvents = 'none';
            lightning.style.animation = 'lightningFlicker 0.5s';
            
            document.body.appendChild(lightning);
            
            setTimeout(() => {
                document.body.removeChild(lightning);
            }, 500);
        }
        
        // Make Mustafar rivers pulse more dramatically
        const rivers = document.querySelector('.mustafar-rivers');
        setInterval(() => {
            rivers.style.opacity = (0.7 + Math.random() * 0.3);
            rivers.style.height = (20 + Math.random() * 10) + '%';
        }, 3000);
        
        // Create twinkling red stars
        const starCount = 50;
        for (let i = 0; i < starCount; i++) {
            const star = document.createElement('div');
            star.style.position = 'fixed';
            star.style.width = `${Math.random() * 3 + 1}px`;
            star.style.height = star.style.width;
            star.style.left = `${Math.random() * 100}%`;
            star.style.top = `${Math.random() * 100}%`;
            star.style.backgroundColor = `hsl(${Math.random() * 20 + 350}, 100%, 50%)`;
            star.style.borderRadius = '50%';
            star.style.animation = `twinkle ${3 + Math.random() * 4}s infinite ease-in-out`;
            star.style.pointerEvents = 'none';
            star.style.zIndex = '-1';
            
            document.body.appendChild(star);
        }
    </script>
</body>
</html>