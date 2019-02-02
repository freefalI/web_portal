@extends('layouts.app')


@section('content')

    @include('user.card')

    <h2 class="subtitle">Email: <b>{{$user->email}}</b> </h2>
    <h2 class="subtitle">Profile type: <b>{{$user->account_type}}</b></h2>
    <div class="field">
        <p class="control button is-success">
            <a href="/account/edit">Edit profile</a>
        </p>
    </div>
@endsection
