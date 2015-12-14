@extends('layouts.master')

@section('content')
  @include('partials.navigation')
  @include('partials.message')
  <div class="row">
    <div class="col-lg-4 col-md-offset-3">
      <p>
        <a href="/categories/add" class="btn btn-primary btn-sm">
          <i class="fa fa-lg fa-plus"></i>
        </a> Add Category
      </p>
    </div>
  </div>
  <div class="row">
    @if ($categories->count() > 0)
    <div class="col-lg-10 col-md-offset-1">
      <table class="table table-striped table-hover ">
      <thead>
        <tr>
          <th>Name</th>
          <th>Description</th>
          <th># of Videos</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($categories as $category)
          <tr>
            <td>{{ $category->name }}</td>
            <td>{{ $category->description }}</td>
            <td>{{ $category->videos->count() }}</td>
            <td>
              <a href="/categories/edit/{{ $category->id }}" class="btn btn-primary btn-xs">Edit</a>
            </td>
          </tr>
        @endforeach
      </tbody>
      </table>
    </div>
    @else
      <div class="col-lg-5 col-sm-offset-4 video-container">
        <p class="centered">You have added no categories.</p>
      </div>
    @endif
  </div>
@endsection
