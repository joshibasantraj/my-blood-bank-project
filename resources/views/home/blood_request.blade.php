@extends('layouts.frontend')

@section('content')


{{ Form::open(['url'=>route('store_request.store'),'class'=>'form','enctype'=>'multipart/form-data','method'=>'post']) }}

@csrf
<div class="container">
<div class="row">
<div class="col-sm-12">
<table cellpadding="0" cellspacing="0" style="margin:auto; width:100%; ">

  <tr>
    <td colspan="2" align="center"><img src="{{asset('assets/home/Images/brequest.png')}}" width="300px" height="80px" /></td>
  </tr>

  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>

  <tr>
     
    <td style="vertical-align:top;padding-top:20px;">


      <div class="form-group row">
        {{ Form::label('name','Name: ',['class'=>'col-sm-3'])}}
        <div class="col-sm-7">
          {{ Form::text('name',@$data->name,['class'=>'form-control','id'=>'name']) }}
          @if($errors->has('name'))
          <span class="alert-danger">
            {{ $errors->first('name')}}
          </span>
          @endif
        </div>
      </div>

      <div class="form-group row">
        {{ Form::label('email','Email: ',['class'=>'col-sm-3'])}}
        <div class="col-sm-7">
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
        <div class="col-sm-7">
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
        <div class="col-sm-7">
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
        <div class="col-sm-7">
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
        <div class="col-sm-7">
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
        <div class="col-sm-7">
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
        <div class="col-sm-7">
          {{Form::select('blood_group',[''=>'Select any one','a+'=>'A+','a-'=>'A-','b+'=>'B+','b-'=>'B-','ab+'=>'AB+','ab-'=>'AB-','o+'=>'O+','o-'=>'O-'],@$data->blood_group,['class'=>'form-control','id'=>'blood_group']) }}
          @if($errors->has('blood_group'))
          <span class="alert-danger">
            {{ $errors->first('blood_group') }}
          </span>
          @endif
        </div>
      </div>

      
      <div class="form-group row">
        {{ Form::label('date','Blood Required Date (Upto): ',['class'=>'col-sm-3']) }}
        <div class="col-sm-7">
          {{Form::date('date','',['class'=>'form-control','id'=>'date']) }}
          @if($errors->has('date'))
          <span class="alert-danger">
            {{ $errors->first('date') }}
          </span>
          @endif
        </div>
      </div>

      <div class="form-group row">
        {{ Form::label('','',['class'=>'col-sm-3']) }}
        <div class="col-sm-7">
          {{ Form::button('<i class ="fas fa-plane"></i>  submit ' , ['type'=>'submit','class'=>'btn btn-success']) }}
          {{ Form::button('<i class ="fas fa-trash"></i> cancel' , ['type'=>'reset','class'=>'btn alert-danger']) }}
        </div>
      </div>

      {{Form::close()}}

</table>
</div>
</div>
</div>
      @endsection