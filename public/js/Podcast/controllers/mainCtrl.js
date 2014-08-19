angular.module('mainCtrl', [])
    .controller('showController', function($scope, Podcast) {
        Podcast.getAllShows()
            .success(function(data) {
                $scope.shows = data;
                $scope.loading = false;
            });
    })
    .controller('episodeController', function ($scope, Podcast) {
        // Load all show episodes once show_id is passed in
        $scope.$watch("show_id", function(){
            Podcast.getAllEpisodes($scope.show_id)
                .success(function(data) {
                    $scope.episodes = data;
                    $scope.loading = false;
                });
        });
    });