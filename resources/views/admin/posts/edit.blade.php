@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">{{trans('messages.post_panel_title')}}</div>
    <div class="panel-body">
      {!! Form::model($post,['url' => '/post/update/'.$post->id, 'method' => 'post', 'class'=>'form-horizontal', 'files'=>true]) !!}
                {{ method_field('PATCH') }}
            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                {!! Form::label('title', trans('messages.post_title_label'), ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                    <input id="title" type="text" class="form-control" name="title" value="{{$post->title}}" >
                    @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                {!! Form::label('slug', trans('messages.post_slug_label'), ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                    <input id="slug" type="text" class="form-control" name="slug" value="{{$post->slug}}" >
                    @if ($errors->has('slug'))
                        <span class="help-block">
                            <strong>{{ $errors->first('slug') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                {!! Form::label('body', trans('messages.post_body_label'), ['class' => 'col-md-4 control-label']) !!}
                 <div class="col-md-6">
                   <textarea name="body" rows="5" cols="40" id="body" class="form-control">{!!$post->body!!}</textarea>

                   @if ($errors->has('body'))
                       <span class="help-block">
                           <strong>{{ $errors->first('body') }}</strong>
                       </span>
                   @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('active') ? ' has-error' : '' }}">
                {!! Form::label('active', trans('messages.post_status'), ['class' => 'col-md-4 control-label']) !!}
               <div class="col-md-6">

                 {!! Form::select('active', ["0" => trans('messages.post_select_n_active'), "1" => trans('messages.post_select_active')], null, ['placeholder' => trans('messages.post_choose_one'), 'class'=>'form-control', 'id'=>'active']) !!}
                 @if ($errors->has('active'))
                     <span class="help-block">
                         <strong>{{ $errors->first('active') }}</strong>
                     </span>
                 @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
              {!! Form::label('category', trans('messages.post_post_category_label'), ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                    <select name="category" id="" class="form-control">
                      <option value="" >{{trans('messages.post_post_category_select_none_label')}}</option>
                        @foreach($cposts as $cpost)
                            <option @if($post->id == $cpost->id) selected @endif value="{{ $cpost->id}}">{{$cpost->name}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('category'))
                        <span class="help-block">
                            <strong>{{ $errors->first('category') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
              {!! Form::label('image', trans('messages.post_post_image_label'), ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                  <div style="" class="file_out_wrapper">{!! Form::file('image', ['class' => '', 'id'=>'image',  'accept'=>'image/*']) !!}</div>
                  <img id="image-preview" src="{{asset('uploads/posts-image/'.$post->image)}}" alt="image_prewiew" style="display:block;"/>
                    @if ($errors->has('image'))
                        <span class="help-block">
                            <strong>{{ $errors->first('image') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                      <span class="fa fa-floppy-o" aria-hidden="true"></span>  {{trans('messages.post_save_btn')}}
                    </button>
                </div>
            </div>
            {{ Form::close() }}
        <!-- </form> -->
    </div>
</div>

@endsection


@section('custom-js')
<script src="{{ URL::asset('js/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">
function readURL(input) {
     if (input.files && input.files[0]) {
         var reader = new FileReader();

         reader.onload = function (e) {
             $('#image-preview').attr('src', e.target.result).show();
         }

         reader.readAsDataURL(input.files[0]);
     }
 }

 $("#image").change(function(){
     readURL(this);
 });
  $(document).ready(function(){
    tinymce.init({
    selector: 'textarea',
    height: 300,
    language: 'pl',
    forced_root_block : "",
    invalid_elements : "p, script",
    plugins: [
      'advlist autolink lists link image charmap print preview anchor',
      'searchreplace visualblocks code fullscreen',
      'insertdatetime media table contextmenu paste code'
    ],
    toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
    });
  });
</script>
@endsection
