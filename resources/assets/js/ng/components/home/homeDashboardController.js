/**
 * Created by yokoshima on 2016/03/15.
 */
oscilloApp.controller('HomeDashboardController', function ($scope, $rootScope, $http, icon_set) {

  $scope.icon_set = icon_set;

  $scope.init = function (id, csrf) {
    $rootScope.user_id = id;
    $scope.csrf = csrf;
    $scope.getDashboard(id);
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

    var url = '/api/dashboard-data/' + id;
    $http.jsonp(url, {params: {page: this.page, callback: 'JSON_CALLBACK'}})
      .success(function (data) {
        console.log(data);
      }).error(function (XMLHttpRequest, textStatus, errorThrown) {
      alert("error");
    })
  };

});