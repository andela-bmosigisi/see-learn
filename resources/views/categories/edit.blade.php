@extends('layouts.master')

@section('content')
  @include('partials.navigation')
  @include('partials.alert')
  <div class="col-lg-8 col-md-offset-2">
    <form role="form" action="/categories/update/{{ $category->id }}" method="POST">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="name"> Name: </label>
        <input type="text" class="form-control" name="name" value="{{ $category->name }}" disabled="true">
      </div>
      <div class="form-group">
        <label for="description"> Description: </label>
        <textarea class="form-control" name="description">{{ $category->description }}</textarea>
      </div>
      <button type="submit" class="btn-sm btn-default">Update</button>
    </form>
  </div>
@endsection
