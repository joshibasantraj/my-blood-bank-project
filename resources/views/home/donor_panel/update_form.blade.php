@extends('layouts.donor_dashboard')


@section('content')


<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            

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
                      <h4 style="text-align:center"> Donor update page:</h4>
                      <br>
                        <div class="container">
                          <div class="row">
                          <div class="col-sm-12">

                           
                            {{ Form::open(['url'=>route('update_profile',$donor_data->id),'class'=>'form','enctype'=>'multipart/form-data']) }}
                            @method('PUT')

                         
                            @csrf
                            



                            <div class="form-group row">
                            <div class="col sm-3"></div>
                                {{ Form::label('name','Name: ',['class'=>'col-sm-3'])}}
                                <div class="col-sm-6">
                                    {{ Form::text('name',@$donor_data->name,['class'=>'form-control','id'=>'name']) }}
                                    @if($errors->has('name'))
                                    <span class="alert-danger">
                                        {{ $errors->first('name')}}
                                    </span>
                                    @endif
                                </div>
                            </div>

                         




                            <div class="form-group row">
                                {{ Form::label('age','Age: ',['class'=>'col-sm-3'])}}
                                <div class="col-sm-6">
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
                                <div class="col-sm-6">
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
                                <div class="col-sm-6">
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
                                <div class="col-sm-6">
                                    {{Form::select('gender',['male'=>'Male','female'=>'Female'],@$donor_data->gender,['class'=>'form-control','id'=>'gender']) }}
                                    @if($errors->has('gender'))
                                    <span class="alert-danger">
                                        {{ $errors->first('gender') }}
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                {{ Form::label('status','Status: ',['class'=>'col-sm-3']) }}
                                <div class="col-sm-6">
                                    {{Form::select('status',['active'=>'Active','inactive'=>'Inactive'],@$donor_data->status,['class'=>'form-control','id'=>'status']) }}
                                    @if($errors->has('status'))
                                    <span class="alert-danger">
                                        {{ $errors->first('status') }}
                                    </span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group row">
                                {{ Form::label('blood_group','Blood: ',['class'=>'col-sm-3']) }}
                                <div class="col-sm-6">
                                    {{Form::select('blood_group',[''=>'Select any one','a+'=>'A+','a-'=>'A-','b+'=>'B+','b-'=>'B-','ab+'=>'AB+','ab-'=>'AB-','o+'=>'O+','o-'=>'O-'],@$donor_data->blood_group,['class'=>'form-control','id'=>'blood_group']) }}
                                    @if($errors->has('blood_group'))
                                    <span class="alert-danger">
                                        {{ $errors->first('blood_group') }}
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                {{ Form::label('image','Image: ',['class'=>'col-sm-3']) }}
                                <div class="col-sm-4">
                                    {{Form::file('image',['class'=>'form-control','id'=>'image','accept'=>'image/*']) }}
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
                                <div class="col-sm-6">
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
    </div>
</div>



@endsection