@extends('layouts.master')

@section('title')
    Show Note
@endsection

@section('nav-home-link')
    @include('partials.app-nav-links')
@endsection

@section('content')
    <div class="container mt-4">
        @include('partials.validation-errors')

        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="card card-custom">
                    <div class="card-body">
                        <h5 class="card-title">{{ $note->title }}</h5>
                        <p class="card-text">{{ $note->body }}</p>
                        <p class="text-white">
                            Folder:
                            <span class="name_folder_in_note_show">{{ $folder_name }}</span>
                        </p>
                        <p class="text-white">Created At: {{ $note->created_at }}</p>
                    </div>
                </div>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <a href="{{ route('note.edit', $note) }}" class="btn btn-primary me-md-2">Edit</a>

                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Add To Folder
                    </button>
                    <ul class="dropdown-menu">
                        @forelse ($folders as $folder)
                            <li>
                                <form action="{{ route('note.add-to-folder', [$note, $folder]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">{{ $folder->name }}</button>
                                </form>
                            </li>
                        @empty
                            <li><span class="dropdown-item text-muted">No folders yet</span></li>
                        @endforelse
                    </ul>
                </div>

                <form action="{{ route('note.delete', $note) }}" method="POST" onsubmit="return confirm('Delete this note?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection
