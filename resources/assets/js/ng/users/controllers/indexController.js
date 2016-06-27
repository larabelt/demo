
angular.module('usersApp.controllers')
    .controller('indexController', function ($scope, $http, User) {

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