@extends('layouts.default')
@section('content')
<div class="container">
    <div class="row justify-content-md-center align-items-center" style="height:100vh;">
        <div class="col-12 col-sm-6">
            <div class="card p-0">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">URL: {{ $website->url }}</li>
                    <li class="list-group-item">STATUS: {{ $website->status }}</li>
                    <li class="list-group-item">CREATED AT: {{ $website->created_at }}</li>
                </ul>
                <hr class=" m-0">
                <div class="p-2">
                    <form method="POST" action="{{ route('website.destroy', $website->id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="float-end btn btn-danger ms-2" type="submit"><i></i>Delete</button>
                    </form>
                    <a href="{{ route('website.index') }}" class="float-end btn btn-outline-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection