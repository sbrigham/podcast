@extends('layouts.master')


@section('content')

<div class="content well">
    <div id="show-data">
        <div class="row">
            <div class="col-md-3">
                <img src="{{ $show['image_src']}}" class="img-responsive"/>
            </div>
            <div id="show-description" class="col-md-9">
                <div>
                    <h1 id="show-name-header"> {{ $show['name'] }} </h1>
                </div>
                <hr>
                <p>
                    {{ $show['description'] }}
                </p>
            </div>
        </div>
    </div>
    <hr>

    <div id="episodes">
        @foreach (array_chunk($show->episodes_paginated->getCollection()->all(), 3) as $row)
        <div class="row">
            @foreach($row as $item)
            <article class="col col-md-4">
                <a href="{{ URL::route('episode', ['episode_id' => $item['id'], 'show_id' => $show['id']]) }}">
                    <div class="episode-guts well">
                        <div class="episode-date container-fluid">
                            {{ date('F jS, Y', strtotime($item['published_at'])) }}
                        </div>
                        <div class="container-fluid">
                            <h5 class="episode-name">
                                {{ $item['name'] }}
                            </h5>
                        </div>
                        <hr>
                        <div class="container-fluid">
                            <audio src="{{ $item['src'] }}" controls width="100%">

                            </audio>
                        </div>
                    </div>
                </a>
            </article>
            @endforeach
        </div>
        @endforeach
    </div>

    <div id ="pager" class="container">
        {{ $show->episodes_paginated->links() }}
    </div>
</div>


<style>
    #episodes{
        padding-top:15px;
    }

    #pager {
        text-align: center;
    }
    .episode-guts {
        text-shadow: rgba(0, 0, 0, 0.298039) 1px 1px 1px;
    }
    a:hover{
        text-decoration: none;
    }

    .episode-name {
        font-size:22px;
    }

    .episode-name:hover {
        text-decoration: underline;
    }

    .episode-date {
        color: #32CD32;
        font-size: 10px;
        text-align: right;
        margin-top: -5px;
        margin-right: -5px;
    }

    .episode-description {
        font-size: 12px;
    }

    audio {
        width: 100%;
    }
</style>

@stop