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
                        @if($note->folder_id)
                            @foreach($folders as $folder)
                               @if($folder->id ==$note->folder_id )
                                   <p class="text-white">Folder : <span class="name_folder_in_note_show" >{{$folder->name}}</span></p>
                               @endif
                                @break;
                            @endforeach
                        @endif
                        <p class="text-white">Created At: {{$note->created_at}}</p>
                    </div>
                </div>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <a href="{{route('note.edit',$note->id)}}" class="btn btn-primary me-md-2" type="button">Edite</a>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Add To Folder
                    </button>
                    <ul class="dropdown-menu">
                        @foreach($folders as $folder)
                        <li><a class="dropdown-item" href="{{route('add.to.folder', [$note->id ,$folder->id] )}}">{{$folder->name}}</a></li>
{{--                        <li><a class="dropdown-item" href="#">Another action</a></li>--}}
{{--                        <li><a class="dropdown-item" href="#">Something else here</a></li>--}}
                        @endforeach
                    </ul>
                </div>
                <form action="{{route('note.delete',$note->id)}}" method="post">
                    @csrf
                    @method('delete')
                <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </div>


        </div>
    </div>



@endsection
