@extends('FE.layouts.app')

@section('content')
<section id="slider" class="slider-element slider-parallax min-vh-60 min-vh-md-100 include-header">
	<div class="slider-inner">

		<div class="video-wrap">
			<video poster="{{ asset('FE/Jaringan_Air_Minum.png') }}" preload="auto" loop autoplay muted>
				<source src="{{ asset('FE/Untitled video - Made with Clipchamp.mp4') }}" type='video/mp4' />
			</video>
		</div>

	</div>
</section>




<section id="content">
	<div class="content-wrap py-0">

		<div class="container clearfix">
			<div class="row justify-content-center slider-box-wrap clearfix">
				<div class="col-12">
					<div class="slider-bottom-box">
						<div class="flex-container">

							<div class="item1">
								<a href="/login" class="text-center text-uppercase text-white">
									<img src="{{ asset('images/ehra.png') }}" class="rounded-0 bg-transparent text-left" alt="Image">
									EHRA
								</a>
							</div>
							<div class="item2">
								<a href="{{ route('kajian') }}" class="text-center text-uppercase text-white">
									<img src="{{ asset('images/kajian.png') }}" class="rounded-0 bg-transparent text-left" alt="Image">
									Kajian Rumpun
								</a>
							</div>
							<div class="item3">
								<a href="{{ route('petasebaran') }}" class="text-center text-uppercase text-white">
									<img src="{{ asset('images/peta.png') }}" class="rounded-0 bg-transparent text-left" alt="Image">
									Peta sebaran
								</a>
							</div>

						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<!-- GALLERY -->
<section id="content">
	<div class="content-wrap">

		<div class="container clearfix">
			<div class="news red">
				<span class="badge badge-danger bnews-title">Pengumuman:</span>
				<marquee class="text1">
					@if(count($pgn) > 0)
					@foreach($pgn as $value)
					{{ $value->keterangan }} |
					@endforeach
					@else
					Tidak ada pengumuman
					@endif
				</marquee>
			</div>
		</div>
	</div>

	<!-- <div class="container">
			<div class="news red">
				<span>Pengumuman</span>
				<marquee class="text1">
					Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minima in iusto molestiae voluptate sapiente ipsa repellendus, laborum eaque commodi libero. Vero vel voluptates totam pariatur perspiciatis? Architecto facilis ad magnam.
					Corrupti, nulla facilis, nostrum qui repudiandae impedit quasi temporibus, ex illum blanditiis nam tempore. Blanditiis nisi, id temporibus, error veniam quos itaque alias voluptates laborum veritatis distinctio amet nihil iure.
				</marquee>
			</div>
		</div> -->
	<!-- <br>
		<br>
		<br>
		<div class="section header-stick bottommargin-lg clearfix">
			<div>
				<div class="container clearfix">
					<span class="badge badge-danger bnews-title">Breaking News:</span>

					<div class="fslider bnews-slider mb-0" data-speed="800" data-pause="6000" data-arrows="false" data-pagi="false">
						<div class="flexslider">
							<div class="slider-wrap">
								<div class="slide"><a href="#"><strong>Russia hits back, says US acts like a 'bad surgeon'..</strong></a></div>
								<div class="slide"><a href="#"><strong>'Sulking' Narayan Rane needs consolation: Uddhav reacts to Cong leader's attack..</strong></a></div>
								<div class="slide"><a href="#"><strong>Rane needs consolation. I pray to God that he gets mental peace in a political party..</strong></a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> -->
	<div class="container clearfix">

		<div class="row justify-content-center">
			<div class="fancy-title title-bottom-border">
				<h3>Galeri</h3>
			</div>
		</div>
		<!-- Flex Thumbs Slider
								============================================= -->
		<div class="fslider flex-thumb-grid grid-6 mt-4" data-pagi="false" data-speed="100" data-pause="3500" data-arrows="true" data-thumbs="true">
			<div class="flexslider">
				<div class="slider-wrap">
					@foreach ($activityGalleries as $activity)
					@if(!empty($activity->image))

					<div class="slide" data-thumb="{{ route('activity-gallery.image', ['path' => $activity->image]) }}">
						<!-- Post Article -->
						<div class="entry mb-0">
							<img src="{{ route('activity-gallery.image', ['path' => $activity->image]) }}" alt="Image">
						</div>
					</div>


					@endif
					@endforeach
				</div>
			</div>
		</div> <!-- Flex Slider End -->
	</div>
	</div>
