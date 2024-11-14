@extends('FE.layouts.app')

@section('content')

<section id="slider" class="slider-element slider-parallax revslider-wrap min-vh-0">

	<div class="slider-inner">
		<div id="rev_slider_k_fullwidth_wrapper" class="rev_slider_wrapper fullwidth-container" style="padding:0px;">
			<div id="rev_slider_k_fullwidth" class="rev_slider fullwidthbanner" style="display:none;" data-version="5.1.4">
				<ul>
					<li data-transition="fade" data-slotamount="1" data-masterspeed="1500" data-thumb="{{asset('FE/rev/ken-2-thumb.jpg')}}" data-delay="15000" data-saveperformance="off" data-title="Unlimited Possibilities">
						<img src="{{asset('FE/rev/ken-2.jpg')}}" alt="kenburns6" data-bgposition="center bottom" data-bgpositionend="center top" data-kenburns="on" data-duration="25000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="140" data-rotatestart="0" data-rotateend="0" data-blurstart="0" data-blurend="0" data-offsetstart="0 0" data-offsetend="0 0" class="rev-slidebg" data-no-retina>
						<!-- <div class="tp-caption ltl tp-resizeme revo-slider-caps-text text-uppercase"
							data-x="middle" data-hoffset="0"
							data-y="top" data-voffset="170"
							data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;s:800;e:Power4.easeOutQuad;"
							data-speed="800"
							data-start="1000"
							data-easing="easeOutQuad"
							data-splitin="none"
							data-splitout="none"
							data-elementdelay="0.01"
							data-endelementdelay="0.1"
							data-endspeed="1000"
							data-endeasing="Power4.easeIn" style="z-index: 3; color: #333; white-space: nowrap;">Why Choose Canvas?</div>

						<div class="tp-caption ltl tp-resizeme revo-slider-emphasis-text p-0 border-0"
							data-x="middle" data-hoffset="0"
							data-y="top" data-voffset="185"
							data-fontsize="['60','50','50','40']"
							data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;s:800;e:Power4.easeOutQuad;"
							data-speed="800"
							data-start="1200"
							data-easing="easeOutQuad"
							data-splitin="none"
							data-splitout="none"
							data-elementdelay="0.01"
							data-endelementdelay="0.1"
							data-endspeed="1000"
							data-endeasing="Power4.easeIn" style="z-index: 3; color: #333; white-space: nowrap;">Unlimited Possibilities</div>

						<div class="tp-caption ltl tp-resizeme revo-slider-desc-text"
							data-x="middle" data-hoffset="0"
							data-y="top" data-voffset="295"
							data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;s:800;e:Power4.easeOutQuad;"
							data-speed="800"
							data-lineheight="['30','30','34','26']"
							data-width="['750','750','480','360']"
							data-start="1400"
							data-easing="easeOutQuad"
							data-splitin="none"
							data-splitout="none"
							data-elementdelay="0.01"
							data-endelementdelay="0.1"
							data-endspeed="1000"
							data-textAlign="center"
							data-endeasing="Power4.easeIn" style="z-index: 3; color: #333; max-width: 650px; white-space: normal;">Create whatever you require for your Business to bloom with Tons of Customization Possibilities.</div>

						<div class="tp-caption ltl tp-resizeme"
							data-x="middle" data-hoffset="0"
							data-y="top" data-voffset="405"
							data-transform_in="x:0;y:150;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;s:800;e:Power4.easeOutQuad;"
							data-speed="800"
							data-start="1550"
							data-easing="easeOutQuad"
							data-splitin="none"
							data-splitout="none"
							data-elementdelay="0.01"
							data-endelementdelay="0.1"
							data-endspeed="1000"
							data-endeasing="Power4.easeIn" style="z-index: 3;"><a href="#" class="button button-border button-large button-rounded text-right m-0"><span>Browse</span><i class="icon-angle-right"></i></a></div> -->
					</li>
				</ul>
			</div>
		</div>

	</div>

</section><!-- #slider end -->

<section id="content">
	<div class="content-wrap py-0">

		<div class="container clearfix">
			<div class="row justify-content-center slider-box-wrap clearfix">
				<div class="col-12">
					<div class="slider-bottom-box">
						<div class="flex-container">

							<div class="item1">
								<a href="" class="text-center text-uppercase text-white">
									<img src="{{ asset('images/ehra.png') }}" class="rounded-0 bg-transparent text-left" alt="Image">
									EHRA
								</a>
							</div>
							<div class="item2">
								<a href="" class="text-center text-uppercase text-white">
									<img src="{{ asset('images/kajian.png') }}" class="rounded-0 bg-transparent text-left" alt="Image">
									Kajian Rumpun
								</a>
							</div>
							<div class="item3">
								<a href="" class="text-center text-uppercase text-white">
									<img src="{{ asset('images/peta.png') }}" class="rounded-0 bg-transparent text-left" alt="Image">
									Peta sebaran
								</a>
							</div>

						</div>
						<!-- <div class="row align-items-center clearfix">
							<div class="col-lg-4 col-md-6">
								<a class="feature-box not-dark">
									
									<div class="fbox-icon">
										<img src="{{ asset('images/ehra.png') }}" class="rounded-0 bg-transparent text-left" alt="Image">
									</div>
									<div class="fbox-content">
										<h3 class="font-weight-medium text-uppercase text-white ">EHRA</h3>
									</div>

								</a>
							</div>
							<div class="col-lg-4 col-md-6">
								<div class="feature-box not-dark">
									<div class="fbox-icon">
										<img src="{{ asset('images/kajian.png') }}" class="rounded-0 bg-transparent text-left" alt="Image">
									</div>
									<div class="fbox-content">
										<h3 class="font-weight-medium text-uppercase text-white ">Kajian Rumpun</h3>
									</div>

								</div>
							</div>
							<div class="col-lg-4 col-md-6">
								<div class="feature-box not-dark">
									<div class="fbox-icon">
										<img src="{{ asset('images/peta.png') }}" class="rounded-0 bg-transparent text-left" alt="Image">
									</div>
									<div class="fbox-content">
										<h3 class="font-weight-medium text-uppercase text-white ">Peta sebaran</h3>
									</div>
								</div>
							</div>
						</div> -->
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
			<div class="row justify-content-center">
				<div class="col-md-7 text-center">
					<h6 class="display-4 color font-weight-bold font-display">Gallery</h6>
				</div>
			</div>

			<div class="masonry-thumbs grid-container grid-3" data-big="1" data-lightbox="gallery">
				<a class="grid-item" href="{{asset('FE/rev/ken-2.jpg')}}" data-lightbox="gallery-item"><img src="{{asset('FE/rev/ken-2.jpg')}}" alt="Gallery Thumb 1"></a>
				<a class="grid-item" href="{{asset('FE/rev/ken-2.jpg')}}" data-lightbox="gallery-item"><img src="{{asset('FE/rev/ken-2.jpg')}}" alt="Gallery Thumb 1"></a>
				<a class="grid-item" href="{{asset('FE/rev/ken-2.jpg')}}" data-lightbox="gallery-item"><img src="{{asset('FE/rev/ken-2.jpg')}}" alt="Gallery Thumb 1"></a>
				<a class="grid-item" href="{{asset('FE/rev/ken-2.jpg')}}" data-lightbox="gallery-item"><img src="{{asset('FE/rev/ken-2.jpg')}}" alt="Gallery Thumb 1"></a>
				<a class="grid-item" href="{{asset('FE/rev/ken-2.jpg')}}" data-lightbox="gallery-item"><img src="{{asset('FE/rev/ken-2.jpg')}}" alt="Gallery Thumb 1"></a>
				<a class="grid-item" href="{{asset('FE/rev/ken-2.jpg')}}" data-lightbox="gallery-item"><img src="{{asset('FE/rev/ken-2.jpg')}}" alt="Gallery Thumb 1"></a>

			</div>
		</div>
	</div>
