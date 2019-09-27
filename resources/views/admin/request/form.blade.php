@extends('layouts.admin-dashboard')
@section('scripts')


<script>
    function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

function myFunction1() {
  var x = document.getElementById("confirm_password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

    


</script>

@endsection

@section('content')


<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Request {{ isset($data) ? 'update' : 'add' }} page</h3>
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
                        {{ isset($data) ? 'update' : 'add' }} Request to the page ...
                        <div>

                            @if(isset($data))
                            {{ Form::open(['url'=>route('blood_request.update',$data->id),'class'=>'form','enctype'=>'multipart/form-data']) }}
                            @method('PUT')

                            @else

                            {{ Form::open(['url'=>route('blood_request.store'),'class'=>'form','enctype'=>'multipart/form-data']) }}

                            @endif

                            @csrf
                            



                            <div class="form-group row">
                                {{ Form::label('name','Name: ',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{ Form::text('name',@$data->name,['class'=>'form-control','id'=>'name']) }}
                                    @if($errors->has('name'))
                                    <span class="alert-danger">
                                        {{ $errors->first('name')}}
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row" style="display: {{ isset($data) ? 'none' : 'block' }}">
                                {{ Form::label('email','Email: ',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{ Form::text('email',@$data->email,['class'=>'form-control','id'=>'email']) }}
                                    @if($errors->has('email'))
                                    <span class="alert-danger">
                                        {{ $errors->first('email')}}
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                {{ Form::label('age','Age: ',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{ Form::number('age',@$data->age,['class'=>'form-control','id'=>'age']) }}
                                    @if($errors->has('age'))
                                    <span class="alert-danger">
                                        {{ $errors->first('age')}}
                                    </span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group row">
                                {{ Form::label('address','Address: ',['class'=>'col-sm-3']) }}
                                <div class="col-sm-9">
                                    {{Form::textarea('address',@$data->address,['class'=>'form-control','id'=>'address','rows'=>'3', 'style'=>'resize:none']) }}
                                    @if($errors->has('address'))
                                    <span class="alert-danger">
                                        {{ $errors->first('address') }}
                                    </span>
                                    @endif
                                </div>
                            </div>

                            
                            <div class="form-group row">
                                {{ Form::label('details','Details: ',['class'=>'col-sm-3']) }}
                                <div class="col-sm-9">
                                    {{Form::textarea('details',@$data->details,['class'=>'form-control','id'=>'details', 'style'=>'resize:none']) }}
                                    @if($errors->has('details'))
                                    <span class="alert-danger">
                                        {{ $errors->first('details') }}
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                {{ Form::label('mobile','Contact number: ',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                   <input type="tel" name="mobile" class="form-control" value='<?php echo @$data->mobile  ?>'>
                                    @if($errors->has('mobile'))
                                    <span class="alert-danger">
                                        {{ $errors->first('mobile')}}
                                    </span>
                                    @endif
                                </div>
                            </div>

                          


                            <div class="form-group row">
                                {{ Form::label('gender','Gender: ',['class'=>'col-sm-3']) }}
                                <div class="col-sm-9">
                                    {{Form::select('gender',['male'=>'Male','female'=>'Female'],@$data->gender,['class'=>'form-control','id'=>'gender']) }}
                                    @if($errors->has('gender'))
                                    <span class="alert-danger">
                                        {{ $errors->first('gender') }}
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                {{ Form::label('blood_group','Blood: ',['class'=>'col-sm-3']) }}
                                <div class="col-sm-9">
                                    {{Form::select('blood_group',[''=>'Select any one','a+'=>'A+','a-'=>'A-','b+'=>'B+','b-'=>'B-','ab+'=>'AB+','ab-'=>'AB-','o+'=>'O+','o-'=>'O-'],@$data->blood_group,['class'=>'form-control','id'=>'blood_group']) }}
                                    @if($errors->has('blood_group'))
                                    <span class="alert-danger">
                                        {{ $errors->first('blood_group') }}
                                    </span>
                                    @endif
                                </div>
                            </div>

                           


                         <div class="form-group row">
                                {{ Form::label('date','Required date: ',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{ Form::date('date',@$data->date,['class'=>'form-control','id'=>'date']) }}
                                    @if($errors->has('date'))
                                    <span class="alert-danger">
                                        {{ $errors->first('date')}}
                                    </span>
                                    @endif
                                </div>
                            </div>










                            <div class="form-group row">
                                {{ Form::label('','',['class'=>'col-sm-3']) }}
                                <div class="col-sm-9">
                                    {{ Form::button('<i class ="fas fa-plane"></i>  submit ' , ['type'=>'submit','class'=>'btn btn-success']) }}
                                    {{ Form::button('<i class ="fas fa-trash"></i> cancel' , ['type'=>'reset','class'=>'btn alert-danger']) }}
                                </div>
                            </div>

                            {{Form::close()}}




                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection