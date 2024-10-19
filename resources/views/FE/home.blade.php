<!DOCTYPE html>
<html lang="id">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <title>Website Dinkes kab.pati</title>

    <style>
             
/* Global Styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    color: #333;
    overflow-x: hidden; /* Menyembunyikan elemen yang melampaui lebar layar */
}

.container {
    max-width: auto;
    margin: 0 auto;
    padding: 0 0;
}

.navbar {
    background-color: #fff;
    padding: 15px 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
    position: fixed; /* Fixed position */
    top: 0; /* Keep at the top */
    z-index: 1000; /* Ensure it stays on top of other content */
}

.content {
    padding-top: 80px; /* Adjust padding to avoid content being hidden under the fixed navbar */
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

.navbar-nav a.profile, 
.navbar-nav a.home {
    color: #2469A5;
}

/* Hero Section */
.hero {
    background-color: #ffffff;
    margin: 0;
    padding: 0;
    position: relative;
    top: 0; /* Pastikan tidak ada jarak antara header dan hero */
    margin-bottom: 30px;
    height: auto;
}

.hero-content {
    display: flex;
    align-items: center;
    justify-content: space-between;
    height: 100%;
}

.hero-text {
    max-width: 100%;
    padding: 0 10px;
    text-align: center;
}

.hero-image {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: auto; /* Sesuaikan dengan kebutuhan */
}

.hero-image img {
    width: 100%;
    height: auto;
    object-fit: contain; /* Pastikan gambar tidak terpotong */
}

.hero-video {
    width: 100%;
    max-height: 550px; /* Sesuaikan dengan tinggi yang diinginkan */
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 20px 0;
    overflow: hidden;
    position: relative; /* Untuk menempatkan overlay di atas video */
    padding: 0;
    margin: 0;
    top: 0; /* Pastikan videonya sejajar dengan header */
    
}

.hero-video video {
    width: 100%;
    height: auto;
    object-fit: cover; /* Memastikan video mengisi area yang tersedia */
}

.overlay {
    position: absolute; /* Memungkinkan layer untuk berada di atas video */
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Layer transparan hitam */
    z-index: 1; /* Memastikan layer berada di atas video */
}

.overlay-text {
    position: absolute; /* Allows text to be over the video */
    top: 45%; /* Vertically center the text */
    left: 60px; /* Align the text to the left */
    transform: translateY(-50%); /* Adjust for vertical centering */
    color: white; /* Text color */
    font-size: 32px; /* Increase font size */
    font-weight: bold; /* Make text bold */
    text-align: left; /* Align text to the left */
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7); /* Shadow for better readability */
    z-index: 2; /* Ensure text is above overlay */
}

.welcome-message {
    font-size: 2rem; /* Adjust size as needed */
    font-weight: bold; /* Makes it bold */
    color: yellow; /* Set text color to yellow */
}

.sub-message {
    font-size: 1.5rem; /* Adjust size as needed */
    line-height: 1.5; /* Adds spacing between lines */
    margin-top: 0.5rem; /* Add margin to space it from welcome-message */
}

/* Tambahan untuk memastikan tidak ada elemen lain yang terpengaruh */
.container {
    position: relative; /* Memastikan container dapat menampung elemen di dalamnya */
}

/* fitur */
.features {
    display: flex;
    justify-content: center; /* Menyebar item dengan lebih rapi */
    align-items: center;
    background-color: #2469A5; /* Ubah ke warna latar belakang putih */
    padding: 50px; /* Sesuaikan padding untuk lebih banyak ruang */
    border-radius: 16px; /* Sudut yang lebih halus */
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); /* Bayangan lebih lembut */
    position: relative;
    top: -60px;
    z-index: 1; /* Pastikan elemen berada di atas */
    width: 60%;
    margin: 0 auto;
    margin-top: -70px;
    gap: 40px;
}

