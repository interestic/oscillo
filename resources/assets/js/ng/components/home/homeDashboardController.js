/**
 * Created by yokoshima on 2016/03/15.
 */
oscilloApp.controller('HomeDashboardController', function ($scope, $rootScope, $http, icon_set) {

  $scope.icon_set = icon_set;

  $scope.init = function (id, csrf) {
    $rootScope.user_id = id;
    $scope.csrf = csrf;
    $scope.getDashboard();
  };

  //var rows = [["x", "Views", "GMV"]];
  //rows = rows.concat([
  //  [1398709800000, 780, 136],
  //  [1398450600000, 812, 134],
  //  [1399401000000, 784, 154],
  //  [1399228200000, 786, 135],
  //  [1399573800000, 802, 131],
  //  [1399487400000, 773, 166],
  //  [1399314600000, 787, 146],
  //  [1399919400000, 1496, 309],
  //  [1399833000000, 767, 138],
  //  [1399746600000, 797, 141],
  //  [1399660200000, 796, 146],
  //  [1398623400000, 779, 143],
  //  [1399055400000, 794, 140],
  //  [1398969000000, 791, 140],
  //  [1398882600000, 825, 107],
  //  [1399141800000, 786, 136],
  //  [1398537000000, 773, 143],
  //  [1398796200000, 783, 154],
  //  [1400005800000, 1754, 284]
  //].sort(function (a, b) {
  //  return a[0] - b[0];
  //}));
  //
  //var chart = c3.generate({
  //  bindto: '#chart',
  //  data: {
  //    x: 'x',
  //    rows: rows
  //  },
  //  axis: {
  //    x: {
  //      type: 'timeseries',
  //      tick: {
  //        format: "%m-%d" // https://github.com/mbostock/d3/wiki/Time-Formatting#wiki-format
  //      }
  //    }
  //  }
  //});

  $scope.getDashboard = function (id) {

    console.log('getDashboard start.');
    //$http({
    //  url: '/api/seed-update',
    //  method: 'POST',
    //  params: {user_id: $rootScope.user_id, seed: id, _token: $scope.csrf}
    //}).success(function (data) {
    //  if (data['status'] == true) {
    //    var attr_class = angular.element('.row > .small-2 > span[class *= fontelico-emo-' + icon_set[id].icon + ']').attr('class');
    //    if (angular.element('.floor').find('span').attr('class') == 'floor_icon '+ attr_class) {
    //      var first = angular.element('.badge')[0];
    //      var plus = parseInt(angular.element('.floor').find(first).html()) + 1;
    //      angular.element('.floor').find(first).html(plus);
    //    } else {
    //      var seed_html =
    //        '<div class="row">' +
    //        '<div class="small-4 columns">' +
    //        '<small>' + data['date'] + '</small> ' +
    //        '</div>' +
    //        '<div class="fi small-4 columns">' +
    //        '<span class="floor_icon ' + attr_class + '">' + '</span> ' +
    //        '</div>' +
    //        '<div class="ba small-4 columns">' +
    //        '<div class="badge">' + data['count'] + '</div>' +
    //        '</div>' +
    //        '</div>';
    //      angular.element('.floor').prepend(seed_html).fadeIn('slow');
    //    }
    //  }
    //}).error(function (XMLHttpRequest, textStatus, errorThrown) {
    //  alert("error");
    //})
  };

});