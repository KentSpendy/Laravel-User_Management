<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Activate Your Sith Access</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@600&display=swap');

        body {
            background-color: #000;
            color: #feda4a;
            font-family: 'Orbitron', sans-serif;
            padding: 30px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background-color: #111;
            border: 2px solid #feda4a;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 20px #feda4a66;
        }

        .logo {
            width: 80px;
            display: block;
            margin: 0 auto 20px;
        }

        .title {
            text-align: center;
            font-size: 26px;
            color: #feda4a;
            margin-bottom: 20px;
        }

        .message {
            font-size: 16px;
            color: #feda4a;
            line-height: 1.6;
        }

        .btn {
            display: inline-block;
            margin: 20px auto;
            background-color: #feda4a;
            color: #000;
            padding: 12px 24px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
        }

        .btn:hover {
            background-color: #fff;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            color: #777;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="https://upload.wikimedia.org/wikipedia/commons/3/32/Darth_Vader_Star_Wars_Logo.svg" alt="Sith Emblem" class="logo">

        <div class="title">WELCOME TO THE DARK SIDE</div>

        <p class="message">
            Hello <strong>{{ $user->first_name }}</strong>,<br><br>
            You have been chosen by the Force to join our Sith Order.<br>
            To complete your initiation, click the button below to activate your access.
        </p>

        <p style="text-align: center;">
            <a href="{{ url('/verify/' . $token) }}" class="btn">ACTIVATE SITH ACCESS</a>
        </p>

        <p class="message">
            If you did not attempt to join the Sith Temple, you may disregard this message.<br><br>
            May the Dark Side guide you.
        </p>

        <div class="footer">
            &copy; {{ now()->year }} Galactic Empire · Sith Division · All Rights Reserved
        </div>
    </div>
</body>
</html>
