@extends('layouts.frontend')

@section('scripts')
<script>
    function myFunction() {
  var x = document.getElementById("password");
  var y = document.getElementById("confirm_password");
  if (x.type === "password") {
    x.type = "text";
    y.type = "text";
  } else {
    x.type = "password";
    y.type = "password";
  }
}

</script>

@endsection

@section('content')


{{ Form::open(['url'=>route('store_Donor.store'),'class'=>'form','enctype'=>'multipart/form-data']) }}
<div class="container">
<div class="row">
<div class="col-sm-12">
<table cellpadding="0" cellspacing="0" style="margin:auto; width:100%; ">

    <tr>
        <td colspan="2" align="center"><img src="{{asset('assets/home/Images/donor.png')}}" width="300px" height="80px" /></td>
    </tr>

    <tr>
        <td colspan="2">&nbsp;</td>
    </tr>

    <tr>
        <td style="vertical-align:top;padding-top:20px;">

                <div class="form-group row">
                    {{ Form::label('name','Donor Name: ',['class'=>'col-sm-3'])}}
                    <div class="col-sm-8">
                        {{ Form::text('name','',['class'=>'form-control','id'=>'name']) }}
                        @if($errors->has('name'))
                        <span class="alert-danger">
                            {{ $errors->first('name')}}
                        </span>
                        @endif
                    </div>
                </div>



                <div class="form-group row">
                    {{ Form::label('address','Address: ',['class'=>'col-sm-3']) }}
                    <div class="col-sm-8">
                        {{Form::textarea('address',@$data->address,['class'=>'form-control','id'=>'address','rows'=>'3', 'style'=>'resize:none']) }}
                        @if($errors->has('address'))
                        <span class="alert-danger">
                            {{ $errors->first('address') }}
                        </span>
                        @endif
                    </div>
                </div>



                <div class="form-group row">
                    {{ Form::label('age','Age: ',['class'=>'col-sm-3'])}}
                    <div class="col-sm-8">
                        {{ Form::number('age',@$data->age,['class'=>'form-control','id'=>'age']) }}
                        @if($errors->has('age'))
                        <span class="alert-danger">
                            {{ $errors->first('age')}}
                        </span>
                        @endif
                    </div>
                </div>
             
                <div class="form-group row">
                                {{ Form::label('mobile','Contact number: ',['class'=>'col-sm-3'])}}
                                <div class="col-sm-8">
                                   <input type="tel" name="mobile" class="form-control" value="{{ @$donor_data->mobile}}">
                                    @if($errors->has('mobile'))
                                    <span class="alert-danger">
                                        {{ $errors->first('mobile')}}
                                    </span>
                                    @endif
                                </div>
                            </div>


                            
                <div class="form-group row">
                                {{ Form::label('gender','Gender: ',['class'=>'col-sm-3']) }}
                                <div class="col-sm-8">
                                    {{Form::select('gender',['male'=>'Male','female'=>'Female'],@$donor_data->gender,['class'=>'form-control','id'=>'gender']) }}
                                    @if($errors->has('gender'))
                                    <span class="alert-danger">
                                        {{ $errors->first('gender') }}
                                    </span>
                                    @endif
                                </div>
                            </div>
                




                            <div class="form-group row">
                                {{ Form::label('blood_group','Blood: ',['class'=>'col-sm-3']) }}
                                <div class="col-sm-8">
                                    {{Form::select('blood_group',[''=>'Select any one','a+'=>'A+','a-'=>'A-','b+'=>'B+','b-'=>'B-','ab+'=>'AB+','ab-'=>'AB-','o+'=>'O+','o-'=>'O-'],@$donor_data->blood_group,['class'=>'form-control','id'=>'blood_group']) }}
                                    @if($errors->has('blood_group'))
                                    <span class="alert-danger">
                                        {{ $errors->first('blood_group') }}
                                    </span>
                                    @endif
                                </div>
                            </div>


                <div class="form-group row">
                    {{ Form::label('email','Email: ',['class'=>'col-sm-3'])}}
                    <div class="col-sm-8">
                        {{ Form::text('email',@$data->email,['class'=>'form-control','id'=>'email']) }}
                        @if($errors->has('email'))
                        <span class="alert-danger">
                            {{ $errors->first('email')}}
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                            {{ Form::label('password', 'Password: ',['class'=>'col-sm-3']) }}
                            <div class="col-sm-8">
                                {{Form::password('password',['id'=>'password','class'=>'form-control']) }}
                              
                                @if($errors->has('password'))
                                <span class="alert-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label('confirm_password', 'Reenter password: ',['class'=>'col-sm-3']) }}
                            <div class="col-sm-8">
                                {{Form::password('password_confirmation',['id'=>'confirm_password','class'=>'form-control']) }}
                                <input type="checkbox" onclick="myFunction()">Show Password
                               
                            </div>
                        </div>



                        <div class="form-group row">
                                {{ Form::label('image','Image: ',['class'=>'col-sm-3']) }}
                                <div class="col-sm-8">
                                    {{Form::file('image',['id'=>'image','accept'=>'image/*']) }}
                                    @if($errors->has('image'))
                                    <span class="alert-danger">
                                        {{ $errors->first('image') }}
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

</table>
</div>
</div>
</div>








@endsection