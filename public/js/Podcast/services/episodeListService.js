angular.module('episodeListService', [])

    .factory('EpisodeList', function($http) {
        return {
            get: function (show_id) {
                return $http.get('/api/show/' + show_id + '/episodes', { cache: true});
            }
        }

    });