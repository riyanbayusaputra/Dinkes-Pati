@extends('FE.layouts.app')

@section('content')
<section id="content">
	<div class="content-wrap">
		<div class="container clearfix">
			<div class="heading-block center">
				<h2>Galeri</h2>
				{{-- <span>Pertanyaan dan jawaban yang umum ditanyakan menurut kami</span> --}}
			</div>
			<div id="posts" class="post-grid row grid-container clearfix" data-layout="fitRows">

				@foreach ($activityGalleries as $activity)
				<div class="entry col-md-4 col-sm-6 col-12">
					<div class="grid-inner">
						<div class="entry-image">
							<a href="{{ route('activity-gallery.image', ['path' => $activity->image]) }}"
								data-lightbox="image"><img
									src="{{ route('activity-gallery.image', ['path' => $activity->image]) }}"
									alt="Standard Post with Image"></a>
						</div>


						<div class="entry-content">
							<p>{{ \Illuminate\Support\Str::limit($activity->description, 160) }}</p>
						</div>
					</div>
				</div>
				@endforeach

				<div class="clear mt-5"></div>

				<!-- Pagination
					============================================= -->
				<!-- .pager end -->
				<div class="row">
					<div class="col-lg-12 d-flex justify-content-center">
						<!-- <ul class="pagination">
							</ul> -->
						{!! $activityGalleries->links('pagination::bootstrap-4') !!}

					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection