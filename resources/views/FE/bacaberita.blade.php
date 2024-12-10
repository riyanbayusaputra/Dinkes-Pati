@extends('FE.layouts.app')

@section('content')
<section id="content">
	<div class="content-wrap">
		<div class="container clearfix">
			<div class="single-post mb-0">

				<div class="entry clearfix">


					<div class="entry-title">
						<h2>{{$detailberita['activity_title']}}</h2>
					</div><!-- .entry-title end -->

					<div class="entry-meta">
						<ul>
							<li><i class="icon-calendar3"></i> {{\Carbon\Carbon::parse($detailberita['created_at'])->locale('id')->format('j F Y')}}</li>

						</ul>
					</div><!-- .entry-meta end -->

					<div class="entry-images bottommargin">
						<a href="#"><img src="{{ route('berita.image', ['path' => $detailberita['image']])  }}" alt="Blog Single"></a>
					</div><!-- .entry-image end -->

					<div class="entry-content mt-0">
						<p>{{$detailberita['description']}}</p>
						<!-- <div class="tagcloud clearfix bottommargin">
							<a href="#">general</a>
							<a href="#">information</a>
							<a href="#">media</a>
							<a href="#">press</a>
							<a href="#">gallery</a>
							<a href="#">illustration</a>
						</div> -->
						<!-- .tagcloud end -->

						<div class="clear"></div>

						<!-- <div class="si-share border-0 d-flex justify-content-between align-items-center">
							<span>Share this Post:</span>
							<div>
								<a href="#" class="social-icon si-borderless si-facebook">
									<i class="icon-facebook"></i>
									<i class="icon-facebook"></i>
								</a>
								<a href="#" class="social-icon si-borderless si-twitter">
									<i class="icon-twitter"></i>
									<i class="icon-twitter"></i>
								</a>
								<a href="#" class="social-icon si-borderless si-pinterest">
									<i class="icon-pinterest"></i>
									<i class="icon-pinterest"></i>
								</a>
								<a href="#" class="social-icon si-borderless si-gplus">
									<i class="icon-gplus"></i>
									<i class="icon-gplus"></i>
								</a>
								<a href="#" class="social-icon si-borderless si-rss">
									<i class="icon-rss"></i>
									<i class="icon-rss"></i>
								</a>
								<a href="#" class="social-icon si-borderless si-email3">
									<i class="icon-email3"></i>
									<i class="icon-email3"></i>
								</a>
							</div>
						</div> -->
						<!-- Post Single - Share End -->

					</div>
				</div><!-- .entry end -->

				<!-- <div class="row justify-content-between col-mb-30 post-navigation">
					<div class="col-12 col-md-auto text-center">
						<a href="#">&lArr; This is a Standard post with a Slider Gallery</a>
					</div>

					<div class="col-12 col-md-auto text-center">
						<a href="#">This is an Embedded Audio Post &rArr;</a>
					</div>
				</div> -->
				<!-- .post-navigation end -->

			</div>
		</div>
</section>
@endsection