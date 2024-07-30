{{--<x-app-layout>--}}
{{--    <x-slot name="header">--}}
{{--        <h2 class="font-semibold text-xl text-gray-800 leading-tight">--}}
{{--            {{ __('Profile') }}--}}
{{--        </h2>--}}
{{--    </x-slot>--}}

{{--    <div class="py-12">--}}
{{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">--}}
{{--            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">--}}
{{--                <div class="max-w-xl">--}}
{{--                    @include('profile.partials.update-profile-information-form')--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">--}}
{{--                <div class="max-w-xl">--}}
{{--                    @include('profile.partials.update-password-form')--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">--}}
{{--                <div class="max-w-xl">--}}
{{--                    @include('profile.partials.delete-user-form')--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</x-app-layout>--}}


@extends('layouts.master')
@section('title')
    Profile
@endsection

@section('nav-home-link')
    <ul class="d-flex navbar-nav flex-col me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link text-white "  href="{{route('home')}}">Home</a>
        </li>
    </ul>
@endsection
@section('content')

    <div class="container  ">
        <div class="row mt-6 d-flex flex-col justify-content-center " >
        <div class="col mt-2">
            @include('profile.partials.update-profile-information-form')
        </div>

        <div class="col mt-2">
            @include('profile.partials.update-password-form')
        </div>

        <div class="col">
            @include('profile.partials.delete-user-form')
        </div>
        </div>
    </div>







{{--        <div class="py-12">--}}

{{--            Information Update --}}
{{--            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">--}}
{{--                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">--}}
{{--                    <div class="max-w-xl">--}}
{{--                 --}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                password update--}}
{{--                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">--}}
{{--                    <div class="max-w-xl">--}}
{{--                       --}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                delete user--}}
{{--                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">--}}
{{--                    <div class="max-w-xl">--}}
{{--                        --}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}


@endsection
