function ShowsController ($scope, $http) {
    $http.get('/show/all').success(function (shows) {
        console.log(shows);
        $scope.shows = shows;
    });
}