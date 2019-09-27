@extends('layouts.frontend')

@section('content')


<form method="post" enctype="multipart/form-data">
  <table cellpadding="20" cellspacing="20" width="1000px" height="200px" style="margin:auto" class="table">

    <tr>
      <td colspan="7" align="center"><img src="{{asset('assets/home/Images/brequest.png')}}" height="90px" /></td>
    </tr>

    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>

    <tr style="background-color:bisque" align="center" class="bold">
      <td align="center">S.n</td>
      <td align="center">Blood Group</td>

      <td align="center">Name</td>
      <td align="center">Gender</td>
      <td align="center">Mobile No</td>
      <td align="center">Email</td>
      <td align="center">Till Required Date</td>
    
    </tr>

    <tbody>
      @if($name)

      @foreach($name as $key=>$value)
      <tr>
        <td align="center">{{$key+1}}</td>
        <td align="center">{{strtoupper($value->blood_group)}}</td>
        <td align="center">{{$value->name}}</td>
        <td align="center">{{ucfirst($value->gender)}}</td>
        <td align="center">{{$value->mobile}}</td>
        <td align="center">{{$value->email}}</td>
        <td align="center">{{$value->date}}</td>
       
        
      </tr>
      @endforeach

      @else
      <h4>No data found</h4>
      <br><br><br><br><br><br><br><br><br><br>
      <br><br><br><br><br><br>
      <br><br><br><br><br><br>

      @endif
    </tbody>
  </table>
</form>

<br><br><br><br><br><br><br>
@endsection