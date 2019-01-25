{{-- <div class="field">
  <label class="label">Name</label>
  <p class="control">
      <input type="text" name="name" id="" class = "input {{$errors->has('name') ? 'is-danger' : ''}}" value="{{ $project->name ?? old('name')}}">
  </p>
</div> --}}
  
  
  <div class="field">
    <label class="label">Content</label>
    <p class="control">
        <textarea name="content" id=""  class = "textarea {{$errors->has('content') ? 'is-danger' : ''}}">{{ $post->content ?? old('content')}}</textarea>
    </p>
  </div>
  <div class="field">
    <p class="control">
        <button type="submit" class="button is-success">Submit</button>
    </p>
  </div>
  