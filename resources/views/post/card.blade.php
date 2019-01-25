

<div class="box post-box" data-post-id={{$post->id}}>
    <article class="media">
    <div class="media-left">
        <figure class="image is-64x64">
        <a href="/users/{{$post->author->id}}">
            {{-- <img src="https://bulma.io/images/placeholders/128x128.png" alt="Image"> --}}
            {{-- <img src="{{ Avatar::create('Joko Widodo')->toBase64() }}" /> --}}
            <img src="{{ Avatar::create($post->author->name)->toBase64() }}" />
            

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
            <small>@ {{$post->author->nickname}} </small> <small>{{$post->created_at}}</small>
            <br>
            {{$post->content}}
            <br>
            <a href='/posts/{{$post->id}}'>See full</a>
            @if(auth()->user()->isAuthor($post))
            <br>

            <a href='/posts/{{$post->id}}/edit'>Edit</a>
            
            @endif
        </p>
        </div>
        <nav class="level is-mobile">
        <div class="level-left">
            <a class="level-item reply-button" aria-label="reply">
            <span class="icon is-small">
                <i class="fas fa-reply" aria-hidden="true"></i>
            </span>
            </a> 
            <span class="level-item reply-count" >
                {{$post->replies}}
            </span>
            {{-- <a class="level-item" aria-label="retweet">
            <span class="icon is-small">
                <i class="fas fa-retweet" aria-hidden="true"></i>
            </span>
            </a> --}}
            <a class="level-item like-button" aria-label="like">
            <span class="icon is-small">
                <i class="fas fa-heart" aria-hidden="true"></i>
            </span>
            </a>
            <span class="level-item like-count" >
                    {{$post->likes}}
            </span>
        </div>
        </nav>
    </div>
    </article>
</div>
