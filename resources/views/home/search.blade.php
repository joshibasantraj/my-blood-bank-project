@extends('layouts.frontend')

@section('content')


<div style="height:350px;">

     <form method="get" enctype="multipart/form-data" action="{{ route('searchblood')}}">
     @csrf
   <table cellpadding="0" cellspacing="0" width="500px" height="250px" class="tableborder" style="margin:auto; margin-top:100px;" >
         <tr><td colspan="2">&nbsp;</td></tr>
        <tr><td colspan="2" align="center"><img src="{{asset('assets/home/Images/search.png')}}" height="80px" /></td></tr>
        <tr><td colspan="2">&nbsp;</td></tr>
        <tr><td class="lefttd" style="padding-left:40px">Select Blood Group </td><td><select name="search" required><option value="">Select</option>
        <option value="ab+">AB+</option>
        <option value="ab-">AB-</option>
        <option value="a-">A-</option>
        <option value="a+">A+</option>
        <option value="b-">B-</option>
        <option value="b+">B+</option>
        <option value="o+">O+</option>
        <option value="o-">O-</option>


</select>


</td></tr>
  <tr><td colspan="2">&nbsp;
            </td></tr>
        <tr><td colspan="2">&nbsp;</td></tr>
        <tr><td>&nbsp;</td><td>       
<tr><td>&nbsp;</td><td><input type="submit" value="Search" style="border:0px; background:linear-gradient(#900,#D50000); width:100px; height:30px; border-radius:10px 1px 10px 1px; box-shadow:1px 1px 5px black; color:white; font-weight:bold; font-size:14px; text-shadow:1px 1px 6px black; "></td></tr>

                        <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
              
</table>



		
</form>
</div>
<br><br><br><br>


@endsection