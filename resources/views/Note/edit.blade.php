@extends('layouts.master')

@section('Edit Note')
    Edit Note
@endsection

@section('nav-home-link')

    <ul class="d-flex navbar-nav flex-col me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link text-white "  href="{{route('home')}}">All Notes</a>
        </li>
    </ul>
@endsection

@section('content')


    <div class="container mt-2">
        <form method="post" action="{{route('note.update' ,$note->id)}}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label text-white">{{$note->title}} </label>
                <input type="text" name="title" class="form-control" id="title">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label text-white">Description</label>
                {{--            <input type="text" name="description" class="form-control" id="description">--}}
                <textarea name="description" class="form-control" id="description" rows="6"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>


@endsection
