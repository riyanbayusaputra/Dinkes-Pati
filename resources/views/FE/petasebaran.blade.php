<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dinas Kesehatan - Kabupaten Pati</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    </script>
    <style>
        .content {
            display: block;
            flex-direction: column;
            justify-content: flex-start;
            height: 100%;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .container {
            display: inline;
            padding-left: 2vw;
            padding-right: 2vw;
        }

        .option-map {
            margin-top: 100px;
            margin-right: 90px;
            margin-left: 90px;
        }

        .map-container {
            flex: 1;
            height: 100%;
            position: relative;
            /* To position the title */
        }

        .map-title {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: rgba(255, 255, 255, 0.8);
            /* Semi-transparent background */
            padding: 10px;
            border-radius: 5px;
            font-size: 20px;
            font-weight: bold;
            z-index: 1000;
            /* Ensure it appears above the map */
        }

        .leaflet-control-zoom {
            bottom: 10px;
            /* Positioning at the bottom */
            right: 10px;
            /* Positioning to the right */
            position: absolute;
            /* Absolute positioning */
            z-index: 1000;
            /* Ensure it appears above other elements */
        }

        .navbar-custom {
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

        .navbar-custom-brand {
            display: flex;
            align-items: center;
            flex: 1;
        }

        .navbar-custom-brand img {
            height: 60px;
            margin-right: 90px;
            margin-left: 90px;
        }

        /* Adjust the vertical position of navbar-custom items */
        .navbar-custom-nav {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            margin-left: 0;
            padding-left: 0;
            position: relative;
            left: -137px;
        }

        /* navbar-custom links */
        .navbar-custom-nav a {
            margin: 0 20px;
            color: #333;
            font-size: 18px;
            text-decoration: none;
            font-weight: bold;
        }

        /* Bantuan button */
        .navbar-custom-nav a.bantuan-button {
            background-color: orange;
            color: white !important;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .navbar-custom-nav a.bantuan-button:hover {
            background-color: rgb(255, 214, 164);
            color: white !important;
        }

        .navbar-custom-nav a.bantuan-button:active {
            background-color: #ffd6a4;
            color: white !important;
        }

        .navbar-custom-nav a.bantuan-button:focus {
            background-color: #FF8C00;
            color: white !important;
            outline: none;
        }

        /* Hamburger Icon */
        .navbar-custom-toggle {
            display: none;
            flex-direction: column;
            cursor: pointer;
            width: 30px;
            height: 30px;
            justify-content: space-between;
            align-items: center;
            position: absolute;
            right: 50px;
            /* Align it to the right of the navbar-custom */
            left: 50px;
            top: 50%;
            /* Center it vertically */
            transform: translateY(-50%);
        }

        .navbar-custom-toggle span {
            width: 25px;
            height: 3px;
            background-color: #333;
            margin: 4px 0;
            transition: all 0.3s ease-in-out;
        }

        /* Top line (thicker) */
        .navbar-custom-toggle span:nth-child(1) {
            height: 6px;
        }

        /* Middle line (thinner) */
        .navbar-custom-toggle span:nth-child(2) {
            height: 2px;
        }

        /* Bottom line (thicker) */
        .navbar-custom-toggle span:nth-child(3) {
            height: 6px;
        }

        /* Add animation for toggle */
        .navbar-custom-toggle.active span:nth-child(1) {
            transform: rotate(45deg) translate(5px, 5px);
        }

        .navbar-custom-toggle.active span:nth-child(2) {
            opacity: 0;
        }

        .navbar-custom-toggle.active span:nth-child(3) {
            transform: rotate(-45deg) translate(6px, -6px);
        }

        .footer {
            position: fixed;
            bottom: 0;
            text-align: center;
            padding: 10px;
            background-color: #2469A5;
            font-size: 14px;
            color: white;
            width: 100%;
            height: 25px;
            margin: 25px auto 0;
        }

        .bottom-info {
            font-size: 16px;
            line-height: 1.5;
            color: grey;
            font-weight: light;
            text-align: left;
            padding-left: 60px;
            padding-right: 40px;
            padding-top: 50px;
            padding-bottom: 50px;
        }

        .sipalingsapa {
            color: #2469A5;
            font-weight: bold;
        }

        .bottom-info a {
            color: #2469A5;
            text-decoration: underline;
        }

        .navbar-custom-toggle {
            display: none;
            flex-direction: column;
            cursor: pointer;
            margin-right: 20px;
        }

        .navbar-custom-toggle span {
            width: 25px;
            height: 3px;
            background-color: #333;
            margin: 4px 0;
            transition: all 0.3s ease-in-out;
        }

        @media (max-width: 768px) {
            .map-title {
                display: none;
                /* Hide the map title on mobile devices */
            }

            .navbar-custom {
                justify-content: space-between;
                align-items: center;
            }

            .navbar-custom-nav {
                display: none;
                flex-direction: column;
                width: 100%;
                background-color: #fff;
                position: absolute;
                top: 60px;
                left: 0;
                padding: 10px 0;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            }

            .navbar-custom-nav a {
                padding: 10px 20px;
                width: 100%;
                text-align: left;
            }

            .navbar-custom-toggle {
                display: flex;
            }

            .navbar-custom-nav.show {
                display: flex;
            }

            .search-bar {
                display: none;
            }

            /* navbar-custom Brand (Logo) */
            .navbar-custom-brand {
                margin-left: 0.5px;
                /* Align to the left on mobile */
                margin-right: 10px;
                /* Ensure space for toggle */
            }
        }

        @media (max-width: 480px) {
            .navbar-custom-brand img {
                height: 60px;
            }

            .search-bar input[type="text"] {
                width: 100%;
            }
        }

        input[type=radio] {
            --s: 1em;
            /* control the size */
            --c: #009688;
            /* the active color */

            height: var(--s);
            aspect-ratio: 1;
            border: calc(var(--s)/8) solid #939393;
            padding: calc(var(--s)/8);
            background:
                radial-gradient(farthest-side, var(--c) 94%, #0000) 50%/0 0 no-repeat content-box;
            border-radius: 50%;
            outline-offset: calc(var(--s)/10);
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            cursor: pointer;
            font-size: inherit;
            transition: .3s;
        }

        input[type=radio]:checked {
            border-color: var(--c);
            background-size: 100% 100%;
        }

        input[type=radio]:disabled {
            background:
                linear-gradient(#939393 0 0) 50%/100% 20% no-repeat content-box;
            opacity: .5;
            cursor: not-allowed;
        }

        @media print {
            input[type=radio] {
                -webkit-appearance: auto;
                -moz-appearance: auto;
                appearance: auto;
                background: none;
            }
        }

        label {
            display: inline-flex;
            align-items: center;
            gap: 2px;
            margin: 5px;
            margin-right: 10px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="content">
        <div class="navbar-custom">
            <div class="navbar-custom-brand">
                <img src="{{ asset('images/logodin.png') }}" alt="logo">
            </div>

            <div class="navbar-custom-toggle" id="navbar-custom-toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <div class="navbar-custom-nav">
                <a href="{{ route('home') }}" class="home">Home</a>
                <a href="{{ route('profile') }}">Profile</a>
                <a href="/login" class="kuesioner">Kuesioner</a>
                <a href="{{ route('infografis') }}">Info Grafis</a>
                <a href="{{ route('bantuan') }}" class="bantuan-button">Bantuan</a>
            </div>
        </div>


    </div>
    <div class="container-fluid mt-4">
        <div class="option-map">
            <h2>Filter Peta :</h2>
            <div class="d-flex">
                <label><input type="radio" id="Basemap" name="e" checked>Basemap</label>
                <label><input type="radio" id="JaringanAirMinum" name="e">Jaringan Air Minum</label>
                <label><input type="radio" id="DaerahIrigasi" name="e">Daerah Irigasi</label>
                <label><input type="radio" id="KawasanKumuh" name="e">Kawasan Kumuh</label>
                <label><input type="radio" id="SaranaDanPrasarana" name="e">Sarana Dan Prasarana</label>
                <label><input type="radio" id="RumahTidakLayakHuni" name="e">Rumah Tidak Layak Huni</label>
                <label><input type="radio" id="Monev" name="e">Monev</label>
            </div>
        </div>
        <div class="map-container">
            <div id="map" style="height: 30vw; margin-top: 10px"></div>
        </div>
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
    </div>
    <div class="footer">
        &copy; 2024 Kabupaten Pati
    </div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        const map = L.map('map').setView([-6.748821786341696, 111.0437742143056], 13);

        // Add OpenStreetMap tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Function to add a marker with a popup
        function addMarker(lat, lng, name, description) {
            const marker = L.marker([lat, lng]).addTo(map);
            marker.bindPopup(`<b>${name}</b><br>${description}`).openPopup();
        }

        // Example data for sanitation facilities
        const sanitationFacilities = [
            { lat: -6.750, lng: 111.045, name: "Desa A", description: "Sanitasi: 5 Toilet Umum, 2 Tempat Sampah.<br>Informasi: Fasilitas sanitasi di Desa A cukup memadai." },
            { lat: -6.749, lng: 111.042, name: "Desa B", description: "Sanitasi: 3 Toilet Umum, 1 Tempat Sampah.<br>Informasi: Ketersediaan tempat sampah masih kurang." },
            { lat: -6.748, lng: 111.040, name: "Desa C", description: "Sanitasi: 4 Toilet Umum, 2 Tempat Sampah.<br>Informasi: Fasilitas perlu ditingkatkan untuk kenyamanan warga." }
        ];

        // Add markers for sanitation facilities
        sanitationFacilities.forEach(facility => {
            addMarker(facility.lat, facility.lng, facility.name, facility.description);
        });

        // Example data for Rumah Tidak Layak Huni (RTLH)
        const rtlhData = [
            { lat: -6.751, lng: 111.041, name: "Desa A", description: "RTLH: 10 Rumah Tidak Layak Huni.<br>Informasi: Perlu program perbaikan." },
            { lat: -6.748, lng: 111.043, name: "Desa B", description: "RTLH: 5 Rumah Tidak Layak Huni.<br>Informasi: Dukungan pemerintah sangat diperlukan." },
            { lat: -6.749, lng: 111.039, name: "Desa C", description: "RTLH: 7 Rumah Tidak Layak Huni.<br>Informasi: Aksesibilitas terhadap layanan dasar perlu ditingkatkan." }
        ];

        // Add markers for RTLH
        rtlhData.forEach(rtlh => {
            addMarker(rtlh.lat, rtlh.lng, rtlh.name, rtlh.description);
        });

        // Example polygon for the irrigation area
        const irrigationAreaCoords = [
            [-6.748, 111.039],
            [-6.748, 111.045],
            [-6.744, 111.045],
            [-6.744, 111.039]
        ];

        const irrigationArea = L.polygon(irrigationAreaCoords, { color: 'orange', weight: 2 })
            .addTo(map)
            .bindPopup("Daerah Irigasi<br>Informasi: Area ini digunakan untuk pertanian dan irigasi.").openPopup();

        // Example polygon for a slum area
        const slumArea = L.polygon([
            [-6.752, 111.040],
            [-6.752, 111.046],
            [-6.746, 111.046],
            [-6.746, 111.040]
        ]).addTo(map).bindPopup("Kawasan Kumuh<br>Informasi: Memerlukan perhatian lebih untuk pengembangan infrastruktur.").openPopup();

        // Example of loading a GeoJSON layer for drinking water networks
        const drinkingWaterGeoJSON = {
            "type": "FeatureCollection",
            "features": [
                {
                    "type": "Feature",
                    "properties": { "name": "Jaringan Air Minum" },
                    "geometry": {
                        "type": "LineString",
                        "coordinates": [
                            [111.042, -6.750],
                            [111.044, -6.748],
                            [111.046, -6.749]
                        ]
                    }
                }
            ]
        };

        // Add drinking water network GeoJSON layer
        L.geoJSON(drinkingWaterGeoJSON, {
            style: function (feature) {
                return { color: 'blue', weight: 3 };
            },
            onEachFeature: function (feature, layer) {
                layer.bindPopup(`${feature.properties.name}<br>Informasi: Jaringan air minum yang melayani area sekitar.`);
            }
        }).addTo(map);

        // Example of loading a GeoJSON layer for roads
        const roadsGeoJSON = {
            "type": "FeatureCollection",
            "features": [
                {
                    "type": "Feature",
                    "properties": { "name": "Jaringan Jalan" },
                    "geometry": {
                        "type": "LineString",
                        "coordinates": [
                            [111.040, -6.753],
                            [111.048, -6.754],
                            [111.050, -6.751]
                        ]
                    }
                }
            ]
        };

        // Add roads GeoJSON layer
        L.geoJSON(roadsGeoJSON, {
            style: function (feature) {
                return { color: 'green', weight: 2 };
            },
            onEachFeature: function (feature, layer) {
                layer.bindPopup(`${feature.properties.name}<br>Informasi: Jalan ini merupakan akses utama untuk transportasi.`);
            }
        }).addTo(map);

        // navbar-custom toggle functionality
        const navbarcustomToggle = document.getElementById('navbar-custom-toggle');
        const navbarcustomNav = document.getElementById('navbar-customNav');

        navbarcustomToggle.addEventListener('click', () => {
            navbarcustomToggle.classList.toggle('active');
            navbarcustomNav.classList.toggle('show');
        });
    </script>
</body>

</html>