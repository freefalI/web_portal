<section class="hero is-light">
    <div class="hero-body level">
        <div class="">
            <h2 class="title">
                <a href="/users/{{$user->id}}">
                    {{$user->name}}
                </a>

            </h2>
            <h3 class='subtitle'>
                <a href="/users/{{$user->id}}">
                    @ {{$user->nickname}}
                </a>

            </h3>

            <div class="field is-grouped">
                <p class="control">
                    <a href="/users/{{$user->id}}/followers" class="button is-info">Followers</a>
                </p>
                <p class="control">
                    <a href="/users/{{$user->id}}/followings" class="button is-info">Followings</a>
                </p>

                @if(auth()->check() && !auth()->user()->is($user))
                    <div class="control button is-link"
                         onclick="event.preventDefault();document.getElementById('toggle-follow-form').submit();">

                        <form id="toggle-follow-form" action="/users/{{$user->id}}/follow" method="post">
                            @csrf
                            @if( Auth::user()->isFollowing($user))
                                Unfollow
                            @else
                                Follow
                            @endif
                        </form>
                    </div>

                @endif

            </div>
        </div>
        <div class='level-right'>
            <figure class="image is-96x96">
                <a href="/users/{{$user->id}}">
                    <img src="{{$user->getFirstMediaUrl('avatars')}}">

                </a>
            </figure>
        </div>
    </div>
</section>
