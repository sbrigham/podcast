function ShowsController ($scope, $http) {
    $http.get('/show/all').success(function (shows) {
        $scope.shows = shows;
    });
}