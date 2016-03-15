/**
 * Created by yokoshima on 2016/03/15.
 */
oscilloApp.controller('HomeController', function($scope,Seed) {
  $scope.seed = new Seed();
});

oscilloApp.factory('Seed', function($http) {
  var Seed = function() {
    this.items = [];
    this.busy = false;
    this.after = '';
  };

  Seed.prototype.nextPage = function($scope) {
    if (this.busy) return;
    this.busy = true;

    var url = "/api/seed-home-by-id/"+$scope.user_id+"/";
    $http.jsonp(url).success(function(data) {
      var items = data.data.children;
      for (var i = 0; i < items.length; i++) {
        this.items.push(items[i].data);
      }
      this.after = "t3_" + this.items[this.items.length - 1].id;
      this.busy = false;
    }.bind(this));
  };

  return Seed;
});