</section>
<!-- END GALLERY -->
<!-- BERITA -->
<section id="content">
	<div class="content-wrap">
		<div class="container clearfix">
			<div class="row justify-content-center">
				<div class="col-md-7 text-center">
					<h6 class="display-4 color font-weight-bold font-display">Berita</h6>
				</div>
			</div>
			<div id="posts" class="post-grid row grid-container gutter-40 clearfix" data-layout="fitRows">

				<div class="entry col-md-4 col-sm-6 col-12">
					<div class="grid-inner">
						<div class="entry-image">
							<a href="{{asset('FE/17.jpg')}}" data-lightbox="image"><img src="{{asset('FE/17.jpg')}}" alt="Standard Post with Image"></a>
						</div>
						<div class="entry-title">
							<h2><a href="blog-single.html">This is a Standard post with a Preview Image</a></h2>
						</div>
						<div class="entry-meta">
							<ul>
								<li><i class="icon-calendar3"></i> 10th Feb 2021</li>

							</ul>
						</div>
						<div class="entry-content">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, voluptatem, dolorem animi nisi autem blanditiis enim culpa reiciendis et explicabo tenetur!</p>
							<a href="blog-single.html" class="more-link">Selengkapnya</a>
						</div>
					</div>
				</div>
				<div class="entry col-md-4 col-sm-6 col-12">
					<div class="grid-inner">
						<div class="entry-image">
							<a href="{{asset('FE/17.jpg')}}" data-lightbox="image"><img src="{{asset('FE/17.jpg')}}" alt="Standard Post with Image"></a>
						</div>
						<div class="entry-title">
							<h2><a href="blog-single.html">This is a Standard post with a Preview Image</a></h2>
						</div>
						<div class="entry-meta">
							<ul>
								<li><i class="icon-calendar3"></i> 10th Feb 2021</li>

							</ul>
						</div>
						<div class="entry-content">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, voluptatem, dolorem animi nisi autem blanditiis enim culpa reiciendis et explicabo tenetur!</p>
							<a href="blog-single.html" class="more-link">Selengkapnya</a>
						</div>
					</div>
				</div>

				<div class="entry col-md-4 col-sm-6 col-12">
					<div class="grid-inner">
						<div class="entry-image">
							<a href="{{asset('FE/17.jpg')}}" data-lightbox="image"><img src="{{asset('FE/17.jpg')}}" alt="Standard Post with Image"></a>
						</div>
						<div class="entry-title">
							<h2><a href="blog-single-full.html">This is a Standard post with a Vimeo Video</a></h2>
						</div>
						<div class="entry-meta">
							<ul>
								<li><i class="icon-calendar3"></i> 16th Feb 2021</li>

							</ul>
						</div>
						<div class="entry-content">
							<p>Asperiores, tenetur, blanditiis, quaerat odit ex exercitationem consectetur pariatur quibusdam veritatis quisquam laboriosam esse beatae hic perferendis velit deserunt!</p>
							<a href="blog-single-full.html" class="more-link">Selengkapnya</a>
						</div>
					</div>
				</div>


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
					<img data-animate="fadeInLeftBig" src="{{ asset('FE/Frame_7.png') }}" alt="Imac">
				</div>

				<div class="col-md-7">
					<div class="heading-block">
						<h2>SISTEM INFORMASI RUMPUN BIDANG INFRASTRUKTUR DAN KEWILAYAHAN PATI</h2>
					</div>
					<p><b>SISTEM INFORMASI RUMPUN BIDANG INFRASTRUKTUR DAN KEWILAYAHAN PATI</b> Merupakan aplikasi digital untuk memantau dan melakukan monitoring sanitasi dan pengolahan limbah rumah tangga. Kami terus berkomitmen untuk memberikan pelayanan dan informasi yang akurat untuk mendorong sebaran dan analisa yang kredibel.</p>

					<!-- <a href="#" class="button button-border button-rounded button-large ml-0 topmargin-sm">Experience More</a> -->
				</div>
			</div>
		</div>
	</div>
</section>


<section id="content">
	<div class="section m-0 border-0 bg-color dark" style="padding: 10px 0;">
		<div class="container center clearfix">
			<div class="heading-block">
				<h2>Video Tutorial</h2>
			</div>

			<div class="masonry-thumbs grid-container grid-3" data-big="1" data-lightbox="gallery">
				<a class="grid-item" href="{{asset('FE/rev/ken-2.jpg')}}" data-lightbox="gallery-item">
					<iframe width="1903" height="822" src="https://www.youtube.com/embed/3_O8QNOSMSc" title="TOP 15 MONSTERS || FITO HillClimb 2024" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
				</a>
				<a class="grid-item" href="{{asset('FE/rev/ken-2.jpg')}}" data-lightbox="gallery-item">
					<iframe width="1903" height="822" src="https://www.youtube.com/embed/3_O8QNOSMSc" title="TOP 15 MONSTERS || FITO HillClimb 2024" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
				</a>
				<a class="grid-item" href="{{asset('FE/rev/ken-2.jpg')}}" data-lightbox="gallery-item">
					<iframe width="1903" height="822" src="https://www.youtube.com/embed/3_O8QNOSMSc" title="TOP 15 MONSTERS || FITO HillClimb 2024" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
				</a>
				<a class="grid-item" href="{{asset('FE/rev/ken-2.jpg')}}" data-lightbox="gallery-item">
					<iframe width="1903" height="822" src="https://www.youtube.com/embed/3_O8QNOSMSc" title="TOP 15 MONSTERS || FITO HillClimb 2024" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
				</a>
				<a class="grid-item" href="{{asset('FE/rev/ken-2.jpg')}}" data-lightbox="gallery-item">
					<iframe width="1903" height="822" src="https://www.youtube.com/embed/3_O8QNOSMSc" title="TOP 15 MONSTERS || FITO HillClimb 2024" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
				</a>
				<a class="grid-item" href="{{asset('FE/rev/ken-2.jpg')}}" data-lightbox="gallery-item">
					<iframe width="1903" height="822" src="https://www.youtube.com/embed/3_O8QNOSMSc" title="TOP 15 MONSTERS || FITO HillClimb 2024" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
				</a>

			</div>
		</div>
	</div>
</section>
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