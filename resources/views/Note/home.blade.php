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
                        <a class="nav-link text-white" href="{{route('favorite.index')}}">Favorites</a>
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

            @if($notes->isNotEmpty())

    @foreach($notes as $note)

                <div class="col-md-12 mb-4">

                    <div class="d-flex flex-row  card card-custom">
                        <a class="p-2" style=" text-decoration: none;" href="{{route('note.show' , $note->id)}}">
                        <div class="card-body">
                            <h5 class="card-title">{{$note->title}}</h5>
                            <p class="card-text">{{$note->body}} </p>
                        </div>
                        </a>
                        <div class="ms-auto p-2">
                        <a   style=" text-decoration: none;" href="{{route('note.favorite' , $note->id)}}">
                        <i class=" favorite-icon  fa  fa-star favorite-icon" style="color: {{$note->favorite ? 'yellow' : '#9ca3af'}}  "></i>
                        </a>
                        </div>
                    </div>



                </div>

    @endforeach

            @else
                <div class="d-flex justify-content-center mt-3">
                    <img  src="{{ asset('photos/No-Data.svg') }}" alt="Not fond Data"  class="img-fluid">
                </div>
            @endif


        </div>
    </div>
@endsection

{{--<div style="background-color: #2563eb; height: 100px ; width: 100px">--}}
{{--    <i class="fa fa-star favorite-icon" data-id = "{{$note->id}}" style="color: {{$note->favorite ? 'yellow' : 'white'}}"></i>--}}
{{--</div>--}}

@push('script')




@endpush
