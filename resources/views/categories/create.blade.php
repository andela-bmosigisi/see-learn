@extends('layouts.master')

@section('content')
  @include('partials.navigation')
  @include('partials.message')
  @include('partials.alert')
  <div class="col-lg-8 col-md-offset-2">
    <form role="form" action="/categories/add" method="POST">
      {{ csrf_field() }}
      <div class="form-group input-group-sm">
        <label for="name"> Name: </label>
        <input type="text" class="form-control" name="name">
      </div>
      <div class="form-group">
        <label for="description"> Description: </label>
        <textarea name="description" class="form-control"></textarea>
      </div>
      <button type="submit" class="btn-sm btn-default">Add</button>
    </form>
  </div>
@endsection
