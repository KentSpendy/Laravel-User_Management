<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORCE VERIFICATION | GALACTIC SECURITY</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700;900&display=swap');
        
        :root {
            --jedi-blue: #00a2ff;
            --sith-red: #e10b0b;
            --lightsaber-blue: #00f0ff;
            --lightsaber-red: #ff2a2a;
            --force-light: #ffe81f;
            --force-dark: #2a0080;
            --starfield-size: 200px;
        }
        
        body {
            background-color: #0a0a20;
            background-image: 
                radial-gradient(1px 1px at 20px 30px, var(--lightsaber-blue), rgba(0,0,0,0)),
                radial-gradient(1px 1px at 40px 70px, var(--lightsaber-red), rgba(0,0,0,0)),
                radial-gradient(1px 1px at 90px 40px, var(--jedi-blue), rgba(0,0,0,0)),
                radial-gradient(1px 1px at 130px 80px, var(--sith-red), rgba(0,0,0,0)),
                radial-gradient(1px 1px at 160px 120px, var(--force-light), rgba(0,0,0,0));
            background-size: var(--starfield-size) var(--starfield-size);
            font-family: 'Orbitron', sans-serif;
            color: var(--lightsaber-blue);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
            line-height: 1.6;
            animation: starfieldScroll 200s linear infinite;
        }

        @keyframes starfieldScroll {
            0% { background-position: 0 0; }
            100% { background-position: var(--starfield-size) var(--starfield-size); }
        }
        
        /* Force Clash Effect */
        .force-clash {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                90deg, 
                rgba(0, 162, 255, 0.1) 0%, 
                rgba(0, 162, 255, 0) 50%, 
                rgba(225, 11, 11, 0.1) 100%
            );
            z-index: -1;
            animation: forcePulse 8s infinite alternate;
        }

        @keyframes forcePulse {
            0% { opacity: 0.1; }
            50% { opacity: 0.3; }
            100% { opacity: 0.1; }
        }
        
        .container {
            background-color: rgba(10, 10, 40, 0.85);
            border: 4px solid transparent;
            border-image: linear-gradient(45deg, var(--jedi-blue), var(--sith-red)) 1;
            box-shadow: 0 0 20px var(--jedi-blue), 
                        0 0 20px var(--sith-red),
                        inset 0 0 10px rgba(0,0,0,0.8);
            padding: 30px;
            max-width: 400px;
            width: 100%;
            text-align: center;
            position: relative;
            overflow: hidden;
            animation: borderGlow 4s infinite alternate;
        }

        @keyframes borderGlow {
            0% { 
                box-shadow: 
                    0 0 15px var(--jedi-blue), 
                    0 0 10px var(--sith-red);
            }
            50% { 
                box-shadow: 
                    0 0 25px var(--jedi-blue), 
                    0 0 15px var(--sith-red);
            }
            100% { 
                box-shadow: 
                    0 0 15px var(--jedi-blue), 
                    0 0 25px var(--sith-red);
            }
        }
        
        .container::before {
            content: "";
            position: absolute;
            top: -10px;
            left: -10px;
            right: -10px;
            bottom: -10px;
            background: linear-gradient(45deg, var(--sith-red), var(--jedi-blue), var(--force-light));
            z-index: -1;
            filter: blur(20px);
            opacity: 0.3;
        }
        
        h2 {
            color: white;
            text-shadow: 0 0 10px var(--jedi-blue), 
                         0 0 10px var(--sith-red);
            margin-bottom: 30px;
            font-size: 24px;
            letter-spacing: 2px;
            position: relative;
        }

        h2::before, h2::after {
            content: "";
            position: absolute;
            top: 50%;
            width: 30%;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--jedi-blue), transparent);
        }

        h2::before {
            left: 0;
        }

        h2::after {
            right: 0;
            background: linear-gradient(90deg, transparent, var(--sith-red), transparent);
        }
        
        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        
        input {
            background-color: rgba(0, 0, 30, 0.8);
            border: 2px solid transparent;
            border-image: linear-gradient(90deg, var(--jedi-blue), var(--sith-red)) 1;
            color: var(--lightsaber-blue);
            padding: 12px;
            font-family: 'Orbitron', sans-serif;
            font-size: 12px;
            outline: none;
            box-shadow: 0 0 5px var(--jedi-blue),
                        0 0 5px var(--sith-red);
            transition: all 0.3s;
            text-align: center;
            letter-spacing: 5px;
        }
        
        input:focus {
            box-shadow: 0 0 10px var(--jedi-blue),
                        0 0 10px var(--sith-red);
        }
        
        input::placeholder {
            color: var(--force-light);
            opacity: 0.7;
            letter-spacing: normal;
        }
        
        button {
            background: linear-gradient(90deg, var(--jedi-blue), var(--sith-red));
            color: white;
            border: none;
            padding: 12px;
            font-family: 'Orbitron', sans-serif;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
            box-shadow: 0 5px 0 var(--force-dark), 
                        0 0 10px var(--jedi-blue),
                        0 0 10px var(--sith-red);
            letter-spacing: 2px;
        }
        
        button:hover {
            box-shadow: 0 5px 0 var(--force-dark), 
                        0 0 20px var(--jedi-blue),
                        0 0 20px var(--sith-red);
        }
        
        button:active {
            transform: translateY(5px);
            box-shadow: 0 0 0 var(--force-dark), 
                        0 0 30px var(--jedi-blue),
                        0 0 30px var(--sith-red);
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
                rgba(255,255,255,0.8) 50%,
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
            margin-top: 20px;
            font-size: 12px;
        }
        
        .success {
            color: var(--force-light);
            text-shadow: 0 0 5px var(--force-light);
        }
        
        .error-list {
            list-style-type: none;
            padding: 0;
            font-size: 10px;
            color: var(--lightsaber-red);
            text-shadow: 0 0 5px var(--lightsaber-red);
        }
        
        .force-corner {
            position: absolute;
            width: 16px;
            height: 16px;
            box-shadow: 0 0 10px var(--jedi-blue),
                        0 0 10px var(--sith-red);
        }
        
        .top-left {
            top: 0;
            left: 0;
            clip-path: polygon(0 0, 0 100%, 100% 0);
            background: linear-gradient(135deg, var(--jedi-blue), transparent);
        }
        
        .top-right {
            top: 0;
            right: 0;
            clip-path: polygon(100% 0, 0 0, 100% 100%);
            background: linear-gradient(225deg, var(--sith-red), transparent);
        }
        
        .bottom-left {
            bottom: 0;
            left: 0;
            clip-path: polygon(0 100%, 0 0, 100% 100%);
            background: linear-gradient(45deg, var(--jedi-blue), transparent);
        }
        
        .bottom-right {
            bottom: 0;
            right: 0;
            clip-path: polygon(100% 100%, 0 100%, 100% 0);
            background: linear-gradient(315deg, var(--sith-red), transparent);
        }
        
        .otp-instructions {
            font-size: 10px;
            color: var(--force-light);
            margin-bottom: 20px;
            text-shadow: 0 0 5px var(--force-light);
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="force-clash"></div>
    
    <div class="container">
    <div class="force-corner top-left"></div>
    <div class="force-corner top-right"></div>
    <div class="force-corner bottom-left"></div>
    <div class="force-corner bottom-right"></div>
    
    <h2><i class="fas fa-shield-alt"></i> FORCE VERIFICATION</h2>
    
    <div class="otp-instructions">ENTER YOUR 6-DIGIT FORCE CODE</div>

    {{-- OTP Countdown --}}
    <div class="otp-countdown" style="margin-top: 10px; font-weight: bold;">
        <i class="fas fa-clock"></i> Expires in: <span id="countdown">05:00</span>
    </div>
    
    <form method="POST" action="{{ route('verify.otp') }}">
        @csrf
        <input type="text" name="otp" placeholder="000000" required maxlength="6" pattern="\d{6}">
        <button type="submit"><i class="fas fa-fingerprint"></i> AUTHENTICATE</button>
    </form>
    
    @if(session('success'))
        <div class="message success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <ul class="error-list">
            @foreach($errors->all() as $error)
                <li><i class="fas fa-exclamation-triangle"></i> {{ $error }}</li>
            @endforeach
        </ul>
    @endif
</div>

    <script>

        const expiresAt = {{ session('otp_expires_at') ?? 'null' }};
    if (expiresAt) {
        const countdownEl = document.getElementById('countdown');
        const interval = setInterval(() => {
            const now = Math.floor(Date.now() / 1000);
            let diff = expiresAt - now;

            if (diff <= 0) {
                countdownEl.textContent = "Expired!";
                countdownEl.style.color = "red";
                clearInterval(interval);
                return;
            }

            const minutes = String(Math.floor(diff / 60)).padStart(2, '0');
            const seconds = String(diff % 60).padStart(2, '0');
            countdownEl.textContent = `${minutes}:${seconds}`;
        }, 1000);
    }

        document.addEventListener('DOMContentLoaded', function() {
            // Add random force flicker effect
            setInterval(() => {
                const intensity = Math.random() * 0.2 + 0.1;
                document.querySelector('.force-clash').style.opacity = intensity;
            }, 300);
            
            // Add focus effect to OTP input
            const otpInput = document.querySelector('input[name="otp"]');
            otpInput.addEventListener('focus', function() {
                this.style.boxShadow = '0 0 15px var(--jedi-blue), 0 0 15px var(--sith-red)';
            });
            
            otpInput.addEventListener('blur', function() {
                this.style.boxShadow = '0 0 5px var(--jedi-blue), 0 0 5px var(--sith-red)';
            });
        });
    </script>
</body>
</html>