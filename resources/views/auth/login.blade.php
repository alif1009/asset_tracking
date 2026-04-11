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

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="input-group">
                <i class="fa fa-user"></i>
                <input type="text" name="username" placeholder="Username" required autocomplete="off">
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