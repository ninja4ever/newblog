<div class="w3-card-2 w3-margin">
    <div class="w3-container w3-padding">
        <h4>{{trans('front.search_title')}}</h4>
    </div>
    <div class="w3-container w3-padding w3-white">
        {!! Form::open(['url'=>'/search', 'method'=>'post']) !!}
            <input type="text" class="w3-input" name="search" placeholder="{{trans('front.search_placeholder')}}">
        {!! Form::close() !!}
    </div>
</div>
<hr>
