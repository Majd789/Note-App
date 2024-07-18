
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/welcome.css')}}">
    <title>Welcome</title>
</head>
<body>
<nav class="navbar">
    <div class="container-fluid">
        <a class=" nav-item navbar-brand fs-5 fw-bold" href="#">
            <img  src="{{ asset('photos/Note-Icone.png') }}" alt="" width="35" height="35" class="d-inline-block align-text-top">
            Note App
        </a>

        @if (Route::has('login'))
            <div class="d-flex ms-auto ">
            @auth
                <a class="btn btn-danger fs-8 fw-bold " href="{{ url('/dashboard') }} "> Dashboard  </a>
            @else
                <a class="btn btn-danger  fs-8 fw-bold " href="{{ route('login') }}" > Log in  </a>

                @if (Route::has('register'))
                    <a class="btn btn-danger fs-8 fw-bold " href="{{ route('register') }}" > Register </a>
                @endif
            @endauth
            </div>
        @endif

    </div>
</nav>

<div class="container mt-5" >
    <div class="row align-items-center">
        <div class="col-12">
            <h1 class="h1-welcome mt-5 ">Welcome to <span>Note App</span></h1>
             <p  class=" paragraph-welcome " >

                    where organizing your thoughts and ideas is effortless.
                    Start your journey to enhanced productivity with our intuitive note-taking platform.
                    Stay focused and organized with Note Web’s user-friendly interface.
                    Explore the simplicity of note-taking redefined for a more productive you.
                    Experience seamless note organization tailored to your needs on Note App.
             </p>
            <h3 class="h1-welcome ">Lets Go</h3>
        </div>
    </div>

    <div class="row align-items-start mt-4">
        <div class="col-md-6">
            <img  src="{{ asset('photos/Note-Body.svg') }}" alt="" width="500" height="500" class="img-fluid d-inline-block align-text-top">
        </div>
    </div>



</div>

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
                    <li><a href="#" class="text-white">Home</a></li>
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
