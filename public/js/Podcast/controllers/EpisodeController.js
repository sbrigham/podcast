angular.module('podcastApp.controllers').controller('EpisodeController', function($scope, $stateParams, Podcast) {
    $scope.episode_id = $stateParams.episode_id;
    $scope.show_id = $stateParams.show_id;

    Podcast.getShow($scope.show_id).success(function(data){
        $scope.show = data;
    });

    Podcast.getEpisode($scope.episode_id)
        .success(function(data) {
            data.published_at = new Date(data.published_at); // Convert date to timestamp

            $scope.episode = data;
            $scope.loading = false;
        });
});