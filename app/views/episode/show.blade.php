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
            <div id="episode-head">
                <div class="episode-date col-md-8">
                    {{ date('F jS, Y', strtotime($episode['published_at'])) }}
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
                <h1> {{ $episode['name'] }}</h1>
            </div>
            <hr>
            <div id="episode-desc"> {{ strip_tags($episode['description']) }} </div>
            <div id="episode-src" class="container">
                <audio id="episode" controls>
                    <source src="{{ $episode['src'] }}" type="audio/mpeg"/>
                </audio>
            </div>
        </div>
    </article>
    <hr>

    <div class="comments">
        <script type="text/javascript">
            /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
            var disqus_shortname = 'topodcasts'; // required: replace example with your forum shortname
            var disqus_identifier = "{{ $episode['id'] }}";
            /* * * DON'T EDIT BELOW THIS LINE * * */
            (function () {
                var s = document.createElement('script'); s.async = true;
                s.type = 'text/javascript';
                s.src = '//' + disqus_shortname + '.disqus.com/count.js';
                (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
            }());
        </script>
    </div>
</div>

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
            console.log('Stored Rating');
        });
    });

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