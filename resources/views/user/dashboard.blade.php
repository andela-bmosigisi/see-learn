@extends('layouts.master')

@section('content')
  @include('partials.navigation')

  <div class="row">
    @include('partials.message')
    <div class="col-lg-3">
      <div id="pic-div">
        <img src="{{ $user->avatar or '/img/avatar.png' }}" class="profile-pic">
      </div>
    </div>
    <div class="col-lg-3">
      <a href="/user/{{ $user->id }}/edit"><h3>Profile</h3></a>
      <p> {{ $user->name }}</p>
      <p> {{ $user->email or 'no email' }} </p>
      <p> Uploads: <span class="large-text">20</span></p>
    </div>
    <div class="col-lg-3">
      <h3>
        Uploads
        <a href="/videos/add" class="btn btn-primary btn-sm">
          <i class="fa fa-lg fa-plus"></i>
        </a>
      </h3>
    </div>
    <div class="col-lg-3">
      <h3>
        Categories 
        <a href="/categories/add" class="btn btn-primary btn-sm">
          <i class="fa fa-lg fa-plus"></i>
        </a>
      </h3>
      <!-- Loop through categories created by this user -->
    </div>
  </div>
  <div class="row">
    <div class="col-lg-3 col-sm-offset-5 section-title">
      <h3> Videos </h3>
    </div>
  </div>
  <div class="row">
    @if ($user->videos->count() > 0)
      @foreach($user->videos as $video)
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
    @else
      <div class="col-lg-5 col-sm-offset-4 video-container">
        <p>
          You are yet to add any videos. Click 
          <a href="/videos/add">here</a> to add your first video.
        </p>
      </div>
    @endif
  </div>

  @include('partials.footer')
@endsection