angular.module('podcastService', [])

    .factory('Podcast', function($http) {
        return {
            getShow: function(show_id) {
                return $http.get('/api/show/' + show_id);
            },
            getShows : function() {
                return $http.get('/api/shows');
            },
            getEpisodes: function (show_id) {
                return $http.get('/api/show/' + show_id + '/episodes');
            },
            getEpisode: function (episode_id) {
                return $http.get('/api/episode/' + episode_id);
            }
        }

    });