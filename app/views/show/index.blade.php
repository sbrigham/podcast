@extends('layouts.master')

@section('content')
    {{ HTML::style('css/show/index.css') }}
    <div class="container" id="shows">
        <div class="form-group">
            <input class="form-control" type="text" placeholder="Search Podcasts" ng-model="search">
        </div>
        <div ng-controller="showController">
            <article class="show col col-md-4" ng-repeat="show in shows | filter:search">
                <a href="<% show.link %>">
                    <div class="well">
                        <div>
                            <img ng-src="<% show.image_src %>" class="img-responsive"/>
                        </div>
                        <div class="show-name">
                            <h3> <% show.name %> </h3>
                        </div>
                    </div>
                </a>
            </article>
        </div>
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.21/angular.min.js"></script>
    <script src="js/podcast/controllers/mainCtrl.js"></script> <!-- load our controller -->
    <script src="js/podcast/services/podcastService.js"></script> <!-- load our service -->
    <script src="js/podcast/app.js"></script> <!-- load our application -->
@stop
