var podcastApp = angular.module('podcastApp', [ 'podcastApp.controllers', 'UserService','sbAudioDirective','sbRatingDirective', 'ui.router','episodeService',
    'episodeListService', 'showService', 'showListService'], function($interpolateProvider) {

    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

podcastApp.controller('MainCtrl', function($scope, User) {
    $scope.setUser = function (user) {
        if (user!=null) {
            User.setUser(user);
        }
    }
})

podcastApp.filter('trusted', ['$sce', function ($sce) {
    return function(url) {
        return $sce.trustAsResourceUrl(url);
    };
}]);

podcastApp.filter('range', function() {
    return function(input, total) {
        total = parseInt(total);
        for (var i=total; i>0; i--)
            input.push(i);
        return input;
    };
});

podcastApp.filter('rating', function() {
    return function (input) {
        if (input == undefined) {
            return 'No Rating';
        }

        return Math.round(input * 100) / 100 +' Stars';
    };
});

podcastApp.filter('duration', function() {
    return function(input) {
        if (input == null) {
            return 'N/A';
        }

        var sec_num = parseInt(input, 10); // don't forget the second parm
        var hours = Math.floor(sec_num / 3600);
        var minutes = Math.floor((sec_num - (hours * 3600)) / 60);

        var time = hours + 'hr ' + minutes + 'min';
        return time;
    }
});

// ROUTING
podcastApp.config(function($stateProvider, $urlRouterProvider) {
    //
    // For any unmatched url, redirect to /state1
    //$urlRouterProvider.otherwise("shows");
    //
    // Now set up the states
    $stateProvider
        .state('shows', {
            url: "",
            controller: 'ShowListController',
            templateUrl: 'partials/show/index.html'
        })
        .state('showEpisodes', {
            url: '/show/{id}/episodes',
            controller: 'EpisodeListController',
            templateUrl: 'partials/episode/index.html'
        })
        .state('episode', {
            url: '/show/{show_id}/episode/{episode_id}',
            controller : 'EpisodeController',
            templateUrl: 'partials/episode/show.html'
        })
});