@extends('layouts.master')

@section('title')
    Create Note
@endsection

@section('nav-home-link')
    @include('partials.app-nav-links')
@endsection

@section('content')
    <div class="container mt-2">
        @include('partials.validation-errors')

        <form method="POST" action="{{ route('note.store') }}">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label text-white">Title Note</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}" required>
            </div>
            <div class="mb-3">
                <label for="body" class="form-label text-white">Description</label>
                <textarea name="body" class="form-control" id="body" rows="6" required>{{ old('body') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
