/**
 * Created by yokoshima on 2016/03/15.
 */
var oscilloApp = angular.module('oscilloApp', [
  'infinite-scroll'
], function ($interpolateProvider) {
  $interpolateProvider.startSymbol('<%');
  $interpolateProvider.endSymbol('%>');
});