<div class="column is-one-third user-small-card">
    <div class="card large">
        <div class="card-image">
            <figure class="image">
                <img src="https://source.unsplash.com/qbtyUQtqJ8k" alt="Image">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-left">
                    <figure class="image is-96x96">
                        {{-- <img src="http://www.radfaces.com/images/avatars/alex-mack.jpg" alt="Image"> --}}
                        <a href="/users/{{$user->id}}">
                            <img src="{{ Avatar::create($user->name)->toBase64() }}">
                        </a>
                    </figure>
                </div>
                <div class="media-content">
                    <a href="/users/{{$user->id}}">
                        <p class="title is-4" id="user-name">
                        {{$user->name}}
                        </p>
                    </a>

                    <p class="subtitle is-5"> @ {{$user->nickname}}</p>
                    {{-- <p class="subtitle is-6">Moderator</p> --}}
                </div>
            </div>
            <div class="content">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum consequatur numquam aliquam tenetur ad
                amet inventore hic beatae, quas accusantium perferendis sapiente explicabo, corporis totam! Labore
                reprehenderit beatae magnam animi!
            </div>


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

    </div>
</div>







@section('specific_styles')
    <style>

        body {
            /* background: #041221; */
        }

        .card {
            overflow: hidden
        }

        .card.large {
            /* height: 600px; */
            -webkit-backface-visibility: hidden;
            backface-visibility: initial;
            border-radius: 5px;
        }

        .media-content {
            overflow: hidden;
        }

        .title.no-padding {
            margin-bottom: 0 !important;
        }


        .fa {
            color: lemonchiffon;
            margin: 10px
        }
    </style>
@endsection