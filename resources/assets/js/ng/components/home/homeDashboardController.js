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
    $scope.monthly_datapoints = [];
    $scope.$watch('monthly_datapoints', function (newVal, oldVal) {
      $scope.monthly_datacolumns = [
        {"id": "angry", "type": "area-spline"},
        {"id": "unhappy", "type": "area-spline"},
        {"id": "tongue", "type": "area-spline"},
        {"id": "cry", "type": "area-spline"},
        {"id": "devil", "type": "area-spline"},
        {"id": "displeased", "type": "area-spline"},
        {"id": "grin", "type": "area-spline"},
        {"id": "happy", "type": "area-spline"},
        {"id": "laugh", "type": "area-spline"},
        {"id": "sleep", "type": "area-spline"},
        {"id": "squint", "type": "area-spline"},
        {"id": "surprised", "type": "area-spline"}
      ];
      $scope.monthly_datax = {"id": "x"};
    });

    var url = '/api/dashboard-data/' + id;
    $http.jsonp(url, {params: {page: this.page, callback: 'JSON_CALLBACK'}})
      .success(function (data) {
        $scope.monthly_datapoints = data;
      }).error(function (XMLHttpRequest, textStatus, errorThrown) {

      alert("error");
    })
  };
});