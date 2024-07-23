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
                        <a class="nav-link text-white" href="#">Folders</a>
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

{{--            <div class="col-md-12 mb-4">--}}
{{--                <div class="card card-custom">--}}
{{--                    <div class="d-flex  card-header">--}}
{{--                        <h5 class="p-2 flex-grow-1">Go To Doctor </h5>--}}
{{---                        <a class="p-2 icon-fav btn btn-primary" href="#">Create Note</a>--}}
{{--                        <i class="fas fa-star star"></i>--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">--}}
{{--                            <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z"/>--}}
{{--                        </svg>--}}
{{--                        <a class="p-2 btn btn-primary" href="#">Create Note</a>--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <p class="card-text">In Thdfblfb jlfla faslflbflaslf kflaflashflahslfa fjalhflaskglal</p>--}}
{{--                        <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}



    @foreach($notes as $note)

                <div class="col-md-12 mb-4">
                    <a href="{{route('note.show' , $note->id)}}">
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