.feature-item {
    display: flex;
    flex-direction: column; /* Mengubah arah flex untuk gambar di atas teks */
    align-items: center; /* Rata tengah gambar dan teks */
    text-align: center;
    font-size: 16px; /* Ukuran teks default */
    color: rgb(255, 255, 255); /* Warna teks */
    text-decoration: none;
    padding: 0 70px;
    transition: transform 0.3s ease-in-out, color 0.3s;
}

.feature-item:hover {
    transform: scale(1.08); /* Efek hover untuk memperbesar */
    color: #042039; /* Warna teks saat hover */
}

.feature-item img {
    margin-bottom: 10px; /* Jarak antara gambar dan teks */
    max-height: 80px; /* Ukuran ikon yang lebih besar, ubah sesuai kebutuhan */
    transition: transform 0.3s ease-in-out;
    filter: brightness(0) saturate(100%) invert(100%); /* Membuat gambar menjadi putih */
}

.feature-item img:hover {
    transform: scale(1.50); /* Membesarkan gambar saat hover */
    filter: brightness(0) invert(1) saturate(100%); /* Mengubah gambar menjadi putih saat hover */
}

.feature-item span {
    font-size: 18px;
    text-transform: uppercase;
    color: rgb(255, 255, 255); /* Warna teks menjadi hitam */
}

.feature-item::after {
    content: "›"; /* Panah untuk navigasi */
    font-size: 20px;
    transition: transform 0.3s ease-in-out;
    color: #2469a5; /* Warna panah */
    position: absolute;
    right: 0px;
    filter: brightness(0) saturate(100%) invert(28%) sepia(84%) saturate(611%)
        hue-rotate(166deg) brightness(120%) contrast(120%);
}

.info-section {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #f5f5f5;
    padding: 30px;
    margin-top: 40px;
    border-radius: 8px;
}

.info-container {
    display: flex;
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
}

.info-left {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
}

.info-left img {
    max-width: 200px;
    margin-bottom: 20px;
}

.info-title {
    color: red;
    font-weight: bold;
    font-size: 18px;
    margin: 0;
}

.info-right {
    flex: 2;
    padding-left: 30px;
}

.info-right h2 {
    color: #1e73be;
    font-weight: bold;
    margin-bottom: 20px;
    font-size: 14px;
}

.info-right p {
    color: #666;
    font-size: 12px;
    line-height: 1.6;
    margin-bottom: 20px;
}

.info-right a {
    color: #1e73be;
    font-weight: bold;
    text-decoration: none;
    font-size: 10px;
}

.info-right a:hover {
    text-decoration: underline;
}

/* Gallery Section */
.gallery-container {
    text-align: center;
    padding: 20px;
    font-size: 14;
    position: relative;
}
.gallery-container h2 {
    font-size: 28px;
    margin-bottom: 10px;
}

.underline {
    width: 80px;
    height: 2px;
    background-color: #2469a5;
    margin: 0 auto;
    margin-top: 0px;
    margin-bottom: 0px;
}

.gallery-wrapper {
    overflow: hidden; /* Hanya tampilkan sebagian galeri yang muat dalam kontainer */
    width: 100%;
    position: relative;
}

.gallery {
    display: flex;
    justify-content: center;
    align-items: flex-start;
    gap: 90px;
    position: relative;
    flex-wrap: wrap;
}


.gallery-item {
    text-align: left;
    width: 350px; /* or a percentage for responsiveness */
    align-items: center;     /* Menempatkan gambar di tengah secara vertikal */
}


.gallery-item img {
    max-width: 100%;
    height: 300px;
    object-fit: cover;
    border-radius: 5px;
    margin: 0 auto;
    margin-bottom: 5px;
}

.date {
    font-size: 14px;
    color: gray;
    text-align: left;
    margin-bottom: 0px;
    margin-top: 0px;
}

h3 {
    font-size: 14px;
    color: #000;
    text-align: left;
    margin-bottom: 0px;
    margin-top: 0px;
}

.arrows {
    position: absolute;
    top: 90%;
    width: 50%;
    display: flex;
    justify-content: space-between;
    transform: translateY(-50%);
}

.left-arrow,
.right-arrow {
    cursor: pointer;
    background-color: rgba(0, 0, 0, 0.5);
    color: white;
    font-size: 24px;
    padding: 50px;
    border-radius: 90%;
}

.left-arrow:hover,
.right-arrow:hover {
    background-color: rgba(0, 0, 0, 0.8);
}

/* Video Tutorial Section */
.video-tutorial {
    text-align: center;
    background-color: #162447;
    padding: 10px 10px;
    color: white;
}
.video-tutorial h2 {
    font-size: 16px;
}

.video-main img {
    width: 100%; /* Make the video fill the width of its container */
    height: auto; /* Maintain the aspect ratio */
    padding: 15px; /* Keep padding around the video */
    border-radius: 10px; /* Add rounded corners */
}

.video-thumbnails {
    display: flex;
    justify-content: center;
    margin-top: 15px;
}

.thumbnail-item {
    margin: 0 10px; /* Add horizontal spacing between thumbnails */
}

.thumbnail-item img {
    width: 200px;
    height: 130px;
    border-radius: 5px;
    transition: transform 0.3s ease;
}

.thumbnail-item img:hover {
    transform: scale(1.1);
}

.view-more {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 20px;
    background-color: #1f4068;
    color: white;
    border-radius: 5px;
    text-decoration: none;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

.view-more:hover {
    background-color: #e43f5a;
}

.arrows {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 100%;
    display: flex;
    justify-content: space-between;
    pointer-events: none;
}

.arrows .left-arrow,
.arrows .right-arrow {
    font-size: 30px;
    cursor: pointer;
    padding: 10px;
    color: #1e73be;
    pointer-events: all;
    background-color: rgba(255, 255, 255, 0.7);
    border-radius: 50%;
}
.arrows .left-arrow {
    position: absolute;
    left: 10px;
}
.arrows .right-arrow {
    position: absolute;
    right: 10px;
}
.arrows .left-arrow:hover,
.arrows .right-arrow:hover {
    color: #333;
}

.help-title {
    text-align: center;
    margin-bottom: 30px;
}
.help-title h2 {
    font-size: 20px;
    color: #2469a5;
    margin-bottom: 10px;
}
.help-title p {
    font-size: 16px;
    color: #666; /* Warna teks deskripsi */
    margin: 0; /* Menghilangkan margin default */
}
.help-section {
    display: grid;
    grid-template-columns: repeat(4, 1fr); /* Membuat 4 kolom grid */
    gap: 20px; /* Jarak antar kotak */
    justify-items: center; /* Memusatkan item di tengah grid */
    align-items: center; /* Memusatkan konten secara vertikal */
    padding: 20px;
}

.help-item {
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Bayangan lembut untuk kotak */
    border-radius: 5px;
    padding: 20px;
    width: 75%; /* Membuat lebar kotak sesuai dengan kolom grid */
    height: 200px; /* Tinggi standar untuk setiap kotak */
    text-align: center;
    transition: transform 0.3s ease;
}

.help-item:hover {
    transform: scale(1.05); /* Efek hover */
}

.help-item h3 {
    font-size: 18px;
    margin-bottom: 10px;
    color: #333;
    text-align: left;
}

.help-item p {
    font-size: 14px;
    color: #666;
    text-align: left;
}

.help-item a {
    text-decoration: none;
    color: #007bff; /* Warna link */
    font-weight: bold;
    font-size: 12px;
    text-align: left;
}

.help-item a:hover {
    color: #0056b3; /* Warna link saat hover */
}

.bottom-info {
    font-size: 16px;
    line-height: 1.5;
    color: #333;
    /* font-weight: bold; */
    margin-top: 60px; /* Existing margin */
    margin-bottom: 5px; /* Add this line to create space below */
    text-align: left;
    padding-left: 60px;
    padding-right: 40px;
    padding-top: 50px;
}

/* Main Footer */
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
    font-weight: bold; /* Menjadikan teks menjadi bold */
}

.greeting-content {
    display: flex;
    align-items: flex-start; /* Mengubah ke flex-start untuk mendorong elemen ke atas */
    justify-content: flex-start;
}

.greeting-text {
    max-width: 1000px;
    margin-right: auto;
    margin-left: 150px;
    margin-top: -20px; /* Sesuaikan nilai ini untuk menaikkan lebih lanjut */
}

.greeting-image {
    margin-left: 20px;
    margin-right: 95px;
    transform: translateY(-20px); /* Menaikkan gambar menggunakan transform */
}

.greeting-image img {
    width: 100%;
    max-width: 450px;
    height: auto;
    border-radius: 8px;
}

.action-button {
    background-color: #bc0000; /* Set your desired background color */
    color: white; /* Set text color */
    border: none; /* Remove default border */
    padding: 10px 20px; /* Adjust padding */
    font-size: 1rem; /* Adjust font size */
    border-radius: 5px; /* Add rounded corners */
    cursor: pointer; /* Change cursor on hover */
    margin-top: 15px; /* Add margin for spacing from sub-message */
    transition: background-color 0.3s; /* Smooth transition for hover effect */
    text-decoration: none; /* Remove underline */
    display: inline-block; /* Tampil normal pada desktop */
}

.action-button:hover {
    background-color: #ff5c5c; /* Darker shade on hover */
}

.help-item:last-child {
    background-color: #8eb6d8;
    color: white; /* Change the text color to white for better contrast */
    padding: 15px; /* Optional: Add padding for better spacing */
    border-radius: 5px; /* Optional: Add rounded corners */
}

.help-item:last-child h3,
.help-item:last-child p,
.help-item:last-child a {
    color: white; /* Ensure headings, paragraphs, and links have white text */
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

.kuesioner {
    color: #007bff;
    text-decoration: none;
    font-weight: bold;
}

.kuesioner-link:hover {
    color: #0056b3;
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

/* Default global styles, these will apply to larger screens (desktops, tablets, etc.) */

/* Responsive adjustments for mobile devices */
@media (max-width: 768px) {
    .navbar {
        justify-content: space-between;
        align-items: center;
    }

    .navbar-nav.show {
        display: flex; /* Show when toggle is active */
    }

    .navbar-toggle {
        display: flex;
    }

    .navbar-brand {
        margin-left: 0.5px; /* Align to the left on mobile */
        margin-right: 10px; /* Ensure space for toggle */
    }

    .navbar-nav.active {
        display: flex;
        flex-direction: column; /* Tampilkan item secara vertikal */
        width: 100%; /* Lebar penuh pada tampilan mobile */
        position: absolute;
        top: 60px; /* Sesuaikan dengan posisi navbar */
        left: 0;
        background-color: #fff; /* Latar belakang navbar dropdown */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Shadow untuk dropdown */
        z-index: 1000;
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

    .navbar-nav a {
        padding: 10px 20px;
        width: 100%;
        text-align: left;
        font-size: 50px; /* Ukuran font yang lebih besar */
    }

    .feature-item {
        display: none; /* Sembunyikan feature-item pada tampilan mobile */
    }

    /* Tampilkan feature-item di dalam dropdown ketika toggle aktif */
    .navbar-nav.active .feature-item {
        display: block;
    
    }

    .content {
        padding-top: 60px; 
    }

    .hero-content {
        flex-direction: column; /* Stack hero text and image vertically */
    }

    .hero-text {
        text-align: center;
        padding: 0 20px;
    }

    .hero-image img {
        width: 100%;
    }

    .hero-video {
        margin-top: 50px;
        max-height: 300px;
    }

    .overlay-text {
        left: 20px; /* Adjust position for smaller screens */
        font-size: 15px;
    }

    /* .features {
        flex-direction: column; 
        width: 90%;
        padding: 30px;
        gap: 20px;
    } */

    /* .feature-item {
        padding: 0 20px;
        font-size: 14px;
    } */

    .info-section {
        flex-direction: column;
        padding: 20px;
    }

    .info-left, .info-right {
        width: 100%;
        text-align: center; /* Center the text on mobile */
        padding-left: 0;
        padding-right: 0;
    }

    .info-left img {
        max-width: 150px;
    }

    .info-right h2 {
        font-size: 16px;
    }

    .gallery-container h2 {
        font-size: 22px;
    }

    .gallery {
        flex-direction: column;
        gap: 20px;
        justify-content: center;
    }

    .gallery-item {
        width:500px;
        justify-content: center;
    }

    .gallery-item img {
        height: 250px;
        width: 400px;
        justify-content: center;
    }

    .video-main img {
        width: 100%; /* Memastikan video tetap menyesuaikan lebar layar */
        height: auto; /* Menjaga rasio aspek video */
        padding: 10px; /* Mengurangi padding pada ukuran layar lebih kecil */
        border-radius: 5px; /* Sudut yang lebih lembut pada layar kecil */
    }

    .video-tutorial h2 {
        font-size: 20px;
    }

    .video-main iframe {
        width: 100%; /* Video will take full width of its container */
        height: auto; /* Maintain aspect ratio */
        max-width: 100%; /* Ensures the video doesn't overflow */
        border-radius: 10px; /* Optional: Adds rounded corners */
        padding: 15px;
    }

    .video-thumbnails {
        flex-direction: column; /* Ubah thumbnail menjadi satu kolom */
        align-items: center; /* Pusatkan thumbnail */
        margin-top: 10px; /* Kurangi margin di atas thumbnail */
    }

    .thumbnail-item {
        margin: 10px 0; /* Tambahkan margin di atas dan bawah untuk spasi antar thumbnail */
    }

    .thumbnail-item img {
        width: 100%; /* Buat gambar thumbnail mengisi lebar kontainer */
        height: auto; /* Jaga proporsi gambar */
        max-width: 250px; /* Tetapkan batas maksimum ukuran thumbnail */
    }

    .view-more {
        margin-top: 15px; /* Kurangi margin pada tombol view-more */
        font-size: 0.9rem; /* Sesuaikan ukuran teks untuk layar kecil */
        padding: 8px 15px; /* Kurangi padding tombol untuk layar kecil */
    }

    .help-section {
        grid-template-columns: 1fr; /* Make the help items stack vertically */
        gap: 15px;
    }

    .help-item {
        width: 90%;
    }

    .action-button {
        display: none; /* Menyembunyikan elemen saat ukuran layar <= 768px */
    }

    .greeting-content {
        flex-direction: column;
        align-items: center;
    }

    .greeting-text, .greeting-image {
        margin-top: 20px;
        margin-left: 0;
        margin-right: 0;
    }

    .greeting-text {
        text-align: justify;
        font-size: 14px;
    }

    .greeting-text h2 {
        text-align: center;
        font-size: 20px;
        font-weight: bold;
    }

    .greeting-image {
        display: none; /* Hide the image */
    }

    .footer {
        font-size: 8px; /* Mengurangi ukuran font untuk lebih kecil */
        padding: 2px; /* Mengurangi padding untuk footer */
        text-align: center; /* Optional: Untuk memastikan footer tetap rata tengah */
    }

    .bottom-info {
        font-size: 14px;
        padding-left: 20px;
        padding-right: 20px;
    }

    .help-title h2 {
        font-size: 18px;
    }

    .welcome-message {
        font-size: 28px; /* Mengurangi ukuran font pada layar kecil */
        padding: 0 10px; /* Tambahkan sedikit padding untuk tampilan lebih rapi */
    }

    .sub-message {
        font-size: 16px; /* Ukuran font yang lebih kecil di layar mobile */
        padding: 0 10px; /* Tambahkan padding agar tidak terlalu rapat di sisi */
    }


}

/* Responsive adjustments for very small screens (phones, narrow devices) */
@media (max-width: 480px) {
    .navbar-brand img {
        height: 60px;
    }

    .navbar-nav {
        padding-left: 0;
        padding-right: 0;
    }

    .navbar-nav a {
        font-size: 17px;
    }

    .hero-content {
        padding: 20px;
    }

    .overlay-text {
        font-size: 20px;
    }

    .features {
        padding: 1px;
    }

    .info-section {
        padding: 15px;
    }

    .welcome-message {
        font-size: 24px; /* Ukuran font lebih kecil untuk layar sangat kecil */
    }

    .sub-message {
        font-size: 14px; /* Ukuran font lebih kecil pada layar kecil */
    }

    .info-left img {
        max-width: 100px;
    }

    .gallery-item img {
        height: 200px;
    }

    .video-main img {
        width: 100%; /* Video memenuhi layar penuh */
        height: auto; /* Menjaga rasio video */
        padding: 5px; /* Kurangi padding lebih lanjut */
        border-radius: 5px; /* Lebih lembut di perangkat yang lebih kecil */
    }

    .video-main iframe {
        width: 90%; /* Full width on mobile */
        height: 150px; /* Auto height to keep aspect ratio */
        margin-right: 10px;
    }

    .video-thumbnails {
        flex-direction: column; /* Atur thumbnail secara vertikal */
        align-items: center; /* Pusatkan thumbnail */
        margin-top: 5px; /* Kurangi jarak di atas thumbnail */
    }

    .thumbnail-item img {
        width: 100%; /* Buat thumbnail memenuhi lebar kontainer */
        height: auto; /* Jaga rasio aspek gambar */
        max-width: 200px; /* Maksimum ukuran thumbnail di ponsel */
    }

    .view-more {
        margin-top: 10px; /* Kurangi margin di atas tombol */
        font-size: 0.8rem; /* Kurangi ukuran teks untuk layar kecil */
        padding: 6px 12px; /* Kurangi padding tombol lebih lanjut */
    }

    .footer {
        font-size: 10px;
        padding: 5px;
    }

    .help-title h2 {
        font-size: 16px;
    }
}

    </style>

</head>

<body>
    <header>
    <nav class="navbar">
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
        </nav>
    </header>

    <main>
    <section class="hero">
    <div class="container hero-content">
        <div class="hero-video">
            @foreach ($videoBanner as $videoBanner)
            <video autoplay muted loop>
                <source src="{{ asset('storage/' . $videoBanner->file_name) }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        @endforeach
            <div class="overlay"></div> <!-- Layer transparan di atas video -->
            <div class="overlay-text">
                <div class="welcome-message" id="greeting-text">SELAMAT DATANG</div>
                <div class="sub-message">
                    DI WEBSITE SISTEM INFORMASI RUMPUN<br>
                    BIDANG INFRASTRUKTUR DAN KEWILAYAHAN PATI
                </div>
                <a href="#greeting" class="action-button" id="scroll-button">Lihat Selengkapnya</a>
            </div>
        </div>
    </div>
</section>

<!-- Greeting Section -->
<section id="greeting">
    <div class="greeting-image">
        <!-- <img src="path/to/your/image.jpg" alt="Greeting Image"> -->
    </div>
    <div class="greeting-text">
        <!-- Any additional greeting text can go here -->
        <!-- <p>Selamat datang di website kami!</p> -->
    </div>
</section>

<!-- JavaScript for smooth scrolling -->
<script>
    document.getElementById('scroll-button').addEventListener('click', function (event) {
        event.preventDefault(); // Prevent the default anchor click behavior
        const targetId = this.getAttribute('href'); // Get the target section ID
        const targetSection = document.querySelector(targetId); // Select the target section

        // Scroll to the target section smoothly
        targetSection.scrollIntoView({
            behavior: 'smooth'
        });
    });

    document.getElementById('navbar-toggle').addEventListener('click', function() {
    const navbarNav = document.querySelector('.navbar-nav');
    navbarNav.classList.toggle('show');
});


</script>


        <div class="container">
            <!-- Features Section -->
            <section class="features">
                <a href="#" class="feature-item">
                    <img src="{{ asset('images/ehra.png') }}" alt="">
                    <span>EHRA</span>
                    <div class="arrow"></div>
                </a>
                <a href="{{ route('kajian') }}" class="feature-item">
                    <img src="{{ asset('images/kajian.png') }}" alt="">
                    <span>Kajian Rumpun</span>
                    <div class="arrow"></div>
                </a>
                <a href="{{ route('petasebaran') }}" class="feature-item">
                    <img src="{{ asset('images/peta.png') }}" alt="">
                    <span>Peta Sebaran</span>
                </a>
            </section>

            <!-- Kata Sambutan Section -->
            <section class="greeting">
                <div class="container">
                    <div class="greeting-content">
                        <div class="greeting-text">
                            <h2>Selamat Datang di Website Dinas Kesehatan Kab. Pati</h2>
                            <p>Assalaamu’alaikum warahmatullaahi wabarakaatuh, Salam sejahtera bagi kita semua.</p>
                            <p>Puji syukur kita panjatkan kehadirat Allah SWT yang telah melimpahkan kenikmatan kepada kita semua. 
                            Tak lupa kami panjatkan rasa syukur kami atas terwujudnya website Dinas Kesehatan Kabupaten Pati sebagai salah satu media informasi bagi masyarakat.</p>
                            <p>Website Dinas Kesehatan Kabupaten Pati merupakan salah satu upaya penyebarluasan informasi seputar program serta kegiatan di Dinas Kesehatan Kabupaten Pati. 
                            Kami berharap bahwa website ini selain sebagai media publikasi dan promosi, juga dapat menjadi sarana komunikasi interaktif sehingga memberikan manfaat yang seluas-luasnya bagi semua pihak.</p>
                            <p>Masih banyak kekurangan dalam website ini. Masukan dan saran sangat kami harapkan sebagai koreksi agar website ini menjadi lebih baik.</p>
                            <p>Wassalaamu’alaikum warahmatullaahi wabarakaatuh.</p>
                        </div>
                        <div class="greeting-image">
                            <img src="{{ asset('images/SIKEPA.png') }}" alt="Kata Sambutan">
                        </div>
                    </div>
                </div>
            </section>

            <!-- Gallery Section -->
            <section class="gallery-container">
                <h2>Galeri</h2>
                <div class="underline"></div>
                <br>
                <div class="gallery-wrapper">
                    <div class="gallery">
                        @foreach ($activityGalleries as $activity)
                            <div class="gallery-item">
                                <img src="{{ asset('images/activity-galleries/' . $activity->image) }}" alt="{{ $activity->activity_title }}">
                                <p class="date">{{ \Carbon\Carbon::parse($activity->created_at)->format('d M Y') }}</p>
                                <h3>{{ $activity->activity_title }}</h3>
                                <p>{{ \Illuminate\Support\Str::limit($activity->description, 100) }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
                {{-- <div class="arrows">
                    <span class="left-arrow" onclick="moveGallery(-1)">&lt;</span>
                    <span class="right-arrow" onclick="moveGallery(1)">&gt;</span>
                </div> --}}
            </section>
            
            <br>

            <!-- Info Section -->
            <section class="info-section">
                <div class="info-container">
                    <div class="info-left">
                        <img src="{{ asset('images/logodin.png') }}" alt="Logo Kabupaten Pati">
                    </div>
                    <div class="info-right">
                        <h2>SISTEM INFORMASI RUMPUN BIDANG INFRASTRUKTUR DAN KEWILAYAHAN PATI</h2>
                        <p>SISTEM INFORMASI RUMPUN BIDANG INFRASTRUKTUR DAN KEWILAYAHAN PATI Merupakan aplikasi digital
                            untuk memantau dan melakukan monitoring sanitasi dan pengolahan limbah rumah tangga. Kami
                            terus berkomitmen untuk memberikan pelayanan dan informasi yang akurat untuk mendorong
                            sebaran dan analisa yang kredibel.</p>
                        <a href="#">SELENGKAPNYA</a>
                    </div>
                </div>
            </section>

            <br>

 <section class="video-tutorial" style="background-image: url('{{ asset('images/BackgroundVid.png') }}'); background-size: cover; background-position: center; padding: 40px 20px; color: white;">
                <div class="container">
                    <section class="video-section">
                        <h2>Video Tutorial</h2>
                        <div class="video-main">
                            @if ($videos->isNotEmpty())
                                <!-- Ambil video pertama dari koleksi untuk ditampilkan -->
                                @php
                                    // Pastikan URL berformat https://www.youtube.com/watch?v=videoId atau https://youtu.be/videoId
                                    $firstVideo = $videos->first();
                                    parse_str( parse_url( $firstVideo->youtube_url, PHP_URL_QUERY ), $urlParams );
                                    $videoId = $urlParams['v'] ?? basename(parse_url($firstVideo->youtube_url, PHP_URL_PATH));
                                @endphp
                                @if ($videoId)
                                    <iframe width="680" height="415" src="https://www.youtube.com/embed/{{ $videoId }}" frameborder="0" allowfullscreen></iframe>
                                @else
                                    <p>Video URL tidak valid.</p>
                                @endif
                            @else
                                <p>Tidak ada video tersedia.</p>
                            @endif
                        </div>
            
                        <div class="video-thumbnails" style="display: flex; flex-wrap: wrap; gap: 15px; margin-top: 20px;">
                            @foreach ($videos as $video)
                                @php
                                    // Pastikan URL berformat https://www.youtube.com/watch?v=videoId atau https://youtu.be/videoId
                                    parse_str( parse_url( $video->youtube_url, PHP_URL_QUERY ), $urlParams );
                                    $videoId = $urlParams['v'] ?? basename(parse_url($video->youtube_url, PHP_URL_PATH));
                                @endphp
                                @if ($videoId)
                                    <div class="thumbnail-item" style="cursor: pointer;" onclick="document.querySelector('.video-main iframe').src='https://www.youtube.com/embed/{{ $videoId }}';">
                                        <img src="https://img.youtube.com/vi/{{ $videoId }}/0.jpg" alt="{{ $video->title }}" style="width: 120px; height: 90px; object-fit: cover;">
                                        <p style="color: white;">{{ $video->title }}</p>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </section>
                </div>
            </section>
            
  

                
            <br>

            <!-- Help Section -->
            <section class="help-title">
                <h2>Butuh Bantuan?</h2>
                <p>Kami di sini untuk melayani dan menyelesaikan pertanyaan Anda.</p>
            </section>
            <section class="help-section">
                @forelse ($faqs as $faq)
                    <div class="help-item">
                        <!-- Menampilkan Judul FAQ -->
                        <h2 class="faq-title">{{ $faq->title }}</h2> <!-- Menampilkan title -->
            
                        <!-- Menampilkan Pertanyaan FAQ -->
                        <h3 class="faq-question">{{ $faq->question }}</h3>
            
                       
            
                        <!-- Tombol untuk melihat solusi -->
                        <a href="#" class="view-solution">LIHAT SOLUSI</a>
                    </div>
                @empty
                    <p>Tidak ada FAQ yang tersedia saat ini.</p>
                @endforelse
            </section>
            
            

            
            
           
            
        </div>
    </main>

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

    <!-- Footer Section -->
    <div class="footer">
        &copy; 2024 Kabupaten Pati
    </div>
</body>


</html>
