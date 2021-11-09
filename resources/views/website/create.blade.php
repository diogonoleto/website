@extends('layouts.default')
@section('content')
<div class="container">
    <form method="POST" action="{{ route('website.store') }}" class="row justify-content-md-center align-items-center" style="height:100vh;">
        @csrf
        <div class="col-12 col-sm-6">
            <div class="card p-4">
                <div class="form-group mb-2">
                    <label for="url">URL<span>*</span></label>
                    <input type="text" id="url" name="url" class="form-control @error('url') is-invalid @enderror" maxlength="255" required placeholder="http://teste.com" value="{{ old('url') }}" autocomplete="off">
                    @error('url')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <button class="float-end btn btn-success ms-2" type="submit">Save</button>
                    <a href="{{ route('website.index') }}" class="float-end btn btn-outline-secondary mr-2">Cancel</a>
                </div>
            </div>
        </div>

    </form>
</div>
@endsection