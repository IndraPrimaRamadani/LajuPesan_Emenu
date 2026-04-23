<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Selamat Datang | LajuPesan</title>

    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #FFFFFF;
            color: #1a1a1a;
            height: 100vh;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 420px;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 30px 20px 40px;
        }

        /* Logo */
        .logo-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 4px;
        }

        .logo-icon {
            width: 56px;
            height: 56px;
            margin-bottom: 4px;
        }

        .logo-text {
            font-size: 13px;
            font-weight: 600;
            color: #F97316;
            letter-spacing: 1px;
        }

        /* Heading */
        .heading {
            text-align: center;
            margin-bottom: 20px;
        }

        .heading h1 {
            font-size: 24px;
            font-weight: 800;
            color: #1a1a1a;
            line-height: 1.3;
        }

        .heading h1 span {
            color: #F97316;
        }

        .heading p {
            font-size: 14px;
            color: #888;
            margin-top: 4px;
        }

        /* Role Card */
        .role-card {
            width: 100%;
            background-color: #FFF7ED;
            border: 1.5px solid #FFEDD5;
            border-radius: 20px;
            padding: 20px 24px;
            margin-bottom: 14px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .role-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(249, 115, 22, 0.12);
        }

        .role-card h2 {
            font-size: 20px;
            font-weight: 700;
            text-align: center;
            margin-bottom: 4px;
            color: #1a1a1a;
        }

        .role-card .subtitle {
            font-size: 12px;
            color: #888;
            text-align: center;
            margin-bottom: 14px;
            line-height: 1.5;
        }

        /* Buttons */
        .btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 100%;
            padding: 12px 20px;
            border-radius: 50px;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            border: none;
            transition: all 0.25s ease;
        }

        .btn+.btn {
            margin-top: 10px;
        }

        /* Primary Button - Orange Gradient */
        .btn-primary {
            background: linear-gradient(135deg, #F97316, #FB923C);
            color: #FFFFFF;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #EA580C, #F97316);
            transform: scale(1.02);
            box-shadow: 0 6px 20px rgba(249, 115, 22, 0.35);
        }

        /* Secondary Button - Outline Orange */
        .btn-secondary {
            background-color: #FFFFFF;
            color: #F97316;
            border: 2px solid #F97316;
        }

        .btn-secondary:hover {
            background-color: #FFF7ED;
            transform: scale(1.02);
            box-shadow: 0 4px 16px rgba(249, 115, 22, 0.15);
        }

        /* Button Icons */
        .btn-icon {
            width: 22px;
            height: 22px;
            flex-shrink: 0;
        }
    </style>
</head>

<body>

    <div class="container">

        <!-- Logo -->
        <div class="logo-wrapper">
            <img class="logo-icon" src="{{ asset('assets/images/logo laju pesan.jpeg') }}" alt="LajuPesan Logo">
        </div>

        <!-- Heading -->
        <div class="heading">
            <h1><span>LajuPesan</span><br>Mitra Usaha Kuliner</h1>
            <p>Tingkatkan penjualan bisnis kuliner Anda bersama kami.</p>
        </div>

        <!-- Merchant Card -->
        <div class="role-card">
            <h2>Gabung Merchant</h2>
            <p class="subtitle">Sudah punya akun atau ingin bergabung? Silakan masuk atau daftar di sini.</p>

            <a href="{{ url('/admin/login') }}" class="btn btn-primary">
                <svg class="btn-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
                    <line x1="16" y1="2" x2="16" y2="6" />
                    <line x1="8" y1="2" x2="8" y2="6" />
                    <line x1="3" y1="10" x2="21" y2="10" />
                </svg>
                Masuk Merchant
            </a>

            <a href="{{ url('/admin/register') }}" class="btn btn-secondary">
                <svg class="btn-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                    <circle cx="8.5" cy="7" r="4" />
                    <line x1="20" y1="8" x2="20" y2="14" />
                    <line x1="23" y1="11" x2="17" y2="11" />
                </svg>
                Daftar Merchant
            </a>
        </div>

    </div>

</body>

</html>
