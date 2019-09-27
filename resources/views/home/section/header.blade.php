@include('home.section.scripts')

<body>
	<div class="h_bg" style="background:#E9DCC9" >
		<div class="wrap" >
			<div class="header" >
				<div class="logo">
					<h1><a href=""><img src="{{asset('assets/home/Images/BBMC2.png')}}" style="width: 350px; height:125px;" alt=""></a></h1>
				</div>
			</div>
		</div>
	</div>

	
	<div class="f_nav" style="width:100%">

		<nav class="navbar navbar-inverse navbar-fixed" style="background-color:#4d4d4d">
			<div role="navigation">
				<div class="container">
					<div class="navbar-header">
						<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>

					</div>
					<div class="navbar-collapse collapse">
						<ul class="nav navbar-nav navbar-right">
							<li class="nav-item nav-link {{ (request()->route()->getName() == 'homepage') ? 'active' : '' }}"><a href="{{route('homepage')}}">Home</a></li>
							<li class="nav-link {{ (request()->route()->getName() == 'donor_register') ? 'active' : '' }}"><a href="{{ route('donor_register')}}">Donor Registration</a></li>
							<li class="nav-link {{ (request()->route()->getName() == 'request') ? 'active' : '' }}"><a href="{{route('request')}}">send Request</a></li>
							<li class="nav-link {{ (request()->route()->getName() == 'view_request') ? 'active' : '' }}"><a href="{{ route('view_request')}}">View Request</a></li>
							<li class="nav-link {{ (request()->route()->getName() == 'camps') ? 'active' : '' }}"><a href="{{route('camps')}}">Camps</a></li>
							<li class="nav-link {{ (request()->route()->getName() == 'search') ? 'active' : '' }}"><a href="{{route('search')}}">Search</a></li>
							<li class="nav-link {{ (request()->route()->getName() == 'contact_us') ? 'active' : '' }}"><a href="{{ route('contact_us')}}">Contact Us</a></li>
						
							@guest
							<li class="nav-link {{ (request()->route()->getName() == 'signin') ? 'active' : '' }}"><a href="{{route('signin')}}">log In</a></li>
							@else

						<li>	<a href="{{route('donorpanel.index')}}"><u>{{Request()->user()->role}}</u></a></li>
							@endguest

						</ul>
					</div>
				</div>

			</div>

		</nav>
	</div>