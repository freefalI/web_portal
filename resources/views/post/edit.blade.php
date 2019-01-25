@extends('layouts.app')


@section('content')
<h2 class=title>New Post</h2>



<form action="/posts/{{$post->id}}" method="post">
  @csrf
  @method('PUT')

  @include ('post.form_layout', ['formMode' => 'create'])

</form>
    

@endsection
