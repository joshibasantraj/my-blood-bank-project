@include('home.section.scripts')
<body>
	<div class="h_bg" style="background:#E9DCC9">
		<div class="wrap">
			<div class="header">
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
				<li ><a href="{{ route('change_profile') }}">Change Profile</a></li>	
			<li><a href="{{ route('change_password') }}">Update Password</a></li>            
            <li><a href="{{ route('blood_history')}}">View Donations</a></li>
            <li><a href="{{ route('request_view')}}">View Requestes</a></li>
            <li><a href="{{route('signout')}}">log Out</a></li>

				</ul>
			</div>
		</div>

	</div>

</nav>
</div>
    
    @yield('content')



@include('home.section.footer')