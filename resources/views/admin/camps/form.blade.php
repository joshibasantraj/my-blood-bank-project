@extends('layouts.admin-dashboard')

@section('title')
Admin !! {{ (isset($edit_data) && $edit_data->count() > 0) ? 'Edit' : 'Insert' }} camp
@endsection

@section('content')
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>{{ (isset($edit_data) && $edit_data->count() > 0) ? 'Edit' : 'Insert' }} camp details</h3>

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

            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            @if( isset($edit_data) && $edit_data->count() > 0)
            <form action="{{ route('camp.update',$edit_data->id)}}" class="form" method="post" enctype="multipart/form-data">
              @method('PUT')
              @else
              <form action="{{ route('camp.store')}}" class="form" method="post" enctype="multipart/form-data">
                @endif
                @csrf
                <div class="form-group row">

                  <div class="col-sm-1">
                    <td> Title:</td>
                  </div>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="title" value='{{ @$edit_data->title }}'>
                    @if($errors->has('title'))
                    <span class="alert-danger">
                      {{$errors->first('title')}}
                    </span>
                    @endif
                  </div>
                </div>


                <div class="form-group row">
                  <div class="col-sm-1">
                    <td> Organizer:</td>
                  </div>
                  <div class="col-sm-9">
                    <input type="text" value='{{ @$edit_data->organized_by }}' class="form-control" name="organized_by">
                    @if($errors->has('organized_by'))
                    <span class="alert-danger">
                      {{$errors->first('organized_by')}}
                    </span>
                    @endif
                  </div>
                </div>


                <div class="form-group row">
                  <div class="col-sm-1">
                    <td> Details:</td>
                  </div>
                  <div class="col-sm-9">
                    <textarea class="form-control" rows="10" style="resize:none" name="details"> {{ @$edit_data->details  }} </textarea>
                    @if($errors->has('details'))
                    <span class="alert-danger">
                      {{$errors->first('details')}}
                    </span>
                    @endif
                  </div>
                </div>


                <div class="form-group row">
                  <div class="col-sm-1">
                    <td> Address:</td>
                  </div>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="address" value='{{ @$edit_data->address }}'>
                    @if($errors->has('address'))
                    <span class="alert-danger">
                      {{$errors->first('address')}}
                    </span>
                    @endif
                  </div>
                </div>


                <div class="form-group row">
                  <div class="col-sm-1">
                    <td> Date(on):</td>
                  </div>
                  <div class="col-sm-9">
                    <input type="date" class="form-control" name="on" value=<?php echo @$edit_data->on; ?>>
                    @if($errors->has('date'))
                    <span class="alert-danger">
                      {{$errors->first('date')}}
                    </span>
                    @endif
                  </div>
                </div>


                <div class="form-group row">
                  <div class="col-sm-1">
                    <td> Status:</td>
                  </div>
                  <div class="col-sm-9">
                    <select name="status" id="" class="form-control">
                      <option value="active" <?php echo (isset($edit_data) && @$edit_data->status == 'active') ? 'selected' : ''; ?>>Active</option>
                      <option value="inactive" <?php echo (isset($edit_data) && @$edit_data->status == 'inactive') ? 'selected' : ''; ?>>Inactive</option>
                    </select>
                    @if($errors->has('status'))
                    <span class="alert-danger">
                      {{$errors->first('status')}}
                    </span>
                    @endif
                  </div>
                </div>


                <div class="form-group row">
                  <div class="col-sm-1">
                    <td> image:</td>
                  </div>
                  <div class="col-sm-4">
                    <input type="file"  accept="image/*" name="image" {{ (isset($edit_data) ? '' : 'required' ) }}>
                    @if($errors->has('image'))
                    <span class="alert-danger">
                      {{$errors->first('image')}}
                    </span>
                    @endif
                  </div>
                  @if(isset($edit_data) && file_exists(public_path().'/images/camps/'.$edit_data->image))
                  <div class="col-sm-4">
                    <img src="{{ asset('images/camps/'.$edit_data->image)}}" alt="sorry" class="img img-responsive img-thumbnail" width="150">
                  </div>
                  @endif
                </div>


                <div class="form-group row">
                  {{ Form::label('other_images','Other Image: ',['class'=>'col-sm-1']) }}
                  <div class="col-sm-4">
                    {{Form::file('other_images[]',['id'=>'other_images','accept'=>'other_images/*','multiple'=>true]) }}
                    @if($errors->has('other_images'))
                    <span class="alert-danger">
                      {{ $errors->first('other_images') }}
                    </span>
                    @endif
                  </div>
                </div>
                @if(isset($edit_data, $edit_data->camp_images))

                @foreach($edit_data->camp_images as $images)

                <div class="col-sm-3">
                  <img src="{{ asset('images/camps/'.$images->other_images) }}" alt="" class="img img-responsive img-thumbnail" width="200px" height="auto">
                  {{ Form::checkbox('del_image[]',$images->other_images) }} Delete
                </div>
                @endforeach

                @endif






                <div class="form-group row">
                  <div class="col-sm-1">
                    <td></td>
                  </div>
                  <div class="col-sm-4">
                    <button name="submit" type="submit" class="btn btn-success"><i class="fas fa-plane"></i>Submit</button>
                    <button class="btn btn-danger" type="reset">
                    <i class="fas fa-trash"></i> Reset
                    </button>
                  </div>
                </div>



              </form>


          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->


@endsection