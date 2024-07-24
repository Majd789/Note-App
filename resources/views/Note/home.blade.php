@extends('layouts.master')

@section('title')
    Home
@endsection

@section('nav-home-link')




                <ul class="d-flex navbar-nav flex-col me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white "  href="{{route('home')}}">All Notes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{route('folder.index')}}">Folders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Favorites</a>
                    </li>
                </ul>



@endsection



@section('content')
{{--Boutton create --}}
    <div class="mt-4 d-flex justify-content-center">
        <a class="btn btn-primary" href="{{route('note.create')}}">Create Note</a>
    </div>
{{--card notes--}}
    <div class="container mt-4">
        <div class="row">


    @foreach($notes as $note)

                <div class="col-md-12 mb-4">
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



        </div>
    </div>
@endsection


