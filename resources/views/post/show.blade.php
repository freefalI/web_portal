@extends('layouts.app')


@section("post-comments")
    @guest
        <br>
        <p>Please log in to show comments or to comment.</p>
    @endguest

    @auth
        {{--@if( auth()->user()->isFollowing($post->author) || auth()->user()->isAuthor($post))--}}
        @can('comment', $post)
            <div class="comment-form">
                <form action="/posts/{{$post->id}}/comment" method="post">

                    @method('PATCH')
                    @csrf
                    <div class="columns is-gapless is-mobile">
                        <div class="column is-10">
                            <div class="field">
                                <div class="control">
                                    <input class="input is-medium" type="text" placeholder="Add a comment . . ."
                                           name="comment">
                                </div>
                            </div>
                        </div>
                        {{--<div class="column is-2 button">--}}
                        {{--<div class="field">--}}
                        {{--<div class="control">--}}

                        <button class=' is-medium column is-2 button is-link '
                                type="submit">Comment
                        </button>
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                    </div>


                </form>
            </div>
        @endcan
        {{--{{User::find($comment->commented_id)->name}}--}}
        @foreach($post->comments()->latest()->get() as $key=>$comment)
            <div id="msg-card-{{$key}}" data-preview-id="{{$key}}" class="card">
                <div class="card-content">
                    {{--<div class="msg-header"><span class="msg-from"><small>From: {{$comment->author->name}} </small></span> <span--}}
                    {{--class="msg-timestamp"></span> <span class="msg-attachment"><i--}}
                    {{--class="fa fa-paperclip"></i></span></div>--}}
                    <span class="msg-from"><small> {{$comment->created_at}} </small></span>
                    <div class="msg-subject"><span class="msg-subject"><strong
                                    id="fake-subject-1">{{$comment->author->name}}</strong>
                        @if (auth()->user()->isAuthor($post))
                                <strong class="is-danger subtitle">( Author )</strong>
                            @endif
                        </span>
                    </div>
                    <div class="msg-snippet"><p id="fake-snippet-1">{{$comment->comment}}</p>
                    </div>
                </div>
            </div>
        @endforeach
    @endauth

@endsection

@section('content')
    {{--<h2 class=title>Post</h2>--}}

    {{--
    <div class="modal is-active">
        <div class="modal-background"></div>
        <div class="modal-content">
          <!-- Any other Bulma elements you want -->

        </div>
        <button class="modal-close is-large" aria-label="close">asdfasfd</button>
    </div> --}}

    @include('post.card')


@endsection


@section('specific_scripts')

    <script src="{{ asset('js/render_quill.js') }}"></script>


@endsection