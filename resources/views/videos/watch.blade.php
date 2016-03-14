@extends('layouts.master')

@section('content')
  @include('partials.navigation')

  <div class="col-lg-12">
    <div class="row">
      <div class="col-lg-7">
        <div class="video-content">
          <iframe width="780" height="520" allowfullscreen="allowfullscreen"
            src="{{ $videoUrl }}">
          </iframe>
        </div>
      </div>
      <div class="col-lg-3 col-md-offset-2">
        <h2> {{ $video->title }} </h2>
        <p>Category: <a href="/categories/{{ $video->category->id }}">
          {{ $video->category->name }}</a>
        </p>
        <br>
        <h4>Description</h4>
        <p>{{ $video->description }}</p>
      @if (isset($user) && ($video->user->id == $user->id) )
        <br>
        <a href="/videos/edit/{{ $video->id }}" class="btn-sm btn-primary">Edit</a>
        <a href="/videos/delete/{{ $video->id }}" class="btn-sm btn-primary">Delete</a>
      @endif
      </div>
    </div>
  </div>

@endsection
