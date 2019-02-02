@extends('layouts.app')


@section('content')
    <br>
    <h2 class=title>Feed</h2>

    @forelse($posts as $post)

        @include('post.card')


    @empty
        <br>

        <h2 class="subtitle">You haven't followings yet</h2>
    @endforelse
@endsection
    