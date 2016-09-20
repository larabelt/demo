angular.module('widgetsApp.widgetsController', ['baseApp.baseController']);

angular.module('widgetsApp.widgetsController')
    .controller('BaseController', function ($scope, $controller) {
        $controller('ErrorsController', {$scope: $scope});
    });