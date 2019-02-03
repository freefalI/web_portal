@extends('layouts.app')


@section('content')

    {{--@include('user.card')--}}


    <div class="container">
        <div class="section">
            <h2 class=title>Search user</h2>
            <br>
            {{--@if (@$users->isEmpty())--}}
            {{--<p>User doesn`t have any followings</p>--}}

            {{--@else--}}
            <div class="box">
                <div class="field has-addons">
                    <div class="control is-expanded">
                        <input id="search_input" class="input has-text-centered" type="search"
                               placeholder="» » » » » » find me « « « « « «">
                    </div>
                    <div  id="search-button" class="control">
                        <a  class="button is-info ">Search</a>
                    </div>
                </div>
            </div>
            <!-- Developers -->
            <div id="search_results" class="row columns is-multiline">
                {{--@foreach ($users as $user)--}}
                {{--@include('user.small_card')--}}
                {{--@endforeach--}}
            </div>
            <!-- End Staff -->
            {{--@endif--}}
        </div>
    </div>
@endsection

@section('specific_scripts')
    <script type="text/javascript">
        $(()=> {
            $('#search-button').on('click', function () {
                $value = $(this).parent().find('#search_input').val();
                console.log($value);
                if ($value.trim() === "") {
                    $('#search_results').html('');
                } else {
                    $.ajax({
                        type: 'get',
                        url: 'search.ajax',
                        data: {'search': $value},
                        success: function (data) {
                            users = data;
                            output = '';
                            users.forEach(function (user) {
                                // console.log($user);
                                // output += '<tr>' +
                                //     '<td>' + $user.id + '</td>' +
                                //     '<td>' + $user.name + '</td>' +
                                //     '<td>' + $user.nickname + '</td>' +
                                //     '</tr>';
                                // output+=`<p>${user.name}(${user.nickname})`;
                                output +=

                                    `<div class="column is-one-third">
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
                                        <a href="/users/${user.id}">
                            {{--<img src="{{ Avatar::create($user->name)->toBase64() }}">--}}
                                        </a>
                                    </figure>
                                </div>
                                <div class="media-content">
                                    <a href="/users/${user.id}">
                        <p class="title is-4">
                        ${user.name}
                        </p>
                    </a>

                    <p class="subtitle is-5"> @ ${user.nickname}</p>
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
                          <a href="/users/${user.id}" class="button is-info">See profile</a>
                </p>

                 {{--<p class="control">
                    <a href="/users/${user.id}/followers" class="button is-info">Followers</a>
                </p>
                <p class="control">
                    <a href="/users/${user.id}/followings" class="button is-info">Followings</a>
                </p>--}}

                                            {{--@if(auth()->check() && !auth()->user()->is(user))--}}
                                            {{--<div class="control button is-link"--}}
                                            {{--onclick="event.preventDefault();document.getElementById('toggle-follow-form').submit();">--}}

                                            {{--<form id="toggle-follow-form" action="/users/${user.id}/follow" method="post">--}}
                                            {{--@csrf--}}
                                            {{--@if( Auth::user()->isFollowing($user))--}}
                                            {{--Unfollow--}}
                                            {{--@else--}}
                                            {{--Follow--}}
                                            {{--@endif--}}
                                            {{--</form>--}}
                                            {{--</div>--}}
                                            {{----}}
                                            {{--@endif--}}

                                        </div>
                                    </div>

                                </div>
                            </div>`;
                            });
                            $('#search_results').html(output);
                        }
                    });
                }
            });
        });
    </script>
    <script type="text/javascript">
        $.ajaxSetup({headers: {'csrftoken': '{{ csrf_token() }}'}});
    </script>
@endsection