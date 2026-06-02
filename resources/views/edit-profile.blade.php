<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile - Asset Track</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-orange: #ff4500;
            --secondary-orange: #ff8c00;
            --input-bg: rgba(255, 255, 255, 0.15);
        }

        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: url("../images/bglogin.jpeg") no-repeat center center;
            background-size: cover;
            background-attachment: fixed;
            box-sizing: border-box;
            padding: 20px;
        }

        /* Glassmorphism Card Container */
        .profile-container { 
            width: 100%;
            max-width: 420px; 
            padding: 40px 30px; 
            background: rgba(255, 255, 255, 0.1); 
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border-radius: 24px; 
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4); 
        }

        .profile-container h2 {
            margin-top: 0;
            margin-bottom: 10px;
            font-weight: 600;
            text-align: center;
            font-size: 26px;
            letter-spacing: 0.5px;
        }

        .profile-container hr {
            margin-bottom: 25px; 
            border: 0; 
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }

        .form-group { 
            margin-bottom: 20px; 
        }

        .form-group label { 
            display: block; 
            margin-bottom: 8px; 
            font-weight: 400; 
            font-size: 14px;
            opacity: 0.9;
        }

        /* Styling Input Text dan File */
        .form-group input[type="text"], 
        .form-group input[type="file"] { 
            width: 100%; 
            padding: 14px; 
            border: none;
            border-radius: 12px; 
            background: var(--input-bg);
            color: white;
            font-size: 14px;
            box-sizing: border-box; 
            outline: none;
            transition: background 0.3s ease;
        }

        .form-group input[type="text"]:focus { 
            background: rgba(255, 255, 255, 0.25);
        }

        /* Khusus input file agar tampilannya rapi */
        .form-group input[type="file"] {
            padding: 10px;
            font-family: inherit;
            cursor: pointer;
        }

        /* Styling Tombol Simpan */
        .btn-submit { 
            width: 100%;
            background-color: white; 
            color: var(--primary-orange); 
            padding: 14px; 
            border: none; 
            border-radius: 12px; 
            cursor: pointer; 
            font-weight: bold; 
            font-size: 15px;
            margin-top: 10px;
            transition: transform 0.2s, background 0.2s;
        }

        .btn-submit:hover { 
            transform: translateY(-2px);
            background: #f5f5f5; 
        }

        /* Styling Link Kembali */
        .btn-back { 
            color: rgba(255, 255, 255, 0.7); 
            text-decoration: none; 
            display: block; 
            margin-top: 20px; 
            font-size: 14px; 
            text-align: center;
            transition: color 0.2s;
        }

        .btn-back:hover {
            color: white;
        }

        /* Avatar Bulat Tengah */
        .avatar-wrapper {
            display: flex;
            justify-content: center;
            margin-bottom: 10px;
        }

        .current-avatar { 
            width: 90px; 
            height: 90px; 
            border-radius: 50%; 
            object-fit: cover; 
            border: 2px solid rgba(255, 255, 255, 0.5);
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        }

        /* Validasi Error */
        .error-box {
            background: rgba(255, 0, 0, 0.2);
            border: 1px solid rgba(255, 0, 0, 0.3);
            border-radius: 12px;
            padding: 12px;
            margin-bottom: 20px;
            font-size: 13px;
        }
        .error-box ul { margin: 0; padding-left: 20px; color: #ffcccc; }
    </style>
</head>
<body>

    <div class="profile-container">
        <h2>Edit Profil</h2>
        <hr>

        @if ($errors->any())
            <div class="error-box">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <div class="avatar-wrapper">
                    <img src="{{ $user->profile_photo ? asset('storage/' . $user->profile_photo) : asset('images/admin.png') }}" class="current-avatar">
                </div>
            </div>

            <div class="form-group">
                <label for="profile_photo">Ganti Foto Profil (Maks 2MB)</label>
                <input type="file" id="profile_photo" name="profile_photo" accept="image/*">
            </div>

            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required autocomplete="off">
            </div>

            <button type="submit" class="btn-submit">Simpan Perubahan</button>
        </form>

        <a href="{{ route('dashboard') }}" class="btn-back">← Kembali ke Dashboard</a>
    </div>

</body>
</html>