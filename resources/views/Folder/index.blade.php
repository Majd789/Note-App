@extends('layouts.master')

@section('title')
    folders
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

    {{--Boutton create Folder --}}
    <div class="mt-4 d-flex justify-content-center">
        <a class="btn btn-primary" href="{{route('folder.create')}}">Create Folder</a>
    </div>

    <div class=" p-2 d-flex justify-content-center justify-content-md-start flex-wrap mb-auto mt-4">
           @foreach($folders as $folder)

            <a style=" text-decoration: none;" href="{{route('folder.show', $folder->id)}}">
                <div class="card-custom-folder " style="margin: 5px; width: 18rem;">
{{--                    <img src=" " class="card-img-top" alt="">--}}
                    <div class="card-body">
                        <h5 class="card-title"><span>{{$folder->name}}</span> </h5>
                        <p class="card-text">{{$folder->description}}.</p>
                        <p class="card-created-at"> created at {{$folder->created_at}}</p>
                    </div>
                </div>
            </a>

            @endforeach

    </div>





@endsection
