<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Blood bank Management System</title>
	<link href="{{ asset('assets/home/css/lightbox.css')}}" rel="stylesheet" />
	<link href="{{ asset('assets/home/css/bootstrap.min.css')}}" rel="stylesheet" />
	<link href="{{ asset('assets/home/StyleSheet.css')}}" rel="stylesheet" type="text/css" />
	<link rel="stylesheet"
href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> 
<script src= 
"https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"> 
</script> 
<script src= 
"https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"> 
</script> 
	@yield('links')
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
	<link href="{{asset('assets/home/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
	<style>
		* {
			box-sizing: border-box;
		}

		body {
			margin: 0px;
			font-family: 'segoe ui';
		}

		.nav {
			height: 25px;
			width: 100%;
			background-color: #4d4d4d;
			position: relative;
		}

		.nav>.nav-header {
			display: inline;
		}

		.nav>.nav-header>.nav-title {
			display: inline-block;
			font-size: 22px;
			color: #fff;
			padding: 10px 10px 10px 10px;
		}

		.nav>.nav-btn {
			display: none;
		}

		.nav>.nav-links {
			display: inline;
			float: right;
			font-size: 18px;
		}

		.nav>.nav-links>a {
			display: inline-block;
			padding: 13px 10px 13px 10px;
			text-decoration: none;
			color: #efefef;
		}

		.nav>.nav-links>a:hover {
			background-color: rgba(0, 0, 0, 0.3);
		}

		.nav>#nav-check {
			display: none;
		}

		@media (max-width:1200px) {
			.nav>.nav-btn {
				display: inline-block;
				position: absolute;
				right: 0px;
				top: 0px;
			}

			.nav>.nav-btn>label {
				display: inline-block;
				width: 50px;
				height: 50px;
				padding: 13px;
			}

			.nav>.nav-btn>label:hover,
			.nav #nav-check:checked~.nav-btn>label {
				background-color: rgba(0, 0, 0, 0.3);
			}

			.nav>.nav-btn>label>span {
				display: block;
				width: 25px;
				height: 10px;
				border-top: 2px solid #eee;
			}

			.nav>.nav-links {
				position: absolute;
				display: block;
				width: 100%;
				background-color: #333;
				height: 0px;
				transition: all 0.3s ease-in;
				overflow-y: hidden;
				top: 50px;
				left: 0px;
			}

			.nav>.nav-links>a {
				display: block;
				width: 100%;
			}

			.nav>#nav-check:not(:checked)~.nav-links {
				height: 0px;
			}

			.nav>#nav-check:checked~.nav-links {
				height: calc(100vh - 50px);
				overflow-y: auto;
			}
		}
	</style>

	<!--slider-->
	<link href="{{asset('assets/home/css/flexslider.css')}}" rel="stylesheet" type="text/css" media="all" />
	<script src="{{asset('assets/home/js/jquery-1.11.0.min.js')}}"></script>
	<script src="{{ asset('assets/home/js/lightbox.min.js')}}"></script>
	<script src="{{asset('assets/home/js/jquery-1.7.1.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('assets/home/js/jquery.flexslider.js')}}" type="text/javascript"></script>
	<script src="{{asset('assets/home/js/bootstrap.min.js')}}" type="text/javascript"></script>
	<script type="text/javascript">
		$(function() {
			SyntaxHighlighter.all();
		});
		$(window).load(function() {
			$('.flexslider').flexslider({
				animation: "slide",
				animationLoop: false,
				itemWidth: 210,
				itemMargin: 5,
				minItems: 2,
				maxItems: 4,
				start: function(slider) {
					$('body').removeClass('loading');
				}
			});
		});
	</script>

	<script>
		var msg = '{{Session::get('alert')}}';
		var exist = '{{Session::has('alert')}}';
		if (exist) {
			alert(msg);
		}
	</script>

	<script>
		$(document).ready(function() {
			$('.navbar-fostrap').click(function() {
				$('.nav-fostrap').toggleClass('visible');
				$('body').toggleClass('cover-bg');
			});
		});
	</script>

	@yield('scripts')
</head>