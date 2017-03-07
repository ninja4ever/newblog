@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">{{trans('messages.page_panel_title')}}</div>
    <div class="panel-body">
      {!! Form::open(['url' => '/pages/store', 'method' => 'post', 'class'=>'form-horizontal', 'files'=>true]) !!}
            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                {!! Form::label('title', trans('messages.page_title_label'), ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                    <input id="title" type="text" class="form-control" name="title" >
                    @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                {!! Form::label('slug', trans('messages.page_slug_label'), ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                    <input id="slug" type="text" class="form-control" name="slug" >
                    @if ($errors->has('slug'))
                        <span class="help-block">
                            <strong>{{ $errors->first('slug') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                {!! Form::label('body', trans('messages.page_body_label'), ['class' => 'col-md-4 control-label']) !!}
                 <div class="col-md-6">
                   {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>'5', 'id'=>'body']) !!}
                   @if ($errors->has('body'))
                       <span class="help-block">
                           <strong>{{ $errors->first('body') }}</strong>
                       </span>
                   @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('active') ? ' has-error' : '' }}">
                {!! Form::label('active', trans('messages.page_status'), ['class' => 'col-md-4 control-label']) !!}
               <div class="col-md-6">
                 {!! Form::select('active', ['0' => trans('messages.page_select_n_active'), '1' => trans('messages.page_select_active')], null, ['placeholder' => trans('messages.page_choose_one'), 'class'=>'form-control', 'id'=>'active']) !!}
                 @if ($errors->has('active'))
                     <span class="help-block">
                         <strong>{{ $errors->first('active') }}</strong>
                     </span>
                 @endif
                </div>
            </div>


            <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
              {!! Form::label('image', trans('messages.page_page_image_label'), ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                  <div style="" class="file_out_wrapper">{!! Form::file('image', ['class' => '', 'id'=>'image',  'accept'=>'image/*']) !!}</div>
                  <img id="image-preview" src="#" alt="image_prewiew" style="display:none;"/>
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
                      <span class="fa fa-floppy-o" aria-hidden="true"></span>  {{trans('messages.page_save_btn')}}
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
  tinymce.init({
    selector: 'textarea',
    height: 300,
    forced_root_block : "",
    language: 'pl',
    plugins: [
      'advlist autolink lists link image charmap print preview anchor',
      'searchreplace visualblocks code fullscreen',
      'insertdatetime media table contextmenu paste code'
    ],
    toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  });
</script>
@endsection
