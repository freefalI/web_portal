@extends('layouts.app')


@section('content')

    <br>
    <br>
    <form action="/account/update" method="post">
        @csrf
        @method('PATCH')

        @include ('account.form_layout', ['formMode' => 'create'])

    </form>



@endsection
