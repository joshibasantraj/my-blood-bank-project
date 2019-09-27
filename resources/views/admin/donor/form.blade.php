@extends('layouts.admin-dashboard')
@section('scripts')
<script>
    $('#change_password').change(function(){
        var checked =$('#change_password').prop('checked');
        if(checked){
            $('#password').attr('required');
            $('#password_confirm').attr('required');
            $('#change_password_div').removeClass('hidden');
        }else{
            $('#password').removeAttr('required');
            $('#password_confirm').removeAttr('required');
            $('#change_password_div').addClass('hidden');
        }
    });
</script>


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
                <h3>Donor {{ isset($donor_data) ? 'update' : 'add' }} page</h3>
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
                        <h2>Donor Page</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        {{ isset($donor_data) ? 'update' : 'add' }} Donor to the page ...
                        <div>

                            @if(isset($donor_data))
                            {{ Form::open(['url'=>route('donor.update',$donor_data->id),'class'=>'form','enctype'=>'multipart/form-data']) }}
                            @method('PUT')

                            @else

                            {{ Form::open(['url'=>route('donor.store'),'class'=>'form','enctype'=>'multipart/form-data']) }}

                            @endif

                            @csrf
                            



                            <div class="form-group row">
                                {{ Form::label('name','Name: ',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{ Form::text('name',@$donor_data->name,['class'=>'form-control','id'=>'name']) }}
                                    @if($errors->has('name'))
                                    <span class="alert-danger">
                                        {{ $errors->first('name')}}
                                    </span>
                                    @endif
                                </div>
                            </div>

                           
                            <div class="form-group row" style="display: {{isset($donor_data) ? 'none' : 'block' }}">
                            {{ Form::label('email', 'Email: ',['class'=>'col-sm-3']) }}
                            <div class="col-sm-9">
                                {{Form::text('email', @$donor_data->email ,['class'=>'form-control','id'=>'email','rows'=>5,'style'=>'resize:none']) }}
                                @if($errors->has('email'))
                                <span class="alert-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>




                            <div class="form-group row">
                                {{ Form::label('age','Age: ',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{ Form::number('age',@$donor_data->age,['class'=>'form-control','id'=>'age']) }}
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
                                    {{Form::textarea('address',@$donor_data->address,['class'=>'form-control','id'=>'address']) }}
                                    @if($errors->has('address'))
                                    <span class="alert-danger">
                                        {{ $errors->first('address') }}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('mobile','Contact number: ',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                   <input type="tel" name="mobile" class="form-control" value="{{ @$donor_data->mobile}}">
                                    @if($errors->has('mobile'))
                                    <span class="alert-danger">
                                        {{ $errors->first('mobile')}}
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                {{ Form::label('status','Status: ',['class'=>'col-sm-3']) }}
                                <div class="col-sm-9">
                                    {{Form::select('status',['active'=>'Active','inactive'=>'Inactive'],@$donor_data->status,['class'=>'form-control','id'=>'status']) }}
                                    @if($errors->has('status'))
                                    <span class="alert-danger">
                                        {{ $errors->first('status') }}
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                {{ Form::label('role','Role: ',['class'=>'col-sm-3']) }}
                                <div class="col-sm-9">
                                    {{Form::select('role',['admin'=>'Admin','donor'=>'Donor'],@$donor_data->role,['class'=>'form-control','id'=>'role']) }}
                                    @if($errors->has('role'))
                                    <span class="alert-danger">
                                        {{ $errors->first('role') }}
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                {{ Form::label('gender','Gender: ',['class'=>'col-sm-3']) }}
                                <div class="col-sm-9">
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
                                <div class="col-sm-9">
                                    {{Form::select('blood_group',[''=>'Select any one','a+'=>'A+','a-'=>'A-','b+'=>'B+','b-'=>'B-','ab+'=>'AB+','ab-'=>'AB-','o+'=>'O+','o-'=>'O-'],@$donor_data->blood_group,['class'=>'form-control','id'=>'blood_group']) }}
                                    @if($errors->has('blood_group'))
                                    <span class="alert-danger">
                                        {{ $errors->first('blood_group') }}
                                    </span>
                                    @endif
                                </div>
                            </div>


                            @if(isset($donor_data))

                        <div class="form-group row" style=" isset($donor_data) ? 'none' : 'block'  ">
                            {{ Form::label('change_password', 'Change password: ',['class'=>'col-sm-3']) }}
                            <div class="col-sm-9">
                                {{Form::checkbox('change_password',1,false,['id'=>'change_password']) }} Yes
                                @if($errors->has('change_password'))
                                <span class="alert-danger">{{ $errors->first('change_password') }}</span>
                                @endif
                            </div>
                        </div>
                        @endif


                        <div class=" {{ isset($donor_data)?'hidden':''}}" id="change_password_div">

                        <div class="form-group row" style=" isset($donor_data) ? 'none' : 'block'  ">
                            {{ Form::label('password', 'Password: ',['class'=>'col-sm-3']) }}
                            <div class="col-sm-9">
                                {{Form::password('password',['id'=>'password','class'=>'form-control']) }}
                                <input type="checkbox" onclick="myFunction()">Show Password
                                @if($errors->has('password'))
                                <span class="alert-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row" style=" isset($donor_data) ? 'none' : 'block'  ">
                            {{ Form::label('confirm_password', 'Reenter password: ',['class'=>'col-sm-3']) }}
                            <div class="col-sm-9">
                                {{Form::password('password_confirmation',['id'=>'confirm_password','class'=>'form-control']) }}
                               
                                <input type="checkbox" onclick="myFunction1()">Show Password
                                @if($errors->has('confirm_password'))
                                <span class="alert-danger">{{ $errors->first('confirm_password') }}</span>
                                @endif
                            </div>
                        </div>

                        </div>







                            <div class="form-group row">
                                {{ Form::label('image','Image: ',['class'=>'col-sm-3']) }}
                                <div class="col-sm-4">
                                    {{Form::file('image',['id'=>'image','accept'=>'image/*']) }}
                                    @if($errors->has('image'))
                                    <span class="alert-danger">
                                        {{ $errors->first('image') }}
                                    </span>
                                    @endif
                                </div>
                                @if(isset($donor_data))
                                @if( $donor_data->image != null && file_exists(public_path().'/images/users/'.$donor_data->image))
                                <div class="col-4">
                                    <img style="width:150px" src="{{ asset('images/users/'.$donor_data->image) }}" alt="" class="img img-responsive img-thumbnail">

                                </div>
                                @endif
                                @endif
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