@extends('layouts.admin-dashboard')

@section('title')
    its news  index page
@endsection

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
                <h3>News add page</h3>
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
                    <h2>News Page</h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      Add News to the page ...
                      <div>
                          @include('admin.section.notification')
                      <div>
                          <a href="{{ route('news.create')}}" class="btn btn-success  pull-right "><i class="fas fa-plus"></i> Add news</a>
                      </div>
                          <table class="table">
                                <thead>
                                    <th>S.n </th>
                                    <th>Title </th>
                                    <th>Summary </th>
                                  
                                    <!-- <th>Description</th> -->
                                    <th>Status </th>
                                    <th>Date </th>
                                    

                                    <th>image </th>
                                    <th>Action </th>
                                </thead>
                                <tbody>
                                    @if($news_data)
                                    @foreach($news_data as $key=>$value)
                                  <tr>
                                      <td> {{ $key+1 }}</td>
                                      <td>{{ $value->title }}</td>
                                      <td>{{ $value->summary }}</td>
                                   
                                      <!-- <td>{{ $value->description }}</td> -->
                                      <td>{{ ucfirst($value->status) }}</td>
                                      <td>{{ $value->news_date }}</td>
                                       <td>
                                            @if($value->image != null && file_exists(public_path().'/images/news/'.$value->image) )
                                        <img style="max-width:150px" src="{{ asset('images/news/'.$value->image)}}" alt="" class="img img-responsive img-thumbnail" >
                                          @else 
                                          <h4>No image found</h4>   
                                        @endif
                                        </td>
                                      <td>
                                          <a href="{{ route('news.edit',$value->id)}}" class="btn btn-success"style="border-radius:50%"> <i class="fas fa-pencil-alt"></i></a>



                                        <form action="{{ route('news.destroy',$value->id) }}" method="post" onsubmit="return confirm('Are you sure to delete the news') ">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger"style="border-radius:50%"  type="submit">  <i class="fas fa-trash"></i></button>



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
        <!-- /page content -->

@endsection

