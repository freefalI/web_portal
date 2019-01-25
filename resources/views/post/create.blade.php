@extends('layouts.app')


@section('content')
<h2 class=title>New Post</h2>



<form action="/posts" method="post">
  @csrf
  @include ('post.form_layout', ['formMode' => 'create'])

</form>
    

@endsection
