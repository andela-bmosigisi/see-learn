@extends('layouts.master')

@section('content')
  @include('partials.navigation')
  @include('partials.alert')
  @include('partials.message')

  if ($categories->count() > 0)
    <table class="table table-striped table-hover ">
    <thead>
      <tr>
        <th>Name</th>
        <th>Description</th>
        <th># of Videos</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </tbody>
    </table>
  @else
    <p>You have added no categories.</p>
@endsection
