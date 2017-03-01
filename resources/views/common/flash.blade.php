<div class="flash-message">
  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(Session::has('alert-' . $msg))
    <p class="alert alert-{{ $msg }} fade in">
      <a href="#" class="close" data-dismiss="alert" aria-label="close" style="font-size:26px !important;line-height:19px;">&times;</a>
      {{ Session::get('alert-' . $msg) }}</p>
    @endif
  @endforeach
</div>
