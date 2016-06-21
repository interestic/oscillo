<div ng-controller="profileIndexController" ng-init="init({{$user_id}}, '{{csrf_token()}}')">

  <div class="alert callout" data-closable ng-show="update_error">
    <h5>Update fail!</h5>
    <p class="error_msg" ng-repeat="(key,error) in errors"><%key%>:<%error[0]%></p>
    <button class="close-button" aria-label="Dismiss alert" type="button" ng-click="update_default()" data-close>
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

  <div class="success callout" data-closable ng-show="update_success">
    <h5>update</h5>
    <p>successful</p>
    <button class="close-button" aria-label="Dismiss alert" type="button" ng-click="update_default()" data-close>
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

  {{ Form::open(array('url' => '')) }}
  avtar
  <label for="exampleFileUpload" class="button">Upload File</label>
  <input type="file" id="exampleFileUpload" class="show-for-sr">

  <hr>
  <div class="row">
    <div class="columns">
      <label>Name
        <div class="input-group">
          {{Form::text(
          'name', \Illuminate\Support\Facades\Input::old('name'),
          ['placeholder'=>'','class'=>"input-group-field", 'ng-model'=>'profile.name']
          )
          }}
          <div class="input-group-button">
            <input type="button" ng-click='update_name()' class="button" value="Update">
          </div>
        </div>
      </label>
    </div>
  </div>

  <hr>

  <div class="row">
    <div class="columns">
      <label>Email
        <div class="input-group">
          {{Form::text(
          'email', \Illuminate\Support\Facades\Input::old('email'),
          ['placeholder'=>'','class'=>"input-group-field", 'ng-model'=>'profile.email']
          )
          }}
          <div class="input-group-button">
            <input type="button" ng-click='update_email()' class="button" value="Update">
          </div>
        </div>
      </label>
    </div>
  </div>

  <hr>
  <div class="row">
    <div class="columns">
      <label>URL
        {{Form::text('url', \Illuminate\Support\Facades\Input::old('url'),['placeholder'=>'', 'ng-model'=>'profile.url'])}}
      </label>
    </div>
  </div>

  <div class="row">
    <div class="columns">
      <label>Team
        {{Form::text('team', \Illuminate\Support\Facades\Input::old('team'),['placeholder'=>'', 'ng-model'=>'profile.team'])}}
      </label>
    </div>
  </div>

  <div class="row">
    <div class="columns">
      <label>Location
        {{Form::text('location', \Illuminate\Support\Facades\Input::old('location'),['placeholder'=>'', 'ng-model'=>'profile.location'])}}
      </label>
    </div>
  </div>

  {{Form::button('Update Profile', ['class'=>'button', 'ng-click'=>'update_profile()']) }}
  {{ Form::close() }}
</div>

@section('js')
  <script src="/js/settings/profile.js"></script>
@endsection
