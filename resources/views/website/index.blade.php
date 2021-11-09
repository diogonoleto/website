@extends('layouts.default')
@section('content')
<nav class="navbar fixed-top navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"></a>
        <form class="d-flex">
            <a class="btn btn-outline-success" href="{{ route('website.create') }}">ADD</a>
        </form>
    </div>
</nav>
<table class="table" style="margin-top:54px">
    <thead>
        <tr>
            <th scope="col" class="text-center">#</th>
            <th scope="col">website</th>
            <th scope="col">status</th>
            <th scope="col" class="text-center">action</th>
        </tr>
    </thead>
    <tbody>
        @foreach( $website as $w)
        <tr>
            <th scope="row" class="text-center">{{ $w->id }}</th>
            <td>{{ $w->url }}</td>
            <td>{{ $w->status }}</td>
            <td scope="row" class="text-center">
                <a href="{{ route('website.show', $w->id) }}" class="btn btn-outline-info">SHOW</a>
                <a href="{{ route('website.edit', $w->id) }}" class="btn btn-outline-success">EDIT</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection