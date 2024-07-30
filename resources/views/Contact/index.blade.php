@extends('layouts.master')

@section('title', 'Contact Us')

@section('content')
    <div class="container mt-5">
        <h1>Contact Us</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('contact.submit') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="text-white form-label">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="text-white form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="subject" class="text-white form-label">Subject</label>
                <input type="text" class="form-control" id="subject" name="subject" required>
            </div>
            <div class="mb-3">
                <label for="message" class="text-white form-label">Message</label>
                <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send Message</button>
        </form>
        <div class="text-white">
        <h2 class="mt-5">Contact Information</h2>
        <p>Email: majdhasanalstef@gmail.com</p>
        <p>Phone: +352681536239</p>
        <p>Address: Syria ,Aleppo , Azaz</p>
        </div>


        <!-- تضمين خريطة الموقع -->
        <div id="map" style="height: 400px; width: 100%;"></div>
        <script>
            function initMap() {
                var location = {lat: -34.397, lng: 150.644};
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 8,
                    center: location
                });
                var marker = new google.maps.Marker({
                    position: location,
                    map: map
                });
            }
        </script>
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap">
        </script>
    </div>
@endsection
