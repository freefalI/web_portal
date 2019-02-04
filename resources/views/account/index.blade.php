@extends('layouts.app')


@section('content')

    @include('user.card')

    <h2 class="subtitle">Email: <b>{{$user->email}}</b></h2>
    <h2 class="subtitle">Profile type: <b>{{$user->account_type}}</b></h2>
    <div class="field">
        <p class="control button is-success">
            <a href="/account/edit">Edit profile</a>
        </p>
    </div>
    @if (auth()->user()->has_avatar)
        <div class="field">
            <form action="account/delete_avatar" method="POST">
                @csrf
                @method("DELETE")
                <button class='button is-danger' type="submit">Delete avatar</button>
            </form>
        </div>
    @endif

@endsection
