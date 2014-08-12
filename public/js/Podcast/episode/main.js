function EpisodesController ($scope, $http, $location) {
    var path = window.location.pathname;
    var show_id = path.replace('/', '');

    $http.get('/episodes?show=' + show_id).success(function (episodes) {
        $scope.episodes = episodes;
    });
}