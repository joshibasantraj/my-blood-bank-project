@extends('layouts.frontend')

@section('content')

<form method="post" enctype="multipart/form-data" action="{{route('donor_login')}}">
@csrf

   <table cellpadding="0" cellspacing="0" width="600px" height="300px" class="tableborder" style="margin:auto; margin-top:100px;" >
     <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
    <tr><td colspan="2" align="center"><img src="{{asset('assets/home/Images/login2.png')}}" width="300px" height="70px"></td></tr>
    
     <tr><td colspan="2">&nbsp;</td></tr>  <tr><td colspan="2">&nbsp;</td></tr> 
                <tr><td align="right"><img src="{{asset('assets/home/Images/login1.png')}}" width="200px" height="150px" /></td>
                    <td style="vertical-align:top"><table cellpadding="0" cellspacing="0" height="200px">             


<tr><td class="lefttd">E-Mail</td><td><input type="email" name="email" required="required"/></td></tr>
@if($errors->has('email'))
                                    <span class="alert-danger">
                                        {{ $errors->first('email')}}
                                    </span>
                                    @endif
<tr><td class="lefttd">Password</td><td><input type="password"name="password"  required="required" title="please enter only character or numbers between 2 to 10 for password"  /></td></tr>


<tr><td>&nbsp;</td><td><input type="submit" value="Log In" style="border:0px; background:linear-gradient(#900,#D50000); width:100px; height:30px; border-radius:10px 1px 10px 1px; box-shadow:1px 1px 5px black; color:white; font-weight:bold; font-size:14px; text-shadow:1px 1px 6px black; "></td></tr>
 <tr><td style="font-size:14px">Not A DONOR.?</td><td ><a href="{{route('donor_register')}}" style="color:#C30">Click here</a> to REGISTER.</td></tr>
                        <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
              
</table>
</td></tr></table>

		
</form>
<br><br><br><br>

@endsection