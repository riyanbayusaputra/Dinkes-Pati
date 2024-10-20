<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dinas Kesehatan - Kabupaten Pati</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            font-family: Arial, sans-serif;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .content {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            height: 100%;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .navbar {
            background-color: #fff;
            padding: 15px 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            position: sticky;
            top: 0;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
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
            margin-left: 0; /* Pastikan tidak ada margin kiri */
            padding-left: 0; /* Hilangkan padding */
            position: relative; /* Memungkinkan pengaturan posisi relatif terhadap elemen lain */
            left: -120px; /* Atur posisi lebih ke kiri */
        }

        .navbar-nav a {
            margin: 0 20px; 
            color: #333;
            font-size: 18px;
            text-decoration: none;
            font-weight: bold; 
        }

        .navbar-nav a.infografis {
            color: #2469A5;
        }

        /* Untuk tombol "Bantuan" khusus */
        .navbar-nav a.bantuan-button {
            background-color: orange; /* Warna tombol oranye */
            color: white !important; /* Warna teks putih, dengan !important untuk memaksa */
            padding: 10px 20px; /* Padding tombol */
            border-radius: 5px; /* Membuat tombol melengkung */
            text-decoration: none; /* Menghilangkan garis bawah */
            display: inline-block;
            transition: background-color 0.3s ease, color 0.3s ease; /* Animasi transisi untuk smooth effect */
        }

        /* Hover effect untuk tombol "Bantuan" */
        .navbar-nav a.bantuan-button:hover {
            background-color: rgb(255, 214, 164); /* Warna oranye lebih gelap saat dihover */
            color: white !important; /* Warna teks tetap putih saat hover */
        }

        /* Active state: warna tombol saat di klik */
        .navbar-nav a.bantuan-button:active {
            background-color: #ffd6a4; /* Warna oranye terang saat tombol di klik */
            color: white !important; /* Warna teks tetap putih saat tombol di klik */
            transition: background-color 0.1s ease; /* Transisi cepat saat klik */
        }

        /* Menangani focus state saat tombol di klik (misalnya dari keyboard) */
        .navbar-nav a.bantuan-button:focus {
            background-color: #FF8C00; /* Warna oranye terang saat tombol mendapat fokus */
            color: white !important; /* Warna teks tetap putih saat fokus */
            outline: none; /* Menghilangkan outline */
        }

        .bottom-info {
            font-size: 16px;
            line-height: 1.5;
            color: grey;
            font-weight: light;
            margin-top: 60px;
            margin-bottom: 5px;
            text-align: left;
            padding-left: 60px;
            padding-right: 40px;
            padding-top: 50px;
        }

        .sipalingsapa {
            color: #2469A5;
            font-weight: bold;
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

        .sanitation-risk {
            text-align: center;
            margin: 50px 0;
        }

        .section-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .title-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .blue-line {
            flex-grow: 1;
            height: 1px;
            background-color: #2469A5;
            border: none;
            margin: 0 10px;
            /* Tambahkan margin agar ada jarak antara garis dan judul */
        }

        .chart-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #riskChart {
            max-width: 300px;
            max-height: 300px;
        }

        .legend {
            list-style: none;
            margin-left: 40px;
            padding: 0;
        }

        .legend li {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .color-box {
            width: 20px;
            height: 20px;
            margin-right: 10px;
        }

        .kondisi-sampah {
            width: 80%;
            margin: auto;
            margin-top: 50px;
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

        @media (max-width: 768px) {
            .navbar-nav {
                display: none;
                /* Hide the navigation links by default */
                flex-direction: column;
                width: 100%;
                background-color: #fff;
                position: absolute;
                top: 60px;
                left: 0;
                padding: 10px 0;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            }

            .navbar-nav a {
                padding: 10px 20px;
                width: 100%;
                text-align: left;
            }

            .navbar-toggle {
                display: flex;
                /* Show the hamburger icon */
            }

            .navbar-nav.show {
                display: flex;
                /* Show the navigation links when hamburger is clicked */
            }

            .bottom-info {
                font-size: 14px;
            }

            #riskChart {
                max-width: 220px;
                max-height: 220px;
            }

            .kondisi-sampah {
                width: 100%;
                height: 150%;
                margin: auto;
                margin-top: 50px;
            }
            .search-bar {
                display: none;
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
    </style>
</head>

<body>
    <div class="content">
        <div class="navbar">
            <div class="navbar-brand">
                <img src="{{ asset('images/logodin.png') }}" alt="logo">
            </div>

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
    </div>
    </nav>


        <!-- Content risiko sanitasi -->
        <div class="sanitation-risk">
            <div class="title-container">
                <hr class="blue-line">
                <h2 class="section-title">INDEKS RISIKO SANITASI</h2>
                <hr class="blue-line">
            </div>
            <div class="chart-container">
                <canvas id="riskChart"></canvas>
                <ul class="legend">
                    <li><span class="color-box" style="background-color: #F89B45;"></span> Sumber Air</li>
                    <li><span class="color-box" style="background-color: #998CEB;"></span> Air Limbah Domestik</li>
                    <li><span class="color-box" style="background-color: #F48989;"></span> Persampahan</li>
                    <li><span class="color-box" style="background-color: #4BC0C0;"></span> Genangan Air</li>
                    <li><span class="color-box" style="background-color: #5A87EB;"></span> Perilaku STBM Pilar</li>
                </ul>
            </div>
        </div>

        <!-- Content kondisi sampah -->
        <div class="title-container">
            <hr class="blue-line">
            <h2 class="section-title">KONDISI SAMPAH</h2>
            <hr class="blue-line">
        </div>
        <div class="kondisi-sampah">
            <canvas id="kondisiSampahChart"></canvas>
        </div>


        <!-- Content nilai indeks risiko sanitasi -->
        <div class="nilai-indeks">
            <div class="title-container">
                <hr class="blue-line">
                <h2 class="section-title">RESUME NILAI INDEKS RISIKO SANITASI KABUPATEN PATI</h2>
                <hr class="blue-line">
            </div>
        </div>

        <div class="area-berisiko">
            <div class="title-container">
                <hr class="blue-line">
                <h2 class="section-title">AREA BERISIKO KABUPATEN PATI</h2>
                <hr class="blue-line">
            </div>
        </div>

        <div class="hasil-pengolahan">
            <div class="title-container">
                <hr class="blue-line">
                <h2 class="section-title">HASIL PENGOLAHAN AIR MINUM, DRAINASE, DAN SANITASI</h2>
                <hr class="blue-line">
            </div>
        </div>

        <!-- footer -->
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

        <div class="footer">
            &copy; 2024 Kabupaten Pati
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('riskChart').getContext('2d');
        const riskChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Sumber Air', 'Air Limbah Domestik', 'Persampahan', 'Genangan Air', 'Perilaku STBM Pilar'],
                datasets: [{
                    data: [70, 60, 345, 308, 191],
                    backgroundColor: ['#F89B45', '#998CEB', '#F48989', '#4BC0C0', '#5A87EB']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

        // Grafik Bar - Kondisi Sampah
        const ctx2 = document.getElementById('kondisiSampahChart').getContext('2d');
        const kondisiSampahChart = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ['Strata 0', 'Strata 1', 'Strata 2', 'Strata 3', 'Strata 4', 'Strata 5'],
                datasets: [
                    {
                        label: 'Banyak sampah berserakan atau bertumpuk di sekitar lingkungan',
                        data: [90, 85, 80, 75, 90, 95],
                        backgroundColor: '#4B77E0' // Biru
                    },
                    {
                        label: 'Banyak tikus berkeliaran',
                        data: [70, 60, 65, 55, 50, 65],
                        backgroundColor: '#E47D61' // Merah muda
                    },
                    {
                        label: 'Banyak kucing dan anjing mendatangi tumpukan sampah',
                        data: [65, 55, 50, 60, 45, 50],
                        backgroundColor: '#99EB8C' // Hijau muda
                    },
                    {
                        label: 'Menyumbat saluran drainase',
                        data: [55, 60, 45, 70, 50, 75],
                        backgroundColor: '#F89B45' // Oranye
                    },
                    {
                        label: 'Banyak lalat di sekitar tumpukan sampah',
                        data: [40, 50, 60, 45, 55, 65],
                        backgroundColor: '#8FBCBB' // Biru pucat
                    },
                    {
                        label: 'Banyak nyamuk',
                        data: [50, 40, 45, 55, 60, 70],
                        backgroundColor: '#6C4F95' // Ungu
                    },
                    {
                        label: 'Bau busuk yang mengganggu',
                        data: [35, 30, 45, 40, 60, 80],
                        backgroundColor: '#89D2D3' // Biru muda
                    },
                    {
                        label: 'Ada anak-anak yang bermain disekitarnya',
                        data: [40, 45, 50, 60, 70, 65],
                        backgroundColor: '#85C3EB' // Biru terang
                    },
                    {
                        label: 'Lainnya',
                        data: [25, 35, 30, 25, 40, 50],
                        backgroundColor: '#D689EB' // Ungu muda
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        stacked: false
                    },
                    y: {
                        beginAtZero: true,
                        max: 100
                    }
                },
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    </script>

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