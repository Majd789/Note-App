@extends('layouts.master')

@section('title')
    Favorites
@endsection

@section('nav-home-link')
    @include('partials.app-nav-links')
@endsection

@section('content')
    <div class="container mt-4">
        @include('partials.validation-errors')

        <div class="row">
            @if ($notes->isNotEmpty())
                @foreach ($notes as $note)
                    @include('partials.note-card', ['note' => $note])
                @endforeach
            @else
                <div class="d-flex justify-content-center mt-3">
                    <img src="{{ asset('photos/No-Data.svg') }}" alt="No favorites found" class="img-fluid">
                </div>
            @endif
        </div>
    </div>
@endsection
