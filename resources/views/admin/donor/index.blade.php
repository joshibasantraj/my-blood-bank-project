@extends('layouts.admin-dashboard')@section('links')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/jquery.dataTables.min.css')}}">
@endsection

@section('scripts')
        <script src= "{{ asset('assets/admin/js/jquery.dataTables.min.js')}}" ></script>
        <script>
            $('.table').dataTable();

        </script>
@endsection


@section('content')



<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Donor add page</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">

                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Donor Page</h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      Add Donor to the page ...
                      <div>
                          @include('admin.section.notification')
                      <div>
                          <a href="{{ route('donor.create')}}" class="btn btn-success  pull-right "><i class="fas fa-plus"></i> Add Donor</a>
                      </div>
                          <table class="table  jambo_table">
                                <thead>
                                    <th>S.n </th>
                                    <th>Name</th>
                                    <th>Address </th>
                                    <th>Mobile no. </th>
                                    <th>Email </th>
                                    <th>Role </th>
                                    <th>Gender </th>
                                    <th>Status </th>
                                    <th>image </th>
                                    <th>action </th>
                                </thead>
                                <tbody>
                                    @if($data)
                                    @foreach($data as $key=>$value)
                                  <tr>
                                      <td> {{ $key+1 }}</td>
                                      <td>{{$value->name}}</td>
                                      <td>{{ $value->address }}</td>
                                      <td>{{ $value->mobile }}</td>
                                      <td>{{ $value->email }}</td>
                                      <td>{{ $value->role }}</td>
                                      <td>{{ $value->gender }}</td>
                                   
                                      <!-- <td>{{ $value->description }}</td> -->
                                      <td>{{ $value->status }}</td>
                                       <td>
                                            @if($value->image != null && file_exists(public_path().'/images/users/'.$value->image) )
                                        <img style="max-width:100px" src="{{ asset('images/users/'.$value->image)}}" alt="" class="img img-responsive img-thumbnail" >
                                          @else 
                                          <h4>No image found</h4>   
                                        @endif
                                        </td>
                                      <td>
                                          <a href="{{ route('donor.edit',$value->id)}}" class="btn btn-success"style="border-radius:50%"> <i class="fas fa-pencil-alt"></i></a>



                                        <form action="{{ route('donor.destroy',$value->id) }}" method="post" onsubmit="return confirm('Are you sure to delete the Donor') ">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger"style="border-radius:50%"  type="submit"> <i class="fas fa-trash"></i></button>



                                        </form>
                                    </td>

                                  </tr>
                                  @endforeach
                                    @endif
                                </tbody>

                          </table>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>




@endsection