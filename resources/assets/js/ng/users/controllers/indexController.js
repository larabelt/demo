// create the controller and inject Angular's $scope
userApp.controller('indexController', function ($scope, $routeParams, User) {

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

});