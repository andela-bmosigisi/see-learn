@extends('layouts.master')

@section('content')
  @include('partials.navigation')
  <div class="row">
    <div class="col-lg-4 col-md-offset-2">
      <h2>Category: {{ $category->name }}</h2>
      <p class="large-text">
        {{ $category->description }}
      </p>
    </div>
  </div>
  <div class="row">
  @if (!is_null($videos))
    @foreach($videos as $video)
      <div class="col-lg-4 video-container">
        <a href="/videos/{{ $video->id }}"><h4> {{ $video->title }} </h4></a>
        <a href="/videos/{{ $video->id }}">
          <img src="http://img.youtube.com/vi/{{ $video->youtube_id }}/hqdefault.jpg" class="video-thumbnail">
        </a>
        <p> 
          {{
            strlen($video->description) > 35 ? 
            substr($video->description, 0, 35) . "..." : 
            $video->description 
          }}
        </p>
        <p>
          <a href="/videos/{{ $video->id }}"> Watch</a>
        </p>
      </div>
    @endforeach
    <div class="col-md-6">
      {!! $videos->render() !!}
    </div>
  @else
    <div class="col-lg-4 col-md-offset-4">
      <p>
        This category has no videos.
      </p>
    </div>
  @endif
  </div>
@endsection
