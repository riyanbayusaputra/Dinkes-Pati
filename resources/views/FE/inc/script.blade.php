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

<script>
	$(document).ready(function() {
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