</section>

<!-- END GALLERY -->
<!-- BERITA -->
<section id="content">
	<div class="content-wrap">
		<div class="container clearfix">
			<div class="row justify-content-center">
				<div class="fancy-title title-bottom-border">
					<h3>Berita</h3>
				</div>
			</div>
			<div id="posts" class="post-grid row grid-container gutter-40 clearfix" data-layout="fitRows">
				@foreach ($berita as $activity)
				<div class="entry col-md-4 col-sm-6 col-12">
					<div class="grid-inner" data-animation="fadeInLeftBig">
						<div class="entry-image">
							<a href="{{ route('berita.image', ['path' => $activity->image])  }}" data-lightbox="image">
								<img src="{{ route('berita.image', ['path' => $activity->image])  }}" alt="{{ $activity->activity_title }}">
							</a>

						</div>
						<div class="entry-title">
							<h2><a href="/baca-berita?kontenberita={{str_replace(' ', '-', $activity->activity_title)}}">{{ $activity->activity_title }}</a></h2>
						</div>
						<div class="entry-meta">
							<ul>
								<li><i class="icon-calendar3"></i> {{\Carbon\Carbon::parse($activity->created_at)->locale('id')->format('j F Y')}}</li>
							</ul>
						</div>
						<div class="entry-content" style="margin-top: 10px !important;">
							<p>{{ \Illuminate\Support\Str::limit($activity->description, 100) }}</p>
							<a href="/baca-berita?kontenberita={{str_replace(' ', '-', $activity->activity_title)}}" class="more-link">Selengkapnya</a>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</section>

<!-- END BERITA -->

<section id="content">
	<div class="content-wrap">
		<div class="container clearfix">
			<div class="row align-items-center gutter-40 ">
				<div class="col-md-5">
					<img data-animate="fadeInLeftBig" src="{{ asset('FE/4.png') }}" alt="Imac">
				</div>

				<div class="col-md-7">
					<div class="heading-block">
						<h2 style="color: #006FCF !important;">SISTEM INFORMASI RUMPUN BIDANG INFRASTRUKTUR DAN KEWILAYAHAN PATI</h2>
					</div>
					<p><b>SISTEM INFORMASI RUMPUN BIDANG INFRASTRUKTUR DAN KEWILAYAHAN PATI</b> Merupakan aplikasi digital untuk memantau dan melakukan monitoring sanitasi dan pengolahan limbah rumah tangga. Kami terus berkomitmen untuk memberikan pelayanan dan informasi yang akurat untuk mendorong sebaran dan analisa yang kredibel.</p>

					<!-- <a href="#" class="button button-border button-rounded button-large ml-0 topmargin-sm">Experience More</a> -->
				</div>
			</div>
		</div>
	</div>
</section>

@if (count($videos) == 6)
<section id="content">
	<div class="section m-0 border-0" style="padding: 10px 0; background-color:#F3F3F3 !important">
		<div class="container center clearfix">
			<div class="heading-block mt-3">
				<h2>Video Tutorial</h2>
			</div>

			<div class="masonry-thumbs grid-container grid-3" data-big="1" data-lightbox="gallery">
				@foreach ($videos as $video)
				@php
				// Mendapatkan ID video YouTube dari URL
				parse_str(parse_url($video->youtube_url, PHP_URL_QUERY), $urlParams);
				$videoId = $urlParams['v'] ?? basename(parse_url($video->youtube_url, PHP_URL_PATH));
				@endphp
				@if ($videoId)
				<a class="grid-item" href="{{ asset('FE/rev/ken-2.jpg') }}" data-lightbox="gallery-item">
					<iframe
						width="1903"
						height="822"
						src="https://www.youtube.com/embed/{{ $videoId }}"
						title="{{ $video->title }}"
						frameborder="0"
						allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
						referrerpolicy="strict-origin-when-cross-origin"
						allowfullscreen>
					</iframe>
				</a>
				@endif
				@endforeach
			</div>
		</div>
	</div>
</section>
@endif

