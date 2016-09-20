angular.module('widgetsApp.widgetsController')
    .controller('widgetsIndexController', function ($scope, $http, $location, Widget) {

        $scope.criteria = {
            page: null,
            perPage: null,
            orderBy: null,
            sortBy: null
        };

        $scope.sorters = [];

        // object to hold all the data for the new widget form
        $scope.widget = {};

        // loading variable to show the spinning loading icon
        $scope.loading = true;

        $scope.setPage = function (pageNo) {
            angular.extend($scope.criteria, {page: pageNo});
        };

        $scope.pageChanged = function () {
            $location.search('page', $scope.criteria.page);
        };

        // get all the widgets first and bind it to the $scope.widgets object
        // use the function we created in our service
        // GET ALL WIDGETS ==============
        $scope.index = function () {
            Widget.index()
                .success(function (data) {

                    $scope.widgets = data;
                    $scope.loading = false;

                    angular.extend($scope.criteria, {
                        page: data.current_page,
                        perPage: data.per_page,
                        orderBy: data.meta.request.orderBy,
                        sortBy: data.meta.request.sortBy
                    });

                    for (var i = 0; i < $scope.sorters.length; i++) {
                        var sorter = $scope.sorters[i];
                        sorter.update($scope.criteria);
                    }

                });
        };

        // function to handle deleting a widget
        // DELETE A WIDGET ====================================================
        $scope.destroy = function (id) {

            $scope.loading = true;

            // use the function we created in our service
            Widget.destroy(id)
                .success(function (data) {

                    // if successful, we'll need to refresh the widget list
                    Widget.index()
                        .success(function (getData) {
                            $scope.widgets = getData;
                            $scope.loading = false;
                        });

                });
        };

    });
;