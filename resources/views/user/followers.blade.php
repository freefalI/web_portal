@extends('layouts.app')


@section('content')

@include('user.card')


<br>
<h2 class=title>Followers</h2>



<div class="container">
    <div class="section">
        <div class="box">
            <div class="field has-addons">
                <div class="control is-expanded">
                    <input class="input has-text-centered" type="search" placeholder="» » » » » » find me « « « « « «">
                </div>
                <div class="control">
                    <a class="button is-info">Search</a>
                </div>
            </div>
        </div>
        <!-- Developers -->
        <div class="row columns">

            @foreach ($users as $user)
                @include('user.small_card')
            @endforeach
        </div>
        <!-- End Staff -->
    </div>
</div>



@endsection
