@extends('layouts.master')

@section('Edit Note')
    Edit Folder
@endsection

@section('nav-home-link')

    <ul class="d-flex navbar-nav flex-col me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link text-white "  href="{{route('folder.index')}}">Folders</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white "  href="{{route('home')}}">Home</a>
        </li>
    </ul>
@endsection

@section('content')


    <div class="container mt-2">
        <form method="post" action="{{route('folder.update',$folder->id)}}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label text-white"> Folder Name </label>
                <input type="text" name="name" class="form-control" id="name" required value="{{$folder->name}}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label text-white">Folder Description</label>
                {{--            <input type="text" name="description" class="form-control" id="description">--}}
                <textarea name="description" class="form-control" id="description" rows="6" required > {{$folder->description}}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>


@endsection
