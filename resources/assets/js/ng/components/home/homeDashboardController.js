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