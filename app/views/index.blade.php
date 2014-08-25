@extends('layouts.master')

@section('content')
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css"/>
    <script src="js/vendor/angular/angular.js"></script>
    <script src="js/vendor/angular-ui-router/release/angular-ui-router.js"></script>
    <script src="js/podcast/app.js"></script>
    <script src="js/podcast/controllers/mainCtrl.js"></script>
    <script src="js/podcast/services/podcastService.js"></script>
    <script src="js/podcast/controllers/ShowsController.js"></script>
    <script src="js/podcast/controllers/EpisodesController.js"></script>
    <script src="js/podcast/controllers/EpisodeController.js"></script>
    {{ HTML::style('css/show/index.css') }}
    {{ HTML::style('css/index.css') }}

    <div ui-view></div>
@stop