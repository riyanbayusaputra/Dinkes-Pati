<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

	<!-- Stylesheets
	============================================= -->
	<!-- <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500&family=IBM+Plex+Serif:wght@400;500;600&family=Playfair+Display&display=swap" rel="stylesheet"> -->

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="{{asset('FE/css/bootstrap.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('FE/style.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('FE/css/swiper.css')}}" type="text/css" />

	<!-- Covid Care Demo Specific Stylesheet -->
	<link rel="stylesheet" href="{{asset('FE/base/covid-care.css')}}" type="text/css" /> <!-- Covid Care Custom Css -->
	<!-- <link rel="stylesheet" href="{{asset('FE/base/css/fonts.css')}}" type="text/css" />  -->
	<!-- / -->

	<link rel="stylesheet" href="{{asset('FE/css/dark.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('FE/css/font-icons.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('FE/css/animate.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('FE/css/magnific-popup.css')}}" type="text/css" />

	<link rel="stylesheet" href="{{asset('FE/css/custom.css')}}" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	{{--<link rel="stylesheet" href="{{asset('FE/css/colors.php?color=0F6458')}}" type="text/css" />--}}
	<link rel="shortcut icon" href="{{asset('FE/Frame_1541.png')}}" type="image/x-icon">
	<link rel="icon" href="{{asset('FE/Frame_1541.png')}}" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="{{asset('FE/include/rs-plugin/css/settings.css')}}" media="screen" />
	<link rel="stylesheet" type="text/css" href="{{asset('FE/include/rs-plugin/css/layers.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('FE/include/rs-plugin/css/navigation.css')}}">
	<!-- <link rel="stylesheet" href="{{asset('FE/base2/css/fonts.css')}}" type="text/css" /> -->
	<link rel="stylesheet" href="{{asset('FE/base2/hosting.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('FE/css/components/bs-rating.css')}}" type="text/css" />

	<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />


	@vite(['resources/js/app.js'])
	<!-- Document Title
	============================================= -->
	<title>SISTEM INFORMASI RUMPUN BIDANG INFRASTRUKTUR DAN KEWILAYAHAN PATI</title>

	<style>
		/* .wrapper {
		} */

		.chart-container {
			/* max-width: 400px;
			max-height: 400px; */
			display: flex;
			justify-content: center !important;
			height: 389px;
			width: 389px;
		}



		.flex-container {

			display: flex;

			justify-content: space-around;
			align-items: baseline;
			flex-flow: row nowrap;
			flex-direction: row;
			flex-wrap: wrap;
			align-content: start;

			/* background-color: #bbdefb; */
			height: 100%;
			padding: 5px;
			gap: 8px;

		}

		.flex-container>div {
			/* background: red;
			border: 3px solid #ffcc80; */
			padding: 8px;
			font-weight: bold;
			/* font-size: 12px; */
		}


		.revo-slider-emphasis-text {
			font-size: 64px;
			font-weight: 700;
			letter-spacing: -1px;
			font-family: 'Poppins', sans-serif;
			padding: 15px 20px;
			border-top: 2px solid #FFF;
			border-bottom: 2px solid #FFF;
		}

		.revo-slider-desc-text {
			font-size: 20px;
			font-family: 'Lato', sans-serif;
			width: 650px;
			text-align: center;
			line-height: 1.5;
		}

		.revo-slider-caps-text {
			font-size: 16px;
			font-weight: 400;
			letter-spacing: 3px;
			font-family: 'Poppins', sans-serif;
		}

		.tp-video-play-button {
			display: none !important;
		}

		.tp-caption {
			white-space: nowrap;
		}



		.red {
			/* background: #006FCF; */
			margin-bottom: 20px;
		}

		.news {
			overflow: hidden;
			border-radius: 4px;
			-webkit-user-select: none;
		}

		/* .news span {
			float: left;
			color: #fff;
			padding: 9px;
			box-shadow: inset 0 -15px 30px rgba(0, 0, 0, 0.4);
			-webkit-font-smoothing: antialiased;
			-webkit-user-select: none;
			cursor: pointer;
		} */

		.text1 {
			box-shadow: none !important;
			width: 90%;
			color: black;
			line-height: 12px;
			/* padding-top: 15px; */
		}



		@media only screen and (max-width: 760px) {
			.red {
				/* background: #006FCF; */
				margin-bottom: 20px;
			}

			.news {
				overflow: hidden;
				border-radius: 4px;
				-webkit-user-select: none;
				/* display: flex; */

			}

			/* .news span {
				float: left;
				color: #fff;
				padding: 9px;
				box-shadow: inset 0 -15px 30px rgba(0, 0, 0, 0.4);
				-webkit-font-smoothing: antialiased;
				-webkit-user-select: none;
				cursor: pointer;
			} */

			.text1 {
				box-shadow: none !important;
				width: 90%;
				color: black;
				line-height: 12px;
				/* padding-top: 15px; */
			}
		}

		@media (min-width: 761px) and (max-width: 915px) {
			.text1 {
				box-shadow: none !important;
				width: 90%;
				color: black;
				line-height: 12px;
				/* padding-top: 15px; */
			}
		}
	</style>

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">