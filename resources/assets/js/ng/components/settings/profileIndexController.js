oscilloApp.controller('profileIndexController', function ($scope, $rootScope, $http) {
  $scope.init = function (id, csrf) {
    $rootScope.user_id = id;
    $scope.csrf = csrf;

    $scope.getProfile(id);
  };


  $scope.getProfile = function (id) {

    var parameter = {};
    parameter.user_id = id;

    var post_url = '/api/profile/get';
    $http({
      method: 'POST',
      url: post_url,
      params: parameter
    }).success(function (data, status, headers, config) {
      $scope.name = data.name;
      $scope.email = data.email;
      $scope.url = data.url;
      $scope.team = data.team;
      $scope.location = data.location;

    }).error(function (data, status, headers, config) {
      //失敗

    });
  }
});