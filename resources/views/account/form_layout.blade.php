<h1 class="title">Edit profile</h1>
<div class="field">
    <label class="label">Name</label>
    <p class="control">
        <input type="text" name="name" id="" class="input {{$errors->has('name') ? 'is-danger' : ''}}"
               value="{{ $user->name ?? old('name')}}">
    </p>
    @if ($errors->has('name'))
        <p class="help is-danger">
            {{ $errors->first('name') }}
        </p>
    @endif
</div>

<div class="field">
    <label class="label">Nickname</label>
    <p class="control">
        <input type="text" name="nickname" id="" class="input {{$errors->has('nickname') ? 'is-danger' : ''}}"
               value="{{ $user->nickname ?? old('nickname')}}">
    </p>
    @if ($errors->has('nickname'))
        <p class="help is-danger">
            {{ $errors->first('nickname') }}
        </p>
    @endif
</div>

<div class="field">
    <label class="label">Email (change is not available yet)</label>
    <p class="control">
        <input readonly type="email" name="email" id="" class="input {{$errors->has('email') ? 'is-danger' : ''}}"
               value="{{ $user->email ?? old('email')}}">
    </p>
    @if ($errors->has('email'))
        <p class="help is-danger">
            {{ $errors->first('email') }}
        </p>
    @endif
</div>

<div class="field">
    <label class="label">Account type</label>
    {{--<p class="control">--}}
        {{--<input  type="checkbox" name="account_type" id="" class=" {{$errors->has('account_type') ? 'is-danger' : ''}}"--}}
               {{--value="{{ $user->account_type ?? old('account_type')}}" @if ($user->account_type=="private") 'checked' @endif>--}}
    {{--</p>--}}
    {{--@if ($errors->has('account_type'))--}}
        {{--<p class="help is-danger">--}}
            {{--{{ $errors->first('account_type') }}--}}
        {{--</p>--}}
    {{--@endif--}}

    <div class="control">
        <label class="radio">
            <input type="radio" name="account_type" value="public" @if ($user->account_type=="public") checked @endif>
            Public

        </label>
        <br>
        <label class="radio">
            <input type="radio" name="account_type" value="private" @if ($user->account_type=="private") checked @endif>
            Private

        </label>
    </div>
</div>


<div class="field">
    <p class="control">
        <button type="submit" class="button is-success">Submit</button>
    </p>
</div>
  