@extends('layouts.app')


@section('content')

@include('user.card')


<br>
<h2 class=title>Posts</h2>

@foreach ($posts as $post)
@include('post.card')


@endforeach

@endsection


@section('specific_scripts')

var editors = $('.editor');
$.each(editors, function(a,editor) {
    content=$(editor).html();
    $(editor).html('');
    let quill = new Quill(editor, {
        modules: {
            toolbar: false,
        },
        theme: 'snow',
        readOnly: true
    });   
    
      quill.setContents(JSON.parse(content));
});
@endsection