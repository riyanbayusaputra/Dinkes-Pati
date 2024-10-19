<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bantuan - Dinas Kesehatan Kabupaten Pati</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        html, body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            font-family: Arial, sans-serif;
        }

        .content {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            height: 100%;
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

        .navbar-brand img {
            height: 60px;
            margin-right: 90px;
            margin-left: 90px;
        }

        /* Adjust the vertical position of navbar items */
        .navbar-nav {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            margin-left: 0;
            padding-left: 0;
            position: relative;
            left: -120px;
            margin-bottom: 20px;
        }

        /* Navbar links */
        .navbar-nav a {
            margin: 0 20px;
            color: #333;
            font-size: 18px;
            text-decoration: none;
            font-weight: bold;
            padding: 20px 0;
            display: inline-block;
            text-align: center;
        }


        /* Bantuan button */
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
            left: 50px;
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

        /* Contact and Map Container */
        .contact-container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            padding: 20px;
        }

        .contact-container iframe {
            width: 48%;
            height: 450px;
            border: 0;
        }

        .contact-info {
            width: 48%;
            font-size: 16px;
        }

        .contact-info h3 {
            margin-bottom: 15px;
        }

        .contact-info p {
            margin: 5px 0;
        }

        .contact-info a {
            color: #2469A5;
            text-decoration: underline;
        }

        /* Help Section */
        .help-section {
            padding: 20px;
            background-color: #f9f9f9;
            margin: 20px;
            border-radius: 5px;
        }

        .help-section h2 {
            color: #2469A5;
        }

        /* Footer and Bottom Info */
        .bottom-info {
            font-size: 16px;
            line-height: 1.5;
            color: grey;
            padding: 50px 60px 20px;
        }

        .footer {
            text-align: center;
            padding: 10px;
            background-color: #2469A5;
            font-size: 14px;
            color: white;
            width: 100%;
        }

        .sipalingsapa {
            color: #2469A5;
            font-weight: bold;
        }

        /* Media Queries */
        @media (max-width: 768px) {
            .contact-container {
                flex-direction: column;
                align-items: center;
            }

            .contact-container iframe, .contact-info {
                width: 100%;
            }

            .bottom-info {
                font-size: 14px;
            }

            /* Make navbar items stack vertically on mobile */
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
                display: flex;
            }

            .navbar-nav a {
                padding: 10px 20px;
                width: 100%;
                text-align: left;
            }

            /* Move the toggle to the right side of the navbar */
            .navbar-toggle {
                display: flex;
            }
        }

        @media (max-width: 400px) {
            .navbar-brand img {
                height: 40px;
            }
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
            <div class="navbar-nav" id="navbarNav">
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('profile') }}">Profile</a>
                <a href="#">Kuesioner</a>
                <a href="{{ route('infografis') }}">Info Grafis</a>
                <a href="{{ route('bantuan') }}" class="bantuan-button active">Bantuan</a>
            </div>

            <!-- Hamburger Icon -->
            <div class="navbar-toggle" id="navbar-toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>

        <!-- Help Section -->
        <div class="help-section">
        </div>

        <!-- Contact Section -->
        <div class="contact-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.4121744803957!2d111.04365!3d-6.7487441!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70d2538f64a577%3A0xc5900941f4d3b89f!2sDinas%20Kesehatan%20Kabupaten%20Pati!5e0!3m2!1sid!2sid!4v1578581465204!5m2!1sid!2sid"></iframe>

            <div class="contact-info">
                <h3>Dinas Kesehatan Kabupaten Pati</h3>
                <p>Jl. Raya Pati - Kudus Km. 3,5 (Komplek BPBD) Pati, Jawa Tengah</p>
                <p><strong>Telepon:</strong> (0295) 381351</p>
                <p><strong>Fax:</strong> (0295) 381375</p>
                <p><strong>Email:</strong> <a href="mailto:bappeda@patikab.go.id">bappeda@patikab.go.id</a></p>
            </div>
        </div>

        <!-- Informasi Kontak -->
        <div class="bottom-info">
            <span class="sipalingsapa">Sipalingsapa.com All rights reserved.</span><br>
            Informasi dan pelayanan dapat dilakukan melalui:<br>
            Alamat: Jalan Raya Pati - Kudus Km. 3,5 (Komplek BPBD) Pati Jawa Tengah<br>
            Telepon: 0295 381351<br>
            Fax: 0295 381375<br>
            Kode Pos: 59163<br>
            Email: <a href="mailto:bappeda@patikab.go.id">bappeda@patikab.go.id</a><br>
            Website: <a href="http://bappeda.patikab.go.id" target="_blank">bappeda.patikab.go.id</a>
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
