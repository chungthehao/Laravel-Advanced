@extends('template')

@section('content')
    <form action="{{ action('Web\TeamController@store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection