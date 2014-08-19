angular.module('podcastService', [])

    .factory('Podcast', function($http) {

        return {
            getAllShows : function() {
                return $http.get('/show/all');
            },
            getAllEpisodes: function (show_id) {
                return $http.get('/episodes?show=' + show_id);
            }
        }

    });