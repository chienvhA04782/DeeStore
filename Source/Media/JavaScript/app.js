'use strict';

/* App Module */

angular.module('phonecat', ['phonecatFilters', 'phonecatServices']).
        config(['$routeProvider', function($routeProvider) {
        $routeProvider.
                when('/ProductAll', {templateUrl: 'Patial/_Product.php', controller: ProductAllCtrl}).
                when('/Product/:CateId/:ParentId/:CategoriesName', {templateUrl: 'Patial/_Product.php',
            controller: ProductByCateCtrl}).otherwise({redirectTo: '/ProductAll'});
        ;
    }]);
