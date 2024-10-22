<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dinas Kesehatan - Kabupaten Pati</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            /* Disable scrolling */
            font-family: Arial, sans-serif;
            /* Use Arial font */
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

        /* Adjust the vertical position of navbar items */
        .navbar-nav {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            margin-left: 0;
            padding-left: 0;
            position: relative;
            left: -137px;
        }

        /* Navbar links */
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
            right: 50px;
            /* Align it to the right of the navbar */
            left: 50px;
            top: 50%;
            /* Center it vertically */
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

        .kajian-rumpun-title {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            margin: 40px 0;
            font-weight: bold;
        }

        .kajian-rumpun-title:before,
        .kajian-rumpun-title:after {
            content: '';
            flex: 1;
            border-bottom: 2px solid #2469A5;
            margin: 0 20px;
        }

        /* Style for the text in the bottom-left corner */
        .kajian-info {
            margin-top: 20px;
            /* Memberi jarak di bawah garis biru */
            padding-left: 20px;
            /* Menjaga jarak dari sisi kiri konten */
            text-align: left;
            font-size: 16px;
            color: #333;
        }

        .kajian-info p {
            margin: 5px 0;
        }

        .kajian-info p:first-child {
            font-weight: bold;
            /* Bold untuk teks pertama */
        }

        .select-data {
            margin-top: 15px;
            /* Jarak antara teks di atas dan tombol select */
            padding-left: 20px;
            /* Menjaga konsistensi posisi dengan kajian-info */
            display: flex;
            align-items: center;
            /* Align items horizontally */
            gap: 15px;
            /* Space between elements */
            justify-content: flex-start;
            /* Keep elements aligned to the left */
        }

        .select-data select {
            padding: 8px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 200px;
            /* Lebar kotak select */
        }

        .select-data input[type="text"] {
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
            width: 200px;
            /* Lebar input search */
        }

        .select-data button {
            padding: 8px 16px;
            background-color: #2469A5;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .select-data button:hover {
            background-color: #1a4d7e;
        }

        .kajian-table {
            margin-top: 20px;
            width: 100%;
            border-collapse: collapse;
        }

        .kajian-table table {
            width: 100%;
            border: 1px solid #ddd;
        }

        .kajian-table th,
        .kajian-table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .kajian-table th {
            background-color: #2469A5;
            color: white;
        }

        .kajian-table tr:hover {
            background-color: #f1f1f1;
        }

        /* Mengatur lebar kolom NO menjadi lebih kecil */
        .numbering {
            width: 1px;
            /* Lebar kolom NO diatur menjadi 1% */
            text-align: center;
        }

        .kajian-table th:nth-child(1),
        .kajian-table td:nth-child(1) {
            width: 5%;
            /* Lebar kolom NO */
            text-align: center;
        }

        /* Mengatur lebar kolom Tahun */
        .kajian-table th:nth-child(2),
        .kajian-table td:nth-child(2) {
            width: 10%;
            /* Lebar kolom Tahun */
            text-align: center;
        }

        /* Mengatur lebar kolom Judul, Penyusun, dan Deskripsi untuk lebih lebar */
        .kajian-table th:nth-child(3),
        .kajian-table th:nth-child(4),
        .kajian-table th:nth-child(5),
        .kajian-table th:nth-child(6),
        .kajian-table td:nth-child(3),
        .kajian-table td:nth-child(4),
        .kajian-table td:nth-child(5),
        .kajian-table td:nth-child(6) {
            width: 25%;
            /* Lebar kolom lainnya (Judul, Penyusun, Deskripsi) */
            text-align: center;
            /* Memusatkan teks */
        }

        .kajian-table td {
            vertical-align: top;
        }

        .download-icon i {
            color: red;
            /* Warna merah untuk ikon */
            font-size: 20px;
            /* Ukuran ikon */
            text-decoration: none;
            /* Menghilangkan underline jika ada */
        }

        .download-icon:hover i {
            color: darkred;
            /* Warna saat hover */
        }

        /* Pagination style */
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination a {
            margin: 0 5px;
            padding: 8px 12px;
            background-color: #2469A5;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }

        .pagination a:hover {
            background-color: #1a4d7e;
        }

        .pagination a.active {
            background-color: #1a4d7e;
        }

        .pagination a.disabled {
            background-color: #ccc;
            color: #666;
            pointer-events: none;
        }

        .bottom-info {
            margin-top: 30px;
            padding: 10px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .bold-text {
            font-weight: bold;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            padding: 10px;
            background-color: #2469A5;
            color: white;
        }

        /* Media Queries for Responsiveness */
        @media (max-width: 768px) {
            .navbar-nav {
                display: none;
                /* Sembunyikan navbar saat layar kecil */
                flex-direction: column;
                /* Ubah menjadi kolom */
                position: absolute;
                /* Posisi absolut untuk navbar */
                top: 60px;
                /* Jarak dari atas */
                left: 0;
                /* Mulai dari kiri */
                right: 0;
                /* Lebar penuh */
                background-color: #fff;
                /* Latar belakang putih */
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                /* Bayangan untuk navbar */
            }

            .navbar-nav a {
                padding: 10px 20px;
                width: 100%;
                text-align: left;
            }

            .navbar-nav.show {
                display: flex;
                /* Show when toggle is active */
            }

            .navbar-toggle {
                display: flex;
                /* Tampilkan toggle */
            }

            .kajian-table {
                font-size: 14px;
                /* Kecilkan ukuran font pada tabel */
            }
        }
    </style>
</head>

<body>
    <div class="content">
        <nav class="navbar">
            <div class="navbar-brand">
                <img src="{{ asset('images/logodin.png') }}" alt="logo">
            </div>

            <div class="navbar-nav" id="navbarNav">
                <!-- ID navbar diubah di sini -->
                <a href="{{ route('home') }}" class="home">Home</a>
                <a href="{{ route('profile') }}">Profile</a>
                <a href="/login" class="kuesioner">Kuesioner</a>
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

        <div class="kajian-rumpun-title">
            Kajian Rumpun
        </div>
        <div class="kajian-info">
            <p>Kajian Dinas Kesehatan Kabupaten Pati</p>
            <p>Sistem Informasi Rumpun Bidang Infrastruktur dan Kewilayahan Pati</p>
        </div>

        <div class="select-data">
            <form method="GET" action="{{ route('kajian') }}">
                <input type="text" name="search" placeholder="Cari data disini" value="{{ request('search') }}">
                <button type="submit">Cari</button>
            </form>
        </div>

        <div class="kajian-table">
            <table>
                <thead>
                    <tr>
                        <th class="numbering">NO</th>
                        <th>Tahun</th>
                        <th>Judul</th>
                        <th>Penyusun</th>
                        <th>Deskripsi</th>
                        <th>Lihat</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($documents as $document)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $document->tahun }}</td>
                        <td>{{ $document->title }}</td>
                        <td>{{ $document->penyusun }}</td>
                        <td class="row-data">{{ $document->description }}</td>
                        <td>
                            <a href="{{ asset('storage/' . $document->file) }}" target="_blank" class="download-icon"><i
                                    class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada dokumen yang ditemukan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="pagination">
            @if ($documents->onFirstPage())
            <a href="#" class="disabled">Previous</a>
            @else
            <a href="{{ $documents->previousPageUrl() }}">Previous</a>
            @endif

            @for ($i = 1; $i <= $documents->lastPage(); $i++)
                @if ($i == $documents->currentPage())
                <a href="#" class="active">{{ $i }}</a>
                @else
                <a href="{{ $documents->url($i) }}">{{ $i }}</a>
                @endif
                @endfor

                @if ($documents->hasMorePages())
                <a href="{{ $documents->nextPageUrl() }}">Next</a>
                @else
                <a href="#" class="disabled">Next</a>
                @endif
        </div>

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