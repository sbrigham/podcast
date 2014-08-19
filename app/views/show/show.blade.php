@extends('layouts.master')

@section('content')
    {{ HTML::style('css/show/index.css') }}

    <div class="container">
        <div class="form-group">
            <input class="form-control" type="text" placeholder="Search Episodes" ng-model="search">
        </div>
        <div ng-controller="episodeController" ng-init="show_id={{ $show['id'] }}">
            <div class="episode col-md-4" ng-repeat="episode in episodes | filter:search">
                <a href="<% episode.link %>">
                    <div class="well">
                        <div> <small> <% episode.published_at %> </small> </div>
                        <div class="episode-name">
                            <h3> <% episode.name %> </h3>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <style>
        .episode:hover a {
            text-decoration: none;
        }
    </style>

    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.21/angular.min.js"></script>
    <script src="js/podcast/controllers/mainCtrl.js"></script> <!-- load our controller -->
    <script src="js/podcast/services/podcastService.js"></script> <!-- load our service -->
    <script src="js/podcast/app.js"></script> <!-- load our application -->
@stop
