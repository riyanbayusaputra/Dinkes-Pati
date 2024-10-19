<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dinas Kesehatan - Kabupaten Pati</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        html, body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #fff;
            padding: 15px 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            position: fixed;
            top: 0;
            z-index: 1000;
            left: 0;
        }

        .content {
            padding-top: 80px;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            flex: 1;
        }

        .navbar-brand img {
            height: 60px;
            margin-right: 90px;
            margin-left: 90px;
        }

        .navbar-nav {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            margin-left: 0;
            padding-left: 0;
            position: relative;
            left: -137px;
        }

        .navbar-nav a {
            margin: 0 20px;
            color: #333;
            font-size: 18px;
            text-decoration: none;
            font-weight: bold;
        }

        .navbar-nav a.profile {
            color: #2469A5;
        }

        .navbar-nav a.bantuan-button {
            background-color: orange;
            color: white !important;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .navbar-nav a.bantuan-button:hover {
            background-color: rgb(255, 214, 164);
            color: white !important;
        }

        .navbar-nav a.bantuan-button:active {
            background-color: #ffd6a4;
            color: white !important;
        }

        .navbar-nav a.bantuan-button:focus {
            background-color: #FF8C00;
            color: white !important;
            outline: none;
        }

        /* Hamburger Icon */
        .navbar-toggle {
            display: none;
            flex-direction: column;
            cursor: pointer;
            width: 30px;
            height: 30px;
            justify-content: space-between;
            align-items: center;
            position: absolute;
            right: 50px; /* Align it to the right of the navbar */
            left : 50px;
            top: 50%; /* Center it vertically */
            transform: translateY(-50%);
        }

        .navbar-toggle span {
            width: 25px;
            height: 3px;
            background-color: #333;
            margin: 4px 0;
            transition: all 0.3s ease-in-out;
        }

        /* Top line (thicker) */
        .navbar-toggle span:nth-child(1) {
            height: 6px;
        }

        /* Middle line (thinner) */
        .navbar-toggle span:nth-child(2) {
            height: 2px;
        }

        /* Bottom line (thicker) */
        .navbar-toggle span:nth-child(3) {
            height: 6px;
        }

        /* Add animation for toggle */
        .navbar-toggle.active span:nth-child(1) {
            transform: rotate(45deg) translate(5px, 5px);
        }

        .navbar-toggle.active span:nth-child(2) {
            opacity: 0;
        }

        .navbar-toggle.active span:nth-child(3) {
            transform: rotate(-45deg) translate(6px, -6px);
        }

        /* Media Queries for responsiveness */
        @media (max-width: 768px) {
            .navbar {
                justify-content: space-between;
                align-items: center;
            }

            /* Navbar Brand (Logo) */
            .navbar-brand {
                margin-left: 0.5px; /* Align to the left on mobile */
                margin-right: 10px; /* Ensure space for toggle */
            }

            /* Show the toggle button */
            .navbar-toggle {
                display: flex;
            }

            .navbar-nav {
                flex-direction: column;
                width: 100%;
                align-items: center;
                background-color: #fff;
                position: absolute;
                top: 60px;
                left: 0;
                padding: 10px 0;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                display: none; /* Hide navbar items by default */
            }

            .navbar-nav.show {
                display: flex; /* Show when toggle is active */
            }

            .navbar-nav a {
                padding: 10px 20px;
                width: 100%;
                text-align: left;
            }
        }

        @media (max-width: 400px) {
            .navbar-brand img {
                height: 40px;
            }

            .search-bar input[type="text"] {
                width: 100%;
            }
        }

        .visi-misi-title {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            margin: 40px 0;
            font-weight: bold;
        }

        .visi-misi-title:before,
        .visi-misi-title:after {
            content: '';
            flex: 1;
            border-bottom: 2px solid #2469A5;
            margin: 0 20px;
        }

        .visi-misi-container {
            max-width: 900px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .visi {
            text-align: center;
            margin-bottom: 40px;
        }

        .misi {
            margin-left: 50px;
        }

        .misi ul {
            list-style-type: none;
            padding-left: 0;
        }

        .misi ul li {
            margin-bottom: 10px;
        }

        .bottom-info {
            font-size: 16px;
            line-height: 1.5;
            color: #333;
            font-weight: normal;
            margin-top: 60px;
            margin-bottom: 5px;
            text-align: left;
            padding-left: 60px;
            padding-right: 40px;
            padding-top: 50px;
        }

        .footer {
            text-align: center;
            padding: 10px;
            background-color: #2469A5;
            font-size: 14px;
            color: white;
            width: 100%;
            height: 25px;
            margin: 25px auto 0;
        }

        .sipalingsapa {
            color: #2469A5;
        }

        .bottom-info a {
            color: #2469A5;
            text-decoration: underline;
        }

        .bold-text {
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="content">
        <!-- Navbar -->
        <nav class="navbar">
            <div class="navbar-brand">
                <img src="{{ asset('images/logodin.png') }}" alt="logo">
            </div>

            <!-- Navbar Links -->
            <div class="navbar-nav">
                <a href="{{ route('home') }}" class="home">Home</a>
                <a href="{{ route('profile') }}">Profile</a>
                <a href="" class="kuesioner">Kuesioner</a>
                <a href="{{ route('infografis') }}">Info Grafis</a>
                <a href="{{ route('bantuan') }}" class="bantuan-button">Bantuan</a>
            </div>

            <!-- Hamburger Icon -->
            <div class="navbar-toggle" id="navbar-toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>

        <!-- Visi dan Misi Section -->
        <div class="visi-misi-title">
            Visi dan Misi
        </div>

        <div class="visi-misi-container">
            <div class="visi">
                <h2>VISI:</h2>
                <p>Meningkatkan Kesejahteraan Masyarakat dan Kualitas Hidup Melalui Pelayanan Kesehatan yang Berkualitas.</p>
            </div>
            <div class="misi">
                <h2>MISI:</h2>
                <ul>
                    <li>1. Meningkatkan Pemberdayaan Masyarakat Sebagai Upaya Penegentasan Kemiskinan</li>
                    <li>2. Meningkatkan Tata Kelola Pemerintah yang Akuntabel dan Mengutamakan Pelayanan Publik</li>
                    <li>3. Meningkatkan Pembangunan Infrastruktur Daerah, Mendukung Pengembangan Ekonomi Daerah</li>
                </ul>
            </div>
        </div>

        <!-- Bottom Info Section -->
        <div class="bottom-info">
            <span class="sipalingsapa bold-text">Sipalingsapa.com All rights reserved.</span><br>
            Informasi dan pelayanan dapat dilakukan melalui:<br>
            Alamat: Jalan Raya Pati - Kudus Km. 3,5 (Komplek BPBD) Pati Jawa Tengah<br>
            Telepon: 0295 381351<br>
            Fax: 0295 381375<br>
            Kode Pos: 59163<br>
            Email: <a href="mailto:bappeda@patikab.go.id" class="bold-text">bappeda@patikab.go.id</a><br>
            Website: <a href="http://bappeda.patikab.go.id" target="_blank" class="bold-text">bappeda.patikab.go.id</a>
        </div>

        <!-- Footer -->
        <div class="footer">
            &copy; 2024 Kabupaten Pati
        </div>
    </div>

    <!-- JavaScript for Navbar Toggle -->
    <script>
        const navbarToggle = document.getElementById('navbar-toggle');
        const navbarNav = document.getElementById('navbarNav');

        navbarToggle.addEventListener('click', () => {
            navbarToggle.classList.toggle('active');
            navbarNav.classList.toggle('show');
        });
    </script>
</body>
</html>
