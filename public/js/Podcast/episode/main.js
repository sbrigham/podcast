function EpisodesController ($scope, $http) {
    $http.get('/episodes/all').success(function (episodes) {
        $scope.episodes = episodes;
    });
}