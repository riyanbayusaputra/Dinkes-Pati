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
		$('#charttable1').DataTable();
		$('#charttable2').DataTable();
		$('#charttable3').DataTable();
		$('#charttable4').DataTable();
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
				},
				// legend: {
				// 	display: false // <- the important part
				// },
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
				labels: [
					'Batangan',
					'Cluwak',
					'Dukuh Seti',
					'Gabus',
					'Kab. Pati',
					'Sukolilo',
					'Kayen',
					'Tambakromo',
					'Winong',
					'Pucakwangi',
					'Jaken',
					'Juwana',
					'Jakenan',
					'Pati',
					'Margorejo',
					'Gembong',
					'Tlogowungu',
					'Wedarijaksa',
					'Trangkil',
					'Margoyoso',
					'Gunungwungkal',
					'Tayu',
				],
				datasets: [{
						label: 'Kecamatan',
						data: [10, 12, 15, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
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
	var Stadia_StamenTerrain = L.tileLayer('https://tiles.stadiamaps.com/tiles/stamen_terrain/{z}/{x}/{y}{r}.{ext}', {
		// minZoom: 0,
		// maxZoom: 18,
		attribution: '&copy; <a href="https://www.stadiamaps.com/" target="_blank">Stadia Maps</a> &copy; <a href="https://www.stamen.com/" target="_blank">Stamen Design</a> &copy; <a href="https://openmaptiles.org/" target="_blank">OpenMapTiles</a> &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
		ext: 'png'
	});

	var Stadia_AlidadeSatellite = L.tileLayer('https://tiles.stadiamaps.com/tiles/alidade_satellite/{z}/{x}/{y}{r}.{ext}', {
		// minZoom: 0,
		// maxZoom: 20,
		attribution: '&copy; CNES, Distribution Airbus DS, © Airbus DS, © PlanetObserver (Contains Copernicus Data) | &copy; <a href="https://www.stadiamaps.com/" target="_blank">Stadia Maps</a> &copy; <a href="https://openmaptiles.org/" target="_blank">OpenMapTiles</a> &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
		ext: 'jpg'
	});
	const map = L.map('map').setView([-6.748821786341696, 111.0437742143056], 12);
	var baseMaps = {
		" Stadia.StamenTerrain": Stadia_StamenTerrain,
		"Stadia.AlidadeSatellite": Stadia_AlidadeSatellite
	};
	L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '© OpenStreetMap contributors',
	}).addTo(map);
	L.control.layers(baseMaps).addTo(map);


	var geojson = null;


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
		// cleargeojson()
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
					// L.geoJSON().clearLayers()
					var myLines = result.data;
					var myStyle = {
						"color": "#0a1df5",
						"weight": 2,
						"opacity": 0.65
					};
					// if (geojson) {
					// 	geojson.clearLayers();
					// } else {
					// }
					if (geojson) {
						map.removeLayer(geojson);
					}
					geojson = L.geoJSON(myLines, {
						style: myStyle
					}).addTo(map);
				},

			})
		}
	}

	function transportsarana() {
		// cleargeojson()
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
					var myLines = result.data;
					var myStyle = {
						"color": "#0a1df5",
						"weight": 4,
						// "opacity": 0.65
					};
					if (geojson) {
						map.removeLayer(geojson);
					}
					// console.log(geojson)
					// if (geojson) {
					// 	geojson.clearLayers();
					// } else {
					// }
					geojson = L.geoJSON(myLines, {
						style: myStyle
					}).addTo(map);
				},

			})
		}
	}

	function kawansankumuh() {
		// cleargeojson()
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

					if (geojson) {
						geojson.clearLayers();
					} else {
						geojson = L.geoJSON(states, {
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
					}



				},

			})

		}
	}

	function jaringanpdam() {
		// cleargeojson()
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
					var myLines = result.data;
					var myStyle = {
						"color": "#fa0202",
						"weight": 4,
						// "opacity": 0.65
					};

					// L.geoJSON(myLines, {
					// 	style: myStyle
					// }).addTo(map);
					if (geojson) {
						map.removeLayer(geojson);
					}
					geojson = L.geoJSON(myLines, {
						style: myStyle
					}).addTo(map);
					// if (geojson) {
					// 	geojson.clearLayers();
					// } else {}
				},

			})
		}
	}

	function cleargeojson() {
		L.geoJSON().clearLayers();
	}
	// console.log($("#JaringanAirMinum").prop("checked", true));
	$(document).ready(function() {
		// map.invalidateSize();
		// console.log(map.invalidateSize());
	})
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