@extends('layouts.app')


@section('content')

    <br>
    <br>
    <form action="/account/update" method="post"  enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        @include ('account.form_layout', ['formMode' => 'create'])

    </form>



@endsection
