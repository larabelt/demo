angular.module('usersApp', []);
angular.module('usersApp.service', []);
angular.module('usersApp.controllers', []);

angular.module('usersApp', ['ngRoute', 'usersApp.controllers', 'usersApp.service'])
    .config(['$locationProvider', '$routeProvider',
        function ($locationProvider, $routeProvider) {
            $locationProvider.hashPrefix('!');
            $routeProvider
                .when('/index', {
                    templateUrl: '/ng/users/views/index.html',
                    controller: 'indexController'
                })
                .when('/edit/:user_id', {
                    templateUrl: '/ng/users/views/edit.html',
                    controller: 'editController'
                })
                .otherwise('/');
            ;
        }]);