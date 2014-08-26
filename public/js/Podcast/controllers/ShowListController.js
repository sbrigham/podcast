angular.module('podcastApp.controllers').controller('ShowListController', function($scope, ShowList) {
    $scope.loading = true;
    ShowList.get()
        .success(function(data) {
            $scope.shows = data;
            $scope.loading = false;
        });
});