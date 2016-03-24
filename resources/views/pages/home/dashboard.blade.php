@extends('layout.default')

@section('content')

  <div class="row" ng-controller="HomeDashboardController" ng-init="init({{$user_id}}, '{{csrf_token()}}')">

    <c3chart bindto-id="chart" chart-data="datapoints" chart-columns="datacolumns" chart-x="datax">
      <chart-axis>
        <chart-axis-x axis-id="x" axis-type="timeseries">
          <chart-axis-x-tick tick-format="%Y-%m-%d"/>
        </chart-axis-x>
      </chart-axis>
    </c3chart>


    <div id="chart"></div>

    <div class="medium-6 medium-centered large-4 large-centered columns">
      dashboard is here.

    </div>
  </div>

@endsection

@section('css')
  <link href='//cdn.jsdelivr.net/c3/0.1.42/c3.css' rel='stylesheet' type='text/css'>
@endsection

@section('js')
  <script src="/js/dashboard.js"></script>
@endsection
