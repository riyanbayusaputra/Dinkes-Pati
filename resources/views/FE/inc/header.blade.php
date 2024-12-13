<!-- Header
		============================================= -->
<style>
	.menu-link {
		font-family: "Poppins", sans-serif;
		font-size: 18px;
	}
</style>
<header id="header" class="">
	<div id="header-wrap">
		<div class="container">
			<div class="header-row">

				<!-- Logo
						============================================= -->
				<div id="logo">
					<a href="/" class="standard-logo header-size-sm"><img src="{{asset('FE/logo1.png')}}" alt="Logo"
							data-logo-height="60"></a>
					<a href="/" class="retina-logo"><img src="{{asset('FE/logo1.png')}}" alt="Logo"></a>
				</div><!-- #logo end -->

				<!-- Primary Menu Mobile Trigger
						============================================= -->
				<div id="primary-menu-trigger">
					<svg class="svg-trigger" viewBox="0 0 100 100">
						<path
							d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20">
						</path>
						<path d="m 30,50 h 40"></path>
						<path
							d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20">
						</path>
					</svg>
				</div>

				<!-- Header Buttons
						============================================= -->
				<div class="header-misc">
					<a href="{{ route('faq') }}"
						class="button bg-color-2 button-light text-white ls0 font-weight-medium m-0"
						style="border-radius: 10px;">FAQ</a>
				</div>

				<!-- Primary Navigation
						============================================= -->
				<nav class="primary-menu">

					<ul class="menu-container">
						{{-- @if(Route::current()->getName() == 'home')
						<li class="menu-item text-white"
							style="background-color: #006FCF !important; border-radius: 10px">
							<span class="pl-2">Play Video</span>
							<button class="btn btn-primay btn-sm text-white" onclick="playvideo()" id="btnplay"><i
									class='icon-play'></i></button>
							<button class="btn btn-primay btn-sm text-white" onclick="playvideo()" id="btnpause"
								hidden><i class='icon-pause'></i></button>
						</li>
						@endif --}}
						<li class="menu-item"><a class="menu-link" href="{{ route('home') }}">
								<div>Beranda</div>
							</a></li>
						<!--<li class="menu-item"><a class="menu-link" href="{{ route('profile') }}">-->
						<!--		<div>Layanan</div>-->
						<!--	</a></li>-->

						<li class="menu-item">
							<a class="menu-link" href="#">
								<div>Layanan</div>
							</a>
							<ul class="sub-menu-container">
								<li class="menu-item">
									<a class="menu-link" href="/login">
										<div>EHRA</div>
									</a>
									<ul class="sub-menu-container">
										<li class="menu-item">
											<a class="menu-link" href="{{ route('infografis') }}">
												<div>Grafis</div>
											</a>
										</li>
									</ul>
								</li>
								{{-- <li class="menu-item">
									<a class="menu-link" href="rs-demos.html">
										<div>Login</div>
									</a>
								</li> --}}
								<li class="menu-item">
									<a class="menu-link" href="{{ route('kajian') }}">
										<div>Kajian Rumpun</div>
									</a>
								</li>
								<li class="menu-item">
									<a class="menu-link" href="{{ route('petasebaran') }}">
										<div>Peta Sebaran</div>
									</a>
								</li>

							</ul>
						</li>
						<li class="menu-item">
							<a class="menu-link" href="#">
								<div>Info</div>
							</a>
							<ul class="sub-menu-container">
								<li class="menu-item">
									<a class="menu-link" href="/daftar-berita">
										<div>Berita</div>
									</a>
								</li>
								<li class="menu-item">
									<a class="menu-link" href="/daftar-galeri">
										<div>Galeri</div>
									</a>
								</li>
								<li class="menu-item">
									<a class="menu-link" href="/pengumuman">
										<div>Pengumuman</div>
									</a>
								</li>


							</ul>
						</li>
						<li class="menu-item"><a class="menu-link" href="/panduan">
								<div>Panduan</div>
							</a></li>
						<li class="menu-item"><a class="menu-link" href="/kontakkami">
								<div>Kontak Kami</div>
							</a></li>
					</ul>

				</nav><!-- #primary-menu end -->

			</div>
		</div>
	</div>
	<div class="header-wrap-clone"></div>
</header><!-- #header end -->