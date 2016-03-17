@extends('layout.default')

@section('content')
  <div class="row" ng-controller="HomeDashboardController" ng-init="init({{$user_id}}, '{{csrf_token()}}')">
    <div class="medium-6 medium-centered large-4 large-centered columns">
      dashboard is here.

      <div id="chart"></div>

    </div>
  </div>

@endsection

@section('css')
  <link href='//cdn.jsdelivr.net/c3/0.1.42/c3.css' rel='stylesheet' type='text/css'>
@endsection

@section('js')
  <script src="//cdn.jsdelivr.net/d3js/3.5.16/d3.min.js"></script>
  <script src="//cdn.jsdelivr.net/c3/0.1.42/c3.min.js"></script>
  <script src="/js/dashboard.js"></script>
@endsection
