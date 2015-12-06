@extends('layouts.master')

@section('content')
  @include('partials.navigation')

  <div class="row">
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
      <h3>Categories</h3>
      <!-- Loop through categories created by this user -->
    </div>
    <div class="col-lg-3">
      <h3>Latest Uploads</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-3 col-sm-offset-5 section-title">
      <h3> Videos </h3>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-4 video-container">
      <a><h4> Some title </h4></a>
      <a href="">
        <img src="http://img.youtube.com/vi/XpqqjU7u5Yc/hqdefault.jpg" class="video-thumbnail">
      </a>
      <p> Short Description that describes this video</p>
    </div>
    <div class="col-lg-4 video-container">
      <a><h4> Some title </h4></a>
      <a href="">
        <img src="http://img.youtube.com/vi/XpqqjU7u5Yc/hqdefault.jpg" class="video-thumbnail">
      </a>
      <p> Short Description that describes this video and can be multi-line, for all I care. </p>
    </div>
    <div class="col-lg-4 video-container">
      <a><h4> Some title </h4></a>
      <a href="">
        <img src="http://img.youtube.com/vi/XpqqjU7u5Yc/hqdefault.jpg" class="video-thumbnail">
      </a>
      <p> Short Description that describes this video and can be multi-line, for all I care. </p>
    </div>
    <div class="col-lg-4 video-container">
      <a><h4> Some title </h4></a>
      <a href="">
        <img src="http://img.youtube.com/vi/XpqqjU7u5Yc/hqdefault.jpg" class="video-thumbnail">
      </a>
      <p> Short Description that describes this video and can be multi-line, for all I care. </p>
    </div>
    <div class="col-lg-4 video-container">
      <a><h4> Some title </h4></a>
      <a href="">
        <img src="http://img.youtube.com/vi/XpqqjU7u5Yc/hqdefault.jpg" class="video-thumbnail">
      </a>
      <p> Short Description that describes this video and can be multi-line, for all I care. </p>
    </div>
    <div class="col-lg-4 video-container">
      <a><h4> Some title </h4></a>
      <a href="">
        <img src="http://img.youtube.com/vi/XpqqjU7u5Yc/hqdefault.jpg" class="video-thumbnail">
      </a>
      <p> Short Description that describes this video and can be multi-line, for all I care. </p>
    </div>
    <div class="col-lg-4 video-container">
      <a><h4> Some title </h4></a>
      <a href="">
        <img src="http://img.youtube.com/vi/XpqqjU7u5Yc/hqdefault.jpg" class="video-thumbnail">
      </a>
      <p> Short Description that describes this video and can be multi-line, for all I care. </p>
    </div>
    <div class="col-lg-4 video-container">
      <a><h4> Some title </h4></a>
      <a href="">
        <img src="http://img.youtube.com/vi/XpqqjU7u5Yc/hqdefault.jpg" class="video-thumbnail">
      </a>
      <p> Short Description that describes this video and can be multi-line, for all I care. </p>
    </div>
    <div class="col-lg-4 video-container">
      <a><h4> Some title </h4></a>
      <a href="">
        <img src="http://img.youtube.com/vi/XpqqjU7u5Yc/hqdefault.jpg" class="video-thumbnail">
      </a>
      <p> Short Description that describes this video and can be multi-line, for all I care. </p>
    </div>
    <div class="col-lg-4 video-container">
      <a><h4> Some title </h4></a>
      <a href="">
        <img src="http://img.youtube.com/vi/XpqqjU7u5Yc/hqdefault.jpg" class="video-thumbnail">
      </a>
      <p> Short Description that describes this video and can be multi-line, for all I care. </p>
    </div>
  </div>
@endsection