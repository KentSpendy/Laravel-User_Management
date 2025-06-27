<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMPERIAL PERSONNEL RECORD EDITOR | GALACTIC COMMAND</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700;900&family=Electrolize&display=swap');
        
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
        }
        
        body {
            background-color: #000;
            color: var(--hoth-white);
            font-family: 'Orbitron', sans-serif;
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
            line-height: 1.6;
            padding: 20px;
            background-image: 
                radial-gradient(ellipse at center, rgba(0,0,0,0) 0%, rgba(0,0,0,1) 100%),
                url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="300" height="300" opacity="0.8"><circle cx="%23{Math.random()*300}" cy="%23{Math.random()*300}" r="1.2" fill="white"/><circle cx="%23{Math.random()*300}" cy="%23{Math.random()*300}" r="0.8" fill="white"/><circle cx="%23{Math.random()*300}" cy="%23{Math.random()*300}" r="0.5" fill="white"/></svg>');
            background-size: var(--starfield-size) var(--starfield-size);
            animation: starfieldScroll 200s linear infinite;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        
        @keyframes starfieldScroll {
            0% { background-position: 0 0; }
            100% { background-position: var(--starfield-size) var(--starfield-size); }
        }
        
        .container {
            width: 100%;
            max-width: 600px;
            position: relative;
        }
        
        h2 {
            color: var(--rebel-yellow);
            text-shadow: 0 0 10px var(--rebel-yellow);
            margin-bottom: 30px;
            font-size: 1.8rem;
            letter-spacing: 3px;
            text-align: center;
            text-transform: uppercase;
            position: relative;
        }
        
        h2::after {
            content: "";
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 2px;
            background: linear-gradient(to right, transparent, var(--imperial-red), transparent);
        }
        
        .profile-card {
            background: rgba(0, 15, 30, 0.9);
            border: 1px solid var(--lightsaber-blue);
            box-shadow: 0 0 30px rgba(0, 162, 255, 0.3),
                        inset 0 0 20px rgba(0, 162, 255, 0.2);
            padding: 30px;
            position: relative;
            overflow: hidden;
        }
        
        .profile-card::before {
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
        
        .form-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }
        
        .form-group {
            display: flex;
            flex-direction: column;
            position: relative;
        }
        
        label {
            margin-bottom: 0.8rem;
            color: var(--carbonite);
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        
        input[type="text"],
        input[type="file"] {
            background: rgba(0, 20, 40, 0.8);
            border: 1px solid rgba(0, 162, 255, 0.4);
            color: var(--hoth-white);
            font-family: 'Electrolize', sans-serif;
            padding: 1rem;
            transition: all 0.3s ease;
            font-size: 1rem;
        }
        
        input[type="text"]:focus,
        input[type="file"]:focus {
            outline: none;
            border-color: var(--lightsaber-blue);
            box-shadow: 0 0 15px rgba(0, 162, 255, 0.6);
            background: rgba(0, 30, 60, 0.9);
        }
        
        .avatar-preview {
            margin: 1.5rem auto;
            border: 2px solid var(--imperial-red);
            box-shadow: 0 0 15px rgba(225, 11, 11, 0.3);
            transition: transform 0.3s;
            max-width: 150px;
            position: relative;
        }
        
        .avatar-preview:hover {
            transform: scale(1.05);
            box-shadow: 0 0 25px rgba(225, 11, 11, 0.5);
        }
        
        .avatar-preview::after {
            content: "";
            position: absolute;
            top: -5px;
            left: -5px;
            right: -5px;
            bottom: -5px;
            border: 1px dashed var(--imperial-red);
            opacity: 0.5;
            pointer-events: none;
        }
        
        .button-group {
            display: flex;
            justify-content: space-between;
            margin-top: 2rem;
            flex-wrap: wrap;
            gap: 1rem;
        }
        
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
            flex: 1;
            min-width: 200px;
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
        
        .btn-secondary {
            background: rgba(30,30,30,0.7);
            color: var(--hoth-white);
            border: 1px solid var(--imperial-red);
            box-shadow: 0 0 15px rgba(225,11,11,0.3);
        }
        
        .btn-secondary:hover {
            background: rgba(225,11,11,0.2);
            color: var(--rebel-yellow);
            box-shadow: 0 0 25px rgba(225,11,11,0.5);
            transform: translateY(-3px);
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
        
        .notification {
            padding: 1rem;
            margin: 1.5rem 0;
            border-radius: 4px;
            font-size: 0.9rem;
            text-align: center;
            animation: fadeIn 0.5s;
            position: relative;
            overflow: hidden;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .success-message {
            background: rgba(0, 40, 0, 0.7);
            border: 1px solid var(--carbonite);
            color: var(--carbonite);
            box-shadow: 0 0 15px rgba(0, 200, 150, 0.3);
        }
        
        .error-messages {
            background: rgba(40, 0, 0, 0.7);
            border: 1px solid var(--imperial-red);
            color: var(--hoth-white);
            box-shadow: 0 0 15px rgba(225, 11, 11, 0.3);
            list-style-type: none;
            padding: 1rem;
        }
        
        .error-messages li {
            margin: 0.5rem 0;
            position: relative;
            padding-left: 1.5rem;
            font-family: 'Electrolize', sans-serif;
        }
        
        .error-messages li::before {
            content: "✗";
            position: absolute;
            left: 0;
            color: var(--imperial-red);
        }
        
        .corner-decoration {
            position: absolute;
            width: 40px;
            height: 40px;
            border: 3px solid var(--lightsaber-blue);
            opacity: 0.7;
            z-index: 5;
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
            0% { box-shadow: 0 0 10px var(--lightsaber-blue); }
            100% { box-shadow: 0 0 20px var(--lightsaber-blue); }
        }
        
        .scanlines {
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
        
        @keyframes scanlineScroll {
            0% { background-position: 0 0; }
            100% { background-position: 0 100%; }
        }
        
        @media (max-width: 600px) {
            .button-group {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
            }
            
            h2 {
                font-size: 1.4rem;
            }
            
            .profile-card {
                padding: 20px;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="scanlines"></div>
    
    <div class="container">
        <h2>
            <i class="fas fa-user-edit"></i>
            IMPERIAL PERSONNEL RECORD
        </h2>

        <div class="profile-card">
            <div class="corner-decoration top-left"></div>
            <div class="corner-decoration top-right"></div>
            <div class="corner-decoration bottom-left"></div>
            <div class="corner-decoration bottom-right"></div>

            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="form-grid">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label class="form-label">FIRST NAME:</label>
                    <input type="text" name="first_name" value="{{ old('first_name', session('user')->first_name) }}" class="imperial-input" required>
                </div>

                <div class="form-group">
                    <label class="form-label">LAST NAME:</label>
                    <input type="text" name="last_name" value="{{ old('last_name', session('user')->last_name) }}" class="imperial-input" required>
                </div>

                <div class="form-group">
                    <label class="form-label">IDENTIFICATION IMAGE:</label>
                    <input type="file" name="avatar" class="imperial-input">
                    @if(session('user')->avatar)
                        <img src="{{ asset('storage/' . session('user')->avatar) }}" alt="Imperial Identification" class="avatar-preview">
                    @endif
                </div>

                <div class="button-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i>
                        UPDATE RECORD
                    </button>
                    <a href="/{{ session('user')->role }}/dashboard" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i>
                        RETURN TO COMMAND
                    </a>
                </div>
            </form>
        </div>

        @if(session('success'))
            <div class="notification success-message">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <ul class="notification error-messages">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>
</body>
</html>