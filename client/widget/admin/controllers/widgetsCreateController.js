
angular.module('widgetsApp.widgetsController')
    .controller('widgetsCreateController', function ($scope, $controller, $location, Widget) {

        $controller('BaseController', {$scope: $scope});

        // object to hold all the data for the new widget form
        $scope.widget = {};

        // function to handle submitting the form
        // STORE A WIDGET ================
        $scope.store = function () {

            $scope.loading = true;

            // save the widget. pass in widget data from the form
            // use the function we created in our service
            Widget.store($scope.widget)
                .success(function (data) {
                    $location.url('/widgets/edit/' + data.id)
                })
                .error(function (data) {
                    $scope.setErrors(data);
                    angular.forEach(data.message, function (value, key) {
                        $scope.errors[key] = value;
                    });
                    angular.forEach(data.message, function (value, key) {
                        $scope.errors[key] = value;
                        angular.forEach(value, function (value, key) {

                        });
                    });
                });
        };

    });