angular.module('mainCtrl', []).controller('ShowController', function($scope, Podcast) {
    Podcast.getShows()
        .success(function(data) {
            $scope.shows = data;
            $scope.loading = false;
        });
});