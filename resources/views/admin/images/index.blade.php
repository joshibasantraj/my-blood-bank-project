@extends('layouts.admin-dashboard')

@section('content')
               <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Banner list</h3>

              </div>

              <div class="title_right">
              <a href="{{ route('image.create')}}" class="btn btn-success pull-right"><i class="fas fa-plus"></i> Add Image</a>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>All image</h2>

                    <div class="clearfix"></div>
                    @include('admin.section.notification')
                  </div>
                  <div class="x_content">
                     <table class="table jambo_table">
                        <thead>
                            <th>Title</th>
                            <th>Image</th>
                            
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @if($image_data)
                                @foreach($image_data as $key=>$value)
                                    <tr>
                                        <td>{{ $value->title }}</td>
                                        <td>
                                            @if($value->image != null && file_exists(public_path().'/images/image/'.$value->image) )
                                        <img style="max-width:150px" src="{{ asset('images/image/'.$value->image)}}" alt="" class="img img-responsive img-thumbnail">
                                            @endif
                                        </td>
                                       
                                        <td>{{ ucfirst($value->status)}}</td>
                                        <td>
                                            <a href="{{ route('image.edit',$value->id)}}" style="border-radius: 50%" class="btn btn-success">
                                        <i class="fas fa-pencil-alt"></i></a>


                                        <form action="{{ route('image.destroy',$value->id)}}" onsubmit="return confirm('Are you sure to delete')" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger" style="border-radius: 50%">
                                                <i class="fas fa-trash"></i>
                                            </button>
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
