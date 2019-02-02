@extends('layouts.app')


@section('content')
    <br>

    <h2 class=title>New Post</h2>



    <form id='form' action="/posts/{{$post->id}}" method="post">
        @csrf
        @method('PUT')

        @include ('post.form_layout', ['formMode' => 'create'])

    </form>


@endsection

@section('specific_scripts')

    <script src="{{ asset('js/quill_editor.js') }}"></script>
    <script>
        var content = {!!@$post->content!!};
        quill.setContents(content);
    </script>
@endsection
