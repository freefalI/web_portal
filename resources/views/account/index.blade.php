@extends('layouts.app')


@section('content')

    @include('user.card')

    <h2 class="subtitle">Email</h2>
    <h3 class="subtitle">{{$user->email}}</h3>

    <div class="field">
        <p class="control button is-success">
            <a href="/account/edit">Edit profile</a>
        </p>
    </div>
@endsection
