@extends('layouts.master')

@section('title')
    Folder
@endsection

@section('nav-home-link')
    <ul class="d-flex navbar-nav flex-col me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link text-white "  href="{{route('home')}}">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="{{route('folder.index')}}">Folders</a>
        </li>
    </ul>

@endsection

@section('content')

    {{--card notes--}}
    <div class="container mt-4">
        <div class="row">

            <h1 style="overflow: hidden; word-break: break-word; white-space: pre-wrap;" class="text-white"><span>Folder:</span> {{$folder->name}}</h1>


{{--            <div class="d-grid gap-2 d-md-flex justify-content-md-start">--}}
            <div class="d-flex flex-row justify-content-end">
                <a href="{{route('folder.edit',$folder->id)}}" class="btn btn-primary me-md-2" type="button">Edite</a>
{{--                <div class="dropdown">--}}
{{--                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                        Add To Folder--}}
{{--                    </button>--}}
{{--                    <ul class="dropdown-menu">--}}
{{--                        @foreach($folders as $folder)--}}
{{--                            <li><a class="dropdown-item" href="{{route('add.to.folder', [$note->id ,$folder->id] )}}"> {{$folder->name}}</a></li>--}}
{{--                            --}}{{--                        <li><a class="dropdown-item" href="#">Another action</a></li>--}}
{{--                            --}}{{--                        <li><a class="dropdown-item" href="#">Something else here</a></li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                </div>--}}
                <form action="{{route('folder.delete' ,$folder->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </div>



            @if($notes->isNotEmpty())
                @foreach($notes as $note)
                    <div class="col-md-12 mb-4 mt-3">
                        <a  style=" text-decoration: none;" href="{{route('note.show' , $note->id)}}">
                            <div class="card card-custom">
                                <div class="card-body">
                                    <h5 class="card-title">{{$note->title}}</h5>
                                    <p class="card-text">{{$note->body}} </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            @else
                <div class="d-flex justify-content-center mt-3">
                    <img  src="{{ asset('photos/No-Data.svg') }}" alt="" width="400" height="400" class="img-fluid d-inline-block align-text-top">
                </div>

            @endif


        </div>
    </div>

@endsection
