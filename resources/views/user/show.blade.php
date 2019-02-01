@extends('layouts.app')


@section('content')

    @include('user.card')


    {{--<br>--}}
    {{--<h2 class=title>Posts</h2>--}}

    @foreach ($posts as $post)
        @include('post.card')


    @endforeach

@endsection


@section('specific_scripts')

    <script src="{{ asset('js/render_quill.js') }}"></script>

@endsection