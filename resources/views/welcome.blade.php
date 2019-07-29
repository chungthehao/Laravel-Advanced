@extends('template')

@section('content')
    <h1 class="mt-5">Welcome to Team Pointing!</h1>

    <h3>{{ URL::temporarySignedRoute('activateTeam', now()->addMinutes(1), ['team' => 1]) }}</h3>
@endsection