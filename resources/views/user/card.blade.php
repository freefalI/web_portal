
<section class="hero is-light">
    <div class="hero-body level">
      <div class="container">
          <h2 class=title>{{$user->name}}</h2>
        <h3 class='subtitle'>@ {{$user->nickname}} </h3>
      </div>
      <div class='level-right'>
        <figure class="image is-96x96">
            <img src="{{ Avatar::create($user->name)->toBase64() }}">
        </figure>
       </div>
    </div>
  </section>

  @if(!auth()->user()->is($user))
    <form action="/users/{{$user->id}}/follow" method="post">
        @csrf
        <button class="button">
            @if( Auth::user()->isFollowing($user))
                Unfollow
            @else
                Follow
            @endif
        </button>
    </form>
  @endif

  <a href="/users/{{$user->id}}/followers">Followers</a>
  <a href="/users/{{$user->id}}/followings">Followings</a>