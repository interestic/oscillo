@extends('layout.default')

@section('content')

  <div class="row" ng-controller="HomeDashboardController" ng-init="init({{$user_id}}, '{{csrf_token()}}')">

    <c3chart bindto-id="monthly" chart-data="monthly_datapoints" chart-columns="monthly_datacolumns" chart-x="monthly_datax">
      <chart-axis>
        <chart-axis-x axis-id="x" axis-type="timeseries">
          <chart-axis-x-tick tick-format="%Y-%m-%d"/>
        </chart-axis-x>
      </chart-axis>
    </c3chart>


    <c3chart bindto-id="pie-plot1-chart" sort-data="desc">
      <chart-column column-id="Data 1" column-values="70" column-type="pie"/>
      <chart-column column-id="Data 2" column-values="35" column-type="pie"/>
      <chart-column column-id="Data 3" column-values="60" column-type="pie"/>
      <chart-pie expand="true" show-label="true" threshold-label="0.1"/>
    </c3chart>

    <div class="medium-6 medium-centered large-12 large-centered columns">
      ここは真ん中

    </div>
  </div>

@endsection

@section('css')
  <link href='//cdn.jsdelivr.net/c3/0.1.42/c3.css' rel='stylesheet' type='text/css'>
@endsection

@section('js')
  <script src="/js/dashboard.js"></script>
@endsection
