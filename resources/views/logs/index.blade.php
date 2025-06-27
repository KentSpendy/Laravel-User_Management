<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SITH ACTIVITY LOGS | DARK ORDER</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700;900&family=Electrolize&display=swap');
        
        :root {
            --sith-red: #e10b0b;
            --sith-dark: #111;
            --sith-gray: #333;
            --lightsaber-red: #ff2a2a;
            --force-dark: #2a0080;
            --force-light: #ffe81f;
            --starfield-size: 300px;
            --sidebar-width: 280px;
        }
        
        body {
            background-color: #000;
            color: #ccc;
            font-family: 'Orbitron', sans-serif;
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
            perspective: 1000px;
            line-height: 1.6;
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
        
        /* Sith data transmission effect */
        .sith-transmission {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, 
                rgba(0,0,0,0) 0%, 
                rgba(225,11,11,0.1) 50%, 
                rgba(0,0,0,0) 100%);
            z-index: -1;
            animation: sithTransmit 10s linear infinite;
            pointer-events: none;
            opacity: 0;
        }
        
        @keyframes sithTransmit {
            0% { transform: translateX(-100%); opacity: 0; }
            10% { opacity: 0.5; }
            20% { opacity: 0; }
            100% { transform: translateX(100%); opacity: 0; }
        }
        
        /* Main container */
        .container {
            background: rgba(10, 0, 10, 0.9);
            border: 2px solid var(--sith-red);
            box-shadow: 0 0 30px rgba(225, 11, 11, 0.5),
                        inset 0 0 20px rgba(225, 11, 11, 0.3);
            padding: 30px;
            max-width: 1200px;
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
            color: var(--force-light);
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
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
            position: relative;
        }
        
        table::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, transparent 95%, rgba(225,11,11,0.1) 100%);
            pointer-events: none;
        }
        
        th {
            background: rgba(225, 11, 11, 0.2);
            color: var(--force-light);
            padding: 15px;
            text-align: left;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            border-bottom: 2px solid rgba(225, 11, 11, 0.5);
            position: sticky;
            top: 0;
        }
        
        td {
            padding: 12px 15px;
            border-bottom: 1px solid rgba(225, 11, 11, 0.1);
            font-family: 'Electrolize', sans-serif;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }
        
        tr:hover td {
            background: rgba(225, 11, 11, 0.1);
            color: var(--force-light);
        }
        
        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            color: #ccc;
            text-decoration: none;
            font-size: 0.9rem;
            padding: 12px 20px;
            border: 1px solid var(--sith-red);
            transition: all 0.3s ease;
            margin-top: 20px;
            text-transform: uppercase;
            letter-spacing: 1px;
            background: rgba(225, 11, 11, 0.1);
            position: relative;
            overflow: hidden;
        }
        
        .back-link::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(225, 11, 11, 0.3), transparent);
            transition: all 0.5s ease;
        }
        
        .back-link:hover {
            background: rgba(225, 11, 11, 0.3);
            color: var(--force-light);
            box-shadow: 0 0 15px rgba(225, 11, 11, 0.5);
            transform: translateY(-2px);
        }
        
        .back-link:hover::before {
            left: 100%;
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
        
        /* Hologram effect for table rows */
        tr {
            position: relative;
        }
        
        tr::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(225, 11, 11, 0.3), transparent);
        }
        
        /* Critical action highlight */
        .critical-action {
            animation: criticalPulse 2s infinite;
        }
        
        @keyframes criticalPulse {
            0% { background: rgba(225, 11, 11, 0.1); }
            50% { background: rgba(225, 11, 11, 0.3); }
            100% { background: rgba(225, 11, 11, 0.1); }
        }
        
        .action-code {
            display: inline-block;
            padding: 3px 8px;
            background: rgba(225, 11, 11, 0.2);
            border-radius: 3px;
            font-family: 'Orbitron', sans-serif;
            font-size: 0.8rem;
            transition: all 0.3s ease;
        }
        
        .critical-action .action-code {
            background: rgba(225, 11, 11, 0.4);
            color: var(--force-light);
            font-weight: bold;
            text-shadow: 0 0 5px var(--lightsaber-red);
        }
        
        tr:nth-child(even) td {
            background: rgba(10, 0, 0, 0.5);
        }
        
        tr:hover td {
            background: rgba(225, 11, 11, 0.2) !important;
        }
        
        tr:hover .action-code {
            transform: scale(1.05);
            box-shadow: 0 0 10px rgba(225, 11, 11, 0.5);
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }
            
            th, td {
                padding: 10px;
                font-size: 0.8rem;
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
    <div class="scanlines"></div>
    <div class="sith-transmission"></div>
    
    <!-- Probe Droids -->
    <div class="probe-droid" style="top: 20%; animation-delay: 0s;"></div>
    <div class="probe-droid" style="top: 60%; animation-delay: 5s; animation-duration: 20s;"></div>
    <div class="probe-droid" style="top: 40%; animation-delay: 10s; animation-duration: 25s;"></div>
    
    <div class="container">
        <div class="sith-corner top-left"></div>
        <div class="sith-corner top-right"></div>
        <div class="sith-corner bottom-left"></div>
        <div class="sith-corner bottom-right"></div>
        
        <a href="/{{ session('user')->role }}/dashboard" class="back-link">
            <i class="fas fa-arrow-left"></i>
            RETURN TO SITH SANCTUM
        </a>
        
        <h2>
            <i class="fas fa-scroll"></i>
            FORCE SENSITIVES ACTIVITY LOGS
        </h2>
        
        <table>
    <thead>
        <tr>
            <th>User</th>
            <th>Action</th>
            <th>Description</th>
            <th>IP</th>
            <th>Device/Browser</th>
            <th>Timestamp</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($logs as $log)
            <tr>
                <td>{{ $log->user->full_name ?? 'Deleted User' }}</td>
                <td>{{ $log->action }}</td>
                <td>{{ $log->description }}</td>
                <td>{{ $log->ip_address }}</td>
                <td>{{ $log->user_agent }}</td>
                <td>{{ $log->created_at->format('Y-m-d H:i:s') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add more Probe Droids
            for (let i = 0; i < 3; i++) {
                setTimeout(() => {
                    createProbeDroid();
                }, i * 5000);
            }
            
            // Random Sith transmissions
            setInterval(() => {
                triggerSithTransmission();
            }, 8000);
            
            // Critical action highlights
            highlightDarkActions();
            
            // Dark Side row effect
            addDarkSideEffects();
            
            // Add blood drip effect for critical actions
            addBloodDripEffect();
        });
        
        function createProbeDroid() {
            const probe = document.createElement('div');
            probe.className = 'probe-droid';
            
            // Random position
            const topPos = Math.random() * 80 + 10; // 10-90%
            const duration = Math.random() * 15 + 10; // 10-25s
            const delay = Math.random() * 5; // 0-5s
            
            probe.style.top = `${topPos}%`;
            probe.style.animationDuration = `${duration}s`;
            probe.style.animationDelay = `${delay}s`;
            
            document.body.appendChild(probe);
            
            // Remove after animation completes
            setTimeout(() => {
                document.body.removeChild(probe);
            }, duration * 1000);
        }
        
        function triggerSithTransmission() {
            const transmission = document.createElement('div');
            transmission.className = 'sith-transmission';
            transmission.style.animation = 'sithTransmit ' + (Math.random() * 5 + 3) + 's linear';
            
            document.body.appendChild(transmission);
            
            setTimeout(() => {
                document.body.removeChild(transmission);
            }, 10000);
        }
        
        function highlightDarkActions() {
            const darkActions = ['DESTROY', 'EXTERMINATE', 'EXECUTE', 'CORRUPT', 'DOMINATE'];
            document.querySelectorAll('tr').forEach(row => {
                const actionCell = row.querySelector('.action-code');
                if (actionCell && darkActions.includes(actionCell.textContent.trim())) {
                    row.classList.add('critical-action');
                    
                    // Add blood icon for extreme actions
                    if (['EXTERMINATE', 'EXECUTE'].includes(actionCell.textContent.trim())) {
                        const icon = document.createElement('i');
                        icon.className = 'fas fa-tint blood-icon';
                        icon.style.color = 'var(--sith-red)';
                        icon.style.marginLeft = '5px';
                        actionCell.appendChild(icon);
                    }
                }
            });
        }
        
        function addDarkSideEffects() {
            const rows = document.querySelectorAll('tbody tr');
            rows.forEach(row => {
                row.addEventListener('mouseenter', () => {
                    row.style.boxShadow = '0 0 15px rgba(225, 11, 11, 0.3)';
                });
                row.addEventListener('mouseleave', () => {
                    row.style.boxShadow = 'none';
                });
            });
        }
        
        function addBloodDripEffect() {
            const criticalRows = document.querySelectorAll('.critical-action');
            criticalRows.forEach(row => {
                const bloodDrip = document.createElement('div');
                bloodDrip.className = 'blood-drip';
                bloodDrip.style.position = 'absolute';
                bloodDrip.style.bottom = '0';
                bloodDrip.style.left = Math.random() * 100 + '%';
                bloodDrip.style.width = '1px';
                bloodDrip.style.height = '0';
                bloodDrip.style.background = 'linear-gradient(to bottom, var(--sith-red), transparent)';
                bloodDrip.style.animation = `bloodDrip ${Math.random() * 2 + 1}s infinite`;
                
                row.appendChild(bloodDrip);
            });
            
            // Add blood drip animation to styles
            const style = document.createElement('style');
            style.textContent = `
                @keyframes bloodDrip {
                    0% { height: 0; opacity: 0; }
                    10% { opacity: 1; }
                    100% { height: 20px; opacity: 0; }
                }
            `;
            document.head.appendChild(style);
        }
    </script>
</body>
</html>