angular.module('showListService', [])

    .factory('ShowList', function($http) {
        return {
            get : function() {
                return $http.get('/api/shows', { cache: true});
            }
        }

    });