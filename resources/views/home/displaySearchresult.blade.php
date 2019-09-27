@extends('layouts.frontend')

@section('content')

@if($search->count() >0)




  

    <table class="table" >
        <thead style="background-color:bisque">
           <tr>
           <th>S.n </th>
            <th>Name </th>
            <th>Gender </th>
        
            <th>Mobile no. </th>
            <th>Blood group. </th>
            <th>Email </th>
            <th>Image </th>

           </tr>
        </thead>
        <tbody>
        @foreach($search as $key=>$value)

          
            <tr><br>
                <td> {{ $key+1 }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->gender }}</td>
              
                <td>{{ $value->mobile }}</td>
                <td>{{ $value->blood_group }}</td>
                <td>{{ $value->email }}</td>
                <td>
                    @if($value->image != null && file_exists(public_path().'/images/users/'.$value->image) )
                    <img style="max-width:150px" src="{{ asset('images/users/'.$value->image)}}" alt="" class="img img-responsive img-thumbnail" width="100px">
                    @endif

                </td>

            </tr>


         
            
    @endforeach
         
        </tbody>
        <br>

    </table>
    <br><br><br><br>
    <br><br><br><br><br><br><br><br>







@else
<h3>No Blood donor found for this group</h3>
<br><br><br><br>
<br><br><br><br>
<br><br><br><br>
<br><br><br><br>


    @endif




    @endsection