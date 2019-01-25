@extends('layouts.app')


@section('content')

<form action="/account/update" method="post">
    @csrf
    @method('PATCH')
  
    @include ('account.form_layout', ['formMode' => 'create'])
  
  </form>



@endsection
