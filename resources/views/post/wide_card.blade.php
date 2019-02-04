<div class="box post-box" data-post-id={{$post->id}}>
    <article class="media">
        <div class="media-left">
            <figure class="image is-64x64">
                <a href="/users/{{$post->author->id}}">
                    {{-- <img
                        src="https://bulma.io/images/placeholders/128x128.png"
                        alt="Image"> --}}
                    {{-- <img src="{{ Avatar::create('Joko Widodo')->toBase64()
                    }}" /> --}}
                    <img src="{{$user->getFirstMediaUrl('avatars')}}">



                </a>
            </figure>
        </div>
        <div class="media-content">
            <div class="content">
                <p>
                    <a href="/users/{{$post->author->id}}">
                        <strong>
                            {{$post->author->name}}
                        </strong>
                    </a>
                    <small>@ {{$post->author->nickname}} </small>
                    <small>
                        <time class="timeago"
                              datetime="{{$post->created_at->toIso8601String()}}">{{$post->created_at->diffForHumans()}}</time>
                    </small>
                    <br>
                {{-- {!!$post->content!!} --}}

                <div class="editor" hidden>
                    {!!$post->content!!}
                </div>

                <br>
                <a href='/posts/{{$post->id}}'>See full</a>
                @if(auth()->check() && auth()->user()->isAuthor($post))
                    <br>
                    <a href='/posts/{{$post->id}}/edit'>Edit</a>
                    <br>
                    <form action='/posts/{{$post->id}}' method=POST>
                        @method('DELETE')
                        @csrf
                        <button class='button is-info' type="submit">Delete</button>
                    </form>
                    @endif
                    </p>
            </div>
            <nav class="level is-mobile">
                <div class="level-left">
                    {{-- <a class="level-item reply-button" aria-label="reply">
                        <span class="icon is-small">
                            <i class="fas fa-reply" aria-hidden="true"></i>
                        </span>
                    </a>
                    <span class="level-item reply-count">
                        block
                    </span> --}}
                    {{-- <a class="level-item" aria-label="retweet">
                        <span class="icon is-small">
                            <i class="fas fa-retweet" aria-hidden="true"></i>
                        </span>
                    </a> --}}

                    <div class="columns is-centered is-marginless">

                        <div class="field is-grouped">
                            <p class="control">
                                <a class="like-button" aria-label="like">
                                                <span class="icon is-small">
                                                    <i class="fas fa-heart"
                                                       aria-hidden="true"></i>
                                                </span>
                                </a>
                            </p>
                            <p class="control">
                                            <span class="like-count">
                                                {{$post->likers()->count()}}
                                            </span>
                            </p>
                        </div>
                    </div>


                </div>
            </nav>
        </div>
    </article>
</div>
        