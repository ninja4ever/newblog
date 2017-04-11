@extends('front.index')
@section('title')
Mój blog
@endsection

@section('content')
<!-- Blog entries -->
<div class="w3-col l8 s12">
    @if(count($posts)>0)
        @foreach($posts as $post)
        <!-- Blog entry -->
        <div class="w3-card-4 w3-margin w3-white">
            <a href="{{url('/blog-page/'.$post->slug)}}" style="text-decoration:none;">
                <img src="{{asset('/uploads/posts-image/'.$post->image)}}" alt="" style="width:100%">
            </a>
            <div class="w3-container">
                <h3>
                    <a href="{{url('/blog-page/'.$post->slug)}}" style="text-decoration:none;">
                        <b>{{$post->title}}</b>
                    </a>
                </h3>
                <h5>{{trans('front.date')}} <span class="w3-opacity">{{Carbon\Carbon::parse($post->updated_at)->format('d.m.Y')}}</span></h5>
            </div>
            <div class="w3-container">
                <p>{{$post->excerpt}}</p>
                <div class="w3-row">
                    <div class="w3-col m8 s12">
                        <p>
                            <a href="{{url('/blog-page/'.$post->slug)}}" class="w3-button w3-padding-large w3-white w3-border">
                                <b>{{trans('front.post_read_more_btn')}}</b>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <!--  END blog entry  -->
        @endforeach
    @else
        <div class="w3-card-4 w3-margin w3-white">
            <div class="w3-container">
                <p>{{trans('front.no_result')}}</p>
            </div>
        </div>
        <hr>
    @endif
    <!-- PAGINATION -->
    <div class="w3-bar w3-padding">
      @if(PaginateRoute::hasPreviousPage())
        <a class="w3-button w3-black w3-padding-large w3-margin-bottom" href="{{ PaginateRoute::previousPageUrl() }}">{{trans('front.prev')}}</a>
      @endif
      @if(PaginateRoute::hasNextPage($posts))
        <a class="w3-button w3-black w3-padding-large w3-margin-bottom w3-right" href="{{ PaginateRoute::nextPageUrl($posts) }}">{{trans('front.next')}}</a>
      @endif
    </div>
    <!-- END PAGINATION -->
</div>
<!-- END BLOG ENTRIES -->
<!-- Introduction menu -->
<div class="w3-col l4">
    <!-- About Card -->
    @include('front.common.about_partial')
    <!-- end about card -->
    <!-- search -->
    @include('front.common.search_partial')
    <!-- end search -->
    <!-- latests posts -->
    @include('front.common.latest_posts_partial')
    <!-- END latests Posts -->
    <!-- category -->
    @include('front.common.category_partial')
    <!-- end category -->
<!-- END Introduction Menu -->
</div>

@endsection
