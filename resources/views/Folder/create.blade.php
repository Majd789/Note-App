@extends('layouts.master')

@section('title')
    Create Folder
@endsection

@section('nav-home-link')
    @include('partials.app-nav-links')
@endsection

@section('content')
    <div class="container mt-2">
        @include('partials.validation-errors')

        <form method="POST" action="{{ route('folder.store') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label text-white">Folder Name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label text-white">Description</label>
                <textarea name="description" class="form-control" id="description" rows="6">{{ old('description') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
