@extends('layouts.master')

@section('content')
  @include('partials.navigation')
  @include('partials.message')

  <div class="jumbotron">
    <div class="row">
      <div class="col-lg-4 col-sm-offset-4 landing-title">
        <h1>Learn</h1>
        <div class="lead">
          Start learning with <strong>3</strong> simple steps
          <p class="sub">Signup &bull;
          Upload &bull;
          Watch</p>
          <a href="/login" class="btn btn-warning">Get Started</a>
        </div>
      </div>
    </div>
  </div>

  @if ($categories->count() > 0)
  <div class="row category-area">
    <h3>Categories</h3>
    @foreach ($categories as $category)
      <a href="/categories/{{ $category->id }}">
      <div class="col-lg-2 category">
        <p>
          {{ $category->name }}
        </p>
      </div>
      </a>
    @endforeach
  </div>
  @endif

  <div class="row">
    @if (!is_null($videos))
      @foreach($videos as $video)
        <div class="col-lg-4 video-container">
          <a href="/videos/{{ $video->id }}"><h4> {{ $video->title }} </h4></a>
          <small>Category: 
            <a href="/categories/{{ $video->category->id }}">{{ $video->category->name }}</a>
          </small>
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
          No videos have been added yet.
          <a href="/videos/add">Create</a> one now.
        </p>
      </div>
    @endif
  </div>
@endsection
