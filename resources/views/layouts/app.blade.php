<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'GALACTIC COMMAND CENTER')</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Optional: Star Wars SFX (Lightsaber) -->
    <audio id="lightsaber-sound" src="{{ asset('sounds/lightsaber.mp3') }}"></audio>
    
    

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700;900&family=Star+Wars&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Electrolize&display=swap');
        
        :root {
            --imperial-red: #e10b0b;
            --rebel-yellow: #ffe81f;
            --rebel-blue: #2a75bb;
            --hoth-white: #dee6ef;
            --death-star: #333;
            --lightsaber-blue: #00a2ff;
            --lightsaber-red: #ff2a2a;
            --carbonite: #00c896;
            --starfield-size: 300px;
            --sidebar-width: 280px;
            --death-star-gray: #3a3a3a;
            --tie-fighter-gray: #555;
            --star-destroyer-gray: #222;
            --hologram-blue: rgba(0, 255, 255, 0.2);
        }
        
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        
        body {
            background-color: #000;
            color: var(--hoth-white);
            font-family: 'Orbitron', sans-serif;
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
            perspective: 1000px;
            line-height: 1.6;
            text-shadow: 0 0 5px rgba(0, 162, 255, 0.3);
        }
        
        /* Starfield Background with animated stars */
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(ellipse at center, rgba(0,0,0,0) 0%, rgba(0,0,0,1) 100%),
                url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="%23{Math.floor(var(--starfield-size))}" height="%23{Math.floor(var(--starfield-size))}" opacity="0.8"><filter id="filter"><feTurbulence type="fractalNoise" baseFrequency="0.8" numOctaves="4" stitchTiles="stitch"/><feColorMatrix type="saturate" values="0"/></filter><rect width="100%25" height="100%25" filter="url(%23filter)"/><circle cx="%23{Math.random()*var(--starfield-size)}" cy="%23{Math.random()*var(--starfield-size)}" r="1.2" fill="white"/><circle cx="%23{Math.random()*var(--starfield-size)}" cy="%23{Math.random()*var(--starfield-size)}" r="0.8" fill="white"/><circle cx="%23{Math.random()*var(--starfield-size)}" cy="%23{Math.random()*var(--starfield-size)}" r="0.5" fill="white"/></svg>');
            background-size: var(--starfield-size) var(--starfield-size);
            z-index: -3;
            animation: starfieldScroll 200s linear infinite;
        }
        
        @keyframes starfieldScroll {
            0% { background-position: 0 0; }
            100% { background-position: var(--starfield-size) var(--starfield-size); }
        }
        
        /* Nebula Overlay with animated colors */
        body::after {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(ellipse at 20% 20%, rgba(42,117,187,0.2) 0%, transparent 40%),
                radial-gradient(ellipse at 80% 30%, rgba(225,11,11,0.2) 0%, transparent 40%),
                radial-gradient(ellipse at 40% 70%, rgba(255,232,31,0.1) 0%, transparent 40%);
            z-index: -2;
            pointer-events: none;
            animation: nebulaPulse 30s infinite alternate;
        }
        
        @keyframes nebulaPulse {
            0% { opacity: 0.3; }
            50% { opacity: 0.6; }
            100% { opacity: 0.3; }
        }
        
        /* Death Star surface pattern */
        .death-star-pattern {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 70% 30%, 
                    transparent 50%, 
                    rgba(58, 58, 58, 0.1) 50.5%, 
                    transparent 55%),
                linear-gradient(135deg, 
                    rgba(58, 58, 58, 0.05) 0%, 
                    transparent 5%, 
                    transparent 95%, 
                    rgba(58, 58, 58, 0.05) 100%);
            z-index: -1;
            pointer-events: none;
        }
        
        /* Main Layout Grid - Expanded for better content display */
        .galactic-container {
            display: grid;
            grid-template-columns: var(--sidebar-width) 1fr;
            grid-template-rows: 100px 1fr 70px;
            grid-template-areas:
                "header header"
                "nav main"
                "footer footer";
            min-height: 100vh;
            max-width: 2000px;
            margin: 0 auto;
        }
        
        /* Header - Imperial Command Bar with Death Star inspired design */
        .command-header {
            grid-area: header;
            background: linear-gradient(to right, 
                rgba(0,0,0,0.9) 0%, 
                rgba(20,20,20,0.95) 50%, 
                rgba(0,0,0,0.9) 100%);
            border-bottom: 1px solid var(--imperial-red);
            display: flex;
            align-items: center;
            padding: 0 3rem;
            position: relative;
            z-index: 10;
            box-shadow: 0 0 30px rgba(0,0,0,0.8);
        }
        
        .command-header::before {
            content: "";
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(to right, 
                transparent 0%,
                var(--imperial-red) 20%,
                var(--imperial-red) 80%,
                transparent 100%);
            opacity: 0.7;
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }
        
        .logo-icon {
            width: 50px;
            height: 50px;
            background: radial-gradient(circle, var(--imperial-red) 0%, transparent 70%);
            border: 2px solid var(--hoth-white);
            border-radius: 50%;
            position: relative;
            animation: logoPulse 4s infinite alternate;
        }
        
        .logo-icon::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 24px;
            height: 24px;
            background: var(--hoth-white);
            clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);
        }
        
        @keyframes logoPulse {
            0% { 
                box-shadow: 0 0 10px var(--imperial-red); 
                transform: rotate(0deg);
            }
            100% { 
                box-shadow: 0 0 30px var(--imperial-red); 
                transform: rotate(360deg);
            }
        }
        
        .logo-text {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--hoth-white);
            text-transform: uppercase;
            letter-spacing: 4px;
            text-shadow: 0 0 10px var(--imperial-red);
            background: linear-gradient(to right, var(--hoth-white), var(--carbonite));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            animation: textGlow 3s infinite alternate;
            font-family: 'Star Wars', 'Orbitron', sans-serif;
            position: relative;
        }
        
        .logo-text::after {
            content: "GALACTIC EMPIRE";
            position: absolute;
            top: 0;
            left: 0;
            background: linear-gradient(to right, var(--imperial-red), var(--lightsaber-red));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            z-index: -1;
            filter: blur(2px);
        }
        
        @keyframes textGlow {
            0% { text-shadow: 0 0 10px var(--imperial-red); }
            100% { text-shadow: 0 0 20px var(--imperial-red), 0 0 30px var(--lightsaber-red); }
        }
        
        .status-bar {
            margin-left: auto;
            display: flex;
            gap: 2.5rem;
            align-items: center;
        }
        
        .status-indicator {
            display: flex;
            flex-direction: column;
            align-items: center;
            font-size: 0.9rem;
            color: var(--carbonite);
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .status-value {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--hoth-white);
            margin-top: 0.3rem;
            position: relative;
        }
        
        .status-value::after {
            content: "";
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(to right, var(--imperial-red), transparent);
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .status-indicator:hover .status-value::after {
            opacity: 1;
        }
        
        /* Navigation - Imperial Console with TIE fighter panel styling */
        .command-nav {
            grid-area: nav;
            background: linear-gradient(to bottom, 
                rgba(10,10,10,0.95) 0%, 
                rgba(20,20,20,0.9) 100%);
            border-right: 1px solid rgba(225,11,11,0.3);
            padding: 2.5rem 1.5rem;
            display: flex;
            flex-direction: column;
            gap: 1.2rem;
            position: relative;
            overflow: hidden;
        }
        
        .command-nav::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                linear-gradient(rgba(225,11,11,0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(225,11,11,0.05) 1px, transparent 1px);
            background-size: 20px 20px;
            pointer-events: none;
            opacity: 0.5;
        }
        
        .command-nav::after {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(to bottom, 
                transparent, 
                var(--imperial-red), 
                transparent);
            opacity: 0.3;
        }
        
        .nav-title {
            color: var(--carbonite);
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 1.5rem;
            padding-left: 1rem;
            position: relative;
            font-weight: 500;
        }
        
        .nav-title::after {
            content: "";
            position: absolute;
            bottom: -8px;
            left: 1rem;
            width: 50%;
            height: 2px;
            background: linear-gradient(to right, var(--carbonite), transparent);
        }
        
        .nav-link {
            display: flex;
            align-items: center;
            gap: 1.2rem;
            padding: 1rem 1.2rem;
            color: var(--hoth-white);
            text-decoration: none;
            border-radius: 4px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            font-weight: 500;
            font-size: 1rem;
            border-left: 3px solid transparent;
        }
        
        .nav-link::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(225,11,11,0.2), transparent);
            transition: all 0.6s ease;
        }
        
        .nav-link:hover {
            background: rgba(30,30,30,0.7);
            color: var(--rebel-yellow);
            transform: translateX(8px);
            border-left: 3px solid var(--imperial-red);
        }
        
        .nav-link:hover::before {
            left: 100%;
        }
        
        .nav-link.active {
            background: rgba(225,11,11,0.2);
            color: var(--rebel-yellow);
            border-left: 3px solid var(--imperial-red);
            box-shadow: inset 0 0 15px rgba(225,11,11,0.3);
        }
        
        .nav-link i {
            width: 24px;
            text-align: center;
            font-size: 1.2rem;
        }
        
        /* Main Content Area - Holographic Display with Death Star surface effect */
        .command-main {
            grid-area: main;
            background: 
                linear-gradient(to bottom, 
                    rgba(0,5,15,0.9) 0%, 
                    rgba(0,10,20,0.95) 100%),
                url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><circle cx="50" cy="50" r="40" fill="none" stroke="rgba(0,162,255,0.05)" stroke-width="2"/><circle cx="50" cy="50" r="30" fill="none" stroke="rgba(0,162,255,0.05)" stroke-width="2"/><circle cx="50" cy="50" r="20" fill="none" stroke="rgba(0,162,255,0.05)" stroke-width="2"/></svg>');
            padding: 3rem;
            position: relative;
            overflow: auto;
        }
        
        .command-main::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                linear-gradient(rgba(0,162,255,0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0,162,255,0.03) 1px, transparent 1px);
            background-size: 40px 40px;
            pointer-events: none;
        }
        
        .command-main::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 30%;
            background: linear-gradient(to top, rgba(0,10,20,1) 0%, transparent 100%);
            pointer-events: none;
        }
        
        /* Footer - Imperial Status with animated text */
        .command-footer {
            grid-area: footer;
            background: linear-gradient(to right, 
                rgba(0,0,0,0.9) 0%, 
                rgba(20,20,20,0.95) 50%, 
                rgba(0,0,0,0.9) 100%);
            border-top: 1px solid rgba(225,11,11,0.3);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 3rem;
            font-size: 0.9rem;
            color: var(--carbonite);
            position: relative;
        }
        
        .command-footer::before {
            content: "";
            position: absolute;
            top: -5px;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(to right, 
                transparent 0%,
                var(--imperial-red) 20%,
                var(--imperial-red) 80%,
                transparent 100%);
            opacity: 0.5;
        }
        
        .footer-text {
            display: flex;
            gap: 3rem;
        }
        
        .footer-text span {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            position: relative;
        }
        
        .footer-text span::after {
            content: "";
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 1px;
            background: var(--carbonite);
            transition: width 0.3s ease;
        }
        
        .footer-text span:hover::after {
            width: 100%;
        }
        
        /* Content Styling - Imperial Data Panels */
        .panel {
            background: rgba(0,15,30,0.7);
            border: 1px solid rgba(0,162,255,0.2);
            border-radius: 8px;
            padding: 2rem;
            margin-bottom: 2.5rem;
            box-shadow: 0 0 25px rgba(0,0,0,0.6);
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .panel::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(0,162,255,0.05) 0%, transparent 50%, rgba(0,162,255,0.05) 100%);
            pointer-events: none;
        }
        
        .panel::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 100 100"><rect x="0" y="0" width="100" height="100" fill="none" stroke="rgba(0,162,255,0.05)" stroke-width="2"/></svg>');
            pointer-events: none;
        }
        
        .panel-title {
            color: var(--carbonite);
            font-size: 1.5rem;
            margin-bottom: 1.8rem;
            padding-bottom: 0.8rem;
            border-bottom: 1px solid rgba(0,162,255,0.3);
            display: flex;
            align-items: center;
            gap: 1rem;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        
        .panel-title i {
            font-size: 1.6rem;
        }
        
        /* Buttons - Lightsaber Inspired with sound effects */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.8rem;
            padding: 0.8rem 1.5rem;
            font-family: 'Orbitron', sans-serif;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            font-size: 0.9rem;
        }
        
        .btn-primary {
            background: linear-gradient(to right, var(--lightsaber-blue), #0066cc);
            color: white;
            box-shadow: 0 0 15px rgba(0,162,255,0.6);
        }
        
        .btn-primary:hover {
            background: linear-gradient(to right, #00b4ff, #0080ff);
            box-shadow: 0 0 25px rgba(0,162,255,0.9);
            transform: translateY(-3px);
        }
        
        .btn-primary:active {
            transform: translateY(1px);
            box-shadow: 0 0 10px rgba(0,162,255,0.6);
        }
        
        .btn-danger {
            background: linear-gradient(to right, var(--lightsaber-red), #cc0000);
            color: white;
            box-shadow: 0 0 15px rgba(255,42,42,0.6);
        }
        
        .btn-danger:hover {
            background: linear-gradient(to right, #ff4242, #ff0000);
            box-shadow: 0 0 25px rgba(255,42,42,0.9);
            transform: translateY(-3px);
        }
        
        .btn-danger:active {
            transform: translateY(1px);
            box-shadow: 0 0 10px rgba(255,42,42,0.6);
        }
        
        .btn::after {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: all 0.6s ease;
        }
        
        .btn:hover::after {
            left: 100%;
        }
        
        /* Form Elements - Imperial Data Entry */
        .form-group {
            margin-bottom: 2rem;
        }
        
        .form-label {
            display: block;
            margin-bottom: 0.8rem;
            color: var(--carbonite);
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        
        .form-control {
            width: 100%;
            padding: 1rem 1.2rem;
            background: rgba(0,20,40,0.7);
            border: 1px solid rgba(0,162,255,0.3);
            border-radius: 6px;
            color: var(--hoth-white);
            font-family: 'Electrolize', sans-serif;
            transition: all 0.3s ease;
            font-size: 1rem;
        }
        
        .form-control:focus {
            outline: none;
            border-color: var(--lightsaber-blue);
            box-shadow: 0 0 15px rgba(0,162,255,0.6);
            background: rgba(0,30,60,0.7);
        }
        
        /* Table Styling - Imperial Data Grid */
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 2rem;
            position: relative;
        }
        
        .table::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, transparent 95%, rgba(0,162,255,0.1) 100%);
            pointer-events: none;
        }
        
        .table th {
            background: rgba(0,162,255,0.2);
            color: var(--carbonite);
            text-transform: uppercase;
            font-size: 0.9rem;
            letter-spacing: 2px;
            padding: 1.2rem;
            text-align: left;
            border-bottom: 2px solid rgba(0,162,255,0.3);
            position: sticky;
            top: 0;
        }
        
        .table td {
            padding: 1.2rem;
            border-bottom: 1px solid rgba(0,162,255,0.1);
            font-family: 'Electrolize', sans-serif;
            transition: all 0.3s ease;
        }
        
        .table tr:hover td {
            background: rgba(0,162,255,0.1);
            color: var(--rebel-yellow);
        }
        
        /* Responsive Adjustments */
        @media (max-width: 1200px) {
            .galactic-container {
                grid-template-columns: 1fr;
                grid-template-rows: auto auto 1fr auto;
                grid-template-areas:
                    "header"
                    "nav"
                    "main"
                    "footer";
            }
            
            .command-nav {
                border-right: none;
                border-bottom: 1px solid rgba(225,11,11,0.3);
                padding: 1.5rem;
            }
            
            .nav-links {
                display: flex;
                flex-wrap: wrap;
                gap: 0.8rem;
            }
            
            .nav-link {
                padding: 0.8rem 1rem;
            }
            
            .command-main {
                padding: 2rem;
            }
        }
        
        @media (max-width: 768px) {
            .status-bar {
                display: none;
            }
            
            .footer-text {
                flex-direction: column;
                gap: 0.8rem;
            }
            
            .command-header, .command-footer {
                padding: 0 1.5rem;
            }
            
            .panel {
                padding: 1.5rem;
            }
        }
        
        /* Animation Classes */
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
        }
        
        .animate-pulse {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
        
        /* Special Effects - Holographic elements */
        .scanlines {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                linear-gradient(rgba(0,0,0,0.1) 1px, transparent 1px);
            background-size: 100% 3px;
            pointer-events: none;
            z-index: 1000;
            animation: scanlineScroll 80s linear infinite;
            opacity: 0.2;
        }
        
        @keyframes scanlineScroll {
            0% { background-position: 0 0; }
            100% { background-position: 0 100%; }
        }
        
        .corner-decoration {
            position: absolute;
            width: 40px;
            height: 40px;
            border: 3px solid var(--lightsaber-blue);
            opacity: 0.7;
            z-index: 5;
        }
        
        .corner-tl {
            top: 15px;
            left: 15px;
            border-right: none;
            border-bottom: none;
            animation: cornerGlow 4s infinite alternate;
        }
        
        .corner-tr {
            top: 15px;
            right: 15px;
            border-left: none;
            border-bottom: none;
            animation: cornerGlow 4s infinite alternate-reverse;
        }
        
        .corner-bl {
            bottom: 15px;
            left: 15px;
            border-right: none;
            border-top: none;
            animation: cornerGlow 4s infinite alternate-reverse;
        }
        
        .corner-br {
            bottom: 15px;
            right: 15px;
            border-left: none;
            border-top: none;
            animation: cornerGlow 4s infinite alternate;
        }
        
        @keyframes cornerGlow {
            0% { box-shadow: 0 0 10px var(--lightsaber-blue); }
            100% { box-shadow: 0 0 20px var(--lightsaber-blue); }
        }
        
        /* Death Star trench effect */
        .trench-run {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100px;
            background: linear-gradient(to top, rgba(0,0,0,1) 0%, transparent 100%);
            z-index: 100;
            pointer-events: none;
        }
        
        /* Star Destroyer silhouette */
        .star-destroyer {
            position: fixed;
            bottom: 50px;
            right: -200px;
            width: 600px;
            height: 200px;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 600 200"><path d="M0,200 L50,100 L150,50 L250,0 L350,50 L450,100 L500,200 Z" fill="rgba(30,30,30,0.2)"/><path d="M250,0 L350,50 L450,100 L500,200 L400,200 L300,150 L200,200 L100,200 L50,100 L150,50 Z" fill="rgba(40,40,40,0.1)"/></svg>');
            background-size: contain;
            background-repeat: no-repeat;
            z-index: -1;
            animation: destroyerFloat 60s linear infinite;
        }
        
        @keyframes destroyerFloat {
            0% { transform: translateX(0) translateY(0); opacity: 0; }
            10% { opacity: 0.3; }
            90% { opacity: 0.3; }
            100% { transform: translateX(-1000px) translateY(-100px); opacity: 0; }
        }
        
        /* Hyperdrive charging effect */
        .hyperdrive-charge {
            position: fixed;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            transform: translate(-50%, -50%);
            box-shadow: 0 0 0 0 rgba(0,162,255,0.7);
            z-index: 100;
            pointer-events: none;
        }
        
        .hyperdrive-active {
            animation: hyperdriveCharge 3s ease-out;
        }
        
        @keyframes hyperdriveCharge {
            0% { width: 0; height: 0; box-shadow: 0 0 0 0 rgba(0,162,255,0.7); }
            100% { width: 200vw; height: 200vw; box-shadow: 0 0 0 1000px rgba(0,162,255,0); }
        }
        
        /* X-Wing flyby animation */
        .x-wing {
            position: fixed;
            top: 20%;
            left: -200px;
            width: 200px;
            height: 100px;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 100"><path d="M0,50 L40,50 L60,30 L80,50 L120,50 L140,30 L160,50 L200,50 L180,70 L160,50 L140,70 L120,50 L80,50 L60,70 L40,50 Z" fill="rgba(42,117,187,0.2)"/></svg>');
            background-size: contain;
            background-repeat: no-repeat;
            z-index: -1;
            animation: xwingFlyby 45s linear infinite;
            opacity: 0;
        }
        
        @keyframes xwingFlyby {
            0% { transform: translateX(0) translateY(0) rotate(0deg); opacity: 0; }
            10% { opacity: 0.4; transform: rotate(-5deg); }
            30% { opacity: 0.4; transform: rotate(5deg); }
            50% { opacity: 0.4; transform: rotate(-3deg); }
            70% { opacity: 0.4; transform: rotate(2deg); }
            90% { opacity: 0.4; transform: rotate(0deg); }
            100% { transform: translateX(1500px) translateY(100px); opacity: 0; }
        }
        
        /* Death Star planet in background */
        .death-star {
            position: fixed;
            bottom: -300px;
            right: -300px;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle at 30% 30%, 
                var(--death-star-gray) 0%, 
                var(--tie-fighter-gray) 50%, 
                transparent 70%);
            border-radius: 50%;
            z-index: -2;
            opacity: 0.2;
            animation: deathStarRotate 300s linear infinite;
        }
        
        @keyframes deathStarRotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        /* Imperial cog pattern overlay */
        .imperial-cog {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 200 200"><path d="M100,0 L120,60 L180,60 L130,100 L180,140 L120,140 L100,200 L80,140 L20,140 L70,100 L20,60 L80,60 Z" fill="rgba(225,11,11,0.02)"/></svg>');
            background-size: 200px 200px;
            z-index: -1;
            pointer-events: none;
            opacity: 0.1;
        }
        
        /* Holographic projection effect */
        .hologram {
            position: relative;
        }
        
        .hologram::before {
            content: "";
            position: absolute;
            top: -10px;
            left: -10px;
            right: -10px;
            bottom: -10px;
            background: 
                linear-gradient(45deg, 
                    transparent 45%, 
                    var(--hologram-blue) 50%, 
                    transparent 55%),
                linear-gradient(-45deg, 
                    transparent 45%, 
                    var(--hologram-blue) 50%, 
                    transparent 55%);
            background-size: 20px 20px;
            z-index: -1;
            border-radius: 8px;
            opacity: 0.5;
            animation: hologramPulse 4s infinite alternate;
        }
        
        @keyframes hologramPulse {
            0% { opacity: 0.3; }
            100% { opacity: 0.7; }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @stack('styles')
</head>
<body>
    <div class="scanlines"></div>
    <div class="death-star-pattern"></div>
    <div class="imperial-cog"></div>
    <div class="death-star"></div>
    <div class="star-destroyer"></div>
    <div class="x-wing"></div>
    <div class="trench-run"></div>
    <div class="hyperdrive-charge"></div>
    
    <div class="galactic-container">
        <!-- Header -->
        <header class="command-header">
            <div class="logo">
                <div class="logo-icon"></div>
                <div class="logo-text">IMPERIAL COMMAND</div>
            </div>
            
            <div class="status-bar">
                <div class="status-indicator">
                    <span>SYSTEM STATUS</span>
                    <span class="status-value">OPERATIONAL</span>
                </div>
                <div class="status-indicator">
                    <span>ALERT LEVEL</span>
                    <span class="status-value">GREEN</span>
                </div>
                <div class="status-indicator">
                    <span>POWER</span>
                    <span class="status-value">98%</span>
                </div>
                <div class="status-indicator">
                    <span>FLEET STATUS</span>
                    <span class="status-value">READY</span>
                </div>
            </div>
        </header>
        
        <!-- Navigation -->
        <nav class="command-nav">
            <h3 class="nav-title">Main Navigation</h3>
            <a href="/admin/dashboard" class="nav-link active">
                <i class="fas fa-command"></i>
                <span>COMMAND CENTER</span>
            </a>
            <a href="/admin/users" class="nav-link">
                <i class="fas fa-users"></i>
                <span>CREW MANIFEST</span>
            </a>
            <a href="/logs" class="nav-link">
                <i class="fas fa-clipboard-list"></i>
                <span>MISSION LOGS</span>
            </a>
            <a href="/admin/users/create" class="nav-link">
                <i class="fas fa-user-plus"></i>
                <span>REGISTER TROOPS</span>
            </a>
            
            <h3 class="nav-title" style="margin-top: 2rem;">Systems</h3>
            <a href="#" class="nav-link">
                <i class="fas fa-shield-alt"></i>
                <span>DEFENSE GRID</span>
            </a>
            <a href="#" class="nav-link">
                <i class="fas fa-satellite-dish"></i>
                <span>COMMUNICATIONS</span>
            </a>
            <a href="#" class="nav-link">
                <i class="fas fa-rocket"></i>
                <span>FLEET CONTROL</span>
            </a>
            <a href="#" class="nav-link">
                <i class="fas fa-database"></i>
                <span>HOLONET ACCESS</span>
            </a>
        </nav>
        
        <!-- Main Content -->
        <main class="command-main">
            <div class="corner-decoration corner-tl"></div>
            <div class="corner-decoration corner-tr"></div>
            <div class="corner-decoration corner-bl"></div>
            <div class="corner-decoration corner-br"></div>
            
            @yield('content')
        </main>
        
        <!-- Footer -->
        <footer class="command-footer">
            <div class="footer-text">
                <span>
                    <i class="fas fa-server"></i>
                    ISD-COMP-CORE-ALPHA
                </span>
                <span>
                    <i class="fas fa-clock"></i>
                    <span id="imperial-time">--:--:-- IST</span>
                </span>
                <span>
                    <i class="fas fa-map-marked-alt"></i>
                    SECTOR 0-0-1
                </span>
                <span>
                    <i class="fas fa-broadcast-tower"></i>
                    COMM-LINK: ACTIVE
                </span>
            </div>
            <div>
                <span>IMPERIAL NETWORK v5.7.2 | STARDATE <span id="stardate">4101.05</span></span>
            </div>
        </footer>
    </div>

    <script>
        // Update Imperial Standard Time
        function updateImperialTime() {
            const now = new Date();
            const hours = now.getHours().toString().padStart(2, '0');
            const minutes = now.getMinutes().toString().padStart(2, '0');
            const seconds = now.getSeconds().toString().padStart(2, '0');
            document.getElementById('imperial-time').textContent = `${hours}:${minutes}:${seconds} IST`;
        }
        
        setInterval(updateImperialTime, 1000);
        updateImperialTime();
        
        // Random hyperdrive charge effect
        setInterval(() => {
            const hyperdrive = document.querySelector('.hyperdrive-charge');
            hyperdrive.classList.add('hyperdrive-active');
            setTimeout(() => {
                hyperdrive.classList.remove('hyperdrive-active');
            }, 3000);
        }, 30000);
    </script>
</body>
</html>