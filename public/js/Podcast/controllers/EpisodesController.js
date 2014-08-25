angular.module('podcastApp.controllers').controller('EpisodesController', function($scope, $stateParams, Podcast) {
    $scope.show_id = $stateParams.id;
    Podcast.getEpisodes($scope.show_id)
        .success(function(data) {
            $scope.episodes = data;
            $scope.loading = false;
        });
});