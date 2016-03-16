/**
 * Created by yokoshima on 2016/03/15.
 */
oscilloApp.controller('HomeController', function ($scope, $rootScope, Seed) {

  $scope.initId = function(id){
    $rootScope.user_id = id;
  };

  $scope.seed = new Seed();
});

oscilloApp.factory('Seed', function ($rootScope,$http) {
  var Seed = function () {
    this.items = [];
    this.busy = false;
    this.page = 1;
  };

  Seed.prototype.nextPage = function () {
    if (this.busy) return;
    this.busy = true;

    var url = "/api/seed-home-by-id/"+$rootScope.user_id+"/";
    $http.jsonp(url, {params: {page:this.page, callback: 'JSON_CALLBACK'}})
      .success(function (data) {
        var items = data.data;
        if(items.length>1){
          for (var i = 0; i < items.length; i++) {
            console.log(items[i]);
            this.items.push(items[i]);
          }
          this.page = this.page+1;
          this.busy = false;
        }

      }.bind(this));
  };

  return Seed;
});