@extends('layouts.admin-dashboard')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Image {{ isset($image_data) ? 'update' : 'add'}} </h3>

            </div>

            <div class="title_right">

            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>{{ isset($image_data) ? 'update' : 'add'}} Image</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        @if(isset($image_data))
                       {{Form::open(['url'=>route('image.update',$image_data->id),'class'=>'form', 'enctype'=>'multipart/form-data'])  }}
                            @method('PUT')

                        @else
                        {{Form::open(['url'=>route('image.store'),'class'=>'form', 'enctype'=>'multipart/form-data'])  }}

                        @endif
                        <div class="form-group row">
                            {{ Form::label('title', 'Title: ',['class'=>'col-sm-3']) }}
                            <div class="col-sm-9">
                                {{Form::text('title', @$image_data->title ,['class'=>'form-control','id'=>'title']) }}
                                @if($errors->has('title'))
                                <span class="alert-danger">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                        </div>
                      

                        <div class="form-group row">
                            {{ Form::label('status', 'Status: ',['class'=>'col-sm-3']) }}
                            <div class="col-sm-9">
                                {{Form::select('status',['active'=>"Active",'inactive'=>'Inactive'],@$image_data->status ,['class'=>'form-control','id'=>'status']) }}
                                @if($errors->has('status'))
                                <span class="alert-danger">{{ $errors->first('status') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label('image', 'Image: ',['class'=>'col-sm-3']) }}
                            <div class="col-sm-4">
                                {{Form::file('image',['id'=>'image','required'=> isset($image_data) ? false : true , 'accept'=>'image/*']) }}
                                @if($errors->has('image'))
                                <span class="alert-danger">{{ $errors->first('image') }}</span>
                                @endif
                            </div>
                            @if(isset($image_data) && file_exists(public_path().'/images/image/'.$image_data->image))
                            <div class="col-sm-4">
                                <img src="{{ asset('images/image/'.$image_data->image )}} " class="img img-responsive img-thumbnail">
                            </div>
                            @endif
                        </div>

                        <div class="form-group row">
                            {{ Form::label('', '',['class'=>'col-sm-3']) }}
                            <div class="col-sm-9">
                                {{Form::button('<i class ="fas fa-plane"></i> Submit',['class'=>'btn btn-success','id'=>'submit','type'=>'submit']) }}
                                {{Form::button('<i class ="fas fa-trash"></i> Cancel',['class'=>'btn btn-danger','id'=>'cancel','type'=>'reset']) }}

                            </div>
                        </div>


                        {{Form::close()}}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

@endsection
