function EpisodesController ($scope, $http, $location) {

    // This is stupid. Fix later
    var path = window.location.pathname;
    var show_id = path.replace('/', '');

    $http.get('/episodes?show=' + show_id).success(function (episodes) {
        $scope.episodes = episodes;
        console.log(episodes);
    });
}