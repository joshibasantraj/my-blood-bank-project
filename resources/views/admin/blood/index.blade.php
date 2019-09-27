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
 <!-- page content -->
 <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Blood donated persons list</h3>
              
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
              

                    
                  </div>
                </div>
              </div>
              <a href="{{route('blood.create')}}" class="btn btn-success pull-right"><i class="fas fa-plus"></i>Add Blood</a>
            </div>

            <div class="clearfix"></div>
            @include('admin.section.notification')

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>All camp list</h2>
                   
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <table class="table jambo_table">
                         <thead>

                          <th>S.n</th>
                          <th>Email</th>
                          
                         
                          <th>Donated Date</th>
                          <th>Quantity</th>
                          <th>Camp</th>
                          <th>Action</th>
                         </thead>
                         <tbody>
                             @if($blood_data)
                              @foreach($blood_data as $key=>$value)
                              <tr>
                                <th>{{$key+1}}</th>
                                
                                 <td>{{$value->email}}</td>
                                
                                 <td>{{$value->donated_date}}</td>
                                 
                                 <td>{{$value->quantity}}</td>
                                 <td>{{$value->camp}}</td>
                                <td><a href="{{route('blood.edit',$value->id)}}" style="border-radius:50%" class="btn btn-success"> <i class="fas fa-pencil-alt"></i></a>
                                  
                                <form action="{{ route('blood.destroy',$value->id)}}" method="post" onsubmit="return confirm('Are you sure to delete the camp data:')">
                                  @csrf
                                  @method('delete')
                                  <button class="btn btn-danger" style="border-radius:50%"> <i class="fas fa-trash"></i></button>

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
        <!-- /page content -->


@endsection