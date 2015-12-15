@if (null !== $msg = session()->get('msg'))
  <div class="alert alert-dismissible alert-success">
    {{ $msg }}
  </div>
@endif
