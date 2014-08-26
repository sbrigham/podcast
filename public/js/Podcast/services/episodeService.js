angular.module('episodeService', [])

    .factory('Episode', function($http) {
        return {
            get: function (episode_id) {
                return $http.get('/api/episode/' + episode_id, { cache: true});
            }
        }

    });