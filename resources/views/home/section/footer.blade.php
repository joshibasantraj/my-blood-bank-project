<div class="ftr-bg">
<div class="wrap">
<div class="footer">
	<div class="f_nav" >
		<ul>
			<li class="nav-link {{ (request()->route()->getName() == 'homepage') ? 'active' : '' }}"><a href="{{route('homepage')}}">Home</a></li>			
			<li class="nav-link {{ (request()->route()->getName() == 'donorhelp') ? 'active' : '' }}"><a href="{{ route('donorhelp')}}">Donor</a></li>
            <li class="nav-link {{ (request()->route()->getName() == 'signin') ? 'active' : '' }}"><a href="{{route('signin')}}">log In</a></li>
			<li class="nav-link {{ (request()->route()->getName() == 'about_us') ? 'active' : '' }}"><a href="{{ route('about_us')}}">About</a></li>
			
			
            <li class="nav-link {{ (request()->route()->getName() == 'contact_us') ? 'active' : '' }}"><a href="{{ route('contact_us')}}">Contact Us</a></li>
			
            </ul>
	</div>
		<div class="copy">
			<p class="title">©{{date('Y')}}. All right reserved.</p>
		</div>
	<div class="clear"></div>
</div>
</div>
</div>
</body>
</html>