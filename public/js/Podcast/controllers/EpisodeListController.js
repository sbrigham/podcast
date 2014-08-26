angular.module('podcastApp.controllers').controller('EpisodeListController',function($scope, $stateParams, $filter, Show, EpisodeList) {
    $scope.show_id = $stateParams.id;
    var orderBy = $filter('orderBy');

    Show.get($scope.show_id)
        .success(function(data) {
            $scope.show = data;
        });

    $scope.loading = true;
    EpisodeList.get($scope.show_id)
        .success(function(data) {
            for (var x=0; x<data.length; x++) {
                data[x].published_at = new Date(data[x].published_at);
            }
            $scope.episodes = data;
            $scope.loading = false;
        });

    $scope.order = function(predicate, reverse) {
        $scope.episodes = orderBy($scope.episodes, predicate, reverse)
    };
});