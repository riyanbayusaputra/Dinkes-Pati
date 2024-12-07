<!-- Header
		============================================= -->
<header id="header" class="">
	<div id="header-wrap">
		<div class="container">
			<div class="header-row">

				<!-- Logo
						============================================= -->
				<div id="logo">
					<a href="/" class="standard-logo"><img src="{{asset('FE/logo2rs2.png')}}" alt="Canvas Logo"></a>
					<a href="/" class="retina-logo"><img src="{{asset('FE/logo2rs3.png')}}" alt="Canvas Logo"></a>
				</div><!-- #logo end -->

				<!-- Primary Menu Mobile Trigger
						============================================= -->
				<div id="primary-menu-trigger">
					<svg class="svg-trigger" viewBox="0 0 100 100">
						<path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path>
						<path d="m 30,50 h 40"></path>
						<path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path>
					</svg>
				</div>

				<!-- Header Buttons
						============================================= -->
				<div class="header-misc">
					<a href="{{ route('bantuan') }}" class="button bg-color-2 button-light text-white ls0 font-weight-medium m-0" style="border-radius: 10px;">Bantuan</a>
				</div>

				<!-- Primary Navigation
						============================================= -->
				<nav class="primary-menu">

					<ul class="menu-container">
						<li class="menu-item"><a class="menu-link" href="{{ route('home') }}">
								<div>Home</div>
							</a></li>
						<li class="menu-item"><a class="menu-link" href="{{ route('profile') }}">
								<div>Profile</div>
							</a></li>
						<li class="menu-item"><a class="menu-link" href="/login">
								<div>Kuesioner</div>
							</a></li>
						<li class="menu-item"><a class="menu-link" href="{{ route('infografis') }}">
								<div>Info Grafis</div>
							</a></li>
					</ul>

				</nav><!-- #primary-menu end -->

			</div>
		</div>
	</div>
	<div class="header-wrap-clone"></div>
</header><!-- #header end -->