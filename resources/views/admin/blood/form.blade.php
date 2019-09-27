@extends('layouts.admin-dashboard')


@section('content')
dd($data);
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
      

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
            <form action="{{ route('blood.update',$edit_data->id)}}" class="form" method="post" enctype="multipart/form-data">
              @method('PUT')
              @else
              <form action="{{ route('blood.store')}}" class="form" method="post" enctype="multipart/form-data">
                @endif
                @csrf
                <div class="form-group row">

                  <div class="col-sm-1">
                    <td> Email:</td>
                  </div>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="email" value='{{ @$edit_data->email }}'>
                    @if($errors->has('email'))
                    <span class="alert-danger">
                      {{$errors->first('email')}}
                    </span>
                    @endif
                  </div>
                </div>


                <div class="form-group row">
                <div class="col-sm-1">
                    <td> Quantity:</td>
                  </div>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="quantity" value='{{ @$edit_data->quantity }}'>
                    @if($errors->has('quantity'))
                    <span class="alert-danger">
                      {{$errors->first('quantity')}}
                    </span>
                    @endif
                  </div>
                </div>




                <div class="form-group row">
                  <div class="col-sm-1">
                    <td> Date(on):</td>
                  </div>
                  <div class="col-sm-9">
                    <input type="date" class="form-control" name="donated_date" value=<?php echo @$edit_data->donated_date; ?>>
                    @if($errors->has('donated_date'))
                    <span class="alert-danger">
                      {{$errors->first('donated_date')}}
                    </span>
                    @endif
                  </div>
                </div>


                <div class="form-group row">
                                   {{ Form::label('camp','Camp: ',['class'=>'col-sm-1']) }}
                                    <div class="col-sm-9">
                                        {{Form::select('camp',isset($data) ? $data : [],@$edit_data->camp,['class'=>'form-control','id'=>'camp','placeholder'=>'--Select any one--','required'=>true]) }}
                                        @if($errors->has('camp'))
                                            <span class="alert-danger">
                                                {{ $errors->first('camp') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>




                <div class="form-group row">
                  <div class="col-sm-1">
                    <td></td>
                  </div>
                  <div class="col-sm-4">
                    <button name="submit" type="submit">Submit</button>
                    <input type="reset" name="reset" value="reset" type="reset">
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