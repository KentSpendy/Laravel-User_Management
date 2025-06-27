<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SITH RECRUITMENT | DARK ORDER</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700;900&display=swap');
        
        :root {
            --sith-red: #e10b0b;
            --sith-dark: #111;
            --sith-gray: #333;
            --lightsaber-red: #ff2a2a;
            --force-dark: #2a0080;
            --starfield-size: 300px;
        }
        
        body {
            background-color: #000;
            color: #ccc;
            font-family: 'Orbitron', sans-serif;
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            background-image: 
                radial-gradient(ellipse at center, rgba(0,0,0,0) 0%, rgba(0,0,0,1) 100%),
                url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="300" height="300" opacity="0.8"><circle cx="%23{Math.random()*300}" cy="%23{Math.random()*300}" r="1.2" fill="%23e10b0b"/><circle cx="%23{Math.random()*300}" cy="%23{Math.random()*300}" r="0.8" fill="%23ff2a2a"/><circle cx="%23{Math.random()*300}" cy="%23{Math.random()*300}" r="0.5" fill="%23e10b0b"/></svg>');
            background-size: var(--starfield-size) var(--starfield-size);
            animation: starfieldScroll 200s linear infinite;
        }
        
        @keyframes starfieldScroll {
            0% { background-position: 0 0; }
            100% { background-position: var(--starfield-size) var(--starfield-size); }
        }
        
        /* Sith Fleet in background */
        .sith-fleet-bg {
            position: fixed;
            width: 600px;
            height: 200px;
            right: -300px;
            top: 20%;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 600 200"><path d="M50,100 L150,50 L550,50 L500,100 L550,150 L150,150 Z" fill="rgba(0,0,0,0.3)" stroke="%23e10b0b" stroke-width="1"/></svg>');
            background-size: contain;
            background-repeat: no-repeat;
            opacity: 0.4;
            z-index: -1;
            animation: sithFleetFloat 120s linear infinite;
            filter: drop-shadow(0 0 10px var(--lightsaber-red));
        }
        
        @keyframes sithFleetFloat {
            0% { transform: translateX(0) translateY(0); }
            50% { transform: translateX(-50px) translateY(50px); }
            100% { transform: translateX(0) translateY(0); }
        }
        
        /* Sith Temple in corner */
        .sith-temple {
            position: fixed;
            width: 200px;
            height: 200px;
            bottom: -50px;
            left: -50px;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200"><path d="M100,10 L190,190 L10,190 Z" fill="rgba(0,0,0,0.2)" stroke="%23e10b0b" stroke-width="1"/><path d="M100,50 L160,190 L40,190 Z" fill="rgba(51,51,51,0.3)" stroke="%23e10b0b" stroke-width="0.5"/></svg>');
            background-size: contain;
            background-repeat: no-repeat;
            z-index: -1;
            opacity: 0.4;
            animation: sithTempleGlow 30s linear infinite;
        }
        
        @keyframes sithTempleGlow {
            0%, 100% { filter: drop-shadow(0 0 5px var(--sith-red)); }
            50% { filter: drop-shadow(0 0 20px var(--lightsaber-red)); }
        }
        
        /* Sith Probe Droid animation */
        .probe-droid {
            position: fixed;
            width: 40px;
            height: 40px;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 40 40"><circle cx="20" cy="20" r="15" fill="black" stroke="%23e10b0b" stroke-width="1"/><circle cx="20" cy="20" r="5" fill="%23e10b0b"/><path d="M20,5 L20,15 M5,20 L15,20 M25,20 L35,20 M20,25 L20,35" stroke="%23e10b0b" stroke-width="1"/></svg>');
            background-size: contain;
            background-repeat: no-repeat;
            z-index: -1;
            animation: probeFly 20s linear infinite;
            opacity: 0.6;
        }
        
        @keyframes probeFly {
            0% { transform: translateX(-100px) translateY(0) rotate(0deg); }
            100% { transform: translateX(calc(100vw + 100px)) translateY(100px) rotate(360deg); }
        }
        
        /* Dark Side aura effect */
        .dark-aura {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(ellipse at center, rgba(225,11,11,0.05) 0%, rgba(0,0,0,0) 70%);
            pointer-events: none;
            z-index: -1;
            animation: darkPulse 15s infinite alternate;
        }
        
        @keyframes darkPulse {
            0% { opacity: 0.1; }
            100% { opacity: 0.3; }
        }
        
        /* Main container */
        .container {
            background: rgba(10, 0, 10, 0.9);
            border: 2px solid var(--sith-red);
            box-shadow: 0 0 30px rgba(225, 11, 11, 0.5),
                        inset 0 0 20px rgba(225, 11, 11, 0.3);
            padding: 30px;
            max-width: 400px;
            width: 100%;
            margin: 20px auto;
            position: relative;
            overflow: hidden;
            transition: all 0.5s ease;
        }
        
        .container:hover {
            box-shadow: 0 0 40px rgba(225, 11, 11, 0.7),
                        inset 0 0 30px rgba(225, 11, 11, 0.4);
        }
        
        .container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                linear-gradient(rgba(225,11,11,0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(225,11,11,0.05) 1px, transparent 1px);
            background-size: 40px 40px;
            pointer-events: none;
        }
        
        h2 {
            color: #ccc;
            text-shadow: 0 0 10px var(--sith-red), 
                         0 0 20px var(--lightsaber-red);
            margin-bottom: 30px;
            font-size: 1.8rem;
            letter-spacing: 3px;
            text-align: center;
            text-transform: uppercase;
            padding-bottom: 15px;
            border-bottom: 1px solid rgba(225, 11, 11, 0.5);
            position: relative;
            animation: titleGlow 3s infinite alternate;
        }
        
        @keyframes titleGlow {
            0% { text-shadow: 0 0 10px var(--sith-red), 0 0 20px var(--lightsaber-red); }
            100% { text-shadow: 0 0 15px var(--sith-red), 0 0 30px var(--lightsaber-red); }
        }
        
        h2::after {
            content: "";
            position: absolute;
            bottom: -5px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 2px;
            background: linear-gradient(to right, transparent, var(--sith-red), transparent);
            animation: titleUnderline 3s infinite alternate;
        }
        
        @keyframes titleUnderline {
            0% { width: 100px; }
            100% { width: 200px; }
        }
        
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        
        input {
            background-color: rgba(0, 0, 0, 0.8);
            border: 2px solid var(--sith-red);
            color: #ccc;
            padding: 12px;
            font-family: 'Orbitron', sans-serif;
            font-size: 12px;
            outline: none;
            box-shadow: 0 0 5px var(--sith-red),
                         inset 0 0 5px rgba(225,11,11,0.3);
            transition: all 0.3s;
            width: 100%;
            box-sizing: border-box;
        }
        
        input:focus {
            border-color: var(--lightsaber-red);
            box-shadow: 0 0 10px var(--lightsaber-red),
                       inset 0 0 10px rgba(225,11,11,0.5);
        }
        
        input::placeholder {
            color: var(--sith-red);
            opacity: 0.7;
        }
        
        button {
            background: linear-gradient(to bottom, var(--sith-red), var(--force-dark));
            color: #ccc;
            border: none;
            padding: 12px;
            font-family: 'Orbitron', sans-serif;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
            box-shadow: 0 5px 0 #8a0808, 
                        0 0 10px var(--sith-red),
                        inset 0 0 10px rgba(0,0,0,0.5);
            margin-top: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        button:hover {
            background: linear-gradient(to bottom, var(--lightsaber-red), var(--force-dark));
            box-shadow: 0 5px 0 #8a0808, 
                        0 0 20px var(--lightsaber-red),
                        inset 0 0 10px rgba(0,0,0,0.5);
        }
        
        button:active {
            transform: translateY(5px);
            box-shadow: 0 0 0 #8a0808, 
                        0 0 30px var(--lightsaber-red),
                        inset 0 0 10px rgba(0,0,0,0.5);
        }
        
        button::after {
            content: "";
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                to bottom right, 
                rgba(255,255,255,0) 45%,
                rgba(255,0,0,0.8) 50%,
                rgba(255,255,255,0) 55%
            );
            transform: rotate(30deg);
            opacity: 0;
            transition: all 0.5s;
        }
        
        button:hover::after {
            opacity: 1;
            left: 100%;
        }
        
        .message {
            margin: 20px 0;
            font-size: 12px;
            padding: 10px;
            border-radius: 4px;
            text-align: center;
        }
        
        .success {
            background: rgba(0, 0, 0, 0.5);
            border: 1px solid var(--sith-red);
            color: #ccc;
            text-shadow: 0 0 5px var(--sith-red);
            animation: successPulse 2s infinite alternate;
        }
        
        @keyframes successPulse {
            0% { opacity: 0.7; box-shadow: 0 0 5px var(--sith-red); }
            100% { opacity: 1; box-shadow: 0 0 15px var(--sith-red); }
        }
        
        .error-list {
            list-style-type: none;
            padding: 10px;
            font-size: 10px;
            color: var(--lightsaber-red);
            text-shadow: 0 0 5px var(--lightsaber-red);
            margin-bottom: 20px;
            background: rgba(0, 0, 0, 0.5);
            border: 1px solid var(--sith-red);
            box-shadow: inset 0 0 10px rgba(225,11,11,0.3);
        }
        
        .error-list li {
            margin-bottom: 5px;
            animation: errorShake 0.5s;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        @keyframes errorShake {
            0%, 100% { transform: translateX(0); }
            20%, 60% { transform: translateX(-5px); }
            40%, 80% { transform: translateX(5px); }
        }
        
        .sith-corner {
            position: absolute;
            width: 40px;
            height: 40px;
            border: 3px solid var(--sith-red);
            opacity: 0.7;
            z-index: 5;
            box-shadow: 0 0 10px var(--sith-red);
        }
        
        .top-left {
            top: 0;
            left: 0;
            border-right: none;
            border-bottom: none;
            animation: cornerGlow 4s infinite alternate;
        }
        
        .top-right {
            top: 0;
            right: 0;
            border-left: none;
            border-bottom: none;
            animation: cornerGlow 4s infinite alternate-reverse;
        }
        
        .bottom-left {
            bottom: 0;
            left: 0;
            border-right: none;
            border-top: none;
            animation: cornerGlow 4s infinite alternate-reverse;
        }
        
        .bottom-right {
            bottom: 0;
            right: 0;
            border-left: none;
            border-top: none;
            animation: cornerGlow 4s infinite alternate;
        }
        
        @keyframes cornerGlow {
            0% { box-shadow: 0 0 10px var(--sith-red); opacity: 0.7; }
            100% { box-shadow: 0 0 20px var(--lightsaber-red); opacity: 1; }
        }
        
        .login-link {
            margin-top: 20px;
            font-size: 10px;
            text-align: center;
            color: #666;
        }
        
        .login-link a {
            color: #ccc;
            text-decoration: none;
            transition: all 0.3s;
            text-shadow: 0 0 5px var(--sith-red);
            position: relative;
        }
        
        .login-link a:hover {
            color: var(--lightsaber-red);
            text-shadow: 0 0 10px var(--lightsaber-red);
        }
        
        .login-link a::after {
            content: "";
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 1px;
            background: var(--sith-red);
            transition: width 0.3s ease;
        }
        
        .login-link a:hover::after {
            width: 100%;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }
            
            h2 {
                font-size: 1.4rem;
            }
            
            .sith-fleet-bg,
            .sith-temple {
                display: none;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <!-- Dark Side Background Elements -->
    <div class="sith-fleet-bg"></div>
    <div class="sith-temple"></div>
    <div class="dark-aura"></div>
    
    <!-- Probe Droids -->
    <div class="probe-droid" style="top: 20%; animation-delay: 0s;"></div>
    <div class="probe-droid" style="top: 60%; animation-delay: 5s; animation-duration: 25s;"></div>
    
    <div class="container">
        <div class="sith-corner top-left"></div>
        <div class="sith-corner top-right"></div>
        <div class="sith-corner bottom-left"></div>
        <div class="sith-corner bottom-right"></div>
        
        <h2>
            <i class="fas fa-skull"></i>
            SITH INITIATION
        </h2>
        
        @if(session('success'))
            <div class="message success">
                <i class="fas fa-hand-fist"></i> {{ session('success') }}
            </div>
        @endif
        
        @if($errors->any())
            <ul class="error-list">
                @foreach ($errors->all() as $error)
                    <li><i class="fas fa-exclamation-triangle"></i> {{ $error }}</li>
                @endforeach
            </ul>
        @endif
        
        <form method="POST" action="{{ route('admin.users.store') }}">
            @csrf
            
            <input type="text" name="first_name" placeholder="SITH APPRENTICE NAME" required>
            <input type="text" name="last_name" placeholder="SITH LINEAGE" required>
            <input type="email" name="email" placeholder="DARK SIDE COMM CHANNEL" required>
            <input type="password" name="password" placeholder="FORCE SECRET" required>
            <input type="password" name="password_confirmation" placeholder="CONFIRM FORCE SECRET" required>
            <select name="role" required style="width: 100%; padding: 10px; border: 1px solid #b31212; border-radius: 5px; background-color: #111; color: #ad1818; font-family: 'Orbitron', sans-serif; font-size: 14px; text-transform: uppercase;">
                <option value="user" selected>Standard Sith (User)</option>
                <option value="admin">Dark Lord (Admin)</option>
            </select><br><br>
            
            <button type="submit">
                <i class="fas fa-hand-fist"></i> EMBRACE THE DARK SIDE
            </button>
        </form>
        
        <div class="login-link">
            Already initiated? <a href="/admin/users">ENTER THE SITH TEMPLE</a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add more Probe Droids
            setTimeout(() => {
                const probe = document.createElement('div');
                probe.className = 'probe-droid';
                probe.style.top = '40%';
                probe.style.animationDuration = '30s';
                document.body.appendChild(probe);
                
                setTimeout(() => {
                    document.body.removeChild(probe);
                }, 30000);
            }, 8000);
            
            // Add random Sith transmission effect
            setInterval(() => {
                const transmission = document.createElement('div');
                transmission.style.position = 'fixed';
                transmission.style.top = '0';
                transmission.style.left = '0';
                transmission.style.width = '100%';
                transmission.style.height = '100%';
                transmission.style.background = 'linear-gradient(90deg, rgba(0,0,0,0) 0%, rgba(225,11,11,0.1) 50%, rgba(0,0,0,0) 100%)';
                transmission.style.zIndex = '-1';
                transmission.style.animation = 'darkTransmit 3s linear';
                document.body.appendChild(transmission);
                
                setTimeout(() => {
                    document.body.removeChild(transmission);
                }, 3000);
            }, 15000);
            
            // Add hover effect to form inputs
            document.querySelectorAll('input').forEach(input => {
                input.addEventListener('focus', () => {
                    input.style.animation = 'inputFocusPulse 1s infinite alternate';
                });
                
                input.addEventListener('blur', () => {
                    input.style.animation = 'none';
                });
            });
        });
    </script>
</body>
</html>