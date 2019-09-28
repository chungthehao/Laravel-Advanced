@extends('template')

@section('content')
    <form action="{{ action('Web\TeamController@store') }}" method="post">
        @csrf
        @inputtextbox('title')
        <button type="submit" class="btn btn-primary">Create</button>
    </form>

    <p>Team {{ $points }}</p>
@endsection