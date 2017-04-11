<!-- w3-content defines a container for fixed size centered content,
and is wrapped around the whole page content, except for the footer in this example -->
<div class="w3-content" style="max-width:1400px">

<!-- Header -->
<header class="w3-container w3-center w3-padding-32">
    <h1>
        <a href="{{url('/')}}" style="text-decoration:none;">
            <b>{{$settings[0]->value}}</b>
        </a>
    </h1>
    <p>{{$settings[1]->value}}</p>
</header>

<!-- Grid -->
<div class="w3-row">
