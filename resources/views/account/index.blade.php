@extends('layouts.app')


@section('content')

<section class="hero is-light">
        <div class="hero-body level">
          <div class="container">
              <h2 class=title>{{$user->name}}</h2>
            <h3 class='subtitle'>@ {{$user->nickname}} </h3>
          </div>
          <div class='level-right'>
            <figure class="image is-128x128">
                <img src="{{ Avatar::create($user->name)->toBase64() }}">
            </figure>
           </div>
        </div>
      </section>
    
<a href="/account/edit">Edit account</a>
@endsection
