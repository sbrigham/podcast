angular.module('showService', [])

    .factory('Show', function($http) {
        return {
            get: function(show_id) {
                return $http.get('/api/show/' + show_id, { cache: true});
            }
        }

    });