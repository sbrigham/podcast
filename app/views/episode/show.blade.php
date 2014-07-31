@extends('layouts.master')

@section('content')

<style>
    .episode-date {
        color: #32CD32;
        font-size: 10px;
        text-align: right;
        margin-top: -5px;
        margin-right: -5px;
        padding-bottom:5px;
    }
    article {
        color: #FFF;
    }

    #episode-desc {
        padding-top: 10px;
        padding-bottom: 10px;
    }
</style>

<div class="container well">
    <article>
        <div class="col-md-3 fluid-container">
            <div id="episode-img" class="fluid-container">
                @if($episode['image_src'] != null)
                <img src ="{{ $episode['image_src'] }}" class="img-responsive"/>
                @else
                <img src ="{{ $show['image_src'] }}" class="img-responsive"/>
                @endif
            </div>
        </div>
        <div class="col-md-9">
            <h1> {{ $episode['name'] }}</h1>
            <hr>
            <div class="episode-date container-fluid">
                {{ date('F jS, Y', strtotime($episode['published_at'])) }}
            </div>
            <div id="episode-desc"> {{ strip_tags($episode['description']) }} </div>
            <div>
                @if(! $episode->sourceIsActive())
                This source is not currently active

                <script>
                    $('audio').attr('disabled', 'disabled');
                </script>
                @endif
            </div>
            <div>
                <audio id="episode" controls width="100%">
                    <source src="{{ $episode['src'] }}" type="audio/mpeg"/>
                </audio>
            </div>
        </div>
    </article>
</div>

@if( Auth::check())
<script src="/js/podcast/audio_session.js"></script>
<script>
    new AudioSession($('#episode'), {
        checks_exist    : false,
        episode_id      : "{{ $episode['id'] }}",
        get_session_url : "{{ URL::route('session.index', ['episode' => $episode['id']]) }}",
        audio_id: "{{ $episode['id']}}",
        set_session_url : "{{ URL::route('session.store') }}",
    });
</script>
@endif

@stop