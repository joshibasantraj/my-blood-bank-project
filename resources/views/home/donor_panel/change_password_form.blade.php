@extends('layouts.donor_dashboard')
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

{{Form::open(['url'=>route('update_password',$donor_data->id),'class'=>'form', 'enctype'=>'multipart/form-data'])  }}
                            @method('PUT')
<div class="form-group row">
                            {{ Form::label('password', 'Password: ',['class'=>'col-sm-3']) }}
                            <div class="col-sm-9">
                                {{Form::password('password',['id'=>'password','class'=>'form-control']) }}
                                <input type="checkbox" onclick="myFunction()">Show Password
                                @if($errors->has('password'))
                                <span class="alert-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label('confirm_password', 'Reenter password: ',['class'=>'col-sm-3']) }}
                            <div class="col-sm-9">
                                {{Form::password('password_confirmation',['id'=>'confirm_password','class'=>'form-control']) }}
                                <input type="checkbox" onclick="myFunction1()">Show Password
                                @if($errors->has('confirm_password'))
                                <span class="alert-danger">{{ $errors->first('confirm_password') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label('', '',['class'=>'col-sm-3']) }}
                            <div class="col-sm-9">
                                {{Form::button('<i class ="fas fa-plane"></i> Submit',['class'=>'btn btn-success','id'=>'submit','type'=>'submit']) }}
                                {{Form::button('<i class ="fas fa-trash"></i> Cancel',['class'=>'btn btn-danger','id'=>'cancel','type'=>'reset']) }}

                            </div>
                        </div>
                        {{ Form::close()}}
                        <br><br><br><br><br><br><br><br><br><br><br><br>


@endsection

