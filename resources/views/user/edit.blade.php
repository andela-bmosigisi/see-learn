@extends('layouts.master')

@section('content')
  @include('partials.navigation')

  <div class="row">
    <div class="col-lg-3 col-sm-offset-5 section-title">
      <h3> Edit Profile </h3>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-3 col-md-offset-2">
      <div id="pic-div">
        <img src="{{ $user->avatar or '/img/avatar.png' }}" class="profile-pic">
      </div>
    </div>
    <div class="col-lg-6">
      @include('partials.alert')
      <form class="form-horizontal" method="POST" action="/user/{{ $user->id }}/update"
        enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="inputFile" class="col-lg-2 control-label file-upload">Avatar </label>
          <div class="input-group col-lg-6">
            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-lg fa-upload"></i></span>
            <input type="file" class="form-control" aria-describedby="sizing-addon2" name="avatar">
          </div>
        </div>
        <div class="form-group">
          <label for="inputName" class="col-lg-2 control-label">Name: </label>
          <div class="col-lg-10">
            <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail" class="col-lg-2 control-label">Email: </label>
          <div class="col-lg-10">
            <input type="email" class="form-control" name="email"
              value="{{ $user->email or 'no email.' }}">
          </div>
        </div>
        <div class="form-group">
          <div class="col-lg-10 col-lg-offset-2">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
