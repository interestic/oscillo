/**
 * Created by yokoshima on 2016/03/15.
 */
var oscilloApp = angular.module('oscilloApp', [
  'infinite-scroll',
  'gridshore.c3js.chart',
  'angularMoment',
  'ngGeolocation',
  'underscore',
  'ngAudio'
], function ($interpolateProvider) {
  $interpolateProvider.startSymbol('<%');
  $interpolateProvider.endSymbol('%>');
}).value('icon_set', [
  {'icon': 'wink2', 'style': 'warning'},
  {'icon': 'laugh', 'style': 'warning'},
  {'icon': 'grin', 'style': 'warning'},
  {'icon': 'squint', 'style': 'warning'},
  {'icon': 'angry', 'style': 'alert'},
  {'icon': 'devil', 'style': 'alert'},
  {'icon': 'unhappy', 'style': 'alert'},
  {'icon': 'cry', 'style': ''},
  {'icon': 'displeased', 'style': ''},
  {'icon': 'sleep', 'style': ''},
  {'icon': 'happy', 'style': 'success'},
  {'icon': 'tongue', 'style': 'success'},
  {'icon': 'surprised', 'style': 'success'}

]).run(function (amMoment) {
  amMoment.changeLocale('ja');
});
