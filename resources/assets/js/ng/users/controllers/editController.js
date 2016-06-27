angular.module('usersApp.controllers')
    .controller('editController', function ($scope, $routeParams, User) {

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