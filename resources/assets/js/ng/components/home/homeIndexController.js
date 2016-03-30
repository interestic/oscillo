/**
 * Created by yokoshima on 2016/03/15.
 */
oscilloApp.controller('HomeIndexController', function ($scope, $rootScope, $http, $geolocation, Seed, amMoment, icon_set) {

  $scope.icon_set = icon_set;

  $scope.init = function (id, csrf) {
    $rootScope.user_id = id;
    $scope.csrf = csrf;
  };

  $geolocation.getCurrentPosition({
    timeout: 60000
  }).then(function (position) {
    $scope.myPosition = position;
  });

  $scope.$watch('myPosition', function (newPos, oldPos) {

    if (!_.isUndefined(newPos)) {

      var parameter = {};
      parameter.latitude = newPos.coords.latitude;
      parameter.longitude = newPos.coords.longitude;
      parameter._token = $scope.csrf;

      var post_url = '/api/latlon/';
      $http({
        method: 'POST',
        url: post_url,
        params: parameter
      }).success(function (data, status, headers, config) {
        console.log(data);
      }).error(function (data, status, headers, config) {
        //失敗
      });
    }
  });

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
    var parameter = {};

    parameter.user_id = $rootScope.user_id;
    parameter.seed = id;
    parameter._token = $scope.csrf;

    $http({
      url: '/api/seed-update',
      method: 'POST',
      params: parameter
    }).success(function (data) {
      if (data['status'] == true) {
        var attr_class = angular.element('.row > .small-2 > span[class *= fontelico-emo-' + icon_set[id].icon + ']').attr('class');
        if (angular.element('.floor').find('span').attr('class') == 'floor_icon ' + attr_class) {
          var first = angular.element('.badge')[0];
          var plus = parseInt(angular.element('.floor').find(first).html()) + 1;
          angular.element('.floor').find(first).html(plus);

          // Badge Animation
          var animClass = 'badgeShake animated';
          var animEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
          $(first)
            .removeClass(animClass)
            .addClass(animClass)
            .one(animEnd, function () {
              $(first).removeClass(animClass);
            });
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
