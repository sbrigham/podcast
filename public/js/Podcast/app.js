var podcastApp = angular.module('podcastApp', ['podcastApp.controllers', 'ui.router','episodeService', 'episodeListService', 'showService', 'showListService'], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

podcastApp.filter('trusted', ['$sce', function ($sce) {
    return function(url) {
        return $sce.trustAsResourceUrl(url);
    };
}]);

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