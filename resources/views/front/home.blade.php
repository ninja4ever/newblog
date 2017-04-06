@extends('front.index')
@section('title')
Mój blog
@endsection

@section('content')
<!-- Blog entries -->
<div class="w3-col l8 s12">
  @foreach($posts as $post)
  <!-- Blog entry -->
  <div class="w3-card-4 w3-margin w3-white">
    <img src="{{asset('/uploads/posts-image/'.$post->image)}}" alt="" style="width:100%">
    <div class="w3-container">
      <h3><b>{{$post->title}}</b></h3>
      <h5>Date: <span class="w3-opacity">{{Carbon\Carbon::parse($post->updated_at)->format('d.m.Y')}}</span></h5>
    </div>
    <div class="w3-container">
      <p>{{$post->excerpt}}</p>
      <div class="w3-row">
        <div class="w3-col m8 s12">
          <p><a href="#" class="w3-button w3-padding-large w3-white w3-border"><b>READ MORE »</b></a></p>
        </div>
<!--
        <div class="w3-col m4 w3-hide-small">
          <p><span class="w3-padding-large w3-right"><b>Comments  </b> <span class="w3-tag">0</span></span></p>
        </div>
-->
      </div>
    </div>
  </div>
  <hr>
<!--  END blog entry  -->
@endforeach

<!-- PAGINATION -->
<div class="w3-bar w3-padding">
  @if(PaginateRoute::hasPreviousPage())
      <a class="w3-button w3-black w3-padding-large w3-margin-bottom" href="{{ PaginateRoute::previousPageUrl() }}">Previous</a>
  @endif
  @if(PaginateRoute::hasNextPage($posts))
  <a class="w3-button w3-black w3-padding-large w3-margin-bottom w3-right" href="{{ PaginateRoute::nextPageUrl($posts) }}">Next</a>
  @endif
</div>
<!-- END PAGINATION -->
</div>
<!-- END BLOG ENTRIES -->

<!-- Introduction menu -->
<div class="w3-col l4">
  <!-- About Card -->
  <div class="w3-card-2 w3-margin w3-margin-top">
  <img src="/w3images/avatar_g.jpg" style="width:100%">
    <div class="w3-container w3-white">
      <h4><b>My Name</b></h4>
      <p>Just me, myself and I, exploring the universe of uknownment. I have a heart of love and a interest of lorem ipsum and mauris neque quam blog. I want to share my world with you.</p>
    </div>
  </div>
  <hr>
  <!-- Latests Posts -->
  <div class="w3-card-2 w3-margin">
    <div class="w3-container w3-padding">
      <h4>Latest Posts</h4>
    </div>
    <ul class="w3-ul w3-hoverable w3-white">
     @foreach($latestposts as $post)
      <li class="w3-padding-16">
       <a class="w3-block" style="text-decoration:none;" href="#">
        <img src="{{asset('/uploads/posts-image/'.$post->image)}}" alt="Image" class="w3-left w3-margin-right" style="width:50px">
        <span class="w3-large">{{$post->title}}</span><br>
        </a>
      </li>
      @endforeach
    </ul>
  </div>
  <hr>
<!-- END latests Posts -->
  <!-- Labels / tags -->
  <div class="w3-card-2 w3-margin">
    <div class="w3-container w3-padding">
      <h4>Category</h4>
    </div>
    <div class="w3-container w3-white">
    <p>
    @foreach($postcategory as $category)
     <a href="{{url('/category/'.$category->slug)}}"><span class="w3-tag @if($loop->first) w3-black @else w3-light-grey @endif w3-margin-bottom">{{$category->name}}</span></a>
    @endforeach
    </p>
    </div>
  </div>
<!-- END Introduction Menu -->
</div>

@endsection
