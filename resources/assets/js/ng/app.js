/**
 * Created by yokoshima on 2016/03/15.
 */
var oscilloApp = angular.module('oscilloApp', [
  'infinite-scroll',
  'gridshore.c3js.chart'
], function ($interpolateProvider) {
  $interpolateProvider.startSymbol('<%');
  $interpolateProvider.endSymbol('%>');
}).value('icon_set', [
  {'icon': 'wink2', 'style': 'alert'},
  {'icon': 'angry', 'style': 'alert'},
  {'icon': 'unhappy', 'style': 'secondary'},
  {'icon': 'tongue', 'style': ''},
  {'icon': 'cry', 'style': ''},
  {'icon': 'devil', 'style': 'alert'},
  {'icon': 'displeased', 'style': 'secondary'},
  {'icon': 'grin', 'style': 'warning'},
  {'icon': 'happy', 'style': 'success'},
  {'icon': 'laugh', 'style': 'warning'},
  {'icon': 'sleep', 'style': 'secondary'},
  {'icon': 'squint', 'style': 'warning'},
  {'icon': 'surprised', 'style': 'success'}

]);