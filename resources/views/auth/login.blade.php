<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - AssetTrack</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;800&display=swap" rel="stylesheet">
</head>
<body>

    <div class="login-card">
        <div class="brand-title">
            <span class="big">A</span>sset<span class="big">T</span>rack
        </div>
        <div class="brand-subtitle">Asset Management System</div>

        @if(session('error'))
            <div style="background: #fee2e2; color: #b91c1c; padding: 10px; border-radius: 5px; margin-bottom: 15px; text-align: center; font-size: 0.9em; border: 1px solid #f87171;">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="input-group">
                <i class="fa fa-user"></i>
                <input type="text" name="username" placeholder="Username" required autocomplete="off" value="{{ old('username') }}">
            </div>

            <div class="input-group">
                <i class="fa fa-lock"></i>
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <button type="submit" class="btn-login">Login</button>
        </form>

        <div class="footer-text">
            &copy; 2026 Polibatam Informatics Engineering
        </div>
    </div>

</body>
</html>