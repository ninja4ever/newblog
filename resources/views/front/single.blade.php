@extends('front.index')
@section('title')
Mój blog
@endsection

@section('content')
<!-- Blog entries -->
<div class="w3-col l8 s12">
  <!-- Blog entry -->
  <div class="w3-card-4 w3-margin w3-white">
    <img src="{{asset('/uploads/posts-image/'.$posts->image)}}" alt="" style="width:100%">
    <div class="w3-container">
      <h3><b>{{$posts->title}}</b></h3>
      <h5>Date: <span class="w3-opacity">{{Carbon\Carbon::parse($posts->updated_at)->format('d.m.Y')}}</span></h5>
    </div>
    <div class="w3-container">
      <p>{{$posts->body}}</p>
    </div>
  </div>
  <hr>
<!--  END blog entry  -->
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
