@extends('layouts.master')

@section('title')
  show Note
@endsection
@section('nav-home-link')




    <ul class="d-flex navbar-nav flex-col me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link text-white "  href="{{route('home')}}">All Notes</a>
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


    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="card card-custom">
                    <div class="card-body">
                     <h5 class="card-title">{{$note->title}}</h5>
                     <p class="card-text">{{$note->body}} </p>
                    </div>
                </div>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <a href="{{route('note.edit',$note->id)}}" class="btn btn-primary me-md-2" type="button">Edite</a>
                <button class="btn btn-primary" type="button">Button</button>
            </div>


        </div>
    </div>



@endsection
