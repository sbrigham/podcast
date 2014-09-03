@extends('layouts.master')

@section('content')
    <div ng-controller="MainCtrl" ng-init="setUser({{{ $user }}})">
        <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css"/>
        <script src="js/vendor/angular/angular.min.js"></script>
        <script src="js/vendor/angular-ui-router/release/angular-ui-router.min.js"></script>
        <script src="js/vendor/angular-bootstrap/ui-bootstrap.min.js"></script>
        <script src="js/podcast/app.js"></script>
        <script src="js/podcast/controllers/mainCtrl.js"></script>
        <script src="js/podcast/services/showListService.js"></script>
        <script src="js/podcast/modules/AudioModule.js"></script>
        <script src="js/podcast/services/showService.js"></script>
        <script src="js/podcast/services/episodeListService.js"></script>
        <script src="js/podcast/services/episodeService.js"></script>
        <script src="js/podcast/services/UserService.js"></script>
        <script src="js/podcast/controllers/ShowListController.js"></script>
        <script src="js/podcast/controllers/EpisodeListController.js"></script>
        <script src="js/podcast/controllers/EpisodeController.js"></script>
        {{ HTML::style('css/show/index.css') }}
        {{ HTML::style('css/index.css') }}

        <div ui-view></div>
    </div>
@stop