@extends('layouts.master')

@section('content')
    @include('partials.navigation')

    <p>Welcome, {{ $user->name }}</p>
@endsection