<div class="container" id="episodes" ng-app>
    <div class="form-group">
        <input class="form-control" type="text" placeholder="Search Episodes" ng-model="search">
    </div>
    <div ng-controller="EpisodesController">
        <div class="episode col-md-4" ng-repeat="episode in episodes | filter:search">
            <div class="well">
                <!--                <div>-->
                <!--                    <img src="{{ episode.image_src }}" class="img-responsive"/>-->
                <!--                </div>-->
                <div class="episode-name">
                    <h3> {{ episode.name }} </h3>
                </div>
            </div>
        </article>
    </div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.21/angular.min.js"></script>
<script src="/js/podcast/episode/main.js"></script>