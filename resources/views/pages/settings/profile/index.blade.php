<div ng-controller="profileIndexController" ng-init="init({{$user_id}}, '{{csrf_token()}}')">
{{ Form::open(array('url' => '/setting/profile')) }}
avtar
<label for="exampleFileUpload" class="button">Upload File</label>
<input type="file" id="exampleFileUpload" class="show-for-sr">

<div class="row">
  <div class="columns">
    <label>name
      {{Form::text('name', \Illuminate\Support\Facades\Input::old('name'),['placeholder'=>'', 'ng-model'=>'name'])}}
    </label>
  </div>
</div>

<div class="row">
  <div class="columns">
    <label>Email
      {{Form::text('email', \Illuminate\Support\Facades\Input::old('email'),['placeholder'=>'', 'ng-model'=>'email'])}}
    </label>
  </div>
</div>

<div class="row">
  <div class="columns">
    <label>URL
      {{Form::text('url', \Illuminate\Support\Facades\Input::old('url'),['placeholder'=>'', 'ng-model'=>'url'])}}
    </label>
  </div>
</div>

<div class="row">
  <div class="columns">
    <label>Team
      {{Form::text('team', \Illuminate\Support\Facades\Input::old('team'),['placeholder'=>'', 'ng-model'=>'team'])}}
    </label>
  </div>
</div>

<div class="row">
  <div class="columns">
    <label>Location
      {{Form::text('location', \Illuminate\Support\Facades\Input::old('location'),['placeholder'=>'', 'ng-model'=>'location'])}}
    </label>
  </div>
</div>

{{Form::submit('Update Profile', ['class'=>'button']) }}
{{ Form::close() }}
</div>

@section('js')
  <script src="/js/settings/profile.js"></script>
@endsection
