angular.module('widgetsApp.service', []);

angular.module('widgetsApp.service')
    .factory('Widget', function ($http, $httpParamSerializer, $location) {

        return {

            // get all the widgets
            index: function () {

                var qs = $httpParamSerializer($location.search());

                return $http.get('/api/v1/widgets?' + qs);
            },

            // get all the widgets
            get: function (id) {
                return $http.get('/api/v1/widgets/' + id)
                    .success(function (data) {
                        return data;
                    });
                ;
            },

            // save a widget (pass in widget data)
            store: function (data) {
                return $http({
                    method: 'POST',
                    url: '/api/v1/widgets',
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                    data: $.param(data)
                });
            },

            // save a widget (pass in widget data)
            update: function (id, data) {
                return $http({
                    method: 'PUT',
                    url: '/api/v1/widgets/' + id,
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                    data: $.param(data)
                });
            },

            // destroy a widget
            destroy: function (id) {
                return $http.delete('/api/v1/widgets/' + id);
            }
        }

    });