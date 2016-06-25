// public/js/services/userService.js

angular.module('userService', [])

    .factory('User', function ($http) {

        return {
            // get all the users
            get: function () {
                return $http.get('/api/v1/users');
            },

            // save a user (pass in user data)
            save: function (userData) {
                return $http({
                    method: 'POST',
                    url: '/api/v1/users',
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                    data: $.param(userData)
                });
            },

            // destroy a user
            destroy: function (id) {
                return $http.delete('/api/v1/users/' + id);
            }
        }

    });

// public/js/controllers/mainCtrl.js

angular.module('mainCtrl', [])

// inject the User service into our controller
    .controller('mainController', function ($scope, $http, User) {
        // object to hold all the data for the new user form
        $scope.userData = {};

        // loading variable to show the spinning loading icon
        $scope.loading = true;

        // get all the users first and bind it to the $scope.users object
        // use the function we created in our service
        // GET ALL USERS ==============
        User.get()
            .success(function (data) {
                $scope.users = data;
                $scope.loading = false;
            });

        // function to handle submitting the form
        // SAVE A USER ================
        $scope.submitUser = function () {
            $scope.loading = true;

            // save the user. pass in user data from the form
            // use the function we created in our service
            User.save($scope.userData)
                .success(function (data) {

                    // if successful, we'll need to refresh the user list
                    User.get()
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
        $scope.deleteUser = function (id) {
            $scope.loading = true;

            // use the function we created in our service
            User.destroy(id)
                .success(function (data) {

                    // if successful, we'll need to refresh the user list
                    User.get()
                        .success(function (getData) {
                            $scope.users = getData;
                            $scope.loading = false;
                        });

                });
        };

    });

// public/js/app.js

var userApp = angular.module('userApp', ['mainCtrl', 'userService']);