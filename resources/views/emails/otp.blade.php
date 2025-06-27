<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Your One-Time Password (OTP)</title>
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
            padding: 40px;
        }
        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            max-width: 500px;
            margin: auto;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .otp {
            font-size: 28px;
            color: #1a73e8;
            letter-spacing: 4px;
            margin: 20px 0;
            text-align: center;
        }
        .footer {
            font-size: 12px;
            color: #777;
            text-align: center;
            margin-top: 30px;
        }
        .logo {
            display: block;
            margin: 0 auto 20px auto;
            width: 80px;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="https://upload.wikimedia.org/wikipedia/commons/2/22/StormtrooperHelmetIcon.svg" class="logo" alt="Vader Logo">

        <h2>WELCOME NEW TROOPER!</h2>
        <p>We received a login attempt for your account. Please use the code below to verify your identity:</p>

        <div class="otp">{{ $otp }}</div>

        <p>This code will expire in <strong>5 minutes</strong>. If you didn’t attempt to log in, please ignore this message.</p>

        <div class="footer">
            &copy; {{ now()->year }} MAY THE FORCE BE WITH YOU. All.<br>
            Security matters to us.
        </div>
    </div>
</body>
</html>
