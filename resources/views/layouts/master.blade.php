
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/welcome.css')}}">
    <title>@yield('title')</title>



</head>
<body>


<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class=" nav-item navbar-brand fs-5 fw-bold" href="{{route('home')}}">
            <img  src="{{ asset('photos/Note-Icone.png') }}" alt="" width="35" height="35" class="d-inline-block align-text-top">
            Note App
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

   <div class="collapse navbar-collapse" id="navbarSupportedContent">
        @yield('nav-home-link')

            <div class="d-flex ms-auto ">
                <div class="dropdown ">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <li><a class="dropdown-item " href="{{route('profile.edit')}}">Profile</a></li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <li><a class="dropdown-item" href="{{route('logout')}}"
                                onclick="event.preventDefault();
                                   this.closest('form').submit();">Log Out</a></li>

                        </form>
                    </ul>
                </div>
            </div>
</div>
    </div>
</nav>

</div>





@yield('content')









<footer class="bg-dark text-white mt-5 p-4 text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5>About Us</h5>
                <p>Note App is your go-to platform for organizing your thoughts and ideas effortlessly. Start your journey to enhanced productivity with our intuitive note-taking platform.</p>
            </div>
            <div class="col-md-4">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="{{route('home')}}" class="text-white">Home</a></li>
                    <li><a href="#" class="text-white">Features</a></li>
                    <li><a href="#" class="text-white">Pricing</a></li>
                    <li><a href="#" class="text-white">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5>Follow Us</h5>
                <a href="#" class="text-white me-3"><i class="fab fa-facebook"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-linkedin"></i></a>
            </div>
        </div>
        <div class="mt-3">
            <p>&copy; 2024 Note App.</p>
        </div>
    </div>


</footer>

<!-- Font Awesome for social media icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
