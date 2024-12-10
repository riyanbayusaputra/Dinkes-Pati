<footer id="footer" class="dark">
	<div class="container">

		<!-- Footer Widgets
				============================================= -->
		<div class="footer-widgets-wrap">

			<div class="row col-mb-50">
				<div class="col-lg-8">

					<div class="row col-mb-50">
						<div class="col-md-4">

							<div class="widget clearfix">

								<img src="{{asset('FE/logo2-removebg-preview.png')}}" alt="Image" class="footer-logo">

								<p>Informasi dan pelayanan dapat dilakukan melalui :</p>

								<div style="background: url('images/world-map.png') no-repeat center center; background-size: 100%;">
									<address>
										<strong>Alamat:</strong><br>
										Jalan Raya Pati - Kudus Km. 3,5 Pati Jawa Tengah<br>
									</address>
									<abbr title="Phone Number"><strong>Telepon:</strong></abbr>0295 381351<br>
									<abbr title="Fax"><strong>Fax:</strong></abbr> 0295 381375<br>
									<abbr title="Fax"><strong>Kode Pos:</strong></abbr> 59163<br>
									<abbr title="Email Address"><strong>Email:</strong></abbr> bappeda@patikab.go.id <br>
									<!-- <abbr title="Email Address"><strong>Website:</strong></abbr> https://bappeda.patikab.go.id/ -->
								</div>

							</div>

						</div>


					</div>

				</div>

				<div class="col-lg-4">

					<div class="row col-mb-50">
						<div class="col-md-4 col-lg-12">
							<div class="widget clearfix" style="margin-bottom: -20px;">
								<div class="row">
									<div class="col-lg-6">
										<h5 class="mb-0 mr-3">Jumlah Pengunjung </h5>
									</div>
								</div>
								<div class="row ">
									<div class="col-lg-4 bottommargin-sm">
										<div class="counter counter-small"><span data-from="50" data-to="{{$visit}}" data-refresh-interval="80" data-speed="3000" data-comma="true"></span></div>
										<h5 class="mb-0">Tahun </h5>
									</div>
									<div class="col-lg-4 bottommargin-sm">
										<div class="counter counter-small"><span data-from="50" data-to="{{$visitbulan}}" data-refresh-interval="80" data-speed="3000" data-comma="false"></span></div>
										<h5 class="mb-0">Bulan </h5>
									</div>
									<div class="col-lg-4 bottommargin-sm">
										<div class="counter counter-small"><span data-from="50" data-to="{{$visithari}}" data-refresh-interval="80" data-speed="3000" data-comma="false"></span></div>
										<h5 class="mb-0">Hari </h5>
									</div>
								</div>

							</div>
						</div>

						<div class="col-md-5 col-lg-12">
							<div class="widget subscribe-widget clearfix">
								<!-- <h5><strong>Subscribe</strong> to Our Newsletter to get Important News, Amazing Offers & Inside Scoops:</h5> -->

								<!-- Alert Messages -->
								@if(session('success'))
								<div class="alert alert-success alert-dismissible fade show" role="alert" id="successAlert">
									{{ session('success') }}
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>
								@endif

								@if(session('error'))
								<div class="alert alert-danger alert-dismissible fade show" role="alert" id="errorAlert">
									{{ session('error') }}
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>
								@endif

								@if(session('info'))
								<div class="alert alert-info alert-dismissible fade show" role="alert" id="infoAlert">
									{{ session('info') }}
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>
								@endif

								<!-- Form Errors -->
								@if($errors->any())
								<div class="alert alert-danger alert-dismissible fade show" role="alert" id="validationAlert">
									<ul class="mb-0">
										@foreach($errors->all() as $error)
										<li>{{ $error }}</li>
										@endforeach
									</ul>
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>
								@endif

								<div class="widget-subscribe-form-result"></div>

								<!-- Rating Form -->
								<form id="widget-subscribe-form" action="/setratingus" method="POST" class="mb-0">
									@csrf
									<div class="mb-3">
										<label class="form-label">Rating</label>
										<input id="input-1"
											type="number"
											class="rating form-control"
											name="rate"
											max="5"
											min="1"
											data-step="1"
											data-size="lg"
											value="{{ old('rate') }}"
											required>
									</div>

									<div class="input-group mb-3">
										<span class="input-group-text"><i class="icon-user"></i></span>
										<input type="text"
											id="widget-subscribe-form-nama"
											name="nama"
											class="form-control @error('nama') is-invalid @enderror"
											placeholder="Masukan Nama"
											value="{{ old('nama') }}"
											required>
										@error('nama')
										<div class="invalid-feedback">{{ $message }}</div>
										@enderror
									</div>

									<div class="input-group mb-3">
										<span class="input-group-text"><i class="icon-email2"></i></span>
										<input type="email"
											id="widget-subscribe-form-email"
											name="email"
											class="form-control @error('email') is-invalid @enderror"
											placeholder="Masukan Email"
											value="{{ old('email') }}"
											required>
										@error('email')
										<div class="invalid-feedback">{{ $message }}</div>
										@enderror
										<div class="input-group-append">
											<button class="btn btn-success" type="submit">Simpan</button>
										</div>
									</div>
								</form>
							</div>
						</div>









						<!-- <div class="col-md-3 col-lg-12">
							<div class="widget clearfix" style="margin-bottom: -20px;">

								<div class="row">
									<div class="col-6 col-md-12 col-lg-6 clearfix bottommargin-sm">
										<a href="#" class="social-icon si-dark si-colored si-facebook mb-0" style="margin-right: 10px;">
											<i class="icon-facebook"></i>
											<i class="icon-facebook"></i>
										</a>
										<a href="#"><small style="display: block; margin-top: 3px;"><strong>Like us</strong><br>on Facebook</small></a>
									</div>
									<div class="col-6 col-md-12 col-lg-6 clearfix">
										<a href="#" class="social-icon si-dark si-colored si-rss mb-0" style="margin-right: 10px;">
											<i class="icon-rss"></i>
											<i class="icon-rss"></i>
										</a>
										<a href="#"><small style="display: block; margin-top: 3px;"><strong>Subscribe</strong><br>to RSS Feeds</small></a>
									</div>
								</div>

							</div>
						</div> -->

					</div>

				</div>
			</div>

		</div><!-- .footer-widgets-wrap end -->

	</div>

	<!-- Copyrights
			============================================= -->
	<!-- <div id="copyrights">
		<div class="container">

			<div class="row col-mb-30">

				<div class="col-md-6 text-center text-md-left">
					Copyrights &copy; 2020 All Rights Reserved by Canvas Inc.<br>
					<div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a></div>
				</div>

				<div class="col-md-6 text-center text-md-right">
					<div class="d-flex justify-content-center justify-content-md-end">
						<a href="#" class="social-icon si-small si-borderless si-facebook">
							<i class="icon-facebook"></i>
							<i class="icon-facebook"></i>
						</a>

						<a href="#" class="social-icon si-small si-borderless si-twitter">
							<i class="icon-twitter"></i>
							<i class="icon-twitter"></i>
						</a>

						<a href="#" class="social-icon si-small si-borderless si-gplus">
							<i class="icon-gplus"></i>
							<i class="icon-gplus"></i>
						</a>

						<a href="#" class="social-icon si-small si-borderless si-pinterest">
							<i class="icon-pinterest"></i>
							<i class="icon-pinterest"></i>
						</a>

						<a href="#" class="social-icon si-small si-borderless si-vimeo">
							<i class="icon-vimeo"></i>
							<i class="icon-vimeo"></i>
						</a>

						<a href="#" class="social-icon si-small si-borderless si-github">
							<i class="icon-github"></i>
							<i class="icon-github"></i>
						</a>

						<a href="#" class="social-icon si-small si-borderless si-yahoo">
							<i class="icon-yahoo"></i>
							<i class="icon-yahoo"></i>
						</a>

						<a href="#" class="social-icon si-small si-borderless si-linkedin">
							<i class="icon-linkedin"></i>
							<i class="icon-linkedin"></i>
						</a>
					</div>

					<div class="clear"></div>

					<i class="icon-envelope2"></i> info@canvas.com <span class="middot">&middot;</span> <i class="icon-headphones"></i> +1-11-6541-6369 <span class="middot">&middot;</span> <i class="icon-skype2"></i> CanvasOnSkype
				</div>

			</div>

		</div>
	</div> -->
	<!-- #copyrights end -->
</footer><!-- #footer end -->