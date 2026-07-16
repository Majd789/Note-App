@extends('layouts.master')

@section('title', 'Contact Us')

@section('nav-home-link')
    @include('partials.app-nav-links')
@endsection

@section('content')
    <div class="container mt-5">
        <h1 class="text-white">Contact Us</h1>

        @include('partials.validation-errors')

        <form action="{{ route('contact.submit') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="text-white form-label">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="text-white form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
            </div>
            <div class="mb-3">
                <label for="subject" class="text-white form-label">Subject</label>
                <input type="text" class="form-control" id="subject" name="subject" value="{{ old('subject') }}" required>
            </div>
            <div class="mb-3">
                <label for="message" class="text-white form-label">Message</label>
                <textarea class="form-control" id="message" name="message" rows="4" required>{{ old('message') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send Message</button>
        </form>

        <div class="text-white">
            <h2 class="mt-5">Contact Information</h2>
            <p>Email: {{ config('mail.contact_address') }}</p>
        </div>
    </div>
@endsection