<!-- <section id="content">
	<div class="content-wrap">

		<div class="container">

			<div class="row justify-content-center mt-5">
				<div class="col-md-7 text-center">
					<h6 class="display-4 color font-weight-bold font-display">Gallery</h6>
				</div>
			</div>

			<div class="row justify-content-center align-items-center gutter-50 col-mb-80 mt-5">
				<div class="col-xl-9 col-lg-11">
					<div class="row feature-box-border col-mb-30 justify-content-center align-items-center">
						<div class="col-md-6 feature-box fbox-color">
							<div class="fbox-icon">
								<a href="#"><i>1</i></a>
							</div>
							<div class="fbox-content">
								<h3 class="nott text-larger mb-2">Doctors Video Consultation</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, quae rerum dolores aperiam amet enim consequuntur maiores totam odit molestiae vel ut earum deleniti.</p>
							</div>
						</div>
						<div class="col-md-4 text-center">
							<img src="{{asset('FE/base/images/illustration/doctors.svg')}}" alt="Image" class="p-4" height="230">
						</div>

						<div class="clear"></div>

						<div class="col-md-6 feature-box fbox-border fbox-light fbox-effect">
							<div class="fbox-icon">
								<a href="#"><i>2</i></a>
							</div>
							<div class="fbox-content">
								<h3 class="nott text-larger mb-2">Dietician Consultation</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, quae rerum dolores aperiam amet enim consequuntur maiores totam odit molestiae vel ut earum deleniti.</p>
							</div>
						</div>
						<div class="col-md-4 text-center">
							<img src="{{asset('FE/base/images/illustration/diet.jpg')}}" alt="Image" class="p-4" height="230">
						</div>

						<div class="clear"></div>

						<div class="col-md-6 feature-box fbox-border fbox-light fbox-effect">
							<div class="fbox-icon">
								<a href="#"><i>3</i></a>
							</div>
							<div class="fbox-content">
								<h3 class="nott text-larger mb-2">Nurse Assistance</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, quae rerum dolores aperiam amet enim consequuntur maiores totam odit molestiae vel ut earum deleniti.</p>
							</div>
						</div>
						<div class="col-md-4 text-center">
							<img src="{{asset('FE/base/images/illustration/nurse.png')}}" alt="Image" class="p-4" height="230">
						</div>

						<div class="clear"></div>

						<div class="col-md-6 feature-box fbox-border fbox-light fbox-effect">
							<div class="fbox-icon">
								<a href="#"><i>4</i></a>
							</div>
							<div class="fbox-content">
								<h3 class="nott text-larger mb-2">Home Delivery Medicine</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, quae rerum dolores aperiam amet enim consequuntur maiores totam odit molestiae vel ut earum deleniti.</p>
							</div>
						</div>
						<div class="col-md-4 text-center">
							<img src="{{asset('FE/base/images/illustration/delivery.svg')}}" alt="Image" class="p-4" height="230">
						</div>

						<div class="clear"></div>

						<div class="col-md-6 feature-box fbox-border fbox-light fbox-effect noborder">
							<div class="fbox-icon">
								<a href="#"><i>5</i></a>
							</div>
							<div class="fbox-content">
								<h3 class="nott text-larger mb-2">24/7 Support</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, quae rerum dolores aperiam amet enim consequuntur maiores totam odit molestiae vel ut earum deleniti.</p>
							</div>
						</div>
						<div class="col-md-4 text-center">
							<img src="{{asset('FE/base/images/illustration/support.svg')}}" alt="Image" class="p-5" height="230">
						</div>

					</div>
				</div>
			</div>


		</div>

		<div class="section py-md-0 section-mobile bg-color-2" style="background: url('FE/base/images/illustration/bg-pattern.svg') no-repeat center left / contain;">
			<div class="container">
				<div class="row align-items-center justify-content-between">

					<div class="col-lg-5 col-md-6 py-5 py-lg-0">
						<h3 class="display-3 color font-weight-normal font-display mb-5">Download Our COVID Care App.</h3>
						<p class="text-large color">Progressively strategize just in time scenarios and compelling results. Intrinsicly parallel task extensive systems whereas distinctive catalysts for scenarios and compelling results change.</p>
						<div>
							<a href="#"><img src="{{asset('demos/articles/images/appstore.png')}}" alt="Image" height="54" class="mt-3"></a>
							<a href="#"><img src="{{asset('demos/articles/images/googleplay.png')}}" alt="Image" class="ml-xl-3 ml-lg-1 mt-3 ml-0 " height="54"></a>
						</div>
					</div>

					<div class="col-lg-6 col-md-6 mt-5 mt-sm-0">
						<div class="d-none d-lg-flex">
							<img src="{{asset('FE/base/images/iphone-2.png')}}" class="fast" alt="Image" style="height: 600px" data-animate="fadeInUp" data-delay="200">
							<img src="{{asset('FE/base/images/iphone-1.png')}}" class="fast" alt="Image" style="height: 600px" data-animate="fadeInUp">
						</div>
						<img src="{{asset('FE/base/images/iphone.png')}}" alt="Image" class="d-block d-lg-none px-5 px-sm-0 p-md-5">
					</div>

				</div>
			</div>
		</div>

		<div class="container topmargin-lg clearfix">

			<div class="row align-items-stretch grid-border clearfix">
				<div class="col-lg-4 col-md-6 col-padding">
					<div class="feature-box fbox-center fbox-dark fbox-plain">
						<div class="fbox-icon">
							<a href="#"><i class="color icon-hands-wash"></i></a>
						</div>
						<div class="fbox-content">
							<h3 class="nott text-larger font-weight-medium">Wash your Hands</h3>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-padding">
					<div class="feature-box fbox-center fbox-dark fbox-plain">
						<div class="fbox-icon">
							<a href="#"><i class="color icon-home"></i></a>
						</div>
						<div class="fbox-content">
							<h3 class="nott text-larger font-weight-medium">Stay at Home</h3>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-padding">
					<div class="feature-box fbox-center fbox-dark fbox-plain">
						<div class="fbox-icon">
							<a href="#"><i class="color icon-head-side-mask"></i></a>
						</div>
						<div class="fbox-content">
							<h3 class="nott text-larger font-weight-medium">Wear Your Mask</h3>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-padding">
					<div class="feature-box fbox-center fbox-dark fbox-plain">
						<div class="fbox-icon">
							<a href="#"><i class="color icon-head-side-cough"></i></a>
						</div>
						<div class="fbox-content">
							<h3 class="nott text-larger font-weight-medium">Cover Your Coughs</h3>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-padding">
					<div class="feature-box fbox-center fbox-dark fbox-plain">
						<div class="fbox-icon">
							<a href="#"><i class="color icon-shield-virus"></i></a>
						</div>
						<div class="fbox-content">
							<h3 class="nott text-larger font-weight-medium">Social Distancing</h3>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-padding">
					<div class="feature-box fbox-center fbox-dark fbox-plain">
						<div class="fbox-icon">
							<a href="#"><i class="color icon-utensils"></i></a>
						</div>
						<div class="fbox-content">
							<h3 class="nott text-larger font-weight-medium">Healthy Diet</h3>
						</div>
					</div>
				</div>
			</div>

			<div class="clear"></div>

			<div class="pricing-box pricing-extended row align-items-stretch mt-6 mx-0 border-0 rounded-lg" style="background-color: rgba(15,100,88,.07);">
				<div class="pricing-desc col-lg-9 p-5">
					<h3 class="h2 color font-weight-normal font-display border-bottom pb-4 mb-4">Our Subscription Charges</h3>
					<div class="pricing-features bg-transparent pt-3 pb-0">
						<ul class="row">
							<li class="col-md-6"><i class="icon-line-check-circle color mr-2"></i> First 15 Days Free*</li>
							<li class="col-md-6"><i class="icon-line-check-circle color mr-2"></i> iOS &amp; Android Both Available</li>
							<li class="col-md-6"><i class="icon-line-check-circle color mr-2"></i> Only Subscription is Chargable</li>
							<li class="col-md-6"><i class="icon-line-check-circle color mr-2"></i> No Hidden Changes</li>
							<li class="col-md-6"><i class="icon-line-check-circle color mr-2"></i> International Credit Cards Accepted</li>
							<li class="col-md-6"><i class="icon-line-check-circle color mr-2"></i> Money Refund Guaranteed</li>
							<li class="col-md-6"><i class="icon-line-check-circle color mr-2"></i> One Day Delivery</li>
							<li class="col-md-6"><i class="icon-line-check-circle color mr-2"></i> 24x7 Priority Email Support</li>
						</ul>
					</div>
				</div>

				<div class="pricing-action-area border-0 col-lg d-flex flex-column justify-content-center" style="background-color: rgba(15,100,88,.07);">
					<div class="pricing-price price-unit font-weight-bold font-primary color">
						<span class="price-unit">&dollar;</span>19<span class="price-tenure font-secondary text-uppercase">Monthly</span>
					</div>
					<div class="pricing-action">
						<a href="#" class="button bg-color rounded-pill button-large btn-block m-0">Get Started</a>
					</div>
				</div>
			</div>

		</div>
	</div>
</section> -->
@endsection