@extends('layouts.master')

@section('title')
    Home
@endsection

@section('nav-home-link')
    @include('partials.app-nav-links')
@endsection

@section('content')
    <div class="mt-4 d-flex justify-content-center">
        <a class="btn btn-primary" href="{{ route('note.create') }}">Create Note</a>
    </div>

    <div class="container mt-4">
        @include('partials.validation-errors')

        <div class="row">
            @if ($notes->isNotEmpty())
                @foreach ($notes as $note)
                    @include('partials.note-card', ['note' => $note])
                @endforeach
            @else
                <div class="d-flex justify-content-center mt-3">
                    <img src="{{ asset('photos/No-Data.svg') }}" alt="No notes found" class="img-fluid">
                </div>
            @endif
        </div>
    </div>
@endsection
