<div class="  post-box" data-post-id={{$post->id}}>
    <section class="articles">
        <div class="column is-10 is-offset-1">
            <div class="card article">
                <div class="card-content">
                    <div class="media">
                        <div class="media-center">
                            {{-- <img
                                src="http://www.radfaces.com/images/avatars/angela-chase.jpg"
                                class="author-image" alt="Placeholder image">
                            --}}
                            <a href="/users/{{$post->author->id}}">
                                <img src="{{$post->author->getFirstMediaUrl('avatars','thumb')}}" class="author-image"
                                     alt="Placeholder image"/>
                            </a>
                        </div>
                        <div class="media-content has-text-centered">
                            <p class="title article-title">Cras tincidunt
                                lobortis feugiat vivamus.</p>
                            <p class="subtitle is-6 article-subtitle">
                                <a href="/users/{{$post->author->id}}">@ {{$post->author->nickname}}</a>
                                <time class="timeago"
                                      datetime="{{$post->created_at->toIso8601String()}}">{{$post->created_at->diffForHumans()}}</time>
                            </p>
                        </div>
                    </div>
                    <div class="content article-body">
                        <div class="editor" hidden>
                            {!!$post->content!!}
                        </div>
                        <br>
                        <div class="field is-grouped">
                            @if ( ! Route::current()->getName() == 'posts.show')
                                <p class="control">
                                    <a href='/posts/{{$post->id}}' class="button is-info is-outlined">See full</a>
                                </p>
                            @endif
                            @can("update",$post)
                                {{-- <br> --}}
                                <p class="control">

                                    <a href='/posts/{{$post->id}}/edit' class="button is-info is-outlined">Edit</a>
                                </p>

                                {{-- <br> --}}

                                <form action='/posts/{{$post->id}}' method=POST>
                                    <p class="control">
                                        @method('DELETE')
                                        @csrf
                                        <button class='button is-link is-outlined'
                                                type="submit">Delete
                                        </button>
                                    </p>
                                </form>

                            @endcan
                        </div>
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
                </div>
            </div>

            @yield("post-comments")
        </div>
    </section>

</div>



@section('specific_styles')
    <style>


        .navbar-brand .brand-text {
            font-size: 1.11rem;
            font-weight: bold;
        }

        /* .hero-body
        {background-image: url(https://upload.wikimedia.org/wikipedia/commons/thumb/f/f6/Plum_trees_Kitano_Tenmangu.jpg/1200px-Plum_trees_Kitano_Tenmangu.jpg);
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        height: 500px;
        } */
        .articles {
            margin: 5rem 0;
            /* margin-top: -200px; */
        }

        .articles .content p {
            line-height: 1.9;
            margin: 15px 0;
        }

        .author-image {
            position: absolute;
            top: -30px;
            left: 50%;
            width: 60px;
            height: 60px;
            margin-left: -30px;
            border: 3px solid #ccc;
            border-radius: 50%;
        }

        /* .media-center {
          display: block;
          margin-bottom: 1rem;
        } */
        /* .media-content {
          margin-top: 3rem;
        } */
        /* .article, .promo-block {
          margin-top: 6rem;
        } */
        div.column.is-8:first-child {
            padding-top: 0;
            margin-top: 0;
        }

        .article-title {
            font-size: 2rem;
            font-weight: lighter;
            line-height: 2;
        }

        .article-subtitle {
            color: #909AA0;
            margin-bottom: 3rem;
        }

        .article-body {
            line-height: 1.4;
            margin: 0 4rem;
        }

        .promo-block .container {
            margin: 1rem 5rem;
        }
    </style>
@endsection