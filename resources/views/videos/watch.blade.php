@extends('layouts.master')

@section('content')
  @include('partials.navigation')

  <div class="col-lg-12">
    <div class="row">
      <div class="col-lg-3 col-sm-offset-2 video-title">
        <h3> {{ $video->title }} </h3>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-10 col-md-offset-2">
        <div class="video-content">
          <iframe width="780" height="520"
            src="{{ $videoUrl }}">
          </iframe>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4 col-sm-offset-2">
        <h3>Description</h3>
        <p>{{ $video->description }}</p>
      </div>
      @if (isset($user) && ($video->user->id == $user->id) )
        <div class="col-lg-3 col-sm-offset-3">
          <a href="/videos/edit/{{ $video->id }}" class="btn btn-primary">Edit</a>
          <a href="/videos/delete/{{ $video->id }}" class="btn btn-primary">Delete</a>
        </div>
      @endif
    </div>
  </div>

@endsection
