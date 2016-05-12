@extends('layout.default')

@section('content')

  <div class="row collapse">
    <div class="medium-3 columns">
      <ul class="tabs vertical" id="example-vert-tabs" data-tabs>
        <li class="tabs-title is-active"><a href="#panel1v" aria-selected="true">プロフィール</a></li>
        <li class="tabs-title"><a href="#panel2v">アカウント</a></li>
        <li class="tabs-title"><a href="#panel3v">ソーシャル</a></li>
      </ul>
    </div>
    <div class="medium-9 columns">
      <div class="tabs-content vertical" data-tabs-content="example-vert-tabs">
        <div class="tabs-panel is-active" id="panel1v">
          @include('pages.settings.profile.index')
        </div>
        <div class="tabs-panel" id="panel2v">
          @include('pages.settings.profile.admin')
        </div>
        <div class="tabs-panel" id="panel3v">
          @include('pages.settings.profile.social')
        </div>
      </div>
    </div>
  </div>
@endsection