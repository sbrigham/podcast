@extends('layouts.master')

@section('content')

{{ HTML::style('css/star.rating.css'); }}

<style>
    input[name=rating]:hover {
        cursor: pointer;
    }

    #episode-src audio {
        width: 100%;
    }
    hr {
        margin-top:5px;
        margin-bottom: 5px;
    }

    .episode-date {
        color: #32CD32;
        font-size: 20px;
        line-height: 50px;
        vertical-align: bottom;
    }

    #episode-desc {
        padding-top: 10px;
        padding-bottom: 10px;
    }
</style>

<div class="container well">
    <article ng-controller="episodeController" ng-init="episode_id={{ $episode['id'] }}">
        <div class="col-md-3 fluid-container">
            <div id="episode-img" class="fluid-container">
                <img ng-src ="<% episode.image_src %>" class="img-responsive"/>
            </div>
            <div>
                {{ HTML::linkRoute('show', 'View Episodes', ['show_id' => $episode->show()->first()->id]) }}
            </div>
        </div>
        <div class="col-md-9">
            <div id="episode-head">
                <div class="episode-date col-md-8">
                    <% episode.published_at %>
                </div>
                <div id="episode-rating" class="row col-md-4">
                <span class="star-rating">
                  <input type="radio" name="rating" value="1"><i></i>
                  <input type="radio" name="rating" value="2"><i></i>
                  <input type="radio" name="rating" value="3"><i></i>
                  <input type="radio" name="rating" value="4"><i></i>
                  <input type="radio" name="rating" value="5"><i></i>
                </span>
                </div>
            </div>
            <div id="episode-name">
                <h1> <% episode.name %> </h1>
            </div>
            <hr>
            <div id="episode-desc"> <% episode.description %> </div>
            <div id="episode-src" class="container">
                <audio id="episode" controls preload="auto">
                    <source src="{{ $episode['src'] }}" type="audio/mpeg"/>
                </audio>
            </div>
        </div>
    </article>
</div>

<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.21/angular.min.js"></script> <!-- TODO include locally -->
<script src="/js/podcast/controllers/mainCtrl.js"></script> <!-- load our controller -->
<script src="/js/podcast/services/podcastService.js"></script> <!-- load our service -->
<script src="/js/podcast/app.js"></script> <!-- load our application -->

@if( Auth::check())
<script src="/js/podcast/audio_session.js"></script>
<script>
    $("input[name=rating][value=" + {{ $episode['user_rating'] }} + "]").attr('checked', 'checked');
    $('input[name=rating]').on('change', function() {
        var rating = this.value;

        var data = {
            "episode_id": "{{ $episode['id'] }}",
            "rating"    : rating
        };

        $.post("{{ URL::route('episode.rating') }}", data, function() {
            console.log('Update Rating');
        });
    });

    new AudioSession($('#episode'), {
        episode_id      : "{{ $episode['id'] }}",
        audio_id        : "{{ $episode['id'] }}",
        get_session_url : "{{ URL::route('session.index', ['episode' => $episode['id']]) }}",
        set_session_url : "{{ URL::route('session.store') }}"
    });
</script>
@endif

@stop