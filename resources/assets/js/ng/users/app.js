// public/js/services/userService.js

angular.module('userService', [])

    .factory('User', function ($http) {

        return {

            // get all the users
            index: function () {
                return $http.get('/api/v1/users');
            },

            // get all the users
            get: function (id) {
                console.log(111);
                console.log(id);
                return $http.get('/api/v1/users/' + id)
                    .success(function (data) {
                        return data;
                    });
                ;
            },

            // save a user (pass in user data)
            store: function (data) {
                return $http({
                    method: 'POST',
                    url: '/api/v1/users',
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                    data: $.param(data)
                });
            },

            // save a user (pass in user data)
            update: function (id, data) {
                return $http({
                    method: 'PUT',
                    url: '/api/v1/users/' + id,
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                    data: $.param(data)
                });
            },

            // destroy a user
            destroy: function (id) {
                return $http.delete('/api/v1/users/' + id);
            }
        }

    });

// public/js/controllers/usersCtrl.js

angular.module('usersCtrl', [])

// inject the User service into our controller

    .controller('usersController', function ($scope, $http, User) {

        // object to hold all the data for the new user form
        $scope.user = {};

        // loading variable to show the spinning loading icon
        $scope.loading = true;

        // get all the users first and bind it to the $scope.users object
        // use the function we created in our service
        // GET ALL USERS ==============
        User.index()
            .success(function (data) {
                $scope.users = data;
                $scope.loading = false;
            });

        // function to handle submitting the form
        // SAVE A USER ================
        $scope.get = function (id) {

            $scope.loading = true;

            // use the function we created in our service
            User.get(id)
                .success(function (data) {
                    $scope.user = data.data;
                });
        };

        // function to handle submitting the form
        // SAVE A USER ================
        $scope.store = function () {

            $scope.loading = true;

            // save the user. pass in user data from the form
            // use the function we created in our service
            User.store($scope.user)
                .success(function (data) {

                    // if successful, we'll need to refresh the user list
                    User.index()
                        .success(function (getData) {
                            $scope.users = getData;
                            $scope.loading = false;
                        });

                })
                .error(function (data) {
                    console.log(data);
                });
        };

        // function to handle submitting the form
        // UPDATE A USER ================
        $scope.update = function (id) {

            $scope.loading = true;

            // save the user. pass in user data from the form
            // use the function we created in our service
            User.update(id, $scope.user)
                .success(function (data) {

                    // if successful, we'll need to refresh the user list
                    User.index()
                        .success(function (getData) {
                            $scope.users = getData;
                            $scope.loading = false;
                        });

                })
                .error(function (data) {
                    console.log(data);
                });
        };

        // function to handle deleting a user
        // DELETE A USER ====================================================
        $scope.destroy = function (id) {

            $scope.loading = true;

            // use the function we created in our service
            User.destroy(id)
                .success(function (data) {

                    // if successful, we'll need to refresh the user list
                    User.index()
                        .success(function (getData) {
                            $scope.users = getData;
                            $scope.loading = false;
                        });

                });
        };

    });

// public/js/app.js

var userApp = angular.module('userApp', ['usersCtrl', 'userService', 'ngRoute']);

userApp
    .config(['$locationProvider', '$routeProvider',
        function ($locationProvider, $routeProvider) {
            $locationProvider.hashPrefix('!');
            $routeProvider
                .when('/users', {
                    templateUrl: '/ng/users/views/index.html',
                    controller: 'mainController'
                })
                .when('/users/:user_id', {
                    templateUrl: '/ng/users/views/edit.html',
                    controller: 'mainController'
                })
                .otherwise('/');
            ;
        }]);

// create the controller and inject Angular's $scope
userApp.controller('mainController', function ($scope, $routeParams, User) {

    $scope.user_id = $routeParams.user_id;

    // object to hold all the data for the new user form
    $scope.user = {};

    // loading variable to show the spinning loading icon
    $scope.loading = true;

    User.get($scope.user_id)
        .success(function (data) {
            console.log(222);
            $scope.user = data.data;
            $scope.loading = false;
        });

});