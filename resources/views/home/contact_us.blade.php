@extends('layouts.frontend')

@section('content')
<br>

<div style="height:600px; width:100%; margin:auto; margin-top:10px; margin-bottom:10px; background-color:#f8f1e4; border:2px solid red; box-shadow:4px 1px 20px black;">
     <form method="post" enctype="multipart/form-data" action="{{ route('contact.store') }}">
 @csrf

  <div   class="col span_2_of_3"> <div class="contact-form" style="padding-left:100px;">
				  	<img src="{{ asset('assets/home/cpics/contact.png')}}" align="center" />
  
    <table  cellspacing="0" cellpadding="0"  width="500px" height="300px">               

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
        {{ Form::label('subject','Subject: ',['class'=>'col-sm-3']) }}
        <div class="col-sm-8">
          {{Form::textarea('subject',@$data->subject,['class'=>'form-control','id'=>'subject', 'style'=>'resize:none']) }}
          @if($errors->has('subject'))
          <span class="alert-danger">
            {{ $errors->first('subject') }}
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

</table>

</div>
</div>
		
		  </div>
</form>
        </div>
         </div> 
         </div>
        <div class="clear"></div>
        <br><br>

@endsection