@extends('layouts.master')

@section('title')
    Edit Folder
@endsection

@section('nav-home-link')
    @include('partials.app-nav-links')
@endsection

@section('content')
    <div class="container mt-2">
        @include('partials.validation-errors')

        <form method="POST" action="{{ route('folder.update', $folder) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label text-white">Folder Name</label>
                <input type="text" name="name" class="form-control" id="name" required value="{{ old('name', $folder->name) }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label text-white">Folder Description</label>
                <textarea name="description" class="form-control" id="description" rows="6" required>{{ old('description', $folder->description) }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
