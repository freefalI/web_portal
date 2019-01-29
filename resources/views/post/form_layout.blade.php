{{-- <div class="field">
  <label class="label">Name</label>
  <p class="control">
      <input type="text" name="name" id="" class = "input {{$errors->has('name') ? 'is-danger' : ''}}" value="{{ $project->name ?? old('name')}}">
  </p>
</div> --}}
  
  
  {{-- <div class="field">
    <label class="label">Content</label>
    <p class="control">
        <textarea name="content" id=""  class = "textarea {{$errors->has('content') ? 'is-danger' : ''}}">{{ $post->content ?? old('content')}}</textarea>
    </p>
  </div> --}}
  {{-- <div class="field">
    <p class="control">
        <button type="submit" class="button is-success">Submit</button>
    </p>
  </div> --}}
  

  <div class="field">
    <p class="control">
      <div id="editor" style="min-height: 200px;">
       
      </div>

    </p>
  </div>

  <div class="field">
    <p class="control">

      <button type="button" class="button is-success" id="submit-form-button">Submit</button>
    </p>
  </div>
  <input type="hidden" name="content">
