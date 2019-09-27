@extends('layouts.admin-dashboard')

@section('links')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/nepaliDatePicker.min.css') }}">
@endsection

@section('scripts')
    <script src="{{ asset('assets/admin/tinymce/tinymce.min.js')}}"> </script>

    <script src="{{asset('assets/admin/js/jquery.nepaliDatePicker.min.js')}}"></script>
    <script>
        tinymce.init({
            selector: '#description',
            plugins: 'print preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern help ',
            toolbar: 'formatselect | bold italic strikethrough forecolor backcolor permanentpen formatpainter | link image media pageembed | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent | removeformat | addcomment',
  
        });
    </script>
@endsection

@section('content')
  <!-- page content -->
  <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>News {{ isset($news_data) ? 'update' : 'add' }} page</h3>
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
                    <h2>News Page</h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  {{ isset($News_data) ? 'update' : 'add' }} News to the page ...
                      <div>

                      @if(isset($news_data))
                    {{ Form::open(['url'=>route('news.update',$news_data->id),'class'=>'form','enctype'=>'multipart/form-data']) }}
                            @method('PUT')

                  @else

                            {{ Form::open(['url'=>route('news.store'),'class'=>'form','enctype'=>'multipart/form-data']) }}

                            @endif



                               <div class="form-group row">
                                   {{ Form::label('title','Title: ',['class'=>'col-sm-3'])}}
                                   <div class="col-sm-9">
                                       {{ Form::text('title',@$news_data->title,['class'=>'form-control','id'=>'title']) }}
                                       @if($errors->has('title'))
                                       <span class="alert-danger">
                                           {{ $errors->first('title')}}
                                       </span>
                                       @endif
                                   </div>
                               </div>

                                <div class="form-group row">
                                   {{ Form::label('summary','Summary: ',['class'=>'col-sm-3']) }}
                                    <div class="col-sm-9">
                                        {{Form::textarea('summary',@$news_data->summary,['class'=>'form-control','id'=>'summary']) }}
                                        @if($errors->has('summary'))
                                            <span class="alert-danger">
                                                {{ $errors->first('summary') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                   {{ Form::label('description','Description: ',['class'=>'col-sm-3']) }}
                                    <div class="col-sm-9">
                                        {{Form::textarea('description',@$news_data->description,['class'=>'form-control','id'=>'description']) }}
                                        @if($errors->has('description'))
                                            <span class="alert-danger">
                                                {{ $errors->first('description') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                   {{ Form::label('location','Location: ',['class'=>'col-sm-3'])}}
                                   <div class="col-sm-9">
                                       {{ Form::text('location',@$news_data->location,['class'=>'form-control','id'=>'location']) }}
                                       @if($errors->has('location'))
                                       <span class="alert-danger">
                                           {{ $errors->first('location')}}
                                       </span>
                                       @endif
                                   </div>
                               </div>

                               <div class="form-group row">
                                   {{ Form::label('news_date','News date: ',['class'=>'col-sm-3'])}}
                                   <div class="col-sm-9">
                                       {{ Form::date('news_date',@$news_data->news_date,['class'=>'form-control','id'=>'news_date']) }}
                                       @if($errors->has('news_date'))
                                       <span class="alert-danger">
                                           {{ $errors->first('news_date')}}
                                       </span>
                                       @endif
                                   </div>
                               </div>



                                <div class="form-group row">
                                   {{ Form::label('status','Status: ',['class'=>'col-sm-3']) }}
                                    <div class="col-sm-9">
                                        {{Form::select('status',['published'=>'Published','unpublished'=>'Unpublished'],@$news_data->status,['class'=>'form-control','id'=>'status']) }}
                                        @if($errors->has('status'))
                                            <span class="alert-danger">
                                                {{ $errors->first('status') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                            {{ Form::label('phone', 'Phone: ',['class'=>'col-sm-3']) }}
                            <div class="col-sm-9">
                                {{Form::tel('contact', @$news_data->contact ,['class'=>'form-control','id'=>'contact']) }}
                                @if($errors->has('contact'))
                                <span class="alert-danger">{{ $errors->first('contact') }}</span>
                                @endif
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
                                    @if(isset($news_data))
                                    @if( $news_data->image != null && file_exists(public_path().'/uploads/news/'.$news_data->image))
                                    <div class="col-4">
                                    <img style="width:150px" src="{{ asset('uploads/news/'.$news_data->image) }}" alt="" class="img img-responsive img-thumbnail">

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
        <!-- /page content -->

@endsection

