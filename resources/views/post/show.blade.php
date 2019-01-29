@extends('layouts.app')


@section('content')
<h2 class=title>Post</h2>

{{-- 
<div class="modal is-active">
    <div class="modal-background"></div>
    <div class="modal-content">
      <!-- Any other Bulma elements you want -->
        
    </div>
    <button class="modal-close is-large" aria-label="close">asdfasfd</button>
</div> --}}

@include('post.card')
    

@endsection



@section('specific_scripts')

  <script src="{{ asset('js/render_quill.js') }}"></script>


@endsection