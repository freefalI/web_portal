@extends('layouts.app')


@section('content')
<h2 class=title>{{$user->name}}</h2>

@ {{$user->nickname}}
<br>



<br>
<h2 class=title>Posts</h2>

@foreach ($posts as $post)
@include('post.card')


@endforeach

@endsection
