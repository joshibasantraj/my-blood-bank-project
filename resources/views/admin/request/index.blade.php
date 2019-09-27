@extends('layouts.admin-dashboard')
@section('links')
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
                <h3>Request add page</h3>
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
                    <h2>Request Page</h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      Add Request to the page ...
                      <div>
                          @include('admin.section.notification')
                      <div>
                          <a href="{{ route('blood_request.create')}}" class="btn btn-success  pull-right "><i class="fas fa-plus"></i> Add Request</a>
                      </div>
                          <table class="table jambo_table">
                                <thead>
                                    <th>S.n </th>
                                    <th>Name</th>
                                    <th>Address </th>
                                    <th>Mobile no. </th>
                                    <th>Email </th>
                                    <th>Required Date </th>
                                    <th>Blood group </th>
                                   
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
                                      <td>{{ $value->date }}</td>
                                      <td>{{ $value->blood_group }}</td>
                                    
                                   
                                      <!-- <td>{{ $value->description }}</td> -->
                                      <td>
                                          <a href="{{ route('blood_request.edit',$value->id)}}" class="btn btn-success"style="border-radius:50%"> <i class="fas fa-pencil-alt"></i></a>



                                        <form action="{{ route('blood_request.destroy',$value->id) }}" method="post" onsubmit="return confirm('Are you sure to delete the news') ">
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