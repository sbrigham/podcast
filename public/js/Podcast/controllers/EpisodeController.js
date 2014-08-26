angular.module('podcastApp.controllers').controller('EpisodeController', function($scope, $stateParams, Show, Episode) {
    $scope.episode_id = $stateParams.episode_id;
    $scope.show_id = $stateParams.show_id;

    Show.get($scope.show_id).success(function(data){
        $scope.show = data;
    });

    Episode.get($scope.episode_id)
        .success(function(data) {
            data.published_at = new Date(data.published_at); // Convert date to timestamp

            $scope.episode = data;
            $scope.loading = false;
        });
});