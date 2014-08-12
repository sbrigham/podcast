function EpisodesController ($scope, $http, $location) {

    // I know this is stupid. Working to fix soon
    var path = window.location.pathname;
    var show_id = path.replace('/', '');

    $http.get('/episodes?show=' + show_id).success(function (episodes) {
        $scope.episodes = episodes;
        console.log(episodes);
    });
}