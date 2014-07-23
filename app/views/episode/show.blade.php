@extends('layouts.master')

@section('content')

<article>
    <div id="episode_name">
       <h1> {{ $episode['name'] }}</h1>
    </div>
    <div id="episode-img">
        <img src ="{{ $episode['image_src'] }}" class="img-responsive"/>
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
        <audio controls width="100%">
            <source src="{{ $episode['src'] }}" type="audio/mpeg"/>
        </audio>
    </div>
</article>



<style>
    article {
        color: #FFF;
    }

    #episode-desc {
        padding-top: 10px;
        padding-bottom: 10px;
    }
</style>
@stop