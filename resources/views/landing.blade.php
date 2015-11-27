@extends('layouts.master')

@section('content')
  @include('partials.navigation')
  <!-- Jumbotron -->
  <div class="jumbotron">
    <h1>Learn</h1>
    <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet.</p>
    <p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p>
  </div>

  <!-- Example row of columns -->
  <div class="row">
    <div class="col-lg-4">
      <h2>Heading</h2>
      <p>Put video here.</p>
      <p><a class="btn btn-primary" href="#" role="button">View details &raquo;</a></p>
    </div>
    <div class="col-lg-4">
      <h2>Heading</h2>
      <p>Put video here.</p>
      <p><a class="btn btn-primary" href="#" role="button">View details &raquo;</a></p>
   </div>
    <div class="col-lg-4">
      <h2>Heading</h2>
      <p>Put video here.</p>
      <p><a class="btn btn-primary" href="#" role="button">View details &raquo;</a></p>
    </div>
  </div>
  @include('partials.footer')
@endsection
