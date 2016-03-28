@extends('layout.default')

@section('content')

  <div class="row" ng-controller="HomeIndexController" ng-init="init({{$user_id}}, '{{csrf_token()}}')">
    <div class="medium-6 medium-centered large-4 large-centered columns">

      <div class="row column">
        <h4 class="text-center">今どんな気分？</h4>

        <div class="floor">

          <div infinite-scroll='seed.nextPage()' infinite-scroll-disabled='seed.busy'>
            <div ng-repeat='item in seed.items'>

              <div class="row">
                <div class="small-4 columns">
                  <small><span am-time-ago="item.updated_at"></span></small>
                </div>
                <div class="fi small-4 columns">
                  <span
                      class="floor_icon button <% getStyle(item.seed_num) %> hollow fontelico-emo-<% getIcon(item.seed_num) %> seed"></span>
                </div>
                <div class="ba small-4 columns">
                  <div class="badge"><% item.seed_count %></div>
                </div>
              </div>

              <div style='clear: both;'></div>
            </div>
            <div ng-show='seed.busy'>Loading data...</div>
          </div>

        </div>

        <div class="button_menu_bg">
          <div class="button_menu">
            <div class="menu">
              <div class="row">
                <div class="small-2 columns">
                  <span class="button alert hollow fontelico-emo-angry seed" ng-click="seedUpdate(1)"></span>
                </div>
                <div class="small-2 columns">
                  <span class="button secondary hollow fontelico-emo-unhappy seed" ng-click="seedUpdate(2)"></span>
                </div>
                <div class="small-2 columns">
                  <span class="button hollow fontelico-emo-tongue seed" ng-click="seedUpdate(3)"></span>
                </div>
                <div class="small-2 columns">
                  <span class="button hollow fontelico-emo-cry seed" ng-click="seedUpdate(4)"></span>
                </div>
                <div class="small-2 columns">
                  <span class="button alert hollow fontelico-emo-devil seed" ng-click="seedUpdate(5)"></span>
                </div>
                <div class="small-2 columns">
                  <span class="button secondary hollow fontelico-emo-displeased seed" ng-click="seedUpdate(6)"></span>
                </div>
              </div>
              <div class="row">
                <div class="small-2 columns">
                  <span class="button warning hollow fontelico-emo-grin seed" ng-click="seedUpdate(7)"></span>
                </div>
                <div class="small-2 columns">
                  <span class="button success hollow fontelico-emo-happy seed" ng-click="seedUpdate(8)"></span>
                </div>
                <div class="small-2 columns">
                  <span class="button warning hollow fontelico-emo-laugh seed" ng-click="seedUpdate(9)"></span>
                </div>
                <div class="small-2 columns">
                  <span class="button secondary hollow fontelico-emo-sleep seed" ng-click="seedUpdate(10)"></span>
                </div>
                <div class="small-2 columns">
                  <span class="button warning hollow fontelico-emo-squint seed" ng-click="seedUpdate(11)"></span>
                </div>
                <div class="small-2 columns">
                  <span class="button success hollow fontelico-emo-surprised seed" ng-click="seedUpdate(12)"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        {{--<span class="button success hollow fontelico-emo-wink"></span>--}}
        {{--<span class="button success hollow fontelico-emo-beer"></span>--}}
        {{--<span class="button success hollow fontelico-emo-coffee"></span>--}}
        {{--<span class="button success hollow fontelico-emo-saint"></span>--}}
        {{--<span class="button success hollow fontelico-emo-sunglasses"></span>--}}
        {{--<span class="button success hollow fontelico-emo-thumbsup"></span>--}}
        {{--<span class="button success hollow fontelico-emo-wink2"></span>--}}

        {{--<a href="/talent/search">探す</a>--}}

      </div>

      {{--<div id="wheelDiv"></div>--}}
    </div>
  </div>

@endsection

@section('js')
  <script src="/js/home/index.js"></script>
@endsection
