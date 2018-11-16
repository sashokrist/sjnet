@extends('layouts.app')
@section('title')
    SJ NET
    @endsection
@section('content')
    <div class="text-center">
        <div class="col-12">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3>You are logged in!  | Email: {{ Auth::user()->email }}</h3>
                    <h3>Welcome {{  Auth::user()->name  }}</h3>
                </div>
            </div>
        </div>
        <section class="row new-post justify-content-center">
            <div class="col-8">
                <header><h3>What do you have to say?</h3></header>
                <form action="{{ route('post.create') }} " method="post">
                    <div class="form-group">
                        <textarea class="form-control" name="body" id="new-post" rows="8"
                                  placeholder="enter your post here"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Create Post</button>
                    <input type="hidden" value="{{ Session::token() }}" name="_token">
                </form>
            </div>

        </section>
        <section class="row new-post justify-content-center">
            <div class="col-8">
                <header><h3>What other people say?</h3></header>
                <article class="post">
                    <p>This post is submit by laravel default engine and will repeat many many times
                        This post is submit by laravel default engine and will repeat many many times</p>
                    <div class="info">
                        posted by Sasho on 12 Nov 2018
                    </div>
                    <div class="interaction">
                        <a href="#">Like</a>
                        <a href="#">DisLike</a>
                        <a href="#">Edit</a>
                        <a href="#">Delete</a>
                    </div>
                </article>
                <article class="post">
                    <p>This post is submit by laravel default engine and will repeat many many times
                        This post is submit by laravel default engine and will repeat many many times</p>
                    <div class="info">
                        posted by Sasho on 12 Nov 2018
                    </div>
                    <div class="interaction">
                        <a href="#">Like</a>
                        <a href="#">DisLike</a>
                        <a href="#">Edit</a>
                        <a href="#">Delete</a>
                    </div>
                </article>
            </div>

        </section>
    </div>
@endsection