</div><!-- #wrapper end -->

<!-- Go To Top
	============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>

<!-- JavaScripts
	============================================= -->
<script src="{{asset('FE/js/jquery.js')}}"></script>
<script src="{{asset('FE/js/plugins.min.js')}}"></script>

<!-- Footer Scripts
	============================================= -->
<script src="{{asset('FE/js/functions.js')}}"></script>
<script src="{{asset('FE/include/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{asset('FE/include/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>
<script src="{{asset('FE/include/rs-plugin/js/extensions/revolution.extension.video.min.js')}}"></script>
<script src="{{asset('FE/include/rs-plugin/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
<script src="{{asset('FE/include/rs-plugin/js/extensions/revolution.extension.actions.min.js')}}"></script>
<script src="{{asset('FE/include/rs-plugin/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
<script src="{{asset('FE/include/rs-plugin/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
<script src="{{asset('FE/include/rs-plugin/js/extensions/revolution.extension.navigation.min.js')}}"></script>
<script src="{{asset('FE/include/rs-plugin/js/extensions/revolution.extension.migration.min.js')}}"></script>
<script src="{{asset('FE/include/rs-plugin/js/extensions/revolution.extension.parallax.min.js')}}"></script>
<script src="{{asset('FE/js/components/star-rating.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>
	$(document).ready(function() {
		$('#myTable').DataTable();
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
						display: true
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
				datasets: [{
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

		const ctx3 = document.getElementById('chartline').getContext('2d');
		const configline = new Chart(ctx3, {
			type: 'line',
			data: {
				labels: ['2020', '2021', '2023', '2024'],
				datasets: [{
						label: 'RTCH',
						data: [10, 12, 15, 17],
					},
					{
						label: 'Air Minum',
						data: [20, 22, 25, 27]
					},
					{
						label: 'Drainase',
						data: [30, 32, 35, 37]
					},
					{
						label: 'Kawasan Kumuh',
						data: [40, 42, 45, 47]
					},
					{
						label: 'Sanitasi',
						data: [50, 52, 55, 57]
					},
				]
			},
			options: {
				responsive: true,
			}
		});

		const ctx4 = document.getElementById('chartbatang').getContext('2d');
		const configbar = new Chart(ctx4, {
			type: 'bar',
			data: {
				labels: ['Batangan', 'Cluwak', 'Dukuh Seti', 'Gabus'],
				datasets: [{
						label: 'Kecamatan',
						data: [10, 12, 15, 17],
					},
					// {
					//     // label: 'Air Minum',
					//     data: [20,22,25,27]
					// },
					// {
					//     // label: 'Drainase',
					//     data: [30,32,35,37]
					// },
					// {
					//     // label: 'Kawasan Kumuh',
					//     data: [40,42,45,47]
					// },
					// {
					//     // label: 'Sanitasi',
					//     data: [50,52,55,57]
					// },
				]
			},
			options: {
				responsive: true,
				borderRadius: 12,
			}
		});
	})
</script>

<script>
	const map = L.map('map').setView([-6.748821786341696, 111.0437742143056], 10);
	console.log(map);
	// Add OpenStreetMap tile layer
	L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '© OpenStreetMap contributors'
	}).addTo(map);

	function taklayakhuni() {
		$("#RumahTidakLayakHuni").prop("checked", true)
		if ($("#RumahTidakLayakHuni").prop("checked") == true) {
			// console.log($("#RumahTidakLayakHuni").prop("checked"));
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			jQuery.ajax({
				url: "/getkoordinattaklayakhuni",
				method: 'get',
				success: function(result) {
					// L.geoJSON().clearLayers()
					// var myLines = result.data;
					// var myStyle = {
					//     "color": "#0a1df5",
					//     "weight": 2,
					//     "opacity": 0.65
					// };

					// L.geoJSON(myLines, {
					//     style: myStyle
					// }).addTo(map);
				},

			})
		}
	}

	function irigasi() {
		cleargeojson()
		$("#DaerahIrigasi").prop("checked", true)
		if ($("#DaerahIrigasi").prop("checked") == true) {
			// console.log($("#DaerahIrigasi").prop("checked"));
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			jQuery.ajax({
				url: "/getkoordinatirigasi",
				method: 'get',
				success: function(result) {
					L.geoJSON().clearLayers()
					var myLines = result.data;
					var myStyle = {
						"color": "#0a1df5",
						"weight": 2,
						"opacity": 0.65
					};

					L.geoJSON(myLines, {
						style: myStyle
					}).addTo(map);
				},

			})
		}
	}

	function transportsarana() {
		cleargeojson()
		$("#SaranaDanPrasarana").prop("checked", true)
		if ($("#SaranaDanPrasarana").prop("checked") == true) {
			// console.log($("#SaranaDanPrasarana").prop("checked"));
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			jQuery.ajax({
				url: "/getkoordinattransport",
				method: 'get',
				success: function(result) {
					L.geoJSON().clearLayers()
					var myLines = result.data;
					var myStyle = {
						"color": "#0a1df5",
						"weight": 2,
						"opacity": 0.65
					};

					L.geoJSON(myLines, {
						style: myStyle
					}).addTo(map);
				},

			})
		}
	}

	function kawansankumuh() {
		cleargeojson()
		$("#KawasanKumuh").prop("checked", true)
		if ($("#KawasanKumuh").prop("checked") == true) {
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			jQuery.ajax({
				url: "/getkoordinatkawankumuh",
				method: 'get',
				success: function(result) {
					var states = [];

					L.geoJSON(states, {
						style: function(feature) {
							console.log(feature)
							switch (feature.properties.party) {
								case 'Jawa Tengah':
									return {
										color: "#ff0000"
									};
							}
						}
					}).addTo(map);

				},

			})

		}
	}

	function jaringanpdam() {
		$("#JaringanAirMinum").prop("checked", true)

		if ($("#JaringanAirMinum").prop("checked") == true) {
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			jQuery.ajax({
				url: "/getkoordinatpdam",
				method: 'get',
				success: function(result) {
					L.geoJSON().clearLayers()
					var myLines = result.data;
					var myStyle = {
						"color": "#fa0202",
						"weight": 2,
						"opacity": 0.65
					};

					L.geoJSON(myLines, {
						style: myStyle
					}).addTo(map);
				},

			})
		}
	}

	function cleargeojson() {
		L.geoJSON().clearLayers();
	}
	// console.log($("#JaringanAirMinum").prop("checked", true));
	$(document).ready(function() {
		console.log('asdasd')

	})
	// Function to add a marker with a popup
	// function addMarker(lat, lng, name, description) {
	//     const marker = L.marker([lat, lng]).addTo(map);
	//     marker.bindPopup(`<b>${name}</b><br>${description}`).openPopup();
	// }

	// // Example data for sanitation facilities
	// const sanitationFacilities = [
	//     { lat: -6.750, lng: 111.045, name: "Desa A", description: "Sanitasi: 5 Toilet Umum, 2 Tempat Sampah.<br>Informasi: Fasilitas sanitasi di Desa A cukup memadai." },
	//     { lat: -6.749, lng: 111.042, name: "Desa B", description: "Sanitasi: 3 Toilet Umum, 1 Tempat Sampah.<br>Informasi: Ketersediaan tempat sampah masih kurang." },
	//     { lat: -6.748, lng: 111.040, name: "Desa C", description: "Sanitasi: 4 Toilet Umum, 2 Tempat Sampah.<br>Informasi: Fasilitas perlu ditingkatkan untuk kenyamanan warga." }
	// ];

	// // Add markers for sanitation facilities
	// sanitationFacilities.forEach(facility => {
	//     addMarker(facility.lat, facility.lng, facility.name, facility.description);
	// });

	// // Example data for Rumah Tidak Layak Huni (RTLH)
	// const rtlhData = [
	//     { lat: -6.751, lng: 111.041, name: "Desa A", description: "RTLH: 10 Rumah Tidak Layak Huni.<br>Informasi: Perlu program perbaikan." },
	//     { lat: -6.748, lng: 111.043, name: "Desa B", description: "RTLH: 5 Rumah Tidak Layak Huni.<br>Informasi: Dukungan pemerintah sangat diperlukan." },
	//     { lat: -6.749, lng: 111.039, name: "Desa C", description: "RTLH: 7 Rumah Tidak Layak Huni.<br>Informasi: Aksesibilitas terhadap layanan dasar perlu ditingkatkan." }
	// ];

	// // Add markers for RTLH
	// rtlhData.forEach(rtlh => {
	//     addMarker(rtlh.lat, rtlh.lng, rtlh.name, rtlh.description);
	// });

	// // Example polygon for the irrigation area
	// const irrigationAreaCoords = [
	//     [-6.748, 111.039],
	//     [-6.748, 111.045],
	//     [-6.744, 111.045],
	//     [-6.744, 111.039]
	// ];

	// const irrigationArea = L.polygon(irrigationAreaCoords, { color: 'orange', weight: 2 })
	//     .addTo(map)
	//     .bindPopup("Daerah Irigasi<br>Informasi: Area ini digunakan untuk pertanian dan irigasi.").openPopup();

	// // Example polygon for a slum area
	// const slumArea = L.polygon([
	//     [-6.752, 111.040],
	//     [-6.752, 111.046],
	//     [-6.746, 111.046],
	//     [-6.746, 111.040]
	// ]).addTo(map).bindPopup("Kawasan Kumuh<br>Informasi: Memerlukan perhatian lebih untuk pengembangan infrastruktur.").openPopup();

	// // Example of loading a GeoJSON layer for drinking water networks
	// const drinkingWaterGeoJSON = {
	//     "type": "FeatureCollection",
	//     "features": [
	//         {
	//             "type": "Feature",
	//             "properties": { "name": "Jaringan Air Minum" },
	//             "geometry": {
	//                 "type": "LineString",
	//                 "coordinates": [
	//                     [111.042, -6.750],
	//                     [111.044, -6.748],
	//                     [111.046, -6.749]
	//                 ]
	//             }
	//         }
	//     ]
	// };

	// // Add drinking water network GeoJSON layer
	// L.geoJSON(drinkingWaterGeoJSON, {
	//     style: function (feature) {
	//         return { color: 'blue', weight: 3 };
	//     },
	//     onEachFeature: function (feature, layer) {
	//         layer.bindPopup(`${feature.properties.name}<br>Informasi: Jaringan air minum yang melayani area sekitar.`);
	//     }
	// }).addTo(map);

	// // Example of loading a GeoJSON layer for roads
	// const roadsGeoJSON = {
	//     "type": "FeatureCollection",
	//     "features": [
	//         {
	//             "type": "Feature",
	//             "properties": { "name": "Jaringan Jalan" },
	//             "geometry": {
	//                 "type": "LineString",
	//                 "coordinates": [
	//                     [111.040, -6.753],
	//                     [111.048, -6.754],
	//                     [111.050, -6.751]
	//                 ]
	//             }
	//         }
	//     ]
	// };

	// // Add roads GeoJSON layer
	// L.geoJSON(roadsGeoJSON, {
	//     style: function (feature) {
	//         return { color: 'green', weight: 2 };
	//     },
	//     onEachFeature: function (feature, layer) {
	//         layer.bindPopup(`${feature.properties.name}<br>Informasi: Jalan ini merupakan akses utama untuk transportasi.`);
	//     }
	// }).addTo(map);

	// // navbar-custom toggle functionality
	// const navbarcustomToggle = document.getElementById('navbar-custom-toggle');
	// const navbarcustomNav = document.getElementById('navbar-customNav');

	// navbarcustomToggle.addEventListener('click', () => {
	//     navbarcustomToggle.classList.toggle('active');
	//     navbarcustomNav.classList.toggle('show');
	// });
</script>
<script>
	var tpj = jQuery;
	tpj.noConflict();
	var $ = jQuery.noConflict();


	tpj(document).ready(function() {

		var apiRevoSlider = tpj('#rev_slider_k_fullwidth').show().revolution({
			sliderType: "standard",
			sliderLayout: "fullwidth",
			delay: 9000,
			navigation: {
				arrows: {
					enable: true
				}
			},
			responsiveLevels: [1240, 1024, 778, 480],
			visibilityLevels: [1240, 1024, 778, 480],
			gridwidth: [1240, 1024, 778, 480],
			gridheight: [600, 768, 960, 720],
		});

		apiRevoSlider.on("revolution.slide.onloaded", function(e) {
			setTimeout(function() {
				SEMICOLON.slider.sliderDimensions();
			}, 400);
		});

		apiRevoSlider.on("revolution.slide.onchange", function(e, data) {
			SEMICOLON.slider.revolutionSliderMenu();
		});
	});
</script>

</body>

</html>