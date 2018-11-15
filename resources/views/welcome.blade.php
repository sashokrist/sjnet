@extends('layouts.app')

@section('title')
    SJ NET
    @endsection
@section('content')
    <body>
        <div class="flex-center text-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a class="btn btn-primary" href="{{ url('/profile') }}">Dashboard</a>
                    @else
                        <a class="btn btn-primary" href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a class="btn btn-primary" href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="content">
            </div>
        </div>
    </body>
    @endsection
