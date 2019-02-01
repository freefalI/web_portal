@extends('layouts.app')


@section('content')
    <h2 class=title>New Post</h2>



    <form id='form' action="/posts" method=POST>
        @csrf
        @include ('post.form_layout', ['formMode' => 'create'])

    </form>
@endsection

@section('specific_scripts')

    <script src="{{ asset('js/quill_editor.js') }}"></script>

@endsection
