@extends('layouts.master')

@section('content')

{{ HTML::style('css/show/index.css'); }}

<div class="container" id="shows" ng-app>
    <div ng-controller="ShowsController">
        <ul>
            <li ng-repeat="show in shows">
                {{ shows.name }}
            </li>
        </ul>
    </div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.21/angular.min.js"></script>
<script src="/js/podcast/main.js"></script>
@stop
