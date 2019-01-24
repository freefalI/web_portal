

<div class="box">
    <article class="media">
    <div class="media-left">
        <figure class="image is-64x64">
        <a href="/users/{{$post->author->id}}">
            <img src="https://bulma.io/images/placeholders/128x128.png" alt="Image">
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
        </p>
        </div>
        <nav class="level is-mobile">
        <div class="level-left">
            <a class="level-item" aria-label="reply">
            <span class="icon is-small">
                <i class="fas fa-reply" aria-hidden="true"></i>
            </span>
            </a>
            <a class="level-item" aria-label="retweet">
            <span class="icon is-small">
                <i class="fas fa-retweet" aria-hidden="true"></i>
            </span>
            </a>
            <a class="level-item" aria-label="like">
            <span class="icon is-small">
                <i class="fas fa-heart" aria-hidden="true"></i>
            </span>
            </a>
        </div>
        </nav>
    </div>
    </article>
</div>
