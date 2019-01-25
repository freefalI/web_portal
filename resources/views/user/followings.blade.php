@extends('layouts.app')


@section('content')

@include('user.card')

<br>
<h2 class=title>Followings</h2>

@foreach ($users as $user)
@include('user.card')


@endforeach

@endsection
