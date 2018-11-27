@extends('layouts.app')
@section('title')
    SJ NET
    @endsection
@section('content')
@include('includes.message-block')
    <div class="text-center">
        @if(Auth::user())
        <div class="col-12">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="row">
                            <div class="col-sm-2 "> </div>
                            <div class="col-sm-8 text-center">
                                <h3>Welcome {{  Auth::user()->name  }}</h3>
                            </div>
                            <div class="col-sm-2">
                                @if (Storage::disk('local')->has(Auth::user()->name . '-' . Auth::user()->id . '.jpg'))
                                    <section class="row new-post">
                                        <div class="col-md-6 col-md-offset-3">
                                            <img src="{{ route('account.image', ['filename' => Auth::user()->name . '-' . Auth::user()->id . '.jpg']) }}" alt="" class="img-responsive img-profile">
                                        </div>
                                @endif
                            </div>
                    </div>
                        <div class="row">
                            <div class="col-sm-2 "> </div>
                            <div class="col-sm-8 text-center">
                                <h3>You are logged in!  | <i class="far fa-envelope"></i> {{ Auth::user()->email }} |</h3>
                            </div>
                            <div class="col-sm-2 " style="padding-top: 10px;">
                                @if( Auth::user() )
                                    <a class="btn btn-primary" href="{{ route('account') }}"> <i class="far fa-user-circle"></i> Account</a>
                                @endif
                            </div>
                        </div>
                </div>
            </div>
            @else
                <button href="{{ route('login') }}" class="btn btn-danger btn-lg button">Login</button>
            @endif
        </div>
        <section class="row new-post justify-content-center">
            <div class="col-8">
                <header><h3><i class="far fa-comment"></i> What do you have to say?</h3></header>
                <form action="{{ route('post.create') }} " method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <textarea class="form-control" name="body" id="new-post" rows="8"
                                  placeholder="enter your post here"></textarea>

                        <input type="file" name="image" id="image" class="form-control" >
                    </div>
                    <button type="submit" class="btn btn-primary">Create Post</button>
                    <input type="hidden" value="{{ Session::token() }}" name="_token">
                </form>
            </div>

        </section>
        <section class="row new-post justify-content-center">
            <div class="col-8">
                <header><h3><i class="far fa-comment-dots"></i> What other people say?</h3></header>
                <p>number of posts: {{ $posts->count() }}</p>
                @foreach($posts as $post)
                    <article class="post" data-postid="{{ $post->id }}">
                        <div class="row justify-content-center">
                            <div class="col-sm-4">
                                <p> <img src="images/{{ $post->images}}" width="100px;" height="100px;"/> <br></p>
                            </div>
                            <div class="col-sm-8">
                                <p>{{ $post->body }}</p>
                            </div>
                        </div>


                        <div class="info">
                            posted by {{ $post->user->name }} on {{ $post->created_at }}
                        </div>
                        <div class="interaction">
                            <a href="#"><i class="far fa-thumbs-up"></i> Like </a>
                            <a href="#">| <i class="far fa-thumbs-down"></i> DisLike </a>
                            @if(Auth::user() == $post->user)
                                |
                                <a href="" class="btn btn-primary edit"> Edit </a>
                                <a href="{{ route('post.delete', ['post_id' => $post->id]) }}" class="btn btn-danger">Delete</a>
                                @endif
                       {{--data-target="#edit-modal" data-toggle="modal"--}}
                        </div>

                    </article>
                    @endforeach
            </div>
        </section>
        <div class="modal fade" tabindex="-1" role="dialog" id="edit-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Edit Post</h4>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="post-body">Edit the Post</label>
                                <textarea class="form-control" name="post-body" id="post-body" rows="5"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="modal-save">Save changes</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <script>
            var token = '{{ Session::token() }}';
            var urlEdit = '{{ route('edit') }}';
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </div>
@endsection