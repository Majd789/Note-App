@extends('layouts.master')

@section('title')
    Folder
@endsection

@section('nav-home-link')
    @include('partials.app-nav-links')
@endsection

@section('content')
    <div class="container mt-4">
        @include('partials.validation-errors')

        <div class="row">
            <h1 style="overflow: hidden; word-break: break-word; white-space: pre-wrap;" class="text-white">
                <span>Folder:</span> {{ $folder->name }}
            </h1>

            <div class="d-flex flex-row justify-content-end">
                <a href="{{ route('folder.edit', $folder) }}" class="btn btn-primary me-md-2">Edit</a>
                <form action="{{ route('folder.delete', $folder) }}" method="POST" onsubmit="return confirm('Delete this folder?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </div>

            @if ($notes->isNotEmpty())
                @foreach ($notes as $note)
                    <div class="col-md-12 mb-4 mt-3">
                        <a style="text-decoration: none;" href="{{ route('note.show', $note) }}">
                            <div class="card card-custom">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $note->title }}</h5>
                                    <p class="card-text">{{ \Illuminate\Support\Str::limit($note->body, 200) }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @else
                <div class="d-flex justify-content-center mt-3">
                    <img src="{{ asset('photos/No-Data.svg') }}" alt="No notes in this folder" width="400" height="400" class="img-fluid d-inline-block align-text-top">
                </div>
            @endif
        </div>
    </div>
@endsection
