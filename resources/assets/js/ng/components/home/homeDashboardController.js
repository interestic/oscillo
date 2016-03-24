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

  $scope.getDashboard = function (id) {
    $scope.datapoints = [];
    $scope.$watch('datapoints', function (newVal, oldVal) {
      $scope.datacolumns = [
        {"id": "angry", "type": "spline"},
        {"id": "unhappy", "type": "spline"},
        {"id": "tongue", "type": "spline"},
        {"id": "cry", "type": "spline"},
        {"id": "devil", "type": "spline"},
        {"id": "displeased", "type": "spline"},
        {"id": "grin", "type": "spline"},
        {"id": "happy", "type": "spline"},
        {"id": "laugh", "type": "spline"},
        {"id": "sleep", "type": "spline"},
        {"id": "squint", "type": "spline"},
        {"id": "surprised", "type": "spline"}
      ];
      $scope.datax = {"id": "x"};
    });

    var url = '/api/dashboard-data/' + id;
    $http.jsonp(url, {params: {page: this.page, callback: 'JSON_CALLBACK'}})
      .success(function (data) {
        $scope.datapoints = data;
      }).error(function (XMLHttpRequest, textStatus, errorThrown) {

      alert("error");
    })
  };
});