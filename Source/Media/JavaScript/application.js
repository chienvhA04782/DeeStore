var App;
(function() {
    App = angular.module('App', []);

    App.run(['$rootScope', function($rootScope) {
            var _getTopScope = function() {
                return $rootScope;
                //return angular.element(document).scope();
            };

            $rootScope.ready = function() {
                var $scope = _getTopScope();
                $scope.status = 'ready';
                if (!$scope.$$phase)
                    $scope.$apply();
            };
            $rootScope.loading = function() {
                var $scope = _getTopScope();
                $scope.status = 'loading';
                if (!$scope.$$phase)
                    $scope.$apply();
            };
            $rootScope.$on('$routeChangeStart', function() {
                _getTopScope().loading();
            });
        }]);

    App.controller('IndexCtrl', ['$scope', '$http', function($scope, $http) {
            
        }]);

    App.controller('ProductAllCtrl', ['$scope', '$http', function($scope, $http) {
           $(".loadPanel").show();
            $.ajax({url: 'Model/Controller.php',
                data: {action: 'AllProduct'},
                type: 'post',
                success: function(output) {
                    $('body').append(output);
                    $(".loadPanel").hide();
                }
            });
        }]);

    App.controller('VideosCtrl', ['$scope', '$http', 'slow', function($scope, $http, isSlow) {
            var callbackToken = 'JSON_CALLBACK';
            var url = 'https://gdata.youtube.com/feeds/api/standardfeeds/top_rated?time=today&alt=json&callback=' + callbackToken;
            var timeout = isSlow ? 2000 : 1;
            $http.jsonp(url).success(function(data) {
                setTimeout(function() {
                    var feed = data['feed'];
                    var entries = feed['entry'];
                    $scope.videos = [];
                    for (var i = 0; i < entries.length; i++) {
                        var entry = entries[i];
                        var title = entry['title']['$t'];
                        $scope.videos.push({
                            title: title
                        });
                    }
                    ;
                    $scope.ready();
                }, timeout);
            });
        }]);

    App.config(['$routeProvider', '$locationProvider', function($routes, $location) {

            $location.hashPrefix('!');

            $routes.when('/Product', {
                controller: 'ProductAllCtrl',
                templateUrl: 'Patial/_Product.php'
            });

            $routes.when('/videos', {
                controller: 'VideosCtrl',
                templateUrl: './pages/videos.html',
                resolve: {
                    slow: function() {
                        return false;
                    }
                }
            });

            $routes.when('/videos/slow', {
                controller: 'VideosCtrl',
                templateUrl: './pages/videos.html',
                resolve: {
                    slow: function() {
                        return true;
                    }
                }
            });

            $routes.otherwise({
                redirectTo: '/Product'
            });

        }]);

})();
