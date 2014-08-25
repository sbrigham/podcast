angular.module('podcastApp.controllers').controller('EpisodesController', function($scope, $stateParams, Podcast) {
    $scope.show_id = $stateParams.id;

    Podcast.getShow($scope.show_id)
        .success(function(data) {
            $scope.show = data;
        });

    Podcast.getEpisodes($scope.show_id)
        .success(function(data) {
            for (var x=0; x<data.length; x++) {
                data[x].published_at = new Date(data[x].published_at);
            }
            $scope.episodes = data;
            $scope.loading = false;
        });
});