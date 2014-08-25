angular.module('podcastApp.controllers').controller('ShowsController', function($scope, Podcast) {
    Podcast.getShows()
        .success(function(data) {
            $scope.shows = data;
            $scope.loading = false;
        });
});