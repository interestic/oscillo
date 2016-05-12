{{ Form::open(array('url' => '/setting/profile')) }}
avtar
<label for="exampleFileUpload" class="button">Upload File</label>
<input type="file" id="exampleFileUpload" class="show-for-sr">

<div class="row">
  <div class="columns">
    <label>name
      {{Form::text('name', \Illuminate\Support\Facades\Input::old('name'),['placeholder'=>''])}}
    </label>
  </div>
</div>

<div class="row">
  <div class="columns">
    <label>Email
      {{Form::text('email', \Illuminate\Support\Facades\Input::old('email'),['placeholder'=>''])}}
    </label>
  </div>
</div>

<div class="row">
  <div class="columns">
    <label>URL
      {{Form::text('url', \Illuminate\Support\Facades\Input::old('url'),['placeholder'=>''])}}
    </label>
  </div>
</div>

<div class="row">
  <div class="columns">
    <label>Team
      {{Form::text('team', \Illuminate\Support\Facades\Input::old('team'),['placeholder'=>''])}}
    </label>
  </div>
</div>

<div class="row">
  <div class="columns">
    <label>Location
      {{Form::text('location', \Illuminate\Support\Facades\Input::old('location'),['placeholder'=>''])}}
    </label>
  </div>
</div>

{{Form::submit('Update Profile', ['class'=>'button']) }}
{{ Form::close() }}