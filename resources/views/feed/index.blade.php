@extends('layouts.app')


@section('content')
<h2 class=title>Feed</h2>

@foreach ($posts as $post)

@include('post.card')

    

@endforeach
@endsection
    