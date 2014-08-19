var podcastApp = angular.module('podcastApp', ['mainCtrl', 'podcastService'], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});