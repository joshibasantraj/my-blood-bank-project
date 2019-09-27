@extends('layouts.donor_dashboard')

@section('content')
<div style="height:350px; width:700px; margin:auto; margin-top:50px; margin-bottom:50px; background-color:#f8f1e4; border:2px solid red; box-shadow:4px 1px 20px black;">
    <img src="{{asset('assets/home/Images/donorpannel.png')}}"/>
        
    <br><br><br><br>
   <h3 style="text-align:center">Hello, <u>{{Request()->user()->name}},</u></h3> 
  <h5 > Welcome to our website, Please donate blood to save others live.</ >
   </div>
   <br>
			
    </div>
    <br><br><br>
@endsection