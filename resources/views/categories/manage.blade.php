@extends('layouts.master')

@section('content')
  @include('partials.navigation')
  @include('partials.alert')
  @include('partials.message')
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
              <button class="btn btn-primary btn-xs">Edit</button>
              <a href="/categories/delete/{{ $category->id }}" class="btn btn-primary btn-xs">Delete</a>
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
