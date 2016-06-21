oscilloApp.controller('profileIndexController', function ($scope, $rootScope, $http) {

  $scope.init = function (id, csrf) {
    $rootScope.user_id = id;
    $scope.errors = {};
    $scope.csrf = csrf;
    $scope.profile = {};
    $scope.update_success = false;
    $scope.update_error = false;
    $scope.getProfile();
  };

  $scope.getProfile = function () {

    var parameter = {};
    parameter.user_id = $rootScope.user_id;

    var post_url = '/api/profile/get';
    $http({
      method: 'POST',
      url: post_url,
      params: parameter
    }).success(function (data, status, headers, config) {
      $scope.profile.name = data.name;
      $scope.profile.email = data.email;
      $scope.profile.new_email = data.email;
      $scope.profile.url = data.url;
      $scope.profile.team = data.team;
      $scope.profile.location = data.location;

    }).error(function (data, status, headers, config) {
      //失敗

    });
  };

  $scope.update_default = function () {
    $scope.update_success = false;
    $scope.update_error = false;
  };

  $scope.update_profile = function () {
    var parameter = {};
    parameter.profile = {};
    parameter.profile.url = $scope.profile.url;
    parameter.profile.team = $scope.profile.team;
    parameter.profile.location = $scope.profile.location;
    parameter.profile.id = $rootScope.user_id;

    post_action(parameter);
  };

  $scope.update_name = function (){
    var parameter = {};
    parameter.profile = {};
    parameter.profile.name = $scope.profile.name;
    parameter.profile.id = $rootScope.user_id;

    post_action(parameter);
  };

  $scope.update_email = function (){
    var parameter = {};
    parameter.profile = {};
    parameter.profile.email = $scope.profile.email;
    parameter.profile.id = $rootScope.user_id;

    post_action(parameter);

  }

  function post_action(parameter) {
    $scope.errors = {};
    var post_url = '/api/profile/update';
    $http({
      method: 'POST',
      url: post_url,
      params: parameter
    }).success(function (data, status, headers, config) {

      if (data == '1') {
        $scope.update_success = true;
      } else {
        $scope.update_error = true;

        $scope.errors = data;
      }

    }).error(function (data, status, headers, config) {
      //失敗

    });
  }

});