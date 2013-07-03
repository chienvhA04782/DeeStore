var App;
(function() {
    App = angular.module('App', ['angulartics', 'angulartics.ga']);
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

// CONTROLLER *******************************************************************************************
// PRODUCT BY CATEGORIES CTRL
    App.controller('ProductByCateCtrl', ['$scope', '$routeParams', function($scope, $routeParams) {
            $(".loadPanel").show();
            $.ajax({url: 'Model/Controller.php',
                data: {action: 'ProductByCate', cateId: $routeParams.CateId, parentId: $routeParams.ParentId},
                type: 'post',
                success: function(output) {
                    $('body').append(output);
                    $(".loadPanel").hide();


                    $scope.some_value = 'Val';
                    $scope.ready();
                    $scope.names = ['matias', 'val', 'mark'];
                }
            });
        }]);
    // ALL PRODUCT CTRL
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

    // PRODUCT DETAILS BY PRODUCT ID
    App.controller('ProductDetails', ['$scope', '$routeParams', function($scope, $routeParams) {
            $(".loadPanel").show();
            $.ajax({url: 'Model/Controller.php',
                data: {action: 'DetailsProduct', productId: $routeParams.productId},
                type: 'post',
                success: function(output) {
                    $('body').append(output);
                    $(".loadPanel").hide();
                }
            });
        }]);

// ROUTER *******************************************************************************************
    App.config(['$routeProvider', '$locationProvider', '$analyticsProvider', function($routes, $location, $analytics) {
            $location.hashPrefix('!');
            $analytics.virtualPageviews(false);

            // ALL PRODUCT
            $routes.when('/Product', {
                controller: 'ProductAllCtrl',
                templateUrl: 'Patial/_Product.php'
            });

            // PRODUCT BY CATEGORIES
            $routes.when('/Product/:CateId/:ParentId/:CategoriesName', {
                controller: 'ProductByCateCtrl',
                templateUrl: 'Patial/_Product.php',
                resolve: {
                    slow: function() {
                        return false;
                    }
                }
            });

            // DETAILS PRODUCT
            $routes.when('/Product/Details/:productId/:cateId/:ProductName', {
                controller: 'ProductDetails',
                templateUrl: 'Patial/_Details.php',
                resolve: {
                    slow: function() {
                        return false;
                    }
                }
            });
            $routes.otherwise({
                redirectTo: '/Product'
            });
        }]);
})();
