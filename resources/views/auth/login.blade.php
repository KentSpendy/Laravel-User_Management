<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORCE LOGIN | GALACTIC REPUBLIC</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700;900&display=swap');
        
        :root {
            --jedi-blue: #00a2ff;
            --sith-red: #e10b0b;
            --lightsaber-blue: #00f0ff;
            --lightsaber-red: #ff2a2a;
            --force-light: #ffe81f;
            --force-dark: #2a0080;
            --starfield-size: 300px;
        }
        
        body {
            background-color: #000;
            color: white;
            font-family: 'Orbitron', sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            padding: 20px;
            background-image: 
                radial-gradient(1px 1px at 20px 30px, var(--lightsaber-blue), rgba(0,0,0,0)),
                radial-gradient(1px 1px at 40px 70px, var(--lightsaber-red), rgba(0,0,0,0)),
                radial-gradient(1px 1px at 90px 40px, var(--lightsaber-blue), rgba(0,0,0,0)),
                radial-gradient(1px 1px at 130px 80px, var(--lightsaber-red), rgba(0,0,0,0));
            background-size: var(--starfield-size) var(--starfield-size);
            animation: starfieldScroll 200s linear infinite;
            position: relative;
            overflow: hidden;
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

        /* Main Container */
        .force-container {
            background-color: rgba(10, 10, 40, 0.9);
            border: 4px solid transparent;
            border-image: linear-gradient(45deg, var(--jedi-blue), var(--sith-red)) 1;
            box-shadow: 
                0 0 20px var(--jedi-blue), 
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

        h2 {
            color: white;
            text-shadow: 
                0 0 10px var(--jedi-blue), 
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

        /* Form Elements */
        .form-group {
            text-align: left;
            margin-bottom: 20px;
            position: relative;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 12px;
            color: white;
            text-shadow: 0 0 5px var(--force-light);
        }

        input {
            background-color: rgba(0, 0, 30, 0.8);
            border: 2px solid transparent;
            border-image: linear-gradient(90deg, var(--jedi-blue), var(--sith-red)) 1;
            color: white;
            padding: 12px;
            width: 100%;
            font-family: 'Orbitron', sans-serif;
            font-size: 12px;
            outline: none;
            box-shadow: 
                0 0 5px var(--jedi-blue),
                0 0 5px var(--sith-red);
            transition: all 0.3s;
            box-sizing: border-box;
        }

        input:focus {
            box-shadow: 
                0 0 10px var(--jedi-blue),
                0 0 10px var(--sith-red);
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
            box-shadow: 
                0 5px 0 var(--force-dark), 
                0 0 10px var(--jedi-blue),
                0 0 10px var(--sith-red);
            margin-top: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        button:hover {
            box-shadow: 
                0 5px 0 var(--force-dark), 
                0 0 20px var(--jedi-blue),
                0 0 20px var(--sith-red);
        }

        button:active {
            transform: translateY(5px);
            box-shadow: 
                0 0 0 var(--force-dark), 
                0 0 30px var(--jedi-blue),
                0 0 30px var(--sith-red);
        }

        /* Messages */
        .message {
            margin: 20px 0;
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
            margin-bottom: 20px;
        }

        /* Links */
        .links {
            margin-top: 20px;
            font-size: 10px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .links a {
            color: white;
            text-decoration: none;
            transition: all 0.3s;
            text-shadow: 
                0 0 5px var(--jedi-blue),
                0 0 5px var(--sith-red);
            position: relative;
        }

        .links a:hover {
            color: var(--force-light);
            text-shadow: 0 0 10px var(--force-light);
        }

        .links a::after {
            content: "";
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 1px;
            background: linear-gradient(90deg, var(--jedi-blue), var(--sith-red));
            transition: width 0.3s ease;
        }

        .links a:hover::after {
            width: 100%;
        }

        /* Corner Effects */
        .force-corner {
            position: absolute;
            width: 16px;
            height: 16px;
            box-shadow: 
                0 0 10px var(--jedi-blue),
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

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .force-container {
                padding: 20px;
            }
            
            h2 {
                font-size: 20px;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="force-clash"></div>
    
    <div class="force-container">
        <div class="force-corner top-left"></div>
        <div class="force-corner top-right"></div>
        <div class="force-corner bottom-left"></div>
        <div class="force-corner bottom-right"></div>
        
        <h2>FORCE LOGIN</h2>
        
        @if(session('success'))
            <div class="message success">
                <i class="fas fa-jedi"></i> {{ session('success') }}
            </div>
        @endif
        
        @if($errors->any())
            <ul class="error-list">
                @foreach ($errors->all() as $error)
                    <li><i class="fas fa-skull"></i> {{ $error }}</li>
                @endforeach
            </ul>
        @endif
        
        <form method="POST" action="/login">
            @csrf
            
            <div class="form-group">
                <label><i class="fas fa-user-astronaut"></i> HOLONET ID:</label>
                <input type="email" name="email" required>
            </div>
            
            <div class="form-group">
                <label><i class="fas fa-key"></i> SECURITY CODE:</label>
                <input type="password" name="password" required>
            </div>
            
            <button type="submit">
                <i class="fas fa-fighter-jet"></i> INITIATE CONNECTION
            </button>
        </form>
        
        <div class="links">
            <a href="/register"><i class="fas fa-jedi"></i> JOIN THE REPUBLIC</a>
            <a href="{{ route('password.request') }}"><i class="fas fa-unlock-alt"></i> RECOVER ACCESS</a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add focus effects to inputs
            const inputs = document.querySelectorAll('input');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.style.boxShadow = 
                        '0 0 15px var(--jedi-blue), 0 0 15px var(--sith-red)';
                });
                
                input.addEventListener('blur', function() {
                    this.style.boxShadow = 
                        '0 0 5px var(--jedi-blue), 0 0 5px var(--sith-red)';
                });
            });
            
            // Add random force flicker effect
            setInterval(() => {
                const intensity = Math.random() * 0.2 + 0.1;
                document.querySelector('.force-clash').style.opacity = intensity;
            }, 300);
        });
    </script>
</body>
</html>