/**
 * Created by yokoshima on 2016/03/15.
 */
oscilloApp.controller('HomeController', function ($scope, Seed) {
  $scope.seed = new Seed($scope);
});

oscilloApp.factory('Seed', function ($http) {
  var Seed = function () {
    this.items = [];
    this.busy = false;
    this.after = '';
  };

  Seed.prototype.nextPage = function ($scope) {
    if (this.busy) return;
    this.busy = true;

    var url = "/api/seed-home-by-id/2/";
    $http.jsonp(url, {params: {callback: 'JSON_CALLBACK'}})
      .success(function (data) {
        var items = data.data;
        for (var i = 0; i < items.length; i++) {
          console.log(items[i]);
          this.items.push(items[i]);
        }
        //this.after = "t3_" + this.items[this.items.length - 1].id;
        this.busy = false;
      }.bind(this));
  };

  return Seed;
});