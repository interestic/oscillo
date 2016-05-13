oscilloApp.controller('profileIndexController', function ($scope, $rootScope, $http) {
  $scope.init = function (id, csrf) {
    $rootScope.user_id = id;
    $scope.csrf = csrf;
    $scope.profile ={};

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
      $scope.profile.url = data.url;
      $scope.profile.team = data.team;
      $scope.profile.location = data.location;

    }).error(function (data, status, headers, config) {
      //失敗

    });
  };

  $scope.update_profile = function (){
    var parameter = {};
    parameter.profile = $scope.profile;
    parameter.profile.id = $rootScope.user_id;

    var post_url = '/api/profile/update';
    $http({
      method: 'POST',
      url: post_url,
      params: parameter
    }).success(function (data, status, headers, config) {

      if(data){
        console.log('更新出来ました');
      }else{
        console.log('更新に失敗しました');
      }

    }).error(function (data, status, headers, config) {
      //失敗

      console.log(data);

    });
  };

  //$scope.update_name = function (){
  //  var parameter = {};
  //  parameter.name = $scope.profile.name;
  //  parameter.id = $rootScope.user_id;
  //
  //  var post_url = '/api/profile/update-name';
  //  $http({
  //    method: 'POST',
  //    url: post_url,
  //    params: parameter
  //  }).success(function (data, status, headers, config) {
  //
  //    console.log(data);
  //
  //  }).error(function (data, status, headers, config) {
  //    //失敗
  //
  //    console.log(data);
  //
  //  });
  //}
  //
  //$scope.update_email = function (){
  //  var parameter = {};
  //  parameter.email = $scope.profile.email;
  //  parameter.profile.id = $rootScope.user_id;
  //
  //  var post_url = '/api/profile/update-email';
  //  $http({
  //    method: 'POST',
  //    url: post_url,
  //    params: parameter
  //  }).success(function (data, status, headers, config) {
  //
  //    console.log(data);
  //
  //  }).error(function (data, status, headers, config) {
  //    //失敗
  //
  //    console.log(data);
  //
  //  });
  //}
});