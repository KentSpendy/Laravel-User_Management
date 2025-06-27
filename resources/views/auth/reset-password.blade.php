<div class="force-reset-container">
    <div class="force-terminal">
        <div class="terminal-header">
            <div class="force-corner top-left"></div>
            <div class="force-corner top-right"></div>
            <h2 class="terminal-title">
                <i class="fas fa-key"></i>
                FORCE PASSWORD RESET
                <span class="terminal-subtitle">JEDI-SITH SECURITY PROTOCOL</span>
            </h2>
        </div>

        <form method="POST" action="{{ route('password.update') }}" class="force-form">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="input-group">
                <i class="fas fa-envelope input-icon"></i>
                <input type="email" name="email" placeholder="HOLONET CONTACT" required>
            </div>

            <div class="input-group">
                <i class="fas fa-lock input-icon"></i>
                <input type="password" name="password" placeholder="NEW FORCE CODE" required>
            </div>

            <div class="input-group">
                <i class="fas fa-lock input-icon"></i>
                <input type="password" name="password_confirmation" placeholder="CONFIRM FORCE CODE" required>
            </div>

            <button type="submit" class="btn-reset">
                <i class="fas fa-sync-alt"></i> RESET FORCE PROTOCOLS
            </button>
        </form>

        @if($errors->any())
            <div class="force-alert">
                <i class="fas fa-exclamation-triangle"></i>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>

<style>
    /* Force Theme Variables */
    :root {
        --jedi-blue: #00a2ff;
        --sith-red: #e10b0b;
        --lightsaber-blue: #00f0ff;
        --lightsaber-red: #ff2a2a;
        --force-light: #ffe81f;
        --force-dark: #2a0080;
        --starfield-size: 300px;
    }

    /* Main Container */
    .force-reset-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #000;
        background-image: 
            radial-gradient(1px 1px at 20px 30px, var(--lightsaber-blue), rgba(0,0,0,0)),
            radial-gradient(1px 1px at 40px 70px, var(--lightsaber-red), rgba(0,0,0,0)),
            radial-gradient(1px 1px at 90px 40px, var(--lightsaber-blue), rgba(0,0,0,0)),
            radial-gradient(1px 1px at 130px 80px, var(--lightsaber-red), rgba(0,0,0,0));
        background-size: var(--starfield-size) var(--starfield-size);
        animation: starfieldScroll 200s linear infinite;
        font-family: 'Orbitron', sans-serif;
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

    /* Terminal Styling */
    .force-terminal {
        background: rgba(10, 10, 40, 0.9);
        border: 4px solid transparent;
        border-image: linear-gradient(45deg, var(--jedi-blue), var(--sith-red)) 1;
        box-shadow: 
            0 0 20px var(--jedi-blue), 
            0 0 20px var(--sith-red),
            inset 0 0 10px rgba(0,0,0,0.8);
        padding: 2rem;
        width: 100%;
        max-width: 500px;
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

    .terminal-header {
        margin-bottom: 2rem;
        position: relative;
    }

    .terminal-title {
        color: white;
        font-size: 1.5rem;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 1rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        text-shadow: 
            0 0 10px var(--jedi-blue), 
            0 0 10px var(--sith-red);
    }

    .terminal-subtitle {
        font-size: 0.8rem;
        color: var(--force-light);
        margin-left: auto;
        letter-spacing: 1px;
        text-shadow: 0 0 5px var(--force-light);
    }

    /* Form Styling */
    .force-form {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    .input-group {
        position: relative;
        display: flex;
        align-items: center;
    }

    .input-icon {
        position: absolute;
        left: 1rem;
        color: var(--force-light);
        z-index: 1;
    }

    .force-form input {
        width: 100%;
        padding: 1rem 1rem 1rem 3rem;
        background: rgba(0, 0, 30, 0.8);
        border: 2px solid transparent;
        border-image: linear-gradient(90deg, var(--jedi-blue), var(--sith-red)) 1;
        color: white;
        font-family: 'Orbitron', sans-serif;
        outline: none;
        transition: all 0.3s;
        box-shadow: 
            0 0 5px var(--jedi-blue),
            0 0 5px var(--sith-red);
    }

    .force-form input:focus {
        box-shadow: 
            0 0 10px var(--jedi-blue),
            0 0 10px var(--sith-red);
    }

    .force-form input::placeholder {
        color: var(--force-light);
        opacity: 0.7;
    }

    /* Button Styling */
    .btn-reset {
        background: linear-gradient(90deg, var(--jedi-blue), var(--sith-red));
        color: white;
        border: none;
        padding: 1rem;
        font-family: 'Orbitron', sans-serif;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s;
        text-transform: uppercase;
        letter-spacing: 1px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.8rem;
        margin-top: 1rem;
        box-shadow: 
            0 5px 0 var(--force-dark), 
            0 0 10px var(--jedi-blue),
            0 0 10px var(--sith-red);
    }

    .btn-reset:hover {
        box-shadow: 
            0 5px 0 var(--force-dark), 
            0 0 20px var(--jedi-blue),
            0 0 20px var(--sith-red);
    }

    .btn-reset:active {
        transform: translateY(5px);
        box-shadow: 
            0 0 0 var(--force-dark), 
            0 0 30px var(--jedi-blue),
            0 0 30px var(--sith-red);
    }

    /* Error Styling */
    .force-alert {
        background: rgba(225, 11, 11, 0.2);
        border: 1px solid var(--sith-red);
        color: white;
        padding: 1rem;
        margin-top: 1.5rem;
        display: flex;
        align-items: flex-start;
        gap: 0.8rem;
        box-shadow: 0 0 10px var(--sith-red);
    }

    .force-alert i {
        color: var(--lightsaber-red);
        margin-top: 0.2rem;
        text-shadow: 0 0 5px var(--lightsaber-red);
    }

    .force-alert ul {
        margin: 0;
        padding-left: 1rem;
        list-style-type: none;
    }

    .force-alert li {
        margin-bottom: 0.5rem;
    }

    /* Corner Decorations */
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

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .force-terminal {
            padding: 1.5rem;
            margin: 1rem;
        }

        .terminal-title {
            font-size: 1.2rem;
            flex-direction: column;
            align-items: flex-start;
            gap: 0.5rem;
        }

        .terminal-subtitle {
            margin-left: 0;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add force clash effect
        const forceClash = document.createElement('div');
        forceClash.className = 'force-clash';
        document.querySelector('.force-reset-container').prepend(forceClash);

        // Add focus effects to inputs
        const inputs = document.querySelectorAll('.force-form input');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.querySelector('.input-icon').style.color = 'var(--lightsaber-blue)';
                this.parentElement.querySelector('.input-icon').style.textShadow = '0 0 10px var(--lightsaber-blue)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.querySelector('.input-icon').style.color = 'var(--force-light)';
                this.parentElement.querySelector('.input-icon').style.textShadow = 'none';
            });
        });

        // Add random force flicker effect
        setInterval(() => {
            const intensity = Math.random() * 0.2 + 0.1;
            document.querySelector('.force-clash').style.opacity = intensity;
        }, 300);
    });
</script>