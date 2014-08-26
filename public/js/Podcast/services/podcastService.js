angular.module('podcastService', [])

    .factory('Podcast', function($http) {
        return {
            getShow: function(show_id) {
                return $http.get('/api/show/' + show_id, { cache: true});
            },
            getShows : function() {
                return $http.get('/api/shows', { cache: true});
            },
            getEpisodes: function (show_id) {
                return $http.get('/api/show/' + show_id + '/episodes', { cache: true});
            },
            getEpisode: function (episode_id) {
                return $http.get('/api/episode/' + episode_id, { cache: true});
            }
        }

    });