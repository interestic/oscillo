/**
 * Created by yokoshima on 2016/03/15.
 */
oscilloApp.controller('HomeController', function ($scope, $rootScope, $http, Seed, icon_set) {

  $scope.icon_set = icon_set;

  $scope.init = function (id, csrf) {
    $rootScope.user_id = id;
    $scope.csrf = csrf;
  };

  $scope.getIcon = function (id) {
    return icon_set[id].icon;
  };
  $scope.getStyle = function (id) {
    return icon_set[id].style;
  };

  $scope.getTimeAgo = function (datetime) {
    return datetime;
  };

  $scope.seedUpdate = function (id) {

    $http({
      url: '/api/seed-update',
      method: 'POST',
      params: {user_id: $rootScope.user_id, seed: id, _token: $scope.csrf}
    }).success(function (data) {
      if (data['status'] == true) {
        var attr_class = angular.element('.row > .small-2 > span[class *= fontelico-emo-' + icon_set[id].icon + ']').attr('class');
        if (angular.element('.floor').find('span').attr('class') == 'floor_icon '+ attr_class) {
          var first = angular.element('.badge')[0];
          var plus = parseInt(angular.element('.floor').find(first).html()) + 1;
          angular.element('.floor').find(first).html(plus);
        } else {
          var seed_html =
            '<div class="row">' +
            '<div class="small-4 columns">' +
            '<small>' + data['date'] + '</small> ' +
            '</div>' +
            '<div class="fi small-4 columns">' +
            '<span class="floor_icon ' + attr_class + '">' + '</span> ' +
            '</div>' +
            '<div class="ba small-4 columns">' +
            '<div class="badge">' + data['count'] + '</div>' +
            '</div>' +
            '</div>';
          angular.element('.floor').prepend(seed_html).fadeIn('slow');
        }
      }
    }).error(function (XMLHttpRequest, textStatus, errorThrown) {
      alert("error");
    })
  };

  $scope.seed = new Seed();
});

oscilloApp.factory('Seed', function ($rootScope, $http) {
  var Seed = function () {
    this.items = [];
    this.busy = false;
    this.page = 1;
  };

  Seed.prototype.nextPage = function () {
    if (this.busy) return;
    this.busy = true;

    var url = "/api/seed-home-by-id/" + $rootScope.user_id + "/";
    $http.jsonp(url, {params: {page: this.page, callback: 'JSON_CALLBACK'}})
      .success(function (data) {
        var items = data.data;
        if (items.length > 1) {
          for (var i = 0; i < items.length; i++) {
            this.items.push(items[i]);
          }
          this.page = this.page + 1;
          this.busy = false;
        }

      }.bind(this));
  };

  return Seed;
});