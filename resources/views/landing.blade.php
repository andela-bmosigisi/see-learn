@extends('layouts.master')

@section('content')
  @include('partials.navigation')
  
  <div class="jumbotron">
    <div class="row">
      <div class="col-lg-4 col-sm-offset-4 landing-title">
        <h1>Learn</h1>
        <p class="lead">
          Start learning with <strong>3</strong> simple steps
          <ul>
            <li><a href="/register">Create</a> an account</li>
            <li>Upload a video</li>
            <li>Get limitless watch time</li>
          </ul>
        </p>
      </div>
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
      <div class="divider"></div>
      <div class="col-md-6">
        {!! $videos->render() !!}
      </div>
    @else

    @endif
  </div>

  @include('partials.footer')
@endsection
