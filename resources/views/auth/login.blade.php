@extends('layouts.master')

@section('content')
  @include('partials.navigation')
  @include('partials.alert')
  <div class="row">
    <div class="col-lg-6 col-md-offset-3">
      <div class="well bs-component">
        <form class="form-horizontal" method="POST" action="/login">
          {{ csrf_field() }}
          <fieldset>
            <legend>Login</legend>
            <div class="form-group">
              <label for="inputEmail" class="col-lg-2 control-label">Email</label>
              <div class="col-lg-10">
                <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword" class="col-lg-2 control-label">Password</label>
              <div class="col-lg-10">
                <input type="password" class="form-control" placeholder="Password" name="password">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="remember"> Remember me
                  </label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10 col-lg-offset-2">
                <button type="submit" class="btn btn-primary">Login</button>
              </div>
            </div>
          </fieldset>
        </form>
      </div>
      @include('partials.social')
    </div>
  </div>
@endsection
