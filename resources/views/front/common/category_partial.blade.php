<div class="w3-card-2 w3-margin">
    <div class="w3-container w3-padding">
        <h4>{{trans('front.category_title')}}</h4>
    </div>
    <div class="w3-container w3-white">
        <p>
        @foreach($postcategory as $category)
            <a href="{{url('/category/'.$category->slug)}}">
                <span class="w3-tag @if($loop->first) w3-black @else w3-light-grey @endif w3-margin-bottom">{{$category->name}}</span><!-- --></a><!-- --> 
        @endforeach
        </p>
    </div>
</div>
