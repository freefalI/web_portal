@extends('layouts.app')


@section('content')

    @include('user.card')


    <div class="container">
        <div class="section">
            <h2 class=title>Followings</h2>
            <br>
            @if ($users->isEmpty())
                <p>User doesn`t have any followings</p>

            @else
                <div class="box">
                    <div class="field has-addons">
                        <div class="control is-expanded">
                            <input id="search_input" class="input has-text-centered" type="search"
                                   placeholder="» » » » » » find me « « « « « «">
                        </div>
                        <div id="search-button" class="control">
                            <a class="button is-info">Search</a>
                        </div>
                    </div>
                </div>
                    <div  id="search_results" class="row columns is-multiline">

                        @foreach ($users as $user)
                            @include('user.small_card')
                        @endforeach
                    </div>
            @endif
        </div>
    </div>
@endsection


@section('specific_scripts')
    <script type="text/javascript">
        $(()=> {
            $('#search-button').on('click', function () {
                var input = $(this).parent().find('#search_input').val();
                input = input.trim();

                if (input === "") {
                    $('#search_results').children().show();
                } else {
                    var  filter, txtValue;
                    filter = input.toUpperCase();
                    var items = $('#search_results').children();

                    for (let i = 0; i < items.length; i++) {
                        txtValue = $(items[i]).find("#user-name").text();

                        if (txtValue.toUpperCase().indexOf(filter) > -1)
                        {
                            $(items[i]).show();//(()=>{$(items[i]).slideUp(1000)});
                        } else {
                            $(items[i]).hide();//(()=>{$(items[i]).slideToggle(1000)});
                        }
                    }
                }
            });
        });
    </script>
@endsection

