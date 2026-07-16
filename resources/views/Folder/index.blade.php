@extends('layouts.master')

@section('title')
    Folders
@endsection

@section('nav-home-link')
    @include('partials.app-nav-links')
@endsection

@section('content')
    <div class="mt-4 d-flex justify-content-center">
        <a class="btn btn-primary" href="{{ route('folder.create') }}">Create Folder</a>
    </div>

    <div class="container mt-4">
        @include('partials.validation-errors')
    </div>

    @if ($folders->isNotEmpty())
        <div class="p-2 d-flex justify-content-center justify-content-md-start flex-wrap mb-auto mt-4">
            @foreach ($folders as $folder)
                <a style="text-decoration: none;" href="{{ route('folder.show', $folder) }}">
                    <div class="card-custom-folder" style="margin: 5px; width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"><span>{{ $folder->name }}</span></h5>
                            <p class="card-text">{{ $folder->description }}</p>
                            <p class="card-created-at">Created at: {{ $folder->created_at }}</p>
                            <p class="card-created-at">Notes: {{ $folder->notes_count }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    @else
        <div class="d-flex justify-content-center mt-3">
            <img src="{{ asset('photos/No-Folder.svg') }}" alt="No folders found" class="img-fluid">
        </div>
    @endif
@endsection
