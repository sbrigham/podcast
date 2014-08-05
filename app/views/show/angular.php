<div class="container" id="shows" ng-app>
    <!-- <input type="text" placeholder="Search Podcasts" ng-model="search"> -->
    <div ng-controller="ShowsController">
        <article class="show col col-md-4" ng-repeat="show in shows | filter:search">
            <div class="well">
                <div>
                    <img src="{{ show.image_src }}" class="img-responsive"/>
                </div>
                <div class="show-name">
                    <h3> {{ show.name }} </h3>
                </div>
            </div>
        </article>
    </div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.21/angular.min.js"></script>
<script src="/js/podcast/show/main.js"></script>