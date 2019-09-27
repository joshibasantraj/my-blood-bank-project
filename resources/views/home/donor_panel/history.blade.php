@extends('layouts.donor_dashboard')
@section('content')


<form method="post" enctype="multipart/form-data">
  <table cellpadding="20" cellspacing="20" width="1000px" height="200px" style="margin:auto" class="table">




    @if($name->count() > 0)
   <thead>
   <tr style="background-color:bisque" align="center" class="bold">
      <td align="center">S.n</td>
      <td align="center">Email</td>
      <td align="center">Donated Date</td>
      <td align="center">Quantity</td>
      <td align="center">Camp</td>
    
    
    </tr>
   </thead>

    <tbody>
     

      @foreach($name as $key=>$value)
      <tr>
        <td align="center">{{$key+1}}</td>
        <td align="center">{{$value->email}}</td>
        <td align="center">{{$value->donated_date}}</td>
        <td align="center">{{$value->quantity}}</td>
        <td align="center">{{$value->camp}}</td>
       
        
      </tr>
      @endforeach
      </tbody>

      @else
      <h4>Sorry You have not donated blood until at this time.</h4>
      <br><br><br><br><br><br>
      <br><br><br>
     <br><br><br>

      @endif
  
  </table>
</form>
<br><br><br><br>
<br><br><br><br>
<br><br><br><br>



@endsection