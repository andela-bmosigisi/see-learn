@extends('layouts.master')

@section('content')
  @include('partials.navigation')
  <div class="row">
    <div class="col-lg-6 col-md-offset-3">
      @include('partials.alert')
      <div class="well bs-component">
        <form class="form-horizontal" method="POST" action="/videos/add">
          {{ csrf_field() }}
          <fieldset>
            <legend>Add Video</legend>
            <div class="form-group">
              <label for="title" class="col-lg-3 control-label">Title</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" value="{{ old('title') }}" placeholder="title" name="title" required>
              </div>
            </div>
            <div class="form-group">
              <label for="link" class="col-lg-3 control-label">Youtube link</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" placeholder="https://www.youtube.com/watch?v=XpqqjU7u5Yc"
                  name="link" value="{{ old('link') }}" required>
              </div>
            </div>
            <div class="form-group">
              <label for="description" class="col-lg-3 control-label">Description</label>
              <div class="col-lg-9">
                <textarea class="form-control" name="description">{{ old('description') }}</textarea>
              </div>
            </div>
            <!-- Add categories here -->
            <div class="form-group">
              <div class="col-lg-10 col-lg-offset-3">
                <button type="submit" class="btn btn-primary">Add</button>
              </div>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
  </div>

@endsection