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
                <h3>Contact list</h3>
              
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
              

                    
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>
            @include('admin.section.notification')

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">                   
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <table class="table jambo_table">
                         <thead>

                          <th>S.n</th>
                          <th>Name</th>
                          
                          <th>Email</th>
                          <th>Mobile</th>
                          <th>Details</th>
                          <th>On</th>
                         </thead>
                         <tbody>
                             @if($contact_data)
                              @foreach($contact_data as $key=>$value)
                              <tr>
                                <th>{{$key+1}}</th>
                                 <td>{{$value->name}}</td>
                                
                                 <td>{{$value->email}}</td>
                                 <td>{{$value->mobile}}</td>
                                 <td>{{$value->subject}}</td>
                                 <td>{{$value->created_at}}</td>
                              
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