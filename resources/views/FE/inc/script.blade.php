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