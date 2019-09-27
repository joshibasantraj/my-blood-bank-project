@extends('layouts.admin-dashboard')
@section('title')
User list page || admin Ecommerce
@endsection
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
@endsection
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>User {{ isset($donor_data) ? 'update' : 'add'}} </h3>

            </div>

            <div class="title_right">

            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>{{ isset($donor_data) ? 'update' : 'add'}} User</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        

                       {{Form::open(['url'=>route('admin-update',$donor_data->id),'class'=>'form', 'enctype'=>'multipart/form-data'])  }}
                            @method('PUT')

        
                         

                        <div class="form-group row">
                            {{ Form::label('name', 'Name: ',['class'=>'col-sm-3']) }}
                            <div class="col-sm-9">
                                {{Form::text('name', @$donor_data->name ,['class'=>'form-control','id'=>'name']) }}
                                @if($errors->has('name'))
                                <span class="alert-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label('address', 'Address: ',['class'=>'col-sm-3']) }}
                            <div class="col-sm-9">
                                {{Form::textarea('address',@$donor_data->address ,['class'=>'form-control','id'=>'address','rows'=>5,'style'=>'resize:none']) }}
                                @if($errors->has('address'))
                                <span class="alert-danger">{{ $errors->first('address') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label('change_password', 'Change password: ',['class'=>'col-sm-3']) }}
                            <div class="col-sm-9">
                                {{Form::checkbox('change_password',1,false,['id'=>'change_password']) }} Yes
                                @if($errors->has('change_password'))
                                <span class="alert-danger">{{ $errors->first('change_password') }}</span>
                                @endif
                            </div>
                        </div>


                        <div class="hidden" id="change_password_div">

                        <div class="form-group row">
                            {{ Form::label('password', 'Password: ',['class'=>'col-sm-3']) }}
                            <div class="col-sm-9">
                                {{Form::password('password',['id'=>'password','class'=>'form-control']) }}
                                @if($errors->has('password'))
                                <span class="alert-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label('confirm_password', 'Reenter password: ',['class'=>'col-sm-3']) }}
                            <div class="col-sm-9">
                                {{Form::password('password_confirmation',['id'=>'confirm_password','class'=>'form-control']) }}
                                @if($errors->has('confirm_password'))
                                <span class="alert-danger">{{ $errors->first('confirm_password') }}</span>
                                @endif
                            </div>
                        </div>

                        </div>


                        <div class="form-group row">
                                {{ Form::label('age','Age: ',['class'=>'col-sm-3'])}}
                                <div class="col-sm-9">
                                    {{ Form::text('age',@$donor_data->age,['class'=>'form-control','id'=>'age']) }}
                                    @if($errors->has('age'))
                                    <span class="alert-danger">
                                        {{ $errors->first('age')}}
                                    </span>
                                    @endif
                                </div>
                            </div>



                        <div class="form-group row">
                            {{ Form::label('mobile', 'Phone: ',['class'=>'col-sm-3']) }}
                            <div class="col-sm-9">
                                {{Form::tel('mobile',@$donor_data->mobile ,['class'=>'form-control','id'=>'mobile']) }}
                                @if($errors->has('mobile'))
                                <span class="alert-danger">{{ $errors->first('mobile') }}</span>
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
