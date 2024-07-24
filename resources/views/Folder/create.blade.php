@extends('layouts.master')

@section('title')
    Create Folder
@endsection


@section('nav-home-link')




    <ul class="d-flex navbar-nav flex-col me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link text-white "  href="{{route('home')}}">Home</a>
        </li>
        {{--        <li class="nav-item">--}}
        {{--            <a class="nav-link text-white" href="#">Folders</a>--}}
        {{--        </li>--}}
        {{--        <li class="nav-item">--}}
        {{--            <a class="nav-link text-white" href="#">Favorites</a>--}}
        {{--        </li>--}}
    </ul>



@endsection


@section('content')


    <div class="container mt-2">
        <form method="post" action="{{route('folder.store')}}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label text-white"> Folder Name </label>
                <input type="text" name="name" class="form-control" id="name">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label text-white">Description</label>
{{--                            <input type="text" name="description" class="form-control" id="description">--}}
                <textarea name="description" class="form-control" id="description" rows="6"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


@endsection
