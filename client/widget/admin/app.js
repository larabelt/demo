//=require ../../../ohio/core/client/base/admin/app.js

//=require ./service.js
//=require ./controllers/widgetsController.js
//=require ./controllers/widgetsCreateController.js
//=require ./controllers/widgetsEditController.js
//=require ./controllers/widgetsIndexController.js

angular.module('widgetsApp', ['ngRoute', 'ui.bootstrap', 'baseApp', 'widgetsApp.widgetsController', 'widgetsApp.service'])
    .config(['$locationProvider', '$routeProvider',
        function ($locationProvider, $routeProvider) {
            $locationProvider.hashPrefix('!');
            $routeProvider
                .when('/index', {
                    templateUrl: '/client/widget/admin/views/index.html',
                    controller: 'widgetsIndexController'
                })
                .when('/create', {
                    templateUrl: '/client/widget/admin/views/create.html',
                    controller: 'widgetsCreateController'
                })
                .when('/edit/:widget_id', {
                    templateUrl: '/client/widget/admin/views/edit.html',
                    controller: 'widgetsEditController'
                })
                .otherwise('/');
        }]);