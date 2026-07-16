@extends('layouts.master')

@section('title')
    Edit Note
@endsection

@section('nav-home-link')
    @include('partials.app-nav-links')
@endsection

@section('content')
    <div class="container mt-2">
        @include('partials.validation-errors')

        <form method="POST" action="{{ route('note.update', $note) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label text-white">Title</label>
                <input type="text" name="title" class="form-control" id="title" required value="{{ old('title', $note->title) }}">
            </div>
            <div class="mb-3">
                <label for="body" class="form-label text-white">Description</label>
                <textarea name="body" class="form-control" id="body" rows="6" required>{{ old('body', $note->body) }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
