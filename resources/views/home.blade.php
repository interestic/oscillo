@extends('layout.default')

@section('content')

  <div class="row" ng-controller="HomeController" ng-init="initId({{$user_id}})">
    <div class="medium-6 medium-centered large-4 large-centered columns">

      <div class="row column">
        <h4 class="text-center">今どんな気分？</h4>

        {{--<div infinite-scroll='seed.nextPage()' infinite-scroll-disabled='seed.busy' infinite-scroll-distance='1'>--}}
          {{--<div ng-repeat='item in seed.items'>--}}
            {{--<span class='score'><% item.score %></span>--}}
      {{--<span class='title'>--}}
        {{--<a ng-href='<% item.url %>' target='_blank'><% item.title %></a>--}}
      {{--</span>--}}
            {{--<small>by <% item.author %> ---}}
              {{--<a ng-href='http://reddit.com<% item.permalink %>' target='_blank'><% item.num_comments %> comments</a>--}}
            {{--</small>--}}
            {{--<div style='clear: both;'></div>--}}
          {{--</div>--}}
          {{--<div ng-show='seed.busy'>Loading data...</div>--}}
        {{--</div>--}}


        <div class="floor">

          <div infinite-scroll='seed.nextPage()' infinite-scroll-disabled='seed.busy'>
            <div ng-repeat='item in seed.items'>

              <div class="row">
                <div class="small-4 columns">
                  <small><% item.updated_at %></small>
{{--                  <small>{{Form::timago()}}</small>--}}
                </div>
                <div class="fi small-4 columns">
          {{--<span class="floor_icon button {{Form::numseed($seed->seed_num,'style')}} hollow--}}
          {{--fontelico-emo-{{Form::numseed($seed->seed_num,'icon')}} seed"></span>--}}

                  <% item.seed_num %>
                </div>
                <div class="ba small-4 columns">
                  <div class="badge"><% item.seed_count %></div>
                </div>
              </div>

              <div style='clear: both;'></div>
            </div>
            <div ng-show='seed.busy'>Loading data...</div>
          </div>

          {{--@if (count($home_seed)>0)--}}
            {{--@foreach ($home_seed as $seed)--}}
              {{--<div class="row">--}}
                {{--<div class="small-4 columns">--}}
                  {{--<small>{{Form::timago($seed->updated_at)}}</small>--}}
                {{--</div>--}}
                {{--<div class="fi small-4 columns">--}}
          {{--<span--}}
              {{--class="floor_icon button {{Form::numseed($seed->seed_num,'style')}} hollow fontelico-emo-{{Form::numseed($seed->seed_num,'icon')}} seed"></span>--}}
                {{--</div>--}}
                {{--<div class="ba small-4 columns">--}}
                  {{--<div class="badge">{{$seed->seed_count}}</div>--}}
                {{--</div>--}}
              {{--</div>--}}
            {{--@endforeach--}}
          {{--@else--}}
            {{--まだ何もありません--}}
          {{--@endif--}}


        </div>

        <div class="button_menu_bg">
          <div class="button_menu">
            <div class="menu">
              <div class="row">
                <div class="small-2 columns">
                  <span class="button alert hollow fontelico-emo-angry seed" value="1"></span>
                </div>
                <div class="small-2 columns">
                                        <span class="button secondary hollow fontelico-emo-unhappy seed"
                                              value="2"></span>
                </div>
                <div class="small-2 columns">
                  <span class="button hollow fontelico-emo-tongue seed" value="3"></span>
                </div>
                <div class="small-2 columns">
                  <span class="button hollow fontelico-emo-cry seed" value="4"></span>
                </div>
                <div class="small-2 columns">
                  <span class="button alert hollow fontelico-emo-devil seed" value="5"></span>
                </div>
                <div class="small-2 columns">
                                        <span class="button secondary hollow fontelico-emo-displeased seed"
                                              value="6"></span>
                </div>
              </div>
              <div class="row">
                <div class="small-2 columns">
                  <span class="button warning hollow fontelico-emo-grin seed" value="7"></span>
                </div>
                <div class="small-2 columns">
                  <span class="button success hollow fontelico-emo-happy seed" value="8"></span>
                </div>
                <div class="small-2 columns">
                  <span class="button warning hollow fontelico-emo-laugh seed" value="9"></span>
                </div>
                <div class="small-2 columns">
                                        <span class="button secondary hollow fontelico-emo-sleep seed"
                                              value="10"></span>
                </div>
                <div class="small-2 columns">
                  <span class="button warning hollow fontelico-emo-squint seed" value="11"></span>
                </div>
                <div class="small-2 columns">
                                        <span class="button success hollow fontelico-emo-surprised seed"
                                              value="12"></span>
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
  <script>
    $(function () {
      $('.seed').on('click', function () {
        var seed_value = $(this).attr('value');
        $.ajax({
          url: '/api/seed-update',
          type: 'POST',
          dataType: 'json',
          data: {
            user_id: <?php echo $user_id?>,
            seed: seed_value,
            _token: '<?php echo csrf_token();?>'
          },
          timeout: 10000,
          success: function (data) {
            if (data['status'] == true) {
              var attr_class = $('span[value $= ' + data['seed'] + ']').attr('class');

              console.log($('.floor > .row > .fi > span').first().attr('class') == 'floor_icon ' + attr_class);

              if ($('.floor > .row > .fi > span').first().attr('class') == 'floor_icon ' + attr_class) {
                var plus = parseInt($('.floor > .row > .ba > .badge').first().html()) + 1;
                console.log($('.floor > .row > .ba > .badge').first().html());
                $('.floor > .row > .ba > .badge').first().html(plus);
              } else {
                var seed = '<div class="row">' +
                    '<div class="small-4 columns">' +
                    '<small>' + data['date'] + '</small> ' +
                    '</div>' +
                    '<div class="fi small-4 columns">' +
                    '<span class="floor_icon ' + attr_class + '">' + '</span> ' +
                    '</div>' +
                    '<div class="ba small-4 columns">' +
                    '<div class="badge">' + data['count'] + '</div>' +
                    '</div>' +
                    '</div>';
                $('.floor').prepend(seed).fadeIn('slow');
              }
            }
          },
          error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert("error");
          }
        })
      })
    })
  </script>
@endsection
