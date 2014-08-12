<div class="container" id="episodes" ng-app>
    <!-- <input type="text" placeholder="Search Episodes" ng-model="search"> -->
    <div ng-controller="EpisodesController">
        <article class="episode col col-md-4" ng-repeat="episode in episodes | filter:search">
            <a href="{{ episode.link }}">
                <div class="well">
                    <div>
                        <img src="{{ episode.image_src }}" class="img-responsive"/>
                    </div>
                    <div class="episode-name">
                        <h3> {{ episode.name }} </h3>
                    </div>
                </div>
            </a>
        </article>
    </div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.21/angular.min.js"></script>
<script src="/js/podcast/episode/main.js"></script>