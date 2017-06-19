<!-- Latests Posts -->
<div class="w3-card-2 w3-margin">
    <div class="w3-container w3-padding">
        <h4>{{trans('front.latest_posts_title')}}</h4>
    </div>
    <ul class="w3-ul w3-hoverable w3-white">
    @foreach($latestposts as $post)
        <li class="w3-padding-16">
            <a class="w3-block" style="text-decoration:none;" href="{{url('/single/'.$post->postcategory->slug.'/'.$post->slug)}}">
                <img src="{{asset('/uploads/posts-image/'.$post->image)}}" alt="Image" class="w3-left w3-margin-right" style="width:50px">
                <span class="w3-large">{{$post->title}}</span><br>
            </a>
        </li>
    @endforeach
    </ul>
</div>
<hr>
