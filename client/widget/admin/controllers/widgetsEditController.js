angular.module('widgetsApp.widgetsController')
    .controller('widgetsEditController', function ($scope, $routeParams, Widget) {

        $scope.widget_id = $routeParams.widget_id;

        // object to hold all the data for the new widget form
        $scope.widget = {};

        $scope.init = function () {

            $scope.loading = true;

            Widget.get($scope.widget_id)
                .success(function (data) {
                    $scope.widget = data;
                    $scope.loading = false;
                });
        };

        // function to handle submitting the form
        // UPDATE A WIDGET ================
        $scope.update = function (id) {

            $scope.loading = true;

            // save the widget. pass in widget data from the form
            // use the function we created in our service
            Widget.update(id, $scope.widget)
                .success(function (data) {
                    $scope.widget = data;
                    $scope.loading = false;
                })
                .error(function (data) {

                });
        };

    });