    
    

    
 
                        
            <div class="column is-one-third">
                <div class="card large">
                    <div class="card-image">
                        <figure class="image">
                            <img src="https://source.unsplash.com/qbtyUQtqJ8k" alt="Image">
                        </figure>
                    </div>  <div class="card-image">
                            <figure class="image">
                                <img src="https://source.unsplash.com/qbtyUQtqJ8k" alt="Image">
                            </figure>
                        </div>
                    <div class="card-content">
                        <div class="media">
                            <div class="media-left">
                                <figure class="image is-96x96">
                                    {{-- <img src="http://www.radfaces.com/images/avatars/alex-mack.jpg" alt="Image"> --}}
                                    <img src="{{ Avatar::create($user->name)->toBase64() }}">
                                </figure>
                            </div>
                            <div class="media-content">
                                <p class="title is-4">{{$user->name}}</p>
                               
                                <p class="subtitle is-5"> @ {{$user->nickname}}</p>
                                {{-- <p class="subtitle is-6">Moderator</p> --}}
                            </div>
                        </div>
                        <div class="content">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum consequatur numquam aliquam tenetur ad amet inventore hic beatae, quas accusantium perferendis sapiente explicabo, corporis totam! Labore reprehenderit beatae magnam animi!
                        </div>
                    </div>

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