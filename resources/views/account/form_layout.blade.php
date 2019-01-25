<div class="field">
  <label class="label">Name</label>
  <p class="control">
      <input type="text" name="name" id="" class = "input {{$errors->has('name') ? 'is-danger' : ''}}" value="{{ $user->name ?? old('name')}}">
  </p>
</div>
  

    
  <div class="field">
      <label class="label">Email</label>
      <p class="control">
          <input type="email" name="email" id="" class = "input {{$errors->has('email') ? 'is-danger' : ''}}" value="{{ $user->email ?? old('email')}}">
      </p>
    </div>
      
  <div class="field">
    <p class="control">
        <button type="submit" class="button is-success">Submit</button>
    </p>
  </div>